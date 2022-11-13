<template>
    <div class="col">
        <div class="row align-items-center mx-0 mb-5">
            <button @click="$emit('hideAddObject')"
                    class="personal-account-nav__link_active button col-auto px-4 active rounded shadow-none bold"><span
                class="fs-6 me-1">&lt;</span>Назад
            </button>
            <h1 class="col-12 col-lg-auto bold fs-2 px-0 ms-lg-4">Добавление нового объекта</h1>
        </div>
        <div class="mb-4 row mx-0">
            <span class="thin position-relative mb-2 col-12 px-0">название экскурсии
                <svg class="opacity-25 position-relative info-icon" version="1.0"
                     xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                     viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000"
                               stroke="none">
                                <path d="M2315 5109 c-800 -83 -1501 -518 -1927 -1196 -604 -961 -490 -2237
274 -3068 425 -462 951 -737 1583 -827 119 -17 512 -16 635 1 622 86 1148 360
1572 820 349 378 572 861 650 1406 17 118 17 512 0 630 -71 497 -262 943 -557
1300 -418 506 -982 825 -1630 921 -123 18 -478 26 -600 13z m627 -922 c189
-50 335 -134 458 -264 106 -112 163 -215 207 -374 25 -90 25 -347 -1 -438 -57
-207 -192 -380 -400 -511 -247 -156 -270 -174 -303 -228 -35 -60 -53 -143 -53
-250 l0 -72 -276 0 -277 0 7 128 c16 311 79 445 262 562 304 193 384 262 443
382 108 221 31 460 -181 558 -63 30 -86 35 -169 38 -113 5 -187 -9 -269 -49
-101 -51 -173 -156 -188 -275 l-7 -59 -293 -3 -293 -2 5 32 c3 18 8 60 12 93
7 71 46 200 81 270 125 249 372 418 698 479 58 11 129 14 260 12 154 -3 194
-7 277 -29z m-251 -2605 c70 -34 122 -84 160 -154 32 -58 34 -69 34 -153 0
-84 -2 -95 -34 -153 -38 -70 -90 -120 -160 -154 -66 -33 -216 -33 -282 0 -143
70 -221 224 -190 374 24 112 113 215 220 252 66 23 192 17 252 -12z"/>
                            </g>
                        </svg>
            </span>
            <input type="text" name="add-obj-name" class="col-12 px-2rem py-4 rounded border-0 font-size-09">
        </div>
        <div class="mb-4 row mx-0">
                    <span class="thin position-relative mb-2 col-12 px-0">описание
                        <svg class="opacity-25 position-relative info-icon" version="1.0"
                             xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                             viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">

                            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000"
                               stroke="none">
                                <path d="M2315 5109 c-800 -83 -1501 -518 -1927 -1196 -604 -961 -490 -2237
274 -3068 425 -462 951 -737 1583 -827 119 -17 512 -16 635 1 622 86 1148 360
1572 820 349 378 572 861 650 1406 17 118 17 512 0 630 -71 497 -262 943 -557
1300 -418 506 -982 825 -1630 921 -123 18 -478 26 -600 13z m627 -922 c189
-50 335 -134 458 -264 106 -112 163 -215 207 -374 25 -90 25 -347 -1 -438 -57
-207 -192 -380 -400 -511 -247 -156 -270 -174 -303 -228 -35 -60 -53 -143 -53
-250 l0 -72 -276 0 -277 0 7 128 c16 311 79 445 262 562 304 193 384 262 443
382 108 221 31 460 -181 558 -63 30 -86 35 -169 38 -113 5 -187 -9 -269 -49
-101 -51 -173 -156 -188 -275 l-7 -59 -293 -3 -293 -2 5 32 c3 18 8 60 12 93
7 71 46 200 81 270 125 249 372 418 698 479 58 11 129 14 260 12 154 -3 194
-7 277 -29z m-251 -2605 c70 -34 122 -84 160 -154 32 -58 34 -69 34 -153 0
-84 -2 -95 -34 -153 -38 -70 -90 -120 -160 -154 -66 -33 -216 -33 -282 0 -143
70 -221 224 -190 374 24 112 113 215 220 252 66 23 192 17 252 -12z"/>
                            </g>
                        </svg>
                    </span>
            <textarea name="add-obj-description" cols="30" rows="3"
                      class="col-12 px-2rem py-4 rounded border-0 font-size-09"></textarea>
        </div>
        <div class="mb-4 row mx-0">
                    <span class="thin position-relative mb-2 col-12 px-0">добавьте фото
                        <svg class="opacity-25 position-relative info-icon" version="1.0"
                        xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                        viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000"
                               stroke="none">
                                <path d="M2315 5109 c-800 -83 -1501 -518 -1927 -1196 -604 -961 -490 -2237
