<template>
    <div class="dt-page__search-excursion d-flex flex-wrap flex-lg-nowrap">
        <div class="d-flex dt-top-info-block&#45;&#45;four-input justify-content-between w-100">
            <div class="dt-input__wrapper">
                <div class="dt-input__group bg-white dt-border-right-gray">
                    <div class="w-100">
                        <label for="typeahead_id" class="d-lg-flex d-none dt-label fw-thin">
                            Откуда?
                        </label>

                        <div class="dropdown fw-semibold h-100 w-100">
                            <a class="d-flex btn dropdown-toggle w-100 border-0 text-left ps-0 dt-text--regular"
                               href="#"
                               role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span v-if="!filters.location_from">Откуда?</span>
                                <span v-else>{{ filters.location_from }}</span>
                            </a>

                            <ul class="dropdown-menu dropdown-locations">
                                <li class="cursor-pointer">
                                    <a class="dropdown-item dt-text--regular"
                                       @click="selectLocationFrom(null)"
                                    >Не выбрано</a></li>
                                <li class="cursor-pointer" v-for="item in filteredLocationsFrom">
                                    <a class="dropdown-item dt-text--regular"
                                       @click="selectLocationFrom(item)"
                                    >{{ item }}</a></li>

                            </ul>
                        </div>

                        <!--                        <multiselect style="border: none; line-height: 1" v-model="filters.location"
                                                             :options="filteredLocations" placeholder="Название города..." selectLabel="Выбрать"
                                                             deselectLabel="Enter для отмены" selectedLabel="Выбрано" :close-on-select="true"
                                                             :clear-on-select="false" label="name" track-by="name"/>-->
                    </div>
                    <div class="dt-input__group-item">
                        <div class="dt-input__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%" viewBox="0 0 48 48" fill="#0071eb">
                                <path d="M24 23.65q1.5 0 2.575-1.075Q27.65 21.5 27.65 20q0-1.5-1.075-2.575Q25.5 16.35 24 16.35q-1.5
                            0-2.575 1.075Q20.35 18.5 20.35 20q0 1.5 1.075 2.575Q22.5 23.65 24 23.65Zm0 15.75q6.4-5.85
                            9.45-10.625Q36.5 24 36.5 20.4q0-5.7-3.625-9.3Q29.25 7.5 24 7.5t-8.875 3.6Q11.5 14.7 11.5
                            20.4q0 3.6 3.125 8.35T24 39.4Zm0 5.2q-8.3-7.05-12.4-13.075Q7.5 25.5 7.5 20.4q0-7.7
                            4.975-12.3Q17.45 3.5 24 3.5q6.55 0 11.525 4.6Q40.5 12.7 40.5 20.4q0 5.1-4.1 11.125T24
                            44.6Zm0-24.2Z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="dt-filters mt-2 d-lg-flex d-none"
                     :class="{'dt-filters&#45;&#45;links-white': isLinksWhite}">
                    <div class="d-flex dt-list">
                        <a href="#reset-filter" class="dt-link-filter&#45;&#45;hover-blue"
                           @click="resetFilter">Сбросить фильтры</a>
                    </div>
                </div>
            </div>
            <div class="dt-input__wrapper">
                <div class="dt-input__group bg-white dt-border-right-gray">
                    <div class="w-100">
                        <label for="typeahead_id" class="d-lg-flex d-none dt-label fw-thin">
                            Куда?
                        </label>

                        <div class="dropdown fw-semibold h-100 w-100">
                            <a class="d-flex btn dropdown-toggle w-100 border-0 text-left ps-0 dt-text--regular"
                               href="#"
                               role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span v-if="!filters.location_to">Куда?</span>
                                <span v-else>{{ filters.location_to }}</span>
                            </a>

                            <ul class="dropdown-menu dropdown-locations">
                                <li class="cursor-pointer">
                                    <a class="dropdown-item dt-text--regular"
                                       @click="selectLocationTo(null)"
                                    >Не выбрано</a></li>
                                <li class="cursor-pointer" v-for="item in filteredLocationsTo">
                                    <a class="dropdown-item dt-text--regular"
                                       @click="selectLocationTo(item)"
                                    >{{ item }}</a></li>

                            </ul>
                        </div>
                        <!--                        <multiselect style="border: none; line-height: 1" v-model="filters.location"
                                                    :options="filteredLocations" placeholder="Название города..." selectLabel="Выбрать"
                                                    deselectLabel="Enter для отмены" selectedLabel="Выбрано" :close-on-select="true"
                                                    :clear-on-select="false" label="name" track-by="name"/>-->
                    </div>
                    <div class="dt-input__group-item">
                        <div class="dt-input__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%" viewBox="0 0 48 48" fill="#0071eb">
                                <path d="M24 23.65q1.5 0 2.575-1.075Q27.65 21.5 27.65 20q0-1.5-1.075-2.575Q25.5 16.35 24 16.35q-1.5
                            0-2.575 1.075Q20.35 18.5 20.35 20q0 1.5 1.075 2.575Q22.5 23.65 24 23.65Zm0 15.75q6.4-5.85
                            9.45-10.625Q36.5 24 36.5 20.4q0-5.7-3.625-9.3Q29.25 7.5 24 7.5t-8.875 3.6Q11.5 14.7 11.5
                            20.4q0 3.6 3.125 8.35T24 39.4Zm0 5.2q-8.3-7.05-12.4-13.075Q7.5 25.5 7.5 20.4q0-7.7
                            4.975-12.3Q17.45 3.5 24 3.5q6.55 0 11.525 4.6Q40.5 12.7 40.5 20.4q0 5.1-4.1 11.125T24
                            44.6Zm0-24.2Z"/>
                            </svg>
                        </div>
                    </div>
                </div>

            </div>
            <div class="dt-input__wrapper">
                <div class="dt-input__group bg-white dt-border-right-gray">
                    <tour-calendar-component v-model="filters.date"/>
                    <div class="dt-input__group-item">
                        <div class="dt-input__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%"
                                 viewBox="0 0 48 48" fill="#0071eb">
                                <path
                                    d="M9.25 44.7q-1.6 0-2.775-1.175Q5.3 42.35 5.3 40.75v-30.5q0-1.65 1.175-2.825Q7.65 6.25 9.25 6.25h3v-3H16v3h16v-3h3.75v3h3q1.65 0 2.825 1.175Q42.75 8.6 42.75 10.25v30.5q0 1.6-1.175 2.775Q40.4 44.7 38.75 44.7Zm0-3.95h29.5V19.5H9.25v21.25Zm0-24.25h29.5v-6.25H9.25Zm0 0v-6.25 6.25ZM24 28.15q-.9 0-1.525-.625Q21.85 26.9 21.85 26q0-.9.625-1.525.625-.625 1.525-.625.9 0 1.525.625.625.625.625 1.525 0 .9-.625 1.525-.625.625-1.525.625Zm-8 0q-.9 0-1.525-.625Q13.85 26.9 13.85 26q0-.9.625-1.525.625-.625 1.525-.625.9 0 1.525.625.625.625.625 1.525 0 .9-.625 1.525-.625.625-1.525.625Zm16 0q-.9 0-1.525-.625Q29.85 26.9 29.85 26q0-.9.625-1.525.625-.625 1.525-.625.9 0 1.525.625.625.625.625 1.525 0 .9-.625 1.525-.625.625-1.525.625Zm-8 8q-.9 0-1.525-.625Q21.85 34.9 21.85 34q0-.9.625-1.525.625-.625 1.525-.625.9 0 1.525.625.625.625.625 1.525 0 .9-.625 1.525-.625.625-1.525.625Zm-8 0q-.9 0-1.525-.625Q13.85 34.9 13.85 34q0-.9.625-1.525.625-.625 1.525-.625.9 0 1.525.625.625.625.625 1.525 0 .9-.625 1.525-.625.625-1.525.625Zm16 0q-.9 0-1.525-.625Q29.85 34.9 29.85 34q0-.9.625-1.525.625-.625 1.525-.625.9 0 1.525.625.625.625.625 1.525 0 .9-.625 1.525-.625.625-1.525.625Z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="dt-filters d-lg-flex d-none mt-2"
                     :class="{'dt-filters&#45;&#45;links-white': isLinksWhite}">
                    <div class="d-flex dt-list">
                        <a class="dt-link-filter&#45;&#45;hover-blue cursor-pointer"
                           v-bind:class="{'active':checkNearest(0)}"
                           @click="toggleNearestFilter(0)">Завтра</a>
                        <a class="dt-link-filter&#45;&#45;hover-blue cursor-pointer"
                           v-bind:class="{'active':checkNearest(1)}"
                           @click="toggleNearestFilter(1)">В ближайшие 3 дня</a>
                        <a class="dt-link-filter&#45;&#45;hover-blue cursor-pointer"
                           v-bind:class="{'active':checkNearest(2)}"
                           @click="toggleNearestFilter(2)">
                            Эти выходные
                        </a>
                    </div>
                </div>
            </div>
            <div class="dt-input__wrapper">
                <div class="dt-input__group bg-white">
                    <div class="d-flex flex-wrap">
                        <label class="d-lg-flex d-none dt-label fw-thin">Тип экскурсии?</label>
                        <div class="dropdown fw-semibold h-100 w-100">
                            <a class="d-lg-flex d-none btn dropdown-toggle w-100 border-0 text-left ps-0 dt-text--regular"
                               href="#"
                               role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span v-if="!filters.tour_type">Не выбрано</span>
                                <span v-else>{{ filters.tour_type.title || 'Не задано значение' }}</span>
                            </a>
                            <a class="d-lg-none btn dropdown-toggle w-100 border-0 text-left ps-0 dt-text--regular"
                               href="#"
                               role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span v-if="!filters.tour_type">Тип экскурсии?
                                    <span class="dt-text-muted--white-50">(необ.)</span>
                                </span>
                                <span v-else>{{ filters.tour_type.title || 'Не задано значение' }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="cursor-pointer">
                                    <a class="dropdown-item dt-text--regular"
                                       @click="filters.tour_type=null"
                                    >Не выбрано</a></li>
                                <li class="cursor-pointer" v-for="item in tourTypes">
                                    <a class="dropdown-item dt-text--regular"
                                       @click="filters.tour_type=item"
                                    >{{ item.title }}</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="dt-input__group-item">
                        <div class="dt-input__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%"
                                 viewBox="0 0 48 48" fill="#0071eb">
                                <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <button class="dt-info-block__button dt-btn dt-btn-blue" @click="applyFilter">
                Найти экскурсии
            </button>
        </div>
        <hr class="hr-light-gray d-lg-none d-block">
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class=" flex-wrap align-items-end mb-3 mb-lg-0">
                    <a data-bs-toggle="modal" data-bs-target="#map-main-modal"
                       style="min-width: 200px"
                       class="btn btn-primary p-3">Смотреть карту</a>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {mapGetters} from "vuex";


import Multiselect from 'vue-multiselect'

export default {
    components: {
        Multiselect
    },
    props: {
        isLinksWhite: {
            type: Boolean,
            default: false
        },
        needRedirectToAll: {
            type: Boolean,
            default: false
        }
    },

    data() {
        return {

            filters: {
                direction: true,
                location_from: null,
                location_to: null,
                nearest_selected_dates: null,
                date: null,
                tour_type: null,
            }
        }
    },
    computed: {
        ...mapGetters(['getLocations', 'getTourDates', 'getToursByCategoryId', 'getTourById', 'getTours', 'getDictionariesByTypeSlug', 'getDictionaryTypes']),
        tourTypes() {
            return this.getDictionariesByTypeSlug("tour_type")
        },
        filteredLocationsTo() {
            if (!this.getLocations)
                return []
            return this.getLocations.to
        },
        filteredLocationsFrom() {
            if (!this.getLocations)
                return []
            return this.getLocations.from
        }
    },
    mounted() {

        if (localStorage.getItem("travel_store_filter")) {

            this.filters = JSON.parse(localStorage.getItem("travel_store_filter"))
            localStorage.removeItem("travel_store_filter")

            this.applyFilter();
        }

        this.loadDictionaries()

        this.eventBus.on('reset_filters', () => {
            this.filters.direction = true
            this.filters.location = null
            this.filters.nearest_selected_dates = null
            this.filters.date = null
            this.filters.tour_type = null
        })


    },
    methods: {
        selectLocationTo(item) {
            this.filters.location_to = item

            if (item == null) {
                this.$store.dispatch("loadLocations")
                this.filters.location_from = null
                return
            }

            if (this.filters.location_from == null)
                this.$store.dispatch("loadLocationsWithFilter", {
                    title: item,
                    type: 2,
                })

        },
        selectLocationFrom(item) {
            this.filters.location_from = item
            if (item == null) {
                this.$store.dispatch("loadLocations")
                this.filters.location_to = null
                return
            }

            if (this.filters.location_to == null)
                this.$store.dispatch("loadLocationsWithFilter", {
                    title: item,
                    type: 1,
                })

        },
        resetFilter() {
            this.filters.location_from = null
            this.filters.location_to = null
            this.$store.dispatch("loadLocations")
            this.eventBus.emit('reset_filters')
        },
        selectLocationItem(data) {
            if (typeof data == 'object')
                this.filters.location = data.input
            else
                this.filters.location = data
        },
        toggleNearestFilter(index) {
            if (!this.checkNearest(index)) {
                this.filters.nearest_selected_dates = index
            } else {
                this.filters.nearest_selected_dates = null
            }
        },
        checkNearest(index) {
            return this.filters.nearest_selected_dates === index
        },
        applyFilter() {

            localStorage.setItem("travel_store_filter", JSON.stringify(this.filters || null))


            if (this.needRedirectToAll) {
                window.location = '/tours-all'
            }

            this.eventBus.emit('select_search_filter', this.filters)
        },
        loadDictionaries() {
            this.$store.dispatch("loadLocations")
            this.$store.dispatch("loadAllDictionaries").then(() => {
                //this.filters.tour_type = this.tourTypes[0]
                this.eventBus.emit('select_search_filter', this.filters)
            })
        },

    }
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.css"></style>
<style lang="scss">
.dt-list {
    a.active {
        color: #0071eb !important;
    }
}

.blue-color {
    color: #0071eb;
}

.selected-day {
    position: relative;
    background: rgba(0, 113, 235, 0.56);
    /* padding: 9px; */
    border-radius: 5px;
    width: 30px;
    height: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
}

.dp__range_between {

    .selected-day {
        background: #0071eb !important;
    }
}

.multiselect {
    min-height: 10px;
}

.multiselect__tags {
    border: none;
    padding-top: 0.25rem;
    padding-left: 0;
    min-height: 10px;
    height: 25px;

    input {
        padding-left: 0;
    }

    .multiselect__single {
        font-size: 0.8rem;
        padding-left: 0;
    }
}

.multiselect__input {
    font-size: 0.8rem;
    height: 20px !important;
}

.multiselect__select {
    height: 28px;
}

.multiselect__placeholder {
    font-size: 12px;
    font-family: "Manrope Regular", serif;
    color: #222425;
}

.dt-input__group {
    .dropdown {
        height: 22px !important;

        .dropdown-toggle {
            padding: 0;
            padding-left: 2px !important;
            border: none !important;
        }
    }
}

.dt-input__group .dropdown .dropdown-toggle {
    padding-left: 0 !important;
}

@media (max-width: 767.88px) {
    .multiselect__placeholder {
        font-size: 12px;
    }
    .dt-input__group-item {
        // margin-left: -16px;
    }
}

.dropdown-locations {
    max-height: 200px;
    overflow-y: scroll;
}
</style>
