<template>
  <div class="input-wrapper">
    <div class="input-container" :class="{ 'has-error': error, 'has-suffix': $slots.suffix }">
      <input
        :id="id"
        :type="type"
        :value="modelValue"
        :placeholder="placeholder"
        :disabled="disabled"
        :required="required"
        :autocomplete="autocomplete"
        class="input-field"
        @input="handleInput"
        @blur="$emit('blur')"
        @focus="$emit('focus')"
      />
      <div v-if="$slots.suffix" class="input-suffix">
        <slot name="suffix" />
      </div>
    </div>
    <p v-if="error" class="error-text">
      <i class="fas fa-exclamation-circle"></i>
      {{ error }}
    </p>
  </div>
</template>

<script setup lang="ts">
import { defineProps, defineEmits } from 'vue'

interface Props {
  id?: string
  modelValue: string
  type?: string
  placeholder?: string
  error?: string
  disabled?: boolean
  required?: boolean
  autocomplete?: string
}

withDefaults(defineProps<Props>(), {
  type: 'text',
  placeholder: '',
  error: '',
  disabled: false,
  required: false,
  autocomplete: 'off'
})

const emit = defineEmits(['update:modelValue', 'blur', 'focus'])

const handleInput = (event: Event) => {
  const target = event.target as HTMLInputElement
  emit('update:modelValue', target.value)
}
</script>

<style scoped>
.input-wrapper {
  width: 100%;
}

.input-container {
  position: relative;
  display: flex;
  align-items: center;
}

.input-field {
  width: 100%;
  padding: 14px 16px;
  font-size: 0.95rem;
  border: 2px solid #e2e8f0;
  border-radius: 12px;
  background: #ffffff;
  color: #1a202c;
  transition: all 0.3s ease;
  outline: none;
  font-family: 'Inter', sans-serif;
}

.input-container.has-suffix .input-field {
  padding-right: 48px;
}

.input-field::placeholder {
  color: #a0aec0;
}

.input-field:focus {
  border-color: #667eea;
  box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.input-field:disabled {
  background: #f7fafc;
  cursor: not-allowed;
  opacity: 0.6;
}

.input-container.has-error .input-field {
  border-color: #fc8181;
}

.input-container.has-error .input-field:focus {
  box-shadow: 0 0 0 3px rgba(252, 129, 129, 0.1);
}

.input-suffix {
  position: absolute;
  right: 4px;
  display: flex;
  align-items: center;
}

.error-text {
  margin-top: 6px;
  font-size: 0.85rem;
  color: #e53e3e;
  display: flex;
  align-items: center;
  gap: 6px;
}

.error-text i {
  font-size: 0.75rem;
}
</style>
