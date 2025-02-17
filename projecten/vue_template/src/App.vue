<script setup>
import {ref, reactive} from 'vue';

const clicks = ref(0);
const person = reactive({firstName: '', country: ''});

function incClicks() {
    clicks.value++;
}

function resetFirstName() {
    person.firstName = 'Garry';
}

function resetCountry() {
    person.country = 'Morrowind';
}

resetFirstName();
resetCountry();
</script>

<template>
    <h1>{{ person.firstName }} from {{ person.country }}</h1>
    <button type="button" @click="incClicks">Click {{ clicks }}</button>
    <button type="button" @click="resetFirstName">Reset first name</button>
    <button type="button" @click="resetCountry">Reset country</button>
    <br />
    <input type="text" v-model="person.firstName" />
    from
    <input type="text" v-model="person.country" />
</template>

<style scoped></style>
