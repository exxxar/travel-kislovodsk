import util from '../utilites';

const BASE_GUIDE_TOURS_LINK = '/api/guide-cabinet/tours'

let state = {
    guide_tours:[],
    guide_tours_paginate_object:[],
}

const getters = {
    getGuideTours:state => state.guide_tours || [],
    getGuideTourById: (state) => (id) => {
        return state.guide_tours.find(item => item.id === id)
    },
    getGuideArchiveTours: (state)  => {
        return state.guide_tours.filter(item => item.is_active  === false && item.archived_at  !== null)
    },
    getGuideInDraftTours: (state)  => {
        return state.guide_tours.filter(item => item.in_draft  === true)
    },
    getGuideInModerateTours: (state)  => {
        return state.guide_tours.filter(item => item.verified_at   === null)
    },
    getGuideToursPaginateObject: state => state.guide_tours_paginate_object || [],
}

const actions = {
    errorsGuideTours({commit}){
        commit('setGuideTours',
            !localStorage.getItem('travel_store_guide_tours') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_tours')))

        commit('setGuideToursPaginateObject',
            !localStorage.getItem('travel_store_guide_tours_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_tours_paginate_object')))
    },
    async guideToursPage({commit}, link, method = 'GET', data = null) {
        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            commit('setGuideTours', dataObject.data)
            delete dataObject.data
            commit('setGuideToursPaginateObject', dataObject)

        }).catch(err => {
            this.errorsGuideTransactions(commit)
        })
    },
    async addTourToArchive({commit}, tourId) {
        return await this.guideToursPage(commit,
            `${BASE_GUIDE_TOURS_LINK}/archive-add/${tourId}`)
    },
    async clearArchiveTours({commit}) {
        return await this.guideToursPage(commit,
            `${BASE_GUIDE_TOURS_LINK}/archive-clear`)
    },
    async loadGuideToursFilteredByPage({commit}, filterObject, page = 0, size = 15){
        return await this.guideToursPage(commit,
            `${BASE_GUIDE_TOURS_LINK}/search?page=${page}&size=${size}`,
            'POST',
            filterObject)
    },
    async loadGuideToursByPage({commit}, page = 0, size = 15){
        return await this.guideToursPage(commit,
            `${BASE_GUIDE_TOURS_LINK}?page=${page}&size=${size}`)
    },
}

const mutations = {
    setGuideTours(state, payload) {
        state.guide_tours = payload.data || [];
        localStorage.setItem('travel_store_guide_tours', JSON.stringify(payload));
    },
    setGuideToursPaginateObject(state, payload) {
        state.guide_tours_paginate_object = payload.data || [];
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
