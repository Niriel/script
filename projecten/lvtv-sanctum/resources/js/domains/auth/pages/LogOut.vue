<script setup lang="ts">
import { ref } from 'vue';
import { goBack, goToRoute } from '../../../services/router';
import { postRequest } from '../../../services/http';

const errorMessages = ref<string[]>([]);

const onCancel = () => {
    goBack();
}

const onLogOut = async () => {
    let ok = true;
    const response = await postRequest(
            '/logout',
            null
        ).catch((error) => {
            ok = false;
            if(error.response) {
                errorMessages.value.push('error.response:');
                errorMessages.value.push(`  status: ${error.response.status}`);
                errorMessages.value.push(`  data: ${error.response.data}`);
                errorMessages.value.push(`  header: ${error.response.headers}`);
            } else if (error.request) {
                errorMessages.value.push(`error.request: ${error.request}`);
            } else {
                errorMessages.value.push(`error.message: ${error.message}`);
            }
        }
    );
    if (ok) {
         goToRoute('users.overview');
    }
}
</script>

<template>
    <header class="page_header">
        <div class="columns">
            <div class="column_fix category">Authentication</div>
            <div class="column_grow center page_title"><h1>Log out</h1></div>
        </div>
    </header>
    <main>
        <div class="dialog">
            <form @submit.prevent="onLogOut" class="real_form">
                    <div class="container">
                        <h2 class="dialog_title">Are you sure?</h2>
                        <p>Are you sure that you want to log out?</p>

                        <blockquote v-if="errorMessages.length">
                            <ul>
                                <li v-for="errorMessage in errorMessages"><samp>{{errorMessage}}</samp></li>
                            </ul>
                        </blockquote>

                        <div class="form_buttons">
                            <button type="submit" class="full_width bad">Log out</button>
                            <button type="button" @click="onCancel">Cancel</button>
                        </div>
                    </div>
            </form>
        </div>
    </main>
</template>
