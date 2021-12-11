import Cookies from 'js-cookie'


export const makeURLQueryString = (url, params) => {
    var esc = encodeURIComponent;
    var query = Object.keys(params)
        .map(k => esc(k) + '=' + esc(params[k]))
        .join('&');
    if (query) {
        url += '?' + query
    }

    return url;
}

export const setToken = (token) => {
    Cookies.set('access_token', token);
}

export const setRefreshToken = (token) => {
    Cookies.set('refresh_token', token);
}

export const getToken = () => {
    return Cookies.get('access_token');
}

export const getRefreshToken = () => {
    return Cookies.get('refresh_token');
}

export const removeToken = () => {
    Cookies.remove('access_token');
    Cookies.remove('refresh_token');
}