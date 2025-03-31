import { computed, ref } from 'vue';
import axios from 'axios';
import { deleteRequest, getRequest, postRequest, putRequest } from '../../services/http';
import { storeModuleFactory } from '../../services/stores';

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

export const reviewsStore = storeModuleFactory('/reviews');
export const getReviewsByBookId = (book_id: number) => computed<Review[]>(
     () => Object.entries(reviewsStore.state.value).filter([id, review] => review.book_id === book_id) as Review[]
);
