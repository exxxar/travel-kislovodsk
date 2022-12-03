import util from '../../utilites';

const BASE_USER_WATCHED_TOURS_LINK = '/api/user-cabinet/tours/watched'

let state = {
    user_watched_tours: [],
    user_watched_tours_paginate_object: [],
}

const getters = {
    getUserWatchedTours: state => state.user_watched_tours || [],
    getUserWatchedTourById: (state) => (id) => {
        return state.user_watched_tours.find(item => item.id === id)
    },
    getUserWatchedToursPaginateObject: state => state.user_watched_tours_paginate_object || [],
}

const actions = {
    errorsUserWatchedTours(context) {
        context.commit('setUserWatchedTours',
            !localStorage.getItem('travel_store_user_watched_tours') ?
                [] : JSON.parse(localStorage.getItem('travel_store_user_watched_tours')))

        context.commit('setUserWatchedToursPaginateObject',
            !localStorage.getItem('travel_store_user_watched_tours_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_user_watched_tours_paginate_object')))
    },
    async userWatchedToursPage(context, payload = {}) {

        let link = payload.url || BASE_USER_WATCHED_TOURS_LINK,
            method = payload.method || 'GET',
            data = payload.data || null

        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            context.commit('setUserWatchedTours', dataObject.data)
            delete dataObject.data
            context.commit('setUserWatchedToursPaginateObject', dataObject)

        }).catch(err => {
            context.dispatch("errorsUserTransactions")
        })
    },
    async loadUserWatchedToursFilteredByPage(context, payload = {filterObject: null, page: 0, size: 12}) {
        let filterObject = payload.filterObject,
            page = payload.page || 0,
            size = payload.size || 15

        return await context.dispatch("userWatchedToursPage", {
            url:`${BASE_USER_WATCHED_TOURS_LINK}/search?page=${page}&size=${size}`,
            method: 'POST',
            data: filterObject
            })
    },
    async loadUserWatchedToursByPage(context, payload = {page:0, size: 12} ) {

        let page = payload.page || 0,
            size = payload.size || 15

        return await context.dispatch("userWatchedToursPage", {
            url: `${BASE_USER_WATCHED_TOURS_LINK}?page=${page}&size=${size}`
        });

    },
}

const mutations = {
    setUserWatchedTours(state, payload) {
        state.user_watched_tours = payload || [];
        localStorage.setItem('travel_store_user_watched_tours', JSON.stringify(payload));
    },
    setUserWatchedToursPaginateObject(state, payload) {
        state.user_watched_tours_paginate_object = payload || [];
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
