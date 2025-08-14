<script setup lang="ts">
import { Inertia } from '@inertiajs/inertia'
import ButtonComponent from '../buttonComponent.vue'
//const router = useRouter()

// Funkcije za preusmeritev
const goToRegister = () => {
  Inertia.visit('/register')  // URL v Laravel route
}

const goToLogin = () => {
  Inertia.visit('/login')
}
</script>

<template>
  <div class="options">
    <h1>Register</h1>
    <ButtonComponent text="Registriraj se" :onClick="goToRegister" />
    <h1>Login</h1>
    <ButtonComponent text="Logiraj se" :onClick="goToLogin" />
  </div>
</template>

<style scoped>
.options {
  max-width: 300px;
  margin: auto;
  display: flex;
  flex-direction: column;
  gap: 10px;
}
</style>