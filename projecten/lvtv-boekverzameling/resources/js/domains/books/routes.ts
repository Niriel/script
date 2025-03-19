import AuthorsOverview from './pages/AuthorsOverview.vue';
import BooksOverview from './pages/BooksOverview.vue';
import BooksCreate from './pages/BooksCreate.vue';
import BooksEdit from './pages/BooksEdit.vue';

export const routes = [
    {path: '/', component: BooksOverview, name: 'books.overview'},
    {path: '/create', component: BooksCreate, name: 'books.create'},
    {path: '/edit/:id', component: BooksEdit, name: 'books.edit'},
    {path: '/authors', component: AuthorsOverview, name: 'authors.overview'}
];
