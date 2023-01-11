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
    errorsBookings(context) {
        try {
            context.commit('setBookings',
                !localStorage.getItem('travel_store_bookings') ?
                    [] : JSON.parse(localStorage.getItem('travel_store_bookings')||'[]'))

            context.commit('setBookingsPaginateObject',
                !localStorage.getItem('travel_store_bookings_paginate_object') ?
                    [] : JSON.parse(localStorage.getItem('travel_store_bookings_paginate_object')||'[]'))
        }catch (e){
            localStorage.removeItem('travel_store_bookings')
            localStorage.removeItem('travel_store_bookings_paginate_object')
        }

    },
    async removeBookings(context, id) {
        let _axios = util.makeAxiosFactory(`${BASE_BOOKINGS_LINK}/remove/${id}`, 'DELETE')

        return await _axios.then((response) => {

        }).catch(err => {
            context.dispatch("errorsBookings")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async bookingsPage(context, payload = {url: null, method: 'GET', data: null}) {

        let link = payload.url || BASE_BOOKINGS_LINK,
            method = payload.method || 'GET',
            data = payload.data || null

        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            context.commit('setBookings', dataObject.data)
            delete dataObject.data
            context.commit('setBookingsPaginateObject', dataObject)
            return Promise.resolve(dataObject);
        }).catch(err => {
            context.dispatch("errorsBookings")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async bookATour(context, bookTourObject) {
        return await context.dispatch("bookingsPage", {
            url: `${BASE_BOOKINGS_LINK}/book-tour`,
            method: 'POST',
            data: bookTourObject
        })
    },
    async previousBookingsPage(context) {
        return await context.dispatch("bookingsPage", {
            url: state
                .paginate_object
                .links
                .prev || BASE_BOOKINGS_LINK

        })
    },
    async nextBookingsPage(context) {

        return await context.dispatch("bookingsPage", {
            url: state
                .paginate_object
                .links
                .next || BASE_BOOKINGS_LINK

        })

    },
    async loadBookingsByPage(context, payload = {page: 0, size: 15}) {

        let page = payload.page || 0
        let size = payload.size || 15

        return await context.dispatch("bookingsPage", {
            url: `${BASE_BOOKINGS_LINK}?page=${page}&size=${size}`
        })

    },
    async loadAllBookings(context) {
        return await context.dispatch("bookingsPage", {
            url: `${BASE_BOOKINGS_LINK}/all`

        })
    },
}

const mutations = {
    setBookings(state, payload) {
        state.bookings = payload || [];
        localStorage.setItem('travel_store_bookings', JSON.stringify(payload || []));
    },
    setBookingsPaginateObject(state, payload) {
        state.paginate_object = payload || [];
        localStorage.setItem('travel_store_bookings_paginate_object', JSON.stringify(payload || []));
    }
}

const bookingsModule = {
    state,
    mutations,
    actions,
    getters
}
export default bookingsModule;
