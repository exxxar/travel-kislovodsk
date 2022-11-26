<template>
    <div class="excursion row bg-white rounded mx-0 mb-4 overflow-hidden" v-if="data">
        <div class="col px-0">
            <div class="px-4 py-4 align-items-center row mx-0 excursion__info position-relative">
                <p class="excursion__name mb-2 bold order-2 order-xxl-1 col-12 mt-4 mt-xxl-0">
                    {{ data.title || 'Нет заголовка'}}
                </p>
                <p class="short-descrtiption opacity-80 mb-3 lh-lg order-3 order-xxl-2 col-12">
                    {{ data.short_description || data.description || 'Нет описания' }}
                </p>
                <div class="col-12 col-xxl-auto order-1 order-xxl-3 row align-items-center mx-0">
                    <p class="dt-excursion-type position-static col-auto">
                        {{ data.tour_type }}
                    </p>
                    <div v-if="data.is_active || data.is_moderation || data.is_draft"
                        class="dropdown position-absolute d-lg-none d-block w-auto" style="top: 20px; right: 10px;">
                        <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <div
                                class="col-auto menu-dots rounded d-flex px-0 gap-1 align-items-center justify-content-center">
                                <div class="menu-dot bg-blue rounded"></div>
                                <div class="menu-dot bg-blue rounded"></div>
                                <div class="menu-dot bg-blue rounded"></div>
                            </div>
                        </button>
                        <ul class="w-auto dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3
                                                    pt-0 text-center rounded font-size-09">
                            <li class="text-start" v-if="!data.is_draft">
                                <button class="dropdown-item mt-3 p-0">
                                    <span class="dt-btn-text">страница экскурсии</span>
                                </button>
                            </li>
                            <li v-if="data.is_active" class="text-start">
                                <button class="dropdown-item mt-3 p-0"><span
                                    class="px-0 font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">в архив</span>
                                </button>
                            </li>
                            <li class="text-start" v-if="data.is_draft || data.is_moderation">
                                <button class="dropdown-item mt-3 p-0"><span
                                    class="px-0 font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">удалить</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto order-last row me-auto">
                    <div class="col-auto">
                        <span class="excursion_number letter-spacing-3 text-uppercase bold">{{ data.price }}</span>
                        <span class="font-size-05 text-uppercase">руб.</span>
                    </div>
                    <div class="col-auto">
                        <span class="excursion_number letter-spacing-3 text-uppercase bold"></span>
                        <span class="font-size-05 text-uppercase">дня</span>
                    </div>
                </div>
                <div v-if="data.is_moderation" class="col-12 col-sm-auto order-last mt-3 mt-sm-0 ms-sm-auto">
                    <span class="excursion__status green font-size-08">на проверке</span>
                </div>
                <div v-if="!data.is_moderation" class="col-auto order-last row align-items-center mt-3 mt-sm-0">
                    <div class="col-auto">
                        <span class="excursion__rating font-size-07 opacity-40 me-1">рейтинг экскурсии</span>
                        <span class="excursion_number excursion_number__rating text-uppercase bold">
                            {{ data.rating }}
                        </span>
                    </div>
                    <div class="col-auto align-items-center d-flex gap-1 dt-rating">
                        <svg class="blue" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                             viewBox="0 0 428.000000 427.000000" preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,427.000000) scale(0.100000,-0.100000)">
                                <path d="M2031 4254 c-81 -22 -147 -62 -205 -124 -46 -50 -75 -107 -269 -521
    -120 -255 -221 -469 -225 -475 -4 -7 -224 -45 -505 -88 -278 -43 -521 -85
    -548 -95 -242 -92 -346 -407 -207 -627 15 -23 193 -213 395 -422 l369 -381
    -79 -478 c-66 -396 -80 -499 -81 -598 -1 -120 -1 -121 36 -196 46 -93 112
    -158 206 -202 63 -30 74 -32 177 -32 135 0 101 -15 639 283 219 122 403 222
    407 222 4 0 203 -108 441 -240 238 -133 457 -248 487 -257 37 -10 81 -14 140
    -11 159 7 287 92 358 235 61 123 59 156 -36 745 -45 273 -81 506 -81 518 0 14
    117 141 365 395 200 206 377 394 391 417 90 142 83 342 -16 481 -47 66 -131
    129 -202 153 -27 9 -272 51 -544 93 l-495 76 -222 474 c-198 425 -226 480
    -273 531 -110 118 -271 165 -423 124z m334 -886 c192 -411 226 -479 269 -526
    55 -60 107 -96 170 -118 22 -9 263 -51 535 -94 271 -43 495 -81 497 -83 2 -2
    -157 -169 -354 -371 -196 -203 -372 -389 -390 -414 -42 -59 -72 -157 -72 -235
    0 -34 37 -290 81 -569 45 -280 79 -511 77 -514 -3 -3 -180 93 -394 212 -534
    298 -514 289 -644 289 -129 0 -88 18 -628 -279 -228 -125 -415 -226 -416 -224
    -2 2 35 230 80 508 46 278 83 535 84 571 0 83 -29 180 -72 241 -18 25 -194
    213 -392 417 -197 205 -357 373 -355 375 2 1 220 35 484 76 264 40 503 79 530
    88 73 21 127 56 187 121 48 51 75 103 273 529 121 259 222 472 225 472 3 0
    104 -213 225 -472z"/>
                            </g>
                        </svg>
                        <svg class="blue" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                             viewBox="0 0 428.000000 427.000000" preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,427.000000) scale(0.100000,-0.100000)">
                                <path d="M2031 4254 c-81 -22 -147 -62 -205 -124 -46 -50 -75 -107 -269 -521
    -120 -255 -221 -469 -225 -475 -4 -7 -224 -45 -505 -88 -278 -43 -521 -85
    -548 -95 -242 -92 -346 -407 -207 -627 15 -23 193 -213 395 -422 l369 -381
    -79 -478 c-66 -396 -80 -499 -81 -598 -1 -120 -1 -121 36 -196 46 -93 112
    -158 206 -202 63 -30 74 -32 177 -32 135 0 101 -15 639 283 219 122 403 222
    407 222 4 0 203 -108 441 -240 238 -133 457 -248 487 -257 37 -10 81 -14 140
    -11 159 7 287 92 358 235 61 123 59 156 -36 745 -45 273 -81 506 -81 518 0 14
    117 141 365 395 200 206 377 394 391 417 90 142 83 342 -16 481 -47 66 -131
    129 -202 153 -27 9 -272 51 -544 93 l-495 76 -222 474 c-198 425 -226 480
    -273 531 -110 118 -271 165 -423 124z m334 -886 c192 -411 226 -479 269 -526
    55 -60 107 -96 170 -118 22 -9 263 -51 535 -94 271 -43 495 -81 497 -83 2 -2
    -157 -169 -354 -371 -196 -203 -372 -389 -390 -414 -42 -59 -72 -157 -72 -235
    0 -34 37 -290 81 -569 45 -280 79 -511 77 -514 -3 -3 -180 93 -394 212 -534
    298 -514 289 -644 289 -129 0 -88 18 -628 -279 -228 -125 -415 -226 -416 -224
    -2 2 35 230 80 508 46 278 83 535 84 571 0 83 -29 180 -72 241 -18 25 -194
    213 -392 417 -197 205 -357 373 -355 375 2 1 220 35 484 76 264 40 503 79 530
    88 73 21 127 56 187 121 48 51 75 103 273 529 121 259 222 472 225 472 3 0
    104 -213 225 -472z"/>
                            </g>
                        </svg>
                        <svg class="blue" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                             viewBox="0 0 428.000000 427.000000" preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,427.000000) scale(0.100000,-0.100000)">
                                <path d="M2031 4254 c-81 -22 -147 -62 -205 -124 -46 -50 -75 -107 -269 -521
    -120 -255 -221 -469 -225 -475 -4 -7 -224 -45 -505 -88 -278 -43 -521 -85
    -548 -95 -242 -92 -346 -407 -207 -627 15 -23 193 -213 395 -422 l369 -381
    -79 -478 c-66 -396 -80 -499 -81 -598 -1 -120 -1 -121 36 -196 46 -93 112
    -158 206 -202 63 -30 74 -32 177 -32 135 0 101 -15 639 283 219 122 403 222
    407 222 4 0 203 -108 441 -240 238 -133 457 -248 487 -257 37 -10 81 -14 140
    -11 159 7 287 92 358 235 61 123 59 156 -36 745 -45 273 -81 506 -81 518 0 14
    117 141 365 395 200 206 377 394 391 417 90 142 83 342 -16 481 -47 66 -131
    129 -202 153 -27 9 -272 51 -544 93 l-495 76 -222 474 c-198 425 -226 480
    -273 531 -110 118 -271 165 -423 124z m334 -886 c192 -411 226 -479 269 -526
    55 -60 107 -96 170 -118 22 -9 263 -51 535 -94 271 -43 495 -81 497 -83 2 -2
    -157 -169 -354 -371 -196 -203 -372 -389 -390 -414 -42 -59 -72 -157 -72 -235
    0 -34 37 -290 81 -569 45 -280 79 -511 77 -514 -3 -3 -180 93 -394 212 -534
    298 -514 289 -644 289 -129 0 -88 18 -628 -279 -228 -125 -415 -226 -416 -224
    -2 2 35 230 80 508 46 278 83 535 84 571 0 83 -29 180 -72 241 -18 25 -194
    213 -392 417 -197 205 -357 373 -355 375 2 1 220 35 484 76 264 40 503 79 530
    88 73 21 127 56 187 121 48 51 75 103 273 529 121 259 222 472 225 472 3 0
    104 -213 225 -472z"/>
                            </g>
                        </svg>
                        <svg class="blue" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                             viewBox="0 0 428.000000 427.000000" preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,427.000000) scale(0.100000,-0.100000)">
                                <path d="M2031 4254 c-81 -22 -147 -62 -205 -124 -46 -50 -75 -107 -269 -521
    -120 -255 -221 -469 -225 -475 -4 -7 -224 -45 -505 -88 -278 -43 -521 -85
    -548 -95 -242 -92 -346 -407 -207 -627 15 -23 193 -213 395 -422 l369 -381
    -79 -478 c-66 -396 -80 -499 -81 -598 -1 -120 -1 -121 36 -196 46 -93 112
    -158 206 -202 63 -30 74 -32 177 -32 135 0 101 -15 639 283 219 122 403 222
    407 222 4 0 203 -108 441 -240 238 -133 457 -248 487 -257 37 -10 81 -14 140
    -11 159 7 287 92 358 235 61 123 59 156 -36 745 -45 273 -81 506 -81 518 0 14
    117 141 365 395 200 206 377 394 391 417 90 142 83 342 -16 481 -47 66 -131
    129 -202 153 -27 9 -272 51 -544 93 l-495 76 -222 474 c-198 425 -226 480
    -273 531 -110 118 -271 165 -423 124z m334 -886 c192 -411 226 -479 269 -526
    55 -60 107 -96 170 -118 22 -9 263 -51 535 -94 271 -43 495 -81 497 -83 2 -2
    -157 -169 -354 -371 -196 -203 -372 -389 -390 -414 -42 -59 -72 -157 -72 -235
    0 -34 37 -290 81 -569 45 -280 79 -511 77 -514 -3 -3 -180 93 -394 212 -534
    298 -514 289 -644 289 -129 0 -88 18 -628 -279 -228 -125 -415 -226 -416 -224
    -2 2 35 230 80 508 46 278 83 535 84 571 0 83 -29 180 -72 241 -18 25 -194
    213 -392 417 -197 205 -357 373 -355 375 2 1 220 35 484 76 264 40 503 79 530
    88 73 21 127 56 187 121 48 51 75 103 273 529 121 259 222 472 225 472 3 0
    104 -213 225 -472z"/>
                            </g>
                        </svg>
                        <svg class="blue" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                             viewBox="0 0 428.000000 427.000000" preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,427.000000) scale(0.100000,-0.100000)">
                                <path d="M2031 4254 c-81 -22 -147 -62 -205 -124 -46 -50 -75 -107 -269 -521
    -120 -255 -221 -469 -225 -475 -4 -7 -224 -45 -505 -88 -278 -43 -521 -85
    -548 -95 -242 -92 -346 -407 -207 -627 15 -23 193 -213 395 -422 l369 -381
    -79 -478 c-66 -396 -80 -499 -81 -598 -1 -120 -1 -121 36 -196 46 -93 112
    -158 206 -202 63 -30 74 -32 177 -32 135 0 101 -15 639 283 219 122 403 222
    407 222 4 0 203 -108 441 -240 238 -133 457 -248 487 -257 37 -10 81 -14 140
    -11 159 7 287 92 358 235 61 123 59 156 -36 745 -45 273 -81 506 -81 518 0 14
    117 141 365 395 200 206 377 394 391 417 90 142 83 342 -16 481 -47 66 -131
    129 -202 153 -27 9 -272 51 -544 93 l-495 76 -222 474 c-198 425 -226 480
    -273 531 -110 118 -271 165 -423 124z m334 -886 c192 -411 226 -479 269 -526
    55 -60 107 -96 170 -118 22 -9 263 -51 535 -94 271 -43 495 -81 497 -83 2 -2
    -157 -169 -354 -371 -196 -203 -372 -389 -390 -414 -42 -59 -72 -157 -72 -235
    0 -34 37 -290 81 -569 45 -280 79 -511 77 -514 -3 -3 -180 93 -394 212 -534
    298 -514 289 -644 289 -129 0 -88 18 -628 -279 -228 -125 -415 -226 -416 -224
    -2 2 35 230 80 508 46 278 83 535 84 571 0 83 -29 180 -72 241 -18 25 -194
    213 -392 417 -197 205 -357 373 -355 375 2 1 220 35 484 76 264 40 503 79 530
    88 73 21 127 56 187 121 48 51 75 103 273 529 121 259 222 472 225 472 3 0
    104 -213 225 -472z"/>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
            <div v-if="data.is_active" class="splitted">
                <div class="row align-items-center p-4 mx-0">
                    <button class="dt-btn-text col-auto d-none d-lg-block">
                        Страница экскурсии
                    </button>
                    <button class="col-auto dt-btn-text">Редактировать</button>
                    <button class="dt-btn-text-red fw-bold text-uppercase col-auto ms-3 px-0 d-none d-lg-block">
                        в&nbsp;архив
                    </button>
                    <div class="col-auto ms-auto sms lh-1 position-relative">
                        <svg class="black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                             height="20" width="20">
                            <path
                                d="M14.95 22.1q.95 0 1.6-.65.65-.65.65-1.6 0-.95-.65-1.6-.65-.65-1.6-.65-.95 0-1.6.65-.65.65-.65 1.6 0 .95.65 1.6.65.65 1.6.65Zm9.2 0q.95 0 1.6-.65.65-.65.65-1.6 0-.95-.65-1.6-.65-.65-1.6-.65-.95 0-1.6.65-.65.65-.65 1.6 0 .95.65 1.6.65.65 1.6.65Zm8.85 0q.95 0 1.6-.65.65-.65.65-1.6 0-.95-.65-1.6-.65-.65-1.6-.65-.95 0-1.6.65-.65.65-.65 1.6 0 .95.65 1.6.65.65 1.6.65ZM3.3 44.7V7.25q0-1.6 1.175-2.8 1.175-1.2 2.775-1.2h33.5q1.6 0 2.8 1.2 1.2 1.2 1.2 2.8v25.5q0 1.55-1.2 2.75t-2.8 1.2H11.3Zm3.95-8.95 3-3h30.5V7.25H7.25Zm0-28.5v28.5Z"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div v-if="!data.is_active && !data.is_moderation && !data.is_draft" class="splitted">
                <div class="row align-items-center p-4 mx-0">
                    <button class="col-auto mx-auto px-0 position-relative dt-btn-text-red text-uppercase fw-bold">
                        убрать из архива
                    </button>
                </div>
            </div>
            <div v-if="data.is_draft" class="splitted">
                <div class="row align-items-center justify-content-center justify-content-xxl-start p-4 mx-0">
                    <button class="col-auto dt-btn-text">Редактировать</button>
                    <button class="col-auto ms-auto dt-btn-text-red fw-bold text-uppercase px-0 d-none d-lg-block">
                        Удалить
                    </button>
                </div>
            </div>
            <div v-if="data.is_moderation" class="splitted">
                <div class="row align-items-center p-4 mx-0 justify-content-center">
                    <button class="dt-btn-text col-auto d-none d-lg-block">
                        Страница экскурсии
                    </button>
                    <button class="col-auto dt-btn-text">Редактировать</button>
                    <button class="d-none d-lg-block dt-btn-text-red col-auto ms-auto px-0 fw-bold text-uppercase">
                        Удалить
                    </button>
                </div>
            </div>
        </div>
        <div class="excursion__image col-12 col-xl-4 px-0">
            <img class="cover w-100 h-100" v-lazy="data.preview_image" alt=""/>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        data: {
            type: Object,
            default: {
                function() {
                    return {}
                }
            }
        }
    },
    data() {
        return {}
    }
}
</script>
<style lang="scss">
.excursion__image {
    height: 250px;
}
</style>
