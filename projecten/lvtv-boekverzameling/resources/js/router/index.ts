import {createMemoryHistory, createRouter} from 'vue-router';
import { routes } from '../domains/book_collection/routes';

export const router = createRouter({
    history: createMemoryHistory(),
    routes,
});
