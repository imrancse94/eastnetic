import { Api } from './index';
import { makeURLQueryString } from '../Helper';

export default {
    getRoles(params) {
        return Api.get(makeURLQueryString('roles', params))
    },

    roleAdd(params) {
        return Api.post('roleAdd', params)
    },

    getRoleById(params) {
        return Api.get('role/edit/' + params.id)
    },

    roleEdit(params) {
        return Api.put('role/edit/' + params.id, params)
    },

    roleDelete(params) {
        return Api.delete('role/delete/' + params)
    }
}