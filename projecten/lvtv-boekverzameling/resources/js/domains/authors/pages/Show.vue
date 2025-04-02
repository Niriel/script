<script setup lang="ts">
import { useRoute } from 'vue-router';

import { getRouteId, maybe } from '../../../utils/funcs';
import { goToRoute } from '../../../services/router';
import { getBooksByAuthorId } from '../../books/store';
import { Author, authorStore } from '../store';
import BookLink from '../../books/components/BookLink.vue';

const route = useRoute();
const author_id = getRouteId(route);
const author = maybe(authorStore.getters.byId)(author_id);
const books = maybe(getBooksByAuthorId)(author_id);

const goToEditAuthor = (author: Author) => {
    goToRoute('authors.edit', author.id)
};

const confirmDeleteAuthor = async(author: Author) => {
    await authorStore.actions.delete(author.id);
    goToRoute('authors.overview');
}
</script>

<template>
    <template v-if="author">
        <header>
            <div class="page_header">
                <div class="columns">
                    <div class="column_fix category">Author</div>
                    <div class="column_grow center page_title">
                        <h1>{{ author.name }}</h1>
                    </div>
                    <div class="column_fix button_row">
                        <button @click="goToEditAuthor(author)">Edit author</button>
                        <button @click="confirmDeleteAuthor(author)" class="bad">Delete author</button>
                    </div>
                </div>
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
                    <p>Number of books: {{ (books===null) ? 0 : books.length }}.</p>
                    <ul v-if="books">
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
