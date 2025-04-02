<script setup lang="ts">
import { ref } from 'vue';

import { goBack, goToRoute } from '../../../services/router';
import { User, userStore, emptyUser } from '../store';
import UserForm from '../components/UserForm.vue';

const user = ref(emptyUser());

const onSubmitted = async (localUser: User) => {
    await userStore.actions.create(localUser);
    goToRoute('users.overview');
}

const onCanceled = () => {
    goBack();
}

</script>
<template>
    <header class="page_header">
        <h1 class="page_title center">Register a new user</h1>
    </header>
    <main>
        <UserForm :user="user" :buttonText="'Register user'" @submitted="onSubmitted" @canceled="onCanceled" />
    </main>
</template>

<style scoped></style>
