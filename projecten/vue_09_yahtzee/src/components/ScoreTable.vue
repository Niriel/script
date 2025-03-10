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

const isOfAKind = (kind, counts_value) => {
    let result = false;
    for (let side = 1; side <= NB_SIDES; side++) {
        if (counts_value[side] >= kind) {
            result = true;
        }
    }
    return result;
}

const isFullHouse = (counts_value) => {
    let two = false;
    let three = false;
    for (let side = 1; side <= NB_SIDES; side++) {
        const count = counts_value[side];
        if (count === 2) {
            two = true;
        }
        if (count === 3) {
            three = true;
        }
    }
    return two && three;
}

const isStraight = (kind, counts_value) => {
    let result = false;
    let longest = 0;
    for (let side = 1; side <= NB_SIDES; side++) {
        const count = counts_value[side];
        if (count >= 1) {
            longest++;
            if (longest === kind) {
                result = true;
            }
        } else {
            longest = 0;
        }
    }
    return result;
}

const scoreThreeOfAKind = computed(() => {
    return isOfAKind(3, counts.value) ? sumOfAllRolls.value : 0;
});
const scoreFourOfAKind = computed(() => {
    return isOfAKind(4, counts.value) ? sumOfAllRolls.value : 0;
});
const scoreFullHouse = computed(() => {
    return isFullHouse(counts.value) ? 25 : 0;
});
const scoreSmallStraight = computed(() => {
    return isStraight(4, counts.value) ? 30 : 0;
});
const scoreLargeStraight = computed(() => {
    return isStraight(5, counts.value) ? 40 : 0;
});
const scoreYahtzee = computed(() => {
    return isOfAKind(5, counts.value) ? 50 : 0;
});

const sumOfAllRolls = computed(() => {
    return Object.entries(counts.value).reduce(
        (acc, [side, count]) => acc + side * count,
        0
    );
});

const scoreNames = ['Ones', 'Twos', 'Threes', 'Fours', 'Fives', 'Sixes'];

</script>

<template>
    <!-- <table>
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
    </table> -->
    <table>
        <tbody>
            <!-- Upper section -->
            <tr v-for="(score, side, index) in counts" :key="index">
                <th scope="row">{{ scoreNames[index] }}</th>
                <td>{{ score * side }}</td>
            </tr>
            <!-- Separator -->
            <tr><th scope="col" colspan="2"></th></tr>
            <!-- Lower section -->
            <tr>
                <th scope="row">Three of a kind</th>
                <td>{{ scoreThreeOfAKind }}</td>
            </tr>
            <tr>
                <th scope="row">Four of a kind</th>
                <td>{{ scoreFourOfAKind }}</td>
            </tr>
            <tr>
                <th scope="row">Full house</th>
                <td>{{ scoreFullHouse }}</td>
            </tr>
            <tr>
                <th scope="row">Small straight</th>
                <td>{{ scoreSmallStraight }}</td>
            </tr>
            <tr>
                <th scope="row">Large straight</th>
                <td>{{ scoreLargeStraight }}</td>
            </tr>
            <tr>
                <th scope="row">Yahtzee</th>
                <td>{{ scoreYahtzee }}</td>
            </tr>
            <tr>
                <th scope="row">Chance</th>
                <td>{{ sumOfAllRolls }}</td>
            </tr>
        </tbody>
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
