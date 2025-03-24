<script setup lang="ts">
import { ComputedRef } from 'vue';
import { useRoute, useRouter } from 'vue-router';

import { maybe } from '../../../utils/funcs';
import { Book, deleteBook, getBookById } from '../store';
import { fetchAuthors, getAuthorById } from '../../authors/store';
import { fetchReviews } from '../../reviews/store';
import AuthorLink from '../../authors/components/AuthorLink.vue';
import ReviewList from '../../reviews/components/ReviewList.vue';

const route = useRoute();

fetchAuthors();
fetchReviews();

let book_id: number|null = null;
if (typeof route.params.id === 'string') {
    book_id = parseInt(route.params.id);
}
const book = maybe(getBookById)(book_id);
const author_id = maybe((someBook:ComputedRef<Book>) => someBook.value.author_id)(book);
const author = maybe(getAuthorById)(author_id);

const router = useRouter();
const goToEditBook = (book: Book) => {
    router.push({name:'books.edit', params:{id:book.id}});
};

const confirmDeleteBook = (book: Book) => {
    deleteBook(book);
    router.push({name: 'books.overview'});
}
</script>

<template>
    <header>
        <h2>Books Show</h2>
        <main>
            <template v-if="book">
                <h3>{{ book.title }}</h3>
                <p v-if="author">by <AuthorLink :author="author" /></p>
                <p v-else>by <em>unknown author</em></p>

                <button @click="goToEditBook(book)">Edit book</button>
                <button @click="confirmDeleteBook(book)" class="bad">Delete book</button>

                <ReviewList :book_id="book.id" />
            </template>
            <template v-else>
                <p>404</p>
            </template>
        </main>
    </header>
</template>
