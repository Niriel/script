<script setup lang="ts">
import { ref } from 'vue';
import { createReview, deleteReview, editReview, getReviewsByBookId, Review } from '../store';
import ReviewMiniCreate from './ReviewMiniCreate.vue';
import ReviewMiniEdit from './ReviewMiniEdit.vue';
import ReviewMiniShow from './ReviewMiniShow.vue';

const props = defineProps<{
    book_id: number;
}>();


console.log('DEBUGGING');

const reviews = getReviewsByBookId(props.book_id);

const editId = ref(-1);

const onEditClicked = (review: Review) => {
    editId.value = review.id;
}

const onEditCanceled = () => {
    editId.value = -1;
}

const onEditConfirmed = async (review: Review) => {
    await editReview(review);
    editId.value = -1;
}

const onCreated = async (review: Review) => {
    review.book_id = props.book_id;
    await createReview(review);
    editId.value = -1;
}

const onDeleteClicked = async (review: Review) => {
    await deleteReview(review);
    editId.value = -1;
}
</script>

<template>
    <p>Number of reviews: {{ reviews.length }}.</p>
    
    <ReviewMiniCreate @created="onCreated" />

    <ul>
        <li v-for="review in reviews">
            <ReviewMiniEdit v-if="review.id === editId" :review="review" @canceled="onEditCanceled" @updated="onEditConfirmed" />
            <ReviewMiniShow v-else :review="review" @edit-clicked="onEditClicked" @delete-clicked="onDeleteClicked" />
        </li>
    </ul>

</template>
