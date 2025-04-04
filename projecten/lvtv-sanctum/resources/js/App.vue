<script setup>
import { userStore } from './domains/users/store';

userStore.actions.getAll();
</script>

<template>
    <header class="website_header">
        <h1 class="website_logo"><a href="/">Script Sanctum</a></h1>
        <nav class="website_nav columns">
            <div class="column_grow center">
                <menu>
                    <li><RouterLink :to="{ name: 'users.overview' }" role="button">Users</RouterLink></li>
                </menu>
            </div>
            <div class="column_fix">
                <menu>
                    <li><RouterLink :to="{ name: 'auth.login' }" role="button">Log In</RouterLink></li>
                    <li><RouterLink :to="{ name: 'auth.logout' }" role="button">Log Out</RouterLink></li>
                </menu>
            </div>
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
