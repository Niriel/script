import LogIn from './pages/LogIn.vue';
import LogOut from './pages/LogOut.vue';

export const routes = [
    {path: '/auth/login', component: LogIn, name: 'auth.login'},
    {path: '/auth/logout', component: LogOut, name: 'auth.logout'},
];
