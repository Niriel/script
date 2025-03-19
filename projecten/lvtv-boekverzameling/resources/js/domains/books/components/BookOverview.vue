<script setup lang="ts">
import { getAuthorById } from '../../authors/store';
import { Book } from '../store';

defineProps<{
    book: Book,
}>();

</script>
<template>
    <RouterLink :to="{ name: 'books.show', params: { id:book.id}}">{{ book.title }}</RouterLink>
    by
    <span v-if="book.author_id">{{ getAuthorById(book.author_id).value.name }}</span>
    <em v-else>unknown author</em>
</template>
