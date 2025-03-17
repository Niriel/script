import Overview from './pages/Overview.vue';
import Create from './pages/Create.vue';
import Edit from './pages/Edit.vue';

export const routes = [
    {path: '/', component: Overview, name: 'book_collection.overview'},
    {path: '/create', component: Create, name: 'book_collection.create'},
    {path: '/edit/:id', component: Edit, name: 'book_collection.edit'},
];
