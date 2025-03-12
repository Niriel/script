<script setup>
import {useRoute} from 'vue-router';
import GroceryForm from '../components/GroceryForm.vue';
import {editGroceryItem, getGroceryItemById} from '../store';

const route = useRoute();

const groceryItem = getGroceryItemById(route.params.id);
</script>

<template>
    <header>
        <h2>Edit grocery item {{ $route.params.id }}</h2>
    </header>
    <GroceryForm :groceryItem="groceryItem" :buttonText="'Edit item'" @submit="editGroceryItem" />
</template>

<style scoped></style>
