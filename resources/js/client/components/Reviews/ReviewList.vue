<template>
    <div class="dt-reviews">
        <ReviewCounter :tour="tour"></ReviewCounter>
        <div class="dt-reviews__content">
            <ReviewCard v-for="(item, i) in reviews" :key="i" :item="item"></ReviewCard>
            <a v-if="canLoadMore" @click="loadNextReviews" class="align-items-center d-flex dt-btn dt-btn--height-50 dt-btn-blue
                    justify-content-center w-100">
                <span>Показать еще</span>
                <div class="dt-btn__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%"
                         viewBox="0 0 48 48" fill="#ffffff">
                        <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                    </svg>
                </div>
            </a>
        </div>
    </div>
</template>

<script>
import ReviewCard from "@/components/Reviews/ReviewCard.vue";
import ReviewCounter from "@/components/Reviews/ReviewCounter.vue";


import {mapGetters} from 'vuex';

export default {
    props: ["tour"],
    components: {
        ReviewCard,
        ReviewCounter,
    },
    data() {
        return {
            reviews: []

        }
    },
    computed: {
        ...mapGetters(['getReviewsByTourId', 'getReviews', 'getReviewsPaginateObject']),
        canLoadMore() {
            if (this.getReviewsPaginateObject.length===0)
                return false;

            return this.getReviewsPaginateObject.links.next != null || false
        }
    },
    mounted() {

        this.loadTourCategories().then(() => {
            this.reviews = this.getReviews;
            console.log("obj",this.getReviewsPaginateObject)
        })
    },
    methods: {
        loadTourCategories() {
            return this.$store.dispatch("loadReviewsByTour", this.tour.id)
        },
        loadNextReviews(){
            return this.$store.dispatch("loadReviewsNext").then(()=>{
                this.reviews = this.getReviews;
            })
        }
    }
}
</script>


<style scoped>

</style>
