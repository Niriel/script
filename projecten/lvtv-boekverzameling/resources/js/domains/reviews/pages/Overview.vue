<script setup lang="ts">
import { fetchReviews, getAllReviews } from '../store';


fetchReviews();

</script>
<template>
    <header>
        <h2>Reviews overview</h2>
    </header>
    <main>
        <p>Number of reviews found: {{  getAllReviews.length }}</p>
        <ul>
            <li v-for="review in getAllReviews">
                {{ review.content }}
            </li>
        </ul>
    </main>
</template>
<style scoped></style>
