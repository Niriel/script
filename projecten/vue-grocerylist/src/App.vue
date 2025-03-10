<script setup>
import {computed, reactive, ref} from 'vue';

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

const groceryList = ref([
    reactive(new GroceryItem('Bread', 1.0)),
    reactive(new GroceryItem('Broccoli', 0.99)),
    reactive(new GroceryItem('Krentenbollen', 1.2)),
    reactive(new GroceryItem('Nuts', 2.99)),
]);

const totalCost = computed(() => {
    return groceryList.value.reduce((acc, item) => acc + item.cost, 0.0);
});
</script>

<template>
    <header>
        <h1>Vue grocery list</h1>
    </header>
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
                    <td class="price">{{ item.cost.toFixed(2) }}</td>
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

<style scoped>
table {
    margin: 0.5em auto;
    border-collapse: collapse;
    border-top: 2px solid;
    border-bottom: 2px solid;
}

td,
th {
    padding-left: 8px;
    padding-right: 8px;
}

/* Table headers that form a row at the top of the table */
th[scope='col'] {
    text-align: center;
    border-bottom: 1px solid;
}

/* Table headers that form a column on the left of the table */
th[scope='row'] {
    text-align: left;
    /* border-right: 1px solid; */
}

td.price {
    font-family: 'Courier New', Courier, monospace;
    text-align: right;
}

input[type='number'] {
    width: 64px;
    text-align: right;
}
</style>
