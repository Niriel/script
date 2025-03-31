import axios from "axios";

const baseURL = '/api';

const http = axios.create({
    baseURL,
    headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json',
    }
});

export const getRequest = (url: string) => http.get(url);
export const postRequest = (url: string, data:any) => http.post(url, data);
export const putRequest = (url: string, data:any) => http.put(url, data);
export const deleteRequest = (url: string) => http.delete(url);
