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
                    <div class="col col-xs-12" v-for="item in tours">
                        <tour-card-component :data="item" :key="item"/>
                    </div>
                </div>
            </template>
            <template v-if="OrdersCompleted === false">
                <div class="dt-form row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">
                    <div class="col col-xs-12" v-for="item in tours">
                        <tour-card-component :data="item" :key="item"/>
                    </div>
                </div>
            </template>
        </div>
    </div>
</template>

<script>

export default {
    name: "Orders",
    components: {},
    data: () => ({
        OrdersCompleted: true,
        tours: [{
            id: 0, tag: "мини-группа", price: 1700, time: '4 часа', rating: 4.67,
            image: "/img/travels/1.jpg",
            title: "Бермамыт", description: "Это путешествие, пожалуй одно из самх впечатляющих " +
                "из всех экскурский по Северному Кавказу.", date: "15 августа в 10:00",
            complete: true, links: [{text: "подробнее", link: "#"}, {text: "написать гиду", link: "#"}]
        }, {
            id: 1,
            tag: "групповая экскурсия",
            price: 2500,
            time: '2 дня',
            rating: 4.74,
            image: "/img/travels/2.jpg",
            title: "Медовые водопады",
            description: "Медовые водопады - группа водопадов в ущелье реки Аликоновки " +
                "прорезавшей скалы глубоким каньономю",
            date: "завтра в 18:00",
            review: true, links: [{text: "подробнее", link: "#"}, {text: "написать гиду", link: "#"}]
        }]
    }),
    methods: {
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
