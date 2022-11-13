<template>
    <div id="settings" class="col">
        <div class="d-flex justify-content-between">
            <h2 class="lh-1 bold px-0 title-guide-cabinet">Настройка профиля гида</h2>
            <button class="d-lg-flex d-none dt-btn-text">смотреть профиль</button>
        </div>
        <div class="mb-4 mx-0 position-relative">
            <div class="dt-input__wrapper">
                <div class="d-flex align-items-center justify-content-between"><label
                    class="dt-input__label">ваше имя фамилия или название организации</label>
                </div>
                <div class="dt-input__group bg-white">
                    <input type="text" placeholder="Николаев Артем" class="dt-input"
                           autocomplete="off" maxlength="255">
                    <div class="dt-input__group-item">
                        <div class="dt-input__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%"
                                 viewBox="0 0 48 48" fill="#0071eb">
                                <path
                                    d="M24 23.8q-3.45 0-5.625-2.175T16.2 16q0-3.45 2.175-5.625T24 8.2q3.45 0 5.625 2.175T31.8 16q0 3.45-2.175 5.625T24 23.8ZM7.7 40.45v-5q0-2 1-3.425 1-1.425 2.55-2.175 3.4-1.5 6.5-2.25t6.25-.75q3.15 0 6.225.775Q33.3 28.4 36.7 29.9q1.6.7 2.6 2.125t1 3.425v5Zm3.4-3.4h25.8V35.5q0-.8-.475-1.525-.475-.725-1.175-1.075-3.15-1.5-5.775-2.075Q26.85 30.25 24 30.25q-2.85 0-5.525.575Q15.8 31.4 12.7 32.9q-.7.35-1.15 1.075-.45.725-.45 1.525ZM24 20.4q1.9 0 3.15-1.25T28.4 16q0-1.9-1.25-3.15T24 11.6q-1.9 0-3.15 1.25T19.6 16q0 1.9 1.25 3.15T24 20.4Zm0-4.4Zm0 21.05Z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-4 row mx-0">
                    <span class="dt-label thin position-relative mb-2 col-12 px-0 d-flex align-items-center">описание
                        <svg class="opacity-25 info-icon ms-1 " version="1.0"
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
            <textarea name="add-obj-description" cols="30" rows="12"
                      class="col-12 px-2rem py-4 rounded border-0 font-size-09"></textarea>
        </div>
        <div class="mb-4 row mx-0">
                    <span class="dt-label thin position-relative mb-2 col-12 px-0 d-flex align-items-center">добавьте фото
                        <svg class="opacity-25 info-icon ms-1" version="1.0"
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

        <div class="row col-12 col-lg-5 col-xl-4 col-xxl-3 mx-0 pe-lg-5">
            <button class="big-button bg-blue bold px-4 px-xxl-5 font-size-09 rounded">Сохранить</button>
        </div>
    </div>
</template>
