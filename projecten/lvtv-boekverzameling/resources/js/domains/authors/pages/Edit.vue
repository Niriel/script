<script setup lang="ts">
import { useRoute } from 'vue-router';

import { goBack, goToRoute } from '../../../services/router';
import { getRouteId, maybe } from '../../../utils/funcs';
import { Author, editAuthor, getAuthorById } from '../store';
import AuthorForm from '../components/AuthorForm.vue';

const route = useRoute();
const author_id = getRouteId(route);
const author = maybe(getAuthorById)(author_id);

const onSumbitted = async (localAuthor: Author) => {
    await editAuthor(localAuthor);
    goToRoute('authors.show', localAuthor.id);
}
const onCanceled = () => {
    goBack();
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
