<template>
    <main class="wrapper mt-2rem">
        <div class="dt-page dt-page__preheader">
            <div class="container dt-preheader__content w-100 h-100 text-center">
                <div class="row">
                    <div class="col-lg-2">

                    </div>
                    <div class="col-lg-8">
                        <breadcrumbs :items="breadcrumbs"
                                     class="d-flex justify-content-center breadcrumbs__links-white"/>
                        <div class="dt-preheader__actions">

                        </div>
                        <p class="dt-preheader__title">{{ tour.title || 'Без заголовка' }}</p>
                        <div class="dt-preheader__tags">
                            <ul class="d-flex dt-tags__list gap-1 justify-content-center w-auto">
                                <li class="dt-tag__item" v-for="item in tour.tour_categories">{{ item.title }}</li>
                            </ul>
                        </div>
                        <div class="curved">
                            <img v-lazy="'/img/curved_strip.png'" alt="">
                        </div>
                        <p class="dt-preheader__description">
                            {{ tour.short_description || 'Нет описания' }}
                        </p>
                        <div class="dt-preheader__photos justify-content-center overflow-auto flex-nowrap pb-1">
                            <div class="dt-photos__item col-2" data-bs-toggle="modal"
                                 :data-bs-target="'#image-modal'+index" v-for="(item, index) in tour.images.slice(0,6)">
                                <img v-lazy="item" alt="">
                                <image-modal-dialog-component :id="'image-modal'+index" :url="item"/>
                            </div>

                            <div class="dt-photos__item dt-photos__item--placeholder" v-if="tour.images.length>6">
                                <div class="dt-item__placeholder">
                                    <span>+{{ tour.images.length - 6 }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="dt-preheader__view-reviews d-flex justify-content-center">
                            <p class="dt-btn-text text-uppercase text-white me-lg-3">Смотреть отзывы (8)</p>
                            <div class="dt-rating__star d-flex">
                                <rating-component :rating="tour.rating"/>
                                <p class="dt-rating__text fw-bold text-white">{{ tour.rating }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">

                    </div>
                </div>
            </div>
        </div>
        <div class="container dt-page dt-page-excursion dt-page__content-tour">
            <div class="dt-header__detail d-flex dt-top-info-block--three-input">
                <div class="dt-input__wrapper">
                    <div class="dt-input__group bg-white">
                        <div class="d-flex flex-wrap flex-fill">
                            <label class="dt-label fw-thin">длительность</label>
                            <input type="text" name="name" class="dt-input fw-semibold" autocomplete="off"
                                   :value="tour.duration||'Не установлено'" disabled="">
                        </div>
                        <div class="dt-input__group-item">
                            <div class="dt-input__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%" viewBox="0 0 48 48"
                                     fill="#0071eb">
                                    <path
                                        d="m31.05 33.75 2.7-2.65-7.8-7.9v-9.75h-3.6V24.7ZM24 44.7q-4.25 0-8.025-1.625-3.775-1.625-6.6-4.45Q6.55 35.8 4.925 32.05T3.3 24q0-4.25 1.625-8.025 1.625-3.775 4.45-6.6Q12.2 6.55 15.975 4.9 19.75 3.25 24 3.25t8.025 1.65q3.775 1.65 6.6 4.475 2.825 2.825 4.475 6.6Q44.75 19.75 44.75 24t-1.65 8.025q-1.65 3.775-4.475 6.6-2.825 2.825-6.575 4.45T24 44.7ZM24 24Zm0 16.75q6.9 0 11.825-4.9Q40.75 30.95 40.75 24q0-6.9-4.925-11.825Q30.9 7.25 24 7.25q-6.9 0-11.825 4.925Q7.25 17.1 7.25 24q0 6.95 4.925 11.85Q17.1 40.75 24 40.75Z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dt-input__wrapper">
                    <div class="dt-input__group bg-white">
                        <div class="d-flex flex-wrap flex-fill">
                            <label class="dt-label fw-thin">город отправления</label>
                            <input type="text" name="name" class="dt-input fw-semibold" autocomplete="off"
                                   :value="tour.start_city||'Начальный город'" disabled="">
                        </div>
                        <div class="dt-input__group-item">
                            <div class="dt-input__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%" viewBox="0 0 48 48"
                                     fill="#0071eb">
                                    <path
                                        d="M25.45 42.7 19.7 27.9 4.9 22.15V19L43.1 4.5 28.6 42.7Zm1.45-7.1 9.3-24.2-24.15 9.35L22.8 24.8Zm-4.1-10.8Z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dt-input__wrapper">
                    <div class="dt-input__group bg-white">
                        <div class="d-flex flex-wrap flex-fill">
                            <label class="dt-label fw-thin">тип экскурсии</label>
                            <input type="text" name="name" class="dt-input fw-semibold" autocomplete="off"
                                   :value="tour.tour_type||'Нет типа тура'" disabled="">
                        </div>
                        <div class="dt-input__group-item">
                            <div class="dt-input__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%" viewBox="0 0 48 48"
                                     fill="#0071eb">
                                    <path
                                        d="M24 23.8q-3.45 0-5.625-2.175T16.2 16q0-3.45 2.175-5.625T24 8.2q3.45 0 5.625 2.175T31.8 16q0 3.45-2.175 5.625T24 23.8ZM7.7 40.45v-5q0-2 1-3.425 1-1.425 2.55-2.175 3.4-1.5 6.5-2.25t6.25-.75q3.15 0 6.225.775Q33.3 28.4 36.7 29.9q1.6.7 2.6 2.125t1 3.425v5Zm3.4-3.4h25.8V35.5q0-.8-.475-1.525-.475-.725-1.175-1.075-3.15-1.5-5.775-2.075Q26.85 30.25 24 30.25q-2.85 0-5.525.575Q15.8 31.4 12.7 32.9q-.7.35-1.15 1.075-.45.725-.45 1.525ZM24 20.4q1.9 0 3.15-1.25T28.4 16q0-1.9-1.25-3.15T24 11.6q-1.9 0-3.15 1.25T19.6 16q0 1.9 1.25 3.15T24 20.4Zm0-4.4Zm0 21.05Z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dt-input__wrapper">
                    <div class="dt-input__group bg-white">
                        <div class="d-flex flex-wrap flex-fill">
                            <label class="dt-label fw-thin">передвижение</label>
                            <input type="text" name="name" class="dt-input fw-semibold" autocomplete="off"
                                   :value="tour.movement_type||'Нет типа'" disabled="">
                        </div>
                        <div class="dt-input__group-item">
                            <div class="dt-input__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%" viewBox="0 0 48 48"
                                     fill="#0071eb">
                                    <path
                                        d="M17.45 42.5q-3.65 0-6.125-2.5T8.85 33.95V17.1q-1.75-.75-2.875-2.225T4.85 11.5q0-2.5 1.775-4.25T10.85 5.5q2.5 0 4.25 1.75t1.75 4.25q0 1.9-1.125 3.4t-2.875 2.2v16.85q0 1.9 1.3 3.225 1.3 1.325 3.3 1.325 2 0 3.275-1.325T22 33.95v-19.9q0-3.6 2.475-6.075T30.6 5.5q3.6 0 6.075 2.475t2.475 6.075V30.9q1.75.7 2.875 2.2 1.125 1.5 1.125 3.4 0 2.45-1.75 4.225-1.75 1.775-4.25 1.775-2.45 0-4.225-1.775Q31.15 38.95 31.15 36.5q0-1.9 1.125-3.4t2.875-2.2V14.05q0-1.95-1.3-3.25t-3.3-1.3q-1.95 0-3.25 1.3T26 14.05v19.9q0 3.55-2.475 6.05t-6.075 2.5Zm-6.6-28.65q1 0 1.675-.7t.675-1.65q0-1-.675-1.675T10.85 9.15q-.95 0-1.65.675T8.5 11.5q0 .95.7 1.65t1.65.7Zm26.35 25q.95 0 1.625-.7t.675-1.65q0-1-.675-1.675t-1.675-.675q-.9 0-1.625.675T34.8 36.5q0 .95.725 1.65t1.675.7ZM10.85 11.5Zm26.3 25Z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row dt-page__content">
                <div v-if="!isBooking" class="col-lg-8 dt-page__content">
                    <p class="dt-article__title">Описание экскурсии</p>
                    <p class="dt-main-text-thin">
                        {{ tour.description || 'Нет описания' }}
                    </p>
                    <div class="dt-paragraph__group">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h3 class="dt-paragraph__caption">Место начала</h3>
                            <p class="dt-btn-text text-uppercase d-lg-flex d-none"
                               data-bs-toggle="modal" data-bs-target="#cart-main-modal-1"
                            >Смотреть на карте</p>
                            <map-modal-dialog-component id="cart-main-modal-1"

                                                        :coords="{lat: tour.start_latitude, lon:tour.start_longitude}"/>
                        </div>
                        <div class="d-flex dt-paragraph align-items-start">
                            <div class="dt-paragraph__icon me-2" style="width: 20px; min-width: 20px;">
                                <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%" viewBox="0 0 48 48"
                                     fill="#0071eb">
                                    <path
                                        d="M25.45 42.7 19.7 27.9 4.9 22.15V19L43.1 4.5 28.6 42.7Zm1.45-7.1 9.3-24.2-24.15 9.35L22.8 24.8Zm-4.1-10.8Z"></path>
                                </svg>
                            </div>
                            <div class="dt-paragraph__text">
                                <h4 class="dt-text__title m-0">{{ tour.start_address || 'Стартовая локация' }}</h4>
                                <p class="dt-main-text-thin">
                                    {{ tour.start_comment || 'Стартовое описание' }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="dt-paragraph__group">
                        <h3 class="dt-paragraph__caption">Маршрут экскурсии</h3>
                        <div class="dt-paragraph__text">
                            <p class="dt-main-text-thin">Не следует, однако забывать, что новая модель организационной
                                деятельности влечет за собой процесс внедрения и модернизации систем массового участия.
                                Товарищи! постоянное информационно-пропагандистское обеспечение нашей деятельности в
                                значительной степени обуславливает создание систем массового участия.</p>
                        </div>
                        <div class="dt-tour-object-list">
                            <div class="d-flex dt-paragraph" v-for="item in tour.tour_objects">
                                <div class="dt-paragraph__icon dt-paragraph__icon--width-30 blue me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%"
                                         viewBox="0 0 48 48"
                                         fill="white">
                                        <path
                                            d="M9.3 42.7V7.25h18.45l.95 4.3h12.05V31.5H26.6l-.95-4.25h-12.4V42.7ZM25 19.4Zm5 8.15h6.75v-12H25.3l-.95-4.3h-11.1V23.3h15.8Z"></path>
                                    </svg>
                                </div>
                                <div class="dt-paragraph__text">
                                    <a :href="'/tour-object/'+item.id" class="dt-text__title">{{ item.title }}</a>
                                    <p class="dt-main-text-thin">{{ item.description }}</p>
                                    <div class="dt-text__links d-flex">
                                        <p class="dt-btn-text text-uppercase me-3 d-lg-flex d-none"
                                           data-bs-toggle="modal" :data-bs-target="'#map-main-modal-'+item.id"
                                           v-if="item.latitude!==0&&item.longitude!==0">Смотреть на
                                            карте</p>
                                        <p class="dt-btn-text text-uppercase me-3 d-flex d-lg-none"
                                           data-bs-toggle="modal" :data-bs-target="'#map-main-modal-'+item.id"
                                           v-if="item.latitude!==0&&item.longitude!==0">на карте</p>
                                        <p class="dt-btn-text text-uppercase" v-if="item.photos.length>0">Фото</p>

                                        <map-modal-dialog-component :id="'map-main-modal-'+item.id"
                                                                    multiple="false"
                                                                    :coords="{lat: item.latitude, lon:item.longitude}"/>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="dt-paragraph__group">
                                <h3 class="dt-paragraph__caption">Что входит в стоимость</h3>
                                <ul class="dt-list__price">
                                    <li class="dt-price__item" v-for="item in tour.include_services">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"
                                             viewBox="0 0 48 48" fill="#65c350">
                                            <path d="M18.9 36.4 7 24.5l2.9-2.85 9 9L38.05 11.5l2.9 2.85Z"></path>
                                        </svg>
                                        {{ item }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="dt-paragraph__group">
                                <h3 class="dt-paragraph__caption">Что не входит в стоимость</h3>
                                <ul class="dt-list__price">
                                    <li class="dt-price__item" v-for="item in tour.exclude_services">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"
                                             viewBox="0 0 48 48">
                                            <path fill="#f73637"
                                                  d="m12.45 38.35-2.8-2.8L21.2 24 9.65 12.45l2.8-2.8L24 21.2 35.55 9.65l2.8 2.8L26.8 24l11.55 11.55-2.8 2.8L24 26.8Z"></path>
                                        </svg>
                                        {{ item }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="dt-paragraph__group">
                        <h3 class="dt-paragraph__caption">Как оплатить</h3>
                        <ul class="dt-list__price">
                            <li class="dt-price__item" v-for="item in tour.payment_infos">
                                {{ item }}
                            </li>

                        </ul>
                        <p class="dt-btn-text text-uppercase me-3">подробнее про способы оплаты</p>
                    </div>
                    <div class="dt-bg__guide">
                        <div class="dt-bg-light-gray">
                            <div class="dt-guide__info d-flex w-100 h-100">
                                <div class="dt-guide__text">
                                    <h3 class="fw-bold dt-guide__caption">Остались вопросы?</h3>
                                    <p class="dt-main-text-thin">
                                        Вы можете пообщаться с гидом до оплаты заказа и получить ответы на все
                                        интересующие
                                        вас вопросы.
                                    </p>
                                </div>
                                <button class="dt-btn-blue" @click="startChatWithGide">
                                    Задать вопрос гиду
                                </button>
                            </div>
                        </div>
                    </div>
                    <review-add-form-component v-if="tour"
                                               :object-type="'tour'"
                                               :object-id="tour.id"/>
                    <review-list v-if="tour" :object="tour" :object-type="'tour'"/>
                </div>
                <tour-booking v-else
                              :tour="tour"
                              @closeBooking="isBooking = false"/>
                <div class="col-lg-4">
                    <div class="dt-bg__guide">
                        <div class="dt-bg-light-gray">
                            <div class="dt-guide__info d-flex w-100 h-100">
                                <div class="dt-guide__img">
                                    <img v-lazy="tour.guide.photo" alt="">
                                </div>
                                <div class="dt-guide__text">
                                    <p class="dt-guide__title fw-thin">экскурсию для вас проведет</p>
                                    <p class="dt-guide__name">{{ tour.guide.fname }} {{ tour.guide.sname }}
                                        {{ tour.guide.tname }}</p>
                                    <div class="dt-rating__star d-flex">
                                        <rating-component v-if="tour.guide.rating" :rating="tour.guide.rating"/>
                                        <p class="dt-guide__rating fw-bold">
                                            {{ tour.guide.rating || 'Еще нет рейтинга' }}</p>
                                    </div>
                                    <a :href="'/guide/'+tour.guide.id"
                                       class="dt-btn-text text-uppercase me-3 d-lg-flex d-none">смотреть
                                        отзывы
                                        ({{ tour.reviews.length }})</a>
                                    <a :href="'/guide/'+tour.guide.id"
                                       class="dt-btn-text text-uppercase text-nowrap d-flex d-lg-none">отзывы
                                        ({{ tour.reviews.length }})</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dt-bg__price">
                        <div class="dt-price text-center">
                        <span style="color:#f83737;text-decoration:line-through">
                        <p class="dt-price__non-active">{{ tour.discount_price }}</p>
                        </span>
                            <p class="dt-price__active">{{ tour.base_price }}</p>
                            <label>за человека</label>
                        </div>
                        <div class="dt-preferences">
                            <div class="dt-preferences__item d-flex mb-3">
                                <div class="dt-item__icon me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 48 48"
                                         fill="#0071eb">
                                        <path
                                            d="M35.25 43.2h-22.3V16.8l13.6-14.05 2.5 1.85q.35.3.55.875.2.575.2 1.325v.25l-2.15 9.75H42.3q1.55 0 2.775 1.2 1.225 1.2 1.225 2.8v2.8q0 .4.05.85.05.45-.1.8L39.8 40.1q-.55 1.3-1.825 2.2-1.275.9-2.725.9ZM16.6 39.25h19.3l6.35-15.1V20.8h-19.2l2.4-11.4-8.85 9.4Zm0-20.45v20.45Zm-3.65-2v4h-6v18.45h6v3.95H3V16.8Z"></path>
                                    </svg>
                                </div>
                                <div class="dt-item__text">
                                    <div class="dt-text__title">Гарантия лучшей цены</div>
                                    <p class="dt-main-text-thin">
                                        Если вы найдете цену ниже, мы вернем разницу.
                                    </p>
                                </div>
                            </div>
                            <div class="dt-preferences__item d-flex">
                                <div class="dt-item__icon me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 48 48"
                                         fill="#0071eb">
                                        <path
                                            d="m17 45.9-3.95-6.8-7.9-1.6.9-7.65-5-5.85 5-5.8-.9-7.65 7.9-1.6L17 2.1l7 3.2 7-3.2 4 6.85 7.85 1.6-.9 7.65 5 5.8-5 5.85.9 7.65L35 39.1l-4 6.8-7-3.2Zm1.75-5.15L24 38.5l5.4 2.25 3.3-4.95 5.7-1.45-.55-5.85L41.8 24l-3.95-4.6.55-5.85-5.7-1.35-3.4-4.95L24 9.5l-5.4-2.25-3.3 4.95-5.7 1.35.55 5.85L6.2 24l3.95 4.5-.55 5.95 5.7 1.35ZM24 24Zm-2.15 6.9 11.6-11.5-2.55-2.3-9.05 9-4.7-4.95-2.6 2.5Z"></path>
                                    </svg>
                                </div>
                                <div class="dt-item__text">
                                    <div class="dt-text__title">Моментальное бронирование</div>
                                    <p class="dt-main-text-thin">
                                        Без ожидания ответа гида
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="dt-set-order">
                            <button :disabled="tour.is_draft||!tour.is_active"
                                @click="isBooking = true" class="dt-btn-blue w-100 dt-btn--height-60">
                                Оформить заказ
                            </button>
                        </div>
                        <div @click="startChatWithGide" class="dt-question-guide text-center">
                            <p class="dt-btn-text text-uppercase me-lg-3">задать вопрос гиду</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <benefits-component v-if="!isBooking" class="container"/>
    </main>
</template>
<script>
import Breadcrumbs from "@/components/Fragments/Breadcrumbs.vue";
import TourBooking from "@/components/Tours/TourBooking.vue";
import ReviewList from "@/components/Reviews/ReviewList.vue";
import TourObjectList from "@/components/TourObjects/TourObjectList.vue";

export default {
    components: {TourObjectList, ReviewList, TourBooking, Breadcrumbs},
    props: ["tour"],
    computed: {
        user() {
            return window.user
        }
    },
    data() {
        return {
            breadcrumbs: [
                {
                    text: "Главная",
                    href: "/",
                },
                {
                    text: "Все экскурсии",
                    href: "/tours-all",
                },
                {
                    text: this.tour.title,
                    active: true,
                }], isBooking: false
        }
    },
    mounted() {
        this.addToWatch();
    },

    methods: {
        startChatWithGide() {
            if (user.is_guest)
                window.location = "/login"

            this.$store.dispatch("startChat", {
                recipient_id: this.tour.guide.id,
                message: `Добрый день, заинтересовал  <a href='/tour/${this.tour.id}'>тур</a>!`
            }).then((resp) => {
                this.$notify({
                    title: "Тур",
                    text: "Чат успешно создан!",
                    type: 'success'
                });

                let chatId = resp.data.chat_id
                window.location = `/messages#chat-${chatId}`
            })
        },
        addToWatch() {
            this.$store.dispatch("watchTour", this.tour.id)
        },
        addToFavorites() {
            this.$store.dispatch("addToFavorites", this.tour.id)
        }
    }
}
</script>
<style>
.dt-page__preheader .dt-preheader__content .dt-preheader__title {
    line-height: 120%;
}
</style>
