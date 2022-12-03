import axios from 'axios';
import util from "../utilites";

const BASE_GUIDE_SCHEDULE_LINK = '/api/guide-cabinet/schedules'

let state = {
    guide_schedules: [],
    guide_schedules_paginate_object: [],
}


const getters = {
    //todo: need add filter by date (day)
    getGuideSchedules: state => state.guide_schedules || [],
    getGuideScheduleById: (state) => (id) => {
        return state.guide_schedules.find(item => item.id === id)
    },
    getGuideSchedulesPaginateObject: state => state.guide_schedules_paginate_object || [],
}

const actions = {
    //todo: add to schedule, remove from schedule, update schedule
    errorsGuideSchedules(context) {
        context.commit('setGuideSchedules',
            !localStorage.getItem('travel_store_guide_schedules') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_schedules')))

        context.commit('setGuideSchedulesPaginateObject',
            !localStorage.getItem('travel_store_guide_schedules_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_schedules_object')))
    },
    async guideSchedulesPage(context, payload) {

        let link = payload.url || BASE_GUIDE_SCHEDULE_LINK,
            method = payload.method || 'GET',
            data = payload.data || null

        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            context.commit('setGuideSchedules', dataObject.data)
            delete dataObject.data
            context.commit('setGuideSchedulesPaginateObject', dataObject)

        }).catch(err => {
            context.dispatch("errorsGuideSchedules")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async loadGuideSchedulesFilteredByPage(context, payload = {filterObject: null, page: 0, size: 15}) {

        let filterObject = payload.filterObject || null,
            page = payload.page || 0,
            size = payload.size || 15

        return await context.dispatch("guideSchedulesPage", {
            url: `${BASE_GUIDE_SCHEDULE_LINK}/search?page=${page}&size=${size}`,
            method: 'POST',
            data: filterObject
        })
    },
    async loadGuideSchedulesByPage(context, payload = {page: 0, size: 15}) {
        let page = payload.page || 0,
            size = payload.size || 15

        return await context.dispatch("guideSchedulesPage", {
            url: `${BASE_GUIDE_SCHEDULE_LINK}?page=${page}&size=${size}`

        })

    },
}

const mutations = {
    setGuideSchedules(state, payload) {
        state.guide_transactions = payload || [];
        localStorage.setItem('travel_store_guide_schedules', JSON.stringify(payload));
    },
    setGuideSchedulesPaginateObject(state, payload) {
        state.guide_transactions_paginate_object = payload || [];
        localStorage.setItem('travel_store_guide_schedules_paginate_object', JSON.stringify(payload));
    }
}

const guideSchedulesModule = {
    state,
    mutations,
    actions,
    getters
}
export default guideSchedulesModule;
