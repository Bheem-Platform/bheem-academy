<template>
  <div class="blog-detail-container">
    <!-- Animated Background -->
    <div class="background-wrapper">
      <div class="gradient-orb orb-1"></div>
      <div class="gradient-orb orb-2"></div>
      <div class="gradient-orb orb-3"></div>
    </div>

    <!-- Main Content -->
    <div class="content-wrapper">
      <!-- Back Navigation -->
      <button class="back-button" @click="goBack">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M19 12H5M12 19l-7-7 7-7"/>
        </svg>
        <span>Back to Blog</span>
      </button>

      <!-- Article Header -->
      <article class="article-container">
        <header class="article-header">
          <!-- Category Badge -->
          <div class="category-badge" :style="{ backgroundColor: categoryColor }">
            {{ article.category }}
          </div>

          <!-- Title -->
          <h1 class="article-title">{{ article.title }}</h1>

          <!-- Meta Information -->
          <div class="article-meta">
            <div class="author-info">
              <div class="avatar" :style="{ backgroundImage: `url(${article.author.avatar})` }">
                <span v-if="!article.author.avatar">{{ article.author.name.charAt(0) }}</span>
              </div>
              <div class="author-details">
                <span class="author-name">{{ article.author.name }}</span>
                <span class="author-role">{{ article.author.role }}</span>
              </div>
            </div>

            <div class="meta-divider"></div>

            <div class="article-stats">
              <div class="stat-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <circle cx="12" cy="12" r="10"/>
                  <polyline points="12 6 12 12 16 14"/>
                </svg>
                <span>{{ article.readTime }} min read</span>
              </div>
              <div class="stat-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                  <line x1="16" y1="2" x2="16" y2="6"/>
                  <line x1="8" y1="2" x2="8" y2="6"/>
                  <line x1="3" y1="10" x2="21" y2="10"/>
                </svg>
                <span>{{ formatDate(article.publishDate) }}</span>
              </div>
              <div class="stat-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                  <circle cx="12" cy="12" r="3"/>
                </svg>
                <span>{{ article.views }} views</span>
              </div>
            </div>
          </div>

          <!-- Tags -->
          <div class="tags-container">
            <span v-for="tag in article.tags" :key="tag" class="tag">
              #{{ tag }}
            </span>
          </div>
        </header>

        <!-- Featured Image -->
        <div class="featured-image" v-if="article.featuredImage">
          <img :src="article.featuredImage" :alt="article.title" />
        </div>

        <!-- Article Content -->
        <div class="article-content" v-html="article.content"></div>

        <!-- Attachments -->
        <div class="attachments-section" v-if="article.attachments && article.attachments.length">
          <h3 class="section-title">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"/>
            </svg>
            Attachments
          </h3>
          <div class="attachments-grid">
            <a
              v-for="attachment in article.attachments"
              :key="attachment.id"
              :href="attachment.url"
              class="attachment-card"
              :download="attachment.name"
            >
              <div class="attachment-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"/>
                  <polyline points="13 2 13 9 20 9"/>
                </svg>
              </div>
              <div class="attachment-info">
                <span class="attachment-name">{{ attachment.name }}</span>
                <span class="attachment-size">{{ formatFileSize(attachment.size) }}</span>
              </div>
              <svg class="download-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                <polyline points="7 10 12 15 17 10"/>
                <line x1="12" y1="15" x2="12" y2="3"/>
              </svg>
            </a>
          </div>
        </div>

        <!-- Article Footer Actions -->
        <div class="article-footer">
          <div class="engagement-actions">
            <button class="action-button" :class="{ active: isLiked }" @click="toggleLike">
              <svg width="20" height="20" viewBox="0 0 24 24" :fill="isLiked ? 'currentColor' : 'none'" stroke="currentColor" stroke-width="2">
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
              </svg>
              <span>{{ article.likes }}</span>
            </button>

            <button class="action-button" @click="scrollToComments">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
              </svg>
              <span>{{ article.commentsCount }}</span>
            </button>

            <button class="action-button" :class="{ active: isBookmarked }" @click="toggleBookmark">
              <svg width="20" height="20" viewBox="0 0 24 24" :fill="isBookmarked ? 'currentColor' : 'none'" stroke="currentColor" stroke-width="2">
                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/>
              </svg>
              <span>Save</span>
            </button>
          </div>

          <div class="share-actions">
            <span class="share-label">Share:</span>
            <button class="share-button" @click="shareOn('twitter')">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/>
              </svg>
            </button>
            <button class="share-button" @click="shareOn('facebook')">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/>
              </svg>
            </button>
            <button class="share-button" @click="shareOn('linkedin')">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/>
                <circle cx="4" cy="4" r="2"/>
              </svg>
            </button>
            <button class="share-button" @click="copyLink">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/>
                <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>
              </svg>
            </button>
          </div>
        </div>
      </article>

      <!-- Comments Section -->
      <section class="comments-section" ref="commentsSection">
        <h2 class="section-heading">
          <span>Comments</span>
          <span class="count">({{ comments.length }})</span>
        </h2>

        <!-- Add Comment Form -->
        <div class="add-comment-form">
          <div class="user-avatar">
            <span>{{ currentUser.name.charAt(0) }}</span>
          </div>
          <div class="comment-input-wrapper">
            <textarea
              v-model="newComment"
              placeholder="Share your thoughts..."
              class="comment-input"
              rows="3"
            ></textarea>
            <div class="comment-actions">
              <button class="cancel-button" @click="newComment = ''" v-if="newComment">
                Cancel
              </button>
              <button
                class="submit-button"
                @click="submitComment"
                :disabled="!newComment.trim()"
              >
                Post Comment
              </button>
            </div>
          </div>
        </div>

        <!-- Comments List -->
        <div class="comments-list">
          <div
            v-for="comment in comments"
            :key="comment.id"
            class="comment-item"
          >
            <div class="comment-avatar">
              <div class="avatar" :style="{ backgroundImage: `url(${comment.author.avatar})` }">
                <span v-if="!comment.author.avatar">{{ comment.author.name.charAt(0) }}</span>
              </div>
            </div>
            <div class="comment-content">
              <div class="comment-header">
                <span class="comment-author">{{ comment.author.name }}</span>
                <span class="comment-date">{{ formatRelativeTime(comment.date) }}</span>
              </div>
              <p class="comment-text">{{ comment.text }}</p>
              <div class="comment-actions-bar">
                <button class="comment-action" @click="likeComment(comment.id)">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                  </svg>
                  <span>{{ comment.likes }}</span>
                </button>
                <button class="comment-action" @click="replyToComment(comment.id)">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="9 14 4 9 9 4"/>
                    <path d="M20 20v-7a4 4 0 0 0-4-4H4"/>
                  </svg>
                  <span>Reply</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Related Posts -->
      <section class="related-posts-section">
        <h2 class="section-heading">
          <span>Related Articles</span>
        </h2>
        <div class="related-posts-grid">
          <article
            v-for="post in relatedPosts"
            :key="post.id"
            class="related-post-card"
            @click="navigateToPost(post.id)"
          >
            <div class="related-post-image">
              <img :src="post.thumbnail" :alt="post.title" />
              <div class="related-post-overlay">
                <span class="read-more">Read Article →</span>
              </div>
            </div>
            <div class="related-post-content">
              <span class="related-post-category">{{ post.category }}</span>
              <h3 class="related-post-title">{{ post.title }}</h3>
              <p class="related-post-excerpt">{{ post.excerpt }}</p>
              <div class="related-post-meta">
                <span class="related-author">{{ post.author.name }}</span>
                <span class="related-date">{{ formatDate(post.date) }}</span>
              </div>
            </div>
          </article>
        </div>
      </section>
    </div>
  </div>
