<script setup lang="ts">
import { useRoute } from 'vue-router';

import { goBack, goToRoute } from '../../../services/router';
import { getRouteId, maybe } from '../../../utils/funcs';
import { Book, editBook, getBookById } from '../store';
import BookForm from '../components/BookForm.vue';

const route = useRoute();
const book_id = getRouteId(route);
const book = maybe(getBookById)(book_id);

const onSumbitted = async (localBook: Book) => {
    await editBook(localBook);
    goToRoute('books.show', localBook.id);
}
const onCanceled = () => {
    goBack();
}
</script>

<template>
    <template v-if="book">
        <header>
            <h1 class="page_title center">Edit book</h1>
        </header>
        <main>
            <BookForm :book="book" :buttonText="'Edit'" @submited="onSumbitted" @canceled="onCanceled"/>
        </main>
    </template>
    <template v-else>
        404
    </template>
</template>

<style scoped></style>
