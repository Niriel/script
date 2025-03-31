import { computed, ref } from 'vue';
import { deleteRequest, getRequest, postRequest, putRequest } from '../http';

export const storeModuleFactory = (moduleName: string) => {
    const state = ref<{[id:number] : {id:number}}>({});
    
    const getters = {
        all: computed(() => Object.values(state.value)),
        byId: (id: number) => computed(() => state.value[id]),
    };

    const setters = {
        setAll: (items: {id:number}[]) => {
            items.forEach(item => {
                state.value[item.id] = item;
            });
        }
    };

    const actions = {
        getAll: async () => {
            const { data } = await getRequest(moduleName);
            if (data) {
                setters.setAll(data);
            }
        },

        post: async (newData: any) => {
            const { data } = await postRequest(moduleName, newData);
            if (data) {
                setters.setAll(data);
            }
        },

        update: async (betterData: {id: number}) => {
            const { data } = await putRequest(`${moduleName}/${betterData.id}`, betterData);
            if (data) {
                setters.setAll(data);
            }
        },

        delete: async (terribleData: {id: number}) => {
            const { data } = await deleteRequest(`${moduleName}/${terribleData.id}`);
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
