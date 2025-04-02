import App from './App.vue';
import { createApp } from 'vue';
import { addRoutes, useRouterInApp } from './services/router';
import { appRoutes } from './router';
import { authorStore } from './domains/authors/store';
import { bookStore } from './domains/books/store';
import { reviewsStore } from './domains/reviews/store';

addRoutes(appRoutes);

const app = createApp(App);
useRouterInApp(app);
app.mount('#app');

authorStore.actions.getAll();
bookStore.actions.getAll();
reviewsStore.actions.getAll();
