<template>
    <header class="d-none d-md-block w-100 dt-page-header dt-page-header--bg-image">
        <div class="">
            <div class="dt-page-header__actions d-flex justify-content-between">
                <div class="dt-actions__links align-items-center d-flex">
                    <ul class="dt-links__list d-flex">
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
                        <li class="dt-btn-entry">
                            <button class="dt-btn-blue dt-btn--weather">
                                <span class="me-3">Погода в горах</span>
                                <img v-lazy="'/img/icons/mountains.png'" alt="">
                            </button>
                        </li>
                        <li class="dt-btn-entry">
                            <a href="#">
                                <img width="18" height="18" v-lazy="'/img/icons/searchWhite.svg'" alt="search">
                            </a>
                        </li>
                        <li class="dt-btn-entry">
                            <a href="#">
                                <img width="18" height="18"
                                     v-lazy="'/img/icons/favorite_FILL0_wght600_GRAD0_opsz48_white.svg'"
                                     alt="favorite">
                            </a>
                        </li>
                        <li class="dt-btn-entry">
                            <a href="/messages">
                                <img width="18" height="18" v-lazy="'/img/icons/sms_FILL0_wght600_GRAD0_opsz48_white.svg'"
                                     alt="sms">
                            </a>
                        </li>
                        <li class="dt-btn-entry">
                            <h6>
                                <a data-bs-toggle="modal" data-bs-target="#dtModalEntry"
                                   class="text-muted text-decoration-none" href="#">ВХОД</a>
                            </h6>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
</template>
