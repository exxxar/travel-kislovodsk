<template>
    <footer class="dt-page-footer text-center">
        <div class="dt-page-footer__shadow"></div>
        <div class="container" style="z-index: 4; position: relative;">
            <ul class="dt-sitemap__links">
                <li>
                    <a href="/partners" target="_blank"
                           class="dt-link text-white text-decoration-none text-uppercase">Партнерам</a>
                </li>
                <li>
                    <h6><a href="/for-guides'" target="_blank"
                           class="dt-link text-white text-decoration-none text-uppercase">Гидам</a></h6>
                </li>
                <li>
                    <h6><a href="/for-tourist" target="_blank"
                           class="dt-link text-white text-decoration-none text-uppercase">Путешественникам</a>
                    </h6>
                </li>
                <li>
                    <h6><a href="/faq" target="_blank"
                           class="dt-link text-white text-decoration-none text-uppercase">FAQ</a></h6>
                </li>
                <li>
                    <h6><a href="/about" target="_blank"
                           class="dt-link text-white text-decoration-none text-uppercase">О проекте</a></h6>
                </li>
                <li>
                    <h6><a href="#" target="_blank"
                           class="dt-link text-white text-decoration-none text-uppercase">Вход</a></h6>
                </li>
                <li>
                    <h6><a href="/tour-search" target="_blank"
                           class="dt-link text-white text-decoration-none text-uppercase">Поиск экскурсий</a>
                    </h6>
                </li>
                <li>
                    <h6><a href="/contacts" target="_blank"
                           class="dt-link text-white text-decoration-none text-uppercase">Контакты</a></h6>
                </li>
                <li>
                    <h6><a href="/contact-us" target="_blank"
                           class="dt-link text-white text-decoration-none text-uppercase">Связаться с нами</a>
                    </h6>
                </li>
                <li>
                    <h6><a href="/how-become-guide" target="_blank"
                           class="dt-link text-white text-decoration-none text-uppercase">Как стать гидом</a>
                    </h6>
                </li>
            </ul>

        </div>
        <div class="dt-page-footer__line"></div>
        <div class="container" style="z-index: 4; position: relative;">
            <div class="dt-years-payments">
                <div class="row">
                    <div class="col-lg-4 col-12 dt-order-name">
                        <div class="dt-years text-start">
                            <h5 class="text-muted-white">2012-2022 "Название"</h5>
                        </div>
                    </div>
                    <div class="col-4 col-12 dt-order-payments">
                        <div class="dt-payments">
                            <ul class="d-flex dt-payments__list justify-content-center">
                                <li class="dt-payments__item">
                                    <img class="dt-payment" v-lazy="'/img/payments/1.png'" alt="visa">
                                </li>
                                <li class="dt-payments__item">
                                    <img class="dt-payment" v-lazy="'/img/payments/2.png'" alt="master">
                                </li>
                                <li class="dt-payments__item">
                                    <img class="dt-payment" v-lazy="'/img/payments/3.png'" alt="mir">
                                </li>
                                <li class="dt-payments__item">
                                    <img class="dt-payment" v-lazy="'/img/payments/4.png'" alt="youmoney">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-4 col-12 dt-order-privacy">
                        <div class="dt-privacy text-end">
                            <h6>
                                <a href="#" class="dt-link text-white text-uppercase text-decoration-underline">ПОЛИТИКА КОНФИДЕНЦИАЛЬНОСТИ</a>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>
