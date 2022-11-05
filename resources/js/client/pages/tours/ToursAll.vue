<template>
    <main class="container dt-page-excursions dt-page-excursion">
        <breadcrumbs :items="breadcrumbs"></breadcrumbs>
        <div class="dt-page__header">
            <p class="dt-header__title">
                Экскурсии по Ставропольскому краю
            </p>
            <p class="dt-header__description">
                118 увлекательных экскурсий в городе Ставропольский край – Минеральные воды и источники в Ставрополье
                славились лечебными свойствами уже давно: здесь лечили больных в войсках Кавказской линии. А с 1803 года
                начали обустраивать курорты на Кавказских минеральных водах., экскурсионные маршруты охватывают 111
                достопримечательностей в городе и за его пределами, смотрите расписание экскурсий на и бронируйте билеты
                онлайн.
            </p>
        </div>
        <tour-search-filter />
        <div class="dt-page__type-excursions dt__tabs">
            <ul class="nav nav-pills dt__tabs-list d-lg-flex d-none" id="pills-tab" role="tablist">
                <li class="nav-item flex-fill me-1 mb-3">
                    <a class="nav-link active" id="pills-1" data-toggle="pill" href="#pills-1" role="tab"
                       aria-controls="pills-1" aria-selected="true">Все</a>
                </li>
                <li class="nav-item flex-fill me-2">
                    <a class="nav-link" id="pills-2" data-toggle="pill" href="#pills-2" role="tab"
                       aria-controls="pills-2" aria-selected="true">Активные</a>
                </li>
                <li class="nav-item flex-fill me-2">
                    <a class="nav-link" id="pills-3" data-toggle="pill" href="#pills-3" role="tab"
                       aria-controls="pills-3" aria-selected="true">Альпинизм</a>
                </li>
                <li class="nav-item flex-fill me-2">
                    <a class="nav-link" id="pills-4" data-toggle="pill" href="#pills-4" role="tab"
                       aria-controls="pills-4" aria-selected="true">Гастрономические</a>
                </li>
                <li class="nav-item flex-fill me-2">
                    <a class="nav-link" id="pills-5" data-toggle="pill" href="#pills-5" role="tab"
                       aria-controls="pills-5" aria-selected="true">Детские</a>
                </li>
                <li class="nav-item flex-fill me-2">
                    <a class="nav-link" id="pills-6" data-toggle="pill" href="#pills-6" role="tab"
                       aria-controls="pills-6" aria-selected="true">Животные</a>
                </li>
                <li class="nav-item flex-fill me-2">
                    <a class="nav-link" id="pills-7" data-toggle="pill" href="#pills-7" role="tab"
                       aria-controls="pills-7" aria-selected="true">Исторические</a>
                </li>
                <li class="nav-item flex-fill me-2">
                    <a class="nav-link" id="pills-8" data-toggle="pill" href="#pills-8" role="tab"
                       aria-controls="pills-8" aria-selected="true">Мистические</a>
                </li>
                <li class="nav-item flex-fill me-2">
                    <a class="nav-link" id="pills-9" data-toggle="pill" href="#pills-9" role="tab"
                       aria-controls="pills-9" aria-selected="true">Активные</a>
                </li>
                <li class="nav-item flex-fill me-2">
                    <a class="nav-link" id="pills-10" data-toggle="pill" href="#pills-10" role="tab"
                       aria-controls="pills-10" aria-selected="true">Альпинизм</a>
                </li>
                <li class="nav-item flex-fill me-2">
                    <a class="nav-link" id="pills-11" data-toggle="pill" href="#pills-11" role="tab"
                       aria-controls="pills-11" aria-selected="true">Обзорные</a>
                </li>
                <li class="nav-item flex-fill me-2">
                    <a class="nav-link" id="pills-12" data-toggle="pill" href="#pills-12" role="tab"
                       aria-controls="pills-12" aria-selected="true">Детские</a>
                </li>
                <li class="nav-item flex-fill me-2">
                    <a class="nav-link" id="pills-13" data-toggle="pill" href="#pills-13" role="tab"
                       aria-controls="pills-13" aria-selected="true">Животные</a>
                </li>
                <li class="nav-item flex-fill me-2">
                    <a class="nav-link" id="pills-14" data-toggle="pill" href="#pills-14" role="tab"
                       aria-controls="pills-14" aria-selected="true">Исторические</a>
                </li>
                <li class="nav-item flex-fill me-2">
                    <a class="nav-link" id="pills-15" data-toggle="pill" href="#pills-15" role="tab"
                       aria-controls="pills-15" aria-selected="true">Мистические</a>
                </li>
                <li class="nav-item flex-fill me-2">
                    <a class="nav-link" id="pills-16" data-toggle="pill" href="#pills-16" role="tab"
                       aria-controls="pills-16" aria-selected="true">Активные</a>
                </li>
                <li class="nav-item flex-fill me-2">
                    <a class="nav-link" id="pills-17" data-toggle="pill" href="#pills-17" role="tab"
                       aria-controls="pills-17" aria-selected="true">Альпинизм</a>
                </li>
                <li class="nav-item flex-fill me-2">
                    <a class="nav-link" id="pills-18" data-toggle="pill" href="#pills-18" role="tab"
                       aria-controls="pills-18" aria-selected="true">Обзорные</a>
                </li>
                <li class="nav-item flex-fill me-2">
                    <a class="nav-link" id="pills-19" data-toggle="pill" href="#pills-19" role="tab"
                       aria-controls="pills-19" aria-selected="true">Детские</a>
                </li>
            </ul>
        </div>
        <div class="dt-page__content row">
            <tour-filter />
            <div class="col-lg-9 col-12 co dt-content">
                <tour-sort-filter />
                <div class="dt-form row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">
                    <div class="col col-xs-12" v-for="item in tours">
                        <tour-card-component :data="item" :key="item"/>
                    </div>
                </div>
                <div class="dt-page__pagination">
                    <tour-pagination />
                </div>
            </div>
        </div>
    </main>
