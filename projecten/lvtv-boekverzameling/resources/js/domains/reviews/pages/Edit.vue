<script setup lang="ts">
import { useRoute, useRouter } from 'vue-router';

import { maybe } from '../../../utils/funcs';
import { Review, getReviewById, editReview } from '../store';

const route = useRoute();
const router = useRouter();

let review_id: number|null = null;
if (typeof route.params.id === 'string') {
    review_id = parseInt(route.params.id);
}

const maybe_review = maybe(getReviewById)(review_id);

const onFormSumbitted = (localReview: Review) => {
    editReview(localReview);
    router.push({ name: 'books.show', params:{ id: localReview.book_id } });
}

</script>
<template>
    <header>
        <h2>Edit Review</h2>
    </header>
    <main>
        <template v-if="maybe_review">
            <BookForm :review="maybe_review" :buttonText="'Edit'" @submit="onFormSumbitted"/>
        </template>
        <template v-else>
            <p>404</p>
        </template>
    </main>
</template>

<style scoped></style>
