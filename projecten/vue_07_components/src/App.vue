<script setup>
import FirstParentComponent from './components/MyFirstParent.vue';
import SecondParentComponent from './components/MySecondParent.vue';
</script>

<template>
    <section>
        <h1>
            With
            <span class="code">defineProps</span>
            and
            <span class="code">defineEmits</span>
        </h1>
        <FirstParentComponent />
    </section>
    <hr />
    <section>
        <h1>
            With
            <span class="code">defineModel</span>
        </h1>
        <SecondParentComponent />
    </section>
</template>

<style scoped>
.code {
    font-family: monospace;
    font-size: larger;
}
</style>
