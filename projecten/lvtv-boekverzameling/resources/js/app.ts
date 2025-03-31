import App from './App.vue';
import { createApp } from 'vue';
import { useRouterInApp } from './services/router';
import { configureRoutes } from './router';

configureRoutes();

const app = createApp(App);
useRouterInApp(app);
app.mount('#app');
