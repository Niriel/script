<script setup lang="ts">
import { Author } from '../store';

defineProps<{
    author?: Author|null,
}>();
</script>

<template>
    <RouterLink v-if="author" :to="{ name: 'authors.show', params: { id:author.id }}" class="author_name">{{ author.name }}</RouterLink>
    <span v-else class="author_name">unknown author</span>
</template>
