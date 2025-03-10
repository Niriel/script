<script setup>
import {ref} from 'vue';
import ThrownDice from './components/ThrownDice.vue';
import ScoreTable from './components/ScoreTable.vue';

const NB_ROLLS = 5;
const NB_SIDES = 6;

const rolls = ref([1, 1, 1, 5, 5]);

const rollDice = () => {
    rolls.value.length = 0;
    for (let i = 0; i < NB_ROLLS; i++) {
        const roll = Math.floor(Math.random() * NB_SIDES + 1);
        rolls.value.push(roll);
    }
};

const rollClear = () => {
    rolls.value.length = 0;
    for (let i = 0; i < NB_ROLLS; i++) {
        rolls.value.push(0);
    }
};

const roll3oak = () => {
    rolls.value = [3, 5, 3, 4, 3];
}
const roll4oak = () => {
    rolls.value = [3, 3, 3, 4, 3];
}
const rollYahtzee = () => {
    rolls.value = [3, 3, 3, 3, 3];
}
const rollFullHouse = () => {
    rolls.value = [1, 1, 1, 5, 5];
}
const rollSmallStraight = () => {
    rolls.value = [2, 3, 2, 5, 4];
}
const rollLargeStraight = () => {
    rolls.value = [6, 3, 2, 5, 4];
}
// rollClear();
</script>

<template>
    <header><h1>Yahtzee</h1></header>
    <section>
        <header>
            <h2>Your action</h2>
        </header>
        <main>
            <div>
                <div class="roll_grid">
                    <button type="button" @click="rollDice">Roll the dice</button>
                    <button type="button" @click="rollClear">Clear the rolls</button>
                </div>
            </div>
            <div>
                <div class="cheat_grid">
                    <button type="button" @click="roll3oak">Roll 3 of a kind</button>
                    <button type="button" @click="roll4oak">Roll 4 of a kind</button>
                    <button type="button" @click="rollYahtzee">Roll Yahtzee</button>
                    <button type="button" @click="rollFullHouse">Roll full house</button>
                    <button type="button" @click="rollSmallStraight">Roll small straight</button>
                    <button type="button" @click="rollLargeStraight">Roll large straight</button>
                </div>            
            </div>
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
        <main>
            <ScoreTable v-model="rolls" />
        </main>
    </section>
</template>

<style scoped>
.roll_grid {
    display: inline-grid;
    grid-template-columns: 1fr 1fr;
}
.roll_grid button {
    margin: 4px;
}
.cheat_grid {
    display: inline-grid;
    grid-template-columns: 1fr 1fr 1fr;
}
.cheat_grid button {
    margin: 4px
}
</style>
