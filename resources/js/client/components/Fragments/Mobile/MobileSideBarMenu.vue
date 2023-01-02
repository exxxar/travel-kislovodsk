<template>
    <Transition duration="550" name="nested">
        <div class="sidebar-menu outer" v-if="show">

            <div
                v-if="!user.is_guest"
                class="flex-shrink-0  bg-white inner sidebar" style="width: 280px;">

                <div class="row justify-content-end p-2 sidebar-header">
                    <div class="col-auto">
                        <button class="btn close-btn"
                                @click="show = false"
                                id="sidenav-close"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                </div>


                <div class="user-profile text-center py-3">
                    <img v-lazy="user.profile.photo" alt="">
                    <h6 class="user-name text-whie">{{ user.name }}</h6>
                    <div v-if="user.is_guide">
                        <p v-if="user.company.approve_at!=null" class="text-white">
                            <i class="fa-solid fa-check" style="color:green;"></i> Подтвержденный аккаунт
                        </p>

                        <p v-if="user.company.approve_at==null&&user.company.request_approve_at==null">
                            Ваш аккаунт не верифицирован!<a href="#request-verify" @click="verifiedProfile">Запросить
                            верификацию.</a>
                        </p>

                        <p v-if="user.company.approve_at==null&&user.company.request_approve_at">
                            Аккаунт ожидает подтверждение
                        </p>
                    </div>

                </div>

                <div class="p-2">
                    <div class="card">
                        <div class="card-body">
                            <p class="pt-1 pb-1"><a class="dropdown-item d-flex justify-content-between" href="/favorites">Избранные туры <span
                                class="badge bg-primary text-white p-2">{{ statistic.favorites_count || 0 }}</span></a>
                            </p>
                            <p class="pt-1 pb-1"><a class="dropdown-item d-flex justify-content-between" href="/messages">Чаты <span
                                class="badge bg-primary text-white p-2">{{ statistic.unread_chats_count || 0 }}</span></a>
                            </p>
                            <p class="pt-1 pb-1"><a class="dropdown-item disabled d-flex justify-content-between" href="#watched">Просмотренные туры <span
                                class="badge bg-primary text-white p-2">{{ statistic.watched_count || 0 }}</span></a>
                            </p>
                            <p class="pt-1 pb-1"><a class="dropdown-item disabled d-flex justify-content-between" href="#booked">Забронированные туры <span
                                class="badge bg-primary text-white p-2">{{ statistic.booked_count || 0 }}</span></a>
                            </p>

                        </div>
                    </div>
                </div>


                <ul class="sidebar-menu-list p-3">
                    <li class="mb-1">
                        <button class="btn btn-toggle rounded w-100 text-left"
                                data-bs-toggle="collapse" data-bs-target="#home-collapse"
                                aria-expanded="true">
                            <i class="fa-solid fa-house primary-text-color"></i> Основное
                        </button>
                        <div class="collapse show" id="home-collapse" style="">
                            <ul class="btn-toggle-nav fw-normal pb-1 small">
                                <li><a href="/" class="link-dark rounded">Главная страница</a></li>
                                <li><a href="/messages" class="link-dark rounded">Чаты</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-toggle rounded collapsed w-100 text-left"
                                data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                            <i class="fa-solid fa-map-location-dot primary-text-color"></i> Туры
                        </button>
                        <div class="collapse" id="dashboard-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="/tours-all" class="link-dark rounded">Поиск туров</a></li>
                                <li><a href="/tours-hot" class="link-dark rounded">Горячие туры</a></li>
                                <li><a href="/tours-watched" class="link-dark rounded">Просмотренные туры</a></li>
                                <li><a href="/tours-booked" class="link-dark rounded">Забронированные туры</a></li>
                                <li><a href="/favorites" class="link-dark rounded">Понравившиеся туры</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-toggle rounded collapsed w-100 text-left"
                                data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                            <i class="fa-solid fa-circle-info primary-text-color"></i> Информационный блок
                        </button>
                        <div class="collapse" id="orders-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="/partners" class="link-dark rounded">Партнерам</a></li>
                                <li><a href="/for-guides" class="link-dark rounded">Гидам</a></li>
                                <li><a href="/for-tourist" class="link-dark rounded">Путешественникам</a></li>
                                <li><a href="/faq" class="link-dark rounded">FAQ</a></li>
                                <li><a href="/about" class="link-dark rounded">О проекте</a></li>
                                <li><a href="/contacts" class="link-dark rounded">Контакты</a></li>
                                <li><a href="/contact-us" class="link-dark rounded">Связь с нами</a></li>
                                <li><a href="/how-become-guide" class="link-dark rounded">Как стать гидом</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="border-top my-3"></li>
                    <li class="mb-1">
                        <button class="btn btn-toggle rounded collapsed w-100 text-left"
                                data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                            <i class="fa-solid fa-user primary-text-color"></i> Аккаунт
                        </button>
                        <div class="collapse" id="account-collapse">
                            <ul class="btn-toggle-nav fw-normal pb-1 small">
                                <li><a href="/settings" class="link-dark rounded">Настройки</a></li>
                                <li><a href="/logout" class="link-dark rounded">Выйти</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>

            <div
                v-if="user.is_guest"
                class="flex-shrink-0  bg-white inner sidebar" style="width: 280px;">

                <div class="row justify-content-end p-2 sidebar-header">
                    <div class="col-auto">
                        <button class="btn close-btn"
                                @click="show = false"
                                id="sidenav-close"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                </div>

                <ul class="sidebar-menu-list p-3">
                    <li class="mb-1">
                        <a href="/" class="btn btn-toggle rounded w-100 text-left">

                            <i class="fa-solid fa-house primary-text-color"></i> Главная страница
                        </a>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-toggle rounded w-100 text-left"
                                data-bs-toggle="collapse" data-bs-target="#home-collapse"
                                aria-expanded="true">
                            <i class="fa-solid fa-right-to-bracket primary-text-color"></i> Авторизация
                        </button>
                        <div class="collapse show" id="home-collapse" style="">
                            <ul class="btn-toggle-nav fw-normal pb-1 small">
                                <li><a href="/login" class="link-dark rounded">Вход</a></li>
                                <li><a href="/register" class="link-dark rounded">Регистрация</a></li>
                                <li><a href="/forgot-password" class="link-dark rounded">Восстановление пароля</a></li>
                                <li><a href="/rules" class="link-dark rounded">Правила использования платформы</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-toggle rounded collapsed w-100 text-left"
                                data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                            <i class="fa-solid fa-map-location-dot primary-text-color"></i> Туры
                        </button>
                        <div class="collapse" id="dashboard-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="/group-register" class="link-dark rounded">Заявка в МЧС</a></li>
                                <li><a href="/tours-all" class="link-dark rounded">Поиск туров</a></li>
                                <li><a href="/tours-hot" class="link-dark rounded">Горячие туры</a></li>
                                <li><a href="/weather" class="link-dark rounded">Погода в горах</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-toggle rounded collapsed w-100 text-left"
                                data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                            <i class="fa-solid fa-circle-info primary-text-color"></i> Информационный блок
                        </button>
                        <div class="collapse" id="orders-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="/partners" class="link-dark rounded">Партнерам</a></li>
                                <li><a href="/for-guides" class="link-dark rounded">Гидам</a></li>
                                <li><a href="/for-tourist" class="link-dark rounded">Путешественникам</a></li>
                                <li><a href="/faq" class="link-dark rounded">FAQ</a></li>
                                <li><a href="/about" class="link-dark rounded">О проекте</a></li>
                                <li><a href="/contacts" class="link-dark rounded">Контакты</a></li>
                                <li><a href="/contact-us" class="link-dark rounded">Связь с нами</a></li>
                                <li><a href="/how-become-guide" class="link-dark rounded">Как стать гидом</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="backdrop" @click="show = false"></div>

        </div>
    </Transition>
