<script setup lang="ts">
import { defineProps } from 'vue'

const props = defineProps<{
  text: string,
  onClick: () => void
}>()
</script>

<template>
  <button @click="props.onClick">{{ props.text }}</button>
</template>

<style scoped>
button {
  padding: 8px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}
</style>