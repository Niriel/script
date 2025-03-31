import { routes as authorsRoutes } from '../domains/authors/routes';
import { routes as booksRoutes } from '../domains/books/routes';
import { routes as reviewsRoutes } from '../domains/reviews/routes';


export const appRoutes = [...authorsRoutes, ...booksRoutes, ...reviewsRoutes ]
