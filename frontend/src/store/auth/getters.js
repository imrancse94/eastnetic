export const loginResult = (state) => {
    if (state.user) {
        return state.user.user;
    }
    return null;
}

export const getSidebarList = (state) => {
    return state.sidebar;
}

export const getPermissionList = (state) => {
    return state.permissions;
}


export const isAuthenticated = (state) => {
    return state.status.loggedIn;
}

export const isNotPermitted = (state) => {
    return state.isNotPermitted;
}