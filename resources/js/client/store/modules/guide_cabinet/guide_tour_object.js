import util from '../utilites';

const BASE_GUIDE_TOUR_OBJECTS_LINK = '/api/guide-cabinet/tour-objects'

let state = {
    guide_tour_objects: [],
    guide_tour_objects_paginate_object: null,
}

const getters = {
    getGuideTourObjects: state => state.guide_tour_objects || [],
    getGuideActiveTourObjects: (state) => {
        return state.guide_tour_objects.filter(item => item.deleted_at == null)
    },
    getGuideRemovedTourObjects: (state) => {
        return state.guide_tour_objects.filter(item => item.deleted_at !== null)
    },
    getGuideTourObjectById: (state) => (id) => {
        return state.guide_tour_objects.find(item => item.id === id)
    },
    getGuideTourObjectsPaginateObject: state => state.guide_tour_objects_paginate_object || null,
}

const actions = {
    errorsGuideTourObjects(context) {
        context.commit('setGuideTourObjects',
            !localStorage.getItem('travel_store_guide_tour_objects') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_tour_objects')))

        context.commit('setGuideTourObjectsPaginateObject',
            !localStorage.getItem('travel_store_guide_tour_objects_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_tour_objects_paginate_object')))
    },
    async guideTourObjectsPage(context, payload) {

        let link = payload.url || BASE_GUIDE_TOUR_OBJECTS_LINK,
            method = payload.method || 'GET',
            data = payload.data || null

        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            context.commit('setGuideTourObjects', dataObject.data)
            delete dataObject.data
            context.commit('setGuideTourObjectsPaginateObject', dataObject)

        }).catch(err => {
            context.dispatch("errorsGuideTourObjects")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async addTourObject(context, tourObject) {
        let link = `${BASE_GUIDE_TOUR_OBJECTS_LINK}`
        let _axios = util.makeAxiosFactory(link, 'POST', tourObject)
        return _axios.then((response) => {
            return response.data
        }).catch(err => {
            context.dispatch("errorsGuideTourObjects")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async clearGuideTourObjects(context) {
        return await context.dispatch("guideTourObjectsPage", {
            url: `${BASE_GUIDE_TOUR_OBJECTS_LINK}/clear`
        })
    },
    async removedGuideTourObjectsById(context, tourObjectId) {
        let link = `${BASE_GUIDE_TOUR_OBJECTS_LINK}/remove/${tourObjectId}`
        let _axios = util.makeAxiosFactory(link, 'DELETE')
        return _axios.then((response) => {

        }).catch(err => {
            context.dispatch("errorsGuideTourObjects")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })

    },
    async restoreRemovedGuideTourObjectsById(context, tourObjectId) {
        return await context.dispatch("guideTourObjectsPage", {
            url: `${BASE_GUIDE_TOUR_OBJECTS_LINK}/restore/${tourObjectId}`
        })

    },
    async loadGuideTourObjectsFilteredByPage(context, payload = {filterObject: null, page: 0, size: 12}) {
        let filterObject = payload.filterObject,
            page = payload.page || 0,
            size = payload.size || 12

        return await context.dispatch("guideTourObjectsPage", {
            url: `${BASE_GUIDE_TOUR_OBJECTS_LINK}/search?page=${page}&size=${size}`,
            method: 'POST',
            data: filterObject
        })
    },
    async loadGuideTourObjectsByPage(context, payload = {page: 0, size: 12}) {
        let page = payload.page || 0,
            size = payload.size || 15

        return await context.dispatch("guideTourObjectsPage", {
            url: `${BASE_GUIDE_TOUR_OBJECTS_LINK}?page=${page}&size=${size}`
        })
    },
    async loadRemovedGuideTourObjectsByPage(context, payload = {page: 0, size: 12}) {
        let page = payload.page || 0,
            size = payload.size || 15

        return await context.dispatch("guideTourObjectsPage", {
            url: `${BASE_GUIDE_TOUR_OBJECTS_LINK}?removed=1&page=${page}&size=${size}`
        })
    },
}

const mutations = {
    setGuideTourObjects(state, payload) {
        state.guide_tour_objects = payload || [];
        localStorage.setItem('travel_store_guide_tour_objects', JSON.stringify(payload));
    },
    setGuideTourObjectsPaginateObject(state, payload) {
        state.guide_tour_objects_paginate_object = payload || [];
        localStorage.setItem('travel_store_guide_tour_objects_paginate_object', JSON.stringify(payload));
    }
}

const guideTourObjectsModule = {
    state,
    mutations,
    actions,
    getters
}
export default guideTourObjectsModule;
