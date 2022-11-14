
import util from "./utilites";

const BASE_REVIEWS_LINK = '/api/reviews'


let state = {
    reviews: [],
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
    }
}

const actions = {
    errorsReviews({commit}){
        commit('setReviews',
            !localStorage.getItem('travel_store_reviews') ?
                [] : JSON.parse(localStorage.getItem('travel_store_reviews')))
    },
    async loadReviewData({commit}, link, method = 'GET', data = null) {
        let _axios = util.makeAxiosFactory(link, method, data)

        return await _axios.then((response) => {
            let dataObject = response.data
            commit('setReviews', dataObject.data)

        }).catch(err => {
            this.errorsReviews(commit)
        })
    },
    async loadReviewsAll({commit}){
        return this.loadReviewData(commit,`${BASE_REVIEWS_LINK}`)
    },
    async loadReviewsByTour({commit}){
       return this.loadReviewData(commit,`${BASE_REVIEWS_LINK}/tour/${id}`)
    },
    async loadReviewByGuide({commit}){
        return this.loadReviewData(commit,`${BASE_REVIEWS_LINK}/guide/${id}`)
    },
    async addReview({commit}, review){
        return this.loadReviewData(commit,`${BASE_REVIEWS_LINK}`,'POST', review)
    },
    async removeReview({commit}, reviewId){
        return this.loadReviewData(commit,`${BASE_REVIEWS_LINK}/${reviewId}`,'DELETE')
    },
}

const mutations = {
    setReviews(state, payload) {
        state.favorites = payload.data || [];
        localStorage.setItem('travel_store_favorites', JSON.stringify(payload));
    },
}

const reviewsModule = {
    state,
    mutations,
    actions,
    getters
}
export default reviewsModule;