</template>

<script>
export default {
  name: 'BlogDetail',
  data() {
    return {
      isLiked: false,
      isBookmarked: false,
      newComment: '',
      currentUser: {
        name: 'Current User',
        avatar: ''
      },
      article: {
        id: 1,
        title: 'The Future of Web Development: Trends to Watch in 2025',
        category: 'Technology',
        author: {
          name: 'Sarah Johnson',
          role: 'Senior Developer',
          avatar: ''
        },
        publishDate: '2025-10-10',
        readTime: 8,
        views: 1234,
        likes: 89,
        commentsCount: 12,
        tags: ['webdev', 'javascript', 'vue', 'frontend'],
        featuredImage: 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=1200&h=600&fit=crop',
        content: `
          <p>Web development is evolving at an unprecedented pace, and staying ahead of the curve is more important than ever. In this comprehensive guide, we'll explore the key trends that are shaping the future of web development in 2025 and beyond.</p>

          <h2>1. The Rise of AI-Powered Development Tools</h2>
          <p>Artificial Intelligence is revolutionizing how we write code. From intelligent code completion to automated testing and bug detection, AI tools are becoming indispensable in modern development workflows.</p>

          <blockquote>
            <p>"The integration of AI in development tools has increased our team's productivity by 40%. It's not about replacing developers—it's about empowering them to focus on creative problem-solving."</p>
          </blockquote>

          <h2>2. WebAssembly Goes Mainstream</h2>
          <p>WebAssembly (Wasm) is no longer just a future promise—it's here and transforming web performance. Applications that were once impossible in the browser are now reality.</p>

          <ul>
            <li>Near-native performance in browsers</li>
            <li>Language flexibility (Rust, C++, Go)</li>
            <li>Enhanced security sandboxing</li>
            <li>Smaller bundle sizes</li>
          </ul>

          <h2>3. Component-Driven Architecture Evolution</h2>
          <p>Modern frameworks like Vue 3, React, and Svelte continue to push the boundaries of component-based development. The focus is shifting towards:</p>

          <ol>
            <li><strong>Micro-frontends:</strong> Breaking monolithic applications into smaller, manageable pieces</li>
            <li><strong>Design systems:</strong> Creating consistent, reusable component libraries</li>
            <li><strong>Zero-runtime CSS:</strong> Compile-time styling solutions for better performance</li>
          </ol>

          <h2>Looking Ahead</h2>
          <p>The web development landscape will continue to evolve, driven by user expectations, technological advances, and the creative spirit of developers worldwide. The key is to stay curious, keep learning, and embrace change as an opportunity for growth.</p>
        `,
        attachments: [
          { id: 1, name: 'web-trends-2025.pdf', size: 2457600, url: '#' },
          { id: 2, name: 'code-examples.zip', size: 1048576, url: '#' }
        ]
      },
      comments: [
        {
          id: 1,
          author: { name: 'Mike Chen', avatar: '' },
          date: '2025-10-12T10:30:00',
          text: 'Great article! The section on WebAssembly really resonated with me. We\'ve been experimenting with it in our production apps.',
          likes: 5
        },
        {
          id: 2,
          author: { name: 'Emma Wilson', avatar: '' },
          date: '2025-10-11T15:45:00',
          text: 'Would love to see more examples of AI-powered development tools. Any specific recommendations?',
          likes: 3
        }
      ],
      relatedPosts: [
        {
          id: 2,
          title: 'Mastering Vue 3 Composition API',
          excerpt: 'A deep dive into Vue 3\'s Composition API and how it revolutionizes component logic organization.',
          category: 'Vue.js',
          thumbnail: 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=400&h=300&fit=crop',
          author: { name: 'Alex Rivera' },
          date: '2025-10-08'
        },
        {
          id: 3,
          title: 'Building Scalable Design Systems',
          excerpt: 'Learn how to create and maintain design systems that grow with your organization.',
          category: 'Design',
          thumbnail: 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=400&h=300&fit=crop',
          author: { name: 'Jordan Lee' },
          date: '2025-10-05'
        },
        {
          id: 4,
          title: 'Performance Optimization Techniques',
          excerpt: 'Essential strategies for building lightning-fast web applications in 2025.',
          category: 'Performance',
          thumbnail: 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400&h=300&fit=crop',
          author: { name: 'Taylor Kim' },
          date: '2025-10-03'
        }
      ]
    };
  },
  computed: {
    categoryColor() {
      const colors = {
        'Technology': '#8b5cf6',
        'Design': '#ec4899',
        'Vue.js': '#42b883',
        'Performance': '#f59e0b'
      };
      return colors[this.article.category] || '#6366f1';
    }
  },
  methods: {
    goBack() {
      this.$router?.push('/blog') || window.history.back();
    },
    formatDate(date) {
      return new Date(date).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric'
      });
    },
    formatRelativeTime(date) {
      const now = new Date();
      const then = new Date(date);
      const diffInSeconds = Math.floor((now - then) / 1000);

      if (diffInSeconds < 60) return 'just now';
      if (diffInSeconds < 3600) return `${Math.floor(diffInSeconds / 60)} minutes ago`;
      if (diffInSeconds < 86400) return `${Math.floor(diffInSeconds / 3600)} hours ago`;
      if (diffInSeconds < 604800) return `${Math.floor(diffInSeconds / 86400)} days ago`;

      return this.formatDate(date);
    },
    formatFileSize(bytes) {
      if (bytes < 1024) return bytes + ' B';
      if (bytes < 1048576) return (bytes / 1024).toFixed(1) + ' KB';
      return (bytes / 1048576).toFixed(1) + ' MB';
    },
    toggleLike() {
      this.isLiked = !this.isLiked;
      this.article.likes += this.isLiked ? 1 : -1;
    },
    toggleBookmark() {
      this.isBookmarked = !this.isBookmarked;
    },
    scrollToComments() {
      this.$refs.commentsSection?.scrollIntoView({ behavior: 'smooth' });
    },
    submitComment() {
      if (!this.newComment.trim()) return;

      const newCommentObj = {
        id: Date.now(),
        author: { name: this.currentUser.name, avatar: this.currentUser.avatar },
        date: new Date().toISOString(),
        text: this.newComment,
        likes: 0
      };

      this.comments.unshift(newCommentObj);
      this.article.commentsCount++;
      this.newComment = '';
    },
    likeComment(commentId) {
      const comment = this.comments.find(c => c.id === commentId);
      if (comment) comment.likes++;
    },
    replyToComment(commentId) {
      console.log('Reply to comment:', commentId);
      // Implement reply functionality
    },
    shareOn(platform) {
      const url = window.location.href;
      const text = this.article.title;

      const shareUrls = {
        twitter: `https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(text)}`,
        facebook: `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`,
        linkedin: `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(url)}`
      };

      if (shareUrls[platform]) {
        window.open(shareUrls[platform], '_blank', 'width=600,height=400');
      }
    },
    copyLink() {
      navigator.clipboard.writeText(window.location.href);
      // Show toast notification (implement as needed)
      alert('Link copied to clipboard!');
    },
    navigateToPost(postId) {
      this.$router?.push(`/blog/${postId}`) || (window.location.href = `/blog/detail.php?entryid=${postId}`);
    }
  }
};
</script>

