<script setup>
import {computed} from 'vue';

const props = defineProps({
    groceryList: Array,
});

const totalCost = computed(() => {
    return props.groceryList.reduce((acc, item) => acc + item.unitPrice * item.quantity, 0.0);
});
</script>

<template>
    <main>
        <table>
            <thead>
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">unit price</th>
                    <th scope="col">quantity</th>
                    <th scope="col">cost</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in groceryList" :key="index">
                    <th scope="row">{{ item.name }}</th>
                    <td class="price">{{ item.unitPrice.toFixed(2) }}</td>
                    <td>
                        <input type="number" min="0" step="1" v-model="item.quantity" />
                    </td>
                    <td class="price">{{ (item.unitPrice * item.quantity).toFixed(2) }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th scope="row" colspan="3">Total cost</th>
                    <td class="price">{{ totalCost.toFixed(2) }}</td>
                </tr>
            </tfoot>
        </table>
    </main>
</template>

<style scoped></style>
