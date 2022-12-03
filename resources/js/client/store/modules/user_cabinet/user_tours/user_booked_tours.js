import util from '../../utilites';

const BASE_USER_BOOKED_TOURS_LINK = '/api/user-cabinet/tours/booked'

let state = {
    user_booked_tours: [],
    user_booked_tours_paginate_object: [],
}

const getters = {
    getUserBookedTours: state => state.user_booked_tours || [],
    getUserUpcomingBookedTours: (state) => {
        return state.user_booked_tours.filter(item => item.payed_at == null)
    },
    getUserCompletedBookedTours: (state) => {
        return state.user_booked_tours.filter(item => item.payed_at !== null)
    },
    getUserBookedTourById: (state) => (id) => {
        return state.user_booked_tours.find(item => item.id === id)
    },
    getUserBookedToursPaginateObject: state => state.user_booked_tours_paginate_object || [],
}

const actions = {
    errorsUserBookedTours(context) {
        context.commit('setUserBookedTours',
            !localStorage.getItem('travel_store_user_booked_tours') ?
                [] : JSON.parse(localStorage.getItem('travel_store_user_booked_tours')))

        context.commit('setUserBookedToursPaginateObject',
            !localStorage.getItem('travel_store_user_booked_tours_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_user_booked_tours_paginate_object')))
    },
    async userBookedToursPage(context, payload = {url: null, method: 'GET', data: null}) {
        let link = payload.url || BASE_USER_BOOKED_TOURS_LINK,
            method = payload.method || 'GET',
            data = payload.data || null

        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            context.commit('setUserBookedTours', dataObject.data)
            delete dataObject.data
            context.commit('setUserBookedToursPaginateObject', dataObject)

        }).catch(err => {
            context.dispatch("errorsUserBookedTours")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async loadUserBookedToursFilteredByPage(context, payload = {filterObject: null, page: 0, size: 15}) {

        let page = payload.page || 0,
            size = payload.size || 15,
            filterObject = payload.filterObject || null

        return await context.dispatch("userBookedToursPage", {
            url: `${BASE_USER_BOOKED_TOURS_LINK}/search?page=${page}&size=${size}`,
            method: 'POST',
            data: filterObject,
        })

    },
    async loadUserBookedToursByPage(context, payload = {page: 0, size: 15}) {

        let page = payload.page || 0,
            size = payload.size || 15

        return await context.dispatch("userBookedToursPage", {
            url: `${BASE_USER_BOOKED_TOURS_LINK}?page=${page}&size=${size}`,
        })

    },
}

const mutations = {
    setUserBookedTours(state, payload) {
        state.user_booked_tours = payload || [];
        localStorage.setItem('travel_store_user_booked_tours', JSON.stringify(payload));
    },
    setUserBookedToursPaginateObject(state, payload) {
        state.user_booked_tours_paginate_object = payload || [];
        localStorage.setItem('travel_store_user_booked_tours_paginate_object', JSON.stringify(payload));
    }
}


const userBookedToursModule = {
    state,
    mutations,
    actions,
    getters
}
export default userBookedToursModule;
