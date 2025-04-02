import Overview from './pages/Overview.vue';
import Create from './pages/Create.vue';
import Show from './pages/Show.vue';
import Edit from './pages/Edit.vue';
import Delete from './pages/Delete.vue';

export const routes = [
    {path: '/users', component: Overview, name: 'users.overview', alias: '/'},
    {path: '/users/create', component: Create, name: 'users.create'},
    {path: '/users/:id', component: Show, name: 'users.show'},
    {path: '/users/:id/edit', component: Edit, name: 'users.edit'},
    {path: '/users/:id/delete', component: Delete, name: 'users.delete'},
];
