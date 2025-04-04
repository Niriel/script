<script setup lang="ts">
import { ref } from 'vue';
import { goBack } from '../../../services/router';

const email = ref('');
const password = ref('');

const onCancel = () => {
    goBack();
}

const onLogIn = () => {
    console.log(`Loggin in as ${email}:${password}.`);
}
</script>

<template>
    <header class="page_header">
        <div class="columns">
            <div class="column_fix category">Authentication</div>
            <div class="column_grow center page_title"><h1>Log in</h1></div>
        </div>
    </header>
    <main>
        <div class="dialog">
            <form @submit.prevent="onLogIn" class="real_form">
                    <div class="container">
                        <h2 class="dialog_title">Enter your credentials</h2>

                        <div class="form_field">
                            <label for="user_email">E-mail:</label>
                            <input type="text" id="user_email" v-model="email" />
                        </div>

                        <div class="form_field">
                            <label for="user_password">Password:</label>
                            <input type="password" id="user_password" v-model="password" />
                        </div>

                        <div class="form_buttons">
                            <button type="submit" class="full_width good">Log in</button>
                            <button type="button" @click="onCancel">Cancel</button>
                        </div>
                    </div>
            </form>
        </div>
    </main>
</template>