<style scoped>
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

.blog-detail-container {
  min-height: 100vh;
  background: linear-gradient(135deg, #0a0e27 0%, #1a1d3a 100%);
  color: #e5e7eb;
  position: relative;
  overflow-x: hidden;
}

/* Animated Background */
.background-wrapper {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
  z-index: 0;
}

.gradient-orb {
  position: absolute;
  border-radius: 50%;
  filter: blur(80px);
  opacity: 0.3;
  animation: float 20s infinite ease-in-out;
}

.orb-1 {
  width: 500px;
  height: 500px;
  background: radial-gradient(circle, rgba(139, 92, 246, 0.4) 0%, transparent 70%);
  top: -10%;
  right: -10%;
  animation-delay: 0s;
}

.orb-2 {
  width: 400px;
  height: 400px;
  background: radial-gradient(circle, rgba(59, 130, 246, 0.4) 0%, transparent 70%);
  bottom: -5%;
  left: -5%;
  animation-delay: 7s;
}

.orb-3 {
  width: 350px;
  height: 350px;
  background: radial-gradient(circle, rgba(236, 72, 153, 0.4) 0%, transparent 70%);
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  animation-delay: 14s;
}

@keyframes float {
  0%, 100% {
    transform: translate(0, 0) scale(1);
  }
  33% {
    transform: translate(30px, -50px) scale(1.1);
  }
  66% {
    transform: translate(-20px, 30px) scale(0.9);
  }
}

/* Content Wrapper */
.content-wrapper {
  position: relative;
  z-index: 1;
  max-width: 1200px;
  margin: 0 auto;
  padding: 2rem 1.5rem;
}

/* Back Button */
.back-button {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  background: rgba(255, 255, 255, 0.05);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.1);
  color: #e5e7eb;
  padding: 0.75rem 1.25rem;
  border-radius: 12px;
  cursor: pointer;
  transition: all 0.3s ease;
  font-size: 0.95rem;
  margin-bottom: 2rem;
}

