<script setup lang="ts">
import { ref } from 'vue';
import { useRouter } from 'vue-router';

import { Book, createBook, emptyBook } from '../store';
import BookForm from '../components/BookForm.vue';

const router = useRouter();

const book = ref(emptyBook());

const onSumbited = async (localBook: Book) => {
    await createBook(localBook);
    router.push({ name: 'books.overview' });
}

const onCanceled = () => {
    router.go(-1);
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
