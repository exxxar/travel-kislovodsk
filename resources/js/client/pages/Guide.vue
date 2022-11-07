<template>
    <main class="wrapper mt-0">
        <div class="dt-page__preheader">
            <div class="container dt-preheader__content w-100 h-100 text-center">
                <div class="row">
                    <div class="col-lg-2">

                    </div>
                    <div class="col-lg-8">
                        <breadcrumbs :items="breadcrumbs" class="d-flex justify-content-center breadcrumbs__links-white"/>
                        <div class="dt-preheader__actions">

                        </div>
                        <p class="dt-preheader__title">Имя Фамилия</p>
                        <div class="curved">
                            <img v-lazy="'/img/curved_strip.png'" alt="">
                        </div>
                        <div class="dt-preheader__avatar d-flex justify-content-center">
                            <div class="dt-avatar__img">
                                <img v-lazy="'/img/avatars/7.jpg'" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">

                    </div>
                </div>
            </div>
        </div>
        <div class="container dt-page dt-page-object">
            <div class="dt-top-info-block dt-top-info-block--two-input d-flex">
                <div class="dt-input__wrapper w-100">
                    <div class="dt-input__group bg-white">
                        <div class="d-flex flex-wrap w-100">
                            <label class="dt-label fw-thin">всего проведенно экскурсий</label>
                            <input type="text" name="name" class="dt-input fw-semibold"
                                   autocomplete="off" value="24" disabled>
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
                        <div class="d-flex flex-wrap w-100">
                            <label class="dt-label fw-thin">кол-во довольных клиентов</label>
                            <input type="text" name="name" class="dt-input fw-semibold"
                                   autocomplete="off" value="более 100" disabled>
                        </div>
                        <div class="dt-input__group-item">
                            <div class="dt-input__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%"
                                     viewBox="0 0 48 48" fill="#0071eb">
                                    <path
                                        d="M24 23.8q-3.45 0-5.625-2.175T16.2 16q0-3.45 2.175-5.625T24 8.2q3.45 0 5.625 2.175T31.8 16q0 3.45-2.175 5.625T24 23.8ZM7.7 40.45v-5q0-2 1-3.425 1-1.425 2.55-2.175 3.4-1.5 6.5-2.25t6.25-.75q3.15 0 6.225.775Q33.3 28.4 36.7 29.9q1.6.7 2.6 2.125t1 3.425v5Zm3.4-3.4h25.8V35.5q0-.8-.475-1.525-.475-.725-1.175-1.075-3.15-1.5-5.775-2.075Q26.85 30.25 24 30.25q-2.85 0-5.525.575Q15.8 31.4 12.7 32.9q-.7.35-1.15 1.075-.45.725-.45 1.525ZM24 20.4q1.9 0 3.15-1.25T28.4 16q0-1.9-1.25-3.15T24 11.6q-1.9 0-3.15 1.25T19.6 16q0 1.9 1.25 3.15T24 20.4Zm0-4.4Zm0 21.05Z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row dt-page__content">
                <div class="col-lg-8 dt-page__content">
                    <p class="dt-article__title">Описание</p>
                    <p class="dt-main-text-thin dt-content--bottom-60">Приглашаю вас совместить приятное с полезным и
                        сделать
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
                        знаменитое кафе Ай (луна), где любил бывать Высоций и Визбор.</p>
                    <div class="dt-reviews">
                        <div class="dt-reviews__header d-flex flex-wrap justify-content-between">
                            <p class="dt-article__title mb-0 d-lg-flex d-none">Отзывы об экскурсоводе</p>
                            <p class="dt-article__title mb-0 d-lg-none d-flex mb-3">Отзывы</p>
                            <div class="dt-article__reviews-count d-flex align-items-center">
                                <p class="dt-rating-of fw-bold me-3">4.86 из 5</p>
                                <div class="dt-rating__star d-flex w-auto me-3">
                                    <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                    <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                    <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                    <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                    <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                </div>
                                <p class="dt-count-marks fw-thin">43 оценки</p>
                            </div>
                        </div>
                        <div class="dt-reviews__rating">
                            <div class="dt-rating__item d-flex align-items-center">
                                <div class="dt-rating__star d-flex me-4">
                                   <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                    <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                    <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                    <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                    <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                </div>
                                <div class="loading loading--percently-80 me-2"></div>
                                <p class="dt-main-text-thin">1090</p>
                            </div>
                            <div class="dt-rating__item d-flex align-items-center">
                                <div class="dt-rating__star d-flex me-4">
                                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                                </div>
                                <div class="loading loading--percently-40 me-2"></div>
                                <p class="dt-main-text-thin">140</p>
                            </div>
                            <div class="dt-rating__item d-flex align-items-center">
                                <div class="dt-rating__star d-flex me-4">
                                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                                </div>
                                <div class="loading loading--percently-20 me-2"></div>
                                <p class="dt-main-text-thin">21</p>
                            </div>
                            <div class="dt-rating__item d-flex align-items-center">
                                <div class="dt-rating__star d-flex me-4">
                                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                                </div>
                                <div class="loading me-2"></div>
                                <p class="dt-main-text-thin">0</p>
                            </div>
                            <div class="dt-rating__item d-flex align-items-center">
                                <div class="dt-rating__star d-flex me-4">
                                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                                </div>
                                <div class="loading loading--percently-10 me-2"></div>
                                <p class="dt-main-text-thin">4</p>
                            </div>
                        </div>
                        <div class="dt-reviews__sort-by d-flex justify-content-end">
                            <p class="dt-sort-by__title fw-thin">сортировка по</p>
                            <p class="dt-sort-by__item active fw-regular">дате</p>
                            <p class="dt-sort-by__item fw-regular d-lg-flex d-none">оценке</p>
                        </div>
                        <div class="dt-reviews__content">
                            <div class="dt-review__item d-flex">
                                <div class="dt-review__avatar">
                                    <img v-lazy="'/img/avatars/2.jpg'" alt="">
                                </div>
                                <div class="dt-review__header d-lg-none d-block">
                                    <div class="dt-header__user">
                                        <p class="dt-user__date-ago fw-thin text-muted">2 недели назад</p>
                                        <p class="dt-user__name fw-semibold">Екатерина Иванова</p>
                                    </div>
                                    <div class="dt-rating__star w-auto d-flex">
                                        <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                        <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                        <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                        <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                        <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                    </div>
                                </div>
                                <div class="dt-review__block flex-grow-1">
                                    <div class="dt-review__header d-lg-block d-none">
                                        <div class="dt-header__user">
                                            <p class="dt-user__date-ago fw-thin text-muted">2 недели назад</p>
                                            <p class="dt-user__name fw-semibold">Екатерина Иванова</p>
                                        </div>
                                        <div class="dt-rating__star w-auto d-flex">
                                            <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                            <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                            <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                            <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                            <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                        </div>
                                    </div>
                                    <p class="dt-review__description dt-main-text-thin">
                                        Не следует, однако забывать, что новая модель организационной деятельности
                                        влечет за собой процесс внедрения и модернизации систем массового участия.
                                        Товарищи! постоянное информационно-пропагандистское обеспечение нашей
                                        деятельности в значительной степени обуславливает создание систем массового
                                        участия.
                                    </p>

                                    <div class="dt-form dt-review__photos">
                                        <div class="dt-photos__item p-0">
                                            <img v-lazy="'/img/travels/1.jpg'">
                                        </div>
                                        <div class="dt-photos__item p-0">
                                            <img v-lazy="'/img/travels/2.jpg'">
                                        </div>
                                        <div class="dt-photos__item p-0">
                                            <img v-lazy="'/img/travels/3.jpg'">
                                        </div>
                                        <div class="dt-photos__item p-0">
                                            <img v-lazy="'/img/travels/4.jpg'">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dt-review__item d-flex">
                                <div class="dt-review__avatar">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%"
                                         viewBox="0 0 48 48"
                                         fill="#22242566">
                                        <path
                                            d="M17.8 28.9q-1.15 0-1.95-.8t-.8-1.95q0-1.2.8-1.975.8-.775 1.95-.775 1.2 0 1.975.8.775.8.775 1.95 0 1.2-.8 1.975-.8.775-1.95.775Zm12.45 0q-1.2 0-1.975-.8-.775-.8-.775-1.95 0-1.2.8-1.975.8-.775 1.95-.775t1.95.8q.8.8.8 1.95 0 1.2-.8 1.975-.8.775-1.95.775ZM24 40.75q7 0 11.875-4.875T40.75 24q0-1.3-.2-2.5t-.5-2.25q-1 .3-2.125.375-1.125.075-2.375.075-4.8 0-9.05-1.95-4.25-1.95-7.3-5.6-1.65 3.95-4.775 6.925Q11.3 22.05 7.3 23.7v.35q0 7 4.85 11.85T24 40.75Zm0 3.95q-4.25 0-8.025-1.625-3.775-1.625-6.6-4.425-2.825-2.8-4.45-6.575Q3.3 28.3 3.3 24q0-4.3 1.625-8.075Q6.55 12.15 9.375 9.35q2.825-2.8 6.6-4.45 3.775-1.65 8.075-1.65 4.3 0 8.05 1.65 3.75 1.65 6.55 4.45 2.8 2.8 4.45 6.575Q44.75 19.7 44.75 24q0 4.3-1.625 8.075-1.625 3.775-4.45 6.575-2.825 2.8-6.6 4.425Q28.3 44.7 24 44.7ZM19.4 7.65q4.4 5.15 8.125 7.05 3.725 1.9 8.175 1.9 1.2 0 1.9-.05t1.55-.3Q36.9 12.2 33.025 9.6 29.15 7 24 7q-1.35 0-2.55.2-1.2.2-2.05.45ZM7.45 20.1q2.4-.9 5.475-4.075Q16 12.85 17.3 8.35q-4.35 1.95-6.575 4.975Q8.5 16.35 7.45 20.1ZM19.4 7.65Zm-2.1.7Z"/>
                                    </svg>
                                </div>
                                <div class="dt-review__header d-lg-none d-block">
                                    <div class="dt-header__user">
                                        <p class="dt-user__date-ago fw-thin text-muted">3 месяца назад</p>
                                        <p class="dt-user__name fw-semibold">Николаев Алексей</p>
                                    </div>
                                    <div class="dt-rating__star w-auto d-flex">
                                        <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                        <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                        <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                        <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                        <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                    </div>
                                </div>
                                <div class="dt-review__block flex-grow-1">
                                    <div class="dt-review__header d-lg-block d-none">
                                        <div class="dt-header__user">
                                            <p class="dt-user__date-ago fw-thin text-muted">3 месяца назад</p>
                                            <p class="dt-user__name fw-semibold">Николаев Алексей</p>
                                        </div>
                                        <div class="dt-rating__star w-auto d-flex">
                                            <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                            <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                            <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                            <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                            <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                        </div>
                                    </div>
                                    <p class="dt-review__description dt-main-text-thin">
                                        Что новая модель организационной деятельности обеспечивает широкому кругу
                                        (специалистов) участие в формировании соответствующий условий активизации.
                                    </p>
                                </div>
                            </div>
                            <div class="dt-review__item d-flex">
                                <div class="dt-review__avatar">
                                    <img v-lazy="'/img/avatars/2.jpg'" alt="">
                                </div>
                                <div class="dt-review__header d-lg-none d-block">
                                    <div class="dt-header__user">
                                        <p class="dt-user__date-ago fw-thin text-muted">пол года назад</p>
                                        <p class="dt-user__name fw-semibold">Имя Отчество</p>
                                    </div>
                                    <div class="dt-rating__star w-auto d-flex">
                                        <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                        <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                        <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                        <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                        <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                    </div>
                                </div>
                                <div class="dt-review__block flex-grow-1">
                                    <div class="dt-review__header d-lg-block d-none">
                                        <div class="dt-header__user">
                                            <p class="dt-user__date-ago fw-thin text-muted">пол года назад</p>
                                            <p class="dt-user__name fw-semibold">Имя Отчество</p>
                                        </div>
                                        <div class="dt-rating__star w-auto d-flex">
                                            <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                            <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                            <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                            <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                            <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                                        </div>
                                    </div>
                                    <p class="dt-review__description dt-main-text-thin">
                                        Равным образом дальнейшее развитие различных форм деятельности требуют от нас
                                        анализа позиций, занимаемых участниками в отношении поставленных задач. Идейные
                                        соображения высшего порядка, а также дальнейшее развитие различных форм
                                        деятельности
                                        играет важную роль в формировании соответствующий условий активизации. Товарищи!
                                        сложившаяся структура организации позволяет оценить значение систем массового
                                        участия. Значимость этих проблем настолько очевидна, что постоянное
                                        информационно-пропагандистское обеспечение нашей деятельности в значительной
                                        степени
                                        обуславливает создание соответствующий условий активизации. Задача организации,
                                        в
                                        особенности же реализация намеченных плановых заданий влечет за собой процесс
                                        внедрения и модернизации модели развития. Равным образом консультация с широким
                                        активом влечет за собой процесс внедрения и модернизации направлений
                                        прогрессивного
                                        развития.
                                    </p>
                                </div>
                            </div>
                            <button
                                class="align-items-center d-flex dt-btn dt-btn--height-50 dt-btn-blue justify-content-center w-100">
                                <span>Показать еще</span>
                                <div class="dt-btn__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%"
                                         viewBox="0 0 48 48" fill="#ffffff">
                                        <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                                    </svg>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-3">
                    <div class="dt-form row-cols-1">
                        <div class="col col-xs-12" v-for="item in tours">
                            <tour-card-component :data="item" :key="item"/>
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
                    text: "Гиды",
                    href: "#",
                },
                {
                    text: "Имя Фамилия",
                    active: true,
                }],
            tours: [{
                id: 0, tag: "мини-группа", price: 1700, time: '4 часа', rating: 4.67,
                image: "/img/travels/1.jpg",
                title: "Бермамыт", description: "Это путешествие, пожалуй одно из самх впечатляющих " +
                    "из всех экскурский по Северному Кавказу.", date: "15 августа в 10:00",
                links: [{text: "все даты и запись", link: "#"}]
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
                links: [{text: "все даты и запись", link: "#"}]
            }]
        }
    }
}
</script>
