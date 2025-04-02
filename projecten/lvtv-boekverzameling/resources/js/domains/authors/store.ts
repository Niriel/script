import { storeModuleFactory } from '../../services/stores';

export interface Author {
    id: number,
    name: string,
    biography: string|null,
}

export const emptyAuthor = ():Author => {
    return {
        id: 0,
        name: '',
        biography: null,
    }
}

export const authorStore = storeModuleFactory<Author>('/authors');
