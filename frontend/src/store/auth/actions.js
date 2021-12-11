import auth from './../../Api/auth';
import { setToken, setRefreshToken, removeToken } from './../../Helper'

export const setLogout = ({ commit }) => {
    commit('SET_LOGOUT');
    removeToken();

}

export const setPermissionStatus = ({ commit }, payload) => {
    commit('SET_PERMISSION', payload);
}

export const login = ({ commit }, user) => {
    return auth.login(user).then(({ data }) => {
        const response = data.data;
        if (response.access_token) {
            setToken(response.access_token)
            setRefreshToken(response.refresh_token)
            commit('SET_LOGIN', response);
        }

        return Promise.resolve(data);
    })
}

export const authUser = ({ commit }) => {
    return auth.getAuthData().then(({ data }) => {
        const response = data.data;
        if (response) {
            if (response.access_token) {
                setToken(response.access_token)
                commit('SET_LOGIN', response);
            } else {
                removeToken();
            }
        } else {
            removeToken();
        }
        return Promise.resolve(data);
    }).catch(error => {
        removeToken();
        return Promise.reject(error);
    })
}