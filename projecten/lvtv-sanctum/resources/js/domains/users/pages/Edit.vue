<script setup lang="ts">
import { useRoute } from 'vue-router';

import { goBack, goToRoute } from '../../../services/router';
import { getRouteId, maybe } from '../../../utils/funcs';
import { User, userStore } from '../store';
import UserForm from '../components/UserForm.vue';

const user_id = getRouteId(useRoute());
const user = maybe(userStore.getters.byId)(user_id);

const onSumbitted = async (localUser: User) => {
    await userStore.actions.update(localUser);
    goToRoute('users.show', localUser.id);
}
const onCanceled = () => {
    goBack();
}
</script>

<template>
    <template v-if="user">
        <header class="page_header">
            <h1 class="page_title center">Edit User</h1>
        </header>
        <main>
            <UserForm :user="user" :buttonText="'Edit'" @submitted="onSumbitted" @canceled="onCanceled"/>
        </main>
    </template>
    <template v-else>
        404
    </template>
</template>

<style scoped></style>
