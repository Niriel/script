import { computed } from 'vue';
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

export const reviewsStore = storeModuleFactory<Review>('/reviews');
export const getReviewsByBookId = (book_id: number) => computed<Review[]>(
     () => reviewsStore.getters.all.value.filter((review:Review) => review.book_id === book_id)
);
