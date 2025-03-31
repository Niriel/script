// import { createRouter, createWebHistory } from 'vue-router';
import { routes as authorsRoutes } from '../domains/authors/routes';
import { routes as booksRoutes } from '../domains/books/routes';
import { routes as reviewsRoutes } from '../domains/reviews/routes';
import { addRoutes } from '../services/router';

export const configureRoutes = () => {
    addRoutes(authorsRoutes);
    addRoutes(booksRoutes);
    addRoutes(reviewsRoutes);
}
// const routes = [...authorsRoutes, ...booksRoutes, ...reviewsRoutes];

// export const router = createRouter({
//     history: createWebHistory(),
//     routes: routes,
// });
