import axios from 'axios';
import util from "./utilites";

const BASE_TOUR_CATEGORIES_LINK = '/api/tour-categories'

let state = {
    categories: [],
    paginate_object: [],

}

const getters = {
    getCategories: state => state.categories || [],
    getCategoryById: (state) => (id) => {
        return state.categories.find(item => item.id === id)
    },
    getCategoriesPaginateObject: state => state.paginate_object || [],
}

const actions = {
    errorsTourCategories({commit}){
        commit('setTourCategories',
            !localStorage.getItem('travel_store_tour_categories') ?
                [] : JSON.parse(localStorage.getItem('travel_store_tour_categories')))

        commit('setTourCategoriesPaginateObject',
            !localStorage.getItem('travel_store_tour_categories_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_tour_categories_paginate_object')))
    },
    async tourCategoriesPage({commit}, link) {
        let _axios = util.makeAxiosFactory(link)

        return await _axios.then((response) => {
            let dataObject = response.data
            commit('setTourCategories', dataObject.data)
            delete dataObject.data
            commit('setTourCategoriesPaginateObject', dataObject)

        }).catch(err => {
               this.errorsTourCategories(commit)
        })
    },
    async previousTourCategoriesPage({commit}) {
        return await this.tourCategoriesPage(commit, state
            .paginate_object
            .links
            .prev || BASE_TOUR_CATEGORIES_LINK)
    },
    async nextTourCategoriesPage({commit}) {
        return await this.tourCategoriesPage(commit, state
            .paginate_object
            .links
            .next || BASE_TOUR_CATEGORIES_LINK)
    },
    async loadCategoriesByPage({commit}, page = 0, size = 15,) {
        return await this.tourCategoriesPage(commit, `${BASE_TOUR_CATEGORIES_LINK}?page=${page}&size=${size}`)
    },
    async loadAllCategories({commit}) {
        return await this.tourCategoriesPage(commit, `${BASE_TOUR_CATEGORIES_LINK}/all`)
    },
    async loadTopCategories({commit}) {
        return await this.tourCategoriesPage(commit, `${BASE_TOUR_CATEGORIES_LINK}/top`)
    }
}

const mutations = {
    setTourCategories(state, payload) {
        state.categories = payload.data || [];
        localStorage.setItem('travel_store_tour_categories', JSON.stringify(payload));
    },
    setTourCategoriesPaginateObject(state, payload) {
        state.paginate_object = payload.data || [];
        localStorage.setItem('travel_store_tour_categories_paginate_object', JSON.stringify(payload));
    }
}

const tourCategoriesModule = {
    state,
    mutations,
    actions,
    getters
}
export default tourCategoriesModule;
