<script setup>
import ParentComponent from './components/MyParent.vue';
</script>

<template>
    <section>
        <h1>
            With
            <span class="code">defineProps</span>
            and
            <span class="code">defineEmits</span>
        </h1>
        <ParentComponent />
    </section>
    <hr />
    <section>
        <h1>
            With
            <span class="code">defineModel</span>
        </h1>
    </section>
</template>

<style scoped>
.code {
    font-family: monospace;
    font-size: larger;
}
</style>
