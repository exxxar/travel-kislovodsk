import util from "../utilites";

const BASE_TRANSACTIONS_LINK = '/admin/api/transactions'

let state = {
    admin_transactions: [],
    admin_transactions_paginate_object: []
}

const getters = {
    getAdminTransactions: state => state.admin_transactions,
    getAdminTransactionById: (state) => (id) => {
        return state.admin_transactions.find(item => item.id === id)
    },
    getAdminTransactionsByTransactionType: (state) => (typeId) => {

        if (typeId !== 0)
            return state.admin_transactions.filter(item => item.status_type_id === typeId)
        else
            return state.admin_transactions
    },
    getAdminTransactionsPaginateObject: state => state.admin_transactions_paginate_object || [],
}

const actions = {
    errorsAdminTransactions(context) {
        context.commit('setAdminTransactions',
            !localStorage.getItem('travel_store_admin_transactions') ?
                [] : JSON.parse(localStorage.getItem('travel_store_admin_transactions')))

        context.commit('setAdminTransactionsPaginateObject',
            !localStorage.getItem('travel_store_admin_transactions_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_admin_transactions_object')))
    },
    async adminTransactionsPage(context, payload = {url: null, method: 'GET', data: null}) {

        let link = payload.url || BASE_TRANSACTIONS_LINK,
            method = payload.method,
            data = payload.data || null

        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            context.commit('setAdminTransactions', dataObject.data)
            delete dataObject.data
            context.commit('setAdminTransactionsPaginateObject', dataObject)
            return Promise.resolve(dataObject);
        }).catch(err => {
            context.dispatch("errorsAdminTransactions")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async loadAdminTransactionsFilteredByPage(context, payload = {filterObject: null, size: 100, page: 0}) {
        let filterObject = payload.filterObject || null,
            page = payload.page || 0,
            size = payload.size || 15

        return await context.dispatch("adminTransactionsPage", {
            url: `${BASE_TRANSACTIONS_LINK}/search?page=${page}&size=${size}`,
            method: 'POST',
            data: filterObject
        })
    },
    async requestAdminPaymentByTransactionId(context, transactionId){
        return await context.dispatch("adminTransactionsPage", {
            url: `${BASE_TRANSACTIONS_LINK}/request/${transactionId}`
        })
    },
    async loadAdminTransactionsByPage(context, payload = {page: 0, size: 15}) {
        let page = payload.page || 0,
            size = payload.size || 15

        return await context.dispatch("adminTransactionsPage", {
            url: `${BASE_TRANSACTIONS_LINK}?page=${page}&size=${size}`
        })
    },
}

const mutations = {
    setAdminTransactions(state, payload) {
        state.admin_transactions = payload || [];
        localStorage.setItem('travel_store_admin_transactions', JSON.stringify(payload));
    },
    setAdminTransactionsPaginateObject(state, payload) {
        state.admin_transactions_paginate_object = payload || [];
        localStorage.setItem('travel_store_admin_transactions_paginate_object', JSON.stringify(payload));
    }
}
const adminTransactionsModule = {
    state,
    mutations,
    actions,
    getters
}
export default adminTransactionsModule;
