<script setup>
const props = defineProps({
    groceryItem: Object,
});
</script>

<template>
    <form>
        <table>
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="item_name">Name:</label>
                    </th>
                    <td>
                        <input id="item_name" type="text" v-model="groceryItem.name" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="item_unit_price">Unit price:</label>
                    </th>
                    <td>
                        <input id="item_unit_price" type="number" v-model="groceryItem.unitPrice" min="0" step="0.01" />
                    </td>
                </tr>
                <tr></tr>
                <tr>
                    <th scope="row">
                        <label for="item_quantity">Quantity:</label>
                    </th>
                    <td>
                        <input id="item_quantity" type="number" v-model="groceryItem.quantity" min="0" step="1" />
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</template>

<style scoped></style>
