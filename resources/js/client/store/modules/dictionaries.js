import axios from 'axios';
import util from "./utilites";

const BASE_DICTIONARIES_LINK = '/api/dictionaries'

let state = {
    types:[],
    dictionaries: [],
    locations:[],
    tour_dates:[],
}

const getters = {
    getDictionaries: state => state.dictionaries || [],
    getLocations: state => state.locations || [],
    getTourDates: state => state.tour_dates || [],
    getDictionaryTypes: state => state.types || [],
    getDictionaryById: (state) => (id) => {
        return state.dictionaries.find(item => item.id === id)
    },

    getDictionariesByTypeSlug: (state) => (slug) => {
        let tmp =  state.types.find(item => item.slug === slug)
        if (tmp)
            return tmp.dictionaries
        return  []
    },

}

const actions = {
    errorsDictionaries({commit}){
        commit('setDictionaries',
            !localStorage.getItem('travel_store_dictionaries') ?
                [] : JSON.parse(localStorage.getItem('travel_store_dictionaries')))

        commit('setDictionaryTypes',
            !localStorage.getItem('travel_store_dictionary_types') ?
                [] : JSON.parse(localStorage.getItem('travel_store_dictionary_types')))

        commit('setLocations',
            !localStorage.getItem('travel_store_locations') ?
                [] : JSON.parse(localStorage.getItem('travel_store_locations')))

        commit('setTourDates',
            !localStorage.getItem('travel_store_tour_dates') ?
                [] : JSON.parse(localStorage.getItem('travel_store_tour_dates')))
 },
    async dictionariesPage(context, link, method = 'GET', data = null) {
        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            context.commit('setDictionaries', dataObject.data)


        }).catch(err => {
            context.dispatch("errorsDictionaries")
        })
    },

    async dictionaryTypesPage(context, payload) {
        let link = payload.url
        let method = payload.method || 'GET'
        let data = payload.data || null

        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            context.commit('setDictionaryTypes', dataObject.data)


        }).catch(err => {
            context.dispatch("errorsDictionaries")
        })
    },

    async loadLocations(context){
        let _axios = util.makeAxiosFactory(`${BASE_DICTIONARIES_LINK}/locations`, 'GET', null)

        return _axios.then((response) => {
            let dataObject = response.data
            context.commit('setLocations', dataObject)
        }).catch(err => {
            context.dispatch("errorsDictionaries")
        })
    },

    async loadTourDates(context){
        let _axios = util.makeAxiosFactory(`${BASE_DICTIONARIES_LINK}/tour-dates`, 'GET', null)

        return _axios.then((response) => {
            let dataObject = response.data
            context.commit('setTourDates', dataObject)
        }).catch(err => {
            context.dispatch("errorsDictionaries")
        })
    },
    async loadAllDictionaryTypes(context) {
        return await  context.dispatch("dictionaryTypesPage", `${BASE_DICTIONARIES_LINK}/types`)
    },
    async loadAllDictionaries(context) {
        return await  context.dispatch("dictionariesPage", `${BASE_DICTIONARIES_LINK}`)
    },
}

const mutations = {
    setDictionaries(state, payload) {
        state.dictionaries = payload || [];
        localStorage.setItem('travel_store_dictionaries', JSON.stringify(payload));
    },
    setLocations(state, payload) {
        state.locations = payload || [];
        localStorage.setItem('travel_store_locations', JSON.stringify(payload));
    },
    setTourDates(state, payload) {
        state.tour_dates = payload || [];
        localStorage.setItem('travel_store_tour_dates', JSON.stringify(payload));
    },
    setDictionaryTypes(state, payload) {
        state.types = payload || [];
        localStorage.setItem('travel_store_dictionary_types', JSON.stringify(payload));
    },

}

const dictionariesModule = {
    state,
    mutations,
    actions,
    getters
}
export default dictionariesModule;
