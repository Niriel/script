import { computed, ref } from 'vue';
import axios from 'axios';

export interface Review {
    id: number,
    book_id: number,
    content: string,
}

export const emptyReview = ():Review => {
    return {
        id: 0,
        book_id: 0,
        content: '',
    }
}

const reviews = ref<Review[]>([]);

export const fetchReviews = async () => {
    const { data } = await axios.get('api/reviews');
    if (!data) return;
    reviews.value = data;
}

export const getAllReviews = computed(() => reviews.value);
export const getReviewById = (id:number) => computed(() => reviews.value.find(item => item.id == id) as Review);
