import Overview from './pages/Overview.vue';
import Create from './pages/Create.vue';
import Edit from './pages/Edit.vue';

export const routes = [
    {path: '/', component: Overview, name: 'groceries.overview'},
    {path: '/create', component: Create, name: 'groceries.create'},
    {path: '/edit/:id', component: Edit, name: 'edit'},
];
