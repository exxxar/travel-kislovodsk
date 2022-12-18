import axios from 'axios';
import util from "./utilites";

const BASE_TOUR_LINK = '/api/tours'

let state = {
    max_tours_price: 10000,
    tours: [],
    paginate_object: [],

}

const getters = {
    getTours: state => state.tours || [],
    getMaxToursPrice: state => state.max_tours_price || 10000,
    getTourById: (state) => (id) => {
        return state.tours.find(tourItem => tourItem.id === id)
    },
    getToursByCategoryId: (state) => (id) => {

        return state.tours.filter(tourItem => {

            return tourItem.tour_categories.filter(categoryItem => categoryItem.id === id).length > 0
        })
    },
    getToursPaginateObject: state => state.paginate_object || [],
}

const actions = {
    errorsTours({commit}) {
        commit('setTours',
            !localStorage.getItem('travel_store_tours') ?
                [] : JSON.parse(localStorage.getItem('travel_store_tours')))

        commit('setToursPaginateObject',
            !localStorage.getItem('travel_store_tours_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_tours_paginate_object')))
    },
    async tourPage(context, payload) {

        let link = payload.url || BASE_TOUR_LINK
        let method = payload.method || 'GET'
        let data = payload.data || null

        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            context.commit('setTours', dataObject.data)
            delete dataObject.data
            context.commit('setToursPaginateObject', dataObject)

        }).catch(err => {
             context.dispatch("errorsTours");

        })
    },
    async previousToursPage(context,filters) {
        return await context.dispatch("tourPage", {
            url:state
                .paginate_object
                .links
                .prev || BASE_TOUR_LINK,
            method:'POST',
            data:filters
        })
    },
    async nextToursPage(context, filters) {

        return await context.dispatch("tourPage", {
            url:state
                .paginate_object
                .links
                .next || BASE_TOUR_LINK,
            method:'POST',
            data:filters

        })

    },
    async watchTour(context, tourId) {

        let _axios = util.makeAxiosFactory(`${BASE_TOUR_LINK}/watch/${tourId}`, 'GET')

        return _axios.then((response) => {

        }).catch(err => {

        })
    },
    async loadMaxTourPrice(context) {

        let _axios = util.makeAxiosFactory(BASE_TOUR_LINK+"/max-tours-price", 'GET')

        return _axios.then((response) => {
            let dataObject = response.data
            context.commit('setMaxToursPrice', dataObject)

        }).catch(err => {
            context.dispatch("errorsTours");

        })
    },

    async loadTourByGuideId(context, payload = {guideId:0, page:0,size:12}) {
        let size = payload.size || 12
        let page = payload.page || 0
        let guideId = payload.guideId || 0

        return await context.dispatch("tourPage", {
            url:`${BASE_TOUR_LINK}/by-guide/${guideId}?page=${page}&size=${size}`
        })
    },
    async loadToursByPage(context, payload = {page:0,size:12}) {
        let size = payload.size || 12
        let page = payload.page || 0
        return await context.dispatch("tourPage", {
            url:`${BASE_TOUR_LINK}?page=${page}&size=${size}`
        })
    },
    async loadToursFilteredByPage(context, payload) {
        let page = payload.page || 0
        let size = 12
        return await context.dispatch("tourPage", {
            url:`${BASE_TOUR_LINK}/search?page=${page}&size=${size}`,
            method:'POST',
            data:payload.filters
        })

    },
    async loadToursByTourCategoryByPage(context, payload) {

        let category = payload.category,
            page = payload.page || 0,
            size = payload.size || 12

        return await context.dispatch("tourPage", {
            url:`${BASE_TOUR_LINK}?category=${category}&page=${page}&size=${size}`
        })
    },
    async loadAllTours(context) {
        return await context.dispatch("tourPage",  {
            url: `${BASE_TOUR_LINK}/all`
        })
    },
    async loadAllHotTours(context) {
        return await context.dispatch("tourPage", {
            url:`${BASE_TOUR_LINK}/hot`
        })
    }
}

const mutations = {
    setMaxToursPrice(state, payload) {
        state.max_tours_price = payload || [];
        localStorage.setItem('travel_store_max_tours_price', JSON.stringify(payload));
    },
    setTours(state, payload) {
        state.tours = payload || [];
        localStorage.setItem('travel_store_tours', JSON.stringify(payload));
    },
    setToursPaginateObject(state, payload) {
        state.paginate_object = payload || [];
        localStorage.setItem('travel_store_tours_paginate_object', JSON.stringify(payload));
    }
}

const toursModule = {
    state,
    mutations,
    actions,
    getters
}
export default toursModule;
