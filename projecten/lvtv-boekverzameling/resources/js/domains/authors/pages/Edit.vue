<script setup lang="ts">
import { useRoute, useRouter } from 'vue-router';

import { Author, editAuthor, getAuthorById } from '../store';
import AuthorForm from '../components/AuthorForm.vue';
import { getRouteId, maybe } from '../../../utils/funcs';

const route = useRoute();
const author_id = getRouteId(route);
const author = maybe(getAuthorById)(author_id);

const router = useRouter();
const onSumbitted = async (localAuthor: Author) => {
    await editAuthor(localAuthor);
    router.push({ name: 'authors.overview' });
}
const onCanceled = () => {
    router.go(-1);
}
</script>

<template>
    <template v-if="author">
        <header>
            <h1 class="page_title center">Edit author</h1>
        </header>
        <main>
            <AuthorForm :author="author" :buttonText="'Edit'" @submited="onSumbitted" @canceled="onCanceled"/>
        </main>
    </template>
    <template v-else>
        404
    </template>
</template>

<style scoped></style>
