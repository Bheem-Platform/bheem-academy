<?php
defined('MOODLE_INTERNAL') || die();
global $CFG, $DB, $USER, $OUTPUT;

require_once($CFG->dirroot . '/blog/locallib.php');

// Fetch recent blog posts from Moodle
$blogposts = [];
try {
    // Get recent published blog entries
    $sql = "SELECT p.*, u.firstname, u.lastname, u.email, u.picture, u.imagealt
            FROM {post} p
            JOIN {user} u ON p.userid = u.id
            WHERE p.module = 'blog'
            AND p.publishstate = 'site'
            ORDER BY p.created DESC
            LIMIT 3";

    $entries = $DB->get_records_sql($sql);

    foreach ($entries as $entry) {
        $user = $DB->get_record('user', ['id' => $entry->userid]);
        $userpic = new user_picture($user);
        $userpic->size = 100;

        // Get blog entry attachments/images
        $blogentry = new blog_entry($entry->id);
        $blogentry->prepare_render();

        $imageurl = null;
        if ($blogentry->renderable->attachments) {
            foreach ($blogentry->renderable->attachments as $attachment) {
                $ext = strtolower(pathinfo($attachment->filename, PATHINFO_EXTENSION));
                if (in_array($ext, array('jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'))) {
                    $imageurl = $attachment->url;
                    break;
                }
            }
        }

        $blogposts[] = [
            'id' => $entry->id,
            'title' => format_string($entry->subject),
            'summary' => strip_tags(format_text($entry->summary, $entry->format)),
            'date' => userdate($entry->created, '%d %b, %Y'),
            'timestamp' => $entry->created,
            'author' => fullname($user),
            'author_pic' => $userpic->get_url($OUTPUT)->out(false),
            'url' => new moodle_url('/blog/detail.php', ['entryid' => $entry->id]),
            'category' => 'Blog Post',
            'reading_time' => max(1, round(str_word_count(strip_tags($entry->summary)) / 200)),
            'image' => $imageurl
        ];
    }
} catch (Exception $e) {
    // Log error but don't break the page
    debugging('Blog fetch error: ' . $e->getMessage(), DEBUG_DEVELOPER);
}

// Fallback to real blog posts from blog page if database query fails
if (empty($blogposts)) {
    $blogposts = [
        [
            'id' => 61,
            'title' => 'Is Your Career on the Brink Without AI Skills By 2026?',
            'summary' => 'The AI revolution is reshaping India\'s job market at lightning speed. Discover how AI education is transforming industries and why upskilling now is crucial for career survival.',
            'date' => '29 Sept, 2024',
            'timestamp' => strtotime('2024-09-29'),
            'author' => 'SAUDHAMINI A N',
            'author_pic' => 'https://i.pravatar.cc/150?img=14',
            'url' => $CFG->wwwroot . '/blog/detail.php?entryid=61',
            'category' => 'Career Growth',
            'reading_time' => 5,
            'image' => 'https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/8900e526-8941-4c61-f355-3bbeead0b500/public'
        ],
        [
            'id' => 60,
            'title' => 'The Urgent Demand for AI Engineers: Don\'t Let Your Skills Become Irrelevant',
            'summary' => 'The demand for AI engineers has reached unprecedented levels. Companies across industries are scrambling to find professionals who can harness AI\'s potential.',
            'date' => '27 Sept, 2024',
            'timestamp' => strtotime('2024-09-27'),
            'author' => 'JISHNU P',
            'author_pic' => 'https://i.pravatar.cc/150?img=15',
            'url' => $CFG->wwwroot . '/blog/detail.php?entryid=60',
            'category' => 'AI Engineering',
            'reading_time' => 6,
            'image' => 'https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/c57d05f6-97e0-48f4-ce6e-9527c3e2e300/public'
        ],
        [
            'id' => 59,
            'title' => 'Is Your Child\'s Future at Risk by Ignoring AI',
            'summary' => 'In today\'s rapidly evolving world, artificial intelligence (AI) is no longer just a buzzword. Learn why AI education is essential for your child\'s future success.',
            'date' => '26 Sept, 2024',
            'timestamp' => strtotime('2024-09-26'),
            'author' => 'Ben Paul Biju',
            'author_pic' => 'https://i.pravatar.cc/150?img=8',
            'url' => $CFG->wwwroot . '/blog/detail.php?entryid=59',
            'category' => 'AI Education',
            'reading_time' => 5,
            'image' => 'https://imagedelivery.net/GSYWs1kbpG8XypJe3mjC0Q/de99578c-704f-46ba-62a4-3b16a532dc00/public'
        ]
    ];
}
?>

