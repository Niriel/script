<script setup>
import BookOverview from '../components/BookOverview.vue';
import { fetchBooks, getAllBooks } from '../store';

fetchBooks();

const books = getAllBooks;

</script>
<template>
    <header>
        <h2>Books overview</h2>
    </header>
    <main>
        <p>Number of books found: {{ books.length }}.</p>
        <ul>
            <li v-for="book in books"><BookOverview :book="book" /></li>
        </ul>
    </main>
</template>
<style scoped></style>
