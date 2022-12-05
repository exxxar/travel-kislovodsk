<template>
    <div class="personal-account__content">
        <h2 class="personal-account__title personal-account__title_black fw-bold">
            Мои заказы
        </h2>
        <div class="personal-account-orders">
            <div class="personal-account-orders__links">
                <div class="personal-account-orders__link"
                     :class="{ 'personal-account-orders__link_active': part === 'Предстоящие' }"
                     @click="part = 'Предстоящие'">
                    Предстоящие
                </div>
                <div class="personal-account-orders__link"
                     :class="{ 'personal-account-orders__link_active': part === 'Завершенные' }"
                     @click="part = 'Завершенные'">
                    Завершенные
                </div>
            </div>
            <template v-if="part === 'Завершенные'">
                <div class="dt-form row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1" v-if="completed.length">
                    <div class="col col-xs-12" v-for="item in completed">
                        <tour-card-component :tour="item.tour" :key="item"/>
                    </div>
                </div>

                <div class="dt-form row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 d-flex justify-content-center" v-else>
                    <div class="col col-12 col-md-8">
                        <div class="empty-list">
                            <img v-lazy="'/img/no-tour.jpg'" alt="">
                            <p>По данному фильтру ничего не найдено:(</p>
                        </div>
                    </div>
                </div>
            </template>
            <template v-if="part === 'Предстоящие' ">
                <div class="dt-form row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1" v-if="upcoming.length>0">
                    <div class="col col-xs-12" v-for="item in upcoming">
                        <tour-card-component :tour="item.tour" :key="item"/>
                    </div>
                </div>
                <div class="dt-form row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 d-flex justify-content-center" v-else>

                        <div class="col col-12 col-md-8">
                            <div class="empty-list">
                                <img v-lazy="'/img/no-tour.jpg'" alt="">
                                <p>По данному фильтру ничего не найдено:(</p>
                            </div>
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
        part: 'Предстоящие',
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
