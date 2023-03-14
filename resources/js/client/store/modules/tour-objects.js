import util from './utilites';
import axios from "axios";

const BASE_TOUR_OBJECTS_LINK = '/api/tour-objects'

let state = {
    tour_objects: [],
    tour_objects_paginate_object: null,
}

const getters = {
    getTourObjects: state => state.tour_objects || [],
    getTourObjectsPaginateObject: state => state.tour_objects_paginate_object || null,
}

const actions = {
    errorsTourObjects(context) {
        context.commit('setTourObjects',
            !localStorage.getItem('travel_store_tour_objects') ?
                [] : JSON.parse(localStorage.getItem('travel_store_tour_objects')))

        context.commit('setTourObjectsPaginateObject',
            !localStorage.getItem('travel_store_tour_objects_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_tour_objects_paginate_object')))
    },
    async TourObjectsPage(context, payload) {

        let link = payload.url || BASE_TOUR_OBJECTS_LINK,
            method = payload.method || 'GET',
            data = payload.data || null

        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            context.commit('setTourObjects', dataObject.data)
            delete dataObject.data
            context.commit('setTourObjectsPaginateObject', dataObject)

        }).catch(err => {
            context.dispatch("errorsTourObjects")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async loadTourObjectsFilteredByPage(context, payload = {filterObject: null, page: 0, size: 12}) {
        let filterObject = payload.filterObject,
            page = payload.page || 0,
            size = payload.size || 12

        return await context.dispatch("TourObjectsPage", {
            url: `${BASE_TOUR_OBJECTS_LINK}/search?page=${page}&size=${size}`,
            method: 'POST',
            data: filterObject
        })
    },
    async loadTourObjectsByPage(context, payload = {page: 0, size: 12}) {
        let page = payload.page || 0,
            size = payload.size || 15

        return await context.dispatch("TourObjectsPage", {
            url: `${BASE_TOUR_OBJECTS_LINK}?page=${page}&size=${size}`
        })
    },

}

const mutations = {
    setTourObjects(state, payload) {
        state.tour_objects = payload || [];
        localStorage.setItem('travel_store_tour_objects', JSON.stringify(payload));
    },
    setTourObjectsPaginateObject(state, payload) {
        state.tour_objects_paginate_object = payload || [];
        localStorage.setItem('travel_store_tour_objects_paginate_object', JSON.stringify(payload));
    }
}

const tourObjectsModule = {
    state,
    mutations,
    actions,
    getters
}
export default tourObjectsModule;
