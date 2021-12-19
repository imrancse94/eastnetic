import { Api } from './index';
import { makeURLQueryString } from './../Helper';

export default {
    getOrders(params) {
        return Api.get(makeURLQueryString('order/list', params))
    },

    // moduleAdd(params) {
    //     return Api.post('moduleAdd', params)
    // },

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