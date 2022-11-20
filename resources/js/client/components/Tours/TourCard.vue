<template>
    <div class="card dt-travel-card" v-if="data">
        <div class="card-header bg-white p-0 position-relative">
            <div class="card-img">
                <div class="dt-wrapper-gradient position-absolute"></div>
                <h5 class="dt-excursion-type">{{ data.tour_type }}</h5>
                <div class="dt-like d-flex align-items-center justify-content-center">
                    <svg v-if="!data.complete && !data.review" xmlns="http://www.w3.org/2000/svg" height="18" width="18"
                         viewBox="0 0 50 50" overflow="visible">
                        <path
                            d="m23.95 42.9-2.5-2.25q-5.4-4.95-8.9-8.525t-5.575-6.4q-2.075-2.825-2.9-5.15-.825-2.325-.825-4.725 0-4.8 3.225-8.05Q9.7 4.55 14.45 4.55q2.85 0 5.25 1.275t4.25 3.725q2.2-2.6 4.5-3.8 2.3-1.2 5-1.2 4.8 0 8.05 3.25 3.25 3.25 3.25 8.05 0 2.4-.825 4.7-.825 2.3-2.9 5.125t-5.6 6.425q-3.525 3.6-8.875 8.55Zm0-5.2q5.05-4.65 8.3-7.95 3.25-3.3 5.15-5.75 1.9-2.45 2.625-4.375.725-1.925.725-3.775 0-3.2-2.025-5.25T33.5 8.55q-2.5 0-4.65 1.575-2.15 1.575-3.5 4.425H22.6q-1.3-2.8-3.475-4.4-2.175-1.6-4.675-1.6-3.15 0-5.175 2.05T7.25 15.85q0 1.9.75 3.85.75 1.95 2.65 4.45t5.15 5.75q3.25 3.25 8.15 7.8Zm.1-14.6Z"/>
                    </svg>
                    <svg v-if="data.complete || data.review" class="opacity-1" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="14"
                         viewBox="0 0 18 14">
                        <image id="done_FILL0_wght600_GRAD0_opsz48" width="18" height="14"
                               xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAAOCAYAAAAi2ky3AAAAoklEQVQoka3SvwpBYRQA8B/dFAaewztIFhPlCWxeTNmMDBaLwWt4AJOUTfrKV7fbxedeZz2nX+dfY3mcqxEdZLhmNZEtuphUhSIyxh2D5h+QKU6/QmXIISQi1EarKhKhULDD5gP2EYnQECPM3mBfkQjtscCjBEtC8jtal2D9VMTrK+WwEKsXdkYvBSlCRSwZyY9WxMKYt1SkrKM8Fo5wSUHgCWEEMQufwN2RAAAAAElFTkSuQmCC"/>
                    </svg>
                </div>
                <img class="dt-excursion__image" v-lazy="data.preview_image" alt="">
                <div v-if="data.payment != null" class="dt-price d-flex justify-content-between position-absolute w-100 align-items-end">
                    <h5 class="align-items-end d-flex dt-price__sum text-white">
                        <span class="dt-price__title text-uppercase text-muted-white me-2s">
                                                        {{ data.payment ? 'оплачено' : 'ожидание оплаты' }}
                                                    </span>
                        <span class="fw-bold text-white me-2">{{ data.pricePayment }} руб.</span>
                        <span class="dt-price__title text-uppercase text-muted-white">
                                                        {{ data.payment ? 'за 3 чел.' : '' }}
                                                    </span>
                    </h5>
                </div>
                <div v-else class="dt-price d-flex justify-content-between position-absolute w-100 align-items-end">
                    <h5 class="align-items-end d-flex dt-price__sum text-white">
                        <span class="fw-bold text-white me-2">{{ data.base_price }} руб.</span>
                        <span class="dt-price__title text-uppercase text-muted-white d-lg-block d-md-block d-none">
                                                        за человека
                                                    </span>
                        <span class="dt-price__title text-uppercase text-muted-white d-block d-md-none">
                                                        за чел.
                                                    </span>
                    </h5>
                    <h5 class="dt-price__time text-uppercase text-muted-white">{{ data.time }}</h5>
                </div>
            </div>
        </div>
        <div class="card-body bg-white">
            <div class="card-body__excursion-rating d-flex justify-content-between">
                <div class="dt-rating d-flex">
                    <h5 class="dt-rating__title text-muted-black me-2">
                        рейтинг экскурсии
                    </h5>
                  <h5 class="fw-bold color-black">{{ data.rating }}</h5>
                </div>
                <div class="dt-rating__star d-flex">
                    <img v-lazy="data.rating>=1?'/img/icons/star_blue.svg':'/img/icons/star_grey.svg'"  alt="">
                    <img v-lazy="data.rating>=2?'/img/icons/star_blue.svg':'/img/icons/star_grey.svg'"  alt="">
                    <img v-lazy="data.rating>=3?'/img/icons/star_blue.svg':'/img/icons/star_grey.svg'"  alt="">
                    <img v-lazy="data.rating>=4?'/img/icons/star_blue.svg':'/img/icons/star_grey.svg'"  alt="">
                    <img v-lazy="data.rating>=5?'/img/icons/star_blue.svg':'/img/icons/star_grey.svg'"  alt="">
                </div>
            </div>
            <div class="card-body__excursion">
                <div class="card-body__excursion-name">
                    <h4 class="fw-bold">{{ data.title }}</h4>
                </div>
                <div class="card-body__excursion-description fw-light">
                    <h5>{{ data.short_description }}</h5>
                </div>
            </div>
            <div v-if="data.dateEnd && data.finish" class="card-body__excursion-date d-flex justify-content-between">
                <div class="dt-calendar d-flex align-items-center">
                    <img v-lazy="'/img/icons/calendar_today_FILL0_wght400_GRAD0_opsz48_blue.svg'"
                         alt="calendar" style="width: 18px; height: 16px" class="me-2">
                    <h5 class="text-muted-black d-lg-block d-md-block d-none">дата окончания</h5>
                    <h5 class="text-muted-black d-block d-md-none">дата оконч.</h5>
                </div>
                <h5 class="fw-bold">{{ data.date }}</h5>
            </div>
            <div v-if="!data.dateStart && !data.finish" class="card-body__excursion-date d-flex justify-content-between">
                <div class="dt-calendar d-flex align-items-center">
                    <img v-lazy="'/img/icons/calendar_today_FILL0_wght400_GRAD0_opsz48_blue.svg'"
                         alt="calendar" style="width: 18px; height: 16px" class="me-2">
                    <h5 class="text-muted-black d-lg-block d-md-block d-none">ближайшая
                        дата</h5>
                    <h5 class="text-muted-black d-block d-md-none">ближ. дата</h5>
                </div>
                <h5 class="fw-bold">{{ data.date }}</h5>
            </div>

            <div v-if="data.dateStart && !data.finish" class="position-relative personal-account-orders-info card-body__excursion-date
                        d-flex justify-content-between">
                <div class="dt-wrapper--black-50"></div>
                <div class="personal-account-orders-info__item dt-calendar d-flex align-items-center">
                    <img class="personal-account-orders-info__img me-2"
                         v-lazy="'/img/icons/calendar_today_FILL0_wght400_GRAD0_opsz48_blue.svg'"
                         alt="calendar" style="width: 18px; height: 16px">
                    <h5 class="personal-account-orders-info__text d-lg-block d-md-block"
                        :class="{'dt-text-muted--white-50': !data.payment}">
                        <div class="personal-account-orders-info__text_grey">
                            дата начала
                        </div>
                        {{ data.dateStart }}
                    </h5>
                </div>
                <div class="personal-account-orders-info__item dt-calendar d-flex align-items-center">
                    <svg class="personal-account-orders-info__img me-2"
                         xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="16"
                         viewBox="0 0 13 16">
                        <image id="location_on_FILL0_wght400_GRAD0_opsz48" width="13"
                               height="16"
                               xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA0AAAAQCAYAAADNo/U5AAABN0lEQVQokYXSP0tcURAF8J+i7YI2GkHsxMIvICwi2kRQ8gFUrGysTBqt7ewWhBQJ2Ii9fxIQi6CmDlikspIgSLTSzkZllnlw9yF6YODdmXPuu2dmuny+U0MDHzGa6Usc46GiddcEq/iHFiYyWplbrUg9hWArCxF7eCouXsBXjGC9Es3gC6bxu/b3EO/iCr9wUnk6xH+s1A3W8B0DlacmDop6NOMoo1Hkg9MMURf6cF0UpzCXMVnkg9MXnp6znUO4yOIpfmbtvBB9CG7laR/3WH7H0w76K0/b2dbxNwRjWAxuuRFhcjgH+lgT9OYzb/Gp3Iho9yC+ZXNKxEtisO2RlBsRt8znjTfYyPwmlrKLwekQBf6k8EeeYxvWsvVRa6MuCsSqzOaWBOL7rCS8JgoEKbYk5vS3o4IXC9BBg8EJGV4AAAAASUVORK5CYII="/>
                    </svg>
                    <h5 class="personal-account-orders-info__text d-lg-block d-md-block"
                        :class="{'dt-text-muted--white-50': !data.payment}">
                        <div class="personal-account-orders-info__text_grey">
                            место встречи
                        </div>
                        {{ data.start_place }}
                    </h5>
                </div>
            </div>
        </div>
        <div class="card-footer bg-white text-center">
            <div class="card-footer__actions d-flex justify-content-around">
                <a href="/tour" target="_blank" class="text-uppercase dt-travel-card__action">
                    <h6 class="dt-btn-text">Подробнее</h6>
                </a>
            </div>
            <a v-if="data.complete && data.finish" href="#" class="mt-4 personal-account-orders-completed-footer__link
                personal-account-orders-completed-footer__link_blue">
                Поставить оценку
            </a>
            <a v-if="data.review && data.finish" href="#" class="mt-4 personal-account-orders-completed-footer__link
                personal-account-orders-completed-footer__link_grey">
                Смотреть мой отзыв
            </a>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        data: {
            type: Object,
            default: {}
        }
    },
    data() {
        return {}
    },
}
</script>
