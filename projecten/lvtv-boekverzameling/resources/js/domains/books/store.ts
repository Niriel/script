import { computed, ref } from 'vue';
import axios from 'axios';

interface Book {
    id: number;
    title: string;
    author_id: number;
    isbn: string;
    review_ids: number[];
}

const books = ref<Book[]>([]);

export const fetchBooks = async () => {
    const { data } = await axios.get('/api/books');
    if (!data) return;
    books.value = data;
}

export const getAllBooks = computed(() => books.value);
