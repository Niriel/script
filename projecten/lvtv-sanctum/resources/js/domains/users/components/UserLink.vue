<script setup lang="ts">
import { User } from '../store';

defineProps<{
    user: User,
}>();
</script>

<template>
    <RouterLink :to="{ name: 'users.show', params: { id:user.id }}" class="user_name">{{ user.name }}</RouterLink>
</template>
