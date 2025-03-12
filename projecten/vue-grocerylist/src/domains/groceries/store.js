import {computed, ref} from 'vue';

// My unique id system.
let _last_id = 0;

export const newGroceryItem = (name, unitPrice) => {
    _last_id++;
    return {
        id: _last_id,
        name: name,
        unitPrice: unitPrice,
        quantity: 1,
    };
};

export const groceryItemCost = groceryItem => {
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
export const getGroceryItemById = id => computed(() => groceries.value.find(item => item.id === id));

// Actions
export const addGroceryItem = new_item => groceries.value.push(new_item);
export const editGroceryItem = new_item => {
    const index = groceries.value.findIndex(old_item => old_item.id == item.id);
    if (index >= 0) {
        groceries.value[index] = new_item;
    }
};
export const deleteGroceryItemById = id => {
    const index = groceries.value.findIndex(item => item.id == id);
    if (index >= 0) {
        groceries.value.splice(index, 1);
    }
};
