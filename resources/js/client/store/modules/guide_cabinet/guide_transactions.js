import util from "../utilites";

const BASE_GUIDE_TRANSACTIONS_LINK = '/api/guide-cabinet/transactions'

let state = {
    guide_transactions: [],
    guide_transactions_paginate_object: []
}

const getters = {
    getGuideTransactions: state => state.guide_transactions || [],
    getGuideTransactionById: (state) => (id) => {
        return state.guide_transactions.find(item => item.id === id)
    },
    getGuideTransactionsPaginateObject: state => state.guide_transactions_paginate_object || [],
}

const actions = {
    errorsGuideTransactions(context) {
        context.commit('setGuideTransactions',
            !localStorage.getItem('travel_store_guide_transactions') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_transactions')))

        context.commit('setGuideTransactionsPaginateObject',
            !localStorage.getItem('travel_store_guide_transactions_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_transactions_object')))
    },
    async guideTransactionsPage(context, payload) {

        let link = payload.url || BASE_GUIDE_TRANSACTIONS_LINK,
            method = payload.method || 'GET',
            data = payload.data || null

        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            context.commit('setGuideTransactions', dataObject.data)
            delete dataObject.data
            context.commit('setGuideTransactionsPaginateObject', dataObject)

        }).catch(err => {
            context.dispatch("errorsGuideTransactions")
        })
    },
    async loadGuideTransactionsFilteredByPage(context, payload) {

        let filterObject = payload.filterObject || null,
            page = payload.page || 0,
            size = payload.size || 15

        return await context.dispatch("guideTransactionsPage", {
            url: `${BASE_GUIDE_TRANSACTIONS_LINK}/search?page=${page}&size=${size}`,
            method: 'POST',
            data: filterObject
        })


    },
    async loadGuideTransactionsByPage(context, payload = {page: 0, size: 15}) {

        let page = payload.page || 0,
            size = payload.size || 15

        return await context.dispatch("guideTransactionsPage", {
                url: `${BASE_GUIDE_TRANSACTIONS_LINK}?page=${page}&size=${size}`
            }
        )
    },
}

const mutations = {
    setGuideTransactions(state, payload) {
        state.guide_transactions = payload || [];
        localStorage.setItem('travel_store_guide_transactions', JSON.stringify(payload));
    },
    setGuideTransactionsPaginateObject(state, payload) {
        state.guide_transactions_paginate_object = payload || [];
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
