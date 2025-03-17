<script setup>
import BaseButton from '../components/BaseButton.vue';
import { fetchBooks, getAllBooks } from '../store';

fetchBooks();

const books = getAllBooks;

</script>
<template>
    <header>
        <h2>Overview</h2>
    </header>
    <main>
        <p>Number of books found: {{ books.length }}.</p>
        <ul>
            <li v-for="book in books">{{ book.title }}</li>
        </ul>
    </main>
</template>
<style scoped></style>
