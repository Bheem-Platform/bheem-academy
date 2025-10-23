"""
Migrate existing Moodle users to ERP database

This script:
1. Reads users from mdl_user (bheem_academy_staging)
2. Creates corresponding records in auth.users and public.persons (erp_staging)
3. Stores original Moodle user ID for linking
4. Preserves password hashes (users can login with existing passwords)
5. Links all users to Academy company (BHM008)
"""

import psycopg2
from psycopg2.extras import RealDictCursor
import uuid
from datetime import datetime

# Database connections
# URL-encode the @ symbol in password
MOODLE_DB = "postgresql://postgres:Bheem924924.%40@65.109.167.218:5432/bheem_academy_staging"
ERP_DB = "postgresql://postgres:Bheem924924.%40@65.109.167.218:5432/erp_staging"

# Academy company ID
ACADEMY_COMPANY_ID = "cafe17e8-72a3-438b-951e-7af25af4bab8"  # BHM008


def add_moodle_user_id_column():
    """Add moodle_user_id column to auth.users table"""
    print("Adding moodle_user_id column to auth.users...")

    with psycopg2.connect(ERP_DB) as conn:
        with conn.cursor() as cur:
            # Check if column exists
            cur.execute("""
                SELECT column_name
                FROM information_schema.columns
                WHERE table_schema = 'auth'
                AND table_name = 'users'
                AND column_name = 'moodle_user_id'
            """)

            if cur.fetchone() is None:
                cur.execute("""
                    ALTER TABLE auth.users
                    ADD COLUMN moodle_user_id BIGINT UNIQUE
                """)
                cur.execute("""
                    CREATE INDEX idx_moodle_user_id ON auth.users(moodle_user_id)
                """)
                conn.commit()
                print("✅ Column added successfully")
            else:
                print("✅ Column already exists")


def get_moodle_users():
    """Fetch all active Moodle users"""
    print("\nFetching Moodle users...")

    with psycopg2.connect(MOODLE_DB) as conn:
        with conn.cursor(cursor_factory=RealDictCursor) as cur:
            cur.execute("""
                SELECT
                    id,
                    username,
                    password,
                    firstname,
                    lastname,
                    middlename,
                    email,
                    phone1,
                    city,
                    country,
                    description,
                    picture,
                    confirmed,
                    timecreated,
                    timemodified
                FROM mdl_user
                WHERE deleted = 0
                AND confirmed = 1
                AND id > 1  -- Skip guest user
                ORDER BY id
            """)
            users = cur.fetchall()
            print(f"✅ Found {len(users)} active users")
            return users


def migrate_user(moodle_user):
    """Migrate single user to ERP database"""

    with psycopg2.connect(ERP_DB) as conn:
        with conn.cursor() as cur:
            # Check if user already migrated
            cur.execute(
                "SELECT id FROM auth.users WHERE moodle_user_id = %s",
                (moodle_user['id'],)
            )

            if cur.fetchone():
                print(f"⚠️  User {moodle_user['username']} already migrated, skipping...")
                return

            # Generate UUIDs
            person_id = str(uuid.uuid4())
            user_id = str(uuid.uuid4())

            # Step 1: Create person record
            print(f"Creating person: {moodle_user['firstname']} {moodle_user['lastname']}")
            cur.execute("""
                INSERT INTO public.persons (
                    id,
                    person_type,
                    first_name,
                    last_name,
                    middle_name,
                    company_id,
                    is_active,
                    created_at
                ) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)
            """, (
                person_id,
                'CUSTOMER',  # All Academy users are customers
                moodle_user['firstname'] or 'Unknown',
                moodle_user['lastname'] or 'User',
                moodle_user['middlename'],
                ACADEMY_COMPANY_ID,
                True,
                datetime.now()
            ))

            # Step 2: Create auth.users record
            print(f"Creating auth user: {moodle_user['username']}")

            # Determine role based on username patterns
            role = 'Customer'
            if moodle_user['username'] in ['admin', 'faculty']:
                role = 'Admin'
            elif 'teacher' in moodle_user['username'].lower():
                role = 'Manager'

            cur.execute("""
                INSERT INTO auth.users (
                    id,
                    username,
                    hashed_password,
                    role,
                    company_id,
                    person_id,
                    moodle_user_id,
                    is_active,
                    is_banned,
                    token_version,
                    auth_provider,
                    created_at,
                    updated_at
                ) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)
            """, (
                user_id,
                moodle_user['username'],
                moodle_user['password'],  # Keep Moodle password hash as-is
                role,
                ACADEMY_COMPANY_ID,
                person_id,
                moodle_user['id'],  # Store original Moodle ID
                True,
                False,
                0,
                'moodle_legacy',  # Mark as migrated from Moodle
                datetime.now(),
                datetime.now()
            ))

            conn.commit()
            print(f"✅ Migrated user: {moodle_user['username']} (Moodle ID: {moodle_user['id']} → ERP ID: {user_id})")
            return user_id


