import {computed, ref} from 'vue';

const newGroceryItem = (name, unitPrice) => {
    return {
        name: name,
        unitPrice: unitPrice,
        quantity: 1,
    };
};

const groceryItemCost = groceryItem => {
    return groceryItem.unitPrice * groceryItem.quantity;
};

// State
const groceries = ref([
    newGroceryItem('Bread', 1.0),
    newGroceryItem('Broccoli', 0.99),
    newGroceryItem('Krentenbollen', 1.2),
    newGroceryItem('Nuts', 2.99),
]);

// Getters
export const getAllGroceryItems = computed(() => groceries.value);
export const getGroceryItemByIndex = index => computed(() => groceries.value[index]);
export const getGroceryItemByName = name => computed(() => groceries.value.find(item => item.name === name));

// Actions
export const addGroceryItem = item => groceries.value.push(item);
