<template>
    <section id="personal-account" class="personal-account">
        <main class="container">
            <breadcrumbs :items="breadcrumbs" />
            <div class="personal-account__row">
                <div class="personal-account-nav-mobile"
                     :class="{ 'personal-account-nav-mobile_active': visible }">
                    <div
                        class="personal-account-nav-mobile__select personal-account-nav-mobile__item personal-account-nav__item"
                        @click="toggle()">
                        <div
                            class="personal-account-nav-mobile__link personal-account-nav__link_active personal-account-nav__link">
                            <div class="personal-account-nav-mobile__icon personal-account-nav__icon"
                                 v-html="mobileMenuActive.svg"></div>
                            <span>{{ mobileMenuActive.title }}</span>
                        </div>
                    </div>
                    <ul class="personal-account-nav-mobile__list">
                        <li class="personal-account-nav-mobile__item personal-account-nav__item"
                            v-for="item in mobileMenu"
                            @click="mobileMenuItem(item)"
                            :key="item.title"
                        >
                            <div @click="toggle()"
                                 class="personal-account-nav-mobile__link personal-account-nav__link">
                                <div class="personal-account-nav-mobile__icon personal-account-nav__icon"
                                     v-html="item.svg"></div>
                                <span>{{ item.title }}</span>
                            </div>
                        </li>
                        <li class="personal-account-nav-mobile__item personal-account-nav-mobile__item_exit personal-account-nav__item">
                            <a href="/" class="personal-account-nav-mobile__link personal-account-nav__link">
                                <div class="personal-account-nav-mobile__icon personal-account-nav__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                         viewBox="0 0 44 44">
                                        <path
                                            d="M8.95 42.7q-1.6 0-2.775-1.175Q5 40.35 5 38.75V9.25Q5 7.6 6.175 6.425 7.35 5.25 8.95 5.25H23.7v4H8.95v29.5H23.7v3.95Zm24.4-8.95-2.9-2.8 5-4.95H18.4v-4h16.95l-5-4.95 2.9-2.8 9.75 9.8Z"/>
                                    </svg>
                                </div>
                                <span>Выход</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="personal-account-nav">
                    <ul class="personal-account-nav__list">
                        <li class="personal-account-nav__item"
                            v-for="item in mobileMenu"
                            @click="mobileMenuItem(item)"
                            :key="item.title"
                        >
                            <div class="personal-account-nav__link"
                                 :class="{ 'personal-account-nav__link_active': item.title === mobileMenuActive.title }"
                            >
                                {{ item.title }}
                                <div class="personal-account-nav__icon" v-html="item.svg"></div>
                            </div>
                        </li>
                        <li class="personal-account-nav__item">
                            <a href="/" class=" personal-account-nav__link">
                                Выход
                                <div class="personal-account-nav__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                         viewBox="0 0 44 44">
                                        <path
                                            d="M8.95 42.7q-1.6 0-2.775-1.175Q5 40.35 5 38.75V9.25Q5 7.6 6.175 6.425 7.35 5.25 8.95 5.25H23.7v4H8.95v29.5H23.7v3.95Zm24.4-8.95-2.9-2.8 5-4.95H18.4v-4h16.95l-5-4.95 2.9-2.8 9.75 9.8Z"/>
                                    </svg>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <user-change-password v-if="mobileMenuActive.title === 'Смена пароля'" />
                <user-orders v-if="mobileMenuActive.title === 'Мои заказы'" />
                <user-reviews v-if="mobileMenuActive.title === 'Мои отзывы'" />
                <user-transactions v-if="mobileMenuActive.title === 'Мои транзакции'" />
                <user-watched-tours v-if="mobileMenuActive.title === 'Просмотренные'" />
                <user-settings v-if="mobileMenuActive.title === 'Настройка профиля'" />
            </div>
        </main>
    </section>
</template>

