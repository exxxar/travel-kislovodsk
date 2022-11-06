<template>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
             aria-labelledby="pills-home-tab">
            <div class="dt-form row-cols-lg-4 row-cols-sm-1 row-cols-md-2">
                <div class="col col-xs-12" v-for="item in tours">
                    <tour-card-component :data="item" :key="item"/>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import TourCard from "@/components/Tours/TourCard.vue";
export default {
    components: {TourCard},
    data() {
        return {
            tours: [{
                id: 0, tag: "мини-группа", price: 1700, time: '4 часа', rating: 4.67,
                image: "/img/travels/1.jpg",
                title: "Бермамыт", description: "Это путешествие, пожалуй одно из самх впечатляющих " +
                    "из всех экскурский по Северному Кавказу.", date: "15 августа в 10:00",
                links: [{text: "все даты и запись"}]
            },{
                id: 1, tag: "групповая экскурсия", price: 2500, time: '2 дня', rating: 4.74,
                image: "/img/travels/2.jpg",
                title: "Медовые водопады", description: "Медовые водопады - группа водопадов в ущелье реки Аликоновки " +
                    "прорезавшей скалы глубоким каньономю", date: "завтра в 18:00",
                links: [{text: "все даты и запись"}]
            },{
                id: 2, tag: "групповая экскурсия", price: 9000, time: '1 день', rating: 4.05,
                image: "/img/travels/3.jpg",
                title: "Экскурсия по местам силы в Джилу су", description: "Северный Кавказ издревле считался " +
                    "регионом, где существует множество мест силы, " +
                    "вероятно из-за сильных энергети...", date: "14 марта в 8:00",
                links: [{text: "все даты и запись"}]
            },{
                id: 3, tag: "групповая экскурсия", price: 700, time: '1 час', rating: 4.95,
                image: "/img/travels/4.jpg",
                title: "Чарующий пятигорск - город горячих вод", description: "Приглашаем пройтись по старым паркам " +
                    "и гротам, вообразить как по ту сторону аллеи гуляет Лермонтов, вон в той...",
                date: "завтра в 19:30",
                links: [{text: "все даты и запись"}]
            },{
                id: 4, tag: "мини-группа", price: 1700, time: '4 часа', rating: 4.67,
                image: "/img/travels/1.jpg",
                title: "Бермамыт", description: "Это путешествие, пожалуй одно из самх впечатляющих " +
                    "из всех экскурский по Северному Кавказу.", date: "15 августа в 10:00",
                links: [{text: "все даты и запись"}]
            },{
                id: 5, tag: "групповая экскурсия", price: 2500, time: '2 дня', rating: 4.74,
                image: "/img/travels/2.jpg",
                title: "Медовые водопады", description: "Медовые водопады - группа водопадов в ущелье реки Аликоновки " +
                    "прорезавшей скалы глубоким каньономю", date: "завтра в 18:00",
                links: [{text: "все даты и запись"}]
            },{
                id: 6, tag: "групповая экскурсия", price: 9000, time: '1 день', rating: 4.05,
                image: "/img/travels/3.jpg",
                title: "Экскурсия по местам силы в Джилу су", description: "Северный Кавказ издревле считался " +
                    "регионом, где существует множество мест силы, " +
                    "вероятно из-за сильных энергети...", date: "14 марта в 8:00", links: [{text: "все даты и запись"}]
            },{
                id: 7, tag: "групповая экскурсия", price: 700, time: '1 час', rating: 4.95,
                image: "/img/travels/4.jpg",
                title: "Чарующий пятигорск - город горячих вод", description: "Приглашаем пройтись по старым паркам " +
                    "и гротам, вообразить как по ту сторону аллеи гуляет Лермонтов, вон в той...",
                date: "завтра в 19:30", links: [{text: "все даты и запись"}]
            }]
        }
    },
}
</script>
