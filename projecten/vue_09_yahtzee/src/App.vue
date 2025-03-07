<script setup>
import {ref} from 'vue';
import ThrownDice from './components/ThrownDice.vue';
import ScoreTable from './components/ScoreTable.vue';

const NB_ROLLS = 5;
const NB_SIDES = 6;

const rolls = ref([]);

const rollDice = () => {
    rolls.value.length = 0;
    for (let i = 0; i < NB_ROLLS; i++) {
        const roll = Math.floor(Math.random() * NB_SIDES + 1);
        rolls.value.push(roll);
    }
};

const rollClear = () => {
    rolls.value.length = 0;
};
</script>

<template>
    MOI
    <header><h1>Yahtzee</h1></header>
    <section>
        <header>
            <h2>Your action</h2>
        </header>
        <main>
            <button type="button" @click="rollDice">Roll the dice</button>
            &nbsp;
            <button type="button" @click="rollClear">Clear the rolls</button>
        </main>
    </section>
    <section>
        <header>
            <h2>Rolls</h2>
        </header>
        <main>
            <ThrownDice v-model="rolls" />
        </main>
    </section>
    <section>
        <header>
            <h2>Scores</h2>
        </header>
        <Main>
            <ScoreTable v-models="rolls" />
        </Main>
        <main></main>
    </section>
</template>

<style scoped>
table {
    border-collapse: collapse;
    border-top: 2px solid white;
    border-bottom: 2px solid white;
}
</style>
