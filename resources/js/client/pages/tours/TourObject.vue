<template>
    <main class="wrapper mt-0">
        <div class="dt-page__preheader">
            <div class="container dt-preheader__content w-100 h-100 text-center">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <breadcrumbs :items="breadcrumbs"
                                     class="d-flex justify-content-center breadcrumbs__links-white"/>
                        <div class="dt-preheader__actions">

                        </div>
                        <p class="dt-preheader__title">{{object.title}}</p>
                        <div class="curved">
                            <img :src="'/img/curved_strip.png'" alt="">
                        </div>
                        <div class="dt-preheader__photos overflow-auto flex-nowrap">
                            <div class="dt-photos__item col-2" data-bs-toggle="modal"
                                 :data-bs-target="'#image-modal'+index+'-'+item.id" v-for="(item, index) in object.photos.slice(0,6)">
                                <img v-lazy="item" alt="">

                                <image-modal-dialog-component :id="'image-modal'+index+'-'+item.id" :url="item"/>
                            </div>

                            <div class="dt-photos__item dt-photos__item--placeholder" v-if="object.photos.length>6">
                                <div class="dt-item__placeholder">
                                    <span>+{{  object.photos.length-6 }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            </div>
        </div>
        <div class="container dt-page dt-page-object">
            <div class="dt-top-info-block dt-top-info-block--two-input d-flex">
                <div class="dt-input__wrapper w-100">
                    <div class="dt-input__group bg-white">
                        <div class="d-flex dt-input__text flex-wrap justify-content-between w-100">
                            <div class="dt-text__left">
                                <label class="dt-label fw-thin">адрес</label>
                                <div class="dt-group-value d-flex flex-wrap m-0">
                                    <span class="dt-group-value__item fw-semibold">{{object.city}}, {{object.address}}</span>
                                </div>
                            </div>
                            <button class="dt-btn-text text-uppercase text-nowrap"
                                    data-bs-toggle="modal" :data-bs-target="'#map-tour-object-modal-'+object.id"
                                    v-if="object.latitude!==0&&object.longitude!==0"
                            >на карте</button>
                        </div>
                        <div class="dt-input__group-item">
                            <div class="dt-input__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%"
                                     viewBox="0 0 48 48" fill="#0071eb">
                                    <path
                                        d="M24 23.5q1.45 0 2.475-1.025Q27.5 21.45 27.5 20q0-1.45-1.025-2.475Q25.45 16.5 24 16.5q-1.45 0-2.475 1.025Q20.5 18.55 20.5 20q0 1.45 1.025 2.475Q22.55 23.5 24 23.5Zm0 16.55q6.65-6.05 9.825-10.975Q37 24.15 37 20.4q0-5.9-3.775-9.65T24 7q-5.45 0-9.225 3.75Q11 14.5 11 20.4q0 3.75 3.25 8.675Q17.5 34 24 40.05ZM24 44q-8.05-6.85-12.025-12.725Q8 25.4 8 20.4q0-7.5 4.825-11.95Q17.65 4 24 4q6.35 0 11.175 4.45Q40 12.9 40 20.4q0 5-3.975 10.875T24 44Zm0-23.6Z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dt-input__wrapper w-100">
                    <div class="dt-input__group bg-white">
                        <div class="dt-input__text flex-wrap w-100">
                            <label class="dt-label fw-thin">координаты</label>
                            <div class="dt-group-value d-flex flex-wrap">
                                <span class="dt-group-value__item me-2 fw-semibold">широта: {{object.latitude}}</span>
                                <span class="dt-group-value__item fw-semibold">долгота: {{object.longitude}}</span>
                            </div>
                        </div>
                        <div class="dt-input__group-item">
                            <div class="dt-input__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%"
                                     viewBox="0 0 48 48" fill="#0071eb">
                                    <path
                                        d="M25.45 42.7 19.7 27.9 4.9 22.15V19L43.1 4.5 28.6 42.7Zm1.45-7.1 9.3-24.2-24.15 9.35L22.8 24.8Zm-4.1-10.8Z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row dt-page__content">
                <div class="col-lg-8 dt-page__content">
                    <p class="dt-article__title">Описание</p>
                    <p class="dt-main-text-thin">
                        {{object.description || 'Нет описания'}}
                    </p>
                </div>
                <div class="col-lg-4">
                    <div class="dt-bg__guide">
                        <div class="dt-bg-light-gray">
                            <div class="dt-guide__info d-flex w-100 h-100">
                                <div class="dt-guide__img">
                                    <img v-lazy="object.guide.photo" alt="">
                                </div>
                                <div class="dt-guide__text">
                                    <p class="dt-guide__title fw-thin">экскурсию для вас проведет</p>
                                    <p class="dt-guide__name">{{object.guide.tname}} {{object.guide.fname}}</p>
                                    <div class="dt-rating__star d-flex">
                                        <img :src="'/img/icons/star_blue.svg'" alt="">
                                        <img :src="'/img/icons/star_blue.svg'" alt="">
                                        <img :src="'/img/icons/star_blue.svg'" alt="">
                                        <img :src="'/img/icons/star_blue.svg'" alt="">
                                        <img :src="'/img/icons/star_blue.svg'" alt="">
                                        <p class="dt-guide__rating fw-bold">4.84</p>
                                    </div>
                                    <a href="/guide" class="dt-btn-text text-uppercase me-3 d-lg-flex d-none">смотреть отзывы
                                        (140)</a>
                                    <a href="/guide" class="dt-btn-text text-uppercase text-nowrap d-flex d-lg-none">отзывы (140)</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dt-bg__price">
                        <div class="dt-price text-center">
                        <span>
                        <p class="dt-price__non-active">{{object.address}}</p>
                        </span>
                            <h1 class=" mt-3 text-uppercase bold">{{object.city || 'Не указан'}}</h1>
                            <label>город расположения</label>
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
                            <button
                                    @click="goToTour" class="dt-btn-blue w-100 dt-btn--height-60">
                                Найти все туры с объектом
                            </button>
                        </div>


                        <div
                            class="dt-question-guide text-center"
                            data-bs-toggle="modal" data-bs-target="#callback-from-1">
                            <p class="dt-btn-text text-uppercase me-lg-3">Задать вопрос менеджеру</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row dt-page__content">
                <div class="col-lg-12 dt-page__content">
                    <p class="dt-article__title">Погода в локации</p>
                    <p class="dt-main-text-thin">
                        <weather-component v-if="object.pogoda_klimat_id" :region-id="object.pogoda_klimat_id"/>
                        <find-weather-component
                            v-else
                            :search="object.city"/>
                    </p>
                </div>
            </div>
        </div>
    </main>

    <map-modal-dialog-component :id="'map-tour-object-modal-'+object.id"
                                multiple="false"
                                :coords="{lat: object.latitude, lon:object.longitude}"/>

    <div class="modal fade" id="callback-from-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Форма обратной связи</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <callback-component :text="preparedText"/>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Breadcrumbs from "@/components/Fragments/Breadcrumbs.vue";

export default {
    components: {Breadcrumbs},
    props:["object"],
    computed:{
        preparedText(){
            return `Здравствуйте! Заинтересовал туристический объект №${this.object.id} - ${this.object.title}! Хотелось бы узнать подробнее. Заранее спасибо!`
        },
    },
    data() {
        return {

            breadcrumbs: [
                {
                    text: "Главная",
                    href: "/",
                },
                {
                    text: "Объекты",
                    href: "#",
                },
                {
                    text: this.object.title,
                    active: true,
                }],
        }
    },
    methods:{
        goToTour(){
            let filters =  {
                direction: false,
                location_from: null,
                location_to: this.object.city || null,
                nearest_selected_dates: null,
                date: null,
                tour_type: null,
            }

            localStorage.setItem("travel_store_filter", JSON.stringify(filters || null))

            window.location = '/tours-all'
        }
    }
}
</script>
