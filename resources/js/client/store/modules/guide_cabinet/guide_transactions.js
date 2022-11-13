import util from "../utilites";

const BASE_GUIDE_TRANSACTIONS_LINK = '/api/guide-cabinet/transactions'

let state = {
    guide_transactions:[],
    guide_transactions_paginate_object:[]
}

const getters = {
    getGuideTransactions: state => state.guide_transactions || [],
    getGuideTransactionsById: (state) => (id) => {
        return state.guide_transactions.find(item => item.id === id)
    },
    getGuideTransactionsPaginateObject: state => state.guide_transactions_paginate_object || [],
}

const actions = {
    errorsGuideTransactions({commit}){
        commit('setGuideTransactions',
            !localStorage.getItem('travel_store_guide_transactions') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_transactions')))

        commit('setGuideTransactionsPaginateObject',
            !localStorage.getItem('travel_store_guide_transactions_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_transactions_object')))
    },
    async guideTransactionsPage({commit}, link, method = 'GET', data = null) {
        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            commit('setGuideTransactions', dataObject.data)
            delete dataObject.data
            commit('setGuideTransactionsPaginateObject', dataObject)

        }).catch(err => {
            this.errorsGuideTransactions(commit)
        })
    },
    async loadGuideTransactionsFilteredByPage({commit}, filterObject, page = 0, size = 15){
        return await this.guideTransactionsPage(commit,
            `${BASE_GUIDE_TRANSACTIONS_LINK}/search?page=${page}&size=${size}`,
            'POST',
            filterObject)
    },
    async loadGuideTransactionsByPage({commit}, page = 0, size = 15){
        return await this.guideTransactionsPage(commit,
            `${BASE_GUIDE_TRANSACTIONS_LINK}?page=${page}&size=${size}`)
    },
}

const mutations = {
    setGuideTransactions(state, payload) {
        state.guide_transactions = payload.data || [];
        localStorage.setItem('travel_store_guide_transactions', JSON.stringify(payload));
    },
    setGuideTransactionsPaginateObject(state, payload) {
        state.guide_transactions_paginate_object = payload.data || [];
        localStorage.setItem('travel_store_guide_transactions_paginate_object', JSON.stringify(payload));
    }
}
const guideTransactionsModule = {
    state,
    mutations,
    actions,
    getters
}
export default guideTransactionsModule;
