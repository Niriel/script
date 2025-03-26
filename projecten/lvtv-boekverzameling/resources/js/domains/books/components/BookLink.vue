<script setup lang="ts">
import { Book } from '../store';

defineProps<{
    book: Book,
}>();
</script>

<template>
    <RouterLink :to="{ name: 'books.show', params: { id:book.id }}">{{ book.title }}</RouterLink>
</template>
