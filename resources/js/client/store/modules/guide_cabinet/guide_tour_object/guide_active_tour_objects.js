import util from '../../utilites';

const BASE_GUIDE_ACTIVE_TOUR_OBJECTS_LINK = '/api/guide-cabinet/tour-objects/active'

let state = {
    guide_active_tour_objects: [],
    guide_active_tour_objects_paginate_object: [],
}

const getters = {
    getGuideActiveTourObjects: state => state.guide_active_tour_objects || [],
    getGuideActiveTourObjectById: (state) => (id) => {
        return state.guide_active_tour_objects.find(item => item.id === id)
    },
    getGuideActiveTourObjectsPaginateObject: state => state.guide_active_tour_objects_paginate_object || [],
}

const actions = {
    errorsGuideActiveTourObjects({commit}) {
        commit('setGuideActiveTourObjects',
            !localStorage.getItem('travel_store_guide_active_tour_objects') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_active_tour_objects')))

        commit('setGuideActiveTourObjectsPaginateObject',
            !localStorage.getItem('travel_store_guide_active_tour_objects_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_active_tour_objects_paginate_object')))
    },
    async guideActiveTourObjectsPage({commit}, link, method = 'GET', data = null) {
        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            commit('setGuideActiveTourObjects', dataObject.data)
            delete dataObject.data
            commit('setGuideActiveTourObjectsPaginateObject', dataObject)

        }).catch(err => {
            this.errorsGuideActiveTourObjects(commit)
        })
    },

    async clearActiveTourObjects({commit}) {
        return await this.guideActiveTourObjectsPage(commit,
            `${BASE_GUIDE_ACTIVE_TOUR_OBJECTS_LINK}/clear`)
    },

    async loadActiveTourObjectsFilteredByPage({commit}, filterObject, page = 0, size = 15) {
        return await this.guideActiveTourObjectsPage(commit,
            `${BASE_GUIDE_ACTIVE_TOUR_OBJECTS_LINK}/search?page=${page}&size=${size}`,
            'POST',
            filterObject)
    },
    async loadActiveTourObjectsByPage({commit}, page = 0, size = 15) {
        return await this.guideActiveTourObjectsPage(commit,
            `${BASE_GUIDE_ACTIVE_TOUR_OBJECTS_LINK}?page=${page}&size=${size}`)
    },
}

const mutations = {
    setGuideActiveTourObjects(state, payload) {
        state.guide_active_tour_objects = payload.data || [];
        localStorage.setItem('travel_store_guide_active_tour_objects', JSON.stringify(payload));
    },
    setGuideActiveTourObjectsPaginateObject(state, payload) {
        state.guide_guide_active_tour_objects_paginate_object = payload.data || [];
        localStorage.setItem('travel_store_guide_active_tour_objects_paginate_object', JSON.stringify(payload));
    }
}

const guideActiveTourObjectsModule = {
    state,
    mutations,
    actions,
    getters
}
export default guideActiveTourObjectsModule;