<script>
import UserChangePassword from "@/components/UserCabinet/UserChangePassword.vue";
import UserOrders from "@/components/UserCabinet/UserOrders.vue";
import UserReviews from "@/components/UserCabinet/UserReviews.vue";
import UserTransactions from "@/components/UserCabinet/UserTransactions.vue";
import UserWatchedTours from "@/components/UserCabinet/UserWatchedTours.vue";
import UserSettings from "@/components/UserCabinet/UserSettings.vue";
import Breadcrumbs from "@/components/Fragments/Breadcrumbs.vue";

export default {
    name: "PersonalAccount",
    components: {
        Breadcrumbs,
        UserChangePassword,
        UserOrders,
        UserReviews,
        UserTransactions,
        UserWatchedTours,
        UserSettings,
    },
    data: () => ({
        visible: false,
        mobileMenuActive: {
            title: "Мои заказы",
            svg: '          <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"\n' +
                '                         viewBox="0 0 40 40">\n' +
                '                        <path\n' +
                '                            d="M14.35 44.25q-1.5 0-2.55-1.05-1.05-1.05-1.05-2.55 0-1.5 1.05-2.55 1.05-1.05 2.55-1.05 1.5 0 2.55 1.075 1.05 1.075 1.05 2.525 0 1.5-1.05 2.55-1.05 1.05-2.55 1.05Zm20 0q-1.5 0-2.55-1.05-1.05-1.05-1.05-2.55 0-1.5 1.05-2.55 1.05-1.05 2.55-1.05 1.5 0 2.55 1.075 1.05 1.075 1.05 2.525 0 1.5-1.05 2.55-1.05 1.05-2.55 1.05Zm-22.05-33 5 10.45h14.3l5.7-10.45Zm-1.85-3.6H39.1q1.5 0 2.3 1.35.8 1.35 0 2.75L35.15 23.1q-.6 1-1.525 1.625-.925.625-2.125.625H16.55l-2.6 4.9h24.3v3.6h-24.4q-2.35 0-3.35-1.575t.05-3.425l3.15-5.75L6.25 7.3h-4V3.7H8.6ZM17.3 21.7h14.3Z"/>\n' +
                '                    </svg>'
        },
        mobileMenu: [
            {
                title: "Мои заказы",
                svg: '          <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"\n' +
                    '                         viewBox="0 0 40 40">\n' +
                    '                        <path\n' +
                    '                            d="M14.35 44.25q-1.5 0-2.55-1.05-1.05-1.05-1.05-2.55 0-1.5 1.05-2.55 1.05-1.05 2.55-1.05 1.5 0 2.55 1.075 1.05 1.075 1.05 2.525 0 1.5-1.05 2.55-1.05 1.05-2.55 1.05Zm20 0q-1.5 0-2.55-1.05-1.05-1.05-1.05-2.55 0-1.5 1.05-2.55 1.05-1.05 2.55-1.05 1.5 0 2.55 1.075 1.05 1.075 1.05 2.525 0 1.5-1.05 2.55-1.05 1.05-2.55 1.05Zm-22.05-33 5 10.45h14.3l5.7-10.45Zm-1.85-3.6H39.1q1.5 0 2.3 1.35.8 1.35 0 2.75L35.15 23.1q-.6 1-1.525 1.625-.925.625-2.125.625H16.55l-2.6 4.9h24.3v3.6h-24.4q-2.35 0-3.35-1.575t.05-3.425l3.15-5.75L6.25 7.3h-4V3.7H8.6ZM17.3 21.7h14.3Z"/>\n' +
                    '                    </svg>'
            },
            {
                title: "Мои транзакции",
                svg: '    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"\n' +
                    '                         viewBox="0 0 44 44">\n' +
                    '                        <path\n' +
                    '                            d="M32.6 27.2q1.25 0 2.225-.975.975-.975.975-2.275 0-1.25-.975-2.2-.975-.95-2.225-.95t-2.225.95q-.975.95-.975 2.2 0 1.3.975 2.275.975.975 2.225.975ZM9.25 36.1v2.65-29.5V36.1Zm0 6.6q-1.55 0-2.75-1.175T5.3 38.75V9.25q0-1.6 1.2-2.8 1.2-1.2 2.75-1.2h29.5q1.65 0 2.825 1.2 1.175 1.2 1.175 2.8v6.45h-4V9.25H9.25v29.5h29.5v-6.4h4v6.4q0 1.6-1.175 2.775Q40.4 42.7 38.75 42.7Zm17.7-9.35q-1.65 0-2.7-1.025Q23.2 31.3 23.2 29.7V18.4q0-1.65 1.05-2.675t2.7-1.025H41.1q1.7 0 2.725 1.025Q44.85 16.75 44.85 18.4v11.3q0 1.6-1.025 2.625T41.1 33.35Zm14.9-3V17.7H26.2v12.65Z"/>\n' +
                    '                    </svg>'
            },
            {
                title: "Мои отзывы",
                svg: '       <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"\n' +
                    '                         viewBox="0 0 44 44">\n' +
                    '                        <path\n' +
                    '                            d="M3.3 44.7V7.25q0-1.6 1.175-2.8 1.175-1.2 2.775-1.2h33.5q1.6 0 2.8 1.2 1.2 1.2 1.2 2.8v25.5q0 1.55-1.2 2.75t-2.8 1.2H11.3Zm3.95-8.95 3-3h30.5V7.25H7.25Zm0-28.5v28.5Z"/>\n' +
                    '                    </svg>'
            },
            {
                title: "Настройка профиля",
                svg: '        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"\n' +
                    '                         viewBox="0 0 44 44">\n' +
                    '                        <path\n' +
                    '                            d="m18.8 44.7-1.05-6.5q-.8-.3-1.725-.825-.925-.525-1.575-1.075l-6.1 2.85-5.3-9.4 5.6-4.05q-.1-.35-.125-.85-.025-.5-.025-.85t.025-.85q.025-.5.125-.85l-5.6-4.1 5.3-9.3 6.15 2.8q.65-.55 1.55-1.05t1.7-.75l1.05-6.65h10.4l1.05 6.6q.8.3 1.725.775.925.475 1.575 1.075l6.1-2.8 5.3 9.3-5.6 4q.05.4.1.9t.05.9q0 .4-.05.875t-.1.875l5.6 4-5.3 9.4-6.15-2.85q-.65.55-1.525 1.1-.875.55-1.725.8l-1.05 6.5Zm5.15-14.2q2.7 0 4.6-1.9 1.9-1.9 1.9-4.6 0-2.7-1.9-4.6-1.9-1.9-4.6-1.9-2.7 0-4.6 1.9-1.9 1.9-1.9 4.6 0 2.7 1.9 4.6 1.9 1.9 4.6 1.9Zm0-3q-1.5 0-2.5-1.025t-1-2.475q0-1.45 1-2.475 1-1.025 2.5-1.025 1.45 0 2.475 1.025Q27.45 22.55 27.45 24q0 1.45-1.025 2.475Q25.4 27.5 23.95 27.5ZM24 24Zm-1.95 16.75h3.9l.7-5.6q1.7-.4 3.225-1.25 1.525-.85 2.725-2.1l5.3 2.3 1.75-3.25-4.65-3.4q.2-.85.325-1.7T35.45 24q0-.9-.1-1.75t-.35-1.7l4.65-3.4-1.75-3.25-5.3 2.3q-1.15-1.35-2.65-2.275-1.5-.925-3.3-1.125l-.7-5.55h-3.9l-.7 5.55q-1.75.3-3.275 1.2-1.525.9-2.725 2.2l-5.25-2.3-1.75 3.25 4.6 3.35q-.2.9-.325 1.75T12.5 24q0 .9.125 1.775.125.875.325 1.725l-4.6 3.35 1.75 3.25 5.25-2.3q1.25 1.25 2.775 2.125T21.35 35.2Z"/>\n' +
                    '                    </svg>'
            },
            {
                title: "Смена пароля",
                svg: '<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"\n' +
                    '                         viewBox="0 0 44 44">\n' +
                    '                        <path\n' +
                    '                            d="M11.25 44.65q-1.65 0-2.8-1.175T7.3 40.7V19.5q0-1.65 1.15-2.825Q9.6 15.5 11.25 15.5h2.95v-4.15q0-4.15 2.85-7.025T24 1.45q4.1 0 6.95 2.875Q33.8 7.2 33.8 11.35v4.15h2.95q1.65 0 2.825 1.175Q40.75 17.85 40.75 19.5v21.2q0 1.6-1.175 2.775Q38.4 44.65 36.75 44.65Zm0-3.95h25.5V19.5h-25.5v21.2ZM24 33.95q1.6 0 2.725-1.1t1.125-2.65q0-1.5-1.125-2.725T24 26.25q-1.6 0-2.725 1.225T20.15 30.2q0 1.55 1.125 2.65 1.125 1.1 2.725 1.1ZM18.15 15.5h11.7v-4.15q0-2.5-1.7-4.225Q26.45 5.4 24 5.4t-4.15 1.725q-1.7 1.725-1.7 4.225Zm-6.9 25.2V19.5v21.2Z"/>\n' +
                    '                    </svg>'
            },
            {
                title: "Просмотренные",
                svg: '      <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"\n' +
                    '                         viewBox="0 0 44 44">\n' +
                    '                        <path\n' +
                    '                            d="M23.8 42.7q-7.75 0-13.15-5.475T5.25 23.95h4q0 6.15 4.225 10.475Q17.7 38.75 23.8 38.75q6.25 0 10.575-4.375Q38.7 30 38.7 23.75q0-6.1-4.375-10.3-4.375-4.2-10.525-4.2-3.15 0-5.95 1.375Q15.05 12 12.9 14.3h4.7v3.35H6.55V6.7h3.3v5q2.7-3 6.3-4.725 3.6-1.725 7.65-1.725 3.9 0 7.325 1.475 3.425 1.475 6.025 4 2.6 2.525 4.075 5.9Q42.7 20 42.7 23.9q0 3.9-1.475 7.325Q39.75 34.65 37.15 37.2t-6.025 4.025Q27.7 42.7 23.8 42.7Zm6.3-10.4-7.7-7.6V13.85h3.3v9.45l6.8 6.6Z"/>\n' +
                    '                    </svg>'
            }
        ],
        breadcrumbs: [
            {
                text: "Главная",
                href: "/",
            },
            {
                text: "Личный кабинет",
                active: true,
            }],
    }),
    methods: {
        toggle() {
            this.visible = !this.visible;
            this.setBodyClass()
        },
        setBodyClass() {
            const body = document.body;
            body.classList.toggle('overflow')
        },
        mobileMenuItem(item) {
            this.mobileMenuActive.title = item.title;
            this.mobileMenuActive.svg = item.svg;
        },
    }
}
</script>

<style lang="scss">
body {
    &.overflow {
        &:after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(19, 20, 23, 0.5);
            z-index: 2;
        }
    }
}

.personal-account-nav-mobile {
    display: none;
}

@media screen and (max-width: 768px) {
    .personal-account-nav {
        display: none;

        &-mobile {
            display: block;
            position: relative;
            z-index: 999;

            &_active {
                .personal-account-nav-mobile {
                    &__list {
                        display: block;
                    }

                    &__select {
                        .personal-account-nav-mobile__link {
                            border-radius: 6px 6px 0 0;
                        }
                    }

                }
            }

            &__list {
                position: absolute;
                top: 50px;
                left: 0;
                right: 0;
                width: 100%;
                display: none;
            }

            &__item {
                height: 50px;
                margin-bottom: 0;

                &_exit {
                    .personal-account-nav-mobile__link {
                        border-radius: 0 0 6px 6px;
                    }
                }
            }

            &__link {
                border-radius: 0;
                display: grid;
                grid-template-columns: 28px 1fr;
                padding: 0 17px;
                font-size: 12px;
                line-height: 1.667;
            }

            &__select {
                .personal-account-nav-mobile__link {
                    border-radius: 6px;
                }
            }

        }
    }
}

</style>
