
import util from "./utilites";


let state = {

}

const getters = {

}

const actions = {
    async preRegistration(context, regForm) {
        let _axios = util.makeAxiosFactory('/api/pre-registration', 'POST', regForm)

        return _axios.then((response) => {
           return response
        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async registration(context, regForm) {
        let _axios = util.makeAxiosFactory('/api/registration', 'POST', regForm)

        return _axios.then((response) => {
            return response
        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async loginWithCode(context, authForm) {
        let _axios = util.makeAxiosFactory('/api/login-with-code', 'POST', authForm)

        return _axios.then((response) => {
            return response
        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async login(context, authForm) {
        let _axios = util.makeAxiosFactory('/api/login', 'POST', authForm)

        return _axios.then((response) => {
            return response
        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async preRecovery(context, recoveryForm) {
        let _axios = util.makeAxiosFactory('/api/pre-recovery', 'POST', recoveryForm)
        return _axios.then((response) => {
            return response
        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async preRecoveryCode(context, recoveryForm) {
        let _axios = util.makeAxiosFactory('/api/pre-recovery-code', 'POST', recoveryForm)
        return _axios.then((response) => {
            return response
        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async recovery(context, recoveryForm) {
        let _axios = util.makeAxiosFactory('/api/recovery', 'POST', recoveryForm)
        return _axios.then((response) => {
            return response
        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },

}

const mutations = {

}

const authModule = {
    state,
    mutations,
    actions,
    getters
}
export default authModule;
