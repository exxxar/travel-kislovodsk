<template>
    <label class="d-block d-lg-none dt-check__group-title fw-regular mb-2">выберите категории</label>
    <div class="d-block d-lg-none d-flex dt-tour-categories">
        <div class="dt-input__wrapper me-1">
            <div class="dt-input__group bg-white">
                <div class="dropdown fw-semibold h-100 w-100">
                    <a class="btn dropdown-toggle w-100 border-0 text-left ps-0 dt-text--regular"
                       href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span v-if="!filters.tour_category">Все</span>
                        <span v-else>{{ filters.tour_category.title || 'Все' }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="cursor-pointer">
                            <a class="dropdown-item dt-text--regular" @click="filters.tour_category=null">Все</a>
                        </li>
                        <li class="cursor-pointer" v-for="item in getCategories">
                            <a class="dropdown-item dt-text--regular" @click="filters.tour_category=item">
                                {{ item.title }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="dt-input__group-item">
                    <div class="dt-input__icon" style="width: 16px">
                        <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%" viewBox="0 0 48 48"
                             fill="#0071eb">
                            <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="dt-wrapper bg-white rounded-1" style="min-width: 50px; width: 50px;">
            <div class="icon-arrow-down"></div>
            <div class="dt-input__group-item">
                <div class="dt-input__icon" style="width: 16px">
                    <img v-lazy="'/img/icons/tune_116939.svg'" alt="">
                </div>
            </div>
        </div>
    </div>

    <ul class="nav nav-pills dt__tabs-list flex-nowrap overflow-auto d-lg-flex d-none" id="pills-tab" role="tablist">
        <li class="nav-item flex-fill me-1 mb-3">
            <a class="nav-link" id="pills-1"
               v-bind:class="{'active':filters.tour_categories.length===0}"
               @click="filterTourByCategory(null)"
               data-toggle="pill" href="#pills-1" role="tab"
               aria-controls="pills-1" aria-selected="true">Все</a>
        </li>
        <li class="nav-item flex-fill me-1 mb-3" v-for="item in getCategories">
            <a class="nav-link" id="pills-1"
               v-bind:class="{'active':filters.tour_categories.indexOf(item.id)>-1}"
               @click="filterTourByCategory(item.id)" :id="'pills-'+item.id"
               data-toggle="pill" :href="'#pills-'+item.id" role="tab"
               aria-controls="pills-1" aria-selected="true">{{ item.title }}</a>
        </li>
    </ul>

</template>

<script>
import {mapGetters} from 'vuex';

export default {
    data() {
        return {
            filters: {
                tour_categories: [],
                tour_category: null
            }

        }
    },
    computed: {
        ...mapGetters(['getCategories', 'getCategoryById']),
    },
    mounted() {
        this.loadTourCategories().then(() => {

        })

        this.eventBus.on('reset_filters', () => {
            this.filters.tour_categories = []
        })
    },
    methods: {
        filterTourByCategory(id) {
            if (id === null) {
                this.filters.tour_categories = [];
                return;
            }
            let index = this.filters.tour_categories.indexOf(id);
            if (index > -1)
                this.filters.tour_categories.splice(index, 1);
            else
                this.filters.tour_categories.push(id)

            this.eventBus.emit('select_filtered_categories', this.filters)
        },
        loadTourCategories() {
            return this.$store.dispatch("loadAllCategories")
        }
    }
}
</script>
