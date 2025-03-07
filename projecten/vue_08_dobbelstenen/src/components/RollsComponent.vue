<script setup>
defineProps({
    rolls: Array,
});
</script>

<template>
    <table>
        <tbody>
            <tr>
                <td v-for="(roll, index) in rolls" :key="index" class="die_roll">{{ roll }}</td>
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
}
</style>
