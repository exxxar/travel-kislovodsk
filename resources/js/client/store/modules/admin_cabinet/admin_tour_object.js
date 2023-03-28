import util from '../utilites';
import axios from "axios";

const BASE_ADMIN_TOUR_OBJECTS_LINK = '/admin/api/tour-objects'

let state = {
    admin_tour_objects: [],
    admin_tour_objects_paginate_object: null,
}

const getters = {
    getAdminTourObjects: state => state.admin_tour_objects || [],
    getAdminTourObjectById: (state) => (id) => {
        return state.admin_tour_objects.find(item => item.id === id)
    },
    getAdminTourObjectsPaginateObject: state => state.admin_tour_objects_paginate_object || null,
}

const actions = {
    errorsAdminTourObjects(context) {
        context.commit('setAdminTourObjects',
            !localStorage.getItem('travel_store_admin_tour_objects') ?
                [] : JSON.parse(localStorage.getItem('travel_store_admin_tour_objects')))

        context.commit('setAdminTourObjectsPaginateObject',
            !localStorage.getItem('travel_store_admin_tour_objects_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_admin_tour_objects_paginate_object')))
    },
    async adminTourObjectsPage(context, payload) {

        let link = payload.url || BASE_ADMIN_TOUR_OBJECTS_LINK,
            method = payload.method || 'GET',
            data = payload.data || null

        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            context.commit('setAdminTourObjects', dataObject.data)
            delete dataObject.data
            context.commit('setAdminTourObjectsPaginateObject', dataObject)

        }).catch(err => {
            context.dispatch("errorsAdminTourObjects")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async uploadTourObjectsExcel(context, formData) {
        return axios.post(`${BASE_ADMIN_TOUR_OBJECTS_LINK}/upload-tour-objects-excel`, formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then((response) => {

        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            context.dispatch("errorsAdminTourObjects")
            return Promise.reject(err);

        })
    },
    async addAdminTourObject(context, tourObject) {
        let link = `${BASE_ADMIN_TOUR_OBJECTS_LINK}`
        let _axios = util.makeAxiosFactory(link, 'POST', tourObject)
        return _axios.then((response) => {
            return response.data
        }).catch(err => {
            context.dispatch("errorsAdminTourObjects")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async editAdminTourObject(context, payload) {
        let link = `${BASE_ADMIN_TOUR_OBJECTS_LINK}/edit/${payload.id}`
        let _axios = util.makeAxiosFactory(link, 'POST', payload.data)
        return _axios.then((response) => {
            return response.data
        }).catch(err => {
            context.dispatch("errorsAdminTourObjects")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async clearAdminTourObjects(context) {
        return await context.dispatch("adminTourObjectsPage", {
            url: `${BASE_ADMIN_TOUR_OBJECTS_LINK}/clear`
        })
    },
    async loadAdminTourObjectById(context, id){
        let _axios = util.makeAxiosFactory(`${BASE_ADMIN_TOUR_OBJECTS_LINK}/${id}`)
        return _axios.then((response) => {
            return response
        }).catch(err => {
            context.dispatch("errorsAdminTourObjects")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async removedAdminTourObjectsById(context, tourObjectId) {
        let link = `${BASE_ADMIN_TOUR_OBJECTS_LINK}/remove/${tourObjectId}`
        let _axios = util.makeAxiosFactory(link, 'DELETE')
        return _axios.then((response) => {

        }).catch(err => {
            context.dispatch("errorsAdminTourObjects")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })

    },
    async restoreRemovedAdminTourObjectsById(context, tourObjectId) {
        return await context.dispatch("adminTourObjectsPage", {
            url: `${BASE_ADMIN_TOUR_OBJECTS_LINK}/restore/${tourObjectId}`
        })

    },
    async loadAdminTourObjectsFilteredByPage(context, payload = {filterObject: null, page: 0, size: 12}) {
        let filterObject = payload.filterObject,
            page = payload.page || 0,
            size = payload.size || 12

        return await context.dispatch("adminTourObjectsPage", {
            url: `${BASE_ADMIN_TOUR_OBJECTS_LINK}/search?page=${page}&size=${size}`,
            method: 'POST',
            data: filterObject
        })
    },
    async loadAdminTourObjectsByPage(context, payload = {page: 0, size: 12}) {
        let page = payload.page || 0,
            size = payload.size || 15

        return await context.dispatch("adminTourObjectsPage", {
            url: `${BASE_ADMIN_TOUR_OBJECTS_LINK}?page=${page}&size=${size}`
        })
    },

}

const mutations = {
    setAdminTourObjects(state, payload) {
        state.admin_tour_objects = payload || [];
        localStorage.setItem('travel_store_admin_tour_objects', JSON.stringify(payload));
    },
    setAdminTourObjectsPaginateObject(state, payload) {
        state.admin_tour_objects_paginate_object = payload || [];
        localStorage.setItem('travel_store_admin_tour_objects_paginate_object', JSON.stringify(payload));
    }
}

const adminTourObjectsModule = {
    state,
    mutations,
    actions,
    getters
}
export default adminTourObjectsModule;
