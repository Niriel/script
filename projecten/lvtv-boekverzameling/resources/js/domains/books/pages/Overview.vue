<script setup>
import { goToRoute } from '../../../services/router';
import { getAllBooks } from '../store';
import BookHeadline from '../components/BookHeadline.vue';

const books = getAllBooks;

const goToCreateBook = () => {
    goToRoute('books.create');
};
</script>

<template>
    <header>
        <div class="page_header">
            <div class="columns">
                <div class="column_fix category">Books</div>
                <div class="column_grow center page_title"><h1>Books</h1></div>
                <div class="column_fix button_row"><button @click="goToCreateBook">Add a book</button></div>
            </div>
        </div>
    </header>
    <main>
        <p>Number of books: {{ books.length }}.</p>
        <ul v-if="books">
            <li v-for="book in books"><BookHeadline :book="book" /></li>
        </ul>
        <button @click="goToCreateBook">Add a book</button>
    </main>
</template>
<style scoped></style>