</template>
<script>
import TourCard from "@/components/Tours/TourCard.vue";
import Breadcrumbs from "@/components/Fragments/Breadcrumbs.vue";
import TourPagination from "@/components/Tours/TourPagination.vue";
import TourSortFilter from "@/components/Tours/TourSortFilter.vue";
import TourFilter from "@/components/Tours/TourFilter.vue";
import TourSearchFilter from "@/components/Tours/TourSearchFilter.vue";

export default {
    components: {TourSearchFilter, TourFilter, TourSortFilter, TourPagination, Breadcrumbs, TourCard},
    data() {
        return {
            tours: [{
                id: 0, tag: "мини-группа", price: 1700, time: '4 часа', rating: 4.67,
                image: "/img/travels/1.jpg",
                title: "Бермамыт", description: "Это путешествие, пожалуй одно из самх впечатляющих " +
                    "из всех экскурский по Северному Кавказу.", date: "15 августа в 10:00",
                links: [{text: "все даты и запись", link: ""}]
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
                links: [{text: "все даты и запись", link: ""}]
            }, {
                id: 2, tag: "групповая экскурсия", price: 9000, time: '1 день', rating: 4.05,
                image: "/img/travels/3.jpg",
                title: "Экскурсия по местам силы в Джилу су", description: "Северный Кавказ издревле считался " +
                    "регионом, где существует множество мест силы, " +
                    "вероятно из-за сильных энергети...", date: "14 марта в 8:00",
                links: [{text: "все даты и запись", link: ""}]
            }, {
                id: 3, tag: "групповая экскурсия", price: 700, time: '1 час', rating: 4.95,
                image: "/img/travels/4.jpg",
                title: "Чарующий пятигорск - город горячих вод", description: "Приглашаем пройтись по старым паркам " +
                    "и гротам, вообразить как по ту сторону аллеи гуляет Лермонтов, вон в той...",
                date: "завтра в 19:30",
                links: [{text: "все даты и запись", link: ""}]
            }, {
                id: 4, tag: "мини-группа", price: 1700, time: '4 часа', rating: 4.67,
                image: "/img/travels/1.jpg",
                title: "Бермамыт", description: "Это путешествие, пожалуй одно из самх впечатляющих " +
                    "из всех экскурский по Северному Кавказу.", date: "15 августа в 10:00",
                links: [{text: "все даты и запись", link: ""}]
            }, {
                id: 5,
                tag: "групповая экскурсия",
                price: 2500,
                time: '2 дня',
                rating: 4.74,
                image: "/img/travels/2.jpg",
                title: "Медовые водопады",
                description: "Медовые водопады - группа водопадов в ущелье реки Аликоновки " +
                    "прорезавшей скалы глубоким каньономю",
                date: "завтра в 18:00",
                links: [{text: "все даты и запись", link: ""}]
            }, {
                id: 6, tag: "групповая экскурсия", price: 9000, time: '1 день', rating: 4.05,
                image: "/img/travels/3.jpg",
                title: "Экскурсия по местам силы в Джилу су", description: "Северный Кавказ издревле считался " +
                    "регионом, где существует множество мест силы, " +
                    "вероятно из-за сильных энергети...", date: "14 марта в 8:00",
                links: [{text: "все даты и запись", link: ""}]
            }, {
                id: 7, tag: "групповая экскурсия", price: 700, time: '1 час', rating: 4.95,
                image: "/img/travels/4.jpg",
                title: "Чарующий пятигорск - город горячих вод", description: "Приглашаем пройтись по старым паркам " +
                    "и гротам, вообразить как по ту сторону аллеи гуляет Лермонтов, вон в той...",
                date: "завтра в 19:30",
                links: [{text: "все даты и запись", link: ""}]
            }],
            breadcrumbs: [
                {
                    text: "Главная",
                    href: "/",
                },
                {
                    text: "Все экскурсии",
                    active: true,
                }],
            filters: {}
        }
    },
}
</script>
