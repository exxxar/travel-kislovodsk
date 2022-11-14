import axios from 'axios';
import util from "./utilites";

const BASE_DICTIONARIES_LINK = '/api/dictionaries'

let state = {
    dictionaries: [],
    paginate_object: [],
}

const getters = {
    getDictionaries: state => state.dictionaries || [],
    getDictionaryById: (state) => (id) => {
        return state.dictionaries.find(item => item.id === id)
    },
    getDictionariesByType: (state) => (type) => {
        return state.dictionaries.filter(item => item.type === type)
    },
    getDictionariesPaginateObject: state => state.paginate_object || [],
}

const actions = {
    errorsDictionaries({commit}){
        commit('setDictionaries',
            !localStorage.getItem('travel_store_dictionaries') ?
                [] : JSON.parse(localStorage.getItem('travel_store_dictionaries')))

        commit('setDictionariesPaginateObject',
            !localStorage.getItem('travel_store_dictionaries_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_dictionaries_paginate_object')))
    },
    async dictionariesPage({commit}, link, method = 'GET', data = null) {
        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            commit('setDictionaries', dataObject.data)
            delete dataObject.data
            commit('setDictionariesPaginateObject', dataObject)

        }).catch(err => {
            this.errorsDictionaries(commit)
        })
    },
    async previousDictionariesPage({commit}) {
        return await this.dictionariesPage(commit, state.paginate_object.links.prev || BASE_DICTIONARIES_LINK)
    },
    async nextDictionariesPage({commit}) {
        return await this.dictionariesPage(commit, state.paginate_object.links.next || BASE_DICTIONARIES_LINK)
    },
    async loadDictionariesByPage({commit}, page = 0, size = 15) {
        return await this.dictionariesPage(commit, `${BASE_DICTIONARIES_LINK}?page=${page}&size=${size}`)
    },
    async loadAllDictionaries({commit}) {
        return await this.dictionariesPage(commit, `${BASE_DICTIONARIES_LINK}/all`)
    },
}

const mutations = {
    setDictionaries(state, payload) {
        state.dictionaries = payload.data || [];
        localStorage.setItem('travel_store_dictionaries', JSON.stringify(payload));
    },
    setDictionariesPaginateObject(state, payload) {
        state.paginate_object = payload.data || [];
        localStorage.setItem('travel_store_dictionaries_paginate_object', JSON.stringify(payload));
    }
}

const dictionariesModule = {
    state,
    mutations,
    actions,
    getters
}
export default dictionariesModule;
