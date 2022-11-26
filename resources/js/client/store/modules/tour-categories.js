import axios from 'axios';
import util from "./utilites";

const BASE_TOUR_CATEGORIES_LINK = '/api/tour-categories'

let state = {
    categories: [],
}

const getters = {
    getCategories: state => state.categories || [],
    getCategoryById: (state) => (id) => {
        return state.categories.find(item => item.id === id)
    },

}

const actions = {
    errorsTourCategories({commit}) {
        commit('setTourCategories',
            !localStorage.getItem('travel_store_tour_categories') ?
                [] : JSON.parse(localStorage.getItem('travel_store_tour_categories')))

    },
    async tourCategoriesPage(context, link) {
        let _axios = util.makeAxiosFactory(link)

        return await _axios.then((response) => {
            let dataObject = response.data

            context.commit('setTourCategories', dataObject.data)

        }).catch(err => {
            context.dispatch("errorsTourCategories")
        })
    },

    async loadAllCategories(context) {
        return await context.dispatch("tourCategoriesPage", `${BASE_TOUR_CATEGORIES_LINK}`)
    },

}

const mutations = {
    setTourCategories(state, payload) {
        state.categories = payload || [];
        localStorage.setItem('travel_store_tour_categories', JSON.stringify(payload));
    },

}

const tourCategoriesModule = {
    state,
    mutations,
    actions,
    getters
}
export default tourCategoriesModule;
