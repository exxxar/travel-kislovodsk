import axios from 'axios';
import util from "./utilites";

const BASE_TOUR_LINK = '/api/tours'

let state = {
    tours: [],
    paginate_object: [],

}

const getters = {
    getTours: state => state.tours || [],
    getTourById: (state) => (id) => {
        return state.tours.find(tourItem => tourItem.id === id)
    },
    getToursPaginateObject: state => state.paginate_object || [],
}

const actions = {
    errorsTours({commit}) {
        commit('setTours',
            !localStorage.getItem('travel_store_tours') ?
                [] : JSON.parse(localStorage.getItem('travel_store_tours')))

        commit('setToursPaginateObject',
            !localStorage.getItem('travel_store_tours_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_tours_paginate_object')))
    },
    async tourPage({commit}, link, method = 'GET', data = null) {
        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            commit('setTours', dataObject.data)
            delete dataObject.data
            commit('setToursPaginateObject', dataObject)

        }).catch(err => {
            this.errorsTours(commit)
        })
    },
    async previousToursPage({commit}) {
        return await this.tourPage(commit, state
            .paginate_object
            .links
            .prev || BASE_TOUR_LINK)
    },
    async nextToursPage({commit}) {
        return await this.tourPage(commit, state
            .paginate_object
            .links
            .next || BASE_TOUR_LINK)
    },
    async loadToursByPage({commit}, page = 0, size = 15) {
        return await this.tourPage(commit, `${BASE_TOUR_LINK}?page=${page}&size=${size}`)
    },
    async loadToursFilteredByPage({commit}, filterObject, page = 0, size = 15) {
        return await this.tourPage(commit, `${BASE_TOUR_LINK}/search?page=${page}&size=${size}`, 'POST', filterObject)
    },
    async loadToursByTourCategoryByPage({commit}, category, page = 0, size = 15, link = '/api/tours') {
        return await this.tourPage(commit, `${BASE_TOUR_LINK}?category=${category}&page=${page}&size=${size}`)
    },
    async loadAllTours({commit}) {
        return await this.tourPage(commit, `${BASE_TOUR_LINK}/all`)
    },
    async loadAllHotTours({commit}) {
        return await this.tourPage(commit, `${BASE_TOUR_LINK}/hot`)
    }
}

const mutations = {
    setTours(state, payload) {
        state.tours = payload.data || [];
        localStorage.setItem('travel_store_tours', JSON.stringify(payload));
    },
    setToursPaginateObject(state, payload) {
        state.paginate_object = payload.data || [];
        localStorage.setItem('travel_store_tours_paginate_object', JSON.stringify(payload));
    }
}

const toursModule = {
    state,
    mutations,
    actions,
    getters
}
export default toursModule;
