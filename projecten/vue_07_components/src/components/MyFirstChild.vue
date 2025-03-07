<script setup>
defineProps({
    messageFromParent: String,
});

const emit = defineEmits(['updateMessage']);

function sendMessageToParent() {
    emit('updateMessage', 'Hello, parent!');
}
</script>

<template>
    <h2>First Child</h2>
    <div>
        I, the child, have received the following message:
        <blockquote>
            {{ messageFromParent }}
        </blockquote>
        and I think it is really cool.
    </div>
    <div>
        <button type="button" @click="sendMessageToParent">Say hello back to the parent.</button>
    </div>
</template>

<style scoped>
blockquote {
    border-left: 4px solid gray;
}
</style>
