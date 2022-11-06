<template>
    <main class="wrapper">
        <div class="dt-page dt-page__preheader">
            <div class="container dt-preheader__content w-100 h-100 text-center">
                <div class="row">
                    <div class="col-lg-2">

                    </div>
                    <div class="col-lg-8">
                        <breadcrumbs :items="breadcrumbs"
                                     class="d-flex justify-content-center breadcrumbs__links-white"/>
                        <div class="dt-preheader__actions">

                        </div>
                        <p class="dt-preheader__title">Медовые водопады</p>
                        <div class="dt-preheader__tags">
                            <ul class="d-flex dt-tags__list gap-1 justify-content-center w-auto">
                                <li class="dt-tag__item">детские</li>
                                <li class="dt-tag__item">животные</li>
                                <li class="dt-tag__item">исторические</li>
                                <li class="dt-tag__item">мистические</li>
                            </ul>
                        </div>
                        <div class="curved">
                            <img src="/img/curved_strip.png" alt="">
                        </div>
                        <p class="dt-preheader__description">
                            118 увлекательных экскурсий в городе Ставропольский край – Минеральные воды и источники в
                            Ставрополье
                            славились лечебными свойствами уже давно: здесь лечили больных в войсках Кавказской линии. А
                            с 1803 года
                            начали обустраивать курорты на Кавказских минеральных водах., экскурсионные маршруты
                            охватывают 111
                            достопримечательностей.
                        </p>
                        <div class="dt-preheader__photos justify-content-center">
                            <div class="dt-photos__item">
                                <img src="/img/travels/1.jpg" alt="">
                            </div>
                            <div class="dt-photos__item">
                                <img src="/img/travels/2.jpg" alt="">
                            </div>
                            <div class="dt-photos__item d-none d-lg-block">
                                <img src="/img/travels/3.jpg" alt="">
                            </div>
                            <div class="dt-photos__item d-none d-lg-block">
                                <img src="/img/travels/4.jpg" alt="">
                            </div>
                            <div class="dt-photos__item d-none d-lg-block">
                                <img src="/img/travels/1.jpg" alt="">
                            </div>
                            <div class="dt-photos__item d-none d-lg-block">
                                <img src="/img/travels/2.jpg" alt="">
                            </div>
                            <div class="dt-photos__item dt-photos__item--placeholder">
                                <div class="dt-item__placeholder">
                                    <span>+8</span>
                                </div>
                            </div>
                        </div>
                        <div class="dt-preheader__view-reviews d-flex justify-content-center">
                            <p class="dt-btn-text text-uppercase text-white">Смотреть отзывы (8)</p>
                            <div class="dt-rating__star d-flex">
                                <img src="/img/icons/star_blue.svg" alt="">
                                <img src="/img/icons/star_blue.svg" alt="">
                                <img src="/img/icons/star_blue.svg" alt="">
                                <img src="/img/icons/star_blue.svg" alt="">
                                <img src="/img/icons/star_blue.svg" alt="">
                                <p class="dt-rating__text fw-bold text-white">4.84</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">

                    </div>
                </div>
            </div>
        </div>
        <div class="container dt-page dt-page-excursion dt-page__content-tour">
            <div class="dt-header__detail d-flex">
                <div class="dt-input__wrapper">
                    <div class="dt-input__group bg-white">
                        <div class="d-flex flex-wrap">
                            <label class="dt-label fw-thin">длительность</label>
                            <input type="text" name="name" class="dt-input fw-semibold" autocomplete="off"
                                   value="7 часов" disabled="">
                        </div>
                        <div class="dt-input__group-item">
                            <div class="dt-input__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%" viewBox="0 0 48 48"
                                     fill="#0071eb">
                                    <path
                                        d="m31.05 33.75 2.7-2.65-7.8-7.9v-9.75h-3.6V24.7ZM24 44.7q-4.25 0-8.025-1.625-3.775-1.625-6.6-4.45Q6.55 35.8 4.925 32.05T3.3 24q0-4.25 1.625-8.025 1.625-3.775 4.45-6.6Q12.2 6.55 15.975 4.9 19.75 3.25 24 3.25t8.025 1.65q3.775 1.65 6.6 4.475 2.825 2.825 4.475 6.6Q44.75 19.75 44.75 24t-1.65 8.025q-1.65 3.775-4.475 6.6-2.825 2.825-6.575 4.45T24 44.7ZM24 24Zm0 16.75q6.9 0 11.825-4.9Q40.75 30.95 40.75 24q0-6.9-4.925-11.825Q30.9 7.25 24 7.25q-6.9 0-11.825 4.925Q7.25 17.1 7.25 24q0 6.95 4.925 11.85Q17.1 40.75 24 40.75Z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dt-input__wrapper">
                    <div class="dt-input__group bg-white">
                        <div class="d-flex flex-wrap">
                            <label class="dt-label fw-thin">город отправления</label>
                            <input type="text" name="name" class="dt-input fw-semibold" autocomplete="off"
                                   value="Ставрополь" disabled="">
                        </div>
                        <div class="dt-input__group-item">
                            <div class="dt-input__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%" viewBox="0 0 48 48"
                                     fill="#0071eb">
                                    <path
                                        d="M25.45 42.7 19.7 27.9 4.9 22.15V19L43.1 4.5 28.6 42.7Zm1.45-7.1 9.3-24.2-24.15 9.35L22.8 24.8Zm-4.1-10.8Z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dt-input__wrapper">
                    <div class="dt-input__group bg-white">
                        <div class="d-flex flex-wrap">
                            <label class="dt-label fw-thin">тип экскурсии</label>
                            <input type="text" name="name" class="dt-input fw-semibold" autocomplete="off"
                                   value="мини-группа" disabled="">
                        </div>
                        <div class="dt-input__group-item">
                            <div class="dt-input__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%" viewBox="0 0 48 48"
                                     fill="#0071eb">
                                    <path
                                        d="M24 23.8q-3.45 0-5.625-2.175T16.2 16q0-3.45 2.175-5.625T24 8.2q3.45 0 5.625 2.175T31.8 16q0 3.45-2.175 5.625T24 23.8ZM7.7 40.45v-5q0-2 1-3.425 1-1.425 2.55-2.175 3.4-1.5 6.5-2.25t6.25-.75q3.15 0 6.225.775Q33.3 28.4 36.7 29.9q1.6.7 2.6 2.125t1 3.425v5Zm3.4-3.4h25.8V35.5q0-.8-.475-1.525-.475-.725-1.175-1.075-3.15-1.5-5.775-2.075Q26.85 30.25 24 30.25q-2.85 0-5.525.575Q15.8 31.4 12.7 32.9q-.7.35-1.15 1.075-.45.725-.45 1.525ZM24 20.4q1.9 0 3.15-1.25T28.4 16q0-1.9-1.25-3.15T24 11.6q-1.9 0-3.15 1.25T19.6 16q0 1.9 1.25 3.15T24 20.4Zm0-4.4Zm0 21.05Z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dt-input__wrapper">
                    <div class="dt-input__group bg-white">
                        <div class="d-flex flex-wrap">
                            <label class="dt-label fw-thin">передвижение</label>
                            <input type="text" name="name" class="dt-input fw-semibold" autocomplete="off"
                                   value="Комбинированная" disabled="">
                        </div>
                        <div class="dt-input__group-item">
                            <div class="dt-input__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%" viewBox="0 0 48 48"
                                     fill="#0071eb">
                                    <path
                                        d="M17.45 42.5q-3.65 0-6.125-2.5T8.85 33.95V17.1q-1.75-.75-2.875-2.225T4.85 11.5q0-2.5 1.775-4.25T10.85 5.5q2.5 0 4.25 1.75t1.75 4.25q0 1.9-1.125 3.4t-2.875 2.2v16.85q0 1.9 1.3 3.225 1.3 1.325 3.3 1.325 2 0 3.275-1.325T22 33.95v-19.9q0-3.6 2.475-6.075T30.6 5.5q3.6 0 6.075 2.475t2.475 6.075V30.9q1.75.7 2.875 2.2 1.125 1.5 1.125 3.4 0 2.45-1.75 4.225-1.75 1.775-4.25 1.775-2.45 0-4.225-1.775Q31.15 38.95 31.15 36.5q0-1.9 1.125-3.4t2.875-2.2V14.05q0-1.95-1.3-3.25t-3.3-1.3q-1.95 0-3.25 1.3T26 14.05v19.9q0 3.55-2.475 6.05t-6.075 2.5Zm-6.6-28.65q1 0 1.675-.7t.675-1.65q0-1-.675-1.675T10.85 9.15q-.95 0-1.65.675T8.5 11.5q0 .95.7 1.65t1.65.7Zm26.35 25q.95 0 1.625-.7t.675-1.65q0-1-.675-1.675t-1.675-.675q-.9 0-1.625.675T34.8 36.5q0 .95.725 1.65t1.675.7ZM10.85 11.5Zm26.3 25Z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row dt-page__content">
                <div v-if="!isBooking" class="col-lg-8 dt-page__content">
                    <p class="dt-article__title">Описание экскурсии</p>
                    <p class="dt-main-text-thin">Приглашаю вас совместить приятное с полезным и сделать
                        акклиматизационный выход с красивыми видами на
                        гору Чегет и ледниковое озеро Донгуз-Орун-Кель. Воды, стекающие по склонам, размывают почву и
                        несут
                        в водоем различные минералы, которые и окрашивают жидкость в различные цвета. Оттенки водной
                        глади
                        могут зависеть как от угла обзора, так от погоды и времени года. Палитра меняется от
                        ярко-изумрудных
                        цветов до болотисто-зеленых и ржавых коричневых оттенков. <br><br>
                        Наш маршрут начнется снизу от Поляны Чегет, откуда мы пешком по горной широкой тропе поднимемся
                        на
                        озеро, преодолев первые 500 м вертикального набора высоты. У озера сделаем привал. А далее
                        поднимемся еще выше до станции канатной дороги горы Чегет, где находится смотровая площадка и
                        знаменитое кафе Ай (луна), где любил бывать Высоций и Визбор.<br><br>
                        Далее по желанию мы можем подняться наверх горы Чегет и спуститься вниз на канатной дороге. Или
                        спуститься сразу пешком вниз от второй станции, не используя канатную дорогу.<br><br>
                        Наш маршрут закончится спуском на канатной дороге вниз до Поляны Чегет.<br><br>
                        Одежду и обувь рекомендуется подбирать из синтетических материалов и удобную для активной
                        прогулки.
                        Также обязательно использовать все средства солнце защиты (крем, очки, головные уборы). Не
                        лишним
                        будет использование треккинговых палок, особенно если вы планируете идти по сложному варианту
                        маршрута.<br><br> Если у вас не хватает снаряжения, то можно взять напрокат на месте.</p>
                    <div class="dt-paragraph__group">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h3 class="dt-paragraph__caption">Место начала</h3>
                            <p class="dt-btn-text text-uppercase d-lg-flex d-none">Смотреть на карте</p>
                        </div>
                        <div class="d-flex dt-paragraph align-items-start">
                            <div class="dt-paragraph__icon me-2" style="width: 20px; min-width: 20px;">
                                <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%" viewBox="0 0 48 48"
                                     fill="#0071eb">
                                    <path
                                        d="M25.45 42.7 19.7 27.9 4.9 22.15V19L43.1 4.5 28.6 42.7Zm1.45-7.1 9.3-24.2-24.15 9.35L22.8 24.8Zm-4.1-10.8Z"></path>
                                </svg>
                            </div>
                            <div class="dt-paragraph__text">
                                <h4 class="dt-text__title m-0">Мечеть в центре посёлка Терскол</h4>
                                <p class="dt-main-text-thin"><span class="text-danger">Внимание!!!</span> Место встречи
                                    может быть изменено. Мы вышлем вам точное место начала вместе с
                                    контактами гида после бронирования билетов.</p>
                            </div>
                        </div>
                    </div>
                    <div class="dt-paragraph__group">
                        <h3 class="dt-paragraph__caption">Маршрут экскурсии</h3>
                        <div class="dt-paragraph__text">
                            <p class="dt-main-text-thin">Не следует, однако забывать, что новая модель организационной
                                деятельности влечет за собой процесс внедрения и модернизации систем массового участия.
                                Товарищи! постоянное информационно-пропагандистское обеспечение нашей деятельности в
                                значительной степени обуславливает создание систем массового участия.</p>
                        </div>
                        <div class="d-flex dt-paragraph">
                            <div class="dt-paragraph__icon dt-paragraph__icon--width-30 blue me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%" viewBox="0 0 48 48"
                                     fill="white">
                                    <path
                                        d="M9.3 42.7V7.25h18.45l.95 4.3h12.05V31.5H26.6l-.95-4.25h-12.4V42.7ZM25 19.4Zm5 8.15h6.75v-12H25.3l-.95-4.3h-11.1V23.3h15.8Z"></path>
                                </svg>
                            </div>
                            <div class="dt-paragraph__text">
                                <h4 class="dt-text__title">Замок Нессельбек</h4>
                                <p class="dt-main-text-thin">Не аутентичная, но очень колоритная постройка, на фоне
                                    которой получаются интересные фотографии.</p>
                                <div class="dt-text__links d-flex">
                                    <p class="dt-btn-text text-uppercase me-3 d-lg-flex d-none">Смотреть на карте</p>
                                    <p class="dt-btn-text text-uppercase me-3 d-flex d-lg-none">на карте</p>
                                    <p class="dt-btn-text text-uppercase">Фото</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex dt-paragraph">
                            <div class="dt-paragraph__icon dt-paragraph__icon--width-30 blue me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%" viewBox="0 0 48 48"
                                     fill="white">
                                    <path
                                        d="M9.3 42.7V7.25h18.45l.95 4.3h12.05V31.5H26.6l-.95-4.25h-12.4V42.7ZM25 19.4Zm5 8.15h6.75v-12H25.3l-.95-4.3h-11.1V23.3h15.8Z"></path>
                                </svg>
                            </div>
                            <div class="dt-paragraph__text">
                                <h4 class="dt-text__title">Высоту Эфа</h4>
                                <p class="dt-main-text-thin"><span class="text-danger">Внимание!!!</span> Место встречи
                                    может быть изменено. Мы вышлем вам точное место начала вместе с
                                    контактами гида после бронирования билетов.</p>
                                <div class="dt-text__links d-flex">
                                    <p class="dt-btn-text text-uppercase me-3 d-lg-flex d-none">Смотреть на карте</p>
                                    <p class="dt-btn-text text-uppercase me-3 d-flex d-lg-none">на карте</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex dt-paragraph">
                            <div class="dt-paragraph__icon blue dt-paragraph__icon--width-30 me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%" viewBox="0 0 48 48"
                                     fill="white">
                                    <path
                                        d="M9.3 42.7V7.25h18.45l.95 4.3h12.05V31.5H26.6l-.95-4.25h-12.4V42.7ZM25 19.4Zm5 8.15h6.75v-12H25.3l-.95-4.3h-11.1V23.3h15.8Z"></path>
                                </svg>
                            </div>
                            <div class="dt-paragraph__text">
                                <h4 class="dt-text__title">Высоту Мюллера</h4>
                            </div>
                        </div>
                        <div class="d-flex dt-paragraph">
                            <div class="dt-paragraph__icon blue dt-paragraph__icon--width-30 me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%" viewBox="0 0 48 48"
                                     fill="white">
                                    <path
                                        d="M9.3 42.7V7.25h18.45l.95 4.3h12.05V31.5H26.6l-.95-4.25h-12.4V42.7ZM25 19.4Zm5 8.15h6.75v-12H25.3l-.95-4.3h-11.1V23.3h15.8Z"></path>
                                </svg>
                            </div>
                            <div class="dt-paragraph__text">
                                <h4 class="dt-text__title">Пляж Балтийского моря</h4>
                                <p class="dt-main-text-thin">Атмосферный, безлюдный и будто созданный для
                                    инста-прогулки.</p>
                            </div>
                        </div>
                        <div class="d-flex dt-paragraph">
                            <div class="dt-paragraph__icon blue dt-paragraph__icon--width-30 me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%" viewBox="0 0 48 48"
                                     fill="white">
                                    <path
                                        d="M9.3 42.7V7.25h18.45l.95 4.3h12.05V31.5H26.6l-.95-4.25h-12.4V42.7ZM25 19.4Zm5 8.15h6.75v-12H25.3l-.95-4.3h-11.1V23.3h15.8Z"></path>
                                </svg>
                            </div>
                            <div class="dt-paragraph__text">
                                <h4 class="dt-text__title">Зеленоградск</h4>
                                <p class="dt-main-text-thin">Один из красивейших курортных городков побережья с
                                    довоенной
                                    архитектурой, чудесным променадом и современным «культом кошек».</p>
                                <div class="dt-text__links d-flex">
                                    <p class="dt-btn-text text-uppercase me-3 d-lg-flex d-none">Смотреть на карте</p>
                                    <p class="dt-btn-text text-uppercase me-3 d-flex d-lg-none">на карте</p>
                                    <p class="dt-btn-text text-uppercase">Фото</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="dt-paragraph__group">
                                <h3 class="dt-paragraph__caption">Что входит в стоимость</h3>
                                <ul class="dt-list__price">
                                    <li class="dt-price__item">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"
                                             viewBox="0 0 48 48" fill="#65c350">
                                            <path d="M18.9 36.4 7 24.5l2.9-2.85 9 9L38.05 11.5l2.9 2.85Z"></path>
                                        </svg>
                                        Сопровождение гида
                                    </li>
                                    <li class="dt-price__item">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"
                                             viewBox="0 0 48 48" fill="#65c350">
                                            <path d="M18.9 36.4 7 24.5l2.9-2.85 9 9L38.05 11.5l2.9 2.85Z"></path>
                                        </svg>
                                        Дети от 8-ми лет
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="dt-paragraph__group">
                                <h3 class="dt-paragraph__caption">Что не входит в стоимость</h3>
                                <ul class="dt-list__price">
                                    <li class="dt-price__item">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"
                                             viewBox="0 0 48 48">
                                            <path fill="#f73637"
                                                  d="m12.45 38.35-2.8-2.8L21.2 24 9.65 12.45l2.8-2.8L24 21.2 35.55 9.65l2.8 2.8L26.8 24l11.55 11.55-2.8 2.8L24 26.8Z"></path>
                                        </svg>
                                        Перекус на маршруте и в кафе
                                    </li>
                                    <li class="dt-price__item">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"
                                             viewBox="0 0 48 48">
                                            <path fill="#f73637"
                                                  d="m12.45 38.35-2.8-2.8L21.2 24 9.65 12.45l2.8-2.8L24 21.2 35.55 9.65l2.8 2.8L26.8 24l11.55 11.55-2.8 2.8L24 26.8Z"></path>
                                        </svg>
                                        Подьем и спуск на канатной дороге
                                    </li>
                                    <li class="dt-price__item">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"
                                             viewBox="0 0 48 48">
                                            <path fill="#f73637"
                                                  d="m12.45 38.35-2.8-2.8L21.2 24 9.65 12.45l2.8-2.8L24 21.2 35.55 9.65l2.8 2.8L26.8 24l11.55 11.55-2.8 2.8L24 26.8Z"></path>
                                        </svg>
                                        Прокат снаряжения
                                    </li>
                                    <li class="dt-price__item">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"
                                             viewBox="0 0 48 48">
                                            <path fill="#f73637"
                                                  d="m12.45 38.35-2.8-2.8L21.2 24 9.65 12.45l2.8-2.8L24 21.2 35.55 9.65l2.8 2.8L26.8 24l11.55 11.55-2.8 2.8L24 26.8Z"></path>
                                        </svg>
                                        Трансфер из города КМК или аэропорта
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="dt-paragraph__group">
                        <h3 class="dt-paragraph__caption">Как оплатить</h3>
                        <ul class="dt-list__price">
                            <li class="dt-price__item">
                                Онлайн картой (МИР, Visa, MasterCard).
                            </li>
                            <li class="dt-price__item">
                                Онлайн электронными деньгами (ЮMoney).
                            </li>
                            <li class="dt-price__item">
                                Оффлайн в офисе по адресу: Ставрополь, ул. Ленина, д.100, оф. 84.
                            </li>
                        </ul>
                        <p class="dt-btn-text text-uppercase me-3">подробнее про способы оплаты</p>
                    </div>
                    <div class="dt-bg__guide">
                        <div class="dt-bg-light-gray">
                            <div class="dt-guide__info d-flex w-100 h-100">
                                <div class="dt-guide__text">
                                    <h3 class="fw-bold dt-guide__caption">Остались вопросы?</h3>
                                    <p class="dt-main-text-thin">
                                        Вы можете пообщаться с гидом до оплаты заказа и получить ответы на все
                                        интересующие
                                        вас вопросы.
                                    </p>
                                </div>
                                <button class="dt-btn-blue"><span>Задать вопрос гиду</span></button>
                            </div>
                        </div>
                    </div>
                    <div class="dt-reviews">
                        <div class="dt-reviews__header d-flex justify-content-between">
                            <p class="dt-article__title mb-0">Отзывы об экскурсии</p>
                            <div class="dt-article__reviews-count d-flex align-items-center">
                                <h3 class="fw-bold me-3">4.86 из 5</h3>
                                <div class="dt-rating__star d-flex w-auto me-3">
                                    <img src="/img/icons/star_blue.svg" alt="">
                                    <img src="/img/icons/star_blue.svg" alt="">
                                    <img src="/img/icons/star_blue.svg" alt="">
                                    <img src="/img/icons/star_blue.svg" alt="">
                                    <img src="/img/icons/star_blue.svg" alt="">
                                </div>
                                <p class="fw-thin">43 оценки</p>
                            </div>
                        </div>
                        <div class="dt-reviews__rating">
                            <div class="dt-rating__item d-flex align-items-center">
                                <div class="dt-rating__star d-flex me-4">
                                    <img src="/img/icons/star_grey.svg" alt="">
                                    <img src="/img/icons/star_grey.svg" alt="">
                                    <img src="/img/icons/star_grey.svg" alt="">
                                    <img src="/img/icons/star_grey.svg" alt="">
                                    <img src="/img/icons/star_grey.svg" alt="">
                                </div>
                                <div class="loading loading--percently-80 me-2"></div>
                                <p class="dt-main-text-thin">1090</p>
                            </div>
                            <div class="dt-rating__item d-flex align-items-center">
                                <div class="dt-rating__star d-flex me-4">
                                    <img src="/img/icons/star_grey.svg" alt="">
                                    <img src="/img/icons/star_grey.svg" alt="">
                                    <img src="/img/icons/star_grey.svg" alt="">
                                    <img src="/img/icons/star_grey.svg" alt="">
                                </div>
                                <div class="loading loading--percently-40 me-2"></div>
                                <p class="dt-main-text-thin">140</p>
                            </div>
                            <div class="dt-rating__item d-flex align-items-center">
                                <div class="dt-rating__star d-flex me-4">
                                    <img src="/img/icons/star_grey.svg" alt="">
                                    <img src="/img/icons/star_grey.svg" alt="">
                                    <img src="/img/icons/star_grey.svg" alt="">
                                </div>
                                <div class="loading loading--percently-20 me-2"></div>
                                <p class="dt-main-text-thin">21</p>
                            </div>
                            <div class="dt-rating__item d-flex align-items-center">
                                <div class="dt-rating__star d-flex me-4">
                                    <img src="/img/icons/star_grey.svg" alt="">
                                    <img src="/img/icons/star_grey.svg" alt="">
                                </div>
                                <div class="loading me-2"></div>
                                <p class="dt-main-text-thin">0</p>
                            </div>
                            <div class="dt-rating__item d-flex align-items-center">
                                <div class="dt-rating__star d-flex me-4">
                                    <img src="/img/icons/star_grey.svg" alt="">
                                </div>
                                <div class="loading loading--percently-10 me-2"></div>
                                <p class="dt-main-text-thin">4</p>
                            </div>
                        </div>
                        <div class="dt-reviews__sort-by d-flex justify-content-end">
                            <p class="dt-sort-by__title fw-thin">сортировка по</p>
                            <p class="dt-sort-by__item active fw-regular">дате</p>
                            <p class="dt-sort-by__item fw-regular">оценке</p>
                        </div>
                        <div class="dt-reviews__content">
                            <div class="dt-review__item d-flex">
                                <div class="dt-review__avatar">
                                    <img src="/img/avatars/2.jpg" alt="">
                                </div>
                                <div class="dt-review__header d-lg-none d-block">
                                    <div class="dt-header__user">
                                        <p class="dt-user__date-ago fw-thin text-muted">2 недели назад</p>
                                        <p class="dt-user__name fw-semibold">Екатерина Иванова</p>
                                    </div>
                                    <div class="dt-rating__star w-auto d-flex">
                                        <img src="/img/icons/star_blue.svg" alt="">
                                        <img src="/img/icons/star_blue.svg" alt="">
                                        <img src="/img/icons/star_blue.svg" alt="">
                                        <img src="/img/icons/star_blue.svg" alt="">
                                        <img src="/img/icons/star_blue.svg" alt="">
                                    </div>
                                </div>
                                <div class="dt-review__block flex-grow-1">
                                    <div class="dt-review__header d-lg-block d-none">
                                        <div class="dt-header__user">
                                            <p class="dt-user__date-ago fw-thin text-muted">2 недели назад</p>
                                            <p class="dt-user__name fw-semibold">Екатерина Иванова</p>
                                        </div>
                                        <div class="dt-rating__star w-auto d-flex">
                                            <img src="/img/icons/star_blue.svg" alt="">
                                            <img src="/img/icons/star_blue.svg" alt="">
                                            <img src="/img/icons/star_blue.svg" alt="">
                                            <img src="/img/icons/star_blue.svg" alt="">
                                            <img src="/img/icons/star_blue.svg" alt="">
                                        </div>
                                    </div>
                                    <p class="dt-review__description dt-main-text-thin">
                                        Не следует, однако забывать, что новая модель организационной деятельности
                                        влечет за собой процесс внедрения и модернизации систем массового участия.
                                        Товарищи! постоянное информационно-пропагандистское обеспечение нашей
                                        деятельности в значительной степени обуславливает создание систем массового
                                        участия.
                                    </p>

                                    <div class="dt-form dt-review__photos">
                                        <div class="dt-photos__item p-0">
                                            <img src="/img/travels/1.jpg">
                                        </div>
                                        <div class="dt-photos__item p-0">
                                            <img src="/img/travels/2.jpg">
                                        </div>
                                        <div class="dt-photos__item p-0">
                                            <img src="/img/travels/3.jpg">
                                        </div>
                                        <div class="dt-photos__item p-0">
                                            <img src="/img/travels/4.jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dt-review__item d-flex">
                                <div class="dt-review__avatar">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%"
                                         viewBox="0 0 48 48" fill="#22242566">
                                        <path
                                            d="M17.8 28.9q-1.15 0-1.95-.8t-.8-1.95q0-1.2.8-1.975.8-.775 1.95-.775 1.2 0 1.975.8.775.8.775 1.95 0 1.2-.8 1.975-.8.775-1.95.775Zm12.45 0q-1.2 0-1.975-.8-.775-.8-.775-1.95 0-1.2.8-1.975.8-.775 1.95-.775t1.95.8q.8.8.8 1.95 0 1.2-.8 1.975-.8.775-1.95.775ZM24 40.75q7 0 11.875-4.875T40.75 24q0-1.3-.2-2.5t-.5-2.25q-1 .3-2.125.375-1.125.075-2.375.075-4.8 0-9.05-1.95-4.25-1.95-7.3-5.6-1.65 3.95-4.775 6.925Q11.3 22.05 7.3 23.7v.35q0 7 4.85 11.85T24 40.75Zm0 3.95q-4.25 0-8.025-1.625-3.775-1.625-6.6-4.425-2.825-2.8-4.45-6.575Q3.3 28.3 3.3 24q0-4.3 1.625-8.075Q6.55 12.15 9.375 9.35q2.825-2.8 6.6-4.45 3.775-1.65 8.075-1.65 4.3 0 8.05 1.65 3.75 1.65 6.55 4.45 2.8 2.8 4.45 6.575Q44.75 19.7 44.75 24q0 4.3-1.625 8.075-1.625 3.775-4.45 6.575-2.825 2.8-6.6 4.425Q28.3 44.7 24 44.7ZM19.4 7.65q4.4 5.15 8.125 7.05 3.725 1.9 8.175 1.9 1.2 0 1.9-.05t1.55-.3Q36.9 12.2 33.025 9.6 29.15 7 24 7q-1.35 0-2.55.2-1.2.2-2.05.45ZM7.45 20.1q2.4-.9 5.475-4.075Q16 12.85 17.3 8.35q-4.35 1.95-6.575 4.975Q8.5 16.35 7.45 20.1ZM19.4 7.65Zm-2.1.7Z"></path>
                                    </svg>
                                </div>
                                <div class="dt-review__header d-lg-none d-block">
                                    <div class="dt-header__user">
                                        <p class="dt-user__date-ago fw-thin text-muted">3 месяца назад</p>
                                        <p class="dt-user__name fw-semibold">Николаев Алексей</p>
                                    </div>
                                    <div class="dt-rating__star w-auto d-flex">
                                        <img src="/img/icons/star_blue.svg" alt="">
                                        <img src="/img/icons/star_blue.svg" alt="">
                                        <img src="/img/icons/star_blue.svg" alt="">
                                        <img src="/img/icons/star_blue.svg" alt="">
                                        <img src="/img/icons/star_blue.svg" alt="">
                                    </div>
                                </div>
                                <div class="dt-review__block flex-grow-1">
                                    <div class="dt-review__header d-lg-block d-none">
                                        <div class="dt-header__user">
                                            <p class="dt-user__date-ago fw-thin text-muted">3 месяца назад</p>
                                            <p class="dt-user__name fw-semibold">Николаев Алексей</p>
                                        </div>
                                        <div class="dt-rating__star w-auto d-flex">
                                            <img src="/img/icons/star_blue.svg" alt="">
                                            <img src="/img/icons/star_blue.svg" alt="">
                                            <img src="/img/icons/star_blue.svg" alt="">
                                            <img src="/img/icons/star_blue.svg" alt="">
                                            <img src="/img/icons/star_blue.svg" alt="">
                                        </div>
                                    </div>
                                    <p class="dt-review__description dt-main-text-thin">
                                        Что новая модель организационной деятельности обеспечивает широкому кругу
                                        (специалистов) участие в формировании соответствующий условий активизации.
                                    </p>
                                </div>
                            </div>
                            <div class="dt-review__item d-flex">
                                <div class="dt-review__avatar">
                                    <img src="/img/avatars/2.jpg" alt="">
                                </div>
                                <div class="dt-review__header d-lg-none d-block">
                                    <div class="dt-header__user">
                                        <p class="dt-user__date-ago fw-thin text-muted">пол года назад</p>
                                        <p class="dt-user__name fw-semibold">Имя Отчество</p>
                                    </div>
                                    <div class="dt-rating__star w-auto d-flex">
                                        <img src="/img/icons/star_blue.svg" alt="">
                                        <img src="/img/icons/star_blue.svg" alt="">
                                        <img src="/img/icons/star_blue.svg" alt="">
                                        <img src="/img/icons/star_blue.svg" alt="">
                                        <img src="/img/icons/star_blue.svg" alt="">
                                    </div>
                                </div>
                                <div class="dt-review__block flex-grow-1">
                                    <div class="dt-review__header d-lg-block d-none">
                                        <div class="dt-header__user">
                                            <p class="dt-user__date-ago fw-thin text-muted">пол года назад</p>
                                            <p class="dt-user__name fw-semibold">Имя Отчество</p>
                                        </div>
                                        <div class="dt-rating__star w-auto d-flex">
                                            <img src="/img/icons/star_blue.svg" alt="">
                                            <img src="/img/icons/star_blue.svg" alt="">
                                            <img src="/img/icons/star_blue.svg" alt="">
                                            <img src="/img/icons/star_blue.svg" alt="">
                                            <img src="/img/icons/star_blue.svg" alt="">
                                        </div>
                                    </div>
                                    <p class="dt-review__description dt-main-text-thin">
                                        Равным образом дальнейшее развитие различных форм деятельности требуют от нас
                                        анализа позиций, занимаемых участниками в отношении поставленных задач. Идейные
                                        соображения высшего порядка, а также дальнейшее развитие различных форм
                                        деятельности
                                        играет важную роль в формировании соответствующий условий активизации. Товарищи!
                                        сложившаяся структура организации позволяет оценить значение систем массового
                                        участия. Значимость этих проблем настолько очевидна, что постоянное
                                        информационно-пропагандистское обеспечение нашей деятельности в значительной
                                        степени
                                        обуславливает создание соответствующий условий активизации. Задача организации,
                                        в
                                        особенности же реализация намеченных плановых заданий влечет за собой процесс
                                        внедрения и модернизации модели развития. Равным образом консультация с широким
                                        активом влечет за собой процесс внедрения и модернизации направлений
                                        прогрессивного
                                        развития.
                                    </p>
                                </div>
                            </div>
                            <button
                                class="align-items-center d-flex dt-btn dt-btn--height-50 dt-btn-blue justify-content-center w-100">
                                <span>Показать еще</span>
                                <div class="dt-btn__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%"
                                         viewBox="0 0 48 48" fill="#ffffff">
                                        <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"></path>
                                    </svg>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
                <tour-booking v-else @closeBooking="isBooking = false"/>
                <div class="col-lg-4">
                    <div class="dt-bg__guide">
                        <div class="dt-bg-light-gray">
                            <div class="dt-guide__info d-flex w-100 h-100">
                                <div class="dt-guide__img">
                                    <img src="/img/avatars/7.jpg" alt="">
                                </div>
                                <div class="dt-guide__text">
                                    <p class="dt-guide__title fw-thin">экскурсию для вас проведет</p>
                                    <p class="dt-guide__name">Петров Николай Игоревич</p>
                                    <div class="dt-rating__star d-flex">
                                        <img src="/img/icons/star_blue.svg" alt="">
                                        <img src="/img/icons/star_blue.svg" alt="">
                                        <img src="/img/icons/star_blue.svg" alt="">
                                        <img src="/img/icons/star_blue.svg" alt="">
                                        <img src="/img/icons/star_blue.svg" alt="">
                                        <p class="dt-guide__rating fw-bold">4.84</p>
                                    </div>
                                    <p class="dt-btn-text text-uppercase me-3 d-lg-flex d-none">смотреть отзывы
                                        (140)</p>
                                    <p class="dt-btn-text text-uppercase text-nowrap d-flex d-lg-none">отзывы (140)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dt-bg__price">
                        <div class="dt-price text-center">
                        <span style="color:#f83737;text-decoration:line-through">
                        <p class="dt-price__non-active">25 200</p>
                        </span>

                            <p class="dt-price__active">21 900</p>
                            <label>за человека</label>
                        </div>
                        <div class="dt-preferences">
                            <div class="dt-preferences__item d-flex mb-3">
                                <div class="dt-item__icon me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 48 48"
                                         fill="#0071eb">
                                        <path
                                            d="M35.25 43.2h-22.3V16.8l13.6-14.05 2.5 1.85q.35.3.55.875.2.575.2 1.325v.25l-2.15 9.75H42.3q1.55 0 2.775 1.2 1.225 1.2 1.225 2.8v2.8q0 .4.05.85.05.45-.1.8L39.8 40.1q-.55 1.3-1.825 2.2-1.275.9-2.725.9ZM16.6 39.25h19.3l6.35-15.1V20.8h-19.2l2.4-11.4-8.85 9.4Zm0-20.45v20.45Zm-3.65-2v4h-6v18.45h6v3.95H3V16.8Z"></path>
                                    </svg>
                                </div>
                                <div class="dt-item__text">
                                    <div class="dt-text__title">Гарантия лучшей цены</div>
                                    <p class="dt-main-text-thin">
                                        Если вы найдете цену ниже, мы вернем разницу.
                                    </p>
                                </div>
                            </div>
                            <div class="dt-preferences__item d-flex">
                                <div class="dt-item__icon me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 48 48"
                                         fill="#0071eb">
                                        <path
                                            d="m17 45.9-3.95-6.8-7.9-1.6.9-7.65-5-5.85 5-5.8-.9-7.65 7.9-1.6L17 2.1l7 3.2 7-3.2 4 6.85 7.85 1.6-.9 7.65 5 5.8-5 5.85.9 7.65L35 39.1l-4 6.8-7-3.2Zm1.75-5.15L24 38.5l5.4 2.25 3.3-4.95 5.7-1.45-.55-5.85L41.8 24l-3.95-4.6.55-5.85-5.7-1.35-3.4-4.95L24 9.5l-5.4-2.25-3.3 4.95-5.7 1.35.55 5.85L6.2 24l3.95 4.5-.55 5.95 5.7 1.35ZM24 24Zm-2.15 6.9 11.6-11.5-2.55-2.3-9.05 9-4.7-4.95-2.6 2.5Z"></path>
                                    </svg>
                                </div>
                                <div class="dt-item__text">
                                    <div class="dt-text__title">Моментальное бронирование</div>
                                    <p class="dt-main-text-thin">
                                        Без ожидания ответа гида
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="dt-set-order">
                            <button @click="isBooking = true" class="dt-btn-blue w-100 dt-btn--height-60">
                                <span>Оформить заказ</span>
                            </button>
                        </div>
                        <div class="dt-question-guide text-center">
                            <p class="dt-btn-text text-uppercase me-lg-3">задать вопрос гиду</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <benefits-component v-if="!isBooking" />
    </main>
</template>
<script>
import Breadcrumbs from "@/components/Fragments/Breadcrumbs.vue";
import TourBooking from "@/components/TourObjects/TourBooking.vue";

export default {
    components: {TourBooking, Breadcrumbs},
    data() {
        return {
            breadcrumbs: [
                {
                    text: "Главная",
                    href: "/",
                },
                {
                    text: "Все экскурсии",
                    href: "/tours-all",
                },
                {
                    text: "Медовые водопады",
                    active: true,
                }], isBooking: false
        }
    }
}
</script>
