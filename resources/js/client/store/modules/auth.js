
import util from "./utilites";


let state = {

}

const getters = {

}

const actions = {
    async registration(context, regForm) {
        let _axios = util.makeAxiosFactory('/api/registration', 'POST', regForm)

        return _axios.then((response) => {
            let role = response.data.role
            window.location.href = `/${role}-cabinet`
        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },

    async login(context, authForm) {
        let _axios = util.makeAxiosFactory('/api/login', 'POST', authForm)

        return _axios.then((response) => {
            let role = response.data.role
            window.location.href = `/${role}-cabinet`
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
