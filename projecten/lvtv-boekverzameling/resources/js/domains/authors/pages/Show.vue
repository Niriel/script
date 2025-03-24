<script setup lang="ts">
import { useRoute } from 'vue-router';
import { maybe } from '../../../utils/funcs';
import { getAuthorById } from '../store';
import { getBooksByAuthorId } from '../../books/store';
import BookLink from '../../books/components/BookLink.vue';

const route = useRoute();

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
                <h2>{{ author.name }}</h2>
            </hgroup>
            <div class="right">
                <button>Edit author</button>
                <button class="bad">Delete author</button>
            </div>
        </header>
        <main>
            <section>
                <header>
                    <h3>Details about this author</h3>
                </header>
                <main>
                    <dl>
                        <dt>Name:</dt>
                        <dd>{{ author.name }}</dd>
                        <dt>Biography:</dt>
                        <dd v-if="author.biography">{{ author.biography }}</dd>
                        <dd v-else><em>none</em></dd>
                    </dl>
                </main>
            </section>

            <section>
                <header>
                    <h3>Bibliography</h3>
                </header>
                <main>
                    <p>Number of books: {{ books===null ? 0 : books.length }}</p>
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
