<script setup>
import {ref} from 'vue';
import ChildComponent from './MyFirstChild.vue';

const messageFromTheChild = ref('');
const messageToTheChild = 'Hello, child!';

function handleMessage(newMessage) {
    messageFromTheChild.value = newMessage;
}
</script>

<template>
    <h2>First Parent</h2>
    <div>
        <p>I am waiting for a message from my child.</p>
        <p>{{ messageFromTheChild === '' ? 'I hope it will not take too long.' : 'Oh, here is the message:' }}</p>
        <blockquote>{{ messageFromTheChild }}</blockquote>
    </div>
    <hr />
    <ChildComponent @updateMessage="handleMessage" :messageFromParent="messageToTheChild" />
</template>

<style scoped>
blockquote {
    border-left: 4px solid gray;
}
</style>
