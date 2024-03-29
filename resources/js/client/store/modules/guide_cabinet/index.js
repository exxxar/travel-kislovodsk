import axios from 'axios';
import schedules from './guide_schedules'
import tours from './guide_tours'

import tourObjects from './guide_tour_object'
import util from "../utilites";

const BASE_GUIDE_CABINET_LINK = '/api/guide-cabinet'

let state = {
    ...schedules.state,
    ...tours.state,
    ...tourObjects.state,
    documents: [],
    guide_booked_tours: [],
    guide_booked_tours_load_more: false
}

const getters = {
    ...schedules.getters,
    ...tours.getters,
    ...tourObjects.getters,
    getGuideDocuments: state => state.documents || [],
    getGuideBookedTours: state => state.guide_booked_tours || [],
    canGuideBookedToursLoadMore: state => state.guide_booked_tours_load_more || false,
    getGuideDocumentById: (state) => (id) => {
        return state.documents.find(item => item.id === id)
    },

}

const actions = {

    ...schedules.actions,
    ...tours.actions,
    ...tourObjects.actions,
    errorGuideCabinet(context) {
        context.commit('setGuideDocuments',
            !localStorage.getItem('travel_store_guide_documents') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_documents')))

    },
    async requestGuideProfileDocumentVerified(context, documentId) {

        let _axios = util.makeAxiosFactory(`${BASE_GUIDE_CABINET_LINK}/request-profile-document-verified/${documentId}`)

        return _axios.then((response) => {

        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            context.dispatch("errorGuideCabinet")
            return Promise.reject(err);
        })
    },
    async requestGuideProfileVerified(context) {

        let _axios = util.makeAxiosFactory(`${BASE_GUIDE_CABINET_LINK}/request-profile-verified`)

        return _axios.then((response) => {

        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            context.dispatch("errorGuideCabinet")
            return Promise.reject(err);
        })
    },
    async removeGuideDocument(context, documentId) {
        let _axios = util.makeAxiosFactory(`${BASE_GUIDE_CABINET_LINK}/remove-document/${documentId}`, 'DELETE')

        return _axios.then((response) => {

        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            context.dispatch("errorGuideCabinet")
            return Promise.reject(err);
        })
    },
    async addGuideDocuments(context, formData) {

        return axios.post(`${BASE_GUIDE_CABINET_LINK}/upload-document`, formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then((response) => {

        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            context.dispatch("errorGuideCabinet")
            return Promise.reject(err);
        })
    },
    async downloadGroupDocument(context, payload = {schedule_id: null, tour_id: null}) {
        let _axios = util.makeAxiosFactory(`${BASE_GUIDE_CABINET_LINK}/booked-tour-info`, 'POST', payload, {
            responseType: 'blob'
        })

        return _axios.then((response) => {
            return response
        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            context.dispatch("errorGuideCabinet")
            return Promise.reject(err);
        })
    },
    async loadActualGuideBookedTours(context, payload = {tourId:null, page: 0, size: 15}) {
        let page = payload.page || 0,
            size = payload.size || 15,
            tourId = payload.tourId

        let _axios = util.makeAxiosFactory(`${BASE_GUIDE_CABINET_LINK}/tours/actual-booked-tours/${tourId}?page=${page}&size=${size}`)

        return _axios.then((response) => {
            let dataObject = response.data
            context.commit('setGuideBookedTours', dataObject.data)
            delete dataObject.data
            context.commit('setGuideBookedToursCanLoadMore', dataObject)

        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            context.dispatch("errorGuideCabinet")
            return Promise.reject(err);
        })
    },
    async loadGuideDocuments(context) {
        let _axios = util.makeAxiosFactory(`${BASE_GUIDE_CABINET_LINK}/documents`)

        return _axios.then((response) => {
            let dataObject = response.data
            context.commit('setGuideDocuments', dataObject.data)

        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            context.dispatch("errorGuideCabinet")
            return Promise.reject(err);
        })
    },

    async updateGuideAccounting(context, accountingObject) {
        let _axios = util.makeAxiosFactory(`${BASE_GUIDE_CABINET_LINK}/account`, 'POST', accountingObject)

        return _axios.then((response) => {

        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async updateGuideCompany(context, profileObject) {
        let _axios = util.makeAxiosFactory(`${BASE_GUIDE_CABINET_LINK}/company`, 'POST', profileObject)

        return _axios.then((response) => {

        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async updateGuideProfile(context, profileObject) {
        let _axios = util.makeAxiosFactory(`${BASE_GUIDE_CABINET_LINK}/profile`, 'POST', profileObject)

        return _axios.then((response) => {

        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async updateGuidePassword(context, profileObject) {
        let _axios = util.makeAxiosFactory(`${BASE_GUIDE_CABINET_LINK}/password`, 'POST', profileObject)

        return _axios.then((response) => {

        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async addGuideImage(context, formData) {

        return axios.post(`${BASE_GUIDE_CABINET_LINK}/upload-image`, formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then((response) => {

        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            context.dispatch("errorGuideCabinet")
            return Promise.reject(err);

        })
    },

}

const mutations = {
    ...schedules.mutations,
    ...tours.mutations,
    ...tourObjects.mutations,

    setGuideDocuments(state, payload) {
        state.documents = payload || [];
        localStorage.setItem('travel_store_guide_documents', JSON.stringify(payload));
    },
    setGuideBookedToursCanLoadMore(state, payload) {
        state.guide_booked_tours_load_more = payload.links.next!==null
    },
    setGuideBookedTours(state, payload) {
        if (state.guide_booked_tours.length === 0  )
            state.guide_booked_tours = payload || [];
        else
            state.guide_booked_tours = [...state.guide_booked_tours, ...payload]
        localStorage.setItem('travel_store_guide_booked_tours', JSON.stringify(payload));
    },
}

const guideCabinetModule = {
    state,
    mutations,
    actions,
    getters
}
export default guideCabinetModule;
