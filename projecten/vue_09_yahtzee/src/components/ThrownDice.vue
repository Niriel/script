<script setup>
const rolls = defineModel();

// Unicode drawings of dice.
const dieFaces = '\u2680\u2681\u2682\u2683\u2684\u2685';
const useFaces = true;

const showRoll = roll => {
    if (useFaces) {
        return dieFaces[roll - 1];
    } else {
        return roll.toString();
    }
};
</script>

<template>
    <table>
        <tbody>
            <tr>
                <td v-for="(roll, index) in rolls" :key="index" class="die_roll">{{ showRoll(roll) }}</td>
            </tr>
        </tbody>
    </table>
</template>

<style scoped>
table tr td {
    border-left: 1px solid;
    border-right: 1px solid;
}
.die_roll {
    display: inline_block;
    width: 64px;
    height: 64px;
    font-size: 40px;
}
</style>
