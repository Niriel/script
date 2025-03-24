<script setup lang="ts">
import { ref } from 'vue';
import { useRouter } from 'vue-router';

import { Book, createBook, emptyBook } from '../store';
import BookForm from '../components/BookForm.vue';

const router = useRouter();

const book = ref(emptyBook());

const onBookFormSumbitted = async (localBook: Book) => {
    await createBook(localBook);
    router.push({ name: 'books.overview' });
}

</script>
<template>
    <header>
        <h2>Create</h2>
    </header>
    <main>
        <BookForm :book="book" :buttonText="'Add to collection'" @submit="onBookFormSumbitted"/>
    </main>
</template>

<style scoped></style>
