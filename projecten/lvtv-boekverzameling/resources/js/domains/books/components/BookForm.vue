<script setup lang="ts">
import { ref } from 'vue';
import type { PropType } from 'vue';
import { Author, Book, emptyAuthor } from '../store'

const emit = defineEmits(['submit']);

const props = defineProps({
    book: Object as PropType<Book>,
    authors: Array as PropType<Author[]>,
    buttonText: String,
});

// Local copy so we don't mess up the store.
const localBook = ref({...props.book});

</script>
<template>
    <div class="dialog">
        <form @submit.prevent="$emit('submit', localBook)" class="real_form">
                <div class="container">
                    <h3 class="dialog_title">Book details</h3>
                    <fieldset>
                        
                        <legend>Book details</legend>

                        <div class="form_field">
                            <label for="book_title">Title:</label>
                            <input type="text" v-model="localBook.title" id="book_title" required />
                        </div>

                        <div class="form_field">
                            <label for="book_author">Author:</label><br/>
                            <select v-model="localBook.author_id" id="book_author" class="full_width">
                                <option disabled value="">Select an author</option>
                                <option value="null">Unknown author</option>
                                <option v-for="author in authors" :value="author.id">{{ author.name }}</option>
                            </select>
                        </div>

                        <div class="form_field">
                            <label for="book_isbn">ISBN:</label>
                            <input type="text" v-model="localBook.isbn" id="book_isbn" />
                        </div>

                    </fieldset>
                <button type="submit" class="form_submit full_width good">{{ buttonText }}</button>
            </div>
        </form>
    </div>
</template>
