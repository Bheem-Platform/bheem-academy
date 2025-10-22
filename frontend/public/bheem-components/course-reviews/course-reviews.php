<?php
/**
 * Course Reviews Component
 *
 * Displays top-rated 5-star student reviews for a specific course
 * Features: Grid layout, star ratings, student info, responsive design
 *
 * Usage:
 * $courseid = 42;
 * include(__DIR__ . '/bheem-components/course-reviews/course-reviews.php');
 */

// Get course ID from parameter or global scope
global $DB, $course;
if (!isset($courseid) && isset($course)) {
    $courseid = $course->id;
}

// Fetch 5-star reviews for this course
$reviews = [];
if (isset($courseid)) {
    $reviews = $DB->get_records_sql(
        "SELECT * FROM {course_reviews}
         WHERE courseid = :courseid
         AND rating = 5
         AND visible = 1
         ORDER BY is_featured DESC, timecreated DESC
         LIMIT 12",
        ['courseid' => $courseid]
    );
}

$total_reviews = count($reviews);
$has_minimum_reviews = $total_reviews >= 10;

// Only display if we have at least 10 reviews
if (!$has_minimum_reviews) {
    return;
}

?>

<style>
/* ================================================
   COURSE REVIEWS SECTION - 5-STAR TOP RATED
   ================================================ */

.course-reviews-section {
    position: relative;
    padding: 60px 0;
    margin: 40px 0;
    background: linear-gradient(135deg, #1e293b 0%, #0f172a 50%, #1e293b 100%);
    border-radius: 32px;
    overflow: hidden;
}

.course-reviews-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background:
        radial-gradient(circle at 20% 30%, rgba(99, 102, 241, 0.1), transparent 40%),
        radial-gradient(circle at 80% 70%, rgba(236, 72, 153, 0.1), transparent 40%);
    pointer-events: none;
    z-index: 0;
}

.course-reviews-container {
    position: relative;
    z-index: 1;
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 40px;
}

/* Header */
.course-reviews-header {
    text-align: center;
    margin-bottom: 50px;
}

.course-reviews-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 20px;
    background: rgba(251, 191, 36, 0.15);
    border: 1px solid rgba(251, 191, 36, 0.3);
    border-radius: 50px;
    color: #fbbf24;
    font-size: 0.875rem;
    font-weight: 600;
    margin-bottom: 16px;
}

.course-reviews-title {
    font-family: 'Poppins', sans-serif;
    font-size: clamp(2rem, 4vw, 2.5rem);
    font-weight: 800;
    line-height: 1.2;
    margin: 0 0 12px 0;
    background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.course-reviews-subtitle {
    font-size: 1.125rem;
    color: rgba(255, 255, 255, 0.7);
    margin: 0;
}

.course-reviews-stats {
    display: flex;
    justify-content: center;
    gap: 30px;
    margin-top: 20px;
    flex-wrap: wrap;
}

.reviews-stat-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 1rem;
    color: rgba(255, 255, 255, 0.8);
}

.reviews-stat-item i {
    color: #fbbf24;
    font-size: 1.25rem;
}

.reviews-stat-value {
    font-weight: 700;
    color: #fbbf24;
}

/* Reviews Grid */
.course-reviews-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 24px;
    margin-bottom: 30px;
}

/* Review Card */
.review-card {
    background: rgba(30, 41, 59, 0.8);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(148, 163, 184, 0.1);
    border-radius: 20px;
    padding: 28px;
    transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
    position: relative;
    overflow: hidden;
}

.review-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #fbbf24, #f59e0b);
    opacity: 0;
    transition: opacity 0.4s ease;
}

.review-card:hover {
    transform: translateY(-8px);
    border-color: rgba(251, 191, 36, 0.3);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4), 0 0 80px rgba(251, 191, 36, 0.15);
}

.review-card:hover::before {
    opacity: 1;
}

/* Review Header */
.review-header {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 20px;
}

.review-avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #fbbf24, #f59e0b);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    font-weight: 700;
    color: white;
    flex-shrink: 0;
}

.review-student-info {
    flex: 1;
}

.review-student-name {
    font-size: 1.125rem;
    font-weight: 700;
    color: #f1f5f9;
    margin: 0 0 4px 0;
}

