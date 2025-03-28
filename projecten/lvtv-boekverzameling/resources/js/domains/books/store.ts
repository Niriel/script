import { computed, ref } from 'vue';
import axios from 'axios';

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

const books = ref<Book[]>([]);

export const fetchBooks = async () => {
    const { data } = await axios.get('/api/books');
    if (!data) return;
    books.value = data;
}

export const createBook = async (book:Book) => {
    const { data } = await axios.post('/api/books', book);
    if (!data) return;
    books.value = data;    
}

export const editBook = async (book:Book) => {
    const { data } = await axios.put(`/api/books/${book.id}`, book);
    if (!data) return;
    books.value = data;
}

export const deleteBook = async (book:Book) => {
    const { data } = await axios.delete(`/api/books/${book.id}`);
    if (!data) return;
    books.value = data;
}

export const getAllBooks = computed<Book[]>(() => books.value);
export const getBookById = (id:number) => computed(() => books.value.find(item => item.id === id));
export const getBooksByAuthorId = (author_id: number) => computed<Book[]>(
    () => books.value.filter(book => book.author_id === author_id) as Book[]
);
