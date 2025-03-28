<script setup lang="ts">
import { useRouter } from 'vue-router';
import AuthorLink from '../components/AuthorLink.vue';
import { getAllAuthors } from '../store';

const router = useRouter();
const goToCreateAuthor = () => {
    router.push({ name:'authors.create' });
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
        <p>Number of authors found: {{ getAllAuthors.length }}.</p>
        <ul>
            <li v-for="author in getAllAuthors"><AuthorLink :author="author" /></li>
        </ul>
        <button @click="goToCreateAuthor">Add an author</button>
    </main>
</template>
<style scoped></style>
