<template>


    <main class="container px-3 px-sm-0 personal-account dt-guide-cabinet">
        <breadcrumbs :items="breadcrumbs"/>
        <div class="row"
             v-if="user.company.approve_at==null&&user.company.request_approve_at==null&&!isSendVerifiedRequest">

            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Внимание!</h4>
                <p>Ваш аккаунт требует верификации!</p>
                <hr>
                <p class="mb-0">Нажмите на
                    <button @click="verifiedProfile" type="button" class="btn btn-link">эту кнопку</button>
                    для запроса подтверждения вашего аккаунта! Если вам подвтердят или
                    откажут, то данная информация отобразится в этом разделе!
                </p>
            </div>
        </div>

        <div class="row" v-if="user.company.approve_at==null&&user.company.request_approve_at||isSendVerifiedRequest">
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Всё отлично!</h4>
                <p>Аккаунт ожидает подтверждения</p>
            </div>
        </div>

        <div class="row" v-if="user.company.approve_at!=null">
           <div class="col-12 mb-5">
               <p><i class="fa-solid fa-check" style="color:green;"></i> Подтвержденный аккаунт</p>
           </div>
        </div>

        <div class="main row">
            <div class="d-lg-block d-none col-3 pe-5">

                <div class="side-menu">
                    <button @click="openMenu('Мои экскурсии','Действующие')" class="personal-account-nav__link
                        menu-item d-flex rounded p-4 mb-2
                        justify-content-between align-items-center dt-btn--hover-blue"
                            :class="{'personal-account-nav__link_active active': activeTitle=='Мои экскурсии'}"
                    >
                        <span class="menu-item__name blue-hover font-size-09 semibold">Мои экскурсии</span>
                        <div class="">
                            <i class="fa-solid fa-globe"></i>
                        </div>
                    </button>
                    <button @click="openMenu('Мои объекты','Действующие объекты')"
                            class="personal-account-nav__link menu-item d-flex rounded p-4 mb-2
                    justify-content-between align-items-center dt-btn--hover-blue"
                            :class="{'personal-account-nav__link_active active': activeTitle=='Мои объекты'}">
                        <span class="menu-item__name font-size-09 semibold">Мои объекты</span>
                        <div>
                            <i class="fa-solid fa-map-location-dot"></i>
                        </div>
                    </button>
                    <button @click="openMenu( 'Транзакции')"
                            class="personal-account-nav__link menu-item d-flex rounded p-4 mb-2
                    justify-content-between align-items-center dt-btn--hover-blue"
                            :class="{'personal-account-nav__link_active active': activeTitle=='Транзакции'}">
                        <span class="menu-item__name font-size-09 semibold">Транзакции</span>
                        <div>
                            <i class="fa-solid fa-arrow-right-arrow-left"></i>
                        </div>
                    </button>
                    <button @click="openMenu('Календарь')"
                            class="personal-account-nav__link menu-item d-flex rounded p-4 mb-2
                    justify-content-between align-items-center dt-btn--hover-blue"
                            :class="{'personal-account-nav__link_active active': activeTitle=='Календарь'}">
                        <span class="menu-item__name font-size-09 semibold">Календарь</span>
                        <div>
                            <i class="fa-regular fa-calendar-days"></i>
                        </div>
                    </button>

                    <button @click="openMenu('Документы')"
                            class="personal-account-nav__link menu-item d-flex rounded p-4 mb-2
                    justify-content-between align-items-center dt-btn--hover-blue"
                            :class="{'personal-account-nav__link_active active': activeTitle=='Документы'}">
                        <span class="menu-item__name font-size-09 semibold">Документы</span>
                        <div>
                            <i class="fa-regular fa-folder-open"></i>
                        </div>
                    </button>
                    <button @click="openMenu('Настройки')"
                            class="personal-account-nav__link menu-item d-flex rounded p-4 mb-2
                    justify-content-between align-items-center dt-btn--hover-blue"
                            :class="{'personal-account-nav__link_active active': activeTitle=='Настройки'}">
                        <span class="menu-item__name font-size-09 semibold">Настройка профиля гида</span>
                        <div>
                            <i class="fa-solid fa-sliders"></i>
                        </div>
                    </button>
                </div>

            </div>
            <div class="dropdown d-lg-none d-block col-12 position-relative mx-0 ms-auto px-0 rounded
                        dt-btn__dropdown-menu" style="position: sticky !important;top: 10px;z-index: 999;">
                <button type="button" class="big-button d-flex col-12 ps-2rem
                        personal-account-nav__link_active dropdown-toggle text-start font-size-09
                        align-items-center active rounded"
                        data-bs-toggle="dropdown">
                    <div class="col-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                            <path
                                d="M9.3 42.7V7.25h18.45l.95 4.3h12.05V31.5H26.6l-.95-4.25h-12.4V42.7ZM25 19.4Zm5 8.15h6.75v-12H25.3l-.95-4.3h-11.1V23.3h15.8Z"/>
                        </svg>
                    </div>
                    <span class="col menu-item__name font-size-09 ms-4 semibold">{{activeTitle||'Не выбрано'}}</span>
                </button>
                <ul class="dropdown-menu row col-12 flex-grow-1 border-0 pb-0 pt-0 rounded font-size-09"
                    style="z-index: 9999;">
                    <button
                        @click="openMenu('Мои экскурсии','Действующие')"
                        class="dropdown-item menu-item bg-white d-flex rounded px-2rem py-4 align-items-center">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                                <path
                                    d="M17.45 42.5q-3.65 0-6.125-2.5T8.85 33.95V17.1q-1.75-.75-2.875-2.225T4.85 11.5q0-2.5 1.775-4.25T10.85 5.5q2.5 0 4.25 1.75t1.75 4.25q0 1.9-1.125 3.4t-2.875 2.2v16.85q0 1.9 1.3 3.225 1.3 1.325 3.3 1.325 2 0 3.275-1.325T22 33.95v-19.9q0-3.6 2.475-6.075T30.6 5.5q3.6 0 6.075 2.475t2.475 6.075V30.9q1.75.7 2.875 2.2 1.125 1.5 1.125 3.4 0 2.45-1.75 4.225-1.75 1.775-4.25 1.775-2.45 0-4.225-1.775Q31.15 38.95 31.15 36.5q0-1.9 1.125-3.4t2.875-2.2V14.05q0-1.95-1.3-3.25t-3.3-1.3q-1.95 0-3.25 1.3T26 14.05v19.9q0 3.55-2.475 6.05t-6.075 2.5Zm-6.6-28.65q1 0 1.675-.7t.675-1.65q0-1-.675-1.675T10.85 9.15q-.95 0-1.65.675T8.5 11.5q0 .95.7 1.65t1.65.7Zm26.35 25q.95 0 1.625-.7t.675-1.65q0-1-.675-1.675t-1.675-.675q-.9 0-1.625.675T34.8 36.5q0 .95.725 1.65t1.675.7ZM10.85 11.5Zm26.3 25Z"/>
                            </svg>
                        </div>
                        <span class="col menu-item__name blue-hover font-size-09 ms-4 semibold">Мои экскурсии</span>
                    </button>
                    <button
                        @click="openMenu('Мои объекты','Действующие')"
                        class="dropdown-item menu-item bg-white d-flex rounded px-2rem py-4 align-items-center">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                                <path
                                    d="M9.3 42.7V7.25h18.45l.95 4.3h12.05V31.5H26.6l-.95-4.25h-12.4V42.7ZM25 19.4Zm5 8.15h6.75v-12H25.3l-.95-4.3h-11.1V23.3h15.8Z"/>
                            </svg>
                        </div>
                        <span class="col menu-item__name blue-hover font-size-09 ms-4 semibold">Мои объекты</span>
                    </button>
                    <button
                        @click="openMenu('Транзакции')"
                        class="dropdown-item menu-item bg-white d-flex rounded px-2rem py-4 align-items-center">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                                <path
                                    d="M32.6 27.2q1.25 0 2.225-.975.975-.975.975-2.275 0-1.25-.975-2.2-.975-.95-2.225-.95t-2.225.95q-.975.95-.975 2.2 0 1.3.975 2.275.975.975 2.225.975ZM9.25 36.1v2.65-29.5V36.1Zm0 6.6q-1.55 0-2.75-1.175T5.3 38.75V9.25q0-1.6 1.2-2.8 1.2-1.2 2.75-1.2h29.5q1.65 0 2.825 1.2 1.175 1.2 1.175 2.8v6.45h-4V9.25H9.25v29.5h29.5v-6.4h4v6.4q0 1.6-1.175 2.775Q40.4 42.7 38.75 42.7Zm17.7-9.35q-1.65 0-2.7-1.025Q23.2 31.3 23.2 29.7V18.4q0-1.65 1.05-2.675t2.7-1.025H41.1q1.7 0 2.725 1.025Q44.85 16.75 44.85 18.4v11.3q0 1.6-1.025 2.625T41.1 33.35Zm14.9-3V17.7H26.2v12.65Z"/>
                            </svg>
                        </div>
                        <span class="col menu-item__name blue-hover font-size-09 ms-4 semibold">Транзакции</span>
                    </button>
                    <button
                        @click="openMenu('Календарь')"
                        class="dropdown-item menu-item bg-white d-flex rounded px-2rem py-4 align-items-center">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                                <path
                                    d="M9 44q-1.2 0-2.1-.9Q6 42.2 6 41V10q0-1.2.9-2.1Q7.8 7 9 7h3.25V4h3.25v3h17V4h3.25v3H39q1.2 0 2.1.9.9.9.9 2.1v31q0 1.2-.9 2.1-.9.9-2.1.9Zm0-3h30V19.5H9V41Zm0-24.5h30V10H9Zm0 0V10v6.5Z"/>
                            </svg>
                        </div>
                        <span class="col menu-item__name blue-hover font-size-09 ms-4 semibold">Календарь</span>
                    </button>
                    <button
                        @click="openMenu('Документы')"
                        class="dropdown-item menu-item bg-white d-flex rounded px-2rem py-4 align-items-center">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                                <path
                                    d="M9 44q-1.2 0-2.1-.9Q6 42.2 6 41V10q0-1.2.9-2.1Q7.8 7 9 7h3.25V4h3.25v3h17V4h3.25v3H39q1.2 0 2.1.9.9.9.9 2.1v31q0 1.2-.9 2.1-.9.9-2.1.9Zm0-3h30V19.5H9V41Zm0-24.5h30V10H9Zm0 0V10v6.5Z"/>
                            </svg>
                        </div>
                        <span class="col menu-item__name blue-hover font-size-09 ms-4 semibold">Документы</span>
                    </button>
                    <button
                        @click="openMenu('Настройки')"
                        class="dropdown-item menu-item bg-white d-flex rounded px-2rem py-4 align-items-center">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                                <path
                                    d="m18.8 44.7-1.05-6.5q-.8-.3-1.725-.825-.925-.525-1.575-1.075l-6.1 2.85-5.3-9.4 5.6-4.05q-.1-.35-.125-.85-.025-.5-.025-.85t.025-.85q.025-.5.125-.85l-5.6-4.1 5.3-9.3 6.15 2.8q.65-.55 1.55-1.05t1.7-.75l1.05-6.65h10.4l1.05 6.6q.8.3 1.725.775.925.475 1.575 1.075l6.1-2.8 5.3 9.3-5.6 4q.05.4.1.9t.05.9q0 .4-.05.875t-.1.875l5.6 4-5.3 9.4-6.15-2.85q-.65.55-1.525 1.1-.875.55-1.725.8l-1.05 6.5Zm5.15-14.2q2.7 0 4.6-1.9 1.9-1.9 1.9-4.6 0-2.7-1.9-4.6-1.9-1.9-4.6-1.9-2.7 0-4.6 1.9-1.9 1.9-1.9 4.6 0 2.7 1.9 4.6 1.9 1.9 4.6 1.9Zm0-3q-1.5 0-2.5-1.025t-1-2.475q0-1.45 1-2.475 1-1.025 2.5-1.025 1.45 0 2.475 1.025Q27.45 22.55 27.45 24q0 1.45-1.025 2.475Q25.4 27.5 23.95 27.5ZM24 24Zm-1.95 16.75h3.9l.7-5.6q1.7-.4 3.225-1.25 1.525-.85 2.725-2.1l5.3 2.3 1.75-3.25-4.65-3.4q.2-.85.325-1.7T35.45 24q0-.9-.1-1.75t-.35-1.7l4.65-3.4-1.75-3.25-5.3 2.3q-1.15-1.35-2.65-2.275-1.5-.925-3.3-1.125l-.7-5.55h-3.9l-.7 5.55q-1.75.3-3.275 1.2-1.525.9-2.725 2.2l-5.25-2.3-1.75 3.25 4.6 3.35q-.2.9-.325 1.75T12.5 24q0 .9.125 1.775.125.875.325 1.725l-4.6 3.35 1.75 3.25 5.25-2.3q1.25 1.25 2.775 2.125T21.35 35.2Z"/>
                            </svg>
                        </div>
                        <span class="col menu-item__name blue-hover font-size-09 ms-4 semibold">Настройка профиля
                            гида</span>
                    </button>
                </ul>
                <svg class="h-100 expand-icon position-absolute" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                     height="20" width="20">
                    <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                </svg>
            </div>

            <guide-tours-component v-if="activeTitle === 'Мои экскурсии'"/>
            <guide-tour-objects-component v-if="activeTitle === 'Мои объекты'"/>


            <add-tour v-if="activeTitle === 'Добавить экскурсию'"
                      @hideAddExcursion="activeTitle='Мои экскурсии'"/>


            <add-tour-object v-if="activeTitle === 'Добавить объект'" @hideAddObject="activeTitle='Мои объекты'"/>
            <guide-transactions v-if="activeTitle === 'Транзакции'"/>
            <guide-schedule v-if="activeTitle === 'Календарь'"/>
            <guide-settings v-if="activeTitle === 'Настройки'"/>
            <guide-documents-component v-if="activeTitle === 'Документы'"/>
            <guide-tour-group-component v-if="selected&&activeTitle==='Бронирование групп'"
                                        @hideTourGroup="hide('Мои экскурсии')"
                                        :tour="selected"/>
            <edit-tour v-if="selected&&activeTitle==='Редактирование экскурсии'"
                       @hideEditExcursion="hide('Мои экскурсии')"
                       :tour-id="selected.id"/>
            <edit-tour-object v-if="selected&&activeTitle==='Редактирование объекта'"
                              @hideEditTourObject="hide('Мои объекты')"
                              :tour-object-id="selected.id"/>
        </div>
    </main>
