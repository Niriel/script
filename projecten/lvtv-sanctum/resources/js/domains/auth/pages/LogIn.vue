<script setup lang="ts">
import { ref } from "vue";
import { goBack, goToRoute } from "../../../services/router";
import { getRequest, postRequest } from "../../../services/http";
import axios from "axios";

const email = ref("");
const password = ref("");
const me = ref("");

const errorMessages = ref<string[]>([]);

const onCancel = () => {
    goBack();
};

const onLogIn = async () => {
    const response = await postRequest("/login", {
        email: email.value,
        password: password.value,
    });
    console.log(response.data.user);
};

const onWhoAmI = async () => {
    const { data } = await getRequest("/me");
    if (!data) return;
    me.value = data.user ? data.user.name : "";
};
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
                        <input
                            type="text"
                            id="user_email"
                            v-model="email"
                            required
                        />
                    </div>

                    <div class="form_field">
                        <label for="user_password">Password:</label>
                        <input
                            type="password"
                            id="user_password"
                            v-model="password"
                            required
                        />
                    </div>

                    <blockquote v-if="errorMessages.length">
                        <ul>
                            <li v-for="errorMessage in errorMessages">
                                <samp>{{ errorMessage }}</samp>
                            </li>
                        </ul>
                    </blockquote>

                    <div class="form_buttons">
                        <button type="submit" class="full_width good">
                            Log in
                        </button>
                        <button type="button" @click="onCancel">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
        <section class="silly">
            <h2>/me</h2>
            <div>
                <button type="button" @click="onWhoAmI">
                    Ja ok das goed maar wie is het dat ik ben? Druk op mij als
                    je dit graag wil weten.
                </button>
            </div>
            <p>
                Me:
                <samp v-if="me" class="awesome">{{ me }}</samp>
                <em v-else>Dat weet ik nog niet hoor, ga maar drukkie doen.</em>
            </p>
        </section>
    </main>
</template>

<style scoped>
.silly {
    margin: 2em;
    border: 1px solid black;
    border-radius: 3px;
    padding: 1em;
}
.awesome {
    font-size: xx-large;
    color: red;
}
.awesome::before {
    content: ">>";
}
.awesome::after {
    content: "<<";
}
</style>
