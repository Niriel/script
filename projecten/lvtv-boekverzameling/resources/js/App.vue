<script setup>
</script>

<template>
    <header>
        <h1>Boekverzameling</h1>
    </header>
    <nav class="nav_top">
        <menu>
            <li><RouterLink :to="{ name: 'authors.overview' }" role="button">Authors</RouterLink></li>
            <li><RouterLink :to="{ name: 'books.overview' }" role="button">Books</RouterLink></li>
            <li><RouterLink :to="{ name: 'reviews.overview' }" role="button">Reviews</RouterLink></li>
        </menu>
    </nav>
    <main>
        <RouterView />
    </main>
</template>

<style scoped></style>
