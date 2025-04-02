<script setup lang="ts">
import { ref } from 'vue';
import { User } from '../store'

const emit = defineEmits(['submitted', 'canceled']);

const { user } = defineProps<{
    user: User,
    buttonText: String,
}>();

// Local copy so we don't mess up the store.
const localUser = ref({...user});

</script>
<template>
    <div class="dialog">
        <form @submit.prevent="$emit('submitted', localUser)" class="real_form">
                <div class="container">
                    <h2 class="dialog_title">User details</h2>

                    <div class="form_field">
                        <label for="user_name">Name:</label>
                        <input type="text" v-model="localUser.name" id="user_name" required />
                    </div>

                    <div class="form_field">
                        <label for="user_email">E-mail:</label>
                        <input type="text" v-model="localUser.email" id="user_email" />
                    </div>

                    <div class="form_field">
                        <input type="checkbox" v-model="localUser.tubular" id="user_tubular" />
                        <label for="user_tubular">groovy, rad and totally tubular</label>
                    </div>

                    <div class="form_buttons">
                        <button type="submit" class="full_width good">{{ buttonText }}</button>
                        <button type="button" @click="$emit('canceled')">Cancel</button>
                    </div>
                </div>
        </form>
    </div>
</template>
