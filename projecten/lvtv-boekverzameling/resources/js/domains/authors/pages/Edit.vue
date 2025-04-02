<script setup lang="ts">
import { useRoute } from 'vue-router';

import { goBack, goToRoute } from '../../../services/router';
import { getRouteId, maybe } from '../../../utils/funcs';
import { Author, authorStore } from '../store';
import AuthorForm from '../components/AuthorForm.vue';

const route = useRoute();
const author_id = getRouteId(route);
const author = maybe(authorStore.getters.byId)(author_id);

const onSumbitted = async (localAuthor: Author) => {
    await authorStore.actions.update(localAuthor);
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
            <AuthorForm :author="author" :buttonText="'Edit'" @submitted="onSumbitted" @canceled="onCanceled"/>
        </main>
    </template>
    <template v-else>
        404
    </template>
</template>

<style scoped></style>
