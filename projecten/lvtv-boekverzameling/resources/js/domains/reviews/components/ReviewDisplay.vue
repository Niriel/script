<script setup lang="ts">
import { useRouter } from 'vue-router';
import { deleteReview, Review } from '../store'

defineProps<{
    review: Review,
}>();

const router = useRouter();
const goToEditReview = (review: Review) => {
    router.push({ name: 'reviews.edit', params:{id:review.id} });
}
const confirmDeleteReview = async(review: Review) => {
    await deleteReview(review);
    router.push({ name: 'books.show', params:{id:review.book_id} });    
}
</script>

<template>
    <blockquote>{{ review.content }}</blockquote>
    <button @click="goToEditReview(review)">Edit review</button>
    <button @click="confirmDeleteReview(review)" class="bad">Delete review</button>
</template>
