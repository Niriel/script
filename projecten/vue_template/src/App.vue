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
//====================================================
const tasks = ref([
    {name: 'Boodschappen doen', completed: false},
    {name: 'Afwassen', completed: true},
    {name: 'Hond uitlaten', completed: false},
]);

function toggleTaskCompletion(task) {
    task.completed = !task.completed;
}
</script>

<template>
    <section>
        <div>
            <h2>Hello, {{ person.firstName }} from {{ person.country }}</h2>
            <button type="button" @click="incClicks">Click {{ clicks }}</button>
            <button type="button" @click="resetFirstName">Reset first name</button>
            <button type="button" @click="resetCountry">Reset country</button>
            <br />
            <input type="text" v-model="person.firstName" />
            from
            <input type="text" v-model="person.country" />
        </div>
    </section>
    <hr />
    <section>
        <div>
            <h2>Things to do</h2>
            <ul>
                <li v-for="(task, index) in tasks" :key="index">
                    {{ task.name }}, {{ task.completed ? 'done' : 'to do' }}.
                    <button type="button" @click="toggleTaskCompletion(task)">toggle completed</button>
                </li>
            </ul>
        </div>
    </section>
</template>

<style scoped></style>
