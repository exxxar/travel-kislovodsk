import util from '../utilites';
import axios from "axios";

const BASE_ADMIN_USERS_LINK = '/admin/api/users-and-guides'

let state = {
    admin_users: [],
    admin_users_paginate_object: [],
}

const getters = {
    getAdminUsers: state => {
        return state.admin_users
    },
    getAdminUserById: (state) => (id) => {
        return state.admin_users.find(item => item.id === id)
    },
    getAdminUsersPaginateObject: state => state.admin_users_paginate_object || [],
}

const actions = {
    errorsAdminUsers(context) {
        context.commit('setAdminUsers',
            !localStorage.getItem('travel_store_admin_users') ?
                [] : JSON.parse(localStorage.getItem('travel_store_admin_users')))

        context.commit('setAdminUsersPaginateObject',
            !localStorage.getItem('travel_store_admin_users_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_admin_users_paginate_object')))
    },
    async adminUsersPage(context, payload) {

        let link = payload.url || BASE_ADMIN_USERS_LINK
        let method = payload.method || 'GET'
        let data = payload.data || null

        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data

            context.commit('setAdminUsers', dataObject.data)
            delete dataObject.data

            console.log("dataObject",dataObject)
            context.commit('setAdminUsersPaginateObject', dataObject)

        }).catch(err => {
            context.dispatch("errorsAdminUsers")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async uploadAdminUsersExcel(context, formData) {
        return axios.post(`${BASE_ADMIN_USERS_LINK}/upload-tours-excel`, formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then((response) => {

        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            context.dispatch("errorsAdminUsers")
            return Promise.reject(err);

        })
    },
    async editAdminUser(context, payload) {

        let _axios = util.makeAxiosFactory(`${BASE_ADMIN_USERS_LINK}/update/${payload.id}`, 'POST', payload.data)
        return _axios.then((response) => {
            return response
        }).catch(err => {
            context.dispatch("errorsAdminUsers")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async addAdminUser(context, tour) {
        let _axios = util.makeAxiosFactory(`${BASE_ADMIN_USERS_LINK}`, 'POST', tour)
        return _axios.then((response) => {

        }).catch(err => {
            context.dispatch("errorsAdminUsers")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async removeAdminUser(context, tourId) {
        return await context.dispatch("adminUsersPage", {
            url: `${BASE_ADMIN_USERS_LINK}/${tourId}`,
            method: 'DELETE'
        })
    },

    async loadAdminUsersFilteredByPage(context, payload) {

        let data = payload.filterObject,
            page = payload.page || 0,
            size = payload.size || 15

        return await context.dispatch("adminUsersPage", {
            url: `${BASE_ADMIN_USERS_LINK}/search?page=${page}&size=${size}`,
            method: 'POST',
            data: data
        })
    },
    async loadAdminUserById(context, id) {
        let _axios = util.makeAxiosFactory(`${BASE_ADMIN_USERS_LINK}/${id}`)
        return _axios.then((response) => {
            return response
        }).catch(err => {
            context.dispatch("errorsAdminUsers")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
}

const mutations = {
    setAdminUsers(state, payload) {
        state.admin_users = payload || []

        localStorage.setItem('travel_store_admin_users', JSON.stringify(payload));
    },
    setAdminUsersPaginateObject(state, payload) {
        state.admin_users_paginate_object = payload || [];
        localStorage.setItem('travel_store_admin_users_paginate_object', JSON.stringify(payload));
    }
}

const adminUsersModule = {
    state,
    mutations,
    actions,
    getters
}
export default adminUsersModule;
