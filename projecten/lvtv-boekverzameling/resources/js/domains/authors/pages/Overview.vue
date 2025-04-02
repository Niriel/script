<script setup lang="ts">
import { goToRoute } from '../../../services/router';
import { authorStore } from '../store';
import AuthorLink from '../components/AuthorLink.vue';

const authors = authorStore.getters.all;

const goToCreateAuthor = () => {
    goToRoute('authors.create');
};
</script>

<template>
    <header>
        <div class="page_header">
            <div class="columns">
                <div class="column_fix category">Authors</div>
                <div class="column_grow center page_title"><h1>Authors</h1></div>
                <div class="column_fix"><button @click="goToCreateAuthor">Add an author</button></div>
            </div>
        </div>
    </header>
    <main>
        <p>Number of authors: {{ authors.length }}.</p>
        <ul>
            <li v-for="author in authors"><AuthorLink :author="author" /></li>
        </ul>
        <button @click="goToCreateAuthor">Add an author</button>
    </main>
</template>
<style scoped></style>
