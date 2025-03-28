<script setup lang="ts">
import { ComputedRef } from 'vue';
import { useRoute, useRouter } from 'vue-router';

import { getRouteId, maybe } from '../../../utils/funcs';
import { Book, deleteBook, getBookById } from '../store';
import { getAuthorById } from '../../authors/store';
import AuthorLink from '../../authors/components/AuthorLink.vue';
import ReviewList from '../../reviews/components/ReviewList.vue';

const route = useRoute();

const book_id = getRouteId(route);
const book = maybe(getBookById)(book_id);
const author_id = book && book.value ? book.value.author_id : null;
const author = maybe(getAuthorById)(author_id);

const router = useRouter();
const goToEditBook = (book: Book) => {
    router.push({name:'books.edit', params:{id:book.id}});
};

const confirmDeleteBook = async(book: Book) => {
    await deleteBook(book);
    router.push({name: 'books.overview'});
}
</script>

<template>
    <template v-if="book">
        <header>
            <div class="page_header">
                <div class="columns">
                    <div class="column_fix category">Book</div>
                    <div class="column_grow center page_title">
                        <h1>{{ book.title }}</h1>
                        <p>by <AuthorLink :author="author"/></p>
                    </div>
                    <div class="column_fix button_row">
                        <button @click="goToEditBook(book)">Edit book</button>                    
                        <button @click="confirmDeleteBook(book)" class="bad">Delete book</button>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <section>
                <header><h2>Details about this book</h2></header>
                <main>
                    <dl>
                        <dt>Title:</dt>
                        <dd class="book_title">{{ book.title }}</dd>
                        <dt>Author:</dt>
                        <dd><AuthorLink :author="author"/></dd>
                    </dl>
                </main>
            </section>
            <section>
                <header><h2>Reviews</h2></header>
                <main>
                    <ReviewList :book_id="book.id" />
                </main>
            </section>
        </main>
    </template>
    <template v-else>
        404
    </template>
</template>

<style scoped>

</style>
