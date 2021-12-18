import axios from "axios";
import { getToken, setToken, removeToken } from './../Helper'
//import router from './../router' 
import store from './../store';
import * as config from './../config';
import router from './../router'

export const Api = axios.create({
    baseURL: config.API_BASE_URL
});

const actionScope = `loading`;
let requestsPending = 0;
const req = {
    pending: () => {
        requestsPending++;
        store.dispatch(`${actionScope}/startLoading`);
    },
    done: () => {
        requestsPending--;
        if (requestsPending <= 0) {
            store.dispatch(`${actionScope}/stopLoading`);
        }
    }
};

Api.interceptors.request.use(function(config) {
    req.pending();
    const token = getToken();

    config.headers.Authorization = 'Bearer ' + token;
    config.headers['Content-Type'] = 'application/json';
    config.headers['Accept'] = 'application/json';
    //console.log('resquest.success', config);
    //console.log('request loader_status', store.getters['loading/getLoaderStatus']);

    return config;

}, function(error) {
    req.done();
    //console.log('resquest.error', error);
    return Promise.reject(error);
});

Api.interceptors.response.use(
    response => {
        req.done();
        //console.log('response.success', response);
        //console.log('response loader_status', store.getters['loading/getLoaderStatus']);
        return response;
    },
    error => {
        req.done();
        //console.log('resquest.error', error);
        //store.dispatch('auth/setLogout');
        //router.push({name:'Login'})
        return Promise.reject(error);
        // Reject promise if usual error

        /* 
         * When response code is 401, try to refresh the token.
         * Eject the interceptor so it doesn't loop in case
         * token refresh causes the 401 response
         */

        // console.log('sssssssss',error.response.status);


    }
);


export const header = () => {
    let token = getToken();
    let obj = {};

    if (token) {
        obj = {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        };
    }

    return obj;
}


export const parameters = (params) => {
    var obj = {};

    if (params) {
        obj['params'] = params;
    }

    return obj;
}