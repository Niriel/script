<script setup lang="ts">
import { Book } from '../store';

defineProps<{
    book: Book,
}>();
</script>

<template>
    <RouterLink :to="{ name: 'books.show', params: { id:book.id }}" class="book_title">{{ book.title }}</RouterLink>
</template>
