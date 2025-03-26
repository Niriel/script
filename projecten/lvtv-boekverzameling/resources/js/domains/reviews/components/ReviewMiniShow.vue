<script setup lang="ts">
import { Review } from '../store';

const props = defineProps<{
    review: Review,
}>();

const emit = defineEmits(['editClicked', 'deleteClicked']);

const performEdit = () => {
    emit('editClicked', props.review);
}
const performDelete = () => {
    emit('deleteClicked', props.review);
}
</script>

<template>
    <div>
        <blockquote>{{ review.content }}</blockquote>
        <button @click="performEdit">Edit review</button>
        <button @click="performDelete" class="bad">Delete review</button>
    </div>
</template>
