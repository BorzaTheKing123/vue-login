
<template>
  <div class="options">
    <h1 class="napis">Register</h1>
    <ButtonComponent @click="goToRegister" text="Registriraj se" />
    <h1 class="napis">Login</h1>
    <ButtonComponent @click="goToLogin" text="Logiraj se" />
  </div>
</template>

<script setup lang="ts">
import { Inertia } from "@inertiajs/inertia"
import ButtonComponent from '../buttonComponent.vue'

// Funkcije za preusmeritev
const goToRegister = () => Inertia.visit('/register')
const goToLogin = () => Inertia.visit('/login')
</script>
<style scoped>
.options {
  max-width: 300px;
  margin: auto;
  display: flex;
  flex-direction: column;
  gap: 10px;
}
.napis {
    margin: auto;
    gap: 100px
}
</style>