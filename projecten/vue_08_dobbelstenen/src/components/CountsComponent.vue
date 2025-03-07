<script setup>
defineProps({
    counts: {},
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
