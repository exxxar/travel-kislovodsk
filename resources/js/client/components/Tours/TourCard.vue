<template>

    <div class="card dt-travel-card" v-if="tour">
        <div class="card-header bg-white p-0 position-relative">
            <div class="card-img" >
                <a :href="'/tour/'+tour.id"  class="dt-wrapper-gradient position-absolute"></a>
                <h5 class="dt-excursion-type">{{ tour.tour_type }}</h5>
                <div class="dt-like d-flex align-items-center justify-content-center"
                     v-bind:class="{'right-60':!user.is_guest}"
                     v-if="tour.is_hot"
                >
                    <i class="fa-solid fa-fire-flame-curved" style="color:red;"></i>

                </div>
                <div class="dt-like d-flex align-items-center justify-content-center"
                     v-if="!user.is_guest"
                     @click="addToFavorites"
                >
                    <svg v-if="!tour.is_liked" xmlns="http://www.w3.org/2000/svg" height="18" width="18"
                         viewBox="0 0 50 50" overflow="visible">
                        <path
                            d="m23.95 42.9-2.5-2.25q-5.4-4.95-8.9-8.525t-5.575-6.4q-2.075-2.825-2.9-5.15-.825-2.325-.825-4.725 0-4.8 3.225-8.05Q9.7 4.55 14.45 4.55q2.85 0 5.25 1.275t4.25 3.725q2.2-2.6 4.5-3.8 2.3-1.2 5-1.2 4.8 0 8.05 3.25 3.25 3.25 3.25 8.05 0 2.4-.825 4.7-.825 2.3-2.9 5.125t-5.6 6.425q-3.525 3.6-8.875 8.55Zm0-5.2q5.05-4.65 8.3-7.95 3.25-3.3 5.15-5.75 1.9-2.45 2.625-4.375.725-1.925.725-3.775 0-3.2-2.025-5.25T33.5 8.55q-2.5 0-4.65 1.575-2.15 1.575-3.5 4.425H22.6q-1.3-2.8-3.475-4.4-2.175-1.6-4.675-1.6-3.15 0-5.175 2.05T7.25 15.85q0 1.9.75 3.85.75 1.95 2.65 4.45t5.15 5.75q3.25 3.25 8.15 7.8Zm.1-14.6Z"/>
                    </svg>
                    <svg v-if="tour.is_liked" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                         fill="currentColor" class="bi bi-heart-fill opacity-1" viewBox="0 0 16 16">
                        <path fill="red" fill-rule="evenodd"
                              d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                    </svg>

                </div>
                <img class="dt-excursion__image" v-lazy="tour.preview_image" alt="">

                <div v-if="tour.payment != null"
                     class="dt-price d-flex justify-content-between position-absolute w-100 align-items-end">
                    <h5 class="align-items-end d-flex dt-price__sum text-white">
                        <span class="dt-price__title text-uppercase text-muted-white me-2s">
                                                        {{ tour.payment ? 'оплачено' : 'ожидание оплаты' }}
                                                    </span>
                        <span class="fw-bold text-white me-2">{{ tour.pricePayment }} руб.</span>
                        <span class="dt-price__title text-uppercase text-muted-white">
                                                        {{ tour.payment ? 'за 3 чел.' : '' }}
                                                    </span>
                    </h5>
                </div>
                <div v-else class="dt-price d-flex justify-content-between position-absolute w-100 align-items-end">
                    <h5 class="align-items-end d-flex dt-price__sum text-white">
                        <a :href="'/tour/'+tour.id" class="fw-bold text-white me-2">{{ tour.base_price }} руб.</a>
                        <span class="dt-price__title text-uppercase text-muted-white d-lg-block d-md-block d-none">
                                                        за человека
                                                    </span>
                        <span class="dt-price__title text-uppercase text-muted-white d-block d-md-none">
                                                        за чел.
                                                    </span>
                    </h5>
                    <h5 class="dt-price__time text-uppercase text-muted-white">{{ tour.time }}</h5>
                </div>
            </div>
        </div>
        <div class="card-body bg-white">
            <div class="card-body__excursion-rating d-flex justify-content-between">
                <div class="dt-rating d-flex">
                    <h5 class="dt-rating__title text-muted-black me-2">
                        рейтинг экскурсии
                    </h5>
                    <h5 class="fw-bold color-black">{{ tour.rating }}</h5>
                </div>
                <div class="dt-rating__star d-flex">
                    <img v-lazy="tour.rating>=1?'/img/icons/star_blue.svg':'/img/icons/star_grey.svg'" alt="">
                    <img v-lazy="tour.rating>=2?'/img/icons/star_blue.svg':'/img/icons/star_grey.svg'" alt="">
                    <img v-lazy="tour.rating>=3?'/img/icons/star_blue.svg':'/img/icons/star_grey.svg'" alt="">
                    <img v-lazy="tour.rating>=4?'/img/icons/star_blue.svg':'/img/icons/star_grey.svg'" alt="">
                    <img v-lazy="tour.rating>=5?'/img/icons/star_blue.svg':'/img/icons/star_grey.svg'" alt="">
                </div>
            </div>
            <div class="card-body__excursion">
                <a :href="'/tour/'+tour.id" class="card-body__excursion-name">
                    <h4 class="fw-bold">{{ tour.title }}</h4>
                </a>
                <div class="card-body__excursion-description fw-light">
                    <h5>{{ tour.short_description }}</h5>
                </div>
            </div>
            <div v-if="tour.dateEnd && tour.finish" class="card-body__excursion-date d-flex justify-content-between">
                <div class="dt-calendar d-flex align-items-center">
                    <img v-lazy="'/img/icons/calendar_today_FILL0_wght400_GRAD0_opsz48_blue.svg'"
                         alt="calendar" style="width: 18px; height: 16px" class="me-2">
                    <h5 class="text-muted-black d-lg-block d-md-block d-none">дата окончания</h5>
                    <h5 class="text-muted-black d-block d-md-none">дата оконч.</h5>
                </div>
                <h5 class="fw-bold">{{ tour.date }}</h5>
            </div>
            <div v-if="!tour.dateStart && !tour.finish"
                 class="card-body__excursion-date d-flex justify-content-between">
                <div class="dt-calendar d-flex align-items-center">
                    <img v-lazy="'/img/icons/calendar_today_FILL0_wght400_GRAD0_opsz48_blue.svg'"
                         alt="calendar" style="width: 18px; height: 16px" class="me-2">
                    <h5 class="text-muted-black d-lg-block d-md-block d-none">ближайшая
                        дата</h5>
                    <h5 class="text-muted-black d-block d-md-none">ближ. дата</h5>
                </div>
                <h5 class="fw-bold" v-if="tour.schedules">
                    <span v-if="tour.schedules.length>0">
                          {{ tour.schedules[0].start_day || 'Не указано' }}
                    </span>

                </h5>
                <h5 class="fw-bold" v-else>Не указан</h5>

            </div>

            <div v-if="tour.dateStart && !tour.finish" class="position-relative personal-account-orders-info card-body__excursion-date
                        d-flex justify-content-between">
                <div class="dt-wrapper--black-50"></div>
                <div class="personal-account-orders-info__item dt-calendar d-flex align-items-center">
                    <img class="personal-account-orders-info__img me-2"
                         v-lazy="'/img/icons/calendar_today_FILL0_wght400_GRAD0_opsz48_blue.svg'"
                         alt="calendar" style="width: 18px; height: 16px">
                    <h5 class="personal-account-orders-info__text d-lg-block d-md-block"
                        :class="{'dt-text-muted--white-50': !tour.payment}">
                        <div class="personal-account-orders-info__text_grey">
                            дата начала
                        </div>
                        {{ tour.dateStart }}
                    </h5>
                </div>
                <div class="personal-account-orders-info__item dt-calendar d-flex align-items-center">

                    <h5 class="personal-account-orders-info__text d-lg-block d-md-block">
                        <div class="personal-account-orders-info__text_grey">
                            место встречи
                        </div>
                        {{ tour.start_address }}
                    </h5>
                </div>
            </div>
        </div>
        <div class="card-footer bg-white text-center">

            <div class="card-footer__actions d-flex justify-content-around">
                <a :href="'/tour/'+tour.id" class="text-uppercase dt-travel-card__action">
                    <h6 class="dt-btn-text">Подробнее</h6>
                </a>
            </div>


            <!--            <a v-if="tour.complete && tour.finish" href="#" class="mt-4 personal-account-orders-completed-footer__link
                            personal-account-orders-completed-footer__link_blue">
                            Поставить оценку
                        </a>
                        <a v-if="tour.review && tour.finish" href="#" class="mt-4 personal-account-orders-completed-footer__link
                            personal-account-orders-completed-footer__link_grey">
                            Смотреть мой отзыв
                        </a>-->
        </div>
    </div>
</template>
<script>
export default {
    props: {
        tour: {
            type: Object,
            default: {}
        }
    },
    computed: {
        user() {
            return window.user
        }
    },
    tour() {
        return {}
    },
    methods: {
        addToFavorites() {
            if (this.tour.is_liked)
                this.$store.dispatch("removeFavorite", this.tour.id)
            else {
                this.$store.dispatch("addToFavorites", this.tour.id)
                this.eventBus.emit("like_notification")
            }


            this.tour.is_liked = !this.tour.is_liked
        }
    }
}
</script>
<style>
.right-60 {
    right: 60px !important;
}
</style>
