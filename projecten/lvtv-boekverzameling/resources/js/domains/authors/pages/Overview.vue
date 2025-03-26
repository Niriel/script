<script setup lang="ts">
import { useRouter } from 'vue-router';
import AuthorLink from '../components/AuthorLink.vue';
import { fetchAuthors, getAllAuthors } from '../store';

fetchAuthors();

const router = useRouter();
const goToCreateAuthor = () => {
    router.push({ name:'authors.create' });
};
</script>

<template>
    <header class="left_right">
        <div class="left">
            <h1>Authors</h1>
        </div>
        <div class="right">
            <button @click="goToCreateAuthor">Add an author</button>
        </div>
    </header>
    <main>
        <p>Number of authors found: {{ getAllAuthors.length }}.</p>
        <ul>
            <li v-for="author in getAllAuthors"><AuthorLink :author="author" /></li>
        </ul>
    </main>
</template>
<style scoped></style>
