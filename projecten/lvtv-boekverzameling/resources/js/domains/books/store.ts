import { computed, ref } from 'vue';
import axios from 'axios';

interface Author {
    id: number,
    name: string,
    biography: string|null,
}

interface Book {
    id: number;
    title: string;
    author_id: number|null;
    isbn: string|null;
    review_ids: number[];
}

const authors = ref<Author[]>([]);
const books = ref<Book[]>([]);

export const fetchAuthors = async () => {
    const { data } = await axios.get('api/authors');
    if (!data) return;
    authors.value = data;
}

export const fetchBooks = async () => {
    const { data } = await axios.get('/api/books');
    if (!data) return;
    books.value = data;
}

export const emptyAuthor = ():Author => {
    return {
        id: 0,
        name: '',
        biography: null,
    }
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

export const getAllAuthors = computed(() => authors.value);
export const getAllBooks = computed(() => books.value);
