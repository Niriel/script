<script setup lang="ts">
import { ComputedRef } from 'vue';
import { useRoute, useRouter } from 'vue-router';

import { maybe } from '../../../utils/funcs';
import { Book, deleteBook, getBookById } from '../store';
import { fetchAuthors, getAuthorById } from '../../authors/store';
import { fetchReviews, getReviewsByIds } from '../../reviews/store';
import AuthorLink from '../../authors/components/AuthorLink.vue';

const route = useRoute();

fetchAuthors();
fetchReviews();

let maybe_book_id: number|null = null;
if (typeof route.params.id === 'string') {
    maybe_book_id = parseInt(route.params.id);
}
const maybe_book = maybe(getBookById)(maybe_book_id);
const maybe_author_id = maybe((book:ComputedRef<Book>) => book.value.author_id)(maybe_book);
const maybe_author = maybe(getAuthorById)(maybe_author_id);
const maybe_review_ids = maybe((book:ComputedRef<Book>) => book.value.review_ids)(maybe_book);
const maybe_reviews = maybe(getReviewsByIds)(maybe_review_ids);

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
            <template v-if="maybe_book">
                <h3>{{ maybe_book.title }}</h3>
                <p v-if="maybe_author">by <AuthorLink :author="maybe_author" /></p>
                <p v-else>by <em>unknown author</em></p>

                <button @click="goToEditBook(maybe_book)">Edit book</button>
                <button @click="confirmDeleteBook(maybe_book)" class="bad">Delete book</button>

                <template v-if="maybe_reviews !== null">
                    <p>Number of reviews: {{ maybe_reviews.length }}</p>
                    <ul>
                        <li v-for="review in maybe_reviews">{{ review.content }}</li>
                    </ul>
                </template>
            </template>
            <template v-else>
                <p>404</p>
            </template>
        </main>
    </header>
</template>
