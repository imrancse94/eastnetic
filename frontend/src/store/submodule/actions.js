import submodule from './../../Api/submodule';

export const getSubModules = ({ commit }, params) => {
    return submodule.getSubModules(params).then(({ data }) => {
        const response = data.data;
        //commit('GET_SUBMODULE', response);
        return Promise.resolve(response);
    }).catch(error => {
        return Promise.reject(error);
    })
}


export const subModuleAdd = ({ commit }, params) => {

    return submodule.subModuleAdd(params).then(({ data }) => {
        const response = data;
        commit('ADD_SUBMODULE', response);
        return Promise.resolve(response);
    })
}



export const getSubModuleById = ({ commit }, params) => {

    return submodule.getSubModuleById(params).then(({ data }) => {
        const response = data.data;
        commit('GET_SUBMODULE_BY_ID', response);
        return Promise.resolve(response);
    })
}


export const subModuleEdit = ({ commit }, params) => {

    return submodule.subModuleEdit(params).then(({ data }) => {
        const response = data;
        commit('SUBMODULE_EDIT_BY_ID', response);
        return Promise.resolve(response);
    })
}


export const subModuleDelete = ({ commit }, params) => {

    return submodule.subModuleDelete(params).then(({ data }) => {
        const response = data;
        commit('SUBMODULE_DELETE_BY_ID', response);
        return Promise.resolve(response);
    })
}