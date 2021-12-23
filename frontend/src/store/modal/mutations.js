export const OPEN_MODAL = (state, payload) => {
    state.status = true;
    state.data = payload;

}

export const CLOSE_MODAL = (state, payload) => {
    state.status = payload;

}