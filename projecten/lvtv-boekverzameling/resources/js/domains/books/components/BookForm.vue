<script setup lang="ts">
import { ref } from 'vue';
import { Book } from '../store'
import { getAllAuthors } from '../../authors/store';

const emit = defineEmits(['submited', 'canceled']);

const {book} = defineProps<{
    book: Book,
    buttonText: String,
}>();

// Local copy so we don't mess up the store.
const localBook = ref({...book});

</script>
<template>
    <div class="dialog">
        <form @submit.prevent="$emit('submited', localBook)" class="real_form">
                <div class="container">
                    <h2 class="dialog_title">Book details</h2>

                    <div class="form_field">
                        <label for="book_title">Title:</label>
                        <input type="text" v-model="localBook.title" id="book_title" required />
                    </div>

                    <div class="form_field">
                        <label for="book_author">Author:</label><br/>
                        <select v-model="localBook.author_id" id="book_author" class="full_width">
                            <option disabled value="">Select an author</option>
                            <option :value="null">Unknown author</option>
                            <option v-for="author in getAllAuthors" :value="author.id">{{ author.name }}</option>
                        </select>
                    </div>

                    <div class="form_field">
                        <label for="book_isbn">ISBN:</label>
                        <input type="text" v-model="localBook.isbn" id="book_isbn" />
                    </div>

                    <div class="form_buttons">
                        <button type="submit" class="form_submit full_width good">{{ buttonText }}</button>
                        <button @click="$emit('canceled')" type="button">Cancel</button>
                    </div>
                </div>
        </form>
    </div>
</template>
