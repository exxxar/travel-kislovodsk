
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
        })
    },
    async loadReviewsAll(context){
        return context.dispatch("loadReviewData",{
            url:`${BASE_REVIEWS_LINK}`
        })
    },
    async loadReviewsNext(context){
        let url = state
                .paginate_object
                .links
                .next || BASE_REVIEWS_LINK

        return context.dispatch("loadReviewDataWithAppends",{
            url: url
        })
    },
    async loadReviewsByTour(context, id){
        return context.dispatch("loadReviewData",{
            url:`${BASE_REVIEWS_LINK}/tour/${id}`
        })
    },
    async loadReviewByGuide(context, guideId){
        return context.dispatch("loadReviewData",{
            url:`${BASE_REVIEWS_LINK}/guide/${guideId}`
        })
    },
    async addReview(context, review){

        return context.dispatch("loadReviewData",{
            url:`${BASE_REVIEWS_LINK}`,
            method: 'POST',
            data: review

        })
    },
    async removeReview(context, reviewId){
        return context.dispatch("loadReviewData",{
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
