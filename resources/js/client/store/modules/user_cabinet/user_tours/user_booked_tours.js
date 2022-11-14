import util from '../../utilites';

const BASE_USER_BOOKED_TOURS_LINK = '/api/user-cabinet/tours/booked'

let state = {
    user_booked_tours:[],
    user_booked_tours_paginate_object:[],
}

const getters = {
    getUserBookedTours:state => state.user_booked_tours || [],
    getUserUpcomingBookedTours: (state)  => {
        return state.user_booked_tours.filter(item => item.payed_at   == null)
    },
    getUserCompletedBookedTours: (state)  => {
        return state.user_booked_tours.filter(item => item.payed_at   !== null)
    },
    getUserBookedTourById: (state) => (id) => {
        return state.user_booked_tours.find(item => item.id === id)
    },
    getUserBookedToursPaginateObject: state => state.user_booked_tours_paginate_object || [],
}

const actions = {
    errorsUserBookedTours({commit}){
        commit('setUserBookedTours',
            !localStorage.getItem('travel_store_user_booked_tours') ?
                [] : JSON.parse(localStorage.getItem('travel_store_user_booked_tours')))

        commit('setUserBookedToursPaginateObject',
            !localStorage.getItem('travel_store_user_booked_tours_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_user_booked_tours_paginate_object')))
    },
    async userBookedToursPage({commit}, link, method = 'GET', data = null) {
        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            commit('setUserBookedTours', dataObject.data)
            delete dataObject.data
            commit('setUserBookedToursPaginateObject', dataObject)

        }).catch(err => {
            this.errorsUserTransactions(commit)
        })
    },
    async loadUserBookedToursFilteredByPage({commit}, filterObject, page = 0, size = 15){
        return await this.userBookedToursPage(commit,
            `${BASE_USER_BOOKED_TOURS_LINK}/search?page=${page}&size=${size}`,
            'POST',
            filterObject)
    },
    async loadUserBookedToursByPage({commit}, page = 0, size = 15){
        return await this.userBookedToursPage(commit,
            `${BASE_USER_BOOKED_TOURS_LINK}?page=${page}&size=${size}`)
    },
}

const mutations = {
    setUserBookedTours(state, payload) {
        state.user_booked_tours = payload.data || [];
        localStorage.setItem('travel_store_user_booked_tours', JSON.stringify(payload));
    },
    setUserBookedToursPaginateObject(state, payload) {
        state.user_booked_tours_paginate_object = payload.data || [];
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
