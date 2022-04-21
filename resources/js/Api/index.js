import axios from "axios";
import config from "./config";

export const Api = axios.create({
    baseURL: config.baseUrl
});

const actionScope = `loading`;
let requestsPending = 0;
const req = {
    pending: () => {
        requestsPending++;
    },
    done: () => {
        requestsPending--;
    }
};

Api.interceptors.request.use(function(config) {
    req.pending();
    config.headers['Content-Type'] = 'application/json';
    config.headers['Accept'] = 'application/json';
    return config;

}, function(error) {
    req.done();
    return Promise.reject(error);
});

Api.interceptors.response.use(
    response => {
        req.done();
        return response;
    },
    error => {
        req.done();
        console.log('resquest.error', error);
        return Promise.reject(error);

    }
);
