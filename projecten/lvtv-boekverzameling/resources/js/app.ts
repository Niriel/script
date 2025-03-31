import App from './App.vue';
import { createApp } from 'vue';
import { addRoutes, useRouterInApp } from './services/router';
import { appRoutes } from './router';

addRoutes(appRoutes);

const app = createApp(App);
useRouterInApp(app);
app.mount('#app');
