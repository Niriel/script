<script setup>
import {ref, computed} from 'vue';
import RollsComponent from './components/RollsComponent.vue';
import CountsComponent from './components/CountsComponent.vue';

const NB_ROLLS = 8;
const NB_SIDES = 6;

const rolls = ref([]);

const counts = computed(() => {
    const results = {};
    for (var side = 1; side <= NB_SIDES; side++) {
        results[side] = 0;
    }
    for (var i = 0; i < rolls.value.length; i++) {
        results[rolls.value[i]]++;
    }
    return results;
});

function rollDice() {
    rolls.value.length = 0;
    for (let i = 0; i < NB_ROLLS; i++) {
        const roll = Math.floor(Math.random() * NB_SIDES + 1);
        rolls.value.push(roll);
    }
}

function rollClear() {
    rolls.value.length = 0;
}
</script>

<template>
    <header><h1>Dobbelstenen</h1></header>
    <section>
        <header>
            <h2>Your choice</h2>
        </header>
        <main>
            <button type="button" @click="rollDice">Roll 8d6</button>
            &nbsp;
            <button type="button" @click="rollClear">Clear the rolls</button>
        </main>
    </section>
    <section>
        <header>
            <h2>Rolls</h2>
        </header>
        <main>
            <RollsComponent :rolls="rolls" />
        </main>
    </section>
    <section>
        <header>
            <h2>Counts</h2>
        </header>
        <main><CountsComponent :counts="counts" /></main>
    </section>
</template>

<style scoped>
table {
    border-collapse: collapse;
    border-top: 2px solid white;
    border-bottom: 2px solid white;
}

.die_roll {
    display: inline_block;
    width: 64px;
    height: 64px;
}
</style>
