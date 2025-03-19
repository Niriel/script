import { computed, ref } from 'vue';
import axios from 'axios';

export interface Author {
    id: number,
    name: string,
    biography: string|null,
}

export interface Book {
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

export const createBook = async (book:Book) => {
    axios.post('/api/books', book)
    .then(response => book.id = response.data.id)
    .catch(
        error => {
            console.log('createBook post error');
            if (error.response) {
                // We got an actual response but it's not in 200.
                console.log('Server response:');
                console.log('status: ', error.response.status);
                console.log('data: ', error.response.data);
                console.log('headers: ', error.response.headers);
            } else if (error.request) {
                // We never got a response.
                console.log('Server never replied to our request:');
                console.log('request: ', error.request);
            } else {
                // We couldn't even create a proper request.
                console.log('We messed up the request:')
                console.log('Message: ', error.message);
            }
        }
    )    
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
