<script setup lang="ts">
import { Inertia } from "@inertiajs/inertia"
import ButtonComponent from '../buttonComponent.vue'
import { ref, onMounted } from 'vue'
import axios from 'axios'


// Sprejem 'id' props-a, ki ga pošlje Laravel/Inertia
const props = defineProps({
  id: {
    type: [Number, String], // Tip je lahko število ali niz
    required: true
  }
})

// Reaktivne spremenljivke
const customers = ref<any[]>([])  // seznam strank
const isLoading = ref(true)       // status nalaganja
const error = ref<string | null>(null) // napaka, če pride do nje

// GET request ob mountu
onMounted(() => {
  const url = `/${props.id}/stranke`
  console.log(`Pošiljam GET zahtevek na: ${url}`)

  axios.get(url)
    .then(response => {
      customers.value = response.data
    })
    .catch(err => {
      console.error("Prišlo je do napake:", err)
      error.value = "Ni bilo mogoče naložiti podatkov."
    })
    .finally(() => {
      isLoading.value = false
    })
})

// Funkcija za gumb "Dodaj stranko"
const goToAddCustomer = () => {
  Inertia.visit(`/${props.id}/stranke/dodaj`)
}
</script>

<template>
  <div class="napis">
    <h1>Seznam strank</h1>

    <div v-if="customers.length > 0">
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
    </div>
    <div v-else class="empty-state">
      <p>Trenutno nimate dodanih strank.</p>
    </div>

    <div class="actions-container">
      <ButtonComponent text="DODAJ STRANKE" @click="goToAddCustomer"></ButtonComponent>
    </div>
  </div>
</template>

<style scoped>

.napis {
  max-width: 900px;
  margin: 40px auto;
  padding: 2rem;
  background-color: #ffffff;
  border-radius: 12px;
  box-shadow: 0 8px 30px rgba(0, 0, 0, 0.07);
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
}

h1 {
  font-size: 2rem;
  font-weight: 700;
  color: #1a202c;
  margin-bottom: 2rem;
  border-bottom: 1px solid #e2e8f0;
  padding-bottom: 1rem;
}

/* ----- Stil Tabele ----- */
table {
  width: 100%;
  border-collapse: collapse;
  text-align: left;
}

thead {
  background-color: #f7fafc;
  border-bottom: 2px solid #e2e8f0;
}

th {
  padding: 1rem 1.5rem;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  font-size: 0.75rem;
  font-weight: 600;
  color: #718096;
}

tbody tr {
  border-bottom: 1px solid #e2e8f0;
  transition: background-color 0.2s ease-in-out;
}

/* Zebra striping - za boljšo berljivost */
tbody tr:nth-child(even) {
  background-color: #fdfdfe;
}

/* Hover efekt na vrsticah */
tbody tr:hover {
  background-color: #f0f4ff;
}

td {
  padding: 1rem 1.5rem;
  color: #2d3748;
  vertical-align: middle;
}

/* ----- Sporočilo, ko ni strank ----- */
.empty-state {
  text-align: center;
  padding: 3rem;
  background-color: #f7fafc;
  border-radius: 8px;
  border: 1px dashed #cbd5e0;
  color: #718096;
  margin: 1rem 0 2rem 0;
}

/* ----- Gumb in Akcije ----- */
.actions-container {
  display: flex;
  justify-content: flex-end; /* Gumb poravna na desno */
  margin-top: 2rem;
}

/* Stil za Link komponento, da bo izgledala kot gumb */
a {
  display: inline-block;
  padding: 0.75rem 1.5rem;
  background-color: #4a5568;
  color: white;
  border: none;
  border-radius: 8px;
  font-weight: 600;
  text-decoration: none;
  cursor: pointer;
  transition: background-color 0.2s ease-in-out, transform 0.1s ease;
}

a:hover {
  background-color: #2d3748;
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}
</style>
