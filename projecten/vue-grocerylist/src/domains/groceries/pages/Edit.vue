<script setup>
import {useRoute, useRouter} from 'vue-router';
import GroceryForm from '../components/GroceryForm.vue';
import {editGroceryItem, getGroceryItemById} from '../store';

const route = useRoute();
const router = useRouter();

const groceryItem = getGroceryItemById(route.params.id);

const submitGrocery = editedGrocery => {
    editGroceryItem(editedGrocery);
    router.push({name: 'groceries.overview'});
};
</script>

<template>
    <header>
        <h2>Edit grocery item {{ $route.params.id }}</h2>
    </header>
    <GroceryForm :groceryItem="groceryItem" :buttonText="'Edit item'" @submit="submitGrocery" />
</template>

<style scoped></style>
