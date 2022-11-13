import axios from 'axios';
import transactions from './guide_transactions'
import schedules from './guide_schedules'
import tours from './guide_tours'
import reviews from './guide_reviews'
import tourObjects from './guide_tour_object/guide_tour_objects'

const BASE_GUIDE_CABINET_LINK = '/api/guide-cabinet'

let state = {
    ...transactions.state,
    ...schedules.state,
    ...tours.state,
    ...reviews.state,
    ...tourObjects.state,
    documents:[]
}

const getters = {
    ...transactions.getters,
    ...schedules.getters,
    ...tours.getters,
    ...reviews.getters,
    ...tourObjects.getters,
}

const actions = {
    ...transactions.actions,
    ...schedules.actions,
    ...tours.actions,
    ...reviews.actions,
    ...tourObjects.actions,
    async uploadProfilePhoto({commit}, formData){

    },
    async requestProfileVerified({commit}){

    },
    async removeGuideDocument({commit}, documentId){

    },
    async addGuideDocument({commit}, documentObject, formData){

    },
    async loadGuideDocuments({commit}){

    },
    async updateGuideProfile({commit}, profileObject){

    },

}

const mutations = {
    ...transactions.mutations,
    ...schedules.mutations,
    ...tours.mutations,
    ...reviews.mutations,
    ...tourObjects.mutations,
}

const guideCabinetModule = {
    state,
    mutations,
    actions,
    getters
}
export default guideCabinetModule;
