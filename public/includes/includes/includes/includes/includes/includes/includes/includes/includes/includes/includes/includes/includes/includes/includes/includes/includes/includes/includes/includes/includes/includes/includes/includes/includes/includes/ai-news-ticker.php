<?php
// AI News Ticker Component - Professional Design
// Reusable component for displaying live AI news

require_once(__DIR__ . '/ai-news-api.php');
$ai_news_html = get_ai_news_html();
?>

<div class="ai-news-ticker-section">
    <div class="ai-ticker-wrapper">
        <div class="ticker-header">
            <div class="ticker-icon-badge">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M12 6v6l4 2"></path>
                </svg>
            </div>
            <div class="ticker-title">
                <span class="ticker-label">LIVE</span>
                <span class="ticker-heading">Latest AI News</span>
            </div>
        </div>
        <div class="ticker-track-container">
            <div class="ticker-track" id="aiNewsTrack">
                <?php echo $ai_news_html; ?>
                <?php echo $ai_news_html; ?> <!-- Duplicate for seamless loop -->
            </div>
        </div>
        <button class="ticker-control-btn" id="tickerControlBtn" aria-label="Pause ticker">
            <svg class="play-icon" style="display: none;" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                <polygon points="5 3 19 12 5 21 5 3"></polygon>
            </svg>
            <svg class="pause-icon" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                <rect x="6" y="4" width="4" height="16"></rect>
                <rect x="14" y="4" width="4" height="16"></rect>
            </svg>
        </button>
    </div>
</div>

<style>
.ai-news-ticker-section {
    width: 100%;
    max-width: 1400px;
    margin: 0 auto 20px;
    padding: 0 20px;
}

.ai-ticker-wrapper {
    position: relative;
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    border-radius: 16px;
    overflow: hidden;
    box-shadow:
        0 2px 8px rgba(0, 0, 0, 0.04),
        0 1px 2px rgba(0, 0, 0, 0.06),
        0 0 0 1px rgba(0, 0, 0, 0.04);
    display: flex;
    flex-direction: column;
    border: 1px solid rgba(124, 58, 237, 0.1);
}

.ticker-header {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 20px;
    background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);
    border-bottom: 2px solid rgba(255, 255, 255, 0.1);
}

.ticker-icon-badge {
    width: 32px;
    height: 32px;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    flex-shrink: 0;
}

.ticker-icon-badge svg {
    width: 16px;
    height: 16px;
}

.ticker-title {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.ticker-label {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 1.2px;
    text-transform: uppercase;
    color: #fef08a;
    position: relative;
}

.ticker-label::before {
    content: '';
    width: 6px;
    height: 6px;
    background: #ef4444;
    border-radius: 50%;
    box-shadow: 0 0 8px #ef4444;
    animation: blink 1.5s ease-in-out infinite;
}

@keyframes blink {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.3; }
}

.ticker-heading {
    font-size: 15px;
    font-weight: 600;
    color: #fff;
    letter-spacing: 0.3px;
}

.ticker-track-container {
    position: relative;
    overflow: hidden;
    background: #fff;
    padding: 14px 0;
}

.ticker-track {
    display: flex;
    gap: 0;
    animation: scroll-ticker 90s linear infinite;
    will-change: transform;
}

.ticker-track:hover {
    animation-play-state: paused;
}

.ticker-track.paused {
    animation-play-state: paused !important;
}

@keyframes scroll-ticker {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-50%);
    }
}

.news-item {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 0 24px;
    white-space: nowrap;
    border-right: 1px solid rgba(0, 0, 0, 0.08);
    min-width: max-content;
}

.news-item:last-child {
    border-right: none;
}

.news-badge {
    display: inline-block;
    background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);
    color: #fff;
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 0.8px;
    text-transform: uppercase;
    padding: 4px 10px;
    border-radius: 6px;
    flex-shrink: 0;
}

.news-item a {
    color: #1e293b;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    line-height: 1.4;
    transition: color 0.2s ease;
    max-width: 500px;
    overflow: hidden;
    text-overflow: ellipsis;
}

.news-item a:hover {
    color: #7c3aed;
}

.news-date {
    color: #64748b;
    font-size: 12px;
    font-weight: 400;
    flex-shrink: 0;
    padding-left: 8px;
}

.ticker-control-btn {
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
    width: 36px;
    height: 36px;
    background: rgba(124, 58, 237, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(124, 58, 237, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    color: #7c3aed;
    z-index: 10;
}

.ticker-control-btn:hover {
    background: rgba(124, 58, 237, 0.15);
    border-color: rgba(124, 58, 237, 0.3);
    transform: translateY(-50%) scale(1.1);
}

.ticker-control-btn:active {
    transform: translateY(-50%) scale(0.95);
}

/* Responsive Design */
@media (max-width: 768px) {
    .ai-news-ticker-section {
        padding: 0 15px;
        margin-bottom: 20px;
    }

    .ticker-header {
        padding: 14px 16px;
    }

    .ticker-icon-badge {
        width: 32px;
        height: 32px;
    }

    .ticker-icon-badge svg {
        width: 16px;
        height: 16px;
    }

    .ticker-label {
        font-size: 9px;
    }

    .ticker-heading {
        font-size: 13px;
    }

    .ticker-track-container {
        padding: 14px 0;
    }

    .news-item {
        padding: 0 18px;
    }

    .news-item a {
        font-size: 13px;
        max-width: 350px;
    }

    .news-badge {
        font-size: 8px;
        padding: 3px 8px;
    }

    .news-date {
        display: none;
    }

    .ticker-control-btn {
        width: 32px;
        height: 32px;
        right: 15px;
    }

    .ticker-control-btn svg {
        width: 12px;
        height: 12px;
    }
}

@media (max-width: 480px) {
    .ticker-header {
        padding: 12px 14px;
    }

    .ticker-icon-badge {
        width: 28px;
        height: 28px;
    }

    .news-item {
        padding: 0 15px;
        gap: 8px;
    }

    .news-item a {
        font-size: 12px;
        max-width: 250px;
    }

    .ticker-control-btn {
        width: 28px;
        height: 28px;
    }
}

/* Dark mode support */
@media (prefers-color-scheme: dark) {
    .ai-ticker-wrapper {
        background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
        box-shadow:
            0 4px 12px rgba(0, 0, 0, 0.3),
            0 0 0 1px rgba(124, 58, 237, 0.2);
    }

    .ticker-track-container {
        background: #0f172a;
    }

    .news-item {
        border-right-color: rgba(255, 255, 255, 0.1);
    }

    .news-item a {
        color: #e2e8f0;
    }

    .news-item a:hover {
        color: #a78bfa;
    }

    .news-date {
        color: #94a3b8;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const controlBtn = document.getElementById('tickerControlBtn');
    const track = document.getElementById('aiNewsTrack');
    const playIcon = controlBtn.querySelector('.play-icon');
    const pauseIcon = controlBtn.querySelector('.pause-icon');
    let isPaused = false;

    if (controlBtn && track) {
        controlBtn.addEventListener('click', function() {
            isPaused = !isPaused;

            if (isPaused) {
                track.classList.add('paused');
                playIcon.style.display = 'block';
                pauseIcon.style.display = 'none';
                controlBtn.setAttribute('aria-label', 'Play ticker');
            } else {
                track.classList.remove('paused');
                playIcon.style.display = 'none';
                pauseIcon.style.display = 'block';
                controlBtn.setAttribute('aria-label', 'Pause ticker');
            }
        });
    }
});
</script>
