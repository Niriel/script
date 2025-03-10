<script setup>
import {computed} from 'vue';

const rolls = defineModel();

const NB_SIDES = 6;

const counts = computed(() => {
    const results = {};
    for (let side = 1; side <= NB_SIDES; side++) {
        results[side] = 0;
    }
    for (let i = 0; i < rolls.value.length; i++) {
        if (rolls.value[i] > 0) {
            results[rolls.value[i]]++;
        }
    }
    return results;
});

const sumOfAllRolls = computed(() => {
    let sum = 0;
    for (const [side, count] of Object.entries(counts.value)) {
        sum += side * count;
    }
    return sum;
});

</script>
<template>
    <table>
        <thead>
            <tr>
                <th scope="col">die side</th>
                <th scope="col">count</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(count, side, index) in counts" :key="index">
                <td>{{ side }}</td>
                <td>{{ count }}</td>
            </tr>
        </tbody>
    </table>
    <table>
        <tr>
            <th scope="row">Sum of all rolls</th>
            <td>{{ sumOfAllRolls }}</td>
        </tr>

    </table>
</template>

<style scoped>
table {
    margin: 0.5em auto;
    border-collapse: collapse;
    border-top: 2px solid;
    border-bottom: 2px solid;
}
td, th {
    padding-left: 8px;
    padding-right: 8px;
}
/* Table headers that form a row at the top of the table */
th[scope="col"] {
    text-align: center;
    border-bottom: 1px solid;
}
/* Table headers that form a column on the left of the table */
th[scope="row"] {
    text-align: left;
    /* border-right: 1px solid; */
}
</style>
