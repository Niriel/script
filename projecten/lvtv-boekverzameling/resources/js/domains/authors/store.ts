import { computed, ref } from 'vue';
import { deleteRequest, getRequest, postRequest, putRequest } from '../../services/http';

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

const authors = ref<Author[]>([]);

export const fetchAuthors = async () => {
    const { data } = await getRequest('/authors');
    if (!data) return;
    authors.value = data;
}

export const createAuthor = async (author: Author) => {
    const { data } = await postRequest('/authors', author);
    if (!data) return;
    authors.value = data;    
}

export const editAuthor = async (author: Author) => {
    const { data } = await putRequest(`/authors/${author.id}`, author);
    if (!data) return;
    authors.value = data;
}

export const deleteAuthor = async (author: Author) => {
    const { data } = await deleteRequest(`/authors/${author.id}`);
    if (!data) return;
    authors.value = data;
}

export const getAllAuthors = computed(() => authors.value);
export const getAuthorById = (id:number) => computed(() => authors.value.find(item => item.id === id));
