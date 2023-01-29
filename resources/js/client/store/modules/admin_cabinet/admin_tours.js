import util from '../utilites';
import axios from "axios";

const BASE_ADMIN_TOURS_LINK = '/admin/api/tours'

let state = {
    admin_tours: [],
    admin_tours_paginate_object: [],
}

const getters = {
    getAdminTours: state => {
        return state.admin_tours
    },
    getAdminTourById: (state) => (id) => {
        return state.admin_tours.find(item => item.id === id)
    },
    getAdminToursPaginateObject: state => state.admin_tours_paginate_object || [],
}

const actions = {
    errorsAdminTours(context) {
        context.commit('setAdminTours',
            !localStorage.getItem('travel_store_admin_tours') ?
                [] : JSON.parse(localStorage.getItem('travel_store_admin_tours')))

        context.commit('setAdminToursPaginateObject',
            !localStorage.getItem('travel_store_admin_tours_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_admin_tours_paginate_object')))
    },
    async adminToursPage(context, payload) {

        let link = payload.url || BASE_ADMIN_TOURS_LINK
        let method = payload.method || 'GET'
        let data = payload.data || null

        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data

            context.commit('setAdminTours', dataObject.data)
            delete dataObject.data
            context.commit('setAdminToursPaginateObject', dataObject)

        }).catch(err => {
            context.dispatch("errorsAdminTours")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async uploadToursExcel(context, formData) {
        return axios.post(`${BASE_ADMIN_TOURS_LINK}/upload-tours-excel`, formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then((response) => {

        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            context.dispatch("errorsAdminTours")
            return Promise.reject(err);

        })
    },
    async editAdminTour(context, payload) {

        let _axios = util.makeAxiosFactory(`${BASE_ADMIN_TOURS_LINK}/update/${payload.id}`, 'POST', payload.data)
        return _axios.then((response) => {
            return response
        }).catch(err => {
            context.dispatch("errorsAdminTours")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async addTour(context, tour) {
        let _axios = util.makeAxiosFactory(`${BASE_ADMIN_TOURS_LINK}`, 'POST', tour)
        return _axios.then((response) => {

        }).catch(err => {
            context.dispatch("errorsAdminTours")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async addTourToArchive(context, tourId) {
        return await context.dispatch("adminToursPage", {
            url: `${BASE_ADMIN_TOURS_LINK}/archive-add/${tourId}`
        })
    },
    async removeTourFromArchive(context, tourId) {
        return await context.dispatch("adminToursPage", {
            url: `${BASE_ADMIN_TOURS_LINK}/archive-remove/${tourId}`,
            method: 'DELETE'
        })
    },
    async removeTour(context, tourId) {
        return await context.dispatch("adminToursPage", {
            url: `${BASE_ADMIN_TOURS_LINK}/${tourId}`,
            method: 'DELETE'
        })
    },
    async clearArchiveTours(context) {
        return await context.dispatch("adminToursPage", {
            url: `${BASE_ADMIN_TOURS_LINK}/archive-clear`
        })
    },
    async loadAdminToursFilteredByPage(context, payload) {
        let data = payload.filterObject,
            page = payload.page || 0,
            size = payload.size || 15

        return await context.dispatch("adminToursPage", {
            url: `${BASE_ADMIN_TOURS_LINK}/search?page=${page}&size=${size}`,
            method: 'POST',
            data: data
        })
    },
    async loadAdminTourById(context, id) {
        let _axios = util.makeAxiosFactory(`${BASE_ADMIN_TOURS_LINK}/${id}`)
        return _axios.then((response) => {
            return response
        }).catch(err => {
            context.dispatch("errorsAdminTours")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async loadAdminToursByPage(context, payload = {category: 0, page: 0, size: 100}) {
        let page = payload.page || 0,
            size = payload.size || 100,
            category = payload.category || 0

        return await context.dispatch("adminToursPage", {
                url: `${BASE_ADMIN_TOURS_LINK}?page=${page}&size=${size}&category=${category}`
            }
        )
    },
}

const mutations = {
    setAdminTours(state, payload) {
        state.admin_tours = payload || []

        localStorage.setItem('travel_store_admin_tours', JSON.stringify(payload));
    },
    setAdminToursPaginateObject(state, payload) {
        state.admin_tours_paginate_object = payload || [];
        localStorage.setItem('travel_store_admin_tours_paginate_object', JSON.stringify(payload));
    }
}

const adminToursModule = {
    state,
    mutations,
    actions,
    getters
}
export default adminToursModule;
