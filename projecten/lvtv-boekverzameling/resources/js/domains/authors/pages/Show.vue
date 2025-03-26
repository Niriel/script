<script setup lang="ts">
import { useRoute } from 'vue-router';
import { maybe } from '../../../utils/funcs';
import { fetchAuthors, getAuthorById } from '../store';
import { fetchBooks, getBooksByAuthorId } from '../../books/store';
import BookLink from '../../books/components/BookLink.vue';

const route = useRoute();

fetchAuthors();
fetchBooks();

let author_id: number|null = null;
if (typeof route.params.id === 'string') {
    author_id = parseInt(route.params.id);
}
const author = maybe(getAuthorById)(author_id);
const books = maybe(getBooksByAuthorId)(author_id);
</script>

<template>
    <template v-if="author">
        <header class="left_right">
            <hgroup class="left">
                <div class="category">Author</div>
                <h1>{{ author.name }}</h1>
            </hgroup>
            <div class="right">
                <button>Edit author</button>
                <button class="bad">Delete author</button>
            </div>
        </header>
        <main>
            <section>
                <header>
                    <h2>Details about this author</h2>
                </header>
                <main>
                    <dl>
                        <dt>Name:</dt>
                        <dd>{{ author.name }}</dd>
                        <dt>Biography:</dt>
                        <dd v-if="author.biography">
                            <blockquote>
                                {{ author.biography }}
                            </blockquote>
                        </dd>
                        <dd v-else><em>none</em></dd>
                    </dl>
                </main>
            </section>

            <section>
                <header>
                    <h2>Bibliography</h2>
                </header>
                <main>
                    <p>Number of books: {{ books===null ? 0 : books.length }}.</p>
                    <ul v-if="books !== null">
                        <li v-for="book in books">
                            <BookLink :book="book" />
                        </li>
                    </ul>
                </main>
            </section>
        </main>
    </template>
    <template v-else>
        404
    </template>
</template>
<style scoped></style>
