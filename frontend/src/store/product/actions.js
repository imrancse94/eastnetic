import product from './../../Api/product';

export const getProducts = ({ commit }, params) => {
    return product.getProducts(params).then(({ data }) => {
        return Promise.resolve(data.data);
    }).catch(error => {
        return Promise.reject(error);
    })
}


export const productAdd = ({ commit }, params) => {
    return product.productAdd(params).then(({ data }) => {
        const response = data;
        return Promise.resolve(response);
    })
}



export const getProductById = ({ commit }, params) => {
    return product.getProductById(params).then(({ data }) => {
        const response = data.data;
        return Promise.resolve(response);
    })
}


export const productEdit = ({ commit }, params) => {
    return product.productEdit(params).then(({ data }) => {
        return Promise.resolve(data);
    })
}


export const productDelete = ({ commit }, params) => {
    return product.productDelete(params).then(({ data }) => {
        return Promise.resolve(data);
    })
}
