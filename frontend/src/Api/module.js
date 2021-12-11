import { Api } from './index';
import { makeURLQueryString } from './../Helper';

export default {
    getModules(params) {
        return Api.get(makeURLQueryString('modules', params))
    },

    moduleAdd(params) {
        return Api.post('moduleAdd', params)
    },

    getModuleById(params) {
        return Api.get('module/edit/' + params)
    },

    moduleEdit(params) {

        return Api.put('module/edit/' + params.id, params)

    },

    moduleDelete(params) {
        return Api.delete('module/delete/' + params)
    },
    moduleList(params) {
        return Api.get('moduleList', params);
    }
}