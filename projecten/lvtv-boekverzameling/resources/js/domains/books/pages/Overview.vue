<script setup>
import { useRouter } from 'vue-router';
import { fetchBooks, getAllBooks } from '../store';
import BookHeadline from '../components/BookHeadline.vue';
import { fetchAuthors } from '../../authors/store';

fetchBooks();
fetchAuthors();
const books = getAllBooks;

const router = useRouter();
const goToCreateBook = () => {
    router.push({ name:'books.create' });
};
</script>
<template>
    <header>
        <h2>Books overview</h2>
    </header>
    <main>
        <p>Number of books found: {{ books.length }}.</p>
        <button @click="goToCreateBook">Add a book to the collection</button>
        <ul v-if="books">
            <li v-for="book in books"><BookHeadline :book="book" /></li>
        </ul>
    </main>
</template>
<style scoped></style>
