<script setup>
import { fetchAuthors } from './domains/authors/store';
import { fetchBooks } from './domains/books/store';
import { fetchReviews } from './domains/reviews/store';

fetchAuthors();
fetchBooks();
fetchReviews();
</script>

<template>
    <header class="website_header">
        <h1>Boekverzameling</h1>
        <nav class="website_nav">
            <menu>
                <li><RouterLink :to="{ name: 'authors.overview' }" role="button">Authors</RouterLink></li>
                <li><RouterLink :to="{ name: 'books.overview' }" role="button">Books</RouterLink></li>
                <li><RouterLink :to="{ name: 'reviews.overview' }" role="button">Reviews</RouterLink></li>
            </menu>
        </nav>
    </header>
    <main class="website_content">
        <RouterView />
    </main>
    <footer class="website_footer">
        <nav>
            <menu>
                <li>&copy; 2025 Script B.V.</li>
                <li><a href="https://script.nl/privacy-cookies/">Privacy &amp; cookies</a></li>
                <li>Help</li>
                <li>Contact us</li>
            </menu>
        </nav>
    </footer>
</template>

<style scoped></style>