.review-student-title {
    font-size: 0.875rem;
    color: rgba(255, 255, 255, 0.6);
    margin: 0;
}

.review-student-location {
    font-size: 0.75rem;
    color: rgba(255, 255, 255, 0.5);
    margin: 2px 0 0 0;
    display: flex;
    align-items: center;
    gap: 4px;
}

/* Rating */
.review-rating {
    display: flex;
    gap: 4px;
    margin-bottom: 16px;
}

.review-rating i {
    color: #fbbf24;
    font-size: 1rem;
    filter: drop-shadow(0 2px 4px rgba(251, 191, 36, 0.4));
}

/* Review Text */
.review-text {
    font-size: 1rem;
    line-height: 1.7;
    color: rgba(255, 255, 255, 0.8);
    margin: 0 0 16px 0;
}

/* Review Footer */
.review-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 16px;
    border-top: 1px solid rgba(148, 163, 184, 0.1);
}

.review-date {
    font-size: 0.875rem;
    color: rgba(255, 255, 255, 0.5);
}

.review-featured {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 4px 12px;
    background: rgba(251, 191, 36, 0.15);
    border: 1px solid rgba(251, 191, 36, 0.3);
    border-radius: 50px;
    color: #fbbf24;
    font-size: 0.75rem;
    font-weight: 600;
}

/* Show More Button */
.reviews-show-more {
    text-align: center;
    margin-top: 40px;
}

.reviews-btn-show-more {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 14px 32px;
    background: linear-gradient(135deg, #fbbf24, #f59e0b);
    color: #1e293b;
    font-size: 1rem;
    font-weight: 600;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
}

.reviews-btn-show-more:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(251, 191, 36, 0.4);
}

/* Hidden Reviews (for show more functionality) */
.review-card.hidden-review {
    display: none;
}

/* ================================================
   RESPONSIVE DESIGN
   ================================================ */

@media (max-width: 1024px) {
    .course-reviews-grid {
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
    }
}

@media (max-width: 768px) {
    .course-reviews-section {
        padding: 40px 0;
        margin: 30px 0;
        border-radius: 24px;
    }

    .course-reviews-container {
        padding: 0 20px;
    }

    .course-reviews-header {
        margin-bottom: 30px;
    }

    .course-reviews-title {
        font-size: clamp(1.5rem, 5vw, 2rem);
    }

    .course-reviews-subtitle {
        font-size: 1rem;
    }

    .course-reviews-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }

    .review-card {
        padding: 20px;
    }

    .review-header {
        gap: 12px;
    }

    .review-avatar {
        width: 50px;
        height: 50px;
        font-size: 1.25rem;
    }

    .review-student-name {
        font-size: 1rem;
    }

    .review-text {
        font-size: 0.9375rem;
    }
}

@media (max-width: 480px) {
    .course-reviews-section {
        padding: 30px 0;
        border-radius: 20px;
    }

    .course-reviews-container {
        padding: 0 15px;
    }

    .review-card {
        padding: 16px;
    }

    .course-reviews-stats {
        gap: 15px;
    }

    .reviews-stat-item {
        font-size: 0.875rem;
    }
}

/* Animation */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.review-card {
    animation: fadeInUp 0.6s ease-out;
    animation-fill-mode: both;
}

.review-card:nth-child(1) { animation-delay: 0.1s; }
.review-card:nth-child(2) { animation-delay: 0.2s; }
.review-card:nth-child(3) { animation-delay: 0.3s; }
.review-card:nth-child(4) { animation-delay: 0.4s; }
.review-card:nth-child(5) { animation-delay: 0.5s; }
.review-card:nth-child(6) { animation-delay: 0.6s; }
</style>

