export const startLoading = ({ commit }) => {
    commit('SET_LOADER', true);
}

export const stopLoading = ({ commit }) => {
    commit('STOP_LOADER', false);
}