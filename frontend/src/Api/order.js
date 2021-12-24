import { Api } from './index';
import { makeURLQueryString } from './../Helper';

export default {
    getOrders(params) {
        return Api.get(makeURLQueryString('order/list', params))
    },

    orderAdd(params) {
        return Api.post('order/add', params)
    },

    getorderById(params) {
        console.log('params',params)
        return Api.get('order/' + params)
    },

    // moduleEdit(params) {

    //     return Api.put('module/edit/' + params.id, params)

    // },

    // moduleDelete(params) {
    //     return Api.delete('module/delete/' + params)
    // },
    // moduleList(params) {
    //     return Api.get('moduleList', params);
    // }
}