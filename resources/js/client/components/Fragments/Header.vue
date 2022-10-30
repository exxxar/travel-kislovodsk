<template>
    <header class="dt-page-header d-none d-md-block">
        <div class="">
            <div class="dt-page-header__actions d-flex justify-content-between">
                <div class="dt-actions__links align-items-center d-flex">
                    <ul class="dt-links__list d-flex">
                        <li>
                            <h6>
                                <a href="/about"
                                   target="_blank"
                                   class="dt-link text-white text-decoration-none text-uppercase">О проекте</a>
                            </h6>
                        </li>
                        <li>
                            <h6>
                                <a href="/faq"
                                   target="_blank" class="dt-link text-white text-decoration-none text-uppercase">FAQ</a>
                            </h6>
                        </li>
                        <li>
                            <h6>
                                <a href="/tours-all"
                                   target="_blank"
                                   class="dt-link text-white text-decoration-none text-uppercase">Все
                                    экскурсии</a>
                            </h6>
                        </li>
                        <li>
                            <h6>
                                <a href="/tours-hot"
                                   target="_blank"
                                   class="dt-link text-white text-decoration-none text-uppercase">Горяшие
                                    экскурсии</a>
                            </h6>
                        </li>
                    </ul>
                </div>
                <div class="dt-actions__entry">
                    <ul class="dt-buttons d-flex align-items-center">
                        <li class="dt-btn-entry" style="display: none">
                            <button class="dt-btn-blue">
                                <span>Погода в горах</span>
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
                            <a href="#"><img width="18" height="18"
                                             v-lazy="'/img/icons/sms_FILL0_wght600_GRAD0_opsz48_white.svg'"
                                             alt="sms"></a>
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

            <div class="container dt-page-header__content text-center" style="display:none;">
                <p class="dt-page__title">Экскурсии по Ставропольскому краю</p>
                <div class="d-flex">
                    <h5>Куда?</h5>
                    <label class="dt-switch">
                        <input type="checkbox">
                        <span class="dt-slider"></span>
                    </label>
                    <h5>Откуда?</h5>
                </div>
            </div>
        </div>
    </header>
</template>
