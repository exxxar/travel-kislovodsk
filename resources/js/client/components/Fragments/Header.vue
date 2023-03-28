<template>
    <header class="w-100 dt-page-header dt-page-header--bg-image" style="z-index: 9;">
        <div class="d-lg-block d-none">
            <div class="dt-page-header__actions d-flex justify-content-between">
                <div class="dt-actions__links align-items-center d-flex">
                    <ul class="dt-links__list d-flex">
                        <li>
                            <a href="/"
                               class="dt-link text-white text-decoration-none text-uppercase">Главная</a>
                        </li>
                        <li>
                            <a href="/about" target="_blank"
                               class="dt-link text-white text-decoration-none text-uppercase">О проекте</a>
                        </li>
                        <li>
                            <a href="/faq" target="_blank"
                               class="dt-link text-white text-decoration-none text-uppercase">FAQ</a>
                        </li>
                        <li>
                            <a href="/tours-all" target="_blank"
                               class="dt-link text-white text-decoration-none text-uppercase">Все экскурсии</a>
                        </li>
                        <li>
                            <a href="/tours-hot" target="_blank"
                               class="dt-link text-white text-decoration-none text-uppercase">Горящие
                                экскурсии</a>
                        </li>
                    </ul>
                </div>
                <div class="dt-actions__entry">
                    <ul class="dt-buttons d-flex align-items-center">
                        <li class="dt-btn-entry dt-btn--weather">
                            <button
                                data-bs-toggle="modal" data-bs-target="#find-weather"
                                class="dt-btn dt-btn-blue">
                                Погода в горах
                                <img class="ms-3" v-lazy="'/img/icons/mountains.png'" alt="">
                            </button>
                        </li>
                        <li class="dt-btn-entry entry-small">
                            <a href="/tours-all">
                                <img width="18" height="18" v-lazy="'/img/icons/searchWhite.svg'" alt="search">
                            </a>
                        </li>
                        <li class="dt-btn-entry entry-small" v-if="!user.is_guest">
                            <a href="/favorites">
                                <img width="18" height="18"
                                     v-lazy="'/img/icons/favorite_FILL0_wght600_GRAD0_opsz48_white.svg'"
                                     alt="favorite">
                            </a>
                        </li>
                        <li class="dt-btn-entry entry-small" v-if="!user.is_guest">
                            <a href="/messages">
                                <img width="18" height="18"
                                     v-lazy="'/img/icons/sms_FILL0_wght600_GRAD0_opsz48_white.svg'"
                                     alt="sms">
                                <span class="badge-danger bg-danger" v-if="hasMessages">TEST</span>
                            </a>
                        </li>
                        <li class="dt-btn-entry" v-if="user.is_guest">
                            <div class="dropdown">
                                <button class="btn humburger-btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-bars"></i>
                                </button>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#dtModalEntry"
                                           href="#">Вход</a></li>
                                    <li><a class="dropdown-item" data-bs-toggle="modal"
                                           data-bs-target="#dtModalRegistry"
                                           href="#">Регистрация</a></li>
                                    <li><a class="dropdown-item" data-bs-toggle="modal"
                                           @click="prepareRecoveryForm"
                                           data-bs-target="#dtModalRecovery-1"
                                           href="#">Восстановление пароля</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="dt-btn-entry" v-if="!user.is_guest">
                            <div class="d-flex justify-content-between dropdown">
                                <button class="border-0 btn user-avatar dropdown-toggle" type="button" id="dropdownMenuButton2"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    <p>{{ user.name }}</p>

                                    <img width="18" height="18"
                                         v-lazy="user.profile.photo"
                                         alt="profile photo">
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                    <li><a class="dropdown-item" v-if="user.is_user" href="/user-cabinet">Профиль
                                        пользователя</a></li>
                                    <li><a class="dropdown-item" v-if="user.is_guide" href="/guide-cabinet">Кабинет
                                        гида</a></li>
                                    <li><a class="dropdown-item" v-if="user.is_admin" href="/admin">Кабинет
                                        администратора</a></li>
                                    <li>
                                        <hr class="dropdown-divider bg-primary">
                                    </li>
                                    <li><a class="dropdown-item" href="/favorites">Избранные туры <span
                                        class="badge bg-primary text-white p-2">{{ statistic.favorites_count || 0 }}</span></a>
                                    </li>
                                    <li><a class="dropdown-item" href="/messages">Чаты <span
                                        class="badge bg-primary text-white p-2">{{ statistic.unread_chats_count || 0 }}</span></a>
                                    </li>
                                    <li><a class="dropdown-item disabled" href="#watched">Просмотренные туры <span
                                        class="badge bg-primary text-white p-2">{{ statistic.watched_count || 0 }}</span></a>
                                    </li>
                                    <li><a class="dropdown-item disabled" href="#booked">Забронированные туры <span
                                        class="badge bg-primary text-white p-2">{{ statistic.booked_count || 0 }}</span></a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider bg-primary">
                                    </li>
                                    <li><a class="dropdown-item" href="/logout">Выход</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="d-lg-none d-block">
            <div class="dt-menu">
                <div class="dt-menu__links position-relative">
                    <div class="align-items-center d-flex dropdown h-100 mx-0 position-relative px-0 rounded"
                         style="padding-left: 20px !important;">
                        <div type="button" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <div
                                class="col-auto menu-dots rounded d-flex px-0 gap-1 align-items-center justify-content-center">
                                <div class="menu-dot bg-white rounded"></div>
                                <div class="menu-dot bg-white rounded"></div>
                                <div class="menu-dot bg-white rounded"></div>
                            </div>
                        </div>
                        <ul class="dropdown-menu w-100 border-0" role="menu" style="z-index: 9999">
                            <li>
                                <a href="/about" class="dt-arrow-right blue-hover dropdown-item p-0 text-uppercase">
                                    О проекте
                                </a>
                            </li>
                            <li>
                                <a href="/faq" class="dt-arrow-right blue-hover dropdown-item p-0 text-uppercase">
                                    FAQ
                                </a>
                            </li>
                            <li>
                                <a href="/tours-all" class="dt-arrow-right blue-hover dropdown-item p-0 text-uppercase">
                                    Все экскурсии
                                </a>
                            </li>
                            <li>
                                <a href="/tours-hot" class="dt-arrow-right blue-hover dropdown-item p-0 text-uppercase">
                                    Горящие экскурсии
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="dt-links__list position-absolute">
                        <a href="/tours-hot" target="_blank"
                           class="dt-link text-white text-decoration-none text-uppercase">Горящие
                            экскурсии</a>
                    </div>
                </div>

                <div class="dt-actions__entry--mobile">
                    <ul class="dt-buttons d-flex align-items-center">
                        <li class="dt-btn-entry">
                            <a href="#">
                                <img width="18" height="18" v-lazy="'/img/icons/searchWhite.svg'" alt="search">
                            </a>
                        </li>
                        <li class="dt-btn-entry" v-if="!user.is_guest">
                            <a href="#">
                                <img width="18" height="18"
                                     v-lazy="'/img/icons/favorite_FILL0_wght600_GRAD0_opsz48_white.svg'"
                                     alt="favorite">
                            </a>
                        </li>
                        <li class="dt-btn-entry" v-if="!user.is_guest">
                            <a href="/messages">
                                <img width="18" height="18"
                                     v-lazy="'/img/icons/sms_FILL0_wght600_GRAD0_opsz48_white.svg'"
                                     alt="sms">
                            </a>
                        </li>
                        <li class="dt-btn-entry flex-fill" v-if="!user.is_guest">
                            <div class="d-flex justify-content-between dropdown">
                                <button class="border-0 btn user-avatar dropdown-toggle" type="button" id="dropdownMenuButton2"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    <img width="18" height="18" v-lazy="user.profile.photo" alt="profile photo">
                                    <p>{{ user.name }}</p>
                                </button>
                                <ul class="dropdown-menu" style="z-index: 9999" aria-labelledby="dropdownMenuButton2">
                                    <li><a class="dropdown-item" v-if="user.is_user" href="/user-cabinet">Профиль
                                        пользователя</a></li>
                                    <li><a class="dropdown-item" v-if="user.is_guide" href="/guide-cabinet">Кабинет
                                        гида</a></li>
                                    <li><a class="dropdown-item" v-if="user.is_admin" href="/admin">Кабинет
                                        администратора</a></li>
                                    <li>
                                        <hr class="dropdown-divider bg-primary">
                                    </li>
                                    <li><a class="dropdown-item" href="/favorites">Избранные туры <span
                                        class="badge bg-primary text-white p-2">{{ statistic.favorites_count || 0 }}</span></a>
                                    </li>
                                    <li><a class="dropdown-item" href="/messages">Чаты <span
                                        class="badge bg-primary text-white p-2">{{ statistic.unread_chats_count || 0 }}</span></a>
                                    </li>
                                    <li><a class="dropdown-item disabled" href="#watched">Просмотренные туры <span
                                        class="badge bg-primary text-white p-2">{{ statistic.watched_count || 0 }}</span></a>
                                    </li>
                                    <li><a class="dropdown-item disabled" href="#booked">Забронированные туры <span
                                        class="badge bg-primary text-white p-2">{{ statistic.booked_count || 0 }}</span></a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider bg-primary">
                                    </li>
                                    <li><a class="dropdown-item" href="/logout">Выход</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="dt-btn-entry flex-fill" v-if="user.is_guest">
                            <a data-bs-toggle="modal" data-bs-target="#dtModalEntry"
                               class="dt-btn__text-entry dt-text-muted--white-50 dt-none-link--white-50 text-decoration-none"
                               href="#">ВХОД</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <notifications/>


    <div class="modal fade" id="find-weather" tabindex="-1" aria-labelledby="find-weather" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Поиск погоды</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <find-weather-component/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    data() {
        return {
            hasMessages: false,
        }
    },
    computed: {
        ...mapGetters(['getErrors']),
        user() {
            return window.user;
        },
        statistic() {
            return window.statistic;
        }
    },
    mounted() {


        window.eventBus.on("fcm_logout_notification", () => {
            window.location.reload();
        })

        window.eventBus.on("fcm_message_notification", (data) => {

            if (data.user_ids.indexOf(this.user.id) !== -1) {
                this.$notify({
                    title: "Кисловодск-Туризм",
                    text: "Вам пришло новое сообщение!",
                    type: 'success'
                });
                this.hasMessages = true
            }

        })
    },
    watch: {
        getErrors: function (newVal, oldVal) {
            Object.keys(newVal).forEach(key => {
                this.$notify({
                    title: "Кисловодск-Туризм",
                    text: newVal[key],
                    type: 'warn'
                });
            })

        }
    },
    methods: {
        prepareRecoveryForm() {
            this.eventBus.emit("reset_recovery_form");
        }
    }
}
</script>

<style lang="scss">
.humburger-btn {
    &:active,
    &:focus {
        outline: none;
    }

    i {
        color: white;
        font-size: 24px;
        padding: 0;
        margin: 0;

        &:focus {
            outline: none;
        }
    }
}

.user-avatar {
    display: flex;
    justify-content: center;
    align-items: center;


    p {
        color: white;
        padding: 0px 15px 0px 0px;
    }

    img {
        height: 50px;
        width: 50px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px white solid;
        box-shadow: 0 0 2px 0px black;
    }
}

@media (max-width: 991.98px) {
    .user-avatar {
        p {
            padding: 0;
        }
        img {
            height: 28px;
            width: 28px;
            border-radius: 6px;
            border: none;
            margin-right: 5px;
        }
    }
}
</style>
