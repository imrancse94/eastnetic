import { Api } from './index';
import { makeURLQueryString } from './../Helper';

export default {
    getUserGroups(params){
        return Api.get(makeURLQueryString('usergroups', params))
    },

    getUserGroupList(params){
        return Api.get('usergrouplist',params)
    },

    userGroupAdd(params){
        return Api.post('usergroupAdd',params);
    },

    getUserGroupById(params){
        return Api.get('usergroup/edit/' + params.id)
    },

    deleteUsergroupById(params){
        return Api.delete('usergroup/delete/' + params)
    },

    userGroupEdit(params){
        return Api.put('usergroup/edit/' + params.id, params)
    }
}