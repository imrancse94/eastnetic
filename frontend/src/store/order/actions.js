import order from './../../Api/order';

export const getOrders = ({ commit }, params) => {
    return order.getOrders(params).then(({ data }) => {
        return Promise.resolve(data.data);
    }).catch(error => {
        return Promise.reject(error);
    })
}


export const orderAdd = ({ commit }, params) => {
    return order.orderAdd(params).then(({ data }) => {
        const response = data;
        return Promise.resolve(response);
    })
}



export const getorderById = ({ commit }, params) => {
    return order.getorderById(params).then(({ data }) => {
        const response = data.data;
        return Promise.resolve(response);
    })
}


export const orderEdit = ({ commit }, params) => {
    return order.orderEdit(params).then(({ data }) => {
        const response = data;
        commit('order_EDIT_BY_ID', response);
        return Promise.resolve(response);
    })
}


export const orderDelete = ({ commit }, params) => {

    return order.orderDelete(params).then(({ data }) => {
        const response = data;
        commit('order_DELETE_BY_ID', response);
        return Promise.resolve(response);
    })
}


export const orderList = ({ commit }, params) => {

    return order.orderList(params).then(({ data }) => {
        const response = data.data;
        commit('GET_order_LIST', response);
        return Promise.resolve(response);
    })
}