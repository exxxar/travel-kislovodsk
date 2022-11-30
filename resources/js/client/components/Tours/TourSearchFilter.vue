<template>
    <div class="dt-page__search-excursion">
        <div class="d-flex dt-top-info-block--three-input">
            <div class="d-flex flex-wrap align-items-end">
                <div class="switcher d-flex align-items-center">
                    <p class="dt-direction-excursion" :class="{'text-white': isLinksWhite}">Куда?</p>
                    <div class="dt-direction-excursion d-flex">
                        <label class="dt-switch d-flex">
                            <input type="checkbox" v-model="filters.direction">
                            <span class="dt-slider"></span>
                        </label>
                    </div>
                    <p class="dt-direction-excursion" :class="{'text-white': isLinksWhite}">Откуда?</p>
                </div>
                <div class="dt-filters d-lg-flex d-none" :class="{'dt-filters--links-white': isLinksWhite}">
                    <a data-bs-toggle="modal" data-bs-target="#map-main-modal" class="dt-link-filter--hover-blue">Смотреть
                        карту</a>
                </div>
            </div>
            <div class="dt-input__wrapper">
                <div class="dt-input__group bg-white dt-border-right-gray">
                    <div class="d-flex flex-wrap">

                       <label for="typeahead_id"
                               class="dt-label fw-thin">{{ filters.direction ? 'Откуда?' : 'Куда?' }}</label>

                        <autocomplete-locations
                        class="dt-input fw-semibold h-100"
                            id="typeahead_id"

                            placeholder="Название города..."
                            :items="filteredLocations"
                            :minInputLength="1"
                        @selectItem="selectLocationItem"
                        @onInput="selectLocationItem"
                        @onFocus="selectLocationItem"
                        @onBlur="selectLocationItem"
                        >
                        </autocomplete-locations>

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
                <div class="dt-filters d-lg-flex d-none" :class="{'dt-filters--links-white': isLinksWhite}">
                    <div class="d-flex dt-list">
                        <a href="#" class="dt-link-filter--hover-blue"
                           v-bind:class="{'active':checkNearest(0)}"
                           @click="toggleNearestFilter(0)">Завтра</a>
                        <a href="#" class="dt-link-filter--hover-blue"
                           v-bind:class="{'active':checkNearest(1)}"
                           @click="toggleNearestFilter(1)">В ближайшие 3 дня</a>
                        <a href="#" class="dt-link-filter--hover-blue"
                           v-bind:class="{'active':checkNearest(2)}"
                           @click="toggleNearestFilter(2)"
                        >

                            Эти выходные</a>
                    </div>
                </div>
            </div>
            <div class="dt-input__wrapper">
                <div class="dt-input__group bg-white">
                    <div class="d-flex flex-wrap">
                        <label class="dt-label fw-thin">Тип экскурсии?</label>

                        <div class="dropdown dt-input fw-semibold h-100 w-100">
                            <a class="btn dropdown-toggle w-100" href="#"
                               role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span v-if="!filters.tour_type">Не выбрано</span>
                                <span v-else>{{ filters.tour_type.title || 'Не задано значение' }}</span>

                            </a>

                            <ul class="dropdown-menu w-100">
                                <li>
                                    <a class="dropdown-item"
                                       @click="filters.tour_type=null"
                                    >Не выбрано</a></li>
                                <li v-for="item in tourTypes">
                                    <a class="dropdown-item"
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
            <button class="dt-info-block__button dt-btn-blue" @click="applyFilter">
                <span>Найти экскурсии</span>
            </button>
        </div>
    </div>
</template>
<script>
import {mapGetters} from "vuex";
import AutocompleteLocations from 'vue3-simple-typeahead'
import 'vue3-simple-typeahead/dist/vue3-simple-typeahead.css'

export default {
components:{
    AutocompleteLocations
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
                location: null,
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
        filteredLocations() {
            let search = this.filters.location

            let locations = this.getLocations


            if (!this.getLocations)
                return []

            return this.getLocations

        }
    },
    mounted() {

        if (localStorage.getItem("travel_store_filter")){
            this.filters = JSON.parse(localStorage.getItem("travel_store_filter"))
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
        selectLocationItem(data){
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
            if (this.needRedirectToAll) {
                window.location = '/tours-all'
                localStorage.setItem("travel_store_filter", JSON.stringify(this.filters || null))
            }


            this.eventBus.emit('select_search_filter', this.filters)
        },
        loadDictionaries() {
            this.$store.dispatch("loadLocations")
            this.$store.dispatch("loadAllDictionaryTypes").then(() => {
                //this.filters.tour_type = this.tourTypes[0]
            })
        },

    }
}
</script>
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

</style>
