<script setup lang="ts">
import { fetchAuthors, getAllAuthors } from '../store';

fetchAuthors();

</script>
<template>
    <header>
        <h2>Authors overview</h2>
    </header>
    <main>
        <p>Number of authors found: {{ getAllAuthors.length }}.</p>
        <ul>
            <li v-for="author in getAllAuthors">{{ author.name }}</li>
        </ul>
    </main>
</template>
<style scoped></style>
