import { computed, ref } from 'vue';
import { deleteRequest, getRequest, postRequest, putRequest } from '../http';

export const storeModuleFactory = <T extends {id: number}>(moduleName: string) => {
    const state = ref<{[id:number] : T}>({});
    
    const getters = {
        all: computed(() => Object.values(state.value)),
        byId: (id: number) => computed(() => state.value[id]),
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

        create: async (newData: T) => {
            const { data } = await postRequest(moduleName, newData);
            if (data) {
                setters.setAll(data);
            }
        },

        update: async (betterData: T) => {
            const { data } = await putRequest(`${moduleName}/${betterData.id}`, betterData);
            if (data) {
                setters.setAll(data);
            }
        },

        delete: async (terribleData: T) => {
            const { data } = await deleteRequest(`${moduleName}/${terribleData.id}`);
            if (data) {
                setters.setAll(data);
            }
        },
    };

    return {
        state,
        getters,
        actions,
    }
};
