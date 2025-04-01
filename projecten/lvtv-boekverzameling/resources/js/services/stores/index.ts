import { computed, ref } from 'vue';
import { deleteRequest, getRequest, postRequest, putRequest } from '../http';


export const storeModuleFactory = <T extends {id: number}>(moduleName: string) => {
    const state = ref<{[id:number] : T}>({});
    
    const getters = {
        all: computed<T[]>(() => Object.values(state.value)),
        byId: (id: number) => computed<T>(() => state.value[id]),
    };

    const setters = {
        set: (item: T) => {
            state.value[item.id] = item;
        },
        setAll: (items: T[]) => {
            items.forEach(item => {
                state.value[item.id] = item;
            });
        },
    };

    const actions = {
        getAll: async () => {
            const { data } = await getRequest(moduleName);
            if (data) {
                setters.setAll(data);
            }
        },

        create: async (item: T) => {
            const { data } = await postRequest(moduleName, item);
            if (data) {
                setters.setAll(data);
            }
        },

        update: async (item: T) => {
            const { data } = await putRequest(`${moduleName}/${item.id}`, item);
            if (data) {
                setters.setAll(data);
            }
        },

        delete: async (item: T) => {
            const { data } = await deleteRequest(`${moduleName}/${item.id}`);
            if (data) {
                setters.setAll(data);
            }
        },
    };

    return {
        getters,
        actions,
    }
};
