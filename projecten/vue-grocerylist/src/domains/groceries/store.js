import {computed, reactive, ref} from 'vue';

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
    reactive(newGroceryItem('Bread', 1.0)),
    reactive(newGroceryItem('Broccoli', 0.99)),
    reactive(newGroceryItem('Krentenbollen', 1.2)),
    reactive(newGroceryItem('Nuts', 2.99)),
]);

// Getters
export const getAllGroceryItems = computed(() => groceries.value);
export const getGroceryItemById = id => computed(() => groceries.value[id]);

// Actions
export const addGroceryItem = item => groceries.value.push(item);
