import module from './../../Api/module';

export const getModules = ({ commit }, params) => {
    return module.getModules(params).then(({ data }) => {
        return Promise.resolve(data.data);
    }).catch(error => {
        return Promise.reject(error);
    })
}


export const moduleAdd = ({ commit }, params) => {
    return module.moduleAdd(params).then(({ data }) => {
        const response = data;
        commit('ADD_MODULE', response);
        return Promise.resolve(response);
    })
}



export const getModuleById = ({ commit }, params) => {
    return module.getModuleById(params).then(({ data }) => {
        const response = data.data;
        commit('GET_MODULE_BY_ID', response);
        return Promise.resolve(response);
    })
}


export const moduleEdit = ({ commit }, params) => {

    return module.moduleEdit(params).then(({ data }) => {
        const response = data;
        commit('MODULE_EDIT_BY_ID', response);
        return Promise.resolve(response);
    })
}


export const moduleDelete = ({ commit }, params) => {

    return module.moduleDelete(params).then(({ data }) => {
        const response = data;
        commit('MODULE_DELETE_BY_ID', response);
        return Promise.resolve(response);
    })
}


export const moduleList = ({ commit }, params) => {

    return module.moduleList(params).then(({ data }) => {
        const response = data.data;
        commit('GET_MODULE_LIST', response);
        return Promise.resolve(response);
    })
}