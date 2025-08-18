
<script setup lang="ts">
import { ref } from 'vue'
import axios from 'axios'
import InputComponent from '../inputComponent.vue'
import ButtonComponent from '../buttonComponent.vue'

const email = ref('')
const password = ref('')

const submitForm = async () => {
  try {
    // 'await' počaka, da se axios klic konča
    const response = await axios.post("/login", {
      email: email.value,
      password: password.value,
    });

    // Ta koda se izvede samo, če je bila prijava uspešna
    console.log("Prijava uspešna!", response.data);
    window.location.href = `${response.data}/stranke`; // Preusmeri

  } catch (err) {
    // 'catch' blok se zdaj pravilno izvede, če pride do napake
    console.error("Napaka pri prijavi:", err.response.data);
    
    // Pokaži sporočilo o napaki uporabniku
    const errorElement = document.getElementById('error-message');
    if (errorElement) {
        errorElement.textContent = 'Napačno uporabniško ime ali geslo.';
    }
  }
}

</script>


<template>
  <div class="login">
    <h1>Login</h1>
    <InputComponent v-model="email" namen="email"></InputComponent>
    <InputComponent v-model="password" namen="password"></InputComponent>
    <ButtonComponent text="Logiraj se" @click="submitForm"></ButtonComponent>
  </div>
</template>
 
<style scoped>
.login {
  max-width: 300px;
  margin: auto;
  display: flex;
  flex-direction: column;
}

button {
  padding: 8px;
  background-color: #4CAF50;
  border: none;
  color: white;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}
</style>

