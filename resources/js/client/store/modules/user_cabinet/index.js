import axios from 'axios';

import userTours from 'user_tours'
import userTransactions from './user_transactions'

const BASE_USER_CABINET_LINK = '/api/user-cabinet'

let state = {
...userTours.state,
...userTransactions.state,
}

const getters = {
    ...userTours.getters,
    ...userTransactions.getters,
}

const actions = {
    ...userTours.actions,
    ...userTransactions.actions,
}

const mutations = {
    ...userTours.mutations,
    ...userTransactions.mutations,
}

const userCabinetModule = {
    state,
    mutations,
    actions,
    getters
}
export default userCabinetModule;
