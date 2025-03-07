<script setup>
import {ref} from 'vue';
import ChildComponent from './MySecondChild.vue';

const sharedMessage = ref('Hello!');

</script>

<template>
    <h2>Second Parent</h2>
    <blockquote>
        {{ sharedMessage }}
    </blockquote>
    <input v-model="sharedMessage" />
    <hr />
    <ChildComponent v-model="sharedMessage" />
</template>

<style scoped>
blockquote {
    border-left: 4px solid gray;
}
</style>
