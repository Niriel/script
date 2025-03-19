<script setup lang="ts">
import { useRoute, useRouter } from 'vue-router';

import { Book, fetchBooks, getBookById } from '../store';
import BookForm from '../components/BookForm.vue';

const route = useRoute();
const router = useRouter();

let book_id: number = 0;
if (typeof route.params.id === 'string') {
    book_id = parseInt(route.params.id);
} else {
    // TODO: WHAT IF string[]?
}

fetchBooks();

const book = getBookById(book_id);

const onBookFormSumbitted = (localBook: Book) => {
    // editBook(localBook);
    console.log(book);
    router.push({ name: 'books.overview' });
}

</script>
<template>
    <header>
        <h2>Create</h2>
    </header>
    <main>
        <BookForm :book="book" :buttonText="'Edit'" @submit="onBookFormSumbitted"/>
    </main>
</template>

<style scoped></style>