274 -3068 425 -462 951 -737 1583 -827 119 -17 512 -16 635 1 622 86 1148 360
1572 820 349 378 572 861 650 1406 17 118 17 512 0 630 -71 497 -262 943 -557
1300 -418 506 -982 825 -1630 921 -123 18 -478 26 -600 13z m627 -922 c189
-50 335 -134 458 -264 106 -112 163 -215 207 -374 25 -90 25 -347 -1 -438 -57
-207 -192 -380 -400 -511 -247 -156 -270 -174 -303 -228 -35 -60 -53 -143 -53
-250 l0 -72 -276 0 -277 0 7 128 c16 311 79 445 262 562 304 193 384 262 443
382 108 221 31 460 -181 558 -63 30 -86 35 -169 38 -113 5 -187 -9 -269 -49
-101 -51 -173 -156 -188 -275 l-7 -59 -293 -3 -293 -2 5 32 c3 18 8 60 12 93
7 71 46 200 81 270 125 249 372 418 698 479 58 11 129 14 260 12 154 -3 194
-7 277 -29z m-251 -2605 c70 -34 122 -84 160 -154 32 -58 34 -69 34 -153 0
-84 -2 -95 -34 -153 -38 -70 -90 -120 -160 -154 -66 -33 -216 -33 -282 0 -143
70 -221 224 -190 374 24 112 113 215 220 252 66 23 192 17 252 -12z"/>
                            </g>
                        </svg>
                    </span>
            <div name="add-obj-photo" class="row mx-0 px-0 gap-2">
                <div
                    class="col-auto add-additional-photo px-0 rounded d-flex align-items-center justify-content-center bg-white position-relative">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                        <path d="M22 38.5V26H9.5v-4H22V9.5h4V22h12.5v4H26v12.5Z"/>
                    </svg>
                    <div class="add-additional-photo hide">
                        <img class="position-relative top-0 start-0 img rounded w-100 h-100"
                             src="/img/travels/1.jpg" alt="">
                        <div class="delete rounded position-absolute justify-content-center align-items-center">
                            <svg class="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                 height="20" width="20">
                                <path
                                    d="m12.45 38.35-2.8-2.8L21.2 24 9.65 12.45l2.8-2.8L24 21.2 35.55 9.65l2.8 2.8L26.8 24l11.55 11.55-2.8 2.8L24 26.8Z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-4 row mx-0">
                    <span class="thin position-relative mb-2 col-12 px-0">укажите адрес или координаты
                        <svg class="opacity-25 position-relative info-icon" version="1.0"
                        xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                        viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">

                            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000"
                               stroke="none">
                                <path d="M2315 5109 c-800 -83 -1501 -518 -1927 -1196 -604 -961 -490 -2237
