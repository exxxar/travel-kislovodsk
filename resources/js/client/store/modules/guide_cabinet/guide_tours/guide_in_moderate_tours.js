import util from "../../utilites";

const BASE_GUIDE_IN_MODERATE_TOURS_LINK = '/api/guide-cabinet/tours/in-moderate'

let state = {
    guide_in_moderate_tours: [],
    guide_in_moderate_tours_paginate_object: [],
}

const getters = {
    getGuideInModerateTours: state => state.guide_in_moderate_tours || [],
    getGuideInModerateToursById: (state) => (id) => {
        return state.guide_in_moderate_tours.find(item => item.id === id)
    },
    getGuideInModerateToursPaginateObject: state => state.guide_in_moderate_tours_paginate_object || [],
}

const actions = {
    errorsGuideInModerateTours({commit}) {
        commit('setGuideInModerateTours',
            !localStorage.getItem('travel_store_guide_in_moderate_tours') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_in_moderate_tours')))

        commit('setGuideInModerateToursPaginateObject',
            !localStorage.getItem('travel_store_guide_in_moderate_tours_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_in_moderate_tours_paginate_object')))
    },
    async guideInModerateToursPage({commit}, link, method = 'GET', data = null) {
        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            commit('setGuideInModerateTours', dataObject.data)
            delete dataObject.data
            commit('setGuideInModerateToursPaginateObject', dataObject)

        }).catch(err => {
            this.errorsGuideInModerateTours(commit)
        })
    },
    async loadInModerateToursFilteredByPage({commit}, filterObject, page = 0, size = 15) {
        return await this.guideInModerateToursPage(commit,
            `${BASE_GUIDE_IN_MODERATE_TOURS_LINK}/search?page=${page}&size=${size}`,
            'POST',
            filterObject)
    },
    async loadInModerateToursByPage({commit}, page = 0, size = 15) {
        return await this.guideInModerateToursPage(commit,
            `${BASE_GUIDE_IN_MODERATE_TOURS_LINK}?page=${page}&size=${size}`)
    },
}

const mutations = {
    setGuideInModerateTours(state, payload) {
        state.guide_in_moderate_tours = payload.data || [];
        localStorage.setItem('travel_store_guide_in_moderate_tours', JSON.stringify(payload));
    },
    setGuideInModerateToursPaginateObject(state, payload) {
        state.guide_in_moderate_tours_paginate_object = payload.data || [];
        localStorage.setItem('travel_store_guide_in_moderate_tours_paginate_object', JSON.stringify(payload));
    }
}
const guideInModerateToursModule = {
    state,
    mutations,
    actions,
    getters
}
export default guideInModerateToursModule;
