<script setup>
import { useRoute } from "vue-router";

const route = useRoute();
</script>

<template>
    <header>
        <h1>Vue groceries</h1>
    </header>
    <nav>
        <RouterLink :to="{ name: 'book_collection.overview' }">Overview</RouterLink>
        <RouterLink :to="{ name: 'book_collection.create' }">Create</RouterLink>
    </nav>
    <main>
        <RouterView />
    </main>
</template>

<style scoped></style>
