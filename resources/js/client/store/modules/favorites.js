import axios from 'axios';
import util from "./utilites";

const BASE_FAVORITES_LINK = '/api/favorites'

let state = {
    favorites: [],
    paginate_object: [],

}

const getters = {
    getFavorites: state => state.favorites || [],
    getFavoriteById: (state) => (id) => {
        return state.favorites.find(item => item.id === id)
    },
    getFavoritesPaginateObject: state => state.paginate_object || [],
}

const actions = {
    errorsFavorites({commit}){
        commit('setFavorites',
            !localStorage.getItem('travel_store_favorites') ?
                [] : JSON.parse(localStorage.getItem('travel_store_favorites')))

        commit('setFavoritesPaginateObject',
            !localStorage.getItem('travel_store_favorites_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_favorites_paginate_object')))
    },
    async removeFavorite({commit}, id){
        let _axios = util.makeAxiosFactory(link, method, data)

        return await axios.get( `${BASE_FAVORITES_LINK}/remove/${id}`).then((response) => {
            let dataObject = response.data
            commit('setFavorites', dataObject.data)
            delete dataObject.data
            commit('setFavoritesPaginateObject', dataObject)

        }).catch(err => {
            this.errorsFavorites(commit)
        })
    },
    async clearFavorites({commit}) {
        let _axios = util.makeAxiosFactory(`${BASE_FAVORITES_LINK}/clear`, 'DELETE')

        return await _axios.then((response) => {
            commit('setFavorites', [])
            commit('setFavoritesPaginateObject', [])

        }).catch(err => {
            this.errorsFavorites(commit)
        })
    },
    async favoritesPage({commit}, link, method = 'GET', data = null) {
        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            commit('setTours', dataObject.data)
            delete dataObject.data
            commit('setToursPaginateObject', dataObject)

        }).catch(err => {
            this.errorsFavorites(commit)
        })
    },
    async previousFavoritesPage({commit}) {
        return await this.favoritesPage(commit, state
            .paginate_object
            .links
            .prev || BASE_FAVORITES_LINK)
    },
    async addToFavorites({commit}, tour) {
        return await this.favoritesPage(commit, `${BASE_FAVORITES_LINK}/add`,'POST', tour )
    },
    async nextFavoritesPage({commit}) {
        return await this.favoritesPage(commit, state
            .paginate_object
            .links
            .next || BASE_FAVORITES_LINK)
    },
    async loadFavoritesByPage({commit}, page = 0, size = 15) {
        return await this.favoritesPage(commit, `${BASE_FAVORITES_LINK}?page=${page}&size=${size}`)
    },
    async loadFavoritesByTourCategoryByPage({commit}, category, page = 0, size = 15) {
        return await this.favoritesPage(commit, `${BASE_FAVORITES_LINK}?category=${category}&page=${page}&size=${size}`)
    },
    async loadAllFavorites({commit}) {
        return await this.favoritesPage(commit, `${BASE_FAVORITES_LINK}/all`)
    },
    async loadFavoritesFiltered({commit}, filter) {
        return await this.favoritesPage(commit, `${BASE_FAVORITES_LINK}/filtered`, 'POST', filter)
    }
}

const mutations = {
    setFavorites(state, payload) {
        state.favorites = payload.data || [];
        localStorage.setItem('travel_store_favorites', JSON.stringify(payload));
    },
    setFavoritesPaginateObject(state, payload) {
        state.paginate_object = payload.data || [];
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
