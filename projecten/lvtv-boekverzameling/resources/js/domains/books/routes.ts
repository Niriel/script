import Overview from './pages/Overview.vue';
import Create from './pages/Create.vue';
import Edit from './pages/Edit.vue';

export const routes = [
    {path: '/', component: Overview, name: 'books.overview'},
    {path: '/create', component: Create, name: 'books.create'},
    {path: '/edit/:id', component: Edit, name: 'books.edit'},
];
