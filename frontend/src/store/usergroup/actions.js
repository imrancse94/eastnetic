import usergroup from './../../Api/usergroup';

export const getUserGroups = ({ commit }, params) => {
    return usergroup.getUserGroups(params).then(({ data }) => {
        return Promise.resolve(data.data);
    }).catch(error => {
        return Promise.reject(error);
    })
}


export const getUserGroupList = ({ commit }, params) => {
    return usergroup.getUserGroupList(params).then(({ data }) => {
        return Promise.resolve(data.data);
    }).catch(error => {
        return Promise.reject(error);
    })
}

export const userGroupAdd = ({ commit }, params) => {
    return usergroup.userGroupAdd(params).then(({ data }) => {
        return Promise.resolve(data);
    }).catch(error => {
        return Promise.reject(error);
    })
}

export const getUserGroupById = ({ commit }, params) => {
    return usergroup.getUserGroupById(params).then(({ data }) => {
        return Promise.resolve(data.data);
    }).catch(error => {
        return Promise.reject(error);
    })
}


export const deleteUsergroupById = ({ commit }, params) => {
    return usergroup.deleteUsergroupById(params).then(({ data }) => {
        return Promise.resolve(data);
    }).catch(error => {
        return Promise.reject(error);
    })
}

export const userGroupEdit = ({ commit }, params) => {
    return usergroup.userGroupEdit(params).then(({ data }) => {
        return Promise.resolve(data.data);
    }).catch(error => {
        return Promise.reject(error);
    })
}

