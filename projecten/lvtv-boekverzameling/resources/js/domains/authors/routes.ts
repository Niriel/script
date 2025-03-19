import Overview from './pages/Overview.vue';
import Create from './pages/Create.vue';
import Show from './pages/Show.vue';
import Edit from './pages/Edit.vue';
import Delete from './pages/Delete.vue';

export const routes = [
    {path: '/authors', component: Overview, name: 'authors.overview'},
    {path: '/authors/create', component: Create, name: 'authors.create'},
    {path: '/authors/:id', component: Show, name: 'authors.show'},
    {path: '/authors/:id/edit', component: Edit, name: 'authors.edit'},
    {path: '/authors/:id/delete', component: Delete, name: 'authors.delete'},
];
