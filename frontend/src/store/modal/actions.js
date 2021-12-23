export const openModal = ({ commit },payload) => {
    commit('OPEN_MODAL', payload);
}

export const closeModal = ({ commit }) => {
    commit('CLOSE_MODAL', false);
}