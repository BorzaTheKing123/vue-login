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

</style>// --- NOVE FUNKCIJE ZA MODALNO OKNO ---

// Odpre modalno okno in nastavi izbrano stranko
const openActionsModal = (customer: Customer) => {
  selectedCustomer.value = customer
  isModalVisible.value = true
}

// Zapre modalno okno
const closeModal = () => {
  isModalVisible.value = false
  selectedCustomer.value = null
}

// Preusmeri na stran za urejanje stranke
const urediStranko = () => {
  if (!selectedCustomer.value) return
  // Predpostavljamo, da je pot za urejanje '/{id}/stranke/{customerId}/uredi'
  window.location.href = `/${props.id}/stranke/${selectedCustomer.value.name}`
}

// Izbriše izbrano stranko
const izbrisiStranko = () => {
  if (!selectedCustomer.value) return
  
  // Potrditveno okno pred brisanjem
  if (confirm(`Ali ste prepričani, da želite izbrisati stranko ${selectedCustomer.value.name}?`)) {
    const customerName = selectedCustomer.value.name
    const url = `/${props.id}/stranke/${customerName}`

    axios.delete(url)
      .then(() => {
        // Uspešno izbrisano - odstrani stranko iz lokalnega seznama
        customers.value = customers.value.filter(c => c.name !== customerName)
        closeModal() // Zapri modalno okno po uspešnem brisanju
      })
      .catch(err => {
        console.error("Napaka pri brisanju:", err)
        alert("Prišlo je do napake pri brisanju stranke.")
      })
  }
}