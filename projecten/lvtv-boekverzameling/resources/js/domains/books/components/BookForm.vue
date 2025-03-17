<script setup>
import {ref} from 'vue';

const emit = defineEmits(['submit']);

const props = defineProps({
    book: Object,
    authors: Array,
    buttonText: String,
});

// Local copy so we don't mess up the store.
const localBook = ref({...props.book});
</script>
<template>
    <div class="dialog">
        <form @submit="$emit('submit', localBook)" class="real_form">
                <div class="container">
                <h3 class="dialog_title">Book details</h3>
                <div class="form_field">
                    <label for="book_title">Title:</label>
                    <input type="text" id="book_title" name="title" v-model="localBook.title" required />
                </div>
                <div class="form_field">
                    <label for="book_author">Author:</label>
                    <select name="author_id" id="book_author">
                        <option value="null"><em>Unknown author</em></option>
                        <option v-for="author in authors"></option>
                    </select>
                </div>
                <button type="submit" class="form_submit">{{ buttonText }}</button>
            </div>
        </form>
    </div>
</template>
