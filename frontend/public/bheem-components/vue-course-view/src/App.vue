<script setup lang="ts">
import CourseLayout from './components/layout/CourseLayout.vue'
import CourseContentOnly from './components/course/CourseContentOnly.vue'
</script>

<template>
  <CourseLayout>
    <CourseContentOnly />
  </CourseLayout>
</template>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

#app {
  width: 100%;
  min-height: 100vh;
}
</style>