<!-- Course Reviews Section -->
<section class="course-reviews-section" id="courseReviews">
    <div class="course-reviews-container">
        <!-- Header -->
        <div class="course-reviews-header">
            <div class="course-reviews-badge">
                <i class="fas fa-trophy"></i>
                <span>TOP RATED</span>
            </div>
            <h2 class="course-reviews-title">Student Success Stories</h2>
            <p class="course-reviews-subtitle">See what our top-performing students have to say</p>

            <div class="course-reviews-stats">
                <div class="reviews-stat-item">
                    <i class="fas fa-star"></i>
                    <span><span class="reviews-stat-value">5.0</span> Average Rating</span>
                </div>
                <div class="reviews-stat-item">
                    <i class="fas fa-users"></i>
                    <span><span class="reviews-stat-value"><?php echo $total_reviews; ?>+</span> Reviews</span>
                </div>
                <div class="reviews-stat-item">
                    <i class="fas fa-certificate"></i>
                    <span><span class="reviews-stat-value">100%</span> Verified Students</span>
                </div>
            </div>
        </div>

        <!-- Reviews Grid -->
        <div class="course-reviews-grid">
            <?php
            $count = 0;
            foreach ($reviews as $review):
                $count++;
                $is_hidden = $count > 6 ? 'hidden-review' : '';
                $initials = '';
                $name_parts = explode(' ', $review->student_name);
                if (count($name_parts) >= 2) {
                    $initials = strtoupper(substr($name_parts[0], 0, 1) . substr($name_parts[1], 0, 1));
                } else {
                    $initials = strtoupper(substr($review->student_name, 0, 2));
                }

                $time_ago = '';
                $diff = time() - $review->timecreated;
                if ($diff < 86400) {
                    $time_ago = 'Today';
                } elseif ($diff < 172800) {
                    $time_ago = 'Yesterday';
                } elseif ($diff < 604800) {
                    $time_ago = floor($diff / 86400) . ' days ago';
                } elseif ($diff < 2592000) {
                    $time_ago = floor($diff / 604800) . ' weeks ago';
                } else {
                    $time_ago = date('M Y', $review->timecreated);
                }
            ?>
            <div class="review-card <?php echo $is_hidden; ?>">
                <!-- Header -->
                <div class="review-header">
                    <div class="review-avatar"><?php echo $initials; ?></div>
                    <div class="review-student-info">
                        <h3 class="review-student-name"><?php echo htmlspecialchars($review->student_name); ?></h3>
                        <p class="review-student-title"><?php echo htmlspecialchars($review->student_title); ?></p>
                        <?php if (!empty($review->student_location)): ?>
                        <p class="review-student-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <?php echo htmlspecialchars($review->student_location); ?>
                        </p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Rating -->
                <div class="review-rating">
                    <?php for ($i = 0; $i < $review->rating; $i++): ?>
                    <i class="fas fa-star"></i>
                    <?php endfor; ?>
                </div>

                <!-- Review Text -->
                <p class="review-text"><?php echo htmlspecialchars($review->review_text); ?></p>

                <!-- Footer -->
                <div class="review-footer">
                    <span class="review-date"><?php echo $time_ago; ?></span>
                    <?php if ($review->is_featured): ?>
                    <span class="review-featured">
                        <i class="fas fa-check-circle"></i>
                        Featured
                    </span>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Show More Button -->
        <?php if ($total_reviews > 6): ?>
        <div class="reviews-show-more">
            <button class="reviews-btn-show-more" id="showMoreReviews">
                <span class="show-text">Show More Reviews</span>
                <i class="fas fa-chevron-down"></i>
            </button>
        </div>
        <?php endif; ?>
    </div>
</section>

<script>
// Show More Reviews Functionality
document.addEventListener('DOMContentLoaded', function() {
    const showMoreBtn = document.getElementById('showMoreReviews');
    if (showMoreBtn) {
        showMoreBtn.addEventListener('click', function() {
            const hiddenReviews = document.querySelectorAll('.review-card.hidden-review');
            const isShowingAll = this.classList.contains('showing-all');

            if (isShowingAll) {
                // Hide reviews beyond first 6
                hiddenReviews.forEach(review => {
                    review.classList.add('hidden-review');
                });
                this.querySelector('.show-text').textContent = 'Show More Reviews';
                this.querySelector('i').className = 'fas fa-chevron-down';
                this.classList.remove('showing-all');

                // Scroll to reviews section
                document.getElementById('courseReviews').scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            } else {
                // Show all reviews
                hiddenReviews.forEach(review => {
                    review.classList.remove('hidden-review');
                });
                this.querySelector('.show-text').textContent = 'Show Less';
                this.querySelector('i').className = 'fas fa-chevron-up';
                this.classList.add('showing-all');
            }
        });
    }
});
</script>
