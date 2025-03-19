<script setup>
import { fetchAuthors } from '../../authors/store';
import { fetchBooks, getAllBooks } from '../store';
import BookOverview from '../components/BookOverview.vue';


fetchBooks();
fetchAuthors();

const books = getAllBooks;

</script>
<template>
    <header>
        <h2>Books overview</h2>
    </header>
    <main>
        <p>Number of books found: {{ books.length }}.</p>
        <ul v-if="books">
            <li  v-for="book in books"><BookOverview :book="book" /></li>
        </ul>
    </main>
</template>
<style scoped></style>
