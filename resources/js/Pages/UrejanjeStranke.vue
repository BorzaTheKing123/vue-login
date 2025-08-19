<script setup lang="ts">
import { ref } from 'vue'
import axios from 'axios'
import ButtonComponent from '../buttonComponent.vue'

const props = defineProps({
  id: {
    type: [Number, String],
    required: true
  },
  existingCustomer: {      // Če želiš predpolniti formo s podatki
    type: Object,
    default: () => ({})
  }
})

const name = ref('')
const email = ref('')
const phone = ref('')
const dejavnost = ref('')
const error = ref<string | null>(null)

const addCustomer = async () => {
  error.value = null
  if (!name.value && !props.existingCustomer.name) {
    error.value = "Polje Ime je obvezno."
    return
  }
  if (!email.value && !props.existingCustomer.email) {
    error.value = "Polje Email je obvezno."
    return
  }

  const url = `/${props.id}/stranke/dodaj`
  try {
    await axios.post(url, {
      name: name.value || props.existingCustomer.name,
      email: email.value || props.existingCustomer.email,
      phone: phone.value || props.existingCustomer.phone,
      dejavnost: dejavnost.value || props.existingCustomer.dejavnost,
      user_id: props.id
    })
    alert('Stranka je bila uspešno dodana!')
    window.location.href = `/${props.id}/stranke`;
  } catch (err) {
    console.error("Napaka pri dodajanju stranke:", err)
    error.value = "Prišlo je do napake pri shranjevanju. Prosimo, preverite podatke."
  }
}
</script>

<template>
  <div class="form-card">
    <h1 class="title">Dodaj stranko</h1>

    <div v-if="error" class="error-message">
      {{ error }}
    </div>

    <div class="form-group">
      <input 
        v-model="name" 
        type="text" 
        :placeholder="props.existingCustomer.name || 'Ime'" 
      />
      <input 
        v-model="email" 
        type="email" 
        :placeholder="props.existingCustomer.email || 'Email'" 
      />
      <input 
        v-model="phone" 
        type="text" 
        :placeholder="props.existingCustomer.phone || 'Telefonska številka'" 
      />
      <input 
        v-model="dejavnost" 
        type="text" 
        :placeholder="props.existingCustomer.dejavnost || 'Dejavnost'" 
      />
    </div>
    
    <ButtonComponent text="Shrani" @click="addCustomer" class="submit-btn"></ButtonComponent>
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
