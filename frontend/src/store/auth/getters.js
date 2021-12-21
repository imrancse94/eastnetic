export const getuser = (state) => {
    if (state.user) {
        return state.user;
    }
    return null;
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