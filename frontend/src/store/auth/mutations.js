export const SET_LOGIN = (state, data) => {
    state.status.loggedIn = true;
    state.user = data;
    state.permissions = data.permissions;
    state.sidebar = data.sidebar;
}

export const SET_LOGOUT = (state) => {
    state.status.loggedIn = false;
    state.user = null;
    state.permissions = null;
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