</template>
<script>
import Breadcrumbs from "@/components/Fragments/Breadcrumbs.vue";
import AddTour from "@/components/Tours/AddTour.vue";
import EditTour from "@/components/Tours/EditTour.vue";
import AddTourObject from "@/components/TourObjects/AddTourObject.vue";
import EditTourObject from "@/components/TourObjects/EditTourObject.vue";

import GuideSchedule from "@/components/GuideCabinet/GuideSchedule.vue";
import GuideSettings from "@/components/GuideCabinet/GuideSettings.vue";
import GuideTransactions from "@/components/GuideCabinet/GuideTransactions.vue";

import {mapGetters} from "vuex";


export default {
    components: {
        EditTour,
        AddTourObject,
        EditTourObject,
        GuideSettings, GuideTransactions,
        GuideSchedule, AddTour, Breadcrumbs
    },
    computed: {
        user() {
            return window.user
        },

    },
    data() {
        return {
            isSendVerifiedRequest: false,
            visible: false,
            selected: null,
            breadcrumbs: [
                {
                    text: "Главная",
                    href: "/",
                },
                {
                    text: "Кабинет гида",
                    active: true,
                }],
            activeType: 'Действующие',
            activeTitle: 'Мои экскурсии',
        }
    },
    mounted() {

        this.eventBus.on('open_edit_tour_object_window', (tourObject) => {
            this.activeTitle = 'Редактирование объекта'
            this.selected = tourObject
        })

        this.eventBus.on('open_edit_tour_window', (tour) => {
            this.activeTitle = 'Редактирование экскурсии'
            this.selected = tour
        })

        this.eventBus.on('open_add_tours_window', () => {
            this.activeTitle = 'Добавить экскурсию'
        })

        this.eventBus.on('open_add_tour_objects_window', () => {
            this.activeTitle = 'Добавить объект'
        })


        this.eventBus.on('open_gide_tour_group', (tour) => {
            this.selected = tour
            this.activeTitle = 'Бронирование групп'
        });

    },
    methods: {
        verifiedProfile() {

            if (this.user.company.request_approve_at != null) {
                this.$notify({
                    title: "Кабинет гида",
                    text: "Запрос на верификацию уже отправлен! Дождитесь подтверждения!",
                    type: 'warn'
                });
                return;
            }


            this.$store.dispatch("requestGuideProfileVerified").then(() => {
                this.isSendVerifiedRequest = true
                this.$notify({
                    title: "Кабинет гида",
                    text: "Запрос на верификацию успешно отправлен",
                    type: 'success'
                });

            })
        },
        openMenu(menu, tab = null) {
            this.selected = null
            this.activeTitle = menu
            this.activeType = tab
        },
        hide(title) {
            this.selected = null
            this.activeTitle = title || 'Мои экскурсии'
        },
        toggle() {
            this.visible = !this.visible;
        },
        changeActiveTitle(title) {
            this.activeTitle = title;
        }
    }
}
</script>
<style lang="scss">


.personal-account-nav__link {
    &.active {
        div {
            i {
                color: white;
            }
        }
    }

    div {
        i {
            color: #0071eb;
            font-size: 14px;
        }
    }
}
</style>
