<script setup>
import { ref } from 'vue'

// Sprejme besedilo za label kot prop
const props = defineProps<{
  namen: string
}>()

// Shranjuje vpisano besedilo
const text = ref('')
</script>

<template>
  <label for="prostorček">{{ props.namen }}</label>
  <input v-model="text" placeholder="Tukaj začni pisati: " id="prostorček">
</template>

<style scoped>
input {
  border: 2px solid #ccc;
  border-radius: 5px;
  padding: 6px;
}
</style>