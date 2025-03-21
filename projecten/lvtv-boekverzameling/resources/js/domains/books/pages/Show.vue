<script setup lang="ts">
import { ComputedRef } from 'vue';
import { useRoute } from 'vue-router';
import { Book, getBookById } from '../store';
import { Author, fetchAuthors, getAuthorById } from '../../authors/store';
import { fetchReviews, getReviewsByIds, Review } from '../../reviews/store';
import AuthorLink from '../../authors/components/AuthorLink.vue';

fetchAuthors();
fetchReviews();

const route = useRoute();

let book_id: number = 0;
if (typeof route.params.id === 'string') {
    book_id = parseInt(route.params.id);
} else {
    // TODO: WHAT IF string[]?
}

let book: ComputedRef<Book>;
let author: ComputedRef<Author>;
let reviews: ComputedRef<Review[]>;
if (book_id > 0) {
    book = getBookById(book_id);
    if (book.value.author_id) {
        author = getAuthorById(book.value.author_id);
        console.log(book.value.review_ids);
        reviews = getReviewsByIds(book.value.review_ids);
        console.log(reviews);
    }
}
</script>

<template>
    <header>
        <h2>Books Show {{ book_id }}</h2>
        <main>
            <template v-if="book">
                <h3>{{ book.title }}</h3>
                <p v-if="author">by <AuthorLink :author="author" /></p>
                <p v-else>by <em>unknown author</em></p>

                <p>Number of reviews: {{ reviews.length }}</p>
                <ul>
                    <li v-for="review in reviews">{{ review.content }}</li>
                </ul>

            </template>
            <template v-else>
                <p>404</p>
            </template>
        </main>
    </header>
</template>
