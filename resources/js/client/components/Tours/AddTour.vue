<template>
    <div id="add-excursion" class="add-excursion col ">
        <div class="row align-items-center mx-0 mb-4 mb-lg-5">
            <button class="button col-auto px-2rem active rounded shadow-none bold">
                <span class="fs-6 me-1">&lt;</span>Назад
            </button>
            <h1 class="col-12 col-lg-auto bold fs-2 ms-lg-3 mt-5 mt-lg-0 px-0">Добавление новой экскурсии</h1>
            <h1 class="col-12 col-lg-auto bold fs-2 ms-lg-3 mt-5 mt-lg-0 px-0 hide">Редактирование экскурсии
            </h1>
        </div>
        <h1 class="bold mb-3">Основные данные</h1>
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
            <input type="text" name="add-exc-name" class="col-12 px-2rem py-4 rounded border-0 font-size-09">
        </div>
        <div class="mb-4 row mx-0">
                    <span class="thin position-relative mb-2 col-12 px-0">продающее короткое описание <svg
                        class="opacity-25 position-relative info-icon" version="1.0"
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
            <textarea name="add-exc-description" cols="30" rows="3"
                      class="col-12 px-2rem py-4 rounded border-0 font-size-09"></textarea>
        </div>
        <div class="mb-4 row mx-0">
                    <span class="thin position-relative mb-1 col-12 px-0">выберите категории (не более 5) <svg
                        class="opacity-25 position-relative info-icon" version="1.0"
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
            <div class="row row-cols-auto mx-0 px-0 hide visible-lg">
                <label class="align-items-center checkbox px-0 mx-0 mt-1">
                    <input type="checkbox" id="">
                    <span class="semibold category bg-white px-4 py-3 rounded">Активные</span>
                </label>
                <label class="align-items-center checkbox px-0 mx-0 mt-1">
                    <input type="checkbox" id="">
                    <span class="semibold category bg-white px-4 py-3 rounded">Альпинизм</span>
                </label>
                <label class="align-items-center checkbox px-0 mx-0 mt-1">
                    <input type="checkbox" id="">
                    <span class="semibold category bg-white px-4 py-3 rounded">Гастрономические</span>
                </label>
                <label class="align-items-center checkbox px-0 mx-0 mt-1">
                    <input type="checkbox" id="">
                    <span class="semibold category bg-white px-4 py-3 rounded">Детские</span>
                </label>
                <label class="align-items-center checkbox px-0 mx-0 mt-1">
                    <input type="checkbox" id="">
                    <span class="semibold category bg-white px-4 py-3 rounded">Животные</span>
                </label>
                <label class="align-items-center checkbox px-0 mx-0 mt-1">
                    <input type="checkbox" id="">
                    <span class="semibold category bg-white px-4 py-3 rounded">Исторические</span>
                </label>
                <label class="align-items-center checkbox px-0 mx-0 mt-1">
                    <input type="checkbox" id="">
                    <span class="semibold category bg-white px-4 py-3 rounded">Мистические</span>
                </label>
                <label class="align-items-center checkbox px-0 mx-0 mt-1 mt-1">
                    <input type="checkbox" id="">
                    <span class="semibold category bg-white px-4 py-3 rounded">Альпинизм</span>
                </label>
                <label class="align-items-center checkbox px-0 mx-0 mt-1">
                    <input type="checkbox" id="">
                    <span class="semibold category bg-white px-4 py-3 rounded">Обзорные</span>
                </label>
                <label class="align-items-center checkbox px-0 mx-0 mt-1">
                    <input type="checkbox" id="">
                    <span class="semibold category bg-white px-4 py-3 rounded">Детские</span>
                </label>
                <label class="align-items-center checkbox px-0 mx-0 mt-1">
                    <input type="checkbox" id="">
                    <span class="semibold category bg-white px-4 py-3 rounded">Животные</span>
                </label>
                <label class="align-items-center checkbox px-0 mx-0 mt-1">
                    <input type="checkbox" id="">
                    <span class="semibold category bg-white px-4 py-3 rounded">Исторические</span>
                </label>
                <label class="align-items-center checkbox px-0 mx-0 mt-1">
                    <input type="checkbox" id="">
                    <span class="semibold category bg-white px-4 py-3 rounded">Мистические</span>
                </label>
                <label class="align-items-center checkbox px-0 mx-0 mt-1">
                    <input type="checkbox" id="">
                    <span class="semibold category bg-white px-4 py-3 rounded">Активные</span>
                </label>
                <label class="align-items-center checkbox px-0 mx-0 mt-1">
                    <input type="checkbox" id="">
                    <span class="semibold category bg-white px-4 py-3 rounded">Альпинизм</span>
                </label>
                <label class="align-items-center checkbox px-0 mx-0 mt-1">
                    <input type="checkbox" id="">
                    <span class="semibold category bg-white px-4 py-3 rounded">Все</span>
                </label>
                <label class="align-items-center checkbox px-0 mx-0 mt-1">
                    <input type="checkbox" id="">
                    <span class="semibold category bg-white px-4 py-3 rounded">Активные</span>
                </label>
                <label class="align-items-center checkbox px-0 mx-0 mt-1">
                    <input type="checkbox" id="">
                    <span class="semibold category bg-white px-4 py-3 rounded">Альпинизм</span>
                </label>
                <label class="align-items-center checkbox px-0 mx-0 mt-1">
                    <input type="checkbox" id="">
                    <span class="semibold category bg-white px-4 py-3 rounded">Гастрономические</span>
                </label>
                <label class="align-items-center checkbox px-0 mx-0 mt-1">
                    <input type="checkbox" id="">
                    <span class="semibold category bg-white px-4 py-3 rounded">Детские</span>
                </label>
            </div>
            <div class="form_label position-relative col-12 mx-0 px-0 hide-lg">
                <div class="multiselect_block align-items-center w-100 position-relative">
                    <label for="add-exc-category"
                           class="field_multiselect bg-white rounded w-100 px-2rem py-4 font-size-09">Не
                        выбрано</label>
                    <input id="expand"
                           class="multiselect_checkbox bg-white rounded w-100 h-100 position-absolute start-0 top-0 opacity-0"
                           type="checkbox">
                    <label for="expand"
                           class="multiselect_label position-absolute h-100 w-100 start-0 top-0"></label>
                    <svg class="h-100 expand-icon position-absolute" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 48 48" height="20" width="20">
                        <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                    </svg>
                    <select id="add-exc-category"
                            class="field_select border-0 rounded-bottom bg-white w-100 position-absolute start-0 font-size-09"
                            name="add-exc-category" multiple>
                        <option class="p-3 font-size-09 splitted" value="Активные">Активные</option>
                        <option class="p-3 font-size-09 splitted" value="Альпинизм">Альпинизм</option>
                        <option class="p-3 font-size-09 splitted" value="Гастрономические">Гастрономические
                        </option>
                        <option class="p-3 font-size-09 splitted" value="Детские">Детские</option>
                        <option class="p-3 font-size-09 splitted" value="Все">Все</option>
                        <option class="p-3 font-size-09 splitted" value="Обзорные">Обзорные</option>
                        <option class="p-3 font-size-09 splitted" value="Исторические">Исторические</option>
                        <option class="p-3 font-size-09 splitted" value="Животные">Животные</option>
                        <option class="p-3 font-size-09 splitted" value="Мистические">Мистические</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="mb-4 row mx-0">
            <div class="col-12 col-lg-auto px-0">
                        <span class="thin position-relative mb-2 col-auto px-0">добавить титульное фото <svg
                            class="opacity-25 position-relative info-icon" version="1.0"
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
                <div class="col-12 col-lg-auto mt-1 mx-0">
                    <div
                        class="col-12 col-lg-auto add-main-photo rounded d-flex align-items-center justify-content-center bg-white position-relative">
                        <svg class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20"
                             width="20">
                            <path d="M22 38.5V26H9.5v-4H22V9.5h4V22h12.5v4H26v12.5Z"/>
                        </svg>
                        <div class="add-main-photo hide">
                            <img class="img rounded w-100 h-100" src="/img/travels/5.jpg" alt="">
                            <div
                                class="delete rounded position-absolute justify-content-center align-items-center">
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
            <div class="col-12 col-xl-auto mt-4 mt-xl-0 ms-xl-4 px-0">
                        <span class="thin position-relative mb-2 col-auto px-0">добавьте фото (минимум 5) <svg
                            class="opacity-25 position-relative info-icon" version="1.0"
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
                <div class="col-auto mt-1 row gap-2 mx-0">
                    <div
                        class="col-auto add-additional-photo px-0 rounded d-flex align-items-center justify-content-center bg-white position-relative">
                        <svg class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20"
                             width="20">
                            <path d="M22 38.5V26H9.5v-4H22V9.5h4V22h12.5v4H26v12.5Z"/>
                        </svg>
                        <div class="add-additional-photo hide">
                            <img class="position-relative top-0 start-0 img rounded w-100 h-100"
                                 src="/img/travels/1.jpg" alt="">
                            <div
                                class="delete rounded position-absolute justify-content-center align-items-center">
                                <svg class="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                     height="20" width="20">
                                    <path
                                        d="m12.45 38.35-2.8-2.8L21.2 24 9.65 12.45l2.8-2.8L24 21.2 35.55 9.65l2.8 2.8L26.8 24l11.55 11.55-2.8 2.8L24 26.8Z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-auto add-additional-photo px-0 rounded d-flex align-items-center justify-content-center bg-white position-relative">
                        <svg class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20"
                             width="20">
                            <path d="M22 38.5V26H9.5v-4H22V9.5h4V22h12.5v4H26v12.5Z"/>
                        </svg>
                        <div class="add-additional-photo hide">
                            <img class="img rounded w-100 h-100" src="/img/travels/5.jpg" alt="">
                            <div
                                class="delete rounded position-absolute justify-content-center align-items-center">
                                <svg class="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                     height="20" width="20">
                                    <path
                                        d="m12.45 38.35-2.8-2.8L21.2 24 9.65 12.45l2.8-2.8L24 21.2 35.55 9.65l2.8 2.8L26.8 24l11.55 11.55-2.8 2.8L24 26.8Z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-auto add-additional-photo px-0 rounded d-flex align-items-center justify-content-center bg-white position-relative">
                        <svg class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20"
                             width="20">
                            <path d="M22 38.5V26H9.5v-4H22V9.5h4V22h12.5v4H26v12.5Z"/>
                        </svg>
                        <div class="add-additional-photo hide">
                            <img class="img rounded w-100 h-100" src="/img/travels/3.jpg" alt="">
                            <div
                                class="delete rounded position-absolute justify-content-center align-items-center">
                                <svg class="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                     height="20" width="20">
                                    <path
                                        d="m12.45 38.35-2.8-2.8L21.2 24 9.65 12.45l2.8-2.8L24 21.2 35.55 9.65l2.8 2.8L26.8 24l11.55 11.55-2.8 2.8L24 26.8Z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-auto add-additional-photo px-0 rounded d-flex align-items-center justify-content-center bg-white position-relative">
                        <svg class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20"
                             width="20">
                            <path d="M22 38.5V26H9.5v-4H22V9.5h4V22h12.5v4H26v12.5Z"/>
                        </svg>
                        <div class="add-additional-photo hide">
                            <img class="img rounded w-100 h-100" src="/img/travels/4.jpg" alt="">
                            <div
                                class="delete rounded position-absolute justify-content-center align-items-center">
                                <svg class="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                     height="20" width="20">
                                    <path
                                        d="m12.45 38.35-2.8-2.8L21.2 24 9.65 12.45l2.8-2.8L24 21.2 35.55 9.65l2.8 2.8L26.8 24l11.55 11.55-2.8 2.8L24 26.8Z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div
                        class="add-additional-photo col-auto rounded d-flex align-items-center justify-content-center bg-white">
                        <svg class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20"
                             width="20">
                            <path d="M22 38.5V26H9.5v-4H22V9.5h4V22h12.5v4H26v12.5Z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-4 row mx-0 justify-content-between">
            <div class="col-12 col-lg-4 row mb-4 mb-lg-0 mx-0 px-0 pe-lg-3">
                        <span class="thin position-relative mb-2 col-12 px-0">длительность экскурсии <svg
                            class="opacity-25 position-relative info-icon" version="1.0"
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
                <div class="dropdown col-12 position-relative mx-0 px-0 bg-white pe-2rem rounded">
                    <button type="button"
                            class="big-button col-11 ps-2rem dropdown-toggle text-start font-size-09"
                            data-bs-toggle="dropdown"> Не выбрано
                    </button>
                    <ul
                        class="dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3 pt-0 rounded font-size-09">
                        <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> Ставрополь </a>
                        </li>
                        <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> Кисловодск </a>
                        </li>
                    </ul>
                    <svg class="h-100 expand-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                         height="20" width="20">
                        <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                    </svg>
                </div>
            </div>
            <div class="col-12 col-lg-8 row mx-0 px-0 ps-lg-3">
                        <span class="thin position-relative mb-2 col-12 px-0">город отправления <svg
                            class="opacity-25 position-relative info-icon" version="1.0"
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
                <div class="dropdown col-12 position-relative mx-0 px-0 bg-white rounded">
                    <button type="button"
                            class="big-button col-11 ps-2rem dropdown-toggle text-start font-size-09"
                            data-bs-toggle="dropdown"> Не выбрано
                    </button>
                    <ul
                        class="dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3 pt-0 rounded font-size-09">
                        <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> Ставрополь </a>
                        </li>
                        <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> Кисловодск </a>
                        </li>
                    </ul>
                    <svg class="h-100 expand-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                         height="20" width="20">
                        <path
                            d="M24 23.65q1.5 0 2.575-1.075Q27.65 21.5 27.65 20q0-1.5-1.075-2.575Q25.5 16.35 24 16.35q-1.5 0-2.575 1.075Q20.35 18.5 20.35 20q0 1.5 1.075 2.575Q22.5 23.65 24 23.65Zm0 15.75q6.4-5.85 9.45-10.625Q36.5 24 36.5 20.4q0-5.7-3.625-9.3Q29.25 7.5 24 7.5t-8.875 3.6Q11.5 14.7 11.5 20.4q0 3.6 3.125 8.35T24 39.4Zm0 5.2q-8.3-7.05-12.4-13.075Q7.5 25.5 7.5 20.4q0-7.7 4.975-12.3Q17.45 3.5 24 3.5q6.55 0 11.525 4.6Q40.5 12.7 40.5 20.4q0 5.1-4.1 11.125T24 44.6Zm0-24.2Z"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="mb-4 row mx-0 justify-content-between">
            <div class="col-12 col-lg row mb-4 mb-lg-0 mx-0 px-0 pe-lg-3">
                        <span class="thin position-relative mb-2 col-12 px-0">тип экскурсии <svg
                            class="opacity-25 position-relative info-icon" version="1.0"
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
                <div class="dropdown col-12 position-relative mx-0 px-0 bg-white rounded">
                    <button type="button"
                            class="big-button col-11 ps-2rem dropdown-toggle text-start font-size-09"
                            data-bs-toggle="dropdown"> Не выбрано
                    </button>
                    <ul
                        class="dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3 pt-0 rounded font-size-09">
                        <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> групповая </a>
                        </li>
                        <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> индивидуальная </a>
                        </li>
                    </ul>
                    <svg class="h-100 expand-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                         height="20" width="20">
                        <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                    </svg>
                </div>
            </div>
            <div class="col-12 col-lg row mx-0 px-0 ps-lg-3">
                        <span class="thin position-relative mb-2 col-12 px-0">передвижение <svg
                            class="opacity-25 position-relative info-icon" version="1.0"
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
                <div class="dropdown col-12 position-relative mx-0 px-0 bg-white rounded">
                    <button type="button"
                            class="big-button col-11 ps-2rem dropdown-toggle text-start font-size-09"
                            data-bs-toggle="dropdown"> Не выбрано
                    </button>
                    <ul
                        class="dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3 pt-0 rounded font-size-09">
                        <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> пешком </a>
                        </li>
                        <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> на машине </a>
                        </li>
                    </ul>
                    <svg class="h-100 expand-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                         height="20" width="20">
                        <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="mb-4 row mx-0">
                    <span class="thin position-relative mb-2 col-12 px-0">описание <svg
                        class="opacity-25 position-relative info-icon" version="1.0"
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
            <textarea name="add-exc-description" cols="30" rows="15"
                      class="col-12 px-2rem py-4 rounded border-0 font-size-09"></textarea>
        </div>
        <div class="mb-5 row mx-0">
            <div class="row mx-0 px-0 mb-2">
                        <span class="thin position-relative mb-2 col-12 px-0">место начала <svg
                            class="opacity-25 position-relative info-icon" version="1.0"
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
                    <button type="button"
                            class="big-button col-11 ps-2rem dropdown-toggle text-start font-size-09"
                            data-bs-toggle="dropdown"> Не выбрано
                    </button>
                    <ul
                        class="dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3 pt-0 rounded font-size-09">
                        <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> Кисловодск </a>
                        </li>
                        <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> Ставрополь </a>
                        </li>
                    </ul>
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
            </div>
            <div class="col-12 px-0">
                <input type="checkbox" id="add-exc-comment-mark">
                <label for="add-exc-comment-mark"
                       class="align-items-center checkbox position-relative row mx-0 px-0">
                    <div
                        class="col-auto custom-checkbox rounded bg-white d-flex align-items-center justify-content-center">
                        <div class="col-auto custom-checkbox dot"></div>
                    </div>
                    <span class="col-auto thin ms-1">добавить комментарий</span>
                    <input type="text" name="add-exc-comment"
                           class="d-none col-12 px-2rem py-4 rounded border-0 font-size-09 mt-2">
                </label>
            </div>
        </div>
        <h1 class="bold">Маршрут</h1>
        <div class="mb-5 row mx-0">
            <div class="row mx-0 px-0 mt-3">
                <div class="destination-number blue hide visible-lg col-auto bold fs-4 px-0 me-3">01</div>
                <div class="mx-0 px-0 col">
                    <div class="row mx-0 px-0 mb-2 position-relative align-items-center">
                        <span class="col-auto ps-0 mb-2 blue bold fs-6 hide-lg">01</span>
                        <span class="thin position-relative mb-2 col col-lg-12 px-0">название <svg
                            class="opacity-25 position-relative info-icon" version="1.0"
                            xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                            viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">

                                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                           fill="#000000" stroke="none">
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
                            <button type="button"
                                    class="big-button col-11 ps-2rem dropdown-toggle text-start font-size-09"
                                    data-bs-toggle="dropdown"> Не выбрано
                            </button>
                            <ul
                                class="dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3 pt-0 rounded font-size-09">
                                <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> Кисловодск
                                </a>
                                </li>
                                <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> Ставрополь
                                </a>
                                </li>
                            </ul>
                            <div
                                class="plus-icon bg-blue rounded align-items-center d-flex justify-content-center hide">
                                <svg class="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                     height="20" width="20">
                                    <path d="M22 38.5V26H9.5v-4H22V9.5h4V22h12.5v4H26v12.5Z"/>
                                </svg>
                            </div>
                            <svg class="h-100 expand-icon" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 48 48" height="20" width="20">
                                <path
                                    d="M24 23.65q1.5 0 2.575-1.075Q27.65 21.5 27.65 20q0-1.5-1.075-2.575Q25.5 16.35 24 16.35q-1.5 0-2.575 1.075Q20.35 18.5 20.35 20q0 1.5 1.075 2.575Q22.5 23.65 24 23.65Zm0 15.75q6.4-5.85 9.45-10.625Q36.5 24 36.5 20.4q0-5.7-3.625-9.3Q29.25 7.5 24 7.5t-8.875 3.6Q11.5 14.7 11.5 20.4q0 3.6 3.125 8.35T24 39.4Zm0 5.2q-8.3-7.05-12.4-13.075Q7.5 25.5 7.5 20.4q0-7.7 4.975-12.3Q17.45 3.5 24 3.5q6.55 0 11.525 4.6Q40.5 12.7 40.5 20.4q0 5.1-4.1 11.125T24 44.6Zm0-24.2Z"/>
                            </svg>
                        </div>
                        <button class="map-point col-12 col-lg-auto py-4 mt-3 mt-lg-0 ms-lg-4 px-0 rounded ">
                            <span class="position-relative black-underline">Укажите точку на карте</span>
                        </button>
                        <div
                            class="map-point-menu col-12 col-lg-8 col-xxl-auto d-flex justify-content-center p-4 p-xxl-0 mt-3 mt-xxl-0 rounded hide">
                            <button
                                class="col-auto ms-xxl-4 font-size-07 letter-spacing-3 text-uppercase bold px-0">
                                на
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
                    </div>
                    <div class="col-12 px-0 row mx-0 px-0">
                        <input type="checkbox" id="add-exc-description-mark">
                        <label for="add-exc-description-mark"
                               class="align-items-center col-12 col-md-auto checkbox position-relative row mx-0 px-0">
                            <div
                                class="col-auto custom-checkbox rounded bg-white d-flex align-items-center justify-content-center">
                                <div class="col-auto custom-checkbox dot">
                                </div>
                            </div>
                            <span class="col-auto thin ms-1">добавить описание</span>
                        </label>
                        <input type="checkbox" id="add-exc-photo-mark">
                        <label for="add-exc-photo-mark"
                               class="align-items-center col-12 col-md-auto checkbox position-relative row mx-0 ms-md-3 mt-2 mt-md-0 px-0">
                            <div
                                class="col-auto custom-checkbox rounded bg-white d-flex align-items-center justify-content-center">
                                <div class="col-auto custom-checkbox dot">
                                </div>
                            </div>
                            <span class="col-auto thin ms-1">добавить фото</span>
                        </label>
                        <input type="text" name="add-exc-description"
                               class="d-none col-12 px-2rem py-4 rounded border-0 font-size-09 mt-2">
                        <div name="add-exc-photo" class="d-none row mx-0 px-0 gap-2 mt-2">
                            <div
                                class="col-auto add-additional-photo px-0 rounded d-flex align-items-center justify-content-center bg-white position-relative">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20"
                                     width="20">
                                    <path d="M22 38.5V26H9.5v-4H22V9.5h4V22h12.5v4H26v12.5Z"/>
                                </svg>
                                <div class="add-additional-photo hide">
                                    <img class="position-relative top-0 start-0 img rounded w-100 h-100"
                                         src="/img/travels/1.jpg" alt="">
                                    <div
                                        class="delete rounded position-absolute justify-content-center align-items-center">
                                        <svg class="white" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 48 48" height="20" width="20">
                                            <path
                                                d="m12.45 38.35-2.8-2.8L21.2 24 9.65 12.45l2.8-2.8L24 21.2 35.55 9.65l2.8 2.8L26.8 24l11.55 11.55-2.8 2.8L24 26.8Z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mx-0 px-0 mt-3">
                <div class="destination-number blue hide visible-lg col-auto bold fs-4 px-0 me-3">02</div>
                <div class="mx-0 px-0 col">
                    <div class="row mx-0 px-0 mb-2 position-relative">
                        <span class="col-auto ps-0 mb-2 blue bold fs-6 hide-lg">02</span>
                        <span class="thin position-relative mb-2 col col-lg-12 px-0">название <svg
                            class="opacity-25 position-relative info-icon" version="1.0"
                            xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                            viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">

                                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                           fill="#000000" stroke="none">
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
                            <button type="button"
                                    class="big-button col-11 ps-2rem dropdown-toggle text-start font-size-09"
                                    data-bs-toggle="dropdown"> Не выбрано
                            </button>
                            <ul
                                class="dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3 pt-0 rounded font-size-09">
                                <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> Кисловодск
                                </a>
                                </li>
                                <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> Ставрополь
                                </a>
                                </li>
                            </ul>
                            <div
                                class="plus-icon bg-blue rounded align-items-center d-flex justify-content-center hide">
                                <svg class="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                     height="20" width="20">
                                    <path d="M22 38.5V26H9.5v-4H22V9.5h4V22h12.5v4H26v12.5Z"/>
                                </svg>
                            </div>
                            <svg class="h-100 expand-icon" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 48 48" height="20" width="20">
                                <path
                                    d="M24 23.65q1.5 0 2.575-1.075Q27.65 21.5 27.65 20q0-1.5-1.075-2.575Q25.5 16.35 24 16.35q-1.5 0-2.575 1.075Q20.35 18.5 20.35 20q0 1.5 1.075 2.575Q22.5 23.65 24 23.65Zm0 15.75q6.4-5.85 9.45-10.625Q36.5 24 36.5 20.4q0-5.7-3.625-9.3Q29.25 7.5 24 7.5t-8.875 3.6Q11.5 14.7 11.5 20.4q0 3.6 3.125 8.35T24 39.4Zm0 5.2q-8.3-7.05-12.4-13.075Q7.5 25.5 7.5 20.4q0-7.7 4.975-12.3Q17.45 3.5 24 3.5q6.55 0 11.525 4.6Q40.5 12.7 40.5 20.4q0 5.1-4.1 11.125T24 44.6Zm0-24.2Z"/>
                            </svg>
                        </div>
                        <button class="map-point col-12 col-lg-auto py-4 mt-3 mt-lg-0 ms-lg-4 px-0 rounded ">
                            <span class="position-relative black-underline">Укажите точку на карте</span>
                        </button>
                        <div
                            class="map-point-menu col-12 col-lg-8 col-xxl-auto d-flex justify-content-center p-4 p-xxl-0 mt-3 mt-xxl-0 rounded hide">
                            <button
                                class="col-auto ms-xxl-4 font-size-07 letter-spacing-3 text-uppercase bold px-0">
                                на
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
                    </div>
                    <div class="col-12 px-0 row mx-0 px-0">
                        <input type="checkbox" id="add-exc-description-mark-2">
                        <label for="add-exc-description-mark-2"
                               class="align-items-center col-12 col-md-auto checkbox position-relative row mx-0 px-0">
                            <div
                                class="col-auto custom-checkbox rounded bg-white d-flex align-items-center justify-content-center">
                                <div class="col-auto custom-checkbox dot">
                                </div>
                            </div>
                            <span class="col-auto thin ms-1">добавить описание</span>
                        </label>
                        <input type="checkbox" id="add-exc-photo-mark-2">
                        <label for="add-exc-photo-mark-2"
                               class="align-items-center col-12 col-md-auto checkbox position-relative row mx-0 ms-md-3 mt-2 mt-md-0 px-0">
                            <div
                                class="col-auto custom-checkbox rounded bg-white d-flex align-items-center justify-content-center">
                                <div class="col-auto custom-checkbox dot">
                                </div>
                            </div>
                            <span class="col-auto thin ms-1">добавить фото</span>
                        </label>
                        <input type="text" name="add-exc-description-2"
                               class="d-none col-12 px-2rem py-4 rounded border-0 font-size-09 mt-2">
                        <div name="add-exc-photo" class="d-none row mx-0 px-0 gap-2 mt-2">
                            <div
                                class="col-auto add-additional-photo px-0 rounded d-flex align-items-center justify-content-center bg-white position-relative">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20"
                                     width="20">
                                    <path d="M22 38.5V26H9.5v-4H22V9.5h4V22h12.5v4H26v12.5Z"/>
                                </svg>
                                <div class="add-additional-photo hide">
                                    <img class="position-relative top-0 start-0 img rounded w-100 h-100"
                                         src="/img/travels/1.jpg" alt="">
                                    <div
                                        class="delete rounded position-absolute justify-content-center align-items-center">
                                        <svg class="white" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 48 48" height="20" width="20">
                                            <path
                                                d="m12.45 38.35-2.8-2.8L21.2 24 9.65 12.45l2.8-2.8L24 21.2 35.55 9.65l2.8 2.8L26.8 24l11.55 11.55-2.8 2.8L24 26.8Z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="button bold bg-blue col-12 col-lg-auto mt-3 ms-lg-5 px-4 rounded">Добавить <span
                class="bold white">новую точку</span></button>
        </div>
        <div class="row mb-5">
            <div name="add-exc-included" class="col-12 col-lg mb-5 mb-lg-0">
                <h1 class="bold mb-3">Что входит в стоимость</h1>
                <div class="row mx-0 pe-2 rounded bg-white align-items-center">
                    <input type="text" name="add-exc-included-input"
                           class="col px-2rem rounded border-0 font-size-09 flex-grow-1">
                    <button class="button col-auto bold bg-blue px-lg-4 rounded">
                        <span class="hide visible-lg bold white">Добавить</span>
                        <svg class="hide-lg white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                             height="25" width="25">
                            <path d="M22 38.5V26H9.5v-4H22V9.5h4V22h12.5v4H26v12.5Z"/>
                        </svg>
                    </button>
                </div>
                <div class="">
                    <div class="row mx-0 rounded px-2rem py-3 mt-2 bg-white bg-opacity-50">
                        <span class="col px-0 font-size-09 lh-sm">Дети от 8-ми лет</span>
                        <button class="col-auto ms-auto px-0">
                            <span class="position-relative red red-underline lh-sm">Удалить</span>
                        </button>
                    </div>
                    <div class="row mx-0 rounded px-2rem py-3 mt-2 bg-white bg-opacity-50">
                        <span class="col px-0 font-size-09 lh-sm">Сопровождение гида</span>
                        <button class="col-auto ms-auto px-0">
                            <span class="position-relative red red-underline lh-sm">Удалить</span>
                        </button>
                    </div>
                </div>
            </div>
            <div name="add-exc-excluded" class="col-12 col-lg">
                <h1 class="bold mb-3">Что не входит в стоимость</h1>
                <div class="row mx-0 pe-2 rounded bg-white align-items-center">
                    <input type="text" name="add-exc-excluded-input"
                           class="col px-2rem rounded border-0 font-size-09 flex-grow-1">
                    <button class="button col-auto bold bg-blue px-lg-4 rounded">
                        <span class="hide visible-lg bold white">Добавить</span>
                        <svg class="hide-lg white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                             height="25" width="25">
                            <path d="M22 38.5V26H9.5v-4H22V9.5h4V22h12.5v4H26v12.5Z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <h1 class="bold">Стоимость</h1>
        <div class="row mx-0 px-0 mt-3">
            <div class="col-12 col-xxl-4 row mx-0 px-0">
                        <span class="thin position-relative mb-2 col-12 px-0">тип билета <svg
                            class="opacity-25 position-relative info-icon" version="1.0"
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
                <div class="dropdown col-12 position-relative mx-0 px-0 bg-white rounded">
                    <button type="button"
                            class="big-button col-10 ps-2rem dropdown-toggle text-start font-size-09"
                            data-bs-toggle="dropdown"> Не выбрано
                    </button>
                    <ul
                        class="dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3 pt-0 rounded font-size-09">
                        <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> Обычный </a>
                        </li>
                        <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> Детский </a>
                        </li>
                    </ul>
                    <svg class="h-100 expand-icon " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                         height="20" width="20">
                        <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                    </svg>
                </div>
            </div>
            <div class="col-6 col-xxl-3 order-1 row mx-0 px-0 pe-3 pe-xxl-0 mt-3 mt-xxl-0 ms-xxl-2">
                        <span class="thin position-relative mb-2 col-12 px-0">конечная цена билета <svg
                            class="opacity-25 position-relative info-icon" version="1.0"
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
                <div class="col mx-0 px-0 pe-2rem rounded bg-white d-flex align-items-center">
                    <input type="text" name="add-exc-last-price"
                           class="w-100 d-flex flex-grow-1 ps-2rem pe-2 py-3 rounded border-0 font-size-09 semibold">
                    <span class="opacity-25 w-auto h-auto">руб.</span>
                </div>
            </div>
            <input type="checkbox" id="add-exc-discount-mark">
            <label for="add-exc-discount-mark"
                   class="align-items-center order-3 order-xxl-2 col-8 col-xxl-auto checkbox position-relative row mx-0 px-0 ms-xxl-4 mt-2rem align-items-center">
                <div
                    class="col-auto custom-checkbox rounded bg-white d-flex align-items-center justify-content-center">
                    <div class="col-auto custom-checkbox dot">
                    </div>
                </div>
                <span class="col-auto thin ms-1">добавить скидку</span>
            </label>
            <div
                class="discount-block order-2 order-xxl-3 hide row col-6 col-xxl px-0 ps-3 ps-xxl-0 mx-0 mt-3 mt-xxl-0 justify-content-center align-items-center">
                <div class="col-12 col-xxl-10 row mx-0 px-0">
                            <span class="thin position-relative mb-2 col-12 px-0">цена до скидки <svg
                                class="opacity-25 position-relative info-icon" version="1.0"
                                xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">

                                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                       fill="#000000" stroke="none">
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
                    <div class="col mx-0 px-0 pe-2rem rounded bg-white d-flex align-items-center">
                        <input type="text" name="add-exc-price"
                               class="w-100 d-flex flex-grow-1 ps-2rem pe-2 py-3 rounded border-0 font-size-09 semibold">
                        <span class="opacity-25 w-auto h-auto">руб.</span>
                    </div>
                </div>
            </div>
            <button class="col-auto hide order-last px-0 pt-2rem ms-auto">
                <span class="position-relative red red-underline">Удалить</span>
            </button>
        </div>
        <div class="mt-3">
            <button class="button bold bg-blue col-12 col-lg-auto mt-4 px-4 rounded">
                <span class="bold white">Добавить</span>
                <span class="hide-lg bold white"> новый тип билета</span>
            </button>
        </div>
        <h1 class="bold mt-5">Дата старта экскурсий</h1>
        <div class="row mx-0 px-0 mt-3">
            <div class="row col-12 col-lg-6 mx-0 px-0 gap-3 gap-lg-2">
                <div class="col-12 col-xl-5 row mx-0 px-0 flex-grow-1">
                    <span class="thin position-relative mb-2 col-12 px-0">выберите дату</span>
                    <div class="col mx-0 px-0 d-flex align-items-center rounded bg-white pe-2rem">
                        <input type="date" name="add-exc-date" placeholder="Не выбрано" min="2023-01-01"
                               max="2025-12-31"
                               class="d-flex flex-grow-1 px-2rem py-3 rounded border-0 font-size-09">
                        <svg class="h-100" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 48 48" height="20"
                             width="20">
                            <path
                                d="M9.25 44.7q-1.6 0-2.775-1.175Q5.3 42.35 5.3 40.75v-30.5q0-1.65 1.175-2.825Q7.65 6.25 9.25 6.25h3v-3H16v3h16v-3h3.75v3h3q1.65 0 2.825 1.175Q42.75 8.6 42.75 10.25v30.5q0 1.6-1.175 2.775Q40.4 44.7 38.75 44.7Zm0-3.95h29.5V19.5H9.25v21.25Zm0-24.25h29.5v-6.25H9.25Zm0 0v-6.25 6.25ZM24 28.15q-.9 0-1.525-.625Q21.85 26.9 21.85 26q0-.9.625-1.525.625-.625 1.525-.625.9 0 1.525.625.625.625.625 1.525 0 .9-.625 1.525-.625.625-1.525.625Zm-8 0q-.9 0-1.525-.625Q13.85 26.9 13.85 26q0-.9.625-1.525.625-.625 1.525-.625.9 0 1.525.625.625.625.625 1.525 0 .9-.625 1.525-.625.625-1.525.625Zm16 0q-.9 0-1.525-.625Q29.85 26.9 29.85 26q0-.9.625-1.525.625-.625 1.525-.625.9 0 1.525.625.625.625.625 1.525 0 .9-.625 1.525-.625.625-1.525.625Zm-8 8q-.9 0-1.525-.625Q21.85 34.9 21.85 34q0-.9.625-1.525.625-.625 1.525-.625.9 0 1.525.625.625.625.625 1.525 0 .9-.625 1.525-.625.625-1.525.625Zm-8 0q-.9 0-1.525-.625Q13.85 34.9 13.85 34q0-.9.625-1.525.625-.625 1.525-.625.9 0 1.525.625.625.625.625 1.525 0 .9-.625 1.525-.625.625-1.525.625Zm16 0q-.9 0-1.525-.625Q29.85 34.9 29.85 34q0-.9.625-1.525.625-.625 1.525-.625.9 0 1.525.625.625.625.625 1.525 0 .9-.625 1.525-.625.625-1.525.625Z"/>
                        </svg>
                    </div>
                </div>
                <div class="col col-xl-3 row mx-0 px-0">
                    <span class="thin position-relative mb-2 col-12 px-0">часы</span>
                    <div class="dropdown col-12 position-relative mx-0 px-0 bg-white rounded">
                        <button type="button"
                                class="big-button col-8 ps-2rem dropdown-toggle text-start font-size-09"
                                data-bs-toggle="dropdown"> 00
                        </button>
                        <ul
                            class="dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3 pt-0 rounded font-size-09">
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 00 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 01 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 02 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 03 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 04 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 05 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 06 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 07 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 08 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 09 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 10 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 11 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 12 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 13 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 14 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 15 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 16 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 17 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 18 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 19 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 20 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 21 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 22 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 23 </a>
                            </li>
                        </ul>
                        <svg class="h-100 expand-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                             height="20" width="20">
                            <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                        </svg>
                    </div>
                </div>
                <div class="col col-xl-3 row mx-0 px-0">
                    <span class="thin position-relative mb-2 col-12 px-0">минуты</span>
                    <div class="dropdown col-12 position-relative mx-0 px-0 bg-white rounded">
                        <button type="button"
                                class="big-button col-8 ps-2rem dropdown-toggle text-start font-size-09"
                                data-bs-toggle="dropdown"> 00
                        </button>
                        <ul
                            class="dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3 pt-0 rounded font-size-09">
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 00 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 01 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 02 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 03 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 04 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 05 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 06 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 07 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 08 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 09 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 10 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 11 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 12 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 13 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 14 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 15 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 16 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 17 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 18 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 19 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 20 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 21 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 22 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 23 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 24 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 25 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 26 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 27 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 28 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 29 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 30 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 31 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 32 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 33 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 34 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 35 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 36 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 37 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 38 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 39 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 40 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 41 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 42 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 43 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 44 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 45 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 46 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 47 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 48 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 49 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 50 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 51 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 52 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 53 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 54 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 55 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 56 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 57 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 58 </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> 59 </a>
                            </li>
                        </ul>
                        <svg class="h-100 expand-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                             height="20" width="20">
                            <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                        </svg>
                    </div>
                </div>
                <input type="checkbox" id="add-exc-time-mark">
                <label for="add-exc-time-mark"
                       class="align-items-center col-12 checkbox position-relative row mx-0 px-0 align-items-center">
                    <div
                        class="col-auto custom-checkbox rounded bg-white d-flex align-items-center justify-content-center">
                        <div class="col-auto custom-checkbox dot"></div>
                    </div>
                    <span class="col-auto thin ms-1">закрепить время</span>
                </label>
                <button class="button bold col-12 mt-4 px-4 rounded shadow-none inactive">Добавить
                    дату
                </button>
            </div>
            <div class="add-exc-dates col-6 d-flex flex-column gap-2 ms-3 mt-2rem hide">
                <div class="add-exc-date row mx-0 rounded px-2rem py-3 bg-light">
                    <span class="col px-0 font-size-09 lh-sm">05 сентября 2022</span>
                    <span class="col px-0 font-size-09 lh-sm">10:00</span>
                    <button class="col-auto ms-auto px-0">
                        <span class="position-relative red red-underline lh-sm">Удалить</span>
                    </button>
                </div>
                <div class="add-exc-date row mx-0 rounded px-2rem py-3 bg-light">
                    <span class="col px-0 font-size-09 lh-sm">05 сентября 2022</span>
                    <span class="col px-0 font-size-09 lh-sm">10:00</span>
                    <button class="col-auto ms-auto px-0">
                        <span class="position-relative red red-underline lh-sm">Удалить</span>
                    </button>
                </div>
                <div class="add-exc-date row mx-0 rounded px-2rem py-3 bg-light">
                    <span class="col px-0 font-size-09 lh-sm">05 сентября 2022</span>
                    <span class="col px-0 font-size-09 lh-sm">10:00</span>
                    <button class="col-auto ms-auto px-0">
                        <span class="position-relative red red-underline lh-sm">Удалить</span>
                    </button>
                </div>
            </div>
        </div>
        <!--добавление-->
        <div
            class="add-exc-accept splitted d-flex align-items-center justify-content-center justify-content-lg-start row mx-0 px-0 py-5 mt-5">
            <button
                class="col-12 col-lg-auto order-first excursion__menu font-size-06 blue-hover letter-spacing-3 text-uppercase bold px-0">
                предосмотр
                карточки
                <span class="blue fs-6">&gt;</span>
            </button>
            <button
                class="col-12 col-lg-auto order-first excursion__menu font-size-06 blue-hover letter-spacing-3 text-uppercase bold px-0 mx-0 ms-lg-4 mt-4 mt-lg-0">
                предосмотр
                <span class="font-size-06 letter-spacing-3 text-uppercase bold hide visible-lg">страницы</span>
                экскурсии
                <span class="blue fs-6">&gt;</span>
            </button>
            <div class="w-100 mt-4"></div>
            <button
                class="button order-3 order-lg-2 bold bg-white blue col-12 col-lg-auto mt-4 mt-lg-0 px-4 rounded">
                Сохранить
                черновик
            </button>
            <input type="checkbox" id="add-exc-accept-mark">
            <label for="add-exc-accept-mark"
                   class="align-items-center order-2 order-lg-3 checkbox position-relative row col-12 col-lg-auto justify-content-center px-0 mx-0 ms-lg-auto align-items-center">
                <div
                    class="col-auto custom-checkbox rounded bg-white d-flex align-items-center justify-content-center">
                    <div class="col-auto custom-checkbox dot">
                    </div>
                </div>
                <span class="col-auto thin ms-2 px-0">все данные введены верно</span>
            </label>
            <button
                class="button order-last bold bg-green col-12 col-lg-auto px-4 mx-0 ms-lg-5 mt-2 mt-lg-0 rounded">
                <span class="white hide visible-lg">Отправить на проверку</span>
                <span class="white hide-lg">Сохранить</span>
            </button>
        </div>
        <!--редактирование-->
        <div class="add-exc-accept splitted d-flex align-items-center row mx-0 px-0 py-5 mt-5 hide">
            <button
                class="col-auto excursion__menu font-size-06 blue-hover letter-spacing-3 text-uppercase bold px-0">
                предосмотр
                карточки
                <span class="blue fs-6">&gt;</span>
            </button>
            <button
                class="col-auto excursion__menu font-size-06 blue-hover letter-spacing-3 text-uppercase bold px-0 ms-4">
                предосмотр
                страницы экскурсии
                <span class="blue fs-6">&gt;</span>
            </button>
            <input type="checkbox" id="add-exc-accept-mark">
            <label for="add-exc-accept-mark"
                   class="align-items-center checkbox position-relative row col-auto px-0 ms-auto align-items-center">
                <div
                    class="col-auto custom-checkbox rounded bg-white d-flex align-items-center justify-content-center">
                    <div class="col-auto custom-checkbox dot">
                    </div>
                </div>
                <span class="col-auto thin ms-2 .font-size-06 px-0">все данные введены верно</span>
            </label>
            <button class="big-button bold bg-green col-auto px-4 ms-5 rounded">Сохранить</button>
        </div>
    </div>
</template>
