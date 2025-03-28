<script setup lang="ts">
import { ref } from 'vue';
import { useRouter } from 'vue-router';

import { Author, createAuthor, emptyAuthor } from '../store';
import AuthorForm from '../components/AuthorForm.vue';

const router = useRouter();

const author = ref(emptyAuthor());

const onSumbited = async (localAuthor: Author) => {
    await createAuthor(localAuthor);
    router.push({ name: 'authors.overview' });
}

const onCanceled = () => {
    router.go(-1);
}

</script>
<template>
    <header>
        <h1 class="page_title center">Add a new author</h1>
    </header>
    <main>
        <AuthorForm :author="author" :buttonText="'Add to authors'" @submited="onSumbited" @canceled="onCanceled"/>
    </main>
</template>
<style scoped></style>
