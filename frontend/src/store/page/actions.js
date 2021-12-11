import Page from './../../Api/page';

export const getPages = ({ commit }, params) => {
    return Page.getPages(params).then(({ data }) => {
        const response = data.data;
        //commit('GET_Page', response);
        return Promise.resolve(response);
    }).catch(error => {
        return Promise.reject(error);
    })
}


export const PageAdd = ({ commit }, params) => {

    return Page.PageAdd(params).then(({ data }) => {
        const response = data;
        commit('ADD_Page', response);
        return Promise.resolve(response);
    })
}



export const getPageById = ({ commit }, params) => {

    return Page.getPageById(params).then(({ data }) => {
        const response = data.data;
        //commit('GET_Page_BY_ID', response);
        return Promise.resolve(response);
    }).catch(err => {
        return Promise.reject(err);
    })
}


export const PageEdit = ({ commit }, params) => {

    return Page.PageEdit(params).then(({ data }) => {
        const response = data;
        commit('Page_EDIT_BY_ID', response);
        return Promise.resolve(response);
    })
}


export const PageDelete = ({ commit }, params) => {

    return Page.PageDelete(params).then(({ data }) => {
        const response = data;
        commit('Page_DELETE_BY_ID', response);
        return Promise.resolve(response);
    })
}