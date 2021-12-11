import { Api } from './index';
import { CLIENT_ID, CLIENT_SECRET } from './../config'

export default {
    login(user) {
        return Api.post('login', {
            client_id: CLIENT_ID,
            client_secret: CLIENT_SECRET,
            username: user.email,
            password: user.password
        })
    },

    async getAuthData() {
        return await Api.get('auth-user-data');
    }
}