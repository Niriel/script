<script setup>
import { userStore } from './domains/users/store';

userStore.actions.getAll();
</script>

<template>
    <header class="website_header">
        <h1 class="website_logo"><a href="/">Sanctum and stuff</a></h1>
        <nav class="website_nav">
            <menu>
                <li><RouterLink :to="{ name: 'users.overview' }" role="button">Users</RouterLink></li>
            </menu>
        </nav>
    </header>
    <main class="website_content">
        <RouterView />
    </main>
    <footer class="website_footer">
        <nav>
            <menu>
                <li>&copy; 2025 Script B.V.</li>
                <li><a href="#">Privacy &amp; cookies</a></li>
                <li><a href="#">Help</a></li>
                <li><a href="#">Contact us</a></li>
            </menu>
        </nav>
    </footer>
</template>

<style scoped></style>
