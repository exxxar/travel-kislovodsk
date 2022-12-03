<template>
    <div class="personal-account-reviews">
        <div class="personal-account-reviews__card dt-reviews__content dt-page" v-if="user_reviews.length">
          <personal-review-card-component v-for="item in user_reviews" :review="item"/>
        </div>

        <div class="personal-account-reviews__card dt-reviews__content dt-page row d-flex justify-content-center" v-else>
            <div class="col col-12 col-md-6">
                <div class="empty-list">
                    <img v-lazy="'/img/no-tour.jpg'" alt="">
                    <p>По данному фильтру ничего не найдено:(</p>
                </div>
            </div>
        </div>


    </div>
</template>
<script>

import {mapGetters} from "vuex";

export default {
    components: {

    },

    computed: {
        ...mapGetters(['getUserReviews']),
    },
    data: () => ({
        user_reviews: []
    }),
    mounted() {
        console.log("loadUserReviewsByPage")
        this.loadUserReviewsByPage()
    },
    methods: {
        loadUserReviewsByPage() {
            console.log("loadUserReviewsByPage 1")
            return this.$store.dispatch("loadUserReviewsByPage").then(() => {
                console.log("loadGuideTransactionsByPage 2")
                this.user_reviews = this.getUserReviews
            })
        }
    }
}

</script>

<style scoped>

</style>
