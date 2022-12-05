import util from '../utilites';

const BASE_GUIDE_TOURS_LINK = '/api/guide-cabinet/tours'

let state = {
    guide_tours: [],
    guide_tours_paginate_object: [],
}

const getters = {
    getGuideTours: state => {
        return state.guide_tours.filter(item =>
            item.is_active === true &&
            item.deleted_at == null &&
            item.is_draft === false)
    },
    getGuideTourById: (state) => (id) => {
        return state.guide_tours.find(item => item.id === id)
    },
    getGuideArchiveTours: (state) => {
        return state.guide_tours.filter(item => item.is_active === false && item.archived_at !== null)
    },
    getGuideIsDraftTours: (state) => {
        return state.guide_tours.filter(item => item.is_draft === true)
    },
    getGuideIsModerateTours: (state) => {
        return state.guide_tours.filter(item => item.verified_at === null)
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
    async loadGuideToursByPage(context, page = 0, size = 15) {
        return await context.dispatch("guideToursPage", {
                url: `${BASE_GUIDE_TOURS_LINK}?page=${page}&size=${size}`
            }
        )
    },
}

const mutations = {
    setGuideTours(state, payload) {
        state.guide_tours = payload || [];
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
