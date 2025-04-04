import { computed, ref } from 'vue';
import { deleteRequest, getRequest, postRequest, putRequest } from '../http';


export const storeModuleFactory = <T extends {id: number}>(moduleName: string) => {
    const state = ref<{[id:number] : T}>({});

    const getters = {
        all: computed<T[]>(() => Object.values(state.value)),
        byId: (id: number) => computed<T>(() => state.value[id]),
    };

    const setters = {
        setAll: (items: T[]) => {
            items.forEach(item => {
                state.value[item.id] = item;
            });
        },
        set: (item: T) => {
            state.value[item.id] = item;
        },
        deleteById: (id: number) => {
            delete state.value[id];
        }
    };

    const actions = {
        getAll: async () => {
            const response = await getRequest(moduleName);
            const data = response.data;
            if (!data) return;
            setters.setAll(data);
        },

        getById: async (id: number) => {
            const { data } = await getRequest(`${moduleName}/${id}`);
            if (!data) return;
            setters.set(data);
        },

        create: async (item: T) => {
            const { data } = await postRequest(moduleName, item);
            if (!data) return;
            setters.set(data);
        },

        update: async (item: T) => {
            const { data } = await putRequest(`${moduleName}/${item.id}`, item);
            if (!data) return;
            setters.set(data);
        },

        delete: async (id: number) => {
            await deleteRequest(`${moduleName}/${id}`);
            setters.deleteById(id);
        },
    };

    return {
        getters,
        actions,
    }
};
