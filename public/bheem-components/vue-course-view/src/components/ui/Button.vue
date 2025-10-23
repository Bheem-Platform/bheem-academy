<template>
  <button
    :type="type"
    :disabled="disabled || loading"
    :class="['btn', `btn-${variant}`, { 'btn-loading': loading, 'btn-disabled': disabled }]"
    @click="$emit('click', $event)"
  >
    <span v-if="loading" class="spinner"></span>
    <slot v-else />
  </button>
</template>

<script setup lang="ts">
import { defineProps, defineEmits } from 'vue'

interface Props {
  type?: 'button' | 'submit' | 'reset'
  variant?: 'primary' | 'secondary' | 'outline'
  loading?: boolean
  disabled?: boolean
}

withDefaults(defineProps<Props>(), {
  type: 'button',
  variant: 'primary',
  loading: false,
  disabled: false
})

defineEmits(['click'])
</script>

<style scoped>
.btn {
  width: 100%;
  padding: 14px 24px;
  font-size: 1rem;
  font-weight: 600;
  border-radius: 12px;
  border: none;
  cursor: pointer;
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  font-family: 'Inter', sans-serif;
  outline: none;
  position: relative;
}

.btn:active {
  transform: translateY(1px);
}

/* Primary Button */
.btn-primary {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
}

.btn-primary:hover:not(:disabled) {
  box-shadow: 0 8px 20px rgba(102, 126, 234, 0.5);
  transform: translateY(-2px);
}

.btn-primary:focus {
  box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.3);
}

/* Secondary Button */
.btn-secondary {
  background: #f7fafc;
  color: #2d3748;
  border: 2px solid #e2e8f0;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
}

.btn-secondary:hover:not(:disabled) {
  background: #edf2f7;
  border-color: #cbd5e0;
  transform: translateY(-2px);
}

.btn-secondary:focus {
  box-shadow: 0 0 0 3px rgba(226, 232, 240, 0.5);
}

/* Outline Button */
.btn-outline {
  background: transparent;
  color: #667eea;
  border: 2px solid #667eea;
}

.btn-outline:hover:not(:disabled) {
  background: #667eea;
  color: white;
}

/* Loading State */
.btn-loading {
  pointer-events: none;
  opacity: 0.8;
}

.spinner {
  width: 20px;
  height: 20px;
  border: 3px solid rgba(255, 255, 255, 0.3);
  border-top-color: white;
  border-radius: 50%;
  animation: spin 0.8s linear infinite;
}

@keyframes spin {
  to { transform: rotate(360deg); }
}

/* Disabled State */
.btn-disabled,
.btn:disabled {
  opacity: 0.5;
  cursor: not-allowed;
  transform: none !important;
}

.btn-disabled:hover,
.btn:disabled:hover {
  transform: none !important;
  box-shadow: initial;
}
</style>
