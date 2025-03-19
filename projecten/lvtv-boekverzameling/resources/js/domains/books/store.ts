import { computed, ref } from 'vue';
import axios from 'axios';

export interface Book {
    id: number;
    title: string;
    author_id: number|null;
    isbn: string|null;
}

export const emptyBook = ():Book => {
    return {
        id: 0,
        title: '',
        author_id: null,
        isbn: null,
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

export const getAllBooks = computed(() => books.value);
export const getBookById = (id:number) => computed(() => books.value.find(item => item.id == id) as Book);
