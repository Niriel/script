<script setup lang="ts">
import { User } from '../store';
import UserLink from './UserLink.vue';

const props = defineProps<{
    user: User,
}>();

</script>

<template>
    <UserLink :user="user" />
    <span class="by">is very cool</span>
</template>
