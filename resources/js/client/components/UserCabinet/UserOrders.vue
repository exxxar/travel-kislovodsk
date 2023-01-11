<template>
    <div class="personal-account__content">
        <h2 class="personal-account__title personal-account__title_black fw-bold">
            Мои заказы
        </h2>
        <div class="personal-account-orders">
            <div class="personal-account-orders__links">
                <div class="personal-account-orders__link"
                     :class="{ 'personal-account-orders__link_active': part === 'Предстоящие' }"
                     @click="selectPart( 'Предстоящие')">
                    Предстоящие
                </div>
                <div class="personal-account-orders__link"
                     :class="{ 'personal-account-orders__link_active': part === 'Завершенные' }"
                     @click="selectPart( 'Завершенные')">
                    Завершенные
                </div>
            </div>

            <div class="dt-form row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1" v-if="tours.length">
                <div class="col-12" v-for="item in tours">
                    <tour-card-component :tour="item.tour" :key="item"/>
                </div>

                <div class="col-12">
                    <paginate-component v-if="pagination"
                                        :pagination="pagination"/>
                </div>
            </div>

            <div class="dt-form row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 d-flex justify-content-center"
                 v-else-if="tours.length===0&&!load">
                <div class="col col-12 col-md-8">
                    <div class="empty-list">
                        <img v-lazy="'/img/no-tour.jpg'" alt="">
                        <p>По данному фильтру ничего не найдено:(</p>
                    </div>
                </div>
            </div>

            <div v-if="load">
                <div class="row d-flex justify-content-center">
                    <div class="col col-12 col-md-6">
                        <div class="empty-list">
                            <img v-lazy="'/img/load.gif'" alt="">
                            <p>Грузим информацию....</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>

import {mapGetters} from "vuex";

export default {
    name: "Orders",
    components: {},
    data: () => ({
        load: false,
        part: 'Предстоящие',
        tours: [],
        pagination: null
    }),
    computed: {
        ...mapGetters(['getUserBookedTours']),
    },
    mounted() {
        this.loadUserOrders();

        this.eventBus.on('pagination_page', (page) => {
            this.loadUserOrders(page)
        })
    },
    methods: {
        selectPart(part) {
            this.part = part
            this.loadUserOrders()
        },

        loadUserOrders(page = 0) {
            let type = 0

            if (this.part === 'Предстоящие')
                type = 0
            if (this.part === 'Завершенные')
                type = 1

            this.load = true
            this.tours = []
            this.$store.dispatch("loadUserBookedToursByPage", {
                type: type,
                page: page
            }).then(() => {
                this.tours = this.getUserBookedTours
                this.load = false
            })
        },

    }
}
</script>

<style scoped>

</style>
