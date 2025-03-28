<script setup lang="ts">
import { useRoute, useRouter } from 'vue-router';
import { getRouteId, maybe } from '../../../utils/funcs';
import { Author, deleteAuthor, getAuthorById } from '../store';
import { getBooksByAuthorId } from '../../books/store';
import BookLink from '../../books/components/BookLink.vue';

const route = useRoute();
const author_id = getRouteId(route);
const author = maybe(getAuthorById)(author_id);
const books = maybe(getBooksByAuthorId)(author_id);

const router = useRouter();
const goToEditAuthor = (author: Author) => {
    router.push({name:'authors.edit', params:{id:author.id}});
};

const confirmDeleteAuthor = async(author: Author) => {
    await deleteAuthor(author);
    router.push({name: 'authors.overview'});
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
