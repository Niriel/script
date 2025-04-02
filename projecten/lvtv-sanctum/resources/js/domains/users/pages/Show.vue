<script setup lang="ts">
import { useRoute } from 'vue-router';

import { getRouteId, maybe } from '../../../utils/funcs';
import { goToRoute } from '../../../services/router';
import { User, userStore } from '../store';

const user_id = getRouteId(useRoute());
const user = maybe(userStore.getters.byId)(user_id);

const goToEditUser = (user: User) => {
    goToRoute('users.edit', user.id)
};

const confirmDeleteUser = async(user: User) => {
    await userStore.actions.delete(user.id);
    goToRoute('users.overview');
}
</script>

<template>
    <template v-if="user">
        <header>
            <div class="page_header">
                <div class="columns">
                    <div class="column_fix category">User</div>
                    <div class="column_grow center page_title">
                        <h1>{{ user.name }}</h1>
                    </div>
                    <div class="column_fix button_row">
                        <button @click="goToEditUser(user)">Edit user</button>
                        <button @click="confirmDeleteUser(user)" class="bad">Delete user</button>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <section>
                <header>
                    <h2>Details about this user</h2>
                </header>
                <main>
                    <dl>
                        <dt>Name:</dt>
                        <dd>{{ user.name }}</dd>
                        <dt>E-mail:</dt>
                        <dd>{{ user.email }}</dd>
                        <dt>Tubularity:</dt>
                        <dd v-if="user.tubular">&#x1f44d; Extremely tubular</dd>
                        <dd v-else>&#x1f44e; Not rad enough</dd>
                    </dl>
                </main>
            </section>
        </main>
    </template>
    <template v-else>
        404
    </template>
</template>
<style scoped></style>
