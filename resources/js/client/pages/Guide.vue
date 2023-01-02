<template>
    <main class="wrapper mt-0">
        <div class="dt-page__preheader">
            <div class="container dt-preheader__content w-100 h-100 text-center">
                <div class="row">
                    <div class="col-lg-2">

                    </div>
                    <div class="col-lg-12">
                        <breadcrumbs :items="breadcrumbs" class="d-flex justify-content-center breadcrumbs__links-white"/>
                        <div class="dt-preheader__actions">

                        </div>
                        <p class="dt-preheader__title">{{ guide.fname }} {{guide.tname}}</p>
                        <div class="curved">
                            <img v-lazy="'/img/curved_strip.png'" alt="">
                        </div>
                        <div class="dt-preheader__avatar d-flex justify-content-center">
                            <div class="dt-avatar__img">
                                <img v-lazy="guide.avatar" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">

                    </div>
                </div>
            </div>
        </div>
        <div class="container dt-page dt-page-object">
            <div class="dt-top-info-block dt-top-info-block--two-input d-flex">
                <div class="dt-input__wrapper w-100">
                    <div class="dt-input__group bg-white">
                        <div class="d-flex flex-wrap w-100">
                            <label class="dt-label fw-thin">всего проведенно экскурсий</label>
                            <input type="text" name="name" class="dt-input fw-semibold"
                                   autocomplete="off" value="24" disabled>
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
                        <div class="d-flex flex-wrap w-100">
                            <label class="dt-label fw-thin">кол-во довольных клиентов</label>
                            <input type="text" name="name" class="dt-input fw-semibold"
                                   autocomplete="off" :value="'больше '+guide.reviews.length " disabled>
                        </div>
                        <div class="dt-input__group-item">
                            <div class="dt-input__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%"
                                     viewBox="0 0 48 48" fill="#0071eb">
                                    <path
                                        d="M24 23.8q-3.45 0-5.625-2.175T16.2 16q0-3.45 2.175-5.625T24 8.2q3.45 0 5.625 2.175T31.8 16q0 3.45-2.175 5.625T24 23.8ZM7.7 40.45v-5q0-2 1-3.425 1-1.425 2.55-2.175 3.4-1.5 6.5-2.25t6.25-.75q3.15 0 6.225.775Q33.3 28.4 36.7 29.9q1.6.7 2.6 2.125t1 3.425v5Zm3.4-3.4h25.8V35.5q0-.8-.475-1.525-.475-.725-1.175-1.075-3.15-1.5-5.775-2.075Q26.85 30.25 24 30.25q-2.85 0-5.525.575Q15.8 31.4 12.7 32.9q-.7.35-1.15 1.075-.45.725-.45 1.525ZM24 20.4q1.9 0 3.15-1.25T28.4 16q0-1.9-1.25-3.15T24 11.6q-1.9 0-3.15 1.25T19.6 16q0 1.9 1.25 3.15T24 20.4Zm0-4.4Zm0 21.05Z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row dt-page__content">
                <div class="col-lg-8 dt-page__content">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link dt-main-text-thin"
                               v-bind:class="{'active':tab===1}"
                               @click="tab=1"
                               aria-current="page" href="#base">Основное</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dt-main-text-thin"
                               @click="tab=2"
                               v-bind:class="{'active':tab===2}"  href="#reviews">Комментарии</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dt-main-text-thin"
                               @click="tab=3"
                               v-bind:class="{'active':tab===3}"  href="#tours">Туры</a>
                        </li>

                    </ul>
                </div>
                <div class="col-lg-8 dt-page__content  pt-2" v-if="tab===1">
                    <p class="dt-article__title">Описание</p>
                    <p class="dt-main-text-thin dt-content--bottom-60">
                        {{guide.company.description || 'Нет описания'}}
                    </p>

                </div>
                <div class="col-lg-8 dt-page__content  pt-2" v-if="tab===2">
                    <review-add-form-component v-if="guide"
                                               :object-type="'guide'"
                                               :object-id="guide.id"/>

                    <review-list v-if="guide" :object="guide" :object-type="'guide'"/>
                </div>

                <div class="col-lg-8 dt-page__content pt-2" v-if="tab===3">
                    <div class="row" v-if="tours.length>0">
                        <div class="col-12 col-md-4 mb-2" v-for="item in tours">
                            <tour-card-component :tour="item" :key="item"/>
                        </div>
                        <div class="col-12">
                            <paginate-component v-if="pagination"
                                                :pagination="pagination"/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="dt-bg__guide">
                        <div class="dt-bg-light-gray">
                            <div class="dt-guide__info d-flex w-100 h-100">
                                <div class="dt-guide__img">
                                    <img v-lazy="" alt="">
                                </div>
                                <div class="dt-guide__text">
                                    <p class="dt-guide__title fw-thin">Информация о компании гида</p>
                                    <p class="dt-guide__name">Название компании</p>
                                    <div class="dt-rating__star d-flex">
                                        <rating-component :rating="1"/>
                                        <p class="dt-guide__rating fw-bold">1</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dt-bg__price">
                        <div class="dt-price text-center">
                        <span style="color:#f83737;text-decoration:line-through">
                        <p class="dt-price__non-active">0</p>
                        </span>
                            <p class="dt-price__active">0</p>
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
                            <button
                                class="dt-btn-blue w-100 dt-btn--height-60">
                                <span>Сообщение гиду</span>
                            </button>
                        </div>

                    </div>
                </div>

            </div>


        </div>
    </main>
</template>
<script>
import Breadcrumbs from "@/components/Fragments/Breadcrumbs.vue";
import ReviewList from "@/components/Reviews/ReviewList.vue";
import {mapGetters} from "vuex";
export default {
    components: {ReviewList, Breadcrumbs},
    props:["guide"],
    data() {
        return {
            breadcrumbs: [
                {
                    text: "Главная",
                    href: "/",
                },
                {
                    text: "Гиды",
                    href: "#",
                },
                {
                    text: this.guide.tname + " "+this.guide.fname,
                    active: true,
                }],
            tours: [],
            tab:1,
            pagination:null,
        }
    },
    mounted(){
        this.loadTourByGuideId()
        this.eventBus.on('tour_page', (page) => {
            this.loadTourByGuideId(page)
        })
    },
    computed: {
        ...mapGetters(['getTours','getToursPaginateObject']),
    },
    methods:{
        loadTourByGuideId(page = 1){
            this.$store.dispatch("loadTourByGuideId", {
                guideId: this.guide.id,
                page:page
            }).then(()=>{
                this.tours = this.getTours
                this.pagination = this.getToursPaginateObject
            })
        }
    }
}
</script>
<style lang="scss">

</style>
