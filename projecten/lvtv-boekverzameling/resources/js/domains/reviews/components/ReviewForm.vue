<script setup lang="ts">
import { ref } from 'vue';
import { Review } from '../store'

const emit = defineEmits(['submitted', 'canceled']);

defineProps<{
    review: Review,
    buttonText: string,
    showCancel: boolean,
}>();

const performSubmit = (r: Review) => {
    console.log('form submit ', r);
    emit('submitted', r);
}

const performCancel = () => {
    console.log('form cancel');
    emit('canceled');
}
</script>

<template>
    <form @submit.prevent="performSubmit(review)" >
        <div class="container">
            <div class="form_field">
                <label for="review_content">Review content:</label>
                <textarea v-model="review.content" id="review_content" required></textarea>
            </div>
            <button v-if="showCancel" @click="performCancel">Cancel</button>
            <button type="submit" class="form_submit good">{{ buttonText }}</button>
        </div>
    </form>
</template>
