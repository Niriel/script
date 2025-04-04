<script setup lang="ts">
import { ref } from 'vue';
import { goBack } from '../../../services/router';

const onCancel = () => {
    goBack();
}

const onLogOut = () => {
    console.log(`Logging out`);
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

                        <div class="form_buttons">
                            <button type="submit" class="full_width bad">Log out</button>
                            <button type="button" @click="onCancel">Cancel</button>
                        </div>
                    </div>
            </form>
        </div>
    </main>
</template>