<style>
    /* ========================================
       [Edoo] Blog Block Styles
       Premium Professional Design - Company Standard
       With Glass Morphism & Animated AI Icons
    ======================================== */

    .neural-blog-section {
        padding: 100px 0;
        background:
            linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 25%, #dbeafe 50%, #fce7f3 75%, #fef3f2 100%);
        position: relative;
        overflow: hidden;
        opacity: 0;
        transform: translateY(60px);
        transition: opacity 1.2s cubic-bezier(0.34, 1.56, 0.64, 1), transform 1.2s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .neural-blog-section.aos-animate {
        opacity: 1;
        transform: translateY(0);
    }

    /* Glass Morphism Background Effect */
    .neural-blog-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 20% 30%, rgba(56, 189, 248, 0.08) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(251, 146, 60, 0.06) 0%, transparent 50%),
            radial-gradient(circle at 50% 50%, rgba(167, 139, 250, 0.05) 0%, transparent 60%);
        backdrop-filter: blur(100px);
        pointer-events: none;
        z-index: 1;
    }

    /* Animated AI Tool Icons Container */
    .ai-icons-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 2;
        overflow: hidden;
    }

    /* Individual AI Icon Floating Animation */
    .ai-icon-float {
        position: absolute;
        width: 60px;
        height: 60px;
        background: rgba(255, 255, 255, 0.6);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        border: 1px solid rgba(255, 255, 255, 0.8);
        box-shadow:
            0 8px 32px rgba(0, 0, 0, 0.08),
            inset 0 1px 0 rgba(255, 255, 255, 1);
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
        opacity: 0.9;
        transition: all 0.3s ease;
    }

    .ai-icon-float:hover {
        transform: scale(1.2) !important;
        opacity: 1;
        background: rgba(255, 255, 255, 0.85);
        box-shadow:
            0 12px 40px rgba(0, 0, 0, 0.12),
            inset 0 1px 0 rgba(255, 255, 255, 1);
    }

    /* Different animation patterns for each icon */
    .ai-icon-1 {
        top: 10%;
        left: 5%;
        animation: float-1 20s ease-in-out infinite;
        animation-delay: 0s;
    }

    .ai-icon-2 {
        top: 20%;
        right: 8%;
        animation: float-2 25s ease-in-out infinite;
        animation-delay: 2s;
    }

    .ai-icon-3 {
        top: 50%;
        left: 3%;
        animation: float-3 30s ease-in-out infinite;
        animation-delay: 4s;
    }

    .ai-icon-4 {
        top: 60%;
        right: 5%;
        animation: float-4 28s ease-in-out infinite;
        animation-delay: 1s;
    }

    .ai-icon-5 {
        top: 80%;
        left: 10%;
        animation: float-5 22s ease-in-out infinite;
        animation-delay: 3s;
    }

    .ai-icon-6 {
        top: 15%;
        left: 50%;
        animation: float-6 26s ease-in-out infinite;
        animation-delay: 5s;
    }

    .ai-icon-7 {
        top: 75%;
        right: 15%;
        animation: float-7 24s ease-in-out infinite;
        animation-delay: 2.5s;
    }

    .ai-icon-8 {
        top: 40%;
        right: 12%;
        animation: float-8 27s ease-in-out infinite;
        animation-delay: 1.5s;
    }

    .ai-icon-9 {
        top: 30%;
        left: 15%;
        animation: float-9 23s ease-in-out infinite;
        animation-delay: 4.5s;
    }

    .ai-icon-10 {
        top: 65%;
        right: 25%;
        animation: float-10 29s ease-in-out infinite;
        animation-delay: 2.8s;
    }

    .ai-icon-11 {
        top: 25%;
        right: 30%;
        animation: float-11 26s ease-in-out infinite;
        animation-delay: 3.5s;
    }

    .ai-icon-12 {
        top: 55%;
        left: 20%;
        animation: float-12 24s ease-in-out infinite;
        animation-delay: 1.8s;
    }

    .ai-icon-13 {
        top: 85%;
        right: 35%;
        animation: float-13 28s ease-in-out infinite;
        animation-delay: 4.2s;
    }

    .ai-icon-14 {
        top: 12%;
        left: 35%;
        animation: float-14 25s ease-in-out infinite;
        animation-delay: 3.8s;
    }

    .ai-icon-15 {
        top: 70%;
        left: 35%;
        animation: float-15 27s ease-in-out infinite;
        animation-delay: 2.2s;
    }

    /* Keyframe animations for smooth floating with collision-like movements */
    @keyframes float-1 {
        0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
        15% { transform: translate(30px, -40px) rotate(5deg) scale(1.05); }
        35% { transform: translate(-20px, -80px) rotate(-5deg) scale(0.95); }
        55% { transform: translate(40px, -40px) rotate(3deg) scale(1.08); }
        75% { transform: translate(-15px, -20px) rotate(-2deg) scale(0.98); }
    }

    @keyframes float-2 {
        0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
        20% { transform: translate(-40px, 50px) rotate(-5deg) scale(1.1); }
        45% { transform: translate(30px, 100px) rotate(5deg) scale(0.92); }
        70% { transform: translate(-30px, 50px) rotate(-3deg) scale(1.06); }
        90% { transform: translate(15px, 25px) rotate(2deg) scale(0.96); }
    }

    @keyframes float-3 {
        0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
        25% { transform: translate(50px, 30px) rotate(7deg) scale(1.12); }
        50% { transform: translate(25px, -40px) rotate(-7deg) scale(0.88); }
        75% { transform: translate(60px, 10px) rotate(4deg) scale(1.04); }
    }

    @keyframes float-4 {
        0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
        18% { transform: translate(-35px, -45px) rotate(6deg) scale(1.15); }
        42% { transform: translate(45px, -20px) rotate(-6deg) scale(0.9); }
        68% { transform: translate(-25px, -55px) rotate(5deg) scale(1.08); }
        85% { transform: translate(20px, -15px) rotate(-3deg) scale(0.95); }
    }

    @keyframes float-5 {
        0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
        22% { transform: translate(40px, -30px) rotate(-4deg) scale(1.1); }
        48% { transform: translate(-30px, -60px) rotate(4deg) scale(0.92); }
        72% { transform: translate(50px, -20px) rotate(-2deg) scale(1.06); }
        90% { transform: translate(-10px, -35px) rotate(3deg) scale(0.98); }
    }

    @keyframes float-6 {
        0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
        16% { transform: translate(-25px, 40px) rotate(5deg) scale(1.08); }
        32% { transform: translate(35px, 80px) rotate(-5deg) scale(0.94); }
        52% { transform: translate(-40px, 60px) rotate(3deg) scale(1.12); }
        72% { transform: translate(30px, 40px) rotate(-3deg) scale(0.9); }
        88% { transform: translate(-15px, 55px) rotate(4deg) scale(1.02); }
    }

    @keyframes float-7 {
        0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
        28% { transform: translate(-50px, -35px) rotate(-6deg) scale(1.14); }
        56% { transform: translate(40px, -70px) rotate(6deg) scale(0.88); }
        84% { transform: translate(-30px, -50px) rotate(-4deg) scale(1.05); }
    }

    @keyframes float-8 {
        0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
        24% { transform: translate(35px, 45px) rotate(4deg) scale(1.08); }
        52% { transform: translate(-45px, 90px) rotate(-4deg) scale(0.94); }
        76% { transform: translate(30px, 45px) rotate(2deg) scale(1.1); }
    }

    @keyframes float-9 {
        0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
        20% { transform: translate(45px, 35px) rotate(8deg) scale(1.1); }
        40% { transform: translate(80px, -25px) rotate(-6deg) scale(0.95); }
        60% { transform: translate(35px, -60px) rotate(5deg) scale(1.05); }
        80% { transform: translate(-20px, 20px) rotate(-4deg) scale(1); }
    }

    @keyframes float-10 {
        0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
        15% { transform: translate(-55px, -40px) rotate(-7deg) scale(1.08); }
        35% { transform: translate(-90px, 30px) rotate(6deg) scale(0.92); }
        55% { transform: translate(-40px, 70px) rotate(-5deg) scale(1.05); }
        75% { transform: translate(25px, -15px) rotate(4deg) scale(0.98); }
    }

    @keyframes float-11 {
        0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
        25% { transform: translate(-60px, 55px) rotate(9deg) scale(1.12); }
        50% { transform: translate(45px, 95px) rotate(-8deg) scale(0.9); }
        75% { transform: translate(-30px, 45px) rotate(6deg) scale(1.05); }
    }

    @keyframes float-12 {
        0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
        30% { transform: translate(65px, -50px) rotate(-9deg) scale(1.1); }
        60% { transform: translate(-50px, -85px) rotate(7deg) scale(0.95); }
        90% { transform: translate(40px, -30px) rotate(-5deg) scale(1.02); }
    }

    @keyframes float-13 {
        0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
        22% { transform: translate(50px, -45px) rotate(10deg) scale(1.15); }
        44% { transform: translate(-35px, -90px) rotate(-8deg) scale(0.88); }
        66% { transform: translate(70px, -55px) rotate(7deg) scale(1.08); }
        88% { transform: translate(-25px, -25px) rotate(-4deg) scale(0.96); }
    }

    @keyframes float-14 {
        0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
        18% { transform: translate(-45px, 60px) rotate(-11deg) scale(1.12); }
        36% { transform: translate(55px, 110px) rotate(9deg) scale(0.92); }
        54% { transform: translate(-70px, 75px) rotate(-7deg) scale(1.06); }
        72% { transform: translate(30px, 40px) rotate(5deg) scale(0.98); }
        90% { transform: translate(-15px, 20px) rotate(-3deg) scale(1.02); }
    }

    @keyframes float-15 {
        0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
        28% { transform: translate(55px, 40px) rotate(8deg) scale(1.08); }
        56% { transform: translate(-60px, -30px) rotate(-9deg) scale(0.94); }
        84% { transform: translate(45px, -65px) rotate(6deg) scale(1.04); }
    }

    .blog-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 20px;
        position: relative;
        z-index: 3;
    }

    .blog-header {
        text-align: center;
        margin-bottom: 70px;
        position: relative;
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 1s cubic-bezier(0.34, 1.56, 0.64, 1) 0.2s, transform 1s cubic-bezier(0.34, 1.56, 0.64, 1) 0.2s;
    }

    .neural-blog-section.aos-animate .blog-header {
        opacity: 1;
        transform: translateY(0);
    }

    .blog-title {
        font-size: 3.75rem;
        font-weight: 900;
        margin: 0 0 20px 0;
        background: linear-gradient(135deg,
            #8b5cf6 0%,
            #a855f7 20%,
            #c084fc 35%,
            #ec4899 50%,
            #06b6d4 70%,
            #10b981 85%,
            #8b5cf6 100%);
        background-size: 200% 200%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: gradientShift 8s ease-in-out infinite;
        text-shadow: 0 0 80px rgba(139, 92, 246, 0.3);
    }

    @keyframes gradientShift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .blog-subtitle {
        font-size: 1.3rem;
        color: #64748b;
        margin: 0;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    .blog-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 35px;
        margin-bottom: 60px;
    }

    .blog-card {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(20px) saturate(180%);
        -webkit-backdrop-filter: blur(20px) saturate(180%);
        border-radius: 28px;
        overflow: hidden;
        transition: all 0.65s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow:
            0 15px 50px rgba(100, 116, 139, 0.12),
            0 8px 25px rgba(148, 163, 184, 0.08),
            0 3px 12px rgba(139, 92, 246, 0.05),
            inset 0 1px 0 rgba(255, 255, 255, 1);
        border: 1px solid rgba(255, 255, 255, 0.8);
        position: relative;
        display: flex;
        flex-direction: column;
        opacity: 0;
        perspective: 1000px;
        transform-style: preserve-3d;
        will-change: transform, opacity;
    }

    /* Instagram Reels-Style Motion Graphics Animations */
    /* Card 1: Slide from Left with Rotation */
    .blog-card:nth-child(1) {
        transform: translateX(-150px) translateY(80px) rotateY(-35deg) scale(0.75);
    }

    .neural-blog-section.aos-animate .blog-card:nth-child(1) {
        animation: reelsSlideInLeft 1.2s cubic-bezier(0.16, 1, 0.3, 1) 0.2s forwards;
    }

    /* Card 2: Slide from Bottom with 3D Flip */
    .blog-card:nth-child(2) {
        transform: translateY(180px) rotateX(35deg) scale(0.7);
    }

    .neural-blog-section.aos-animate .blog-card:nth-child(2) {
        animation: reelsSlideInBottom 1.3s cubic-bezier(0.16, 1, 0.3, 1) 0.4s forwards;
    }

    /* Card 3: Slide from Right with Twist */
    .blog-card:nth-child(3) {
        transform: translateX(150px) translateY(80px) rotateY(35deg) rotateZ(-8deg) scale(0.75);
    }

    .neural-blog-section.aos-animate .blog-card:nth-child(3) {
        animation: reelsSlideInRight 1.2s cubic-bezier(0.16, 1, 0.3, 1) 0.6s forwards;
    }

    /* Instagram Reels Keyframe Animations */
    @keyframes reelsSlideInLeft {
        0% {
            opacity: 0;
            transform: translateX(-150px) translateY(80px) rotateY(-35deg) scale(0.75);
        }
        50% {
            opacity: 0.8;
            transform: translateX(-20px) translateY(20px) rotateY(-5deg) scale(0.95);
        }
        100% {
            opacity: 1;
            transform: translateX(0) translateY(0) rotateY(0deg) scale(1);
        }
    }

    @keyframes reelsSlideInBottom {
        0% {
            opacity: 0;
            transform: translateY(180px) rotateX(35deg) scale(0.7);
        }
        50% {
            opacity: 0.7;
            transform: translateY(40px) rotateX(10deg) scale(0.9);
        }
        100% {
            opacity: 1;
            transform: translateY(0) rotateX(0deg) scale(1);
        }
    }

    @keyframes reelsSlideInRight {
        0% {
            opacity: 0;
            transform: translateX(150px) translateY(80px) rotateY(35deg) rotateZ(-8deg) scale(0.75);
        }
        50% {
            opacity: 0.8;
            transform: translateX(20px) translateY(20px) rotateY(5deg) rotateZ(-2deg) scale(0.95);
        }
        100% {
            opacity: 1;
            transform: translateX(0) translateY(0) rotateY(0deg) rotateZ(0deg) scale(1);
        }
    }

    .blog-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 30% 30%, rgba(139, 92, 246, 0.08) 0%, transparent 50%),
            radial-gradient(circle at 70% 70%, rgba(236, 72, 153, 0.06) 0%, transparent 50%),
            linear-gradient(135deg,
                rgba(139, 92, 246, 0.05) 0%,
                rgba(6, 182, 212, 0.04) 50%,
                rgba(236, 72, 153, 0.05) 100%);
        opacity: 0;
        transition: opacity 0.65s cubic-bezier(0.4, 0, 0.2, 1);
        pointer-events: none;
        z-index: 1;
    }

    .blog-card:hover {
        transform: translateY(-16px) scale(1.03);
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(30px) saturate(200%);
        -webkit-backdrop-filter: blur(30px) saturate(200%);
        box-shadow:
            0 40px 90px rgba(139, 92, 246, 0.18),
            0 20px 50px rgba(236, 72, 153, 0.12),
            0 10px 30px rgba(6, 182, 212, 0.08),
            0 5px 15px rgba(100, 116, 139, 0.08),
            inset 0 1px 0 rgba(255, 255, 255, 1);
        border-color: rgba(139, 92, 246, 0.3);
    }

    .blog-card:hover::before {
        opacity: 1;
    }

    .blog-card-image {
        width: 100% !important;
        height: 240px;
        overflow: hidden;
        position: relative;
        background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
        display: block;
    }

    .blog-card-image img {
        width: 100% !important;
        max-width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
        object-position: center;
        display: block;
        transition: all 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
        opacity: 0;
        transform: scale(1.3);
    }

    /* Reels-Style Image Entry Animations */
    .neural-blog-section.aos-animate .blog-card:nth-child(1) .blog-card-image img {
        animation: reelsImageZoomIn 1s cubic-bezier(0.16, 1, 0.3, 1) 0.5s forwards;
    }

    .neural-blog-section.aos-animate .blog-card:nth-child(2) .blog-card-image img {
        animation: reelsImageZoomIn 1s cubic-bezier(0.16, 1, 0.3, 1) 0.7s forwards;
    }

    .neural-blog-section.aos-animate .blog-card:nth-child(3) .blog-card-image img {
        animation: reelsImageZoomIn 1s cubic-bezier(0.16, 1, 0.3, 1) 0.9s forwards;
    }

    @keyframes reelsImageZoomIn {
        0% {
            opacity: 0;
            transform: scale(1.3) rotate(5deg);
        }
        100% {
            opacity: 1;
            transform: scale(1) rotate(0deg);
        }
    }

    .blog-card:hover .blog-card-image img {
        transform: scale(1.12) rotate(2deg);
        filter: brightness(1.1) saturate(1.15);
    }

    .blog-card-category {
        position: absolute;
        top: 20px;
        left: 20px;
        padding: 8px 20px;
        background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
        color: white;
        font-size: 0.875rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-radius: 20px;
        box-shadow:
            0 8px 20px rgba(139, 92, 246, 0.4),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
        z-index: 2;
        opacity: 0;
        transform: translateY(-20px) scale(0.8);
    }

    /* Category Badge Animations */
    .neural-blog-section.aos-animate .blog-card:nth-child(1) .blog-card-category {
        animation: reelsBadgeIn 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) 0.8s forwards;
    }

    .neural-blog-section.aos-animate .blog-card:nth-child(2) .blog-card-category {
        animation: reelsBadgeIn 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) 1s forwards;
    }

    .neural-blog-section.aos-animate .blog-card:nth-child(3) .blog-card-category {
        animation: reelsBadgeIn 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) 1.2s forwards;
    }

    @keyframes reelsBadgeIn {
        0% {
            opacity: 0;
            transform: translateY(-20px) scale(0.8);
        }
        70% {
            transform: translateY(3px) scale(1.1);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .blog-card-content {
        padding: 30px;
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 15px;
        position: relative;
        z-index: 2;
    }

    .blog-card-meta {
        display: flex;
        align-items: center;
        gap: 20px;
        font-size: 0.9rem;
        color: #64748b;
    }

    .blog-card-meta-item {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .blog-card-meta-item i {
        color: #8b5cf6;
        font-size: 0.95rem;
    }

    .blog-card-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: #1e293b;
        margin: 0;
        line-height: 1.3;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        opacity: 0;
        transform: translateX(-30px);
    }

    /* Reels-Style Title Slide In */
    .neural-blog-section.aos-animate .blog-card:nth-child(1) .blog-card-title {
        animation: reelsTitleSlide 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.9s forwards;
    }

    .neural-blog-section.aos-animate .blog-card:nth-child(2) .blog-card-title {
        animation: reelsTitleSlide 0.8s cubic-bezier(0.16, 1, 0.3, 1) 1.1s forwards;
    }

    .neural-blog-section.aos-animate .blog-card:nth-child(3) .blog-card-title {
        animation: reelsTitleSlide 0.8s cubic-bezier(0.16, 1, 0.3, 1) 1.3s forwards;
    }

    @keyframes reelsTitleSlide {
        0% {
            opacity: 0;
            transform: translateX(-30px);
        }
        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .blog-card:hover .blog-card-title {
        background: linear-gradient(135deg,
            #8b5cf6 0%,
            #ec4899 50%,
            #06b6d4 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        transform: translateX(5px);
    }

    .blog-card-excerpt {
        font-size: 1rem;
        color: #475569;
        line-height: 1.7;
        margin: 0;
        flex: 1;
        opacity: 0;
        transform: translateY(20px);
    }

    /* Reels-Style Excerpt Fade In */
    .neural-blog-section.aos-animate .blog-card:nth-child(1) .blog-card-excerpt {
        animation: reelsTextFade 0.8s cubic-bezier(0.16, 1, 0.3, 1) 1.1s forwards;
    }

    .neural-blog-section.aos-animate .blog-card:nth-child(2) .blog-card-excerpt {
        animation: reelsTextFade 0.8s cubic-bezier(0.16, 1, 0.3, 1) 1.3s forwards;
    }

    .neural-blog-section.aos-animate .blog-card:nth-child(3) .blog-card-excerpt {
        animation: reelsTextFade 0.8s cubic-bezier(0.16, 1, 0.3, 1) 1.5s forwards;
    }

    @keyframes reelsTextFade {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .blog-card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 20px;
        border-top: 1.5px solid rgba(226, 232, 240, 0.6);
    }

    .blog-card-author {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .blog-card-author-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid rgba(139, 92, 246, 0.3);
    }

    .blog-card-author-info {
        display: flex;
        flex-direction: column;
    }

    .blog-card-author-name {
        font-size: 0.95rem;
        font-weight: 600;
        color: #1e293b;
    }

    .blog-card-author-role {
        font-size: 0.8rem;
        color: #64748b;
    }

    .blog-card-read-more {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 22px;
        background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
        color: white;
        text-decoration: none;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow:
            0 8px 20px rgba(139, 92, 246, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        opacity: 0;
        transform: translateY(20px) scale(0.9);
    }

    /* Reels-Style Button Pop In */
    .neural-blog-section.aos-animate .blog-card:nth-child(1) .blog-card-read-more {
        animation: reelsButtonPop 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) 1.3s forwards;
    }

    .neural-blog-section.aos-animate .blog-card:nth-child(2) .blog-card-read-more {
        animation: reelsButtonPop 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) 1.5s forwards;
    }

    .neural-blog-section.aos-animate .blog-card:nth-child(3) .blog-card-read-more {
        animation: reelsButtonPop 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) 1.7s forwards;
    }

    @keyframes reelsButtonPop {
        0% {
            opacity: 0;
            transform: translateY(20px) scale(0.9);
        }
        70% {
            transform: translateY(-3px) scale(1.05);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .blog-card-read-more:hover {
        transform: translateY(-3px);
        box-shadow:
            0 12px 28px rgba(139, 92, 246, 0.4),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
    }

    .blog-card-read-more i {
        transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .blog-card-read-more:hover i {
        transform: translateX(5px);
    }

    /* Reels-Style Meta Animation */
    .blog-card-meta {
        opacity: 0;
        transform: translateX(-20px);
    }

    .neural-blog-section.aos-animate .blog-card:nth-child(1) .blog-card-meta {
        animation: reelsMetaSlide 0.7s cubic-bezier(0.16, 1, 0.3, 1) 0.8s forwards;
    }

    .neural-blog-section.aos-animate .blog-card:nth-child(2) .blog-card-meta {
        animation: reelsMetaSlide 0.7s cubic-bezier(0.16, 1, 0.3, 1) 1s forwards;
    }

    .neural-blog-section.aos-animate .blog-card:nth-child(3) .blog-card-meta {
        animation: reelsMetaSlide 0.7s cubic-bezier(0.16, 1, 0.3, 1) 1.2s forwards;
    }

    @keyframes reelsMetaSlide {
        0% {
            opacity: 0;
            transform: translateX(-20px);
        }
        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .blog-view-all {
        text-align: center;
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 1s cubic-bezier(0.34, 1.56, 0.64, 1) 1s, transform 1s cubic-bezier(0.34, 1.56, 0.64, 1) 1s;
    }

    .neural-blog-section.aos-animate .blog-view-all {
        opacity: 1;
        transform: translateY(0);
    }

    .blog-view-all-btn {
        display: inline-flex;
        align-items: center;
        gap: 15px;
        padding: 18px 45px;
        background:
            linear-gradient(135deg,
                #8b5cf6 0%,
                #a855f7 30%,
                #ec4899 70%,
                #f472b6 100%);
        color: white;
        text-decoration: none;
        border-radius: 60px;
        font-weight: 800;
        font-size: 1.15rem;
        transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow:
            0 18px 45px rgba(139, 92, 246, 0.4),
            0 10px 25px rgba(236, 72, 153, 0.3),
            inset 0 2px 0 rgba(255, 255, 255, 0.3);
        border: 3px solid rgba(255, 255, 255, 0.4);
        position: relative;
        overflow: hidden;
    }

    .blog-view-all-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg,
            transparent,
            rgba(255, 255, 255, 0.4),
            transparent);
        transition: left 0.7s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .blog-view-all-btn:hover::before {
        left: 100%;
    }

    .blog-view-all-btn:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow:
            0 25px 60px rgba(139, 92, 246, 0.5),
            0 15px 35px rgba(236, 72, 153, 0.4),
            inset 0 2px 0 rgba(255, 255, 255, 0.4);
    }

    .blog-view-all-btn i {
        font-size: 1.2rem;
        transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .blog-view-all-btn:hover i {
        transform: translateX(8px) rotate(15deg);
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .blog-title {
            font-size: 3.25rem;
        }

        .blog-grid {
            gap: 30px;
        }

        .blog-card-image {
            height: 220px;
        }

        /* Reduce AI icon size on medium screens */
        .ai-icon-float {
            width: 50px;
            height: 50px;
            font-size: 24px;
        }
    }

    @media (max-width: 1024px) {
        .blog-title {
            font-size: 2.75rem;
        }

        .blog-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 28px;
        }

        .blog-card-image {
            height: 210px;
        }

        .blog-card-content {
            padding: 28px 25px;
        }

        /* Hide some AI icons on tablets */
        .ai-icon-6,
        .ai-icon-7,
        .ai-icon-8,
        .ai-icon-11,
        .ai-icon-12,
        .ai-icon-13 {
            display: none;
        }
    }

    @media (max-width: 768px) {
        .neural-blog-section {
            padding: 45px 0;
        }

        .blog-header {
            margin-bottom: 55px;
        }

        .blog-title {
            font-size: 2.25rem;
        }

        .blog-subtitle {
            font-size: 1.15rem;
        }

        .blog-grid {
            gap: 25px;
            margin-bottom: 50px;
        }

        .blog-card-image {
            height: 200px;
        }

        .blog-card-title {
            font-size: 1.35rem;
        }

        .blog-view-all-btn {
            padding: 16px 40px;
            font-size: 1.05rem;
        }

        /* Hide most AI icons on mobile */
        .ai-icon-3,
        .ai-icon-4,
        .ai-icon-5,
        .ai-icon-9,
        .ai-icon-10,
        .ai-icon-14,
        .ai-icon-15 {
            display: none;
        }

        .ai-icon-float {
            width: 40px;
            height: 40px;
            font-size: 20px;
        }
    }

    @media (max-width: 640px) {
        .neural-blog-section {
            padding: 35px 0;
        }

        .blog-header {
            margin-bottom: 45px;
        }

        .blog-title {
            font-size: 2rem;
        }

        .blog-subtitle {
            font-size: 1rem;
        }

        .blog-grid {
            grid-template-columns: 1fr;
            gap: 25px;
        }

        .blog-card-image {
            height: 220px;
        }

        .blog-card-content {
            padding: 25px 22px;
            gap: 12px;
        }

        .blog-card-title {
            font-size: 1.3rem;
        }

        .blog-card-footer {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .blog-card-read-more {
            width: 100%;
            justify-content: center;
        }

        .blog-view-all-btn {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .blog-title {
            font-size: 1.75rem;
        }

        .blog-subtitle {
            font-size: 0.95rem;
        }

        .blog-card-image {
            height: 200px;
        }

        .blog-card-content {
            padding: 22px 20px;
        }

        .blog-card-title {
            font-size: 1.2rem;
        }

        .blog-card-category {
            font-size: 0.8rem;
            padding: 6px 16px;
        }

        .blog-view-all-btn {
            padding: 14px 35px;
            font-size: 1rem;
        }
    }

    @media (max-width: 375px) {
        .neural-blog-section {
            padding: 30px 0;
        }

        .blog-title {
            font-size: 1.6rem;
        }

        .blog-card-image {
            height: 190px;
        }

        .blog-card-content {
            padding: 20px 18px;
        }
    }
</style>

<!-- [Edoo] Blog Block -->
<section class="neural-blog-section" id="neuralBlog">
    <!-- Animated AI Tool Icons -->
    <div class="ai-icons-container">
        <div class="ai-icon-float ai-icon-1">🤖</div>
        <div class="ai-icon-float ai-icon-2">🧠</div>
        <div class="ai-icon-float ai-icon-3">⚡</div>
        <div class="ai-icon-float ai-icon-4">💡</div>
        <div class="ai-icon-float ai-icon-5">🎯</div>
        <div class="ai-icon-float ai-icon-6">🚀</div>
        <div class="ai-icon-float ai-icon-7">💻</div>
        <div class="ai-icon-float ai-icon-8">🔬</div>
        <div class="ai-icon-float ai-icon-9">🌐</div>
        <div class="ai-icon-float ai-icon-10">📊</div>
        <div class="ai-icon-float ai-icon-11">🎨</div>
        <div class="ai-icon-float ai-icon-12">⚙️</div>
        <div class="ai-icon-float ai-icon-13">🔮</div>
        <div class="ai-icon-float ai-icon-14">📱</div>
        <div class="ai-icon-float ai-icon-15">✨</div>
    </div>

    <div class="blog-container">
        <div class="blog-header">
            <h2 class="blog-title">Latest Insights & Updates</h2>
            <p class="blog-subtitle">Stay informed with the latest trends, tips, and success stories from the world of AI education</p>
        </div>

        <div class="blog-grid">
            <?php foreach ($blogposts as $post): ?>
            <!-- Blog Post -->
            <article class="blog-card">
                <div class="blog-card-image">
                    <?php if (isset($post['image'])): ?>
                        <img src="<?php echo $post['image']; ?>" alt="<?php echo s($post['title']); ?>" loading="lazy">
                    <?php else: ?>
                        <img src="https://via.placeholder.com/800x600/667eea/ffffff?text=<?php echo urlencode(substr($post['title'], 0, 30)); ?>" alt="<?php echo s($post['title']); ?>" loading="lazy">
                    <?php endif; ?>
                    <span class="blog-card-category"><?php echo s($post['category']); ?></span>
                </div>
                <div class="blog-card-content">
                    <div class="blog-card-meta">
                        <span class="blog-card-meta-item">
                            <i class="fas fa-calendar"></i>
                            <?php echo $post['date']; ?>
                        </span>
                        <span class="blog-card-meta-item">
                            <i class="fas fa-clock"></i>
                            <?php echo $post['reading_time']; ?> min read
                        </span>
                    </div>
                    <h3 class="blog-card-title"><?php echo $post['title']; ?></h3>
                    <p class="blog-card-excerpt"><?php echo substr($post['summary'], 0, 150) . '...'; ?></p>
                    <div class="blog-card-footer">
                        <div class="blog-card-author">
                            <img src="<?php echo $post['author_pic']; ?>" alt="<?php echo s($post['author']); ?>" class="blog-card-author-avatar">
                            <div class="blog-card-author-info">
                                <span class="blog-card-author-name"><?php echo s($post['author']); ?></span>
                                <?php if (isset($post['author_role'])): ?>
                                    <span class="blog-card-author-role"><?php echo s($post['author_role']); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <a href="<?php echo $post['url']; ?>" class="blog-card-read-more">
                            Read More
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>
        </div>

        <div class="blog-view-all">
            <a href="<?php echo $CFG->wwwroot; ?>/blog/list.php" class="blog-view-all-btn">
                <span>View All Articles</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<script>
// Scroll Animation with Intersection Observer for Blog Section
(function() {
    const blogSection = document.querySelector('.neural-blog-section');

    if (!blogSection) return;

    const observerOptions = {
        root: null,
        rootMargin: '-80px',
        threshold: 0.1
    };

    const observerCallback = (entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('aos-animate');
                console.log('%c✨ Blog Section Animated!', 'background: linear-gradient(135deg, #8b5cf6, #ec4899); color: white; padding: 6px 12px; border-radius: 6px; font-weight: bold;');
            }
        });
    };

    const observer = new IntersectionObserver(observerCallback, observerOptions);
    observer.observe(blogSection);
})();
</script>
