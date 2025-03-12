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
        <RouterLink :to="{name: 'groceries.overview'}" role="button" :class="highlightForPath('/')">
            Overview
        </RouterLink>
        <RouterLink :to="{name: 'groceries.create'}" role="button" :class="highlightForPath('/create')">
            Create
        </RouterLink>
    </nav>
    <main>
        <RouterView />
    </main>
</template>

<style scoped></style>
