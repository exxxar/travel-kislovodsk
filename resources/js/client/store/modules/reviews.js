
import util from "./utilites";

const BASE_REVIEWS_LINK = '/api/reviews'


let state = {
    reviews: [],
    paginate_object: [],
}

const getters = {
    getReviews: state => state.reviews || [],
    getReviewsByTourId: (state) => (tourId) => {
        return state.reviews.find(item => item.tour_id === tourId)
    },
    getReviewsByUserId: (state) => (userId) => {
        return state.reviews.filter(item => item.user_id === userId)
    },
    getReviewsByTourGuideId: (state) => (tourGuideId) => {
        return state.reviews.filter(item => item.tour_guide_id === tourGuideId)
    },
    getReviewsPaginateObject: state => state.paginate_object || [],
}

const actions = {
    errorsReviews(context){
        context.commit('setReviews',
            !localStorage.getItem('travel_store_reviews') ?
                [] : JSON.parse(localStorage.getItem('travel_store_reviews')))

        context.commit('setReviewsPaginateObject',
            !localStorage.getItem('travel_store_reviews_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_reviews_paginate_object')))

    },
    async loadReviewDataWithAppends(context, payload) {

        let link = payload.url,
            method = payload.method ||'GET',
            data = payload.data || null

        let _axios = util.makeAxiosFactory(link, method, data)

        return await _axios.then((response) => {
            let dataObject = response.data
            context.commit('appendReviews', dataObject.data)
            delete dataObject.data
            context.commit('setReviewsPaginateObject', dataObject)

        }).catch(err => {
            context.dispatch("errorsReviews")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async loadReviewData(context, payload) {

        let link = payload.url,
            method = payload.method ||'GET',
            data = payload.data || null

        let _axios = util.makeAxiosFactory(link, method, data)

        return await _axios.then((response) => {
            let dataObject = response.data
            context.commit('setReviews', dataObject.data)
            delete dataObject.data
            context.commit('setReviewsPaginateObject', dataObject)

        }).catch(err => {
            context.dispatch("errorsReviews")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async loadReviewsAll(context){
        return await context.dispatch("loadReviewData",{
            url:`${BASE_REVIEWS_LINK}`
        })
    },
    async loadReviewsNext(context, payload = {sort:null, direction:'ASC'}){
        let url = state
                .paginate_object
                .links
                .next || BASE_REVIEWS_LINK

        return await context.dispatch("loadReviewDataWithAppends",{
            url: `${url}?sort=${payload.sort}&direction=${payload.direction}`
        })
    },
    async loadReviewsByTour(context, payload = {tourId:null, sort:null, direction:'ASC'}){
        return await context.dispatch("loadReviewData",{
            url:`${BASE_REVIEWS_LINK}/tour/${payload.tourId}?sort=${payload.sort}&direction=${payload.direction}`
        })
    },
    async loadReviewByGuide(context, guideId){
        return await context.dispatch("loadReviewData",{
            url:`${BASE_REVIEWS_LINK}/guide/${guideId}`
        })
    },
    async addReview(context, review){
        return await context.dispatch("loadReviewData",{
            url:`${BASE_REVIEWS_LINK}`,
            method: 'POST',
            data: review
        })
    },
    async removeReview(context, reviewId){
        return await context.dispatch("loadReviewData",{
            url:`${BASE_REVIEWS_LINK}/${reviewId}`,
            method: 'DELETE'
        })
    },
}

const mutations = {
    setReviews(state, payload) {
        state.reviews = payload || [];
        localStorage.setItem('travel_store_reviews', JSON.stringify(payload));
    },
    appendReviews(state, payload) {
        state.reviews = [...state.reviews, ...payload] ;
        localStorage.setItem('travel_store_reviews', JSON.stringify(payload));
    },
    setReviewsPaginateObject(state, payload) {
        state.paginate_object = payload || [];
        localStorage.setItem('travel_store_reviews_paginate_object', JSON.stringify(payload));
    }
}

const reviewsModule = {
    state,
    mutations,
    actions,
    getters
}
export default reviewsModule;
