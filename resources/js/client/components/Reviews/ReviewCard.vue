<template>
    <div class="dt-review__item d-flex">
        <div class="dt-review__avatar">
            <img v-if="item.user_photo !== ''" v-lazy="item.user_photo" alt="">
            <svg v-else xmlns="http://www.w3.org/2000/svg" height="100%" width="100%" viewBox="0 0 48 48"
                 fill="#22242566">
                <path
                    d="M17.8 28.9q-1.15 0-1.95-.8t-.8-1.95q0-1.2.8-1.975.8-.775 1.95-.775 1.2 0 1.975.8.775.8.775 1.95 0 1.2-.8 1.975-.8.775-1.95.775Zm12.45 0q-1.2 0-1.975-.8-.775-.8-.775-1.95 0-1.2.8-1.975.8-.775 1.95-.775t1.95.8q.8.8.8 1.95 0 1.2-.8 1.975-.8.775-1.95.775ZM24 40.75q7 0 11.875-4.875T40.75 24q0-1.3-.2-2.5t-.5-2.25q-1 .3-2.125.375-1.125.075-2.375.075-4.8 0-9.05-1.95-4.25-1.95-7.3-5.6-1.65 3.95-4.775 6.925Q11.3 22.05 7.3 23.7v.35q0 7 4.85 11.85T24 40.75Zm0 3.95q-4.25 0-8.025-1.625-3.775-1.625-6.6-4.425-2.825-2.8-4.45-6.575Q3.3 28.3 3.3 24q0-4.3 1.625-8.075Q6.55 12.15 9.375 9.35q2.825-2.8 6.6-4.45 3.775-1.65 8.075-1.65 4.3 0 8.05 1.65 3.75 1.65 6.55 4.45 2.8 2.8 4.45 6.575Q44.75 19.7 44.75 24q0 4.3-1.625 8.075-1.625 3.775-4.45 6.575-2.825 2.8-6.6 4.425Q28.3 44.7 24 44.7ZM19.4 7.65q4.4 5.15 8.125 7.05 3.725 1.9 8.175 1.9 1.2 0 1.9-.05t1.55-.3Q36.9 12.2 33.025 9.6 29.15 7 24 7q-1.35 0-2.55.2-1.2.2-2.05.45ZM7.45 20.1q2.4-.9 5.475-4.075Q16 12.85 17.3 8.35q-4.35 1.95-6.575 4.975Q8.5 16.35 7.45 20.1ZM19.4 7.65Zm-2.1.7Z"/>
            </svg>
        </div>
        <div class="dt-review__header d-lg-none d-block">
            <div class="dt-header__user">
                <p class="dt-user__date-ago fw-thin text-muted">{{
                        moment(item.created_at).format('YYYY-MM-DD H:m:s')
                    }}</p>
                <p class="dt-user__name fw-semibold">{{ item.user_name }}</p>
            </div>
            <div class="dt-rating__star w-auto d-flex">
                <rating-component :rating="item.rating"/>
            </div>
        </div>
        <div class="dt-review__block flex-grow-1 w-100">
            <div class="dt-review__header d-lg-block d-none">
                <div class="dt-header__user">
                    <p class="dt-user__date-ago fw-thin text-muted">
                        {{ moment(item.created_at).format('YYYY-MM-DD H:m:s') }}
                        <span class="ps-2" v-if="item.user_id===user.id" @click="removeReview(item.id)">
                            <i class="fa-solid fa-trash-can blue"></i>
                        </span>
                    </p>
                    <p class="dt-user__name fw-semibold">{{ item.user_name }}</p>
                </div>
                <div class="dt-rating__star w-auto d-flex">
                    <rating-component :rating="item.rating"/>
                </div>
            </div>
            <p class="dt-review__description dt-main-text-thin">
                {{ item.comment || 'Нет комментария' }}
            </p>
            <div v-if="item.images.length !== 0" class="dt-form dt-review__photos d-flex flex-nowrap overflow-auto pb-3">
                <div v-for="(photo, i) in item.images" data-bs-toggle="modal"
                     :data-bs-target="'#comment-image-modal'+item.id+'-'+i" :key="i" class="dt-photos__item p-0 col-2">
                    <img v-lazy="photo"/>
                    <image-modal-dialog-component :id="'comment-image-modal'+item.id+'-'+i" :url="photo"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {

    props: {
        item: {
            type: Object,
            default: {}
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
        removeReview(reviewId){
            this.$store.dispatch("removeReview", reviewId).then(()=>{

                console.log("removeReview")
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

<style scoped>

</style>
