<script setup>
import {useRoute} from 'vue-router';

const route = useRoute();

const highlightForPath = path => {
    return route.fullPath === path ? 'highlight' : '';
};
</script>

<template>
    <header>
        <h1>Vue groceries</h1>
    </header>
    <nav>
        <RouterLink to="/" role="button" v-bind:class="highlightForPath('/')">Overview</RouterLink>
        <RouterLink to="/create" role="button" v-bind:class="highlightForPath('/create')">Create</RouterLink>
    </nav>
    <main>
        <RouterView />
    </main>
</template>

<style scoped></style>
