<template>
    <footer class="dt-page-footer text-center position-relative">
        <div class="dt-page-footer__shadow"></div>
        <div class="container" style="z-index: 4; position: relative;">
            <ul class="dt-links__list dt-sitemap__links justify-content-between h-100">
                <li>
                    <a href="/partners" target="_blank"
                       class="dt-link text-white text-decoration-none text-uppercase">Партнерам</a>
                </li>
                <li>
                    <a href="/for-guides" target="_blank"
                       class="dt-link text-white text-decoration-none text-uppercase">Гидам</a>
                </li>
                <li>
                    <a href="/for-tourist" target="_blank"
                       class="dt-link text-white text-decoration-none text-uppercase">Путешественникам</a>
                </li>
                <li>
                    <a href="/faq" target="_blank"
                       class="dt-link text-white text-decoration-none text-uppercase">FAQ</a>
                </li>
                <li>
                    <a href="/about" target="_blank"
                       class="dt-link text-white text-decoration-none text-uppercase">О проекте</a>
                </li>
                <li>
                    <a href="#" target="_blank"
                       class="dt-link text-white text-decoration-none text-uppercase">Вход</a>
                </li>
                <li>
                    <a href="/tour-search" target="_blank"
                       class="dt-link text-white text-decoration-none text-uppercase">Поиск экскурсий</a>
                </li>
                <li>
                    <a href="/contacts" target="_blank"
                       class="dt-link text-white text-decoration-none text-uppercase">Контакты</a>
                </li>
                <li>
                    <a href="/contact-us" target="_blank"
                       class="dt-link text-white text-decoration-none text-uppercase">Связаться с нами</a>
                </li>
                <li>
                    <a href="/how-become-guide" target="_blank"
                       class="dt-link text-white text-decoration-none text-uppercase">Как стать гидом</a>
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
                    <div class="col-lg-4 col-12 dt-order-payments">
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
                    <div class="col-lg-4 col-12 dt-order-privacy">
                        <div class="dt-privacy text-end">
                            <a href="#"
                               class="dt-link dt-link--thin-12 text-white text-decoration-underline">
                                политика конфиденциальности
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dt-wrapper--black-50 position-absolute top-0"></div>
    </footer>
</template>
