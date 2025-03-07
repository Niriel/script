<script setup>
import {computed} from 'vue';

const {rolls} = defineProps({
    rolls: Array,
});

const NB_SIDES = 6;

const counts = computed(() => {
    const results = {};
    for (let side = 1; side <= NB_SIDES; side++) {
        results[side] = 0;
    }
    for (let i = 0; i < rolls.length; i++) {
        results[rolls[i]]++;
    }
    return results;
});
</script>

<template>
    <table>
        <thead>
            <tr>
                <th>die side</th>
                <th>count</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(count, side, index) in counts" :key="index">
                <td>{{ side }}</td>
                <td>{{ count }}</td>
            </tr>
        </tbody>
    </table>
</template>

<style scoped>
table {
    width: 100%;
}
table thead tr th {
    border-bottom: 1px solid white;
}
</style>
