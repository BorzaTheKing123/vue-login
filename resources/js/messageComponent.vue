<script setup lang="ts">
import { defineProps } from 'vue'

const message = () => {
        return (res.data)
}
</script>

<template>
  <div class="message">
    <p>{{message}} </p>

  </div>
</template>

<style scoped>
.message {
  display: flex;
  flex-direction: column;
  margin-bottom: 10px;
}

</style>