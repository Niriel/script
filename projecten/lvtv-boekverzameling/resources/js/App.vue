<script setup>
</script>

<template>
    <header class="website_header">
        <h1 class="website_logo"><a href="/">Boekverzameling</a></h1>
        <nav class="website_nav">
            <menu>
                <li><RouterLink :to="{ name: 'authors.overview' }" role="button">Authors</RouterLink></li>
                <li><RouterLink :to="{ name: 'books.overview' }" role="button">Books</RouterLink></li>
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
