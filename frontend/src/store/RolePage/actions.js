import rolepage from './../../Api/rolepage';

export const getRolePage = ({ commit }) => {
    return new Promise((resolve, reject) => {
        return rolepage.getRolePage().then(({ data }) => {
            commit('SET_ROLE_LIST_DATA', data);
            resolve(data)
        }).catch(error => {
            // request failed 
            reject(error) // return error to calling function
        })
    })

}

export const getRolePageInfoByRoleId = ({ commit }, params) => {
    return new Promise((resolve, reject) => {
        return rolepage.getRolePageInfoByRoleId(params).then(({ data }) => {
            commit('SET_ROLE_PAGE_INFO_DATA', data);
            resolve(data)
        }).catch(error => {
            // request failed 
            reject(error) // return error to calling function
        })
    })

}