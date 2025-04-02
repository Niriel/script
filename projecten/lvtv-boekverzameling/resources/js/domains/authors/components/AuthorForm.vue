<script setup lang="ts">
import { ref } from 'vue';
import { Author } from '../store';

const emit = defineEmits(['submitted', 'canceled']);

const props = defineProps<{
    author: Author,
    buttonText: String,
}>();

// Local copy so we don't mess up the store.
const localAuthor = ref({...props.author});

</script>
<template>
    <div class="dialog">
        <form @submit.prevent="$emit('submitted', localAuthor)" class="real_form">
                <div class="container">
                    <h2 class="dialog_title">Author details</h2>

                    <div class="form_field">
                        <label for="auhor_name">Name:</label>
                        <input type="text" v-model="localAuthor.name" id="author_name" required />
                    </div>

                    <div class="form_field">
                        <label for="author_biography">Biography:</label>
                        <textarea v-model="localAuthor.biography" id="author_biobraphy"></textarea>
                    </div>

                    <div class="form_buttons">
                        <button type="submit" class="form_submit full_width good">{{ buttonText }}</button>
                        <button @click="$emit('canceled')">Cancel</button>
                    </div>
                </div>
        </form>
    </div>
</template>
