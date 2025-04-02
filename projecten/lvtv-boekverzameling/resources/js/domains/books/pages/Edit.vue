<script setup lang="ts">
import { useRoute } from 'vue-router';

import { goBack, goToRoute } from '../../../services/router';
import { getRouteId, maybe } from '../../../utils/funcs';
import { Book, bookStore } from '../store';
import BookForm from '../components/BookForm.vue';

const route = useRoute();
const book_id = getRouteId(route);
const book = maybe(bookStore.getters.byId)(book_id);

const onSumbitted = async (localBook: Book) => {
    await bookStore.actions.update(localBook);
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
            <BookForm :book="book" :buttonText="'Edit'" @submitted="onSumbitted" @canceled="onCanceled"/>
        </main>
    </template>
    <template v-else>
        404
    </template>
</template>

<style scoped></style>
