import axios from 'axios';

import tours from './admin_tours'
import users from './admin_users'
import tourObjects from './admin_tour_object'

import util from "../utilites";

const BASE_ADMIN_CABINET_LINK = '/api/guide-cabinet'

let state = {
    ...tours.state,
    ...users.state,
    ...tourObjects.state,
}

const getters = {
    ...users.getters,
    ...tours.getters,
    ...tourObjects.getters,
}

const actions = {
    ...users.actions,
    ...tours.actions,
    ...tourObjects.actions
}

const mutations = {
    ...users.mutations,
    ...tours.mutations,
    ...tourObjects.mutations,
}

const adminCabinetModule = {
    state,
    mutations,
    actions,
    getters
}
export default adminCabinetModule;
