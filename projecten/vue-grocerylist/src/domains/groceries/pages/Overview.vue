<script setup>
import GroceriesTable from '../../../components/GroceriesTable.vue';
import {getAllGroceryItems} from '../store';
</script>

<template>
    <header>
        <h2>Overview</h2>
    </header>
    <main>
        <GroceriesTable :groceryList="getAllGroceryItems" />
    </main>
</template>

<style scoped></style>
