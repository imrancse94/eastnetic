import role from './../../Api/role';

export const getRoles = ({ commit }, params) => {
    return new Promise((resolve, reject) => {
        return role.getRoles(params).then(({ data }) => {
            resolve(data)
        }).catch(error => {
            reject(error) // return error to calling function
        })
    })

}

export const getRoleById = ({ commit }, params) => {
    return new Promise((resolve, reject) => {
        return role.getRoleById(params).then(({ data }) => {
            resolve(data)
        }).catch(error => {
            reject(error) // return error to calling function
        })
    })

}

export const roleAdd = ({ commit }, params) => {
    return new Promise((resolve, reject) => {
        return role.roleAdd(params).then(({ data }) => {
            resolve(data)
        }).catch(error => {
            reject(error) // return error to calling function
        })
    })

}


export const roleEdit = ({ commit }, params) => {
    return new Promise((resolve, reject) => {
        return role.roleEdit(params).then(({ data }) => {
            resolve(data)
        }).catch(error => {
            reject(error) // return error to calling function
        })
    })

}

export const roleDelete = ({ commit }, params) => {
    return new Promise((resolve, reject) => {
        return role.roleDelete(params).then(({ data }) => {
            resolve(data)
        }).catch(error => {
            reject(error) // return error to calling function
        })
    })

}


