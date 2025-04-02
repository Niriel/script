<script setup lang="ts">
import { authorStore } from '../../authors/store';
import { maybe } from '../../../utils/funcs';
import { Book } from '../store';
import AuthorLink from '../../authors/components/AuthorLink.vue';
import BookLink from './BookLink.vue';

const props = defineProps<{
    book: Book,
}>();

const author = maybe(authorStore.getters.byId)(props.book.author_id);

</script>

<template>
    <BookLink :book="book" />
    <span class="by">by</span>
    <AuthorLink :author="author" />
</template>
