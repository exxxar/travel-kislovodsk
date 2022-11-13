import util from '../../utilites';

const BASE_GUIDE_CURRENT_TOURS_LINK = '/api/guide-cabinet/tours/current'

let state = {
    guide_current_tours:[],
    guide_current_tours_paginate_object:[],
}

const getters = {
    getGuideCurrentTours:state => state.guide_current_tours || [],
    getGuideCurrentToursById: (state) => (id) => {
        return state.guide_current_tours.find(item => item.id === id)
    },
    getGuideCurrentToursPaginateObject: state => state.guide_current_tours_paginate_object || [],
}

const actions = {
    errorsGuideCurrentTours({commit}){
        commit('setGuideCurrentTours',
            !localStorage.getItem('travel_store_guide_current_tours') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_current_tours')))

        commit('setGuideCurrentToursPaginateObject',
            !localStorage.getItem('travel_store_guide_current_tours_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_current_tours_paginate_object')))
    },
    async guideCurrentToursPage({commit}, link, method = 'GET', data = null) {
        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            commit('setGuideCurrentTours', dataObject.data)
            delete dataObject.data
            commit('setGuideCurrentToursPaginateObject', dataObject)

        }).catch(err => {
            this.errorsGuideTransactions(commit)
        })
    },
    async loadGuideCurrentToursFilteredByPage({commit}, filterObject, page = 0, size = 15){
        return await this.guideCurrentToursPage(commit,
            `${BASE_GUIDE_CURRENT_TOURS_LINK}/search?page=${page}&size=${size}`,
            'POST',
            filterObject)
    },
    async loadGuideCurrentToursByPage({commit}, page = 0, size = 15){
        return await this.guideCurrentToursPage(commit,
            `${BASE_GUIDE_CURRENT_TOURS_LINK}?page=${page}&size=${size}`)
    },
}

const mutations = {
    setGuideCurrentTours(state, payload) {
        state.guide_current_tours = payload.data || [];
        localStorage.setItem('travel_store_guide_current_tours', JSON.stringify(payload));
    },
    setGuideCurrentToursPaginateObject(state, payload) {
        state.guide_current_tours_paginate_object = payload.data || [];
        localStorage.setItem('travel_store_guide_current_tours_paginate_object', JSON.stringify(payload));
    }
}

const guideCurrentToursModule = {
    state,
    mutations,
    actions,
    getters
}
export default guideCurrentToursModule;
