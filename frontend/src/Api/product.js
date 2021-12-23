import { Api } from './index';
import { makeURLQueryString } from '../Helper';

export default {
    getProducts(params) {
        console.log(params)
        return Api.get(makeURLQueryString('product/list', params))
    },

    productAdd(params) {
        return Api.post('product/add', params)
    },

    getProductById(params) {
        return Api.get('product/' + params)
    },

    productEdit(params) {
        return Api.put('product/edit/' + params.id, params)
    },

    productDelete(params) {
        return Api.delete('product/delete/' + params)
    },
    
}