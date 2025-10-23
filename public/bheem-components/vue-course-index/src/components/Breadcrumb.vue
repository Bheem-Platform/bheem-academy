<template>
  <nav class="breadcrumb-nav" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/">
          <i class="fas fa-home"></i>
          <span>Home</span>
        </a>
      </li>
      <li class="breadcrumb-separator">
        <i class="fas fa-chevron-right"></i>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        <span>Courses</span>
      </li>
    </ol>
  </nav>
</template>

<style scoped>
.breadcrumb-nav {
  background: rgba(255, 255, 255, 0.03);
  border-bottom: 1px solid rgba(255, 255, 255, 0.08);
  padding: 16px 0;
}

.breadcrumb {
  max-width: 1400px;
  margin: 0 auto;
  padding: 0 24px;
  display: flex;
  align-items: center;
  gap: 12px;
  list-style: none;
}

.breadcrumb-item {
  display: flex;
  align-items: center;
  gap: 8px;
}

.breadcrumb-item a {
  display: flex;
  align-items: center;
  gap: 8px;
  color: var(--text-muted);
  text-decoration: none;
  font-size: 0.9rem;
  font-weight: 500;
  transition: all 0.2s ease;
  padding: 6px 12px;
  border-radius: 8px;
}

.breadcrumb-item a:hover {
  color: var(--text-primary);
  background: rgba(255, 255, 255, 0.05);
}

.breadcrumb-item a i {
  font-size: 0.95rem;
}

.breadcrumb-item.active span {
  color: var(--text-primary);
  font-weight: 600;
  font-size: 0.9rem;
}

.breadcrumb-separator {
  color: rgba(255, 255, 255, 0.3);
  font-size: 0.75rem;
}

@media (max-width: 768px) {
  .breadcrumb {
    padding: 0 16px;
    gap: 8px;
  }

  .breadcrumb-item a,
  .breadcrumb-item.active span {
    font-size: 0.85rem;
  }

  .breadcrumb-item a span {
    display: none;
  }
}
</style>
