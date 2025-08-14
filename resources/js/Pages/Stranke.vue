
<script setup lang="ts">
import { Inertia } from "@inertiajs/inertia"
import ButtonComponent from '../buttonComponent.vue'

defineProps({
  customers: Array
})

const goToAddCustomer = () => {
  Inertia.visit('/{id}/stranke/dodaj')
}
</script>

<template>
  <div class="napis">
    <h1>Seznam strank</h1>
    <table>
      <thead>
        <tr>
          <th>Ime</th>
          <th>Priimek</th>
          <th>Email</th>
          <th>Telefon</th>
          <th>Dejavnost</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="customer in customers" :key="customer.id">
          <td>{{ customer.ime }}</td>
          <td>{{ customer.priimek }}</td>
          <td>{{ customer.email }}</td>
          <td>{{ customer.telefonska_stevilka }}</td>
          <td>{{ customer.dejavnost }}</td>
        </tr>
      </tbody>
    </table>
    <ButtonComponent text="Dodaj stranko" @click="goToAddCustomer" />
  </div>
</template>

<style scoped>
.napis {
  max-width: 800px;
  margin: auto;
}
table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}
th, td {
  border: 1px solid #ddd;
  padding: 8px;
}
</style>