
<script setup lang="ts">
import { ref } from 'vue'
import axios from 'axios'
import { Inertia } from '@inertiajs/inertia'
import ButtonComponent from '../buttonComponent.vue'

const ime = ref('')
const priimek = ref('')
const email = ref('')
const telefonska_stevilka = ref('')
const dejavnost = ref('')

const addCustomer = async () => {
  await axios.post('/customers', {
    ime: ime.value,
    priimek: priimek.value,
    email: email.value,
    telefonska_stevilka: telefonska_stevilka.value,
    dejavnost: dejavnost.value
  })
  Inertia.visit('/{id}/stranke')
}
</script>

<template>
  <div class="form-container">
    <h1>Dodaj stranko</h1>
    <input v-model="ime" type="text" placeholder="Ime" />
    <input v-model="priimek" type="text" placeholder="Priimek" />
    <input v-model="email" type="email" placeholder="Email" />
    <input v-model="telefonska_stevilka" type="text" placeholder="Telefonska številka" />
    <input v-model="dejavnost" type="text" placeholder="Dejavnost" />
    <ButtonComponent text="Shrani" @click="addCustomer" />
  </div>
</template>

<style scoped>
.form-container {
  max-width: 300px;
  margin: auto;
  display: flex;
  flex-direction: column;
  gap: 10px;
}
input {
  border: 1px solid #ccc;
  padding: 5px;
  border-radius: 4px;
}
</style>