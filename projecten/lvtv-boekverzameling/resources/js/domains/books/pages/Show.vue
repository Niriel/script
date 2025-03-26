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
    <template v-if="book">
        <header class="left_right">
            <hgroup class="left">
                <h2>{{ book.title }}</h2>
            </hgroup>
            <div class="right">
                <button @click="goToEditBook(book)">Edit book</button>
                <button @click="confirmDeleteBook(book)" class="bad">Delete book</button>
            </div>
        </header>
        <main>
            <section>
                <header><h3>Details about this book</h3></header>
                <main>
                    <dl>
                        <dt>Title:</dt>
                        <dd>{{ book.title }}</dd>
                        <dt>Author:</dt>
                        <dd v-if="author"><AuthorLink :author="author"/></dd>
                        <dd v-else><em>unknown</em></dd>
                    </dl>
                </main>
            </section>
            <section>
                <header><h3>Reviews</h3></header>
                <ReviewList :book_id="book.id" />
            </section>
        </main>
    </template>
    <template v-else>
        404
    </template>
</template>
