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
    const { data } = await axios.get('/api/reviews');
    if (!data) return;
    reviews.value = data;
}

export const createReview = async (review:Review) => {
    const { data } = await axios.post('/api/reviews', review);
    if (!data) return;
    reviews.value = data;    
}

export const editReview = async (review:Review) => {
    const { data } = await axios.put(`/api/reviews/${review.id}`, review);
    if (!data) return;
    reviews.value = data;
}

export const deleteReview = async (review:Review) => {
    const { data } = await axios.delete(`/api/reviews/${review.id}`);
    if (!data) return;
    reviews.value = data;
}

export const getAllReviews = computed<Review[]>(() => reviews.value);
export const getReviewById = (id:number) => computed<Review>(() => reviews.value.find(item => item.id === id) as Review);
export const getReviewsByBookId = (book_id: number) => computed<Review[]>(
    () => reviews.value.filter(review => review.book_id === book_id) as Review[]
);
