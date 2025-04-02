<script setup lang="ts">
import { goToRoute } from '../../../services/router';
import UserHeadline from '../components/UserHeadline.vue';
import { userStore } from '../store';

const users = userStore.getters.all;

const goToCreateUser = () => {
    goToRoute('users.create');
};
</script>

<template>
    <header>
        <div class="page_header">
            <div class="columns">
                <div class="column_fix category">Users</div>
                <div class="column_grow center page_title"><h1>Users</h1></div>
                <div class="column_fix"><button @click="goToCreateUser" role="button">Add a user</button></div>
            </div>
        </div>
    </header>
    <main>
        <p>Number of users: {{ users.length }}</p>
        <ul>
            <li v-for="user in users"><UserHeadline :user="user" /></li>
        </ul>
        <button @click="goToCreateUser" role="button">Add a user</button>
    </main>
</template>

<style scoped>
</style>
