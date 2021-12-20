export const getuser = (state) => {
    if (state.user) {
        return state.user;
    }
    return null;
}



export const isAuthenticated = (state) => {
    return state.status.loggedIn;
}

export const isNotPermitted = (state) => {
    return state.isNotPermitted;
}