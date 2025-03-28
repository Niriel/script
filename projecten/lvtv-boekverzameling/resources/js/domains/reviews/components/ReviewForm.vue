<script setup lang="ts">
import { Review } from '../store'

const emit = defineEmits(['submitted', 'canceled']);

defineProps<{
    review: Review,
    formTitle: string;
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
    <form @submit.prevent="performSubmit(review)" class="small_form">
        <div class="form_field">
            <label for="review_content">{{ formTitle }}</label>
            <textarea v-model="review.content" id="review_content" required placeholder="Your review"></textarea>
        </div>
        <div class="button_row">
            <button v-if="showCancel" @click="performCancel">Cancel</button>
            <button type="submit" class="form_submit good">{{ buttonText }}</button>
        </div>
    </form>
</template>
