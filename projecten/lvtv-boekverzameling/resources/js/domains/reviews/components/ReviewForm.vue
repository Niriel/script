<script setup lang="ts">
import { ref } from 'vue';
import { Review } from '../store'

const emit = defineEmits(['submit']);

const props = defineProps<{
    review: Review,
    buttonText: String,
}>();

// Local copy so we don't mess up the store.
const localReview = ref({...props.review});

</script>
<template>
    <form @submit.prevent="$emit('submit', localReview)" class="real_form">
        <div class="container">
            <div class="form_field">
                <label for="review_content">Title:</label>
                <textarea v-model="localReview.content" id="review_content" required>
                </textarea>
            </div>
            <button type="submit" class="form_submit good">{{ buttonText }}</button>
        </div>
    </form>
</template>
