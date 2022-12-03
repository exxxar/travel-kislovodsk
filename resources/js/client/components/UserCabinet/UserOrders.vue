<template>
    <div class="personal-account__content">
        <h2 class="personal-account__title personal-account__title_black fw-bold">
            Мои заказы
        </h2>
        <div class="personal-account-orders">
            <div class="personal-account-orders__links">
                <div class="personal-account-orders__link"
                     :class="{ 'personal-account-orders__link_active': OrdersCompleted === false }"
                     @click="OrdersUpcomingToggle()">
                    Предстоящие
                </div>
                <div class="personal-account-orders__link"
                     :class="{ 'personal-account-orders__link_active': OrdersCompleted === true }"
                     @click="OrdersCompletedToggle()">
                    Завершенные
                </div>
            </div>
            <template v-if="OrdersCompleted === true">
                <div class="dt-form row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">
                    <div class="col col-xs-12" v-for="item in completed">
                        <tour-card-component :tour="item.tour" :key="item">
                            <template v-slot:footer>
                                <h1>Здесь мог быть заголовок страницы</h1>
                            </template>
                        </tour-card-component>
                    </div>
                </div>
            </template>
            <template v-if="OrdersCompleted === false">
                <div class="dt-form row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">
                    <div class="col col-xs-12" v-for="item in upcoming">
                        <tour-card-component :tour="item.tour" :key="item"/>
                    </div>
                </div>
            </template>
        </div>
    </div>
</template>

<script>

import {mapGetters} from "vuex";

export default {
    name: "Orders",
    components: {},
    data: () => ({
        OrdersCompleted: true,
        upcoming: [],
        completed: []
    }),
    computed: {
        ...mapGetters(['getUserUpcomingBookedTours', 'getUserCompletedBookedTours']),
    },
    mounted() {
        this.loadUserOrders();
    },
    methods: {
        loadUserOrders() {
            this.$store.dispatch("loadUserBookedToursByPage").then(() => {
                this.upcoming = this.getUserUpcomingBookedTours
                this.completed = this.getUserCompletedBookedTours
            })
        },
        OrdersUpcomingToggle() {
            this.OrdersCompleted = false;
        },
        OrdersCompletedToggle() {
            this.OrdersCompleted = true;
        },
    }
}
</script>

<style scoped>

</style>
