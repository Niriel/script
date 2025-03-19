import Overview from './pages/Overview.vue';
import Create from './pages/Create.vue';
import Show from './pages/Show.vue';
import Edit from './pages/Edit.vue';
import Delete from './pages/Delete.vue';

export const routes = [
    {path: '/reviews', component: Overview, name: 'reviews.overview'},
    {path: '/reviews/create', component: Create, name: 'reviews.create'},
    {path: '/reviews/:id', component: Show, name: 'reviews.show'},
    {path: '/reviews/:id/edit', component: Edit, name: 'reviews.edit'},
    {path: '/reviews/:id/delete', component: Delete, name: 'reviews.delete'},
];