</template>
<script>
export default {
    data() {
        return {
            show: false
        }
    },
    computed: {
        user() {
            return window.user
        },
        statistic() {
            return window.statistic;
        }
    },
    mounted() {
        this.eventBus.on("toggle-sidebar-menu", () => {
            this.show = !this.show
        })
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
    }

}
</script>
<style lang="scss">

.nested-enter-active, .nested-leave-active {
    transition: all 0.3s ease-in-out;
}

/* delay leave of parent element */
.nested-leave-active {
    transition-delay: 0.25s;
}

.nested-enter-from,
.nested-leave-to {
    transform: translateY(-30px);
    opacity: 0;
}

/* we can also transition nested elements using nested selectors */
.nested-enter-active .inner,
.nested-leave-active .inner {
    transition: all 0.3s ease-in-out;
}

/* delay enter of nested element */
.nested-enter-active .inner {
    transition-delay: 0.25s;
}

.nested-enter-from .inner,
.nested-leave-to .inner {
    transform: translateX(-30px);
    /*
        Hack around a Chrome 96 bug in handling nested opacity transitions.
      This is not needed in other browsers or Chrome 99+ where the bug
      has been fixed.
    */
    opacity: 0.001;
}

.sidebar-menu {
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    width: 100%;
    z-index: 99999;

    .sidebar-header {
        background-color: #0a53be;
        margin: 0;

        .close-btn {
            i {
                color: white;
            }
        }
    }

    .sidebar-menu-list {
        li {
            ul {
                li {
                    padding: 10px;
                }
            }
        }
    }


    & > .sidebar {
        height: 100vh;
        position: relative;
        z-index: 2;
        overflow-y: auto;
        padding-bottom: 200px;
    }

    & > .backdrop {
        background-color: rgba(0, 0, 0, 0.58);
        width: 100%;
        height: 100%;
        position: absolute;
        z-index: 1;
        top: 0;
        left: 0;
    }

    .user-profile {
        width: 100%;
        min-height: 200px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        background-color: #0a53be;

        .user-name {
            margin-top: 20px;
            font-size: 14px;
            color: white;
            text-transform: uppercase;
        }

        img {
            width: 95px;
            height: 95px;
            border-radius: 50%;
            border: 5px white solid;
            object-fit: cover;
        }
    }
}

.text-left {
    text-align: left;
}

.primary-text-color {
    color: #0a53be;
}
</style>
