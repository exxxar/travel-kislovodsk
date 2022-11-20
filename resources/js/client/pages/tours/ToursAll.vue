<template>
    <main class="container dt-page-excursions dt-page-excursion">
        <breadcrumbs :items="breadcrumbs"></breadcrumbs>
        <div class="dt-page__header">
            <p class="dt-header__title">
                Экскурсии по Ставропольскому краю
            </p>
            <p class="dt-header__description">
                118 увлекательных экскурсий в городе Ставропольский край – Минеральные воды и источники в Ставрополье
                славились лечебными свойствами уже давно: здесь лечили больных в войсках Кавказской линии. А с 1803 года
                начали обустраивать курорты на Кавказских минеральных водах., экскурсионные маршруты охватывают 111
                достопримечательностей в городе и за его пределами, смотрите расписание экскурсий на и бронируйте билеты
                онлайн.
            </p>
        </div>
        <tour-search-filter/>
        <div class="dt-page__type-excursions dt__tabs">
            <tour-categories/>
        </div>
        <div class="dt-page__content row">
            <tour-filter/>
            <div class="col-lg-9 col-12 co dt-content">
                <tour-sort-filter/>
                <div class="dt-form row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">
                    <div class="col col-xs-12" v-for="item in tours">
                        <tour-card-component :data="item" :key="item"/>
                    </div>
                </div>
                <div class="dt-page__pagination">
                    <tour-pagination/>
                </div>
            </div>
        </div>
    </main>
</template>
<script>
import TourCard from "@/components/Tours/TourCard.vue";
import Breadcrumbs from "@/components/Fragments/Breadcrumbs.vue";
import TourCategories from "@/components/Tours/TourCategoriesList.vue";
import TourPagination from "@/components/Tours/TourPagination.vue";
import TourSortFilter from "@/components/Tours/TourSortFilter.vue";
import TourFilter from "@/components/Tours/TourFilter.vue";
import TourSearchFilter from "@/components/Tours/TourSearchFilter.vue";
import {mapGetters} from "vuex";

export default {
    components: {TourSearchFilter, TourFilter, TourSortFilter, TourPagination, Breadcrumbs, TourCard, TourCategories},
    data() {
        return {

            current_page: 0,
            tours: [],
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
            }
        }
    },
    computed: {
        ...mapGetters(['getToursByCategoryId', 'getTourById', 'getTours', 'getDictionariesByTypeSlug',
            'getDictionaryTypes', 'getToursPaginateObject']),

    },
    watch: {
        filters: {
            handler(newValue, oldValue) {
                this.loadFilteredTours()
            },
            deep: true
        }
    },
    mounted() {
        this.loadTours();

        this.eventBus.on('tour_page', (index) => {
            this.current_page = index
            this.loadFilteredTours()
        })

        this.eventBus.on('next_tour_page', (index) => {
            let filterObject = {
                ...this.filters.types_filter,
                ...this.filters.sort_filter,
                ...this.filters.category_filter,
            }

            this.$store.dispatch("nextToursPage",filterObject).then(() => {
                this.tours = this.getTours
                this.eventBus.emit('update_tour_pagination')
            })

        })

        this.eventBus.on('prev_tour_page', (index) => {
            let filterObject = {
                ...this.filters.types_filter,
                ...this.filters.sort_filter,
                ...this.filters.category_filter,
            }

            this.$store.dispatch("previousToursPage",filterObject).then(() => {
                this.tours = this.getTours
                this.eventBus.emit('update_tour_pagination')
            })

        })

        this.eventBus.on('select_filtered_sort', (filteredSort) => {
            this.filters.sort_filter = filteredSort

        })

        this.eventBus.on('select_filtered_types', (filteredTypes) => {
            this.filters.types_filter = filteredTypes

        })

        this.eventBus.on('select_filtered_categories', (filteredCategories) => {
            this.filters.category_filter = filteredCategories

        })
    },
    methods: {
        loadTours() {
            this.$store.dispatch("loadToursByPage", this.current_page).then(() => {
                this.tours = this.getTours
                this.eventBus.emit('update_tour_pagination')
            })
        },


        loadFilteredTours() {
            let filterObject = {
                ...this.filters.types_filter,
                ...this.filters.sort_filter,
                ...this.filters.category_filter,
            }
            this.$store.dispatch("loadToursFilteredByPage", {
                page: this.current_page,
                filters: filterObject
            }).then(() => {
                this.tours = this.getTours
                this.eventBus.emit('update_tour_pagination')
            })

        }
    }
}
</script>
