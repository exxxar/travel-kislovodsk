import util from "../../utilites";

const BASE_GUIDE_IN_DRAFT_TOURS_LINK = '/api/guide-cabinet/tours/in-draft'

let state = {
    guide_in_draft_tours:[],
    guide_in_draft_tours_paginate_object:[],
}

const getters = {
    getGuideInDraftTours:state => state.guide_in_draft_tours || [],
    getGuideInDraftToursById: (state) => (id) => {
        return state.guide_in_draft_tours.find(item => item.id === id)
    },
    getGuideInDraftToursPaginateObject: state => state.guide_in_draft_tours_paginate_object || [],
}


const actions = {
    errorsGuideInDraftTours({commit}) {
        commit('setGuideInDraftTours',
            !localStorage.getItem('travel_store_guide_in_draft_tours') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_in_draft_tours')))

        commit('setGuideInDraftToursPaginateObject',
            !localStorage.getItem('travel_store_guide_in_draft_tours_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_in_draft_tours_paginate_object')))
    },
    async guideInDraftToursPage({commit}, link, method = 'GET', data = null) {
        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            commit('setGuideInDraftTours', dataObject.data)
            delete dataObject.data
            commit('setGuideInDraftToursPaginateObject', dataObject)

        }).catch(err => {
            this.errorsGuideInDraftTours(commit)
        })
    },
    async loadInDraftToursFilteredByPage({commit}, filterObject, page = 0, size = 15) {
        return await this.guideInDraftToursPage(commit,
            `${BASE_GUIDE_IN_DRAFT_TOURS_LINK}/search?page=${page}&size=${size}`,
            'POST',
            filterObject)
    },
    async loadInDraftToursByPage({commit}, page = 0, size = 15) {
        return await this.guideInDraftToursPage(commit,
            `${BASE_GUIDE_IN_DRAFT_TOURS_LINK}?page=${page}&size=${size}`)
    },
}

const mutations = {
    setGuideInDraftTours(state, payload) {
        state.guide_in_draft_tours = payload.data || [];
        localStorage.setItem('travel_store_guide_in_draft_tours', JSON.stringify(payload));
    },
    setGuideInDraftToursPaginateObject(state, payload) {
        state.guide_in_draft_tours_paginate_object = payload.data || [];
        localStorage.setItem('travel_store_guide_in_draft_tours_paginate_object', JSON.stringify(payload));
    }
}

const guideInDraftToursModule = {
    state,
    mutations,
    actions,
    getters
}
export default guideInDraftToursModule;
