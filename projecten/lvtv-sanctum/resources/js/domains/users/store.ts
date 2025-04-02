import { storeModuleFactory } from '../../services/stores';

export interface User {
    id: number,
    name: string,
    email: string,
    tubular: boolean,
}

export const emptyUser = ():User => {
    return {
        id: 0,
        name: '',
        email: '',
        tubular: false,
    }
}

export const userStore = storeModuleFactory<User>('/users');
