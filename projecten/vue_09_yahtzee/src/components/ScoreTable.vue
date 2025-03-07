<script setup>
import {computed} from 'vue';

const rolls = defineModel();

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

// const sumOfAllRolls = computed(() => {
//     let sum = 0;
//     for (const [side, count] of Object.entries(counts.value)) {
//         console.log(count);
//         sum += side * count;
//     }
//     return sum;
// });
</script>
<template>
    <p v-for="(roll, index) in rolls" :key="index" class="die_roll">{{ roll }}</p>
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
    <!-- <p>{{ sumOfAllRolls }}</p> -->
</template>
<style scoped></style>
