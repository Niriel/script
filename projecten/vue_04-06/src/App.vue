<script setup>
import {ref, reactive, computed} from 'vue';

//====================================================
// Opdracht 4. Ref & Reactive.
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
// Opdracht 5. De v-for directive.
const tasks = ref([
    {name: 'Boodschappen doen', completed: false},
    {name: 'Afwassen', completed: true},
    {name: 'Hond uitlaten', completed: false},
]);

function toggleTaskCompletion(task) {
    task.completed = !task.completed;
}

//====================================================
// Opdracht 6. Computed properties.
const people = ref([
    {name: 'Jan', age: 12},
    {name: 'Piet', age: 20},
]);

const children = computed(() => {
    return people.value.filter(person => {
        return person.age < 18;
    });
});

const nbChildren = computed(() => {
    return children.value.length;
});

const newPersonName = ref('Alice');
const newPersonAge = ref(17);

function addPerson(name, age) {
    people.value.push({name: name, age: age});
}
</script>

<template>
    <section id="opdracht_4">
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
    <section id="opdracht_5">
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
    <hr />
    <section id="opdracht_6">
        <div>
            <label for="op6_name">Name:</label>
            &nbsp;
            <input type="text" id="op6_name" placeholder="Bob" v-model="newPersonName" />
            &nbsp;
            <label for="op6_age">Age:</label>
            &nbsp;
            <input type="number" id="op6_age" v-model="newPersonAge" size="3" />
            &nbsp;
            <button type="button" @click="addPerson(newPersonName, newPersonAge)">Add</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Everybody</th>
                    <th>Children</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <ul>
                            <li v-for="(person, index) in people" :key="index">{{ person.name }} ({{ person.age }})</li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li v-for="(person, index) in children" :key="index">
                                {{ person.name }} ({{ person.age }})
                            </li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
        <p>Number of children: {{ nbChildren }}.</p>
    </section>
    <hr />
</template>

<style scoped></style>
