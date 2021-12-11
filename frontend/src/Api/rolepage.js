import { Api } from './index';

export default {
    getRolePage() {
        return Api.get('role-page-list')
    },
    getRolePageInfoByRoleId(role_id) {
        console.log('role_id', role_id);
        return Api.get('role-page-info/' + role_id)
    }
}