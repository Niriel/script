<script setup lang="ts">
import { ref } from 'vue';
import { Review } from '../store';
import ReviewForm from './ReviewForm.vue';

const emit = defineEmits(['updated', 'canceled']);

const props = defineProps<{
    review: Review,
}>();

// Local copy so we don't mess up the store.
const localReview = ref<Review>({...props.review});

const performUpdate = (newReview: Review) => {
    emit('updated', newReview);
}
const performCancel = () => {
    emit('canceled');
}
</script>

<template>
    <ReviewForm :review="localReview" :button-text="'Update review'" :show-cancel="true" @submitted="performUpdate" @canceled="performCancel"/>
</template>
