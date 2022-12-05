<template>
    <div class="col-lg-3 dt-filters-by d-lg-block d-none">
        <div class="dt-filters-by__item">
            <div class="dt-check">
                <div class="dt-check__input">
                    <input type="checkbox" name="hot_excursion" v-model="filters.is_hot">
                    <div class="dt-check__input-check"></div>
                </div>
                <label class="dt-check__label fw-bold d-flex">
                    <slot name="label">
                        <p>горящие экскурсии</p>
                        <div class="dt-icon" style="width: 12px">
                        </div>
                    </slot>
                </label>
            </div>
        </div>
        <div class="dt-filters-by__item">
            <div class="dt-check__group">
                <label class="dt-check__group-title">стоимость, руб: </label>
                <div class="dt-check">
                    <div class="dt-check__input">
                        <input type="radio" name="price"
                               v-model="filters.price_type"
                               :value="1"
                        />
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__lapel">
                        <slot name="label">
                            <p>до 700 рублей</p>
                        </slot>
                    </label>
                </div>
                <div class="dt-check">
                    <div class="dt-check__input">
                        <input type="radio" name="price"
                               v-model="filters.price_type"
                               :value="2"
                        />
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__label">
                        <slot name="label">
                            <p>от 700 до 2500 рублей</p>
                        </slot>
                    </label>
                </div>
                <div class="dt-check">
                    <div class="dt-check__input">
                        <input type="radio" name="price"
                               v-model="filters.price_type"
                               :value="3"
                        />
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__label">
                        <slot name="label">
                            <p>более 2500 рублей</p>
                        </slot>
                    </label>
                </div>
                <div class="dt-check">
                    <div class="dt-check__input">
                        <input type="radio" name="price"
                               v-model="filters.price_type"
                               :value="0"
                        />
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__label">
                        <slot name="label">
                            <p>индивидуально</p>
                        </slot>
                    </label>
                </div>
                <div class="dt-check" v-if="filters.price_type===0">

                    <Slider
                        :max="max"
                        v-model="value"
                        class="slider-blue mt-5"
                    ></Slider>
                </div>
            </div>
        </div>
        <div class="dt-filters-by__item">
            <div class="dt-check__group">
                <label class="dt-check__group-title">передвижение: </label>
                <div class="dt-check" v-for="item in movementTypes">
                    <div class="dt-check__input">
                        <input type="checkbox" name="type_person"
                               v-model="filters.movement_types"
                               :value="item.id"
                        />
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__label">
                        <slot name="label">
                            <p>{{ item.title }}</p>
                        </slot>
                    </label>
                </div>
            </div>
        </div>
        <div class="dt-filters-by__item">
            <div class="dt-check__group">
                <label class="dt-check__group-title">длительность: </label>
                <div class="dt-check" v-for="item in durationTypes">
                    <div class="dt-check__input">
                        <input type="checkbox" name="type_person"
                               v-model="filters.duration_types"
                               :value="item.id"
                        />
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__label">
                        <slot name="label">
                            <p>{{ item.title }}</p>
                        </slot>
                    </label>
                </div>
            </div>
        </div>
        <div class="dt-filters-by__item">
            <div class="dt-check__group">
                <label class="dt-check__group-title">тип оплаты: </label>
                <div class="dt-check" v-for="item in paymentTypes">
                    <div class="dt-check__input">
                        <input type="checkbox" name="type_person"
                               v-model="filters.payment_types"
                               :value="item.id"
                        />
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__label">
                        <slot name="label">
                            <p>{{ item.title }}</p>
                        </slot>
                    </label>
                </div>
            </div>
        </div>
        <div class="dt-filters-by__item">
            <div class="text-center">
                <h6 class="text-uppercase dt-btn-text-red" @click="resetFilter">Сбросить фильтры</h6>
            </div>
        </div>
    </div>
</template>
<script>
import {mapGetters} from "vuex";
import Slider from '@vueform/slider'

export default {
    components: {
        Slider,
    },
    props: {
        isLinksWhite: {
            type: Boolean,
            default: false
        }
    },
    watch: {
        value(oldVal, newVal) {
            this.filters.price_range_start = this.value[0]
            this.filters.price_range_end = this.value[1]
        },
        filters: {
            handler(newValue, oldValue) {
                this.eventBus.emit('select_filtered_types', this.filters)
            },
            deep: true
        }
    },
    data() {
        return {
            value: [100, 200],
            max: 10000,
            filters: {
                tour_types: [],
                payment_types: [],
                duration_types: [],
                is_hot: false,
                price_type: 0,
                price_range_start: 0,
                price_range_end: 1000,
                movement_types: [],
            },
        }
    },
    computed: {
        ...mapGetters(['getToursByCategoryId', 'getMaxToursPrice', 'getTourById', 'getTours', 'getDictionariesByTypeSlug', 'getDictionaryTypes']),
        priceTypes() {
            return this.getDictionariesByTypeSlug("price_type")
        },
        transactionTypes() {
            return this.getDictionariesByTypeSlug("transaction_type")
        },
        movementTypes() {
            return this.getDictionariesByTypeSlug("movement_type")
        },
        durationTypes() {
            return this.getDictionariesByTypeSlug("duration_type")
        },
        paymentTypes() {
            return this.getDictionariesByTypeSlug("payment_type")
        },
        tourTypes() {
            return this.getDictionariesByTypeSlug("tour_type")
        },
    },
    mounted() {
        this.loadDictionaries()

        this.$store.dispatch("loadMaxTourPrice").then(() => {
            this.max = this.getMaxToursPrice
            this.value = [0, this.max]
        })

        this.eventBus.on('reset_filters', () => {
            this.filters.tour_types = []
            this.filters.payment_types = []
            this.filters.duration_types = []
            this.filters.is_hot = false
            this.filters.price_type = 0
            this.filters.price_range_start = null
            this.filters.price_range_end = null
            this.filters.movement_types = []
        })
    },
    methods: {
        resetFilter() {
            this.eventBus.emit('reset_filters')
        },
        loadDictionaries() {
            this.$store.dispatch("loadAllDictionaries")
        },
    }
}


</script>
<style src="@vueform/slider/themes/default.css"></style>
<style>

.slider-blue {
    width: 100%;
    box-sizing: border-box;
    padding: 0 20px;
    --slider-connect-bg: #3B82F6;
    --slider-tooltip-bg: #3B82F6;
    --slider-handle-ring-color: #3B82F630;
}
</style>
