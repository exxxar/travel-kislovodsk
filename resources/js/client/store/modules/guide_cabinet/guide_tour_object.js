import util from '../utilites';

const BASE_GUIDE_TOUR_OBJECTS_LINK = '/api/guide-cabinet/tour-objects'

let state = {
    guide_tour_objects: [],
    guide_tour_objects_paginate_object: [],
}

const getters = {
    getGuideTourObjects: state => state.guide_tour_objects || [],
    getGuideActiveTourObjects: (state) => {
        return state.guide_tour_objects.find(item => item.deleted_at == null)
    },
    getGuideRemovedTourObjects: (state) => {
        return state.guide_tour_objects.filter(item => item.deleted_at !== null)
    },
    getGuideTourObjectById: (state) => (id) => {
        return state.guide_tour_objects.find(item => item.id === id)
    },
    getGuideTourObjectsPaginateObject: state => state.guide_tour_objects_paginate_object || [],
}

const actions = {
    errorsGuideTourObjects({commit}) {
        commit('setGuideTourObjects',
            !localStorage.getItem('travel_store_guide_tour_objects') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_tour_objects')))

        commit('setGuideTourObjectsPaginateObject',
            !localStorage.getItem('travel_store_guide_tour_objects_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_tour_objects_paginate_object')))
    },
    async guideTourObjectsPage({commit}, link, method = 'GET', data = null) {
        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            commit('setGuideTourObjects', dataObject.data)
            delete dataObject.data
            commit('setGuideTourObjectsPaginateObject', dataObject)

        }).catch(err => {
            this.errorsGuideTourObjects(commit)
        })
    },

    async clearTourObjects({commit}) {
        return await this.guideTourObjectsPage(commit,
            `${BASE_GUIDE_TOUR_OBJECTS_LINK}/clear`)
    },
    async restoreRemovedTourObjectsById({commit}, tourObjectId) {
        return await this.guideTourObjectsPage(commit,
            `${BASE_GUIDE_TOUR_OBJECTS_LINK}/restore/${tourObjectId}`)
    },

    async loadTourObjectsFilteredByPage({commit}, filterObject, page = 0, size = 15) {
        return await this.guideTourObjectsPage(commit,
            `${BASE_GUIDE_TOUR_OBJECTS_LINK}/search?page=${page}&size=${size}`,
            'POST',
            filterObject)
    },
    async loadTourObjectsByPage({commit}, page = 0, size = 15) {
        return await this.guideTourObjectsPage(commit,
            `${BASE_GUIDE_TOUR_OBJECTS_LINK}?page=${page}&size=${size}`)
    },
}

const mutations = {
    setGuideTourObjects(state, payload) {
        state.guide_tour_objects = payload.data || [];
        localStorage.setItem('travel_store_guide_tour_objects', JSON.stringify(payload));
    },
    setGuideTourObjectsPaginateObject(state, payload) {
        state.guide_guide_tour_objects_paginate_object = payload.data || [];
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
