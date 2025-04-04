import { routes as authRoutes } from '../domains/auth/routes';
import { routes as userRoutes } from '../domains/users/routes';

export const appRoutes = [...authRoutes, ...userRoutes];
