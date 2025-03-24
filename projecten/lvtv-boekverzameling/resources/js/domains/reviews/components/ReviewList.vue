<script setup lang="ts">
import { ref } from 'vue';
import { createReview, deleteReview, editReview, getReviewsByBookId, Review } from '../store';
import ReviewMiniCreate from './ReviewMiniCreate.vue';
import ReviewMiniEdit from './ReviewMiniEdit.vue';
import ReviewMiniShow from './ReviewMiniShow.vue';

const props = defineProps<{
    book_id: number;
}>();

const reviews = getReviewsByBookId(props.book_id);

const editId = ref(-1);

const onEditClicked = (review: Review) => {
    editId.value = review.id;
}

const onEditCanceled = () => {
    editId.value = -1;
}

const onEditConfirmed = (review: Review) => {
    editReview(review);
    editId.value = -1;
}

const onCreated = (review: Review) => {
    review.book_id = props.book_id;
    createReview(review);
    editId.value = -1;
}

const onDeleteClicked = (review: Review) => {
    deleteReview(review);
    editId.value = -1;
}
</script>

<template>
    <p>Number of reviews: {{ reviews.length }}.</p>
    <p><samp>book_id == {{ book_id }}</samp></p>
    <p><samp>editId == {{ editId }}</samp></p>
    
    <div>
        <p>Share your thoughts:</p>
        <ReviewMiniCreate @created="onCreated" />
    </div>

    <ul>
        <li v-for="review in reviews">
            <ReviewMiniEdit v-if="review.id === editId" :review="review" @canceled="onEditCanceled" @updated="onEditConfirmed" />
            <ReviewMiniShow v-else :review="review" @edit-clicked="onEditClicked" @delete-clicked="onDeleteClicked" />
        </li>
    </ul>

</template>
