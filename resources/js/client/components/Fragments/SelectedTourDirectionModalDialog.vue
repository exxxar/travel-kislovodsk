<template>
    <div class="modal fade" tabindex="-1" aria-hidden="true" data-bs-backdrop="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <h2 class="mb-3 text-start">
                        Выберите направление (откуда / куда)
                    </h2>
                    <div class="dt-two-group">
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
                                </div>
                                <div class="dt-input__group-item">
                                    <div class="dt-input__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%"
                                             viewBox="0 0 48 48"
                                             fill="#0071eb">
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
                                </div>
                                <div class="dt-input__group-item">
                                    <div class="dt-input__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%"
                                             viewBox="0 0 48 48"
                                             fill="#0071eb">
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
                        <button class="dt-info-block__button dt-btn dt-btn-blue" data-bs-dismiss="modal">
                            Выбрать
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

import {mapGetters} from "vuex";

export default {
    data() {
        return {
            filters: {
                location_from: null,
                location_to: null
            },
            isLinksWhite: true
        }
    },
    computed: {
        ...mapGetters(['getLocations']),
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

    },
    watch: {
        'filters.location_to': {
            handler: function (value) {
                this.$emit('update-location-to', this.filters.location_to)
            }, deep: true
        },
        'filters.location_from': {
            handler: function (value) {
                this.$emit('update-location-from', this.filters.location_from)
            }, deep: true
        }
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
    },
}

</script>
<style scoped lang="scss">
.dt-two-group {
    display: flex;

    .dt-input__wrapper:first-child {
        .dt-input__group {
            border-radius: 6px 0 0 6px;
            border: 1px solid lightgray;
        }
    }

    .dt-input__wrapper:nth-child(2) {
        .dt-input__group {
            border-radius: 0;
            border: 1px solid lightgray;
        }
    }

    .dt-info-block__button {
        border-radius: 0 6px 6px 0;
        border: 1px solid lightgray;
    }
}

@media (max-width: 767.98px) {
    .dt-two-group {
        flex-wrap: wrap;

        .dt-input__wrapper:first-child {
            .dt-input__group {
                border-radius: 6px 6px 0 0;
            }
        }

        .dt-input__wrapper:nth-child(2) {
            .dt-input__group {

            }
        }

        .dt-info-block__button {
            width: 100%;
            border-radius: 0 0 6px 6px;
        }
    }
}

.modal-backdrop {
    opacity: 0 !important;
}
</style>
