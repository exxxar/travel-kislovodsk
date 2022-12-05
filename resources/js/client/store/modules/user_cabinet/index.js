import axios from 'axios';

import userTours from './user_tours'
import userTransactions from './user_transactions'
import userReviews from './user_reviews'
import util from "../utilites";

const BASE_USER_CABINET_LINK = '/api/user-cabinet'

let state = {
...userTours.state,
...userTransactions.state,
...userReviews.state,
}

const getters = {
    ...userTours.getters,
    ...userTransactions.getters,
    ...userReviews.getters,
}

const actions = {
    ...userTours.actions,
    ...userTransactions.actions,
    ...userReviews.actions,
    async updateUserAccounting(context, accountingObject) {
        let _axios = util.makeAxiosFactory(`${BASE_USER_CABINET_LINK}/account`, 'POST', accountingObject)

        return _axios.then((response) => {

        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },

    async updateUserProfile(context, profileObject) {
        let _axios = util.makeAxiosFactory(`${BASE_USER_CABINET_LINK}/profile`, 'POST', profileObject)

        return _axios.then((response) => {

        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async updateUserPassword(context, profileObject) {
        let _axios = util.makeAxiosFactory(`${BASE_USER_CABINET_LINK}/password`, 'POST', profileObject)

        return _axios.then((response) => {

        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async addUserImage(context, formData) {

        return axios.post(`${BASE_USER_CABINET_LINK}/upload-image`, formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then((response) => {

        }).catch(err => {
            context.commit("setErrors", err.response.data.errors || [])
            context.dispatch("errorUserCabinet")
            return Promise.reject(err);

        })
    },
}

const mutations = {
    ...userTours.mutations,
    ...userTransactions.mutations,
    ...userReviews.mutations,
}

const userCabinetModule = {
    state,
    mutations,
    actions,
    getters
}
export default userCabinetModule;
