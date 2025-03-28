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
    <div class="columns">
        <div class="column_grow">
            <blockquote>{{ review.content }}</blockquote>
        </div>
        <div class="column_fix button_row">
            <button @click="performEdit">Edit</button>
            <button @click="performDelete" class="bad">Delete</button>
        </div>
    </div>
</template>
