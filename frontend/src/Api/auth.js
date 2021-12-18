import { Api } from './index';

export default {
    login(user) {
        return Api.post('login', {
            email: user.email,
            password: user.password
        });
    },

    async getAuthData() {
        return await Api.get('auth/user');
    },

    logout(){
        return Api.post('user/logout',{});
    }
}