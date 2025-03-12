<script setup>
import {reactive} from 'vue';
import {groceryItemCost} from '../store';

const emit = defineEmits(['submit']);

const props = defineProps({
    groceryItem: Object,
    buttonText: String,
});

// Clone the input so we don't directly modify it.
const localGroceryItem = reactive({...props.groceryItem});
</script>

<template>
    <form v-on:submit.prevent="$emit('submit', localGroceryItem)">
        <table>
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="item_name">Name:</label>
                    </th>
                    <td>
                        <input
                            id="item_name"
                            type="text"
                            v-model.trim="localGroceryItem.name"
                            placeholder="item name"
                            required
                        />
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="item_unit_price">Unit price:</label>
                    </th>
                    <td class="right">
                        <input
                            id="item_unit_price"
                            type="number"
                            v-model="localGroceryItem.unitPrice"
                            min="0"
                            step="0.01"
                        />
                    </td>
                </tr>
                <tr></tr>
                <tr>
                    <th scope="row">
                        <label for="item_quantity">Quantity:</label>
                    </th>
                    <td class="right">
                        <input id="item_quantity" type="number" v-model="localGroceryItem.quantity" min="0" step="1" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Cost:</th>
                    <td class="price">
                        {{ groceryItemCost(localGroceryItem).toFixed(2) }}
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="submit">{{ buttonText }}</button>
    </form>
</template>

<style scoped></style>
