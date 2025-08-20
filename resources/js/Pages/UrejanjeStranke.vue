<script setup lang="ts">
import { ref, onMounted } from 'vue'
import axios from 'axios'
import ButtonComponent from '../buttonComponent.vue'

// Props od Inertia/Laravel strani
interface Customer {
  id: number;
  name: string;
  email: string;
  phone: string;
  dejavnost: string;
}

const props = defineProps({
  id: { type: [Number, String], required: true },
  stranka: {
    type: Object as () => Customer,
    required: true
  }
})

// reaktivna polja
const customerId = ref<number | null>(null)
const name = ref('')
const email = ref('')
const phone = ref('')
const dejavnost = ref('')
const error = ref<string | null>(null)
const isLoading = ref(true)

// --- Naložimo obstoječo stranko ob mountu ---
onMounted(() => {
  try {
    customerId.value = props.stranka.id
    name.value = props.stranka.name
    email.value = props.stranka.email
    phone.value = props.stranka.phone
    dejavnost.value = props.stranka.dejavnost
  } catch (err) {
    console.error("Napaka pri nalaganju stranke:", err)
    error.value = "Ni bilo mogoče naložiti podatkov o stranki."
  } finally {
    isLoading.value = false
  }
})

// --- Posodobi obstoječo stranko ---
const updateCustomer = async () => {
  if (!name.value) return
  error.value = null

  try {
    await axios.put(`/${props.id}/stranke/${name.value}`, {
      name: name.value,
      email: email.value,
      phone: phone.value,
      dejavnost: dejavnost.value,
    })
    alert('Stranka je bila uspešno posodobljena!')
    window.location.href = `/${props.id}/stranke`
  } catch (err) {
    console.error("Napaka pri posodobitvi:", err)
    error.value = "Prišlo je do napake pri shranjevanju."
  }
}

// --- Izbriši stranko ---
const deleteCustomer = async () => {
  if (!name.value) return

  if (confirm(`Ali res želite izbrisati stranko ${name.value}?`)) {
    try {
      await axios.delete(`/${props.id}/stranke/${name.value}`)
      alert('Stranka je bila uspešno izbrisana!')
      window.location.href = `/${props.id}/stranke`
    } catch (err) {
      console.error("Napaka pri brisanju:", err)
      error.value = "Prišlo je do napake pri brisanju stranke."
    }
  }
}
</script>


<template>
  <div class="form-card">
    <h1 class="title">Uredi stranko</h1>

    <div v-if="isLoading">Nalaganje...</div>
    <div v-else>
      <div v-if="error" class="error-message">{{ error }}</div>

      <div class="form-group">
        <input v-model="name" type="text" placeholder="Ime" />
        <input v-model="email" type="email" placeholder="Email" />
        <input v-model="phone" type="text" placeholder="Telefon" />
        <input v-model="dejavnost" type="text" placeholder="Dejavnost" />
      </div>

      <div class="actions">
        <ButtonComponent text="Shrani spremembe" @click="updateCustomer" />
        <ButtonComponent text="Izbriši" @click="deleteCustomer" class="delete-btn" />
      </div>
    </div>
  </div>
</template>

<style scoped>
.form-card {
  max-width: 600px;
  margin: 40px auto;
  padding: 2rem;
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 6px 24px rgba(0,0,0,0.08);
}

.title {
  font-size: 1.8rem;
  font-weight: bold;
  margin-bottom: 1.5rem;
  color: #1a202c;
}

.form-group {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

input {
  padding: 0.75rem;
  border: 1px solid #cbd5e0;
  border-radius: 8px;
}

.actions {
  margin-top: 2rem;
  display: flex;
  gap: 1rem;
}

.delete-btn {
  background: #e53e3e;
  color: white;
}
</style>
