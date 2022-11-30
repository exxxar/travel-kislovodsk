import axios from 'axios';
import transactions from './guide_transactions'
import schedules from './guide_schedules'
import tours from './guide_tours'

import tourObjects from './guide_tour_object'
import util from "../utilites";

const BASE_GUIDE_CABINET_LINK = '/api/guide-cabinet'

let state = {
    ...transactions.state,
    ...schedules.state,
    ...tours.state,
    ...tourObjects.state,
    documents: []
}

const getters = {
    ...transactions.getters,
    ...schedules.getters,
    ...tours.getters,
    ...tourObjects.getters,
    getGuideDocuments: state => state.documents || [],
    getGuideDocumentById: (state) => (id) => {
        return state.documents.find(item => item.id === id)
    },
}

const actions = {
    ...transactions.actions,
    ...schedules.actions,
    ...tours.actions,
    ...tourObjects.actions,
    errorGuideCabinet(context) {
        context.commit('setGuideDocuments',
            !localStorage.getItem('travel_store_guide_documents') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_documents')))

    },
    async uploadGuideProfilePhoto(context, payload) {
        let formData = payload.data
        return axios.post(`${BASE_GUIDE_CABINET_LINK}/upload-profile-photo`, formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then((response) => {

        }).catch(err => {
            context.dispatch("errorGuideCabinet")
        })
    },
    async requestGuideProfileVerified(context) {

        let _axios = util.makeAxiosFactory(`${BASE_GUIDE_CABINET_LINK}/request-profile-verified`)

        return _axios.then((response) => {


        }).catch(err => {
            context.dispatch("errorGuideCabinet")
        })
    },
    async removeGuideDocument(context, documentId) {
        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            context.commit('setGuideDocuments', dataObject.data)

        }).catch(err => {
            context.dispatch("errorGuideCabinet")
        })
    },
    async addGuideDocument(context, payload = {formData: null, title: null, description: null}) {

        let formData = payload.formData || null,
            title = payload.title || null,
        description = payload.description || null

        if (title)
            formData.append("title", title)
        if (description)
            formData.append("description", description)

        return axios.post(`${BASE_GUIDE_CABINET_LINK}/upload-document`, formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then((response) => {

        }).catch(err => {
            context.dispatch("errorGuideCabinet")
        })
    },
    async loadGuideDocuments(context) {
        let _axios = util.makeAxiosFactory(`${BASE_GUIDE_CABINET_LINK}/documents`)

        return _axios.then((response) => {
            let dataObject = response.data
            context.commit('setGuideDocuments', dataObject.data)

        }).catch(err => {
            context.dispatch("errorGuideCabinet")
        })
    },

    async updateGuideCompany(context, profileObject) {
        let _axios = util.makeAxiosFactory(`${BASE_GUIDE_CABINET_LINK}/company`, 'POST', profileObject)

        return _axios.then((response) => {

        }).catch(err => {

        })
    },
    async updateGuideProfile(context, profileObject) {
        let _axios = util.makeAxiosFactory(`${BASE_GUIDE_CABINET_LINK}/profile`, 'POST', profileObject)

        return _axios.then((response) => {

        }).catch(err => {

        })
    },
    async updateGuidePassword(context, profileObject) {
        let _axios = util.makeAxiosFactory(`${BASE_GUIDE_CABINET_LINK}/password`, 'POST', profileObject)

        return _axios.then((response) => {

        }).catch(err => {

        })
    },
    async addGuideImage(context, formData) {

        return axios.post(`${BASE_GUIDE_CABINET_LINK}/upload-image`, formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then((response) => {

        }).catch(err => {
            context.dispatch("errorGuideCabinet")
        })
    },

}

const mutations = {
    ...transactions.mutations,
    ...schedules.mutations,
    ...tours.mutations,
    ...tourObjects.mutations,
    setGuideDocuments(state, payload) {
        state.documents = payload.data || [];
        localStorage.setItem('travel_store_guide_documents', JSON.stringify(payload));
    },
}

const guideCabinetModule = {
    state,
    mutations,
    actions,
    getters
}
export default guideCabinetModule;
