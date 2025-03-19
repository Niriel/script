<script setup>
import { useRoute } from "vue-router";

const route = useRoute();
</script>

<template>
    <header>
        <h1>Boekverzameling</h1>
    </header>
    <nav class="nav_top">
        <menu>
            <li><RouterLink :to="{ name: 'books.overview' }" role="button">Books</RouterLink></li>
            <li><RouterLink :to="{ name: 'authors.overview' }" role="button">Authors</RouterLink></li>
            <li><RouterLink :to="{ name: 'books.create' }" role="button">New book</RouterLink></li>
        </menu>
    </nav>
    <main>
        <RouterView />
    </main>
</template>

<style scoped></style>
