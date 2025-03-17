<script setup>
import BookForm from '../components/BookForm.vue';
import { emptyBook } from '../store';

const book = emptyBook();

</script>
<template>
    <header>
        <h2>Create</h2>
    </header>
    <main>
        <BookForm :book="book" :buttonText="'Add to collection'" />
    </main>
</template>

<style scoped></style>
