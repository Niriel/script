import { App } from "vue";
import { createRouter, createWebHistory, RouteRecordRaw } from "vue-router";

const router = createRouter({
    history: createWebHistory(),
    routes: [],
});

export const useRouterInApp = (app: App) => {
    app.use(router);
}

export const addRoutes = (routes: RouteRecordRaw[]) => {
    for (const route of routes) {
        router.addRoute(route);
    }
};

export const goToRoute = (name: string, id?: number) => {
    const route: { name: string; params?: { id: number } } = { name };
    if (id) {
        route.params = { id };
    }
    router.push(route);
}

export const goBack = () => {
    router.go(-1);
}
