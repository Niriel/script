import {createMemoryHistory, createRouter} from 'vue-router';
import { routes } from '../domains/books/routes';

export const router = createRouter({
    history: createMemoryHistory(),
    routes,
});
