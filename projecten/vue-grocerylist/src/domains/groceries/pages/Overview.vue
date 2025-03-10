<script setup>
import {reactive} from 'vue';
import GroceriesTable from '../../../components/GroceriesTable.vue';

class GroceryItem {
    constructor(name, unitPrice) {
        this.name = name;
        this.unitPrice = unitPrice;
        this.quantity = 1;
    }
    get cost() {
        return this.unitPrice * this.quantity;
    }
}

const groceryList = [
    reactive(new GroceryItem('Bread', 1.0)),
    reactive(new GroceryItem('Broccoli', 0.99)),
    reactive(new GroceryItem('Krentenbollen', 1.2)),
    reactive(new GroceryItem('Nuts', 2.99)),
];
</script>

<template>
    <header>
        <h2>Overview</h2>
    </header>
    <main>
        <GroceriesTable :groceryList="groceryList" />
    </main>
</template>

<style scoped></style>
