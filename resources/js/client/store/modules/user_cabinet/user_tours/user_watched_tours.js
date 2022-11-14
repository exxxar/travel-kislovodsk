import util from '../../utilites';

const BASE_USER_WATCHED_TOURS_LINK = '/api/user-cabinet/tours/watched'

let state = {
    user_watched_tours:[],
    user_watched_tours_paginate_object:[],
}

const getters = {
    getUserWatchedTours:state => state.user_watched_tours || [],
    getUserWatchedTourById: (state) => (id) => {
        return state.user_watched_tours.find(item => item.id === id)
    },
    getUserWatchedToursPaginateObject: state => state.user_watched_tours_paginate_object || [],
}

const actions = {
    errorsUserWatchedTours({commit}){
        commit('setUserWatchedTours',
            !localStorage.getItem('travel_store_user_watched_tours') ?
                [] : JSON.parse(localStorage.getItem('travel_store_user_watched_tours')))

        commit('setUserWatchedToursPaginateObject',
            !localStorage.getItem('travel_store_user_watched_tours_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_user_watched_tours_paginate_object')))
    },
    async userWatchedToursPage({commit}, link, method = 'GET', data = null) {
        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            commit('setUserWatchedTours', dataObject.data)
            delete dataObject.data
            commit('setUserWatchedToursPaginateObject', dataObject)

        }).catch(err => {
            this.errorsUserTransactions(commit)
        })
    },
    async loadUserWatchedToursFilteredByPage({commit}, filterObject, page = 0, size = 15){
        return await this.userWatchedToursPage(commit,
            `${BASE_USER_WATCHED_TOURS_LINK}/search?page=${page}&size=${size}`,
            'POST',
            filterObject)
    },
    async loadUserWatchedToursByPage({commit}, page = 0, size = 15){
        return await this.userWatchedToursPage(commit,
            `${BASE_USER_WATCHED_TOURS_LINK}?page=${page}&size=${size}`)
    },
}

const mutations = {
    setUserWatchedTours(state, payload) {
        state.user_watched_tours = payload.data || [];
        localStorage.setItem('travel_store_user_watched_tours', JSON.stringify(payload));
    },
    setUserWatchedToursPaginateObject(state, payload) {
        state.user_watched_tours_paginate_object = payload.data || [];
        localStorage.setItem('travel_store_user_watched_tours_paginate_object', JSON.stringify(payload));
    }
}


const userWatchedToursModule = {
    state,
    mutations,
    actions,
    getters
}
export default userWatchedToursModule;
