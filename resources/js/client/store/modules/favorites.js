import axios from 'axios';
import util from "./utilites";

const BASE_FAVORITES_LINK = '/api/favorites'

let state = {
    favorites: [],
    paginate_object: [],

}

const getters = {
    getFavorites: state => state.favorites || [],
    getFavoritesByCategoryId: (state) => (id) => {
        return state.favorites.filter(favItem => {
            return favItem.tour.tour_categories.filter(categoryItem => categoryItem.id === id).length > 0
        })

    },
    getFavoriteById: (state) => (id) => {
        return state.favorites.find(item => item.id === id)
    },
    getFavoritesPaginateObject: state => state.paginate_object || [],
}

const actions = {
    errorsFavorites(context) {
        context.commit('setFavorites',
            !localStorage.getItem('travel_store_favorites') ?
                [] : JSON.parse(localStorage.getItem('travel_store_favorites')))

        context.commit('setFavoritesPaginateObject',
            !localStorage.getItem('travel_store_favorites_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_favorites_paginate_object')))
    },
    async removeFavorite(context, id) {

        let link = `${BASE_FAVORITES_LINK}/remove/${id}`
        let method = 'DELETE'
        let data = null
        let _axios = util.makeAxiosFactory(link, method, data)

        return await _axios.then((response) => {
            let dataObject = response.data
            context.commit('setFavorites', dataObject.data)
            delete dataObject.data
            context.commit('setFavoritesPaginateObject', dataObject)

        }).catch(err => {
            context.dispatch("errorsFavorites")
        })
    },
    async clearFavorites(context) {
        let _axios = util.makeAxiosFactory(`${BASE_FAVORITES_LINK}/clear`, 'DELETE')

        return await _axios.then((response) => {
            context.commit('setFavorites', [])
            context.commit('setFavoritesPaginateObject', [])

        }).catch(err => {
            context.dispatch("errorsFavorites")
        })
    },
    async favoritesPage(context, obj) {

        let link = obj.url
        let method = obj.method || 'GET'
        let data = obj.data || null
        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            context.commit('setFavorites', dataObject.data)
            delete dataObject.data
            context.commit('setFavoritesPaginateObject', dataObject)

        }).catch(err => {
            context.dispatch("errorsFavorites")
        })
    },
    async previousFavoritesPage(context) {
        return await context.dispatch("favoritesPage", {
            url: state
                .paginate_object
                .links
                .prev || BASE_FAVORITES_LINK,
            method:'GET'
        })
    },
    async addToFavorites(context, id) {
        return await context.dispatch("favoritesPage", {
            url: `${BASE_FAVORITES_LINK}`,
            method: 'POST',
            data: {
                tour_id: id
            }
        })
    },
    async nextFavoritesPage({commit}) {
        return await context.dispatch("favoritesPage", {
            url: state
                .paginate_object
                .links
                .next || BASE_FAVORITES_LINK,
            method:'GET'
        })
    },
    async loadFavoritesByPage(context, payload) {
        let size = payload.size || 15
        let page = payload.page || 0
        return await context.dispatch("favoritesPage", {
            url: `${BASE_FAVORITES_LINK}?page=${page}&size=${size}`
        })
    },
    async loadFavoritesByTourCategoryByPage(context, payload) {

        let size = payload.size || 15
        let page = payload.page || 0
        let category = payload.category

        return await context.dispatch("favoritesPage", {
            url: `${BASE_FAVORITES_LINK}?category=${category}&page=${page}&size=${size}`
        })

    },
    async loadAllFavorites(context) {
        return await context.dispatch("favoritesPage", {
            url: `${BASE_FAVORITES_LINK}`
        })
    },
    async loadFavoritesFiltered({commit}, filter) {
        return await context.dispatch("favoritesPage", {
            url: `${BASE_FAVORITES_LINK}/filtered`,
            method:'POST',
            data: filter
        })
    }
}

const mutations = {
    setFavorites(state, payload) {
        state.favorites = payload || [];
        localStorage.setItem('travel_store_favorites', JSON.stringify(payload));
    },
    setFavoritesPaginateObject(state, payload) {
        state.paginate_object = payload || [];
        localStorage.setItem('travel_store_favorites_paginate_object', JSON.stringify(payload));
    }
}

const favoritesModule = {
    state,
    mutations,
    actions,
    getters
}
export default favoritesModule;
