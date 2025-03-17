<script setup>
import { useRoute } from "vue-router";

const route = useRoute();
</script>

<template>
    <header>
        <h1>Boekverzameling</h1>
    </header>
    <nav class="nav_top">
        <RouterLink :to="{ name: 'books.overview' }" role="button">Overview</RouterLink>
        <RouterLink :to="{ name: 'books.create' }" role="button">New book</RouterLink>
    </nav>
    <main>
        <RouterView />
    </main>
</template>

<style scoped></style>
