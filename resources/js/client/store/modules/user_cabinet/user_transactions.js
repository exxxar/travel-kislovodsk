import util from "../utilites";

const BASE_USER_TRANSACTIONS_LINK = '/api/user-cabinet/transactions'

let state = {
    user_transactions:[],
    user_transactions_paginate_object:[]
}

const getters = {
    getUserTransactions: state => state.user_transactions || [],
    getUserTransactionById: (state) => (id) => {
        return state.user_transactions.find(item => item.id === id)
    },
    getUserTransactionsPaginateObject: state => state.user_transactions_paginate_object || [],
}

const actions = {
    errorsUserTransactions({commit}){
        commit('setUserTransactions',
            !localStorage.getItem('travel_store_user_transactions') ?
                [] : JSON.parse(localStorage.getItem('travel_store_user_transactions')))

        commit('setUserTransactionsPaginateObject',
            !localStorage.getItem('travel_store_user_transactions_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_user_transactions_object')))
    },
    async userTransactionsPage({commit}, link, method = 'GET', data = null) {
        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            commit('setUserTransactions', dataObject.data)
            delete dataObject.data
            commit('setUserTransactionsPaginateObject', dataObject)

        }).catch(err => {
            this.errorsUserTransactions(commit)
        })
    },
    async loadUserTransactionsFilteredByPage({commit}, filterObject, page = 0, size = 15){
        return await this.userTransactionsPage(commit,
            `${BASE_USER_TRANSACTIONS_LINK}/search?page=${page}&size=${size}`,
            'POST',
            filterObject)
    },
    async loadUserTransactionsByPage({commit}, page = 0, size = 15){
        return await this.userTransactionsPage(commit,
            `${BASE_USER_TRANSACTIONS_LINK}?page=${page}&size=${size}`)
    },
}

const mutations = {
    setUserTransactions(state, payload) {
        state.user_transactions = payload.data || [];
        localStorage.setItem('travel_store_user_transactions', JSON.stringify(payload));
    },
    setUserTransactionsPaginateObject(state, payload) {
        state.user_transactions_paginate_object = payload.data || [];
        localStorage.setItem('travel_store_user_transactions_paginate_object', JSON.stringify(payload));
    }
}
const userTransactionsModule = {
    state,
    mutations,
    actions,
    getters
}
export default userTransactionsModule;
