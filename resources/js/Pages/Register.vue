<script setup lang="ts">
import { ref } from 'vue'
import axios from 'axios'
import InputComponent from '../inputComponent.vue'
import ButtonComponent from '../buttonComponent.vue'

const name = ref('')
const email = ref('')
const password = ref('')

const submitForm = async () => {
  try {
    const res = await axios.post("/register", {
      name: name.value,
      email: email.value,
      password: password.value,
    })
    console.log(res.data)
  } catch (err) {
    console.error(err)
  }
}
</script>


<template>
  <div class="register">
    <h1>Registracija</h1>
    <InputComponent v-model="name" namen="name"></InputComponent>
    <InputComponent v-model="email" namen="email"></InputComponent>
    <InputComponent v-model="password" namen="password"></InputComponent>
    <ButtonComponent text="Registriraj se" :onClick="submitForm"></ButtonComponent>
  </div>
</template>
 
<style scoped>
.register {
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