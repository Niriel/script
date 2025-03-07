<script setup>

const model = defineModel();

</script>

<template>
    <h2>Second Child</h2>
    <blockquote>
        {{ model }}
    </blockquote>
    <input v-model="model" />
</template>

<style scoped>
blockquote {
    border-left: 4px solid gray;
}
</style>
