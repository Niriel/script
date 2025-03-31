<script setup lang="ts">
import { ref } from 'vue';

import { goBack, goToRoute } from '../../../services/router';
import { Book, createBook, emptyBook } from '../store';
import BookForm from '../components/BookForm.vue';

const book = ref(emptyBook());

const onSumbited = async (localBook: Book) => {
    await createBook(localBook);
    goToRoute('books.overview');
}

const onCanceled = () => {
    goBack();
}

</script>
<template>
    <header>
        <h1 class="page_title center">Add a new book</h1>
    </header>
    <main>
        <BookForm :book="book" :buttonText="'Add to collection'" @submited="onSumbited" @canceled="onCanceled"/>
    </main>
</template>

<style scoped></style>