def create_user_mapping_table():
    """Create mapping table to track Moodle ↔ ERP user IDs"""
    print("\nCreating user mapping table...")

    with psycopg2.connect(ERP_DB) as conn:
        with conn.cursor() as cur:
            cur.execute("""
                CREATE TABLE IF NOT EXISTS academy.user_mappings (
                    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
                    erp_user_id UUID NOT NULL REFERENCES auth.users(id) ON DELETE CASCADE,
                    moodle_user_id BIGINT NOT NULL,
                    created_at TIMESTAMP WITH TIME ZONE DEFAULT NOW(),
                    UNIQUE(erp_user_id),
                    UNIQUE(moodle_user_id)
                )
            """)

            cur.execute("""
                CREATE INDEX IF NOT EXISTS idx_user_mappings_moodle
                ON academy.user_mappings(moodle_user_id)
            """)

            cur.execute("""
                CREATE INDEX IF NOT EXISTS idx_user_mappings_erp
                ON academy.user_mappings(erp_user_id)
            """)

            conn.commit()
            print("✅ Mapping table created")


def main():
    """Main migration function"""
    print("=" * 60)
    print("MOODLE → ERP USER MIGRATION")
    print("=" * 60)
    print(f"Moodle DB: bheem_academy_staging")
    print(f"ERP DB: erp_staging")
    print(f"Academy Company: {ACADEMY_COMPANY_ID} (BHM008)")
    print("=" * 60)

    try:
        # Step 1: Add moodle_user_id column if not exists
        add_moodle_user_id_column()

        # Step 2: Create academy schema if not exists
        with psycopg2.connect(ERP_DB) as conn:
            with conn.cursor() as cur:
                cur.execute("CREATE SCHEMA IF NOT EXISTS academy")
                conn.commit()

        # Step 3: Create mapping table
        create_user_mapping_table()

        # Step 4: Fetch Moodle users
        moodle_users = get_moodle_users()

        # Step 5: Migrate each user
        print("\n" + "=" * 60)
        print("MIGRATING USERS")
        print("=" * 60)

        migrated_count = 0
        skipped_count = 0

        for user in moodle_users:
            try:
                user_id = migrate_user(user)
                if user_id:
                    migrated_count += 1

                    # Add to mapping table
                    with psycopg2.connect(ERP_DB) as conn:
                        with conn.cursor() as cur:
                            cur.execute("""
                                INSERT INTO academy.user_mappings
                                (erp_user_id, moodle_user_id)
                                VALUES (%s, %s)
                                ON CONFLICT (moodle_user_id) DO NOTHING
                            """, (user_id, user['id']))
                            conn.commit()
                else:
                    skipped_count += 1

            except Exception as e:
                print(f"❌ Error migrating {user['username']}: {e}")
                continue

        print("\n" + "=" * 60)
        print("MIGRATION SUMMARY")
        print("=" * 60)
        print(f"✅ Migrated: {migrated_count} users")
        print(f"⚠️  Skipped: {skipped_count} users (already migrated)")
        print(f"📊 Total: {len(moodle_users)} users processed")
        print("=" * 60)

        # Verify migration
        with psycopg2.connect(ERP_DB) as conn:
            with conn.cursor() as cur:
                cur.execute("""
                    SELECT COUNT(*) FROM auth.users
                    WHERE company_id = %s AND moodle_user_id IS NOT NULL
                """, (ACADEMY_COMPANY_ID,))
                count = cur.fetchone()[0]
                print(f"\n✅ Verification: {count} Academy users in ERP database")

        print("\n🎉 Migration completed successfully!")
        print("\nNOTE: Users can now login with their existing Moodle credentials")
        print("via Bheem Passport authentication.")

    except Exception as e:
        print(f"\n❌ Migration failed: {e}")
        raise


if __name__ == "__main__":
    main()
