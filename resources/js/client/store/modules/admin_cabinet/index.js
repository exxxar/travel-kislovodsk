import axios from 'axios';

import tours from './admin_tours'
import users from './admin_users'
import tourObjects from './admin_tour_object'
import transactions from './admin_transactions'

import util from "../utilites";

const BASE_ADMIN_CABINET_LINK = '/api/admin-cabinet'

let state = {
    ...tours.state,
    ...users.state,
    ...tourObjects.state,
    ...transactions.state,
}

const getters = {
    ...users.getters,
    ...tours.getters,
    ...tourObjects.getters,
    ...transactions.getters,
}

const actions = {
    ...users.actions,
    ...tours.actions,
    ...tourObjects.actions,
    ...transactions.actions
}

const mutations = {
    ...users.mutations,
    ...tours.mutations,
    ...tourObjects.mutations,
    ...transactions.mutations,
}

const adminCabinetModule = {
    state,
    mutations,
    actions,
    getters
}
export default adminCabinetModule;
