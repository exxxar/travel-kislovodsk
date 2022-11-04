<template>
    <div class="card dt-travel-card">
        <div class="card-header bg-white p-0 position-relative">
            <div class="card-img">
                <div class="dt-wrapper-gradient position-absolute"></div>
                <h5 class="dt-excursion-type">мини-группа</h5>
                <div class="dt-like d-flex align-items-center justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18"
                         viewBox="0 0 50 50" overflow="visible">
                        <path d="m23.95 42.9-2.5-2.25q-5.4-4.95-8.9-8.525t-5.575-6.4q-2.075-2.825-2.9-5.15-.825-2.325-.825-4.725 0-4.8 3.225-8.05Q9.7 4.55 14.45 4.55q2.85 0 5.25 1.275t4.25 3.725q2.2-2.6 4.5-3.8 2.3-1.2 5-1.2 4.8 0 8.05 3.25 3.25 3.25 3.25 8.05 0 2.4-.825 4.7-.825 2.3-2.9 5.125t-5.6 6.425q-3.525 3.6-8.875 8.55Zm0-5.2q5.05-4.65 8.3-7.95 3.25-3.3 5.15-5.75 1.9-2.45 2.625-4.375.725-1.925.725-3.775 0-3.2-2.025-5.25T33.5 8.55q-2.5 0-4.65 1.575-2.15 1.575-3.5 4.425H22.6q-1.3-2.8-3.475-4.4-2.175-1.6-4.675-1.6-3.15 0-5.175 2.05T7.25 15.85q0 1.9.75 3.85.75 1.95 2.65 4.45t5.15 5.75q3.25 3.25 8.15 7.8Zm.1-14.6Z"/>
                    </svg>
                </div>
                <img class="dt-excursion__image" src="/img/travels/1.jpg" alt="">
                <div class="dt-price d-flex justify-content-between position-absolute w-100">
                    <h5 class="align-items-end d-flex dt-price__sum text-white">
                        <span class="fw-bold text-white me-2">1700 руб.</span>
                        <span class="dt-price__title text-uppercase text-muted-white d-lg-block d-md-block d-none">
                                                        за человека
                                                    </span>
                        <span class="dt-price__title text-uppercase text-muted-white d-block d-md-none">
                                                        за чел.
                                                    </span>
                    </h5>
                    <h5 class="dt-price__time text-uppercase text-muted-white">4 часа</h5>
                </div>
            </div>
        </div>
        <div class="card-body bg-white">
            <div class="card-body__excursion-rating d-flex justify-content-between">
                <div class="dt-rating d-flex">
                    <h5 class="dt-rating__title text-muted-black me-2">
                        рейтинг экскурсии
                    </h5>
                    <h5 class="fw-bold color-black">4.67</h5>
                </div>
                <div class="dt-rating__star d-flex">
                    <img src="/img/icons/star_blue.svg" alt="">
                    <img src="/img/icons/star_blue.svg" alt="">
                    <img src="/img/icons/star_blue.svg" alt="">
                    <img src="/img/icons/star_blue.svg" alt="">
                    <img src="/img/icons/star_blue.svg" alt="">
                </div>
            </div>
            <div class="card-body__excursion">
                <div class="card-body__excursion-name">
                    <h4 class="fw-bold">Бермамыт</h4>
                </div>
                <div class="card-body__excursion-description fw-light">
                    <h5>
                        Это путешествие, пожалуй одно из самых впечатляющих из всех
                        экскурсий по Северному Кавказу.
                    </h5>
                </div>
            </div>
            <div class="card-body__excursion-date d-flex justify-content-between">
                <div class="dt-calendar d-flex align-items-center">
                    <img src="/img/icons/calendar_today_FILL0_wght400_GRAD0_opsz48_blue.svg"
                         alt="calendar" style="width: 18px; height: 16px" class="me-2">
                    <h5 class="text-muted-black d-lg-block d-md-block d-none">ближайшая
                        дата</h5>
                    <h5 class="text-muted-black d-block d-md-none">ближ. дата</h5>
                </div>
                <h5 class="fw-bold">15 августа в 10:00</h5>
            </div>
        </div>
        <div class="card-footer bg-white text-center">
            <a href="#" class="text-uppercase dt-travel-card__action">
                <h6 class="dt-btn-text">Все даты и запись</h6>
            </a>
        </div>
    </div>
</template>
