export const SET_LOGIN = (state, data) => {
    state.status.loggedIn = true;
    state.user = data.user;
    state.permissions = data.permission;
    state.order_status_list = data.order_status_list;
    state.default_route = data.default_route;
}

export const SET_LOGOUT = (state) => {
    state.status.loggedIn = false;
    state.user = {
        user_type:0,
        email:'',
        name:'',
    };
    state.permissions = {};
}

export const SET_LOADER = (state, payload) => {
    state.loader = payload;
}

export const SET_INVALID_ROUTE = (state, payload) => {
    state.inValidRoute = payload;
}

export const SET_PERMISSION = (state, payload) => {
    state.isNotPermitted = payload
}