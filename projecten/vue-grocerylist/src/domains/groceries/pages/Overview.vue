<script setup>
import GroceriesTable from '../../../components/GroceriesTable.vue';
import GroceryForm from '../components/GroceryForm.vue';
import {getAllGroceryItems, getGroceryItemByIndex} from '../store';
</script>

<template>
    <header>
        <h2>Overview</h2>
    </header>
    <main>
        <GroceriesTable :groceryList="getAllGroceryItems" />
    </main>
    <h2>Temporary shenanigan</h2>
    <GroceryForm :groceryItem="getGroceryItemByIndex(1)" />
</template>

<style scoped></style>
