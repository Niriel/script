<script setup>
import { useRouter } from 'vue-router';
import { getAllBooks } from '../store';
import BookHeadline from '../components/BookHeadline.vue';

const books = getAllBooks;

const router = useRouter();
const goToCreateBook = () => {
    router.push({ name:'books.create' });
};
</script>

<template>
    <header class="left_right">
        <div class="left">
            <h1>Books</h1>
        </div>
        <div class="right">
            <button @click="goToCreateBook">Add a book</button>
        </div>
    </header>
    <main>
        <p>Number of books found: {{ books.length }}.</p>
        <ul v-if="books">
            <li v-for="book in books"><BookHeadline :book="book" /></li>
        </ul>
    </main>
</template>
<style scoped></style>
