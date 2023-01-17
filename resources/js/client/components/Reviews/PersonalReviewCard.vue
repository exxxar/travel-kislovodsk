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
                <div class="dt-photos__item" v-for="(item, index) in review.images">
                    <img
                        data-bs-toggle="modal"
                        :data-bs-target="'#comment-image-modal'+item.id+'-'+index"
                        v-lazy="item">

                    <image-modal-dialog-component :id="'comment-image-modal'+item.id+'-'+index" :url="item"/>

                </div>

            </div>
            <div class="dt-review__footer" v-if="user.id===review.user_id">
                <button
                    data-bs-toggle="modal"
                    :data-bs-target="'#removeReviewModalDialog'+review.id"
                    class="btn btn-danger p-2" style="min-width: 200px;">
                    <span v-if="!load" class="text-white">Удалить отзыв</span>
                    <div v-if="load" class="spinner-border text-white" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </button>
            </div>
        </div>
    </div>

    <action-modal-dialog-component
        :id="'removeReviewModalDialog'+review.id"
        v-on:accept="removeReview">
        <template v-slot:head>
            <p>Диалог удаления отзыва</p>
        </template>

        <template v-slot:body>
            <p>Вы действтельно хотите удалить отзыв "{{ review.comment || 'Нет текста' }}"?</p>
        </template>
    </action-modal-dialog-component>
</template>
<script>
export default {
    props:["review"],
    data(){
       return {
           load:false,
       }
    },
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
            this.load = true
            this.$store.dispatch("removeReview", this.review.id).then(()=>{
                this.load = false
                this.eventBus.emit("request_reload_reviews")
                this.$notify({
                    title: "Удаление отзыва",
                    text: "Отзыв успешно удален",
                    type: 'success'
                });
            }).catch(()=>{
                this.load = false
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
