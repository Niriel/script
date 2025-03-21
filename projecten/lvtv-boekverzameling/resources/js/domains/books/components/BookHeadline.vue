<script setup lang="ts">
import { ComputedRef } from 'vue';
import { Author, getAuthorById } from '../../authors/store';
import { Book } from '../store';
import AuthorLink from '../../authors/components/AuthorLink.vue';
import BookLink from './BookLink.vue';

const props = defineProps<{
    book: Book,
}>();

let author:ComputedRef<Author>;
if (props.book.author_id !== null) {
    author = getAuthorById(props.book.author_id);
}
</script>

<template>
    <BookLink :book="book" />
    by
    <AuthorLink v-if="author" :author="author" />
    <em v-else>unknown author</em>
</template>
