import {createStore} from 'vuex'
import auth from './modules/auth';
import tours from './modules/tours';
import reviews from './modules/reviews';
import favorites from './modules/favorites';
import dictionaries from './modules/dictionaries';
import categories from './modules/tour-categories';
import bookings from './modules/bookings';
import chats from './modules/chats';
import transactions from './modules/transactions';
import guideCabinet from './modules/guide_cabinet';
import userCabinet from './modules/user_cabinet';
import util from "./modules/utilites";

const BASE_API_LINK = "/api"

export default createStore({
    state: {
        errors: [],
    },
    getters: {
        getErrors: state => state.errors || [],
    },
    actions: {
        async requestEmailVerify(context){
            let _axios = util.makeAxiosFactory(`/email/verification-notification`, 'POST')
            return _axios.then((response) => {
                return response
            }).catch(err => {
                context.commit("setErrors", err.response.data.errors || [])
                return Promise.reject(err);
            })
        },
        async sendQuestionForm(context, form) {
            let _axios = util.makeAxiosFactory(`${BASE_API_LINK}/send-question`, 'POST', form)

            return _axios.then((response) => {
                return response
            }).catch(err => {

                context.commit("setErrors", err.response.data.errors || [])
                return Promise.reject(err);
            })
        },
        async sendMCHSGroupForm(context, form) {
            let _axios = util.makeAxiosFactory(`${BASE_API_LINK}/send-mchs-form`, 'POST', form)

            return _axios.then((response) => {
                return response
            }).catch(err => {

                context.commit("setErrors", err.response.data.errors || [])
                return Promise.reject(err);
            })
        }
    },
    mutations: {
        setErrors(state, payload) {
            state.errors = payload || [];
        },
    },
    modules: {
        auth,
        tours,
        favorites,
        dictionaries,
        categories,
        bookings,
        chats,
        transactions,
        reviews,
        guideCabinet,
        userCabinet
    }
})
