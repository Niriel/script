<script setup>
import {reactive} from 'vue';
import {useRoute} from 'vue-router';

const route = useRoute();

const highlightForPath = path => {
    return route.fullPath === path ? 'highlight' : '';
};

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
        <h1>Vue groceries</h1>
    </header>
    <nav>
        <RouterLink to="/" role="button" v-bind:class="highlightForPath('/')">Overview</RouterLink>
        <RouterLink to="/create" role="button" v-bind:class="highlightForPath('/create')">Create</RouterLink>
    </nav>
    <main>
        <RouterView />
    </main>
</template>

<style scoped>
a[role='button'] {
    color: white;
    background-color: blueviolet;
    margin: 4px;
    border: none;
    border-radius: 3px;
    padding: 8px 16px;
}
a[role='button']:hover {
    filter: brightness(130%);
}
a[role='button'].highlight {
    background-color: hotpink;
}
</style>
