<script setup>
import {ref} from 'vue';
import GroceryForm from '../components/GroceryForm.vue';
import {addGroceryItem, newGroceryItem} from '../store';

const groceryItem = newGroceryItem('', 1.0);
</script>

<template>
    <header>
        <h2>New grocery item</h2>
    </header>
    <GroceryForm :groceryItem="groceryItem" :buttonText="'Add to grocery list'" @submit="addGroceryItem" />
</template>

<style scoped></style>
