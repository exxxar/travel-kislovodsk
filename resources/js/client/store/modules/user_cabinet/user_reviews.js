
import util from "./../utilites";

const BASE_USER_REVIEWS_LINK = '/api/user-cabinet/reviews'


let state = {
    user_reviews: [],
    user_paginate_object: [],
}

const getters = {
    getUserReviews: state => state.user_reviews || [],
    getUserReviewsByTourId: (state) => (tourId) => {
        return state.user_reviews.find(item => item.tour_id === tourId)
    },
    getUserReviewsByUserId: (state) => (userId) => {
        return state.user_reviews.filter(item => item.user_id === userId)
    },
    getUserReviewsByTourGuideId: (state) => (tourGuideId) => {
        return state.user_reviews.filter(item => item.tour_guide_id === tourGuideId)
    },
    getUserReviewsPaginateObject: state => state.user_paginate_object || [],
}

const actions = {
    errorsUserReviews(context){
        context.commit('setUserReviews',
            !localStorage.getItem('travel_store_user_reviews') ?
                [] : JSON.parse(localStorage.getItem('travel_store_user_reviews')))

        context.commit('setUserReviewsPaginateObject',
            !localStorage.getItem('travel_store_user_reviews_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_user_reviews_paginate_object')))

    },
    async loadUserReviewDataWithAppends(context, payload) {

        let link = payload.url,
            method = payload.method ||'GET',
            data = payload.data || null

        let _axios = util.makeAxiosFactory(link, method, data)

        return await _axios.then((response) => {
            let dataObject = response.data
            context.commit('appendUserReviews', dataObject.data)
            delete dataObject.data
            context.commit('setUserReviewsPaginateObject', dataObject)

        }).catch(err => {
            context.dispatch("errorsUserReviews")
        })
    },
    async loadUserReviewData(context, payload) {

        let link = payload.url,
            method = payload.method ||'GET',
            data = payload.data || null

        let _axios = util.makeAxiosFactory(link, method, data)

        return await _axios.then((response) => {
            let dataObject = response.data
            context.commit('setUserReviews', dataObject.data)
            delete dataObject.data
            context.commit('setUserReviewsPaginateObject', dataObject)

        }).catch(err => {
            context.dispatch("errorsUserReviews")
        })
    },
    async loadUserReviewsByPage(context, payload = {page:0, size:12}){
        let page = payload.page || 0,
            size = payload.size || 12

        return context.dispatch("loadUserReviewData",{
            url:`${BASE_USER_REVIEWS_LINK}?page=${page}&size=${size}`
        })
    },
    async loadUserReviewsNext(context){
        let url = state
                .paginate_object
                .links
                .next || BASE_USER_REVIEWS_LINK

        return context.dispatch("loadUserReviewDataWithAppends",{
            url: url
        })
    },
    async loadUserReviewsByTour(context, id){
        return context.dispatch("loadUserReviewData",{
            url:`${BASE_USER_REVIEWS_LINK}/tour/${id}`
        })
    },
    async loadUserReviewByGuide(context, guideId){
        return context.dispatch("loadUserReviewData",{
            url:`${BASE_USER_REVIEWS_LINK}/guide/${guideId}`
        })
    },
    async addUserReview(context, review){

        return context.dispatch("loadUserReviewData",{
            url:`${BASE_USER_REVIEWS_LINK}`,
            method: 'POST',
            data: review

        })
    },
    async removeUserReview(context, reviewId){
        return context.dispatch("loadUserReviewData",{
            url:`${BASE_USER_REVIEWS_LINK}/${reviewId}`,
            method: 'DELETE'
        })
    },
}

const mutations = {
    setUserReviews(state, payload) {
        state.user_reviews = payload || [];
        localStorage.setItem('travel_store_user_reviews', JSON.stringify(payload));
    },
    appendUserReviews(state, payload) {
        state.user_reviews = [...state.user_reviews, ...payload] ;
        localStorage.setItem('travel_store_user_reviews', JSON.stringify(payload));
    },
    setUserReviewsPaginateObject(state, payload) {
        state.paginate_object = payload || [];
        localStorage.setItem('travel_store_user_reviews_paginate_object', JSON.stringify(payload));
    }
}

const reviewsModule = {
    state,
    mutations,
    actions,
    getters
}
export default reviewsModule;
