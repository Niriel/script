<script setup lang="ts">
import { ref } from 'vue';

import { goBack, goToRoute } from '../../../services/router';
import { Book, bookStore, emptyBook } from '../store';
import BookForm from '../components/BookForm.vue';

const book = ref(emptyBook());

const onSubmitted = async (localBook: Book) => {
    await bookStore.actions.create(localBook);
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
        <BookForm :book="book" :buttonText="'Add to collection'" @submitted="onSubmitted" @canceled="onCanceled"/>
    </main>
</template>

<style scoped></style>
