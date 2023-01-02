<template>
    <div class="dt-review__item d-flex">
        <div class="dt-review__block flex-grow-1">
            <div class="dt-review__header d-flex justify-content-between">
                <div class="dt-header__user">
                    <p class="dt-user__date-ago fw-thin text-muted">{{ moment(review.created_at).format('YYYY-MM-DD H:m:s')}}</p>
                    <div class="dt-user__name fw-semibold">
                        <div class="personal-account-transactions-card-body__text">
                                                <span class="personal-account-transactions-card-body__text_grey">
                                                   отзыв к
                                                </span>
                            <div class="personal-account-transactions-card-body__text_blue" v-if="review.tour">
                                <a :href="'/tour/'+review.tour.id"> {{review.tour.title || 'Без названия'}}</a>
                            </div>
                            <div class="personal-account-transactions-card-body__text_blue" v-if="review.guide">
                                <a :href="'/guide/'+review.guide.id"> {{review.guide.name || 'Без названия'}}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dt-rating__star w-auto d-flex">
                    <strong>{{review.rating}}</strong> <rating-component :rating="review.rating"/>
                </div>
            </div>
            <p class="dt-review__description dt-main-text-thin" v-html="review.comment">

            </p>
            <div class="dt-review__photos" v-if="review.images.length>0">
                <div class="dt-photos__item" v-for="item in review.images">
                    <img v-lazy="item">
                </div>

            </div>
            <div class="dt-review__footer" v-if="user.id===review.user_id">
                <button
                    @click="removeReview"
                    class="btn btn-outline-danger">Удалить отзыв</button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:["review"],
    computed: {
        user() {
            return window.user
        },
        moment() {
            return window.moment
        }
    },
    methods:{
        removeReview(){
            this.$store.dispatch("removeReview", this.review.id).then(()=>{
                this.eventBus.emit("request_reload_reviews")
                this.$notify({
                    title: "Удаление отзыва",
                    text: "Отзыв успешно удален",
                    type: 'success'
                });
            })
        }
    }
}
</script>
<style lang="scss">
    .dt-review__footer {
        width: 100%;
        padding: 10px 0px;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 50px;
    }
</style>
