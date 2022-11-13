import axios from 'axios';
import util from "./utilites";

const BASE_BOOKINGS_LINK = '/api/bookings'

let state = {
    bookings: [],
    paginate_object: [],
}

const getters = {
    getBookings: state => state.bookings || [],
    getBookingById: (state) => (id) => {
        return state.bookings.find(item => item.id === id)
    },
    getBookingsPaginateObject: state => state.paginate_object || [],
}

const actions = {
    errorsBookings({commit}){
        commit('setBookings',
            !localStorage.getItem('travel_store_bookings') ?
                [] : JSON.parse(localStorage.getItem('travel_store_bookings')))

        commit('setBookingsPaginateObject',
            !localStorage.getItem('travel_store_bookings_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_bookings_paginate_object')))
    },
    async removeBookings({commit}, id){
        let _axios = util.makeAxiosFactory(`${BASE_BOOKINGS_LINK}/remove/${id}`, 'DELETE')
        return await _axios.then((response) => {
            let dataObject = response.data
            commit('setBookings', dataObject.data)
            delete dataObject.data
            commit('setBookingsPaginateObject', dataObject)

        }).catch(err => {
            this.errorsBookings(commit)
        })
    },
    async bookingsPage({commit}, link, method = 'GET', data = null) {
        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            commit('setBookings', dataObject.data)
            delete dataObject.data
            commit('setBookingsPaginateObject', dataObject)

        }).catch(err => {
            this.errorsBookings(commit)
        })
    },
    async bookATour({commit}, tour) {
        return await this.bookingsPage(commit, `${BASE_BOOKINGS_LINK}/book-tour`,'POST', tour )
    },
    async previousBookingsPage({commit}) {
        return await this.bookingsPage(commit, state
            .paginate_object
            .links
            .prev || BASE_BOOKINGS_LINK)
    },
    async nextBookingsPage({commit}) {
        return await this.bookingsPage(commit, state
            .paginate_object
            .links
            .next || BASE_BOOKINGS_LINK)
    },
    async loadBookingsByPage({commit}, page = 0, size = 15) {
        return await this.bookingsPage(commit, `${BASE_BOOKINGS_LINK}?page=${page}&size=${size}`)
    },
    async loadAllBookings({commit}) {
        return await this.bookingsPage(commit, `${BASE_BOOKINGS_LINK}/all`)
    },
}

const mutations = {
    setBookings(state, payload) {
        state.bookings = payload.data || [];
        localStorage.setItem('travel_store_bookings', JSON.stringify(payload));
    },
    setBookingsPaginateObject(state, payload) {
        state.paginate_object = payload.data || [];
        localStorage.setItem('travel_store_bookings_paginate_object', JSON.stringify(payload));
    }
}

const bookingsModule = {
    state,
    mutations,
    actions,
    getters
}
export default bookingsModule;
