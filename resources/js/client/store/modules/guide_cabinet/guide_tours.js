import util from '../utilites';
import axios from "axios";

const BASE_GUIDE_TOURS_LINK = '/api/guide-cabinet/tours'

let state = {
    guide_tours: [],
    guide_tours_paginate_object: [],
}

const getters = {
    getGuideTours: state => {
        return state.guide_tours
    },
    getGuideTourById: (state) => (id) => {
        return state.guide_tours.find(item => item.id === id)
    },
    getGuideToursPaginateObject: state => state.guide_tours_paginate_object || [],
}

const actions = {
    errorsGuideTours(context) {
        context.commit('setGuideTours',
            !localStorage.getItem('travel_store_guide_tours') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_tours')))

        context.commit('setGuideToursPaginateObject',
            !localStorage.getItem('travel_store_guide_tours_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_tours_paginate_object')))
    },
    async guideToursPage(context, payload) {

        let link = payload.url || BASE_GUIDE_TOURS_LINK
        let method = payload.method || 'GET'
        let data = payload.data || null

        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data

            context.commit('setGuideTours', dataObject.data)
            delete dataObject.data
            context.commit('setGuideToursPaginateObject', dataObject)

        }).catch(err => {
            context.dispatch("errorsGuideTours")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async uploadToursExcel(context, formData) {
        return axios.post(`${BASE_GUIDE_TOURS_LINK}/upload-tours-excel`, formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then((response) => {

        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            context.dispatch("errorsGuideTours")
            return Promise.reject(err);

        })
    },
    async editGuideTour(context, payload) {

        let _axios = util.makeAxiosFactory(`${BASE_GUIDE_TOURS_LINK}/update/${payload.id}`, 'POST', payload.data)
        return _axios.then((response) => {
            return response
        }).catch(err => {
            context.dispatch("errorsGuideTours")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async addTour(context, tour) {
        let _axios = util.makeAxiosFactory(`${BASE_GUIDE_TOURS_LINK}`, 'POST', tour)
        return _axios.then((response) => {

        }).catch(err => {
            context.dispatch("errorsGuideTours")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async addTourToArchive(context, tourId) {
        return await context.dispatch("guideToursPage", {
            url: `${BASE_GUIDE_TOURS_LINK}/archive-add/${tourId}`
        })
    },
    async removeTourFromArchive(context, tourId) {
        return await context.dispatch("guideToursPage", {
            url: `${BASE_GUIDE_TOURS_LINK}/archive-remove/${tourId}`,
            method: 'DELETE'
        })
    },
    async removeTour(context, tourId) {
        return await context.dispatch("guideToursPage", {
            url: `${BASE_GUIDE_TOURS_LINK}/${tourId}`,
            method: 'DELETE'
        })
    },
    async requestGuideTourVerified(context, tourId) {

        let _axios = util.makeAxiosFactory(`${BASE_GUIDE_TOURS_LINK}/request-tour-verified/${tourId}`)

        return _axios.then((response) => {

        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            context.dispatch("errorsGuideTours")
            return Promise.reject(err);
        })
    },
    async clearArchiveTours(context) {
        return await context.dispatch("guideToursPage", {
            url: `${BASE_GUIDE_TOURS_LINK}/archive-clear`
        })
    },
    async loadGuideToursFilteredByPage(context, payload) {

        let data = payload.filterObject,
            page = payload.page || 0,
            size = payload.size || 15

        return await context.dispatch("guideToursPage", {
            url: `${BASE_GUIDE_TOURS_LINK}/search?page=${page}&size=${size}`,
            method: 'POST',
            data: data
        })
    },
    async loadGuideTourById(context, id) {
        let _axios = util.makeAxiosFactory(`${BASE_GUIDE_TOURS_LINK}/${id}`)
        return _axios.then((response) => {
            return response
        }).catch(err => {
            context.dispatch("errorsGuideTours")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async loadGuideToursByPage(context, payload = {category: 0, page: 0, size: 100}) {
        let page = payload.page || 0,
            size = payload.size || 100,
            category = payload.category || 0

        return await context.dispatch("guideToursPage", {
                url: `${BASE_GUIDE_TOURS_LINK}?page=${page}&size=${size}&category=${category}`
            }
        )
    },
}

const mutations = {
    setGuideTours(state, payload) {
        state.guide_tours = payload || []

        localStorage.setItem('travel_store_guide_tours', JSON.stringify(payload));
    },
    setGuideToursPaginateObject(state, payload) {
        state.guide_tours_paginate_object = payload || [];
        localStorage.setItem('travel_store_guide_tours_paginate_object', JSON.stringify(payload));
    }
}

const guideToursModule = {
    state,
    mutations,
    actions,
    getters
}
export default guideToursModule;
