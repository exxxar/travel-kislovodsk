import axios from 'axios';

import active from './guide_active_tour_objects'
import removed from './guide_removed_tour_objects'
import util from "../../utilites";

const BASE_GUIDE_TOUR_OBJECTS_LINK = '/api/guide-cabinet/tour-objects'

let state = {
    ...active.state,
    ...removed.state,
}

const getters = {
    ...active.getters,
    ...removed.getters,
}

const actions = {
    ...active.actions,
    ...removed.actions,
    async editTourObject({commit}, tourObject, tourObjectId) {
        let _axios = util.makeAxiosFactory(`${BASE_GUIDE_TOUR_OBJECTS_LINK}/${tourObjectId}`, 'PUT', tourObject)

        return _axios.then((response) => {
            this.loadActiveTourObjectsByPage(commit)
        }).catch(err => {

        })
    },
    async createTourObject({commit}, tourObject) {
        let _axios = util.makeAxiosFactory(`${BASE_GUIDE_TOUR_OBJECTS_LINK}`, 'POST', tourObject)

        return _axios.then((response) => {
            this.loadActiveTourObjectsByPage(commit)
        }).catch(err => {

        })
    },
    async removeTourObject({commit}, tourObjectId) {
        let _axios = util.makeAxiosFactory(`${BASE_GUIDE_TOUR_OBJECTS_LINK}/remove/${tourObjectId}`, 'DELETE')

        return _axios.then((response) => {
            this.loadActiveTourObjectsByPage(commit)
            this.loadRemovedTourObjectsByPage(commit)
        }).catch(err => {

        })

    },
}

const mutations = {
    ...active.mutations,
    ...removed.mutations,
}

const guideTourObjectsModule = {
    state,
    mutations,
    actions,
    getters
}
export default guideTourObjectsModule;