.back-button:hover {
  background: rgba(255, 255, 255, 0.1);
  transform: translateX(-4px);
}

/* Article Container */
.article-container {
  background: rgba(255, 255, 255, 0.03);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 24px;
  padding: 3rem;
  margin-bottom: 3rem;
  box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
}

/* Article Header */
.article-header {
  margin-bottom: 2.5rem;
}

.category-badge {
  display: inline-block;
  padding: 0.5rem 1rem;
  border-radius: 20px;
  font-size: 0.85rem;
  font-weight: 600;
  color: white;
  margin-bottom: 1.5rem;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.article-title {
  font-size: 3rem;
  font-weight: 800;
  line-height: 1.2;
  margin-bottom: 2rem;
  background: linear-gradient(135deg, #ffffff 0%, #a5b4fc 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

/* Article Meta */
.article-meta {
  display: flex;
  align-items: center;
  gap: 2rem;
  margin-bottom: 1.5rem;
  flex-wrap: wrap;
}

.author-info {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.avatar {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 600;
  font-size: 1.25rem;
  color: white;
  background-size: cover;
  background-position: center;
}

.author-details {
  display: flex;
  flex-direction: column;
  gap: 0.25rem;
}

.author-name {
  font-weight: 600;
  font-size: 1rem;
  color: #f3f4f6;
}

.author-role {
  font-size: 0.85rem;
  color: #9ca3af;
}

.meta-divider {
  width: 1px;
  height: 40px;
  background: rgba(255, 255, 255, 0.1);
}

.article-stats {
  display: flex;
  gap: 1.5rem;
  flex-wrap: wrap;
}

.stat-item {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  color: #9ca3af;
  font-size: 0.9rem;
}

.stat-item svg {
  opacity: 0.7;
}

/* Tags */
.tags-container {
  display: flex;
  flex-wrap: wrap;
  gap: 0.75rem;
}

.tag {
  background: rgba(139, 92, 246, 0.15);
  border: 1px solid rgba(139, 92, 246, 0.3);
  color: #c4b5fd;
  padding: 0.5rem 1rem;
  border-radius: 20px;
  font-size: 0.9rem;
  transition: all 0.3s ease;
}

.tag:hover {
  background: rgba(139, 92, 246, 0.25);
  transform: translateY(-2px);
}

/* Featured Image */
.featured-image {
  width: calc(100% + 6rem);
  margin: 0 -3rem 3rem -3rem;
  border-radius: 0 0 24px 24px;
  overflow: hidden;
  height: 500px;
}

.featured-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.featured-image:hover img {
  transform: scale(1.05);
}

/* Article Content */
.article-content {
  font-size: 1.125rem;
  line-height: 1.8;
  color: #d1d5db;
}

.article-content h2 {
  font-size: 2rem;
  font-weight: 700;
  color: #f3f4f6;
  margin: 2.5rem 0 1.25rem 0;
}

.article-content p {
  margin-bottom: 1.5rem;
}

.article-content blockquote {
  border-left: 4px solid #8b5cf6;
  padding: 1.5rem 2rem;
  margin: 2rem 0;
  background: rgba(139, 92, 246, 0.1);
  border-radius: 0 12px 12px 0;
  font-style: italic;
  color: #e5e7eb;
}

.article-content ul,
.article-content ol {
  margin: 1.5rem 0 1.5rem 2rem;
}

.article-content li {
  margin-bottom: 0.75rem;
}

.article-content strong {
  color: #f3f4f6;
  font-weight: 600;
}

/* Attachments Section */
.attachments-section {
  margin: 3rem 0;
  padding: 2rem;
  background: rgba(255, 255, 255, 0.02);
  border: 1px solid rgba(255, 255, 255, 0.05);
  border-radius: 16px;
}

.section-title {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  font-size: 1.25rem;
  font-weight: 600;
  color: #f3f4f6;
  margin-bottom: 1.5rem;
}

.attachments-grid {
  display: grid;
  gap: 1rem;
}

.attachment-card {
  display: flex;
  align-items: center;
  gap: 1rem;
  padding: 1.25rem;
  background: rgba(255, 255, 255, 0.03);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 12px;
  transition: all 0.3s ease;
  cursor: pointer;
  text-decoration: none;
  color: inherit;
}

.attachment-card:hover {
  background: rgba(255, 255, 255, 0.06);
  border-color: rgba(139, 92, 246, 0.5);
  transform: translateY(-2px);
}

.attachment-icon {
  width: 48px;
  height: 48px;
  border-radius: 12px;
  background: rgba(139, 92, 246, 0.2);
  display: flex;
  align-items: center;
  justify-content: center;
  color: #c4b5fd;
}

.attachment-info {
  flex: 1;
  display: flex;
  flex-direction: column;
  gap: 0.25rem;
}

.attachment-name {
  font-weight: 500;
  color: #f3f4f6;
}

.attachment-size {
  font-size: 0.85rem;
  color: #9ca3af;
}

.download-icon {
  color: #8b5cf6;
  opacity: 0.7;
  transition: all 0.3s ease;
}

.attachment-card:hover .download-icon {
  opacity: 1;
  transform: translateY(2px);
}

/* Article Footer */
.article-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 2rem 0;
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  margin-top: 3rem;
  flex-wrap: wrap;
  gap: 1.5rem;
}

.engagement-actions {
  display: flex;
  gap: 1rem;
}

.action-button {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.75rem 1.25rem;
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 12px;
  color: #e5e7eb;
  cursor: pointer;
  transition: all 0.3s ease;
  font-size: 0.95rem;
}

.action-button:hover {
  background: rgba(255, 255, 255, 0.1);
  transform: translateY(-2px);
}

.action-button.active {
  background: rgba(139, 92, 246, 0.2);
  border-color: rgba(139, 92, 246, 0.5);
  color: #c4b5fd;
}

.share-actions {
  display: flex;
  align-items: center;
  gap: 0.75rem;
}

.share-label {
  color: #9ca3af;
  font-size: 0.9rem;
}

.share-button {
  width: 40px;
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 10px;
  color: #e5e7eb;
  cursor: pointer;
  transition: all 0.3s ease;
}

.share-button:hover {
  background: rgba(139, 92, 246, 0.2);
  border-color: rgba(139, 92, 246, 0.5);
  transform: translateY(-2px);
}

/* Comments Section */
.comments-section {
  background: rgba(255, 255, 255, 0.03);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 24px;
  padding: 3rem;
  margin-bottom: 3rem;
}

.section-heading {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  font-size: 2rem;
  font-weight: 700;
  color: #f3f4f6;
  margin-bottom: 2rem;
}

.section-heading .count {
  color: #9ca3af;
  font-size: 1.5rem;
}

/* Add Comment Form */
.add-comment-form {
  display: flex;
  gap: 1rem;
  margin-bottom: 3rem;
}

.user-avatar {
  flex-shrink: 0;
}

.user-avatar span {
  width: 45px;
  height: 45px;
  border-radius: 50%;
  background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 600;
  color: white;
}

.comment-input-wrapper {
  flex: 1;
}

.comment-input {
  width: 100%;
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 12px;
  padding: 1rem;
  color: #e5e7eb;
  font-size: 0.95rem;
  font-family: inherit;
  resize: vertical;
  transition: all 0.3s ease;
}

.comment-input:focus {
  outline: none;
  border-color: rgba(139, 92, 246, 0.5);
  background: rgba(255, 255, 255, 0.08);
}

.comment-input::placeholder {
  color: #6b7280;
}

.comment-actions {
  display: flex;
  justify-content: flex-end;
  gap: 0.75rem;
  margin-top: 0.75rem;
}

.cancel-button,
.submit-button {
  padding: 0.625rem 1.5rem;
  border-radius: 10px;
  font-size: 0.9rem;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.3s ease;
}

.cancel-button {
  background: transparent;
  border: 1px solid rgba(255, 255, 255, 0.1);
  color: #9ca3af;
}

.cancel-button:hover {
  background: rgba(255, 255, 255, 0.05);
  color: #e5e7eb;
}

.submit-button {
  background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
  border: none;
  color: white;
}

.submit-button:hover:not(:disabled) {
  background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(139, 92, 246, 0.4);
}

.submit-button:disabled {
  opacity: 0.5;
  cursor: not-allowed;
}

/* Comments List */
.comments-list {
  display: flex;
  flex-direction: column;
  gap: 2rem;
}

.comment-item {
  display: flex;
  gap: 1rem;
}

.comment-avatar {
  flex-shrink: 0;
}

.comment-content {
  flex: 1;
}

.comment-header {
  display: flex;
  align-items: center;
  gap: 1rem;
  margin-bottom: 0.5rem;
}

.comment-author {
  font-weight: 600;
  color: #f3f4f6;
}

.comment-date {
  font-size: 0.85rem;
  color: #6b7280;
}

.comment-text {
  color: #d1d5db;
  line-height: 1.6;
  margin-bottom: 0.75rem;
}

.comment-actions-bar {
  display: flex;
  gap: 1rem;
}

.comment-action {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  background: transparent;
  border: none;
  color: #9ca3af;
  font-size: 0.85rem;
  cursor: pointer;
  transition: all 0.3s ease;
}

.comment-action:hover {
  color: #8b5cf6;
}

/* Related Posts Section */
.related-posts-section {
  background: rgba(255, 255, 255, 0.03);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 24px;
  padding: 3rem;
}

.related-posts-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 2rem;
}

.related-post-card {
  background: rgba(255, 255, 255, 0.03);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 16px;
  overflow: hidden;
  cursor: pointer;
  transition: all 0.3s ease;
}

.related-post-card:hover {
  background: rgba(255, 255, 255, 0.06);
  border-color: rgba(139, 92, 246, 0.5);
  transform: translateY(-4px);
  box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
}

.related-post-image {
  position: relative;
  width: 100%;
  height: 200px;
  overflow: hidden;
}

.related-post-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.related-post-card:hover .related-post-image img {
  transform: scale(1.1);
}

.related-post-overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.6);
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.related-post-card:hover .related-post-overlay {
  opacity: 1;
}

.read-more {
  color: white;
  font-weight: 600;
  font-size: 1rem;
}

.related-post-content {
  padding: 1.5rem;
}

.related-post-category {
  display: inline-block;
  font-size: 0.75rem;
  font-weight: 600;
  color: #8b5cf6;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  margin-bottom: 0.75rem;
}

.related-post-title {
  font-size: 1.25rem;
  font-weight: 700;
  color: #f3f4f6;
  margin-bottom: 0.75rem;
  line-height: 1.3;
}

.related-post-excerpt {
  font-size: 0.9rem;
  color: #9ca3af;
  line-height: 1.6;
  margin-bottom: 1rem;
}

.related-post-meta {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  font-size: 0.85rem;
  color: #6b7280;
}

.related-author {
  font-weight: 500;
}

/* Responsive Design */
@media (max-width: 768px) {
  .article-container {
    padding: 2rem 1.5rem;
  }

  .article-title {
    font-size: 2rem;
  }

  .article-meta {
    flex-direction: column;
    align-items: flex-start;
    gap: 1rem;
  }

  .meta-divider {
    display: none;
  }

  .featured-image {
    width: calc(100% + 3rem);
    margin: 0 -1.5rem 2rem -1.5rem;
    height: 300px;
  }

  .article-footer {
    flex-direction: column;
    align-items: flex-start;
  }

  .comments-section {
    padding: 2rem 1.5rem;
  }

  .add-comment-form {
    flex-direction: column;
  }

  .related-posts-grid {
    grid-template-columns: 1fr;
  }

  .content-wrapper {
    padding: 1.5rem 1rem;
  }
}
</style>
