<script setup>
import {computed} from 'vue';

const rolls = defineModel();
const NB_SIDES = 6;

const counts = computed(() => {
    const result = {};
    for (var side = 1; side <= NB_SIDES; side++) {
        result[side] = 0;
    }
    for (var i = 0; i < rolls.value.length; i++) {
        result[rolls.value[i]]++;
    }
    return result;
});
</script>
<template>
    <p>uhh</p>
</template>
<style scoped></style>
