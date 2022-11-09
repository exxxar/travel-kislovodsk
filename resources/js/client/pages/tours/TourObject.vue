<template>
    <main class="wrapper mt-0">
        <div class="dt-page__preheader">
            <div class="container dt-preheader__content w-100 h-100 text-center">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <breadcrumbs :items="breadcrumbs"
                                     class="d-flex justify-content-center breadcrumbs__links-white"/>
                        <div class="dt-preheader__actions">

                        </div>
                        <p class="dt-preheader__title">Название объекта</p>
                        <div class="curved">
                            <img src="/img/curved_strip.png" alt="">
                        </div>
                        <div class="dt-preheader__photos justify-content-center">
                            <div class="dt-photos__item">
                                <img src="/img/travels/1.jpg" alt="">
                            </div>
                            <div class="dt-photos__item">
                                <img src="/img/travels/2.jpg" alt="">
                            </div>
                            <div class="dt-photos__item d-none d-lg-block">
                                <img src="/img/travels/3.jpg" alt="">
                            </div>
                            <div class="dt-photos__item d-none d-lg-block">
                                <img src="/img/travels/4.jpg" alt="">
                            </div>
                            <div class="dt-photos__item d-none d-lg-block">
                                <img src="/img/travels/1.jpg" alt="">
                            </div>
                            <div class="dt-photos__item d-none d-lg-block">
                                <img src="/img/travels/2.jpg" alt="">
                            </div>
                            <div class="dt-photos__item dt-photos__item--placeholder">
                                <div class="dt-item__placeholder">
                                    <span>+8</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            </div>
        </div>
        <div class="container dt-page dt-page-object">
            <div class="dt-top-info-block dt-top-info-block--two-input d-flex">
                <div class="dt-input__wrapper w-100">
                    <div class="dt-input__group bg-white">
                        <div class="d-flex dt-input__text flex-wrap justify-content-between w-100">
                            <div class="dt-text__left">
                                <label class="dt-label fw-thin">адрес</label>
                                <div class="dt-group-value d-flex flex-wrap m-0">
                                    <span class="dt-group-value__item fw-semibold">Некоторый адрес</span>
                                </div>
                            </div>
                            <button class="dt-btn-text text-uppercase text-nowrap">на карте</button>
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
                <div class="dt-input__wrapper w-100">
                    <div class="dt-input__group bg-white">
                        <div class="dt-input__text flex-wrap w-100">
                            <label class="dt-label fw-thin">координаты</label>
                            <div class="dt-group-value d-flex flex-wrap">
                                <span class="dt-group-value__item me-2 fw-semibold">широта: 28.532062</span>
                                <span class="dt-group-value__item fw-semibold">долгота: -120.257606</span>
                            </div>
                        </div>
                        <div class="dt-input__group-item">
                            <div class="dt-input__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%"
                                     viewBox="0 0 48 48" fill="#0071eb">
                                    <path
                                        d="M25.45 42.7 19.7 27.9 4.9 22.15V19L43.1 4.5 28.6 42.7Zm1.45-7.1 9.3-24.2-24.15 9.35L22.8 24.8Zm-4.1-10.8Z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row dt-page__content">
                <div class="col-lg-8 dt-page__content">
                    <p class="dt-article__title">Описание</p>
                    <p class="dt-main-text-thin">Приглашаю вас совместить приятное с полезным и сделать
                        акклиматизационный выход с красивыми видами на
                        гору Чегет и ледниковое озеро Донгуз-Орун-Кель. Воды, стекающие по склонам, размывают почву и
                        несут
                        в водоем различные минералы, которые и окрашивают жидкость в различные цвета. Оттенки водной
                        глади
                        могут зависеть как от угла обзора, так от погоды и времени года. Палитра меняется от
                        ярко-изумрудных
                        цветов до болотисто-зеленых и ржавых коричневых оттенков. <br><br>
                        Наш маршрут начнется снизу от Поляны Чегет, откуда мы пешком по горной широкой тропе поднимемся
                        на
                        озеро, преодолев первые 500 м вертикального набора высоты. У озера сделаем привал. А далее
                        поднимемся еще выше до станции канатной дороги горы Чегет, где находится смотровая площадка и
                        знаменитое кафе Ай (луна), где любил бывать Высоций и Визбор.<br><br>
                        Далее по желанию мы можем подняться наверх горы Чегет и спуститься вниз на канатной дороге. Или
                        спуститься сразу пешком вниз от второй станции, не используя канатную дорогу.<br><br>
                        Наш маршрут закончится спуском на канатной дороге вниз до Поляны Чегет.<br><br>
                        Одежду и обувь рекомендуется подбирать из синтетических материалов и удобную для активной
                        прогулки.
                        Также обязательно использовать все средства солнце защиты (крем, очки, головные уборы). Не
                        лишним
                        будет использование треккинговых палок, особенно если вы планируете идти по сложному варианту
                        маршрута.<br><br> Если у вас не хватает снаряжения, то можно взять напрокат на месте.</p>
                </div>
                <div class="col-lg-4">
                    <div class="dt-bg__guide">
                        <div class="dt-bg-light-gray">
                            <div class="dt-guide__info d-flex w-100 h-100">
                                <div class="dt-guide__img">
                                    <img src="/img/avatars/7.jpg" alt="">
                                </div>
                                <div class="dt-guide__text">
                                    <p class="dt-guide__title fw-thin">экскурсию для вас проведет</p>
                                    <p class="dt-guide__name">Петров Николай Игоревич</p>
                                    <div class="dt-rating__star d-flex">
                                        <img src="/img/icons/star_blue.svg" alt="">
                                        <img src="/img/icons/star_blue.svg" alt="">
                                        <img src="/img/icons/star_blue.svg" alt="">
                                        <img src="/img/icons/star_blue.svg" alt="">
                                        <img src="/img/icons/star_blue.svg" alt="">
                                        <p class="dt-guide__rating fw-bold">4.84</p>
                                    </div>
                                    <a href="/guide" class="dt-btn-text text-uppercase me-3 d-lg-flex d-none">смотреть отзывы
                                        (140)</a>
                                    <a href="/guide" class="dt-btn-text text-uppercase text-nowrap d-flex d-lg-none">отзывы (140)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
<script>
import Breadcrumbs from "@/components/Fragments/Breadcrumbs.vue";

export default {
    components: {Breadcrumbs},
    data() {
        return {
            breadcrumbs: [
                {
                    text: "Главная",
                    href: "/",
                },
                {
                    text: "Объекты",
                    href: "#",
                },
                {
                    text: "Название объекта",
                    active: true,
                }],
        }
    }
}
</script>
