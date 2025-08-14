<script setup lang="ts">
import { defineProps } from 'vue'

const props = defineProps<{ text: string }>()
</script>

<template>
  <button @click="$emit('click')">{{ props.text }}</button>
</template>

<style scoped>
button {
  padding: 8px 12px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}
button:hover {
  background-color: #45a049;
}
</style>