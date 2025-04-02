<script setup lang="ts">
import { ref } from 'vue';

import { goBack, goToRoute } from '../../../services/router';
import { Author, authorStore, emptyAuthor } from '../store';
import AuthorForm from '../components/AuthorForm.vue';

const author = ref(emptyAuthor());

const onSubmitted = async (localAuthor: Author) => {
    await authorStore.actions.create(localAuthor);
    goToRoute('authors.overview');
}

const onCanceled = () => {
    goBack();
}
</script>

<template>
    <header>
        <h1 class="page_title center">Add a new author</h1>
    </header>
    <main>
        <AuthorForm :author="author" :buttonText="'Add to authors'" @submitted="onSubmitted" @canceled="onCanceled"/>
    </main>
</template>
<style scoped></style>
