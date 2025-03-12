<script setup>
import {computed} from 'vue';
import {deleteGroceryItemById, groceryItemCost} from '../domains/groceries/store';
import {useRouter} from 'vue-router';

const {groceryList} = defineProps({
    groceryList: Array,
});

const router = useRouter();

const totalCost = computed(() => groceryList.reduce((acc, item) => acc + groceryItemCost(item), 0.0));

const goToEditPage = item => router.push({name: 'edit', params: {id: item.id}});

const EDIT_CAPTION = '\u{1f589}';
const DELETE_CAPTION = '\u{1F5D1}';
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
                    <th scope="col">actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in groceryList" :key="index">
                    <th scope="row">{{ item.name }}</th>
                    <td class="price">{{ item.unitPrice.toFixed(2) }}</td>
                    <td>
                        <input type="number" min="0" step="1" v-model="item.quantity" />
                    </td>
                    <td class="price">{{ groceryItemCost(item).toFixed(2) }}</td>
                    <td>
                        <div class="grid2">
                            <button @click="goToEditPage(item)" class="small_btn">
                                {{ EDIT_CAPTION }}
                            </button>
                            <button @click="deleteGroceryItemById(item.id)" class="small_btn">
                                {{ DELETE_CAPTION }}
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th scope="row" colspan="3">Total cost</th>
                    <td class="price">{{ totalCost.toFixed(2) }}</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </main>
</template>

<style scoped></style>
