import { computed, ref } from 'vue';
import { storeModuleFactory } from '../../services/stores';

export interface Book {
    id: number;
    title: string;
    author_id: number|null;
    isbn: string|null;
    review_ids: number[];
}

export const emptyBook = ():Book => {
    return {
        id: 0,
        title: '',
        author_id: null,
        isbn: null,
        review_ids: [],
    }
}

export const bookStore = storeModuleFactory<Book>('/books');
export const getBooksByAuthorId = (author_id: number) => computed<Book[]>(
    () => bookStore.getters.all.value.filter(book => book.author_id === author_id)
);
