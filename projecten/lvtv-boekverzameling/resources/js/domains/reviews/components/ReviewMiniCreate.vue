<script setup lang="ts">
import { ref } from 'vue';
import { emptyReview, Review } from '../store';
import ReviewForm from './ReviewForm.vue';

const emit = defineEmits(['created']);

const localReview = ref<Review>(emptyReview());

const performCreate = (newReview: Review) => {
    emit('created', newReview);
    localReview.value = emptyReview();
}
</script>

<template>
    <ReviewForm :review="localReview" :button-text="'Add review'" :show-cancel="false" @submitted="performCreate" />
</template>
