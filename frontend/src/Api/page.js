import { Api } from './index';
import { makeURLQueryString } from '../Helper';

export default {
    getPages(params) {
        return Api.get(makeURLQueryString('pages', params))
    },

    PageAdd(params) {
        return Api.post('pageAdd', params)
    },

    getPageById(params) {
        return Api.get('page/edit/' + params.id)
    },

    PageEdit(params) {
        return Api.put('page/edit/' + params.id, params)
    },

    PageDelete(params) {
        return Api.delete('page/delete/' + params)
    }
}