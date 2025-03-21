import {createMemoryHistory, createRouter} from 'vue-router';
import { routes as authorsRoutes } from '../domains/authors/routes';
import { routes as booksRoutes } from '../domains/books/routes';
import { routes as reviewsRoutes } from '../domains/reviews/routes';

const routes = [...authorsRoutes, ...booksRoutes, ...reviewsRoutes];

export const router = createRouter({
    history: createMemoryHistory(),
    routes: routes,
});