274 -3068 425 -462 951 -737 1583 -827 119 -17 512 -16 635 1 622 86 1148 360
1572 820 349 378 572 861 650 1406 17 118 17 512 0 630 -71 497 -262 943 -557
1300 -418 506 -982 825 -1630 921 -123 18 -478 26 -600 13z m627 -922 c189
-50 335 -134 458 -264 106 -112 163 -215 207 -374 25 -90 25 -347 -1 -438 -57
-207 -192 -380 -400 -511 -247 -156 -270 -174 -303 -228 -35 -60 -53 -143 -53
-250 l0 -72 -276 0 -277 0 7 128 c16 311 79 445 262 562 304 193 384 262 443
382 108 221 31 460 -181 558 -63 30 -86 35 -169 38 -113 5 -187 -9 -269 -49
-101 -51 -173 -156 -188 -275 l-7 -59 -293 -3 -293 -2 5 32 c3 18 8 60 12 93
7 71 46 200 81 270 125 249 372 418 698 479 58 11 129 14 260 12 154 -3 194
-7 277 -29z m-251 -2605 c70 -34 122 -84 160 -154 32 -58 34 -69 34 -153 0
-84 -2 -95 -34 -153 -38 -70 -90 -120 -160 -154 -66 -33 -216 -33 -282 0 -143
70 -221 224 -190 374 24 112 113 215 220 252 66 23 192 17 252 -12z"/>
                            </g>
                        </svg>
                    </span>
            <div class="dropdown col-12 col-lg-8 position-relative mx-0 px-0 bg-white rounded">
                <button type="button" class="big-button col-10 ps-2rem dropdown-toggle text-start font-size-09"
                        data-bs-toggle="dropdown"> Не выбрано
                </button>
                <ul class="dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3 pt-0 rounded font-size-09">
                    <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> Кисловодск </a>
                    </li>
                    <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> Ставрополь </a>
                    </li>
                </ul>
                <div class="plus-icon bg-blue rounded align-items-center d-flex justify-content-center hide">
                    <svg class="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20"
                         width="20">
                        <path d="M22 38.5V26H9.5v-4H22V9.5h4V22h12.5v4H26v12.5Z"/>
                    </svg>
                </div>
                <svg class="h-100 expand-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                     height="20" width="20">
                    <path
                        d="M24 23.65q1.5 0 2.575-1.075Q27.65 21.5 27.65 20q0-1.5-1.075-2.575Q25.5 16.35 24 16.35q-1.5 0-2.575 1.075Q20.35 18.5 20.35 20q0 1.5 1.075 2.575Q22.5 23.65 24 23.65Zm0 15.75q6.4-5.85 9.45-10.625Q36.5 24 36.5 20.4q0-5.7-3.625-9.3Q29.25 7.5 24 7.5t-8.875 3.6Q11.5 14.7 11.5 20.4q0 3.6 3.125 8.35T24 39.4Zm0 5.2q-8.3-7.05-12.4-13.075Q7.5 25.5 7.5 20.4q0-7.7 4.975-12.3Q17.45 3.5 24 3.5q6.55 0 11.525 4.6Q40.5 12.7 40.5 20.4q0 5.1-4.1 11.125T24 44.6Zm0-24.2Z"/>
                </svg>
            </div>
            <button class="map-point col-12 col-lg-auto py-4 mt-3 mt-lg-0 ms-lg-4 px-0 rounded ">
                <span class="position-relative black-underline">Укажите точку на карте</span>
            </button>
            <div
                class="map-point-menu col-12 col-lg-8 col-xxl-auto d-flex justify-content-center p-4 p-xxl-0 mt-3 mt-xxl-0 rounded hide">
                <button class="col-auto ms-xxl-4 font-size-07 letter-spacing-3 text-uppercase bold px-0">на
                    карте
                    <span class="blue fs-6">&gt;</span>
                </button>
                <button class="col-auto ms-4 px-0">
                    <span class="position-relative black-underline">Изменить</span>
                </button>
                <button class="col-auto ms-4 px-0">
                    <span class="position-relative red red-underline">Удалить</span>
                </button>
            </div>
            <label for="add-obj-comment-mark"
                   class="align-items-center checkbox position-relative row mx-0 px-0 mt-3">
                <input type="checkbox" id="add-obj-comment-mark" class="col-auto custom-checkbox">
                <div
                    class="col-auto custom-checkbox rounded bg-white d-flex align-items-center justify-content-center">
                    <div class="col-auto custom-checkbox dot">
                    </div>
                </div>
                <span class="col-auto thin ms-1">добавить комментарий</span>
                <input type="text" name="add-obj-comment"
                       class="d-none col-12 px-2rem py-4 rounded border-0 font-size-09 mt-2">
            </label>
        </div>
        <div
            class="add-obj-accept position-relative splitted d-flex align-items-center justify-content-between row mx-0 px-0 py-5 mt-5">
            <button
                class="col-12 col-lg-auto font-size-07 blue-hover letter-spacing-3 text-uppercase bold mb-4 mb-lg-0 px-0">
                предосмотр
                объекта
                <span class="blue fs-6">&gt;</span>
            </button>
            <button class="big-button bold bg-green col-12 col-lg-auto px-5 ms-lg-5 rounded">Сохранить</button>
        </div>
    </div>
</template>
