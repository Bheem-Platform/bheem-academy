<template>
  <footer class="moodle-footer">
    <div class="footer-container">
      <div class="footer-grid">
        <!-- About Section -->
        <div class="footer-column">
          <h3 class="footer-title">About Bheem Academy</h3>
          <p class="footer-text">
            Kerala's first fully-fledged AI Academy empowering students with cutting-edge technology education.
          </p>
          <div class="social-links">
            <a href="#" class="social-link" aria-label="Facebook">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-link" aria-label="Instagram">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="social-link" aria-label="LinkedIn">
              <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="#" class="social-link" aria-label="YouTube">
              <i class="fab fa-youtube"></i>
            </a>
          </div>
        </div>

        <!-- Quick Links -->
        <div class="footer-column">
          <h3 class="footer-title">Quick Links</h3>
          <ul class="footer-links">
            <li><a href="/course/index.php">All Courses</a></li>
            <li><a href="/about">About Us</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="/faq">FAQ</a></li>
          </ul>
        </div>

        <!-- Categories -->
        <div class="footer-column">
          <h3 class="footer-title">Categories</h3>
          <ul class="footer-links">
            <li><a href="/course/index.php?categoryid=6">AI for Kids</a></li>
            <li><a href="/course/index.php?categoryid=7">AI for Youth</a></li>
            <li><a href="/course/index.php?categoryid=8">AI for Professionals</a></li>
          </ul>
        </div>

        <!-- Contact -->
        <div class="footer-column">
          <h3 class="footer-title">Contact Us</h3>
          <ul class="footer-contact">
            <li>
              <i class="fas fa-envelope"></i>
              <a href="mailto:info@bheem.cloud">info@bheem.cloud</a>
            </li>
            <li>
              <i class="fas fa-phone"></i>
              <a href="tel:+919876543210">+91 98765 43210</a>
            </li>
            <li>
              <i class="fas fa-map-marker-alt"></i>
              <span>Kerala, India</span>
            </li>
          </ul>
        </div>
      </div>

      <div class="footer-bottom">
        <p class="copyright">
          © {{ currentYear }} Bheem Academy. All rights reserved.
        </p>
        <div class="footer-bottom-links">
          <a href="/privacy">Privacy Policy</a>
          <span class="separator">•</span>
          <a href="/terms">Terms of Service</a>
        </div>
      </div>
    </div>
  </footer>
</template>

<script setup lang="ts">
import { computed } from 'vue'

const currentYear = computed(() => new Date().getFullYear())
</script>

<style scoped>
.moodle-footer {
  background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%);
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  margin-top: 80px;
  padding: 60px 0 30px;
}

.footer-container {
  max-width: 1400px;
  margin: 0 auto;
  padding: 0 24px;
}

.footer-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 40px;
  margin-bottom: 50px;
}

.footer-column {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.footer-title {
  font-size: 1.2rem;
  font-weight: 700;
  color: var(--text-primary);
  margin-bottom: 8px;
  background: linear-gradient(135deg, #f093fb, #f5576c);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.footer-text {
  color: var(--text-secondary);
  line-height: 1.6;
  font-size: 0.95rem;
}

.social-links {
  display: flex;
  gap: 12px;
  margin-top: 8px;
}

.social-link {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 10px;
  color: var(--text-secondary);
  text-decoration: none;
  transition: all 0.3s ease;
  font-size: 1.1rem;
}

.social-link:hover {
  background: linear-gradient(135deg, #667eea, #764ba2);
  border-color: transparent;
  color: white;
  transform: translateY(-4px);
  box-shadow: 0 8px 24px rgba(102, 126, 234, 0.4);
}

.footer-links {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.footer-links li a {
  color: var(--text-secondary);
  text-decoration: none;
  font-size: 0.95rem;
  transition: all 0.2s ease;
  display: inline-block;
}

.footer-links li a:hover {
  color: var(--text-primary);
  transform: translateX(4px);
}

.footer-contact {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
  gap: 14px;
}

.footer-contact li {
  display: flex;
  align-items: center;
  gap: 12px;
  color: var(--text-secondary);
  font-size: 0.95rem;
}

.footer-contact li i {
  color: #f093fb;
  font-size: 1rem;
  width: 20px;
}

.footer-contact li a {
  color: var(--text-secondary);
  text-decoration: none;
  transition: color 0.2s ease;
}

.footer-contact li a:hover {
  color: var(--text-primary);
}

.footer-bottom {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-top: 30px;
  border-top: 1px solid rgba(255, 255, 255, 0.08);
  flex-wrap: wrap;
  gap: 16px;
}

.copyright {
  color: var(--text-muted);
  font-size: 0.9rem;
  margin: 0;
}

.footer-bottom-links {
  display: flex;
  align-items: center;
  gap: 16px;
}

.footer-bottom-links a {
  color: var(--text-muted);
  text-decoration: none;
  font-size: 0.9rem;
  transition: color 0.2s ease;
}

.footer-bottom-links a:hover {
  color: var(--text-primary);
}

.separator {
  color: rgba(255, 255, 255, 0.2);
}

@media (max-width: 768px) {
  .moodle-footer {
    padding: 40px 0 20px;
  }

  .footer-grid {
    grid-template-columns: 1fr;
    gap: 32px;
    margin-bottom: 40px;
  }

  .footer-bottom {
    flex-direction: column;
    text-align: center;
  }
}
</style>
