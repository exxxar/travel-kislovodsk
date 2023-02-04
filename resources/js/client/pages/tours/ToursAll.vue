<template>
    <main class="container dt-page-excursions dt-page-excursion">
        <breadcrumbs :items="breadcrumbs"></breadcrumbs>
        <div class="dt-page__header">
            <p class="dt-header__title fs-1">
                Экскурсии по Ставропольскому краю
            </p>
            <p class="dt-header__description" :class="{'dt-text-more': !isShowMoreText}">
                118 увлекательных экскурсий в городе Ставропольский край – Минеральные воды и источники в
                Ставрополье славились лечебными свойствами уже давно: здесь лечили больных в войсках Кавказской
                линии. А с 1803 года начали обустраивать курорты на Кавказских минеральных водах., экскурсионные
                маршруты охватывают 111 достопримечательностей в городе и за его пределами, смотрите расписание
                экскурсий на и бронируйте билеты онлайн.
            </p>
            <button class="dt-link-filter--hover-blue fw-bold letter-spacing-3 text-uppercase mt-2 d-sm-none d-block"
                    @click="showMoreText">
                {{ !isShowMoreText ? 'читать полностью' : 'скрыть' }}
            </button>
        </div>
        <tour-search-filter/>
        <div class="dt-page__type-excursions dt__tabs mb-3">
            <tour-categories/>
        </div>
        <div class="dt-page__content row">
            <tour-filter/>
            <div class="col-lg-9 col-12 co dt-content">
                <tour-sort-filter/>
                <div class="dt-form row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1" v-if="tours.length>0">
                    <div class="col col-xs-12" v-for="item in tours">
                        <tour-card-component :tour="item" :key="item"/>
                    </div>

                </div>
                <div class="dt-form row d-flex justify-content-center" v-else>
                    <div class="col col-12 col-md-6">
                        <div class="empty-list">
                            <img v-lazy="'/img/no-tour.jpg'" alt="">
                            <p>По данному фильтру ничего не найдено:(</p>
                            <button class="text-uppercase dt-btn-text-red" @click="resetFilter">Сбросить фильтры
                            </button>
                        </div>
                    </div>

                </div>
                <div class="dt-page__pagination">
                    <paginate-component v-if="pagination"
                                        :pagination="pagination"/>
                </div>
            </div>
        </div>
    </main>

    <map-modal-dialog-component
        v-if="tours.length>0"
        id="map-main-modal"
        :multiply="true"
        :coords="coords"/>
</template>
<script>
import TourCard from "@/components/Tours/TourCard.vue";
import Breadcrumbs from "@/components/Fragments/Breadcrumbs.vue";
import TourCategories from "@/components/Tours/TourCategoriesList.vue";

import TourSortFilter from "@/components/Tours/TourSortFilter.vue";
import TourFilter from "@/components/Tours/TourFilter.vue";
import TourSearchFilter from "@/components/Tours/TourSearchFilter.vue";
import {mapGetters} from "vuex";

export default {
    components: {TourSearchFilter, TourFilter, TourSortFilter, Breadcrumbs, TourCard, TourCategories},
    data() {
        return {
            current_page: 0,
            tours: [],
            pagination: null,
            breadcrumbs: [
                {
                    text: "Главная",
                    href: "/",
                },
                {
                    text: "Все экскурсии",
                    active: true,
                }],
            filters: {
                types_filter: null,
                sort_filter: null,
                category_filter: null,
                search_filter: null,
            },
            isShowMoreText: false
        }
    },
    computed: {
        ...mapGetters(['getToursByCategoryId', 'getTourById', 'getTours', 'getDictionariesByTypeSlug',
            'getDictionaryTypes', 'getToursPaginateObject']),
        coords() {
            let tmp = []
            this.tours.forEach(item => {
                tmp.push({lat: item.start_latitude, lon: item.start_longitude})
            })

            return tmp
        }
    },
    watch: {
        filters: {
            handler(newValue, oldValue) {
                this.loadFilteredTours()
                this.current_page = 0
            },
            deep: true
        }
    },
    mounted() {

        if (localStorage.getItem("travel_store_filter")) {
            this.filters.search_filter = JSON.parse(localStorage.getItem("travel_store_filter"))
            localStorage.removeItem("travel_store_filter")
            this.loadFilteredTours()
        } else
            this.loadTours();

        this.eventBus.on('tour_page', (index) => {
            this.current_page = index
            this.loadFilteredTours()
        })

        this.eventBus.on('reset_filters', () => {
            this.current_page = 0
            this.loadTours()
        })

        this.eventBus.on('next_tour_page', (index) => {
            let filterObject = {
                ...this.filters.types_filter,
                ...this.filters.sort_filter,
                ...this.filters.category_filter,
                ...this.filters.search_filter,
            }

            this.$store.dispatch("nextToursPage", filterObject).then(() => {
                this.tours = this.getTours
                this.pagination = this.getToursPaginateObject
            })

        })

        this.eventBus.on('prev_tour_page', (index) => {
            let filterObject = {
                ...this.filters.types_filter,
                ...this.filters.sort_filter,
                ...this.filters.category_filter,
                ...this.filters.search_filter,
            }

            this.$store.dispatch("previousToursPage", filterObject).then(() => {
                this.tours = this.getTours
                this.pagination = this.getToursPaginateObject
            })

        })


        this.eventBus.on('select_search_filter', (searchFilter) => {
            this.filters.search_filter = searchFilter
            this.loadFilteredTours()

        })

        this.eventBus.on('select_filtered_sort', (filteredSort) => {
            this.filters.sort_filter = filteredSort
            this.loadFilteredTours()

        })

        this.eventBus.on('select_filtered_types', (filteredTypes) => {
            this.filters.types_filter = filteredTypes
            this.loadFilteredTours()

        })

        this.eventBus.on('select_filtered_categories', (filteredCategories) => {
            this.filters.category_filter = filteredCategories
            this.loadFilteredTours()

        })
    },
    methods: {
        resetFilter() {
            this.eventBus.emit('reset_filters')
        },
        loadTours() {
            this.$store.dispatch("loadToursByPage", {
                page: this.current_page
            }).then(() => {
                this.tours = this.getTours
                this.pagination = this.getToursPaginateObject
            })
        },
        loadFilteredTours() {
            let filterObject = {
                ...this.filters.types_filter,
                ...this.filters.sort_filter,
                ...this.filters.category_filter,
                ...this.filters.search_filter,
            }
            this.$store.dispatch("loadToursFilteredByPage", {
                page: this.current_page,
                filters: filterObject
            }).then(() => {
                this.tours = this.getTours
                this.pagination = this.getToursPaginateObject
            })

        },
        showMoreText() {
            this.isShowMoreText = !this.isShowMoreText;
        }
    }
}
</script>
