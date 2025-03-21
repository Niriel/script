<script setup lang="ts">
import { Author } from '../store';

defineProps<{
    author: Author,
}>();
</script>

<template>
    <RouterLink :to="{ name: 'authors.show', params: { id:author.id }}">
    {{ author.name }}
    </RouterLink>
</template>
