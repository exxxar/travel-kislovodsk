import axios from 'axios';

import userTours from './user_tours'
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
    async changeUserPassword({commit}, password) {
        return axios.post(`${BASE_USER_CABINET_LINK}/change-password`, {
            password: password
        }).then((response) => {

        }).catch(err => {

        })
    },
    async uploadUserProfilePhoto({commit}, formData) {
        return axios.post(`${BASE_USER_CABINET_LINK}/upload-profile-photo`, formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then((response) => {

        }).catch(err => {

        })
    },
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
