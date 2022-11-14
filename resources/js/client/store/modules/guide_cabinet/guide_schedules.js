import axios from 'axios';
import util from "../utilites";

const BASE_GUIDE_SCHEDULE_LINK = '/api/guide-cabinet/schedule'

let state = {
    guide_schedules: [],
    guide_schedules_paginate_object: [],
}

c
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
    errorsGuideSchedules({commit}){
        commit('setGuideSchedules',
            !localStorage.getItem('travel_store_guide_schedules') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_schedules')))

        commit('setGuideSchedulesPaginateObject',
            !localStorage.getItem('travel_store_guide_schedules_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_schedules_object')))
    },
    async guideSchedulesPage({commit}, link, method = 'GET', data = null) {
        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            commit('setGuideSchedules', dataObject.data)
            delete dataObject.data
            commit('setGuideSchedulesPaginateObject', dataObject)

        }).catch(err => {
            this.errorsGuideSchedules(commit)
        })
    },
    async loadGuideSchedulesFilteredByPage({commit}, filterObject, page = 0, size = 15){
        return await this.guideSchedulesPage(commit,
            `${BASE_GUIDE_SCHEDULE_LINK}/search?page=${page}&size=${size}`,
            'POST',
            filterObject)
    },
    async loadGuideSchedulesByPage({commit}, page = 0, size = 15){
        return await this.guideSchedulesPage(commit,
            `${BASE_GUIDE_SCHEDULE_LINK}?page=${page}&size=${size}`)
    },
}

const mutations = {
    setGuideSchedules(state, payload) {
        state.guide_transactions = payload.data || [];
        localStorage.setItem('travel_store_guide_schedules', JSON.stringify(payload));
    },
    setGuideSchedulesPaginateObject(state, payload) {
        state.guide_transactions_paginate_object = payload.data || [];
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
