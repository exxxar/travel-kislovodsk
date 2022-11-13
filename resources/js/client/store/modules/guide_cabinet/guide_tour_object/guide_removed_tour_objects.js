import util from '../../utilites';

const BASE_GUIDE_REMOVED_TOUR_OBJECTS_LINK = '/api/guide-cabinet/tour-objects/removed'

let state = {
    guide_removed_tour_objects: [],
    guide_removed_tour_objects_paginate_object: [],
}

const getters = {
    getGuideRemovedTourObjects: state => state.guide_removed_tour_objects || [],
    getGuideRemovedTourObjectById: (state) => (id) => {
        return state.guide_removed_tour_objects.find(item => item.id === id)
    },
    getGuideRemovedTourObjectsPaginateObject: state => state.guide_removed_tour_objects_paginate_object || [],
}

const actions = {
    errorsGuideRemovedTourObjects({commit}) {
        commit('setGuideRemovedTourObjects',
            !localStorage.getItem('travel_store_guide_removed_tour_objects') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_removed_tour_objects')))

        commit('setGuideRemovedTourObjectsPaginateObject',
            !localStorage.getItem('travel_store_guide_removed_tour_objects_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_removed_tour_objects_paginate_object')))
    },
    async guideRemovedTourObjectsPage({commit}, link, method = 'GET', data = null) {
        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            commit('setGuideRemovedTourObjects', dataObject.data)
            delete dataObject.data
            commit('setGuideRemovedTourObjectsPaginateObject', dataObject)

        }).catch(err => {
            this.errorsGuideRemovedTourObjects(commit)
        })
    },

    async restoreRemovedTourObjectsById({commit}, tourObjectId) {
        return await this.guideRemovedTourObjectsPage(commit,
            `${BASE_GUIDE_REMOVED_TOUR_OBJECTS_LINK}/restore/${tourObjectId}`)
    },

    async loadRemovedTourObjectsFilteredByPage({commit}, filterObject, page = 0, size = 15) {
        return await this.guideRemovedTourObjectsPage(commit,
            `${BASE_GUIDE_REMOVED_TOUR_OBJECTS_LINK}/search?page=${page}&size=${size}`,
            'POST',
            filterObject)
    },
    async loadRemovedTourObjectsByPage({commit}, page = 0, size = 15) {
        return await this.guideRemovedTourObjectsPage(commit,
            `${BASE_GUIDE_REMOVED_TOUR_OBJECTS_LINK}?page=${page}&size=${size}`)
    },
}

const mutations = {
    setGuideRemovedTourObjects(state, payload) {
        state.guide_removed_tour_objects = payload.data || [];
        localStorage.setItem('travel_store_guide_removed_tour_objects', JSON.stringify(payload));
    },
    setGuideRemovedTourObjectsPaginateObject(state, payload) {
        state.guide_guide_removed_tour_objects_paginate_object = payload.data || [];
        localStorage.setItem('travel_store_guide_removed_tour_objects_paginate_object', JSON.stringify(payload));
    }
}

const guideRemovedTourObjectsModule = {
    state,
    mutations,
    actions,
    getters
}
export default guideRemovedTourObjectsModule;
