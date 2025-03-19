<script setup>
import { fetchAuthors, getAllAuthors } from '../store';

fetchAuthors();

const authors = getAllAuthors;

</script>
<template>
    <header>
        <h2>Authors overview</h2>
    </header>
    <main>
        <p>Number of authors found: {{ authors.length }}.</p>
        <ul>
            <li v-for="author in authors">{{ author.name }}</li>
        </ul>
    </main>
</template>
<style scoped></style>
