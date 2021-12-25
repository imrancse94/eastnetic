export const getuser = (state) => {
    if (state.user) {
        return state.user;
    }
    return null;
}
//default_route
export const getDefaultRoute = (state) =>{
    return state.default_route;
}

export const getPermissions = (state) =>{
    return state.permissions;
}

export const getUserType = (state) => {
    return state.user.user_type;
}

export const isAuthenticated = (state) => {
    return state.status.loggedIn;
}

export const isNotPermitted = (state) => {
    return state.isNotPermitted;
}