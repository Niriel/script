import Overview from './pages/Overview.vue';
import Create from './pages/Create.vue';
import Edit from './pages/Edit.vue';
import Show from './pages/Show.vue';
import Delete from './pages/Delete.vue';

export const routes = [
    {path: '/books', component: Overview, name: 'books.overview', alias: '/'},
    {path: '/books/create', component: Create, name: 'books.create'},
    {path: '/books/:id', component: Show, name: 'books.show'},
    {path: '/books/:id/edit', component: Edit, name: 'books.edit'},
    {path: '/books/:id/delete', component: Delete, name: 'books.delete'},
];
