<script setup>
import {ref} from 'vue';
import ChildComponent from './MyOtherChild.vue';

const sharedMessage = ref('');
</script>

<template>
    <h2>Other Parent</h2>
    <hr />
    <ChildComponent v-model="sharedMessage" />
    <blockquote>
        {{ sharedMessage }}
    </blockquote>
</template>

<style scoped>
blockquote {
    border-left: 4px solid gray;
}
</style>
