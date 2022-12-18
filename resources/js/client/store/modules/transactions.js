import util from "./utilites";

const BASE_TRANSACTIONS_LINK = '/api/transactions'

let state = {
    transactions: [],
    transactions_paginate_object: []
}

const getters = {
    getTransactions: state => state.transactions || [],
    getTransactionById: (state) => (id) => {
        return state.transactions.find(item => item.id === id)
    },
    getTransactionsByTransactionType: (state) => (typeId) => {

        return state.transactions.filter(item => item.status_type_id === typeId)
    },
    getTransactionsPaginateObject: state => state.transactions_paginate_object || [],
}

const actions = {
    errorsTransactions(context) {
        context.commit('setTransactions',
            !localStorage.getItem('travel_store_transactions') ?
                [] : JSON.parse(localStorage.getItem('travel_store_transactions')))

        context.commit('setTransactionsPaginateObject',
            !localStorage.getItem('travel_store_transactions_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_transactions_object')))
    },
    async transactionsPage(context, payload = {url: null, method: 'GET', data: null}) {

        let link = payload.url || BASE_TRANSACTIONS_LINK,
            method = payload.method,
            data = payload.data || null

        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            context.commit('setTransactions', dataObject.data)
            delete dataObject.data
            context.commit('setTransactionsPaginateObject', dataObject)

        }).catch(err => {
            context.dispatch("errorsTransactions")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async loadTransactionsFilteredByPage(context, payload = {filterObject: null, size: 100, page: 0}) {
        let filterObject = payload.filterObject || null,
            page = payload.page || 0,
            size = payload.size || 15

        return await context.dispatch("transactionsPage", {
            url: `${BASE_TRANSACTIONS_LINK}/search?page=${page}&size=${size}`,
            method: 'POST',
            data: filterObject
        })
    },
    async loadTransactionsByPage(context, payload = {page: 0, size: 15}) {
        let page = payload.page || 0,
            size = payload.size || 15

        return await context.dispatch("transactionsPage", {
            url: `${BASE_TRANSACTIONS_LINK}?page=${page}&size=${size}`
        })
    },
}

const mutations = {
    setTransactions(state, payload) {
        state.transactions = payload || [];
        localStorage.setItem('travel_store_transactions', JSON.stringify(payload));
    },
    setTransactionsPaginateObject(state, payload) {
        state.transactions_paginate_object = payload.data || [];
        localStorage.setItem('travel_store_transactions_paginate_object', JSON.stringify(payload));
    }
}
const transactionsModule = {
    state,
    mutations,
    actions,
    getters
}
export default transactionsModule;
