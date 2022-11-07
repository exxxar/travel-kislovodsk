<template>
    <main class="container px-3 px-sm-0 personal-account">
        <breadcrumbs :items="breadcrumbs"/>
        <div class="main row">
            <div class="visible-lg col-3 pe-5">
                <button class="personal-account-nav__link personal-account-nav__link_active
                        menu-item d-flex rounded p-4 mb-2
                        justify-content-between align-items-center active">
                    <span class="menu-item__name blue-hover blue-hover font-size-09 semibold">Мои экскурсии</span>
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                            <path
                                d="M17.45 42.5q-3.65 0-6.125-2.5T8.85 33.95V17.1q-1.75-.75-2.875-2.225T4.85 11.5q0-2.5 1.775-4.25T10.85 5.5q2.5 0 4.25 1.75t1.75 4.25q0 1.9-1.125 3.4t-2.875 2.2v16.85q0 1.9 1.3 3.225 1.3 1.325 3.3 1.325 2 0 3.275-1.325T22 33.95v-19.9q0-3.6 2.475-6.075T30.6 5.5q3.6 0 6.075 2.475t2.475 6.075V30.9q1.75.7 2.875 2.2 1.125 1.5 1.125 3.4 0 2.45-1.75 4.225-1.75 1.775-4.25 1.775-2.45 0-4.225-1.775Q31.15 38.95 31.15 36.5q0-1.9 1.125-3.4t2.875-2.2V14.05q0-1.95-1.3-3.25t-3.3-1.3q-1.95 0-3.25 1.3T26 14.05v19.9q0 3.55-2.475 6.05t-6.075 2.5Zm-6.6-28.65q1 0 1.675-.7t.675-1.65q0-1-.675-1.675T10.85 9.15q-.95 0-1.65.675T8.5 11.5q0 .95.7 1.65t1.65.7Zm26.35 25q.95 0 1.625-.7t.675-1.65q0-1-.675-1.675t-1.675-.675q-.9 0-1.625.675T34.8 36.5q0 .95.725 1.65t1.675.7ZM10.85 11.5Zm26.3 25Z"/>
                        </svg>
                    </div>
                </button>
                <button class="personal-account-nav__link menu-item d-flex rounded p-4 mb-2
                    justify-content-between align-items-center">
                    <span class="menu-item__name blue-hover font-size-09 semibold">Мои объекты</span>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                            <path
                                d="M9.3 42.7V7.25h18.45l.95 4.3h12.05V31.5H26.6l-.95-4.25h-12.4V42.7ZM25 19.4Zm5 8.15h6.75v-12H25.3l-.95-4.3h-11.1V23.3h15.8Z"/>
                        </svg>
                    </div>
                </button>
                <button class="personal-account-nav__link menu-item d-flex rounded p-4 mb-2 justify-content-between align-items-center">
                    <span class="menu-item__name blue-hover font-size-09 semibold">Транзакции</span>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                            <path
                                d="M32.6 27.2q1.25 0 2.225-.975.975-.975.975-2.275 0-1.25-.975-2.2-.975-.95-2.225-.95t-2.225.95q-.975.95-.975 2.2 0 1.3.975 2.275.975.975 2.225.975ZM9.25 36.1v2.65-29.5V36.1Zm0 6.6q-1.55 0-2.75-1.175T5.3 38.75V9.25q0-1.6 1.2-2.8 1.2-1.2 2.75-1.2h29.5q1.65 0 2.825 1.2 1.175 1.2 1.175 2.8v6.45h-4V9.25H9.25v29.5h29.5v-6.4h4v6.4q0 1.6-1.175 2.775Q40.4 42.7 38.75 42.7Zm17.7-9.35q-1.65 0-2.7-1.025Q23.2 31.3 23.2 29.7V18.4q0-1.65 1.05-2.675t2.7-1.025H41.1q1.7 0 2.725 1.025Q44.85 16.75 44.85 18.4v11.3q0 1.6-1.025 2.625T41.1 33.35Zm14.9-3V17.7H26.2v12.65Z"/>
                        </svg>
                    </div>
                </button>
                <button class="personal-account-nav__link menu-item bg-white d-flex rounded p-4 mb-2
                    justify-content-between align-items-center">
                    <span class="menu-item__name blue-hover font-size-09 semibold">Календарь</span>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                            <path
                                d="M9 44q-1.2 0-2.1-.9Q6 42.2 6 41V10q0-1.2.9-2.1Q7.8 7 9 7h3.25V4h3.25v3h17V4h3.25v3H39q1.2 0 2.1.9.9.9.9 2.1v31q0 1.2-.9 2.1-.9.9-2.1.9Zm0-3h30V19.5H9V41Zm0-24.5h30V10H9Zm0 0V10v6.5Z"/>
                        </svg>
                    </div>
                </button>
                <button class="personal-account-nav__link menu-item bg-white d-flex rounded p-4 mb-2
                    justify-content-between align-items-center">
                    <span class="menu-item__name blue-hover font-size-09 semibold">Настройка профиля гида</span>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                            <path
                                d="m18.8 44.7-1.05-6.5q-.8-.3-1.725-.825-.925-.525-1.575-1.075l-6.1 2.85-5.3-9.4 5.6-4.05q-.1-.35-.125-.85-.025-.5-.025-.85t.025-.85q.025-.5.125-.85l-5.6-4.1 5.3-9.3 6.15 2.8q.65-.55 1.55-1.05t1.7-.75l1.05-6.65h10.4l1.05 6.6q.8.3 1.725.775.925.475 1.575 1.075l6.1-2.8 5.3 9.3-5.6 4q.05.4.1.9t.05.9q0 .4-.05.875t-.1.875l5.6 4-5.3 9.4-6.15-2.85q-.65.55-1.525 1.1-.875.55-1.725.8l-1.05 6.5Zm5.15-14.2q2.7 0 4.6-1.9 1.9-1.9 1.9-4.6 0-2.7-1.9-4.6-1.9-1.9-4.6-1.9-2.7 0-4.6 1.9-1.9 1.9-1.9 4.6 0 2.7 1.9 4.6 1.9 1.9 4.6 1.9Zm0-3q-1.5 0-2.5-1.025t-1-2.475q0-1.45 1-2.475 1-1.025 2.5-1.025 1.45 0 2.475 1.025Q27.45 22.55 27.45 24q0 1.45-1.025 2.475Q25.4 27.5 23.95 27.5ZM24 24Zm-1.95 16.75h3.9l.7-5.6q1.7-.4 3.225-1.25 1.525-.85 2.725-2.1l5.3 2.3 1.75-3.25-4.65-3.4q.2-.85.325-1.7T35.45 24q0-.9-.1-1.75t-.35-1.7l4.65-3.4-1.75-3.25-5.3 2.3q-1.15-1.35-2.65-2.275-1.5-.925-3.3-1.125l-.7-5.55h-3.9l-.7 5.55q-1.75.3-3.275 1.2-1.525.9-2.725 2.2l-5.25-2.3-1.75 3.25 4.6 3.35q-.2.9-.325 1.75T12.5 24q0 .9.125 1.775.125.875.325 1.725l-4.6 3.35 1.75 3.25 5.25-2.3q1.25 1.25 2.775 2.125T21.35 35.2Z"/>
                        </svg>
                    </div>
                </button>
            </div>
            <div class="dropdown hide-lg col-12 position-relative mx-0 ms-auto px-0 rounded ">
                <button type="button"
                        class="big-button d-flex col-12 ps-2rem shadow-none bg-transparent dropdown-toggle text-start font-size-09 align-items-center active rounded"
                        data-bs-toggle="dropdown">
                    <div class="col-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 48 48" height="20" width="20">
                            <path
                                d="M15.95 35.55h16.1v-3.3h-16.1Zm0-8.5h16.1v-3.3h-16.1Zm-4.7 17.65q-1.6 0-2.775-1.175Q7.3 42.35 7.3 40.75V7.25q0-1.65 1.175-2.825Q9.65 3.25 11.25 3.25h18.1l11.4 11.4v26.1q0 1.6-1.175 2.775Q38.4 44.7 36.75 44.7ZM27.3 16.55v-9.3H11.25v33.5h25.5v-24.2Zm-16.05-9.3v9.3-9.3 33.5-33.5Z"/>
                        </svg>
                    </div>
                    <span class="col menu-item__name font-size-09 ms-4 semibold">Мои документы</span>
                </button>
                <ul class="dropdown-menu row col-12 flex-grow-1 border-0 pb-0 pt-0 rounded font-size-09"
                    style="z-index: 9999;">
                    <button class="dropdown-item menu-item bg-white d-flex rounded px-2rem py-4 align-items-center">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                                <path
                                    d="M17.45 42.5q-3.65 0-6.125-2.5T8.85 33.95V17.1q-1.75-.75-2.875-2.225T4.85 11.5q0-2.5 1.775-4.25T10.85 5.5q2.5 0 4.25 1.75t1.75 4.25q0 1.9-1.125 3.4t-2.875 2.2v16.85q0 1.9 1.3 3.225 1.3 1.325 3.3 1.325 2 0 3.275-1.325T22 33.95v-19.9q0-3.6 2.475-6.075T30.6 5.5q3.6 0 6.075 2.475t2.475 6.075V30.9q1.75.7 2.875 2.2 1.125 1.5 1.125 3.4 0 2.45-1.75 4.225-1.75 1.775-4.25 1.775-2.45 0-4.225-1.775Q31.15 38.95 31.15 36.5q0-1.9 1.125-3.4t2.875-2.2V14.05q0-1.95-1.3-3.25t-3.3-1.3q-1.95 0-3.25 1.3T26 14.05v19.9q0 3.55-2.475 6.05t-6.075 2.5Zm-6.6-28.65q1 0 1.675-.7t.675-1.65q0-1-.675-1.675T10.85 9.15q-.95 0-1.65.675T8.5 11.5q0 .95.7 1.65t1.65.7Zm26.35 25q.95 0 1.625-.7t.675-1.65q0-1-.675-1.675t-1.675-.675q-.9 0-1.625.675T34.8 36.5q0 .95.725 1.65t1.675.7ZM10.85 11.5Zm26.3 25Z"/>
                            </svg>
                        </div>
                        <span class="col menu-item__name blue-hover font-size-09 ms-4 semibold">Мои экскурсии</span>
                    </button>
                    <button class="dropdown-item menu-item bg-white d-flex rounded px-2rem py-4 align-items-center">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                                <path
                                    d="M9.3 42.7V7.25h18.45l.95 4.3h12.05V31.5H26.6l-.95-4.25h-12.4V42.7ZM25 19.4Zm5 8.15h6.75v-12H25.3l-.95-4.3h-11.1V23.3h15.8Z"/>
                            </svg>
                        </div>
                        <span class="col menu-item__name blue-hover font-size-09 ms-4 semibold">Мои объекты</span>
                    </button>
                    <button class="dropdown-item menu-item bg-white d-flex rounded px-2rem py-4 align-items-center">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                                <path
                                    d="M32.6 27.2q1.25 0 2.225-.975.975-.975.975-2.275 0-1.25-.975-2.2-.975-.95-2.225-.95t-2.225.95q-.975.95-.975 2.2 0 1.3.975 2.275.975.975 2.225.975ZM9.25 36.1v2.65-29.5V36.1Zm0 6.6q-1.55 0-2.75-1.175T5.3 38.75V9.25q0-1.6 1.2-2.8 1.2-1.2 2.75-1.2h29.5q1.65 0 2.825 1.2 1.175 1.2 1.175 2.8v6.45h-4V9.25H9.25v29.5h29.5v-6.4h4v6.4q0 1.6-1.175 2.775Q40.4 42.7 38.75 42.7Zm17.7-9.35q-1.65 0-2.7-1.025Q23.2 31.3 23.2 29.7V18.4q0-1.65 1.05-2.675t2.7-1.025H41.1q1.7 0 2.725 1.025Q44.85 16.75 44.85 18.4v11.3q0 1.6-1.025 2.625T41.1 33.35Zm14.9-3V17.7H26.2v12.65Z"/>
                            </svg>
                        </div>
                        <span class="col menu-item__name blue-hover font-size-09 ms-4 semibold">Транзакции</span>
                    </button>
                    <button class="dropdown-item menu-item bg-white d-flex rounded px-2rem py-4 align-items-center">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                                <path
                                    d="M9 44q-1.2 0-2.1-.9Q6 42.2 6 41V10q0-1.2.9-2.1Q7.8 7 9 7h3.25V4h3.25v3h17V4h3.25v3H39q1.2 0 2.1.9.9.9.9 2.1v31q0 1.2-.9 2.1-.9.9-2.1.9Zm0-3h30V19.5H9V41Zm0-24.5h30V10H9Zm0 0V10v6.5Z"/>
                            </svg>
                        </div>
                        <span class="col menu-item__name blue-hover font-size-09 ms-4 semibold">Календарь</span>
                    </button>
                    <button class="dropdown-item menu-item bg-white d-flex rounded px-2rem py-4 align-items-center">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                                <path
                                    d="m18.8 44.7-1.05-6.5q-.8-.3-1.725-.825-.925-.525-1.575-1.075l-6.1 2.85-5.3-9.4 5.6-4.05q-.1-.35-.125-.85-.025-.5-.025-.85t.025-.85q.025-.5.125-.85l-5.6-4.1 5.3-9.3 6.15 2.8q.65-.55 1.55-1.05t1.7-.75l1.05-6.65h10.4l1.05 6.6q.8.3 1.725.775.925.475 1.575 1.075l6.1-2.8 5.3 9.3-5.6 4q.05.4.1.9t.05.9q0 .4-.05.875t-.1.875l5.6 4-5.3 9.4-6.15-2.85q-.65.55-1.525 1.1-.875.55-1.725.8l-1.05 6.5Zm5.15-14.2q2.7 0 4.6-1.9 1.9-1.9 1.9-4.6 0-2.7-1.9-4.6-1.9-1.9-4.6-1.9-2.7 0-4.6 1.9-1.9 1.9-1.9 4.6 0 2.7 1.9 4.6 1.9 1.9 4.6 1.9Zm0-3q-1.5 0-2.5-1.025t-1-2.475q0-1.45 1-2.475 1-1.025 2.5-1.025 1.45 0 2.475 1.025Q27.45 22.55 27.45 24q0 1.45-1.025 2.475Q25.4 27.5 23.95 27.5ZM24 24Zm-1.95 16.75h3.9l.7-5.6q1.7-.4 3.225-1.25 1.525-.85 2.725-2.1l5.3 2.3 1.75-3.25-4.65-3.4q.2-.85.325-1.7T35.45 24q0-.9-.1-1.75t-.35-1.7l4.65-3.4-1.75-3.25-5.3 2.3q-1.15-1.35-2.65-2.275-1.5-.925-3.3-1.125l-.7-5.55h-3.9l-.7 5.55q-1.75.3-3.275 1.2-1.525.9-2.725 2.2l-5.25-2.3-1.75 3.25 4.6 3.35q-.2.9-.325 1.75T12.5 24q0 .9.125 1.775.125.875.325 1.725l-4.6 3.35 1.75 3.25 5.25-2.3q1.25 1.25 2.775 2.125T21.35 35.2Z"/>
                            </svg>
                        </div>
                        <span class="col menu-item__name blue-hover font-size-09 ms-4 semibold">Настройка профиля
                            гида</span>
                    </button>
                    <button class="dropdown-item menu-item bg-white d-flex rounded px-2rem py-4 align-items-center">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 48 48" height="20" width="20">
                                <path
                                    d="M15.95 35.55h16.1v-3.3h-16.1Zm0-8.5h16.1v-3.3h-16.1Zm-4.7 17.65q-1.6 0-2.775-1.175Q7.3 42.35 7.3 40.75V7.25q0-1.65 1.175-2.825Q9.65 3.25 11.25 3.25h18.1l11.4 11.4v26.1q0 1.6-1.175 2.775Q38.4 44.7 36.75 44.7ZM27.3 16.55v-9.3H11.25v33.5h25.5v-24.2Zm-16.05-9.3v9.3-9.3 33.5-33.5Z"/>
                            </svg>
                        </div>
                        <span class="col menu-item__name blue-hover font-size-09 ms-4 semibold">Мои документы</span>
                    </button>
                </ul>
                <svg class="h-100 expand-icon position-absolute" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                     height="20" width="20">
                    <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                </svg>
            </div>

            <!--МОИ ЭКСКУРСИИ-->
            <div v-if="activeTitle = 'Мои экскурсии'" id="my-excurions" class="my-excursions col visible">
                <!--ВСЕ ЭКСКУРСИИ-->
                <h2 class="lh-1 mb-5 bold mt-5 mt-lg-0">Мои экскурсии</h2>
                <div class="row mx-0 mb-5">
                    <div
                        class="order-2 order-lg-1 row flex-nowrap col-12 col-lg-auto overflow-x-auto px-0 mx-0 mt-5 mt-lg-0">
                        <button class="personal-account-nav__link_active
                                col-auto button d-flex
                                rounded px-4 justify-content-center align-items-center active semibold">
                            Действующие
                        </button>
                        <button
                            class="col-auto button bg-white d-flex rounded ms-2 px-4 justify-content-center align-items-center semibold">
                            Архив
                        </button>
                        <button
                            class="col-auto button bg-white d-flex rounded ms-2 px-4 justify-content-center align-items-center semibold">
                            На модерации
                        </button>
                        <button
                            class="col-auto button bg-white d-flex rounded ms-2 px-4 justify-content-center align-items-center semibold">
                            Черновики
                        </button>
                    </div>
                    <button @click="changeActiveTitle('Добавить')"
                        class="order-1 order-lg-2 button col-12 col-lg-3 bg-green d-flex rounded ms-auto px-4 justify-content-center align-items-center bold">
                        Добавить экскурсию
                    </button>
                </div>

                <!--ДЕЙСТВУЮЩИЕ-->
                <div id="active-excursions" class="active-excursions visible">
                    <div class="excursion row bg-white rounded mx-0 mb-4 overflow-hidden">
                        <div class="col px-0">
                            <div class="px-4 py-4 align-items-center row mx-0">
                                <h2 class="excursion__name mb-2 bold order-2 order-xxl-1 col-12 mt-4 mt-xxl-0">Медовые
                                    водопады</h2>
                                <p class="short-descrtiption opacity-80 mb-3 lh-lg order-3 order-xxl-2 col-12">Lorem
                                    ipsum dolor sit
                                    amet
                                    consectetur
                                    adipisicing elit. Iusto, eius omnis distinctio, est quisquam architecto ducimus quod
                                    labore veniam ullam sint cum eum incidunt libero sapiente, dolor ea! Similique,
                                    voluptatibus!</p>
                                <div class="col-12 col-xxl-auto order-1 order-xxl-3 row align-items-center mx-0">
                                    <span class="excursion__type col-auto font-size-07 bg-blue rounded-1 px-1">групповая
                                        экскурсия</span>
                                    <div
                                        class="dropdown col-auto hide-xxl position-relative mx-0 ms-auto px-0 bg-white rounded">
                                        <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <div
                                                class="col-auto menu-dots rounded d-flex px-0 gap-1 align-items-center justify-content-center">
                                                <div class="menu-dot bg-blue rounded"></div>
                                                <div class="menu-dot bg-blue rounded"></div>
                                                <div class="menu-dot bg-blue rounded"></div>
                                            </div>
                                        </button>
                                        <ul
                                            class="dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3 pt-0 text-center rounded font-size-09">
                                            <li>
                                                <button class="dropdown-item mt-3 p-0"><span
                                                    class="px-0 font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">в&nbsp;архив</span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-auto order-last row me-auto">
                                    <div class="col-auto">
                                        <span class="excursion_number letter-spacing-3 text-uppercase bold">2500</span>
                                        <span class="font-size-05 text-uppercase">руб.</span>
                                    </div>
                                    <div class="col-auto">
                                        <span class="excursion_number letter-spacing-3 text-uppercase bold">2</span>
                                        <span class="font-size-05 text-uppercase">дня</span>
                                    </div>
                                </div>
                                <div class="col-auto order-last row align-items-center mt-3 mt-sm-0">
                                    <div class="col-auto">
                                        <span class="excursion__rating font-size-07 opacity-40 me-1">рейтинг
                                            экскурсии</span>
                                        <span class="excursion_number letter-spacing-3 text-uppercase bold">4.20</span>
                                    </div>
                                    <div class="col-auto align-items-center">
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                            <div class="splitted">
                                <div class="row align-items-center p-4 mx-0">
                                    <button
                                        class="col-auto hide visible-xl excursion__menu blue-hover font-size-07 letter-spacing-3 text-uppercase bold">
                                        страница
                                        экскурсии <span class="blue fs-6">&gt;</span>
                                    </button>
                                    <button
                                        class="col-auto excursion__menu blue-hover font-size-07 letter-spacing-3 text-uppercase bold">
                                        редактировать<span
                                        class="blue fs-6">&gt;</span>
                                    </button>
                                    <button
                                        class="hide visible-xxl col-auto ms-3 px-0 excursion__menu font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">
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
                        </div>
                        <div class="excursion__image col-12 col-xl-4 px-0">
                            <img class="cover w-100 h-100" src="/img/travels/2.jpg" alt=""/>
                        </div>
                    </div>
                    <div class="excursion row bg-white rounded mx-0 mb-4 overflow-hidden">
                        <div class="col px-0">
                            <div class="px-4 py-4 align-items-center row mx-0">
                                <h2 class="excursion__name mb-2 bold order-2 order-xxl-1 col-12 mt-4 mt-xxl-0">Чарующий
                                    Пятигорск - город горячих вод</h2>
                                <p class="short-descrtiption opacity-80 mb-3 lh-lg order-3 order-xxl-2 col-12">Lorem
                                    ipsum dolor sit
                                    amet
                                    consectetur
                                    adipisicing elit. Iusto, eius omnis distinctio, est quisquam architecto ducimus quod
                                    labore veniam ullam sint cum eum incidunt libero sapiente, dolor ea! Similique,
                                    voluptatibus!</p>
                                <div class="col-12 col-xxl-auto order-1 order-xxl-3 row align-items-center mx-0">
                                    <span class="excursion__type col-auto font-size-07 bg-blue rounded-1 px-1">групповая
                                        экскурсия</span>
                                    <div
                                        class="dropdown col-auto hide-xxl position-relative mx-0 ms-auto px-0 bg-white rounded">
                                        <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <div
                                                class="col-auto menu-dots rounded d-flex px-0 gap-1 align-items-center justify-content-center">
                                                <div class="menu-dot bg-blue rounded"></div>
                                                <div class="menu-dot bg-blue rounded"></div>
                                                <div class="menu-dot bg-blue rounded"></div>
                                            </div>
                                        </button>
                                        <ul
                                            class="dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3 pt-0 text-center rounded font-size-09">
                                            <li>
                                                <button class="dropdown-item mt-3 p-0"><span
                                                    class="px-0 font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">в&nbsp;архив</span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-auto order-last row me-auto">
                                    <div class="col-auto">
                                        <span class="excursion_number letter-spacing-3 text-uppercase bold">700</span>
                                        <span class="font-size-05 text-uppercase">руб.</span>
                                    </div>
                                    <div class="col-auto">
                                        <span class="excursion_number letter-spacing-3 text-uppercase bold">1</span>
                                        <span class="font-size-05 text-uppercase">час</span>
                                    </div>
                                </div>
                                <div class="col-auto order-last row align-items-center mt-3 mt-sm-0">
                                    <div class="col-auto">
                                        <span class="excursion__rating font-size-07 opacity-40 me-1">рейтинг
                                            экскурсии</span>
                                        <span class="excursion_number letter-spacing-3 text-uppercase bold">4.20</span>
                                    </div>
                                    <div class="col-auto align-items-center">
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                            <div class="splitted">
                                <div class="row align-items-center p-4 mx-0">
                                    <button
                                        class="col-auto hide visible-xl excursion__menu blue-hover font-size-07 letter-spacing-3 text-uppercase bold">
                                        страница
                                        экскурсии <span class="blue fs-6">&gt;</span>
                                    </button>
                                    <button
                                        class="col-auto excursion__menu blue-hover font-size-07 letter-spacing-3 text-uppercase bold">
                                        редактировать<span
                                        class="blue fs-6">&gt;</span>
                                    </button>
                                    <button
                                        class="hide visible-xxl col-auto ms-3 px-0 excursion__menu font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">
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
                        </div>
                        <div class="excursion__image col-12 col-xl-4 px-0">
                            <img class="cover w-100 h-100" src="/img/travels/4.jpg" alt=""/>
                        </div>
                    </div>
                </div>

                <!--АРХИВ-->
                <div id="archive-excursions" class="archive-excursions visible">
                    <div class="excursion row bg-white rounded mx-0 mb-4 overflow-hidden">
                        <div class="col px-0">
                            <div class="px-4 py-4 align-items-center row mx-0">
                                <h2 class="excursion__name mb-2 bold order-2 order-xxl-1 col-12 mt-4 mt-xxl-0">Чарующий
                                    Пятигорск - город горячих вод</h2>
                                <p class="short-descrtiption opacity-80 mb-3 lh-lg order-3 order-xxl-2 col-12">Lorem
                                    ipsum dolor sit
                                    amet
                                    consectetur
                                    adipisicing elit. Iusto, eius omnis distinctio, est quisquam architecto ducimus quod
                                    labore veniam ullam sint cum eum incidunt libero sapiente, dolor ea! Similique,
                                    voluptatibus!</p>
                                <div class="col-12 col-xxl-auto order-1 order-xxl-3 row align-items-center mx-0">
                                    <span class="excursion__type col-auto font-size-07 bg-blue rounded-1 px-1">групповая
                                        экскурсия</span>
                                </div>
                                <div class="col-auto order-last row align-items-center ms-xxl-auto mt-3 mt-sm-0">
                                    <div class="col-auto">
                                        <span class="excursion__rating font-size-07 opacity-40 me-1">рейтинг
                                            экскурсии</span>
                                        <span class="excursion_number letter-spacing-3 text-uppercase bold">4.20</span>
                                    </div>
                                    <div class="col-auto align-items-center">
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                            <div class="splitted">
                                <div class="row align-items-center p-4 mx-0">
                                    <button
                                        class="col-auto mx-auto px-0 excursion__menu font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">
                                        убрать
                                        из архива
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="excursion__image col-12 col-xl-4 px-0">
                            <img class="cover w-100 h-100 archived" src="/img/travels/4.jpg" alt=""/>
                        </div>
                    </div>
                    <div class="excursion row bg-white rounded mx-0 mb-4 overflow-hidden">
                        <div class="col px-0">
                            <div class="px-4 py-4 align-items-center row mx-0">
                                <h2 class="excursion__name mb-2 bold order-2 order-xxl-1 col-12 mt-4 mt-xxl-0">Чарующий
                                    Пятигорск - город горячих вод</h2>
                                <p class="short-descrtiption opacity-80 mb-3 lh-lg order-3 order-xxl-2 col-12">Lorem
                                    ipsum dolor sit
                                    amet
                                    consectetur
                                    adipisicing elit. Iusto, eius omnis distinctio, est quisquam architecto ducimus quod
                                    labore veniam ullam sint cum eum incidunt libero sapiente, dolor ea! Similique,
                                    voluptatibus!</p>
                                <div class="col-12 col-xxl-auto order-1 order-xxl-3 row align-items-center mx-0">
                                    <span class="excursion__type col-auto font-size-07 bg-blue rounded-1 px-1">групповая
                                        экскурсия</span>
                                </div>
                                <div class="col-auto order-last row align-items-center ms-xxl-auto mt-3 mt-sm-0">
                                    <div class="col-auto">
                                        <span class="excursion__rating font-size-07 opacity-40 me-1">рейтинг
                                            экскурсии</span>
                                        <span class="excursion_number letter-spacing-3 text-uppercase bold">4.20</span>
                                    </div>
                                    <div class="col-auto align-items-center">
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                            <div class="splitted">
                                <div class="row align-items-center p-4 mx-0">
                                    <button
                                        class="col-auto mx-auto px-0 excursion__menu font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">
                                        убрать
                                        из архива
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="excursion__image col-12 col-xl-4 px-0">
                            <img class="cover w-100 h-100 archived" src="/img/travels/4.jpg" alt=""/>
                        </div>
                    </div>
                </div>

                <!--НА МОДЕРАЦИИ-->
                <div id="moderation-excursions" class="moderation-excursions visible">
                    <div class="excursion row bg-white rounded mx-0 mb-4 overflow-hidden">
                        <div class="col px-0">
                            <div class="px-4 py-4 align-items-center row mx-0">
                                <h2 class="excursion__name mb-2 bold order-2 order-xxl-1 col-12 mt-4 mt-xxl-0">Медовые
                                    водопады</h2>
                                <p class="short-descrtiption opacity-80 mb-3 lh-lg order-3 order-xxl-2 col-12">Lorem
                                    ipsum dolor sit
                                    amet
                                    consectetur
                                    adipisicing elit. Iusto, eius omnis distinctio, est quisquam architecto ducimus quod
                                    labore veniam ullam sint cum eum incidunt libero sapiente, dolor ea! Similique,
                                    voluptatibus!</p>
                                <div class="col-12 col-xxl-auto order-1 order-xxl-3 row align-items-center mx-0">
                                    <span class="excursion__type col-auto font-size-07 bg-blue rounded-1 px-1">групповая
                                        экскурсия</span>
                                    <div
                                        class="dropdown col-auto hide-xxl position-relative mx-0 ms-auto px-0 bg-white rounded">
                                        <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <div
                                                class="col-auto menu-dots rounded d-flex px-0 gap-1 align-items-center justify-content-center">
                                                <div class="menu-dot bg-blue rounded"></div>
                                                <div class="menu-dot bg-blue rounded"></div>
                                                <div class="menu-dot bg-blue rounded"></div>
                                            </div>
                                        </button>
                                        <ul
                                            class="dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3 pt-0 text-center rounded font-size-09">
                                            <li>
                                                <button class="dropdown-item mt-3 p-0"><span
                                                    class="px-0 font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">удалить</span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-auto order-last row me-auto">
                                    <div class="col-auto">
                                        <span class="excursion_number letter-spacing-3 text-uppercase bold">2500</span>
                                        <span class="font-size-05 text-uppercase">руб.</span>
                                    </div>
                                    <div class="col-auto">
                                        <span class="excursion_number letter-spacing-3 text-uppercase bold">2</span>
                                        <span class="font-size-05 text-uppercase">дня</span>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-auto order-last mt-3 mt-sm-0 ms-sm-auto">
                                    <span class="excursion__status green font-size-08">на проверке</span>
                                </div>
                            </div>
                            <div class="splitted">
                                <div
                                    class="row align-items-center justify-content-center justify-content-xxl-start p-4 mx-0">
                                    <button
                                        class="col-auto hide visible-xxl excursion__menu blue-hover font-size-07 letter-spacing-3 text-uppercase bold">
                                        страница
                                        экскурсии <span class="blue fs-6">&gt;</span>
                                    </button>
                                    <button
                                        class="col-auto excursion__menu blue-hover font-size-07 letter-spacing-3 text-uppercase bold">
                                        редактировать<span
                                        class="blue fs-6">&gt;</span>
                                    </button>
                                    <button class="hide visible-xxl col-auto ms-auto excursion__menu"><span
                                        class=" font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">Удалить</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="excursion__image col-12 col-xl-4 px-0">
                            <img class="cover w-100 h-100" src="/img/travels/2.jpg" alt=""/>
                        </div>
                    </div>
                    <div class="excursion row bg-white rounded mx-0 mb-4 overflow-hidden">
                        <div class="col px-0">
                            <div class="px-4 py-4 align-items-center row mx-0">
                                <h2 class="excursion__name mb-2 bold order-2 order-xxl-1 col-12 mt-4 mt-xxl-0">Медовые
                                    водопады</h2>
                                <p class="short-descrtiption opacity-80 mb-3 lh-lg order-3 order-xxl-2 col-12">Lorem
                                    ipsum dolor sit
                                    amet
                                    consectetur
                                    adipisicing elit. Iusto, eius omnis distinctio, est quisquam architecto ducimus quod
                                    labore veniam ullam sint cum eum incidunt libero sapiente, dolor ea! Similique,
                                    voluptatibus!</p>
                                <div class="col-12 col-xxl-auto order-1 order-xxl-3 row align-items-center mx-0">
                                    <span class="excursion__type col-auto font-size-07 bg-blue rounded-1 px-1">групповая
                                        экскурсия</span>
                                    <div
                                        class="dropdown col-auto hide-xxl position-relative mx-0 ms-auto px-0 bg-white rounded">
                                        <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <div
                                                class="col-auto menu-dots rounded d-flex px-0 gap-1 align-items-center justify-content-center">
                                                <div class="menu-dot bg-blue rounded"></div>
                                                <div class="menu-dot bg-blue rounded"></div>
                                                <div class="menu-dot bg-blue rounded"></div>
                                            </div>
                                        </button>
                                        <ul
                                            class="dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3 pt-0 text-center rounded font-size-09">
                                            <li>
                                                <button class="dropdown-item mt-3 p-0"><span
                                                    class="px-0 font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">удалить</span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-auto order-last row me-auto">
                                    <div class="col-auto">
                                        <span class="excursion_number letter-spacing-3 text-uppercase bold">2500</span>
                                        <span class="font-size-05 text-uppercase">руб.</span>
                                    </div>
                                    <div class="col-auto">
                                        <span class="excursion_number letter-spacing-3 text-uppercase bold">2</span>
                                        <span class="font-size-05 text-uppercase">дня</span>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-auto order-last mt-3 mt-sm-0 ms-sm-auto">
                                    <span class="excursion__status green font-size-08">на проверке</span>
                                </div>
                            </div>
                            <div class="splitted">
                                <div
                                    class="row align-items-center justify-content-center justify-content-xxl-start p-4 mx-0">
                                    <button
                                        class="col-auto hide visible-xxl excursion__menu blue-hover font-size-07 letter-spacing-3 text-uppercase bold">
                                        страница
                                        экскурсии <span class="blue fs-6">&gt;</span>
                                    </button>
                                    <button
                                        class="col-auto excursion__menu blue-hover font-size-07 letter-spacing-3 text-uppercase bold">
                                        редактировать<span
                                        class="blue fs-6">&gt;</span>
                                    </button>
                                    <button class="hide visible-xxl col-auto ms-auto excursion__menu"><span
                                        class=" font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">Удалить</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="excursion__image col-12 col-xl-4 px-0">
                            <img class="cover w-100 h-100" src="/img/travels/2.jpg" alt=""/>
                        </div>
                    </div>
                </div>

                <!--ЧЕРНОВИКИ-->
                <div id="draft-excursions" class="draft-excursions visible">
                    <div class="excursion row bg-white rounded mx-0 mb-4 overflow-hidden">
                        <div class="col px-0">
                            <div class="px-4 py-4 align-items-center row mx-0">
                                <h2 class="excursion__name mb-2 bold order-2 order-xxl-1 col-12 mt-4 mt-xxl-0">Медовые
                                    водопады</h2>
                                <p class="short-descrtiption opacity-80 mb-3 lh-lg order-3 order-xxl-2 col-12">Lorem
                                    ipsum dolor sit
                                    amet
                                    consectetur
                                    adipisicing elit. Iusto, eius omnis distinctio, est quisquam architecto ducimus quod
                                    labore veniam ullam sint cum eum incidunt libero sapiente, dolor ea! Similique,
                                    voluptatibus!</p>
                                <div class="col-12 col-xxl-auto order-1 order-xxl-3 row align-items-center mx-0">
                                    <span class="excursion__type col-auto font-size-07 bg-blue rounded-1 px-1">групповая
                                        экскурсия</span>
                                    <div
                                        class="dropdown col-auto hide-xxl position-relative mx-0 ms-auto px-0 bg-white rounded">
                                        <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <div
                                                class="col-auto menu-dots rounded d-flex px-0 gap-1 align-items-center justify-content-center">
                                                <div class="menu-dot bg-blue rounded"></div>
                                                <div class="menu-dot bg-blue rounded"></div>
                                                <div class="menu-dot bg-blue rounded"></div>
                                            </div>
                                        </button>
                                        <ul
                                            class="dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3 pt-0 text-center rounded font-size-09">
                                            <li>
                                                <button class="dropdown-item mt-3 p-0"><span
                                                    class="px-0 font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">удалить</span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-auto order-last row me-auto">
                                    <div class="col-auto">
                                        <span class="excursion_number letter-spacing-3 text-uppercase bold">2500</span>
                                        <span class="font-size-05 text-uppercase">руб.</span>
                                    </div>
                                    <div class="col-auto">
                                        <span class="excursion_number letter-spacing-3 text-uppercase bold">2</span>
                                        <span class="font-size-05 text-uppercase">дня</span>
                                    </div>
                                </div>
                            </div>
                            <div class="splitted">
                                <div
                                    class="row align-items-center justify-content-center justify-content-xxl-start p-4 mx-0">
                                    <button
                                        class="col-auto excursion__menu blue-hover font-size-07 letter-spacing-3 text-uppercase bold">
                                        редактировать<span
                                        class="blue fs-6">&gt;</span>
                                    </button>
                                    <button class="hide visible-xxl col-auto ms-auto excursion__menu"><span
                                        class=" font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">Удалить</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="excursion__image col-12 col-xl-4 px-0">
                            <img class="cover w-100 h-100" src="/img/travels/2.jpg" alt=""/>
                        </div>
                    </div>
                    <div class="excursion row bg-white rounded mx-0 mb-4 overflow-hidden">
                        <div class="col px-0">
                            <div class="px-4 py-4 align-items-center row mx-0">
                                <h2 class="excursion__name mb-2 bold order-2 order-xxl-1 col-12 mt-4 mt-xxl-0">Медовые
                                    водопады</h2>
                                <p class="short-descrtiption opacity-80 mb-3 lh-lg order-3 order-xxl-2 col-12">Lorem
                                    ipsum dolor sit
                                    amet
                                    consectetur
                                    adipisicing elit. Iusto, eius omnis distinctio, est quisquam architecto ducimus quod
                                    labore veniam ullam sint cum eum incidunt libero sapiente, dolor ea! Similique,
                                    voluptatibus!</p>
                                <div class="col-12 col-xxl-auto order-1 order-xxl-3 row align-items-center mx-0">
                                    <span class="excursion__type col-auto font-size-07 bg-blue rounded-1 px-1">групповая
                                        экскурсия</span>
                                    <div
                                        class="dropdown col-auto hide-xxl position-relative mx-0 ms-auto px-0 bg-white rounded">
                                        <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <div
                                                class="col-auto menu-dots rounded d-flex px-0 gap-1 align-items-center justify-content-center">
                                                <div class="menu-dot bg-blue rounded"></div>
                                                <div class="menu-dot bg-blue rounded"></div>
                                                <div class="menu-dot bg-blue rounded"></div>
                                            </div>
                                        </button>
                                        <ul
                                            class="dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3 pt-0 text-center rounded font-size-09">
                                            <li>
                                                <button class="dropdown-item mt-3 p-0"><span
                                                    class="px-0 font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">удалить</span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-auto order-last row me-auto">
                                    <div class="col-auto">
                                        <span class="excursion_number letter-spacing-3 text-uppercase bold">2500</span>
                                        <span class="font-size-05 text-uppercase">руб.</span>
                                    </div>
                                    <div class="col-auto">
                                        <span class="excursion_number letter-spacing-3 text-uppercase bold">2</span>
                                        <span class="font-size-05 text-uppercase">дня</span>
                                    </div>
                                </div>
                            </div>
                            <div class="splitted">
                                <div
                                    class="row align-items-center justify-content-center justify-content-xxl-start p-4 mx-0">
                                    <button
                                        class="col-auto excursion__menu blue-hover font-size-07 letter-spacing-3 text-uppercase bold">
                                        редактировать<span
                                        class="blue fs-6">&gt;</span>
                                    </button>
                                    <button class="hide visible-xxl col-auto ms-auto excursion__menu"><span
                                        class=" font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">Удалить</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="excursion__image col-12 col-xl-4 px-0">
                            <img class="cover w-100 h-100" src="/img/travels/2.jpg" alt=""/>
                        </div>
                    </div>
                </div>
            </div>

            <!--ЭКСКУРСИЯ-->
            <div id="current-excurion" class="current-excursion col ">
                <div class="row mx-0 align-items-center mb-5 mt-5 mt-lg-0">
                    <button class="button col-auto px-2rem active rounded shadow-none bold"><span
                        class="fs-6 me-1">&lt;</span>Назад к экскурсиям
                    </button>
                    <div class="col-auto row mx-0 px-0 hide visible-xl ms-auto">
                        <button
                            class="col-auto excursion__menu font-size-07 blue-hover letter-spacing-3 text-uppercase bold ms-auto">
                            страница
                            экскурсии <span class="blue fs-6">&gt;</span>
                        </button>
                        <button
                            class="col-auto excursion__menu font-size-07 blue-hover letter-spacing-3 text-uppercase bold ms-2">
                            редактировать<span
                            class="blue fs-6">&gt;</span>
                        </button>
                        <button
                            class="col-auto ms-3 ms-xl-5 px-0 excursion__menu font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">
                            в&nbsp;архив
                        </button>
                    </div>
                    <div class="dropdown col-auto hide-xl position-relative mx-0 ms-auto px-0 bg-white rounded">
                        <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <div
                                class="col-auto menu-dots rounded d-flex px-0 gap-1 align-items-center justify-content-center">
                                <div class="menu-dot bg-blue rounded"></div>
                                <div class="menu-dot bg-blue rounded"></div>
                                <div class="menu-dot bg-blue rounded"></div>
                            </div>
                        </button>
                        <ul
                            class="dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3 pt-0 text-center rounded font-size-09">
                            <li>
                                <button
                                    class="dropdonw-item p-0 col-12 mt-3 font-size-07 blue-hover letter-spacing-3 text-uppercase bold">
                                    редактировать<span class="blue fs-6">&gt;</span>
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item mt-3 p-0"><span
                                    class="px-0 font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">удалить</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="excursion row mx-0 mb-5">
                    <div class="col px-0 me-5">
                        <div class="col-auto">
                            <h1 class="excursion__name mb-4 bold">Медовые водопады</h1>
                            <p class="excursion__description opacity-80 mb-4 lh-lg">Lorem ipsum dolor sit amet
                                consectetur
                                adipisicing elit. Iusto, eius omnis distinctio, est quisquam architecto ducimus quod
                                labore veniam ullam sint cum eum incidunt libero sapiente, dolor ea! Similique,
                                voluptatibus! lorem</p>
                            <div class="excursion__info row align-items-center">
                                <div class="col-auto me-auto">
                                    <span class="excursion__type font-size-07 bg-blue rounded-1 px-1">групповая
                                        экскурсия</span>
                                </div>
                                <div class="col-auto me-auto">
                                    <span class="excursion_number letter-spacing-3 text-uppercase bold">2500</span>
                                    <span class="font-size-05 text-uppercase">руб.</span>
                                </div>
                                <div class="col-auto me-auto">
                                    <span class="excursion_number letter-spacing-3 text-uppercase bold">2</span>
                                    <span class="font-size-05 text-uppercase">дня</span>
                                </div>
                                <div class="col-12 col-lg-auto row mt-3 mt-xxl-0 align-items-center">
                                    <div class="col-auto">
                                        <span class="excursion__rating font-size-07 opacity-40 me-1">рейтинг
                                            экскурсии</span>
                                        <span class="excursion_number letter-spacing-3 text-uppercase bold">4.20</span>
                                    </div>
                                    <div class="col-auto me-auto align-items-center">
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                        </div>
                    </div>
                    <div class="current-excursion__image col-12 col-lg-4 px-0 mt-4 mt-lg-0">
                        <img class="rounded cover w-100 h-100 rounded-end" src="/img/travels/2.jpg" alt=""/>
                    </div>
                </div>
                <div class="accordion row mx-0 mb-6 gap-2">
                    <div class="accordion__item visible bg-white rounded bg-white rounded">
                        <div class="accordion__head p-4 row align-items-center justify-content-between">
                            <div class="col-1 pb-4 pb-xl-0">
                                <div class="big-icon bg-light rounded d-flex justify-content-center align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                                        <path
                                            d="M9 44q-1.2 0-2.1-.9Q6 42.2 6 41V10q0-1.2.9-2.1Q7.8 7 9 7h3.25V4h3.25v3h17V4h3.25v3H39q1.2 0 2.1.9.9.9.9 2.1v31q0 1.2-.9 2.1-.9.9-2.1.9Zm0-3h30V19.5H9V41Zm0-24.5h30V10H9Zm0 0V10v6.5Z"/>
                                    </svg>
                                </div>
                            </div>
                            <span class="col-5 px-0 py-2 py-xl-0">14 августа в 10:00 (сегодня)</span>
                            <div
                                class="row mx-0 col-12 col-xl-5 accordion__head-splitted splitted splitted-xl-none px-0 pt-4 pt-xl-0 order-last order-xl-3 justify-content-between">
                                <span class="col-auto col-xl-5 order-2 order-xl-1 opacity-80 red-dot">23
                                    участников</span>
                                <button
                                    class="col-auto col-xl-7 order-1 order-xl-2 excursion__menu blue-hover font-size-07 letter-spacing-3 text-uppercase bold">
                                    выгрузить
                                    <span
                                        class="blue-hover font-size-07 letter-spacing-3 text-uppercase bold hide visible-xxl">в
                                        excel</span>
                                    <span class="blue fs-6">&gt;</span>
                                </button>
                            </div>
                            <div
                                class="expand-img col-auto py-2 py-xl-0 order-2 order-xl-last d-flex justify-content-end">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                                    <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="accordion__content">
                            <div
                                class="accordion__content-item row splitted px-4 py-3 align-items-center justify-content-between">
                                <div class="col-auto col-xl-1 order-first">
                                    <div class="big-icon rounded d-flex align-items-center justify-content-center">
                                        <img class="rounded big-icon" src="/img/avatars/1.jpg" alt="">
                                    </div>
                                </div>
                                <span class="col-5 col-xl-3 order-2 semibold ps-0">Петренко Николаев Алексей</span>
                                <div class="col-6 col-xl-4 order-4 order-xl-3 row mx-0 px-0 mt-3 mt-xl-0">
                                    <span class="col-12 col-xl-6 blue semibold">+7 (495) 852-56-56</span>
                                    <span class="col-12 col-xl-6 thin opacity-80">pochta3431@gmail.com</span>
                                </div>
                                <div
                                    class="col-auto col-xl-1 order-3 order-xl-4 d-flex justify-content-end ms-auto position-relative opacity-15">
                                    <svg class="black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                         height="20" width="20">
                                        <path
                                            d="M14.95 22.1q.95 0 1.6-.65.65-.65.65-1.6 0-.95-.65-1.6-.65-.65-1.6-.65-.95 0-1.6.65-.65.65-.65 1.6 0 .95.65 1.6.65.65 1.6.65Zm9.2 0q.95 0 1.6-.65.65-.65.65-1.6 0-.95-.65-1.6-.65-.65-1.6-.65-.95 0-1.6.65-.65.65-.65 1.6 0 .95.65 1.6.65.65 1.6.65Zm8.85 0q.95 0 1.6-.65.65-.65.65-1.6 0-.95-.65-1.6-.65-.65-1.6-.65-.95 0-1.6.65-.65.65-.65 1.6 0 .95.65 1.6.65.65 1.6.65ZM3.3 44.7V7.25q0-1.6 1.175-2.8 1.175-1.2 2.775-1.2h33.5q1.6 0 2.8 1.2 1.2 1.2 1.2 2.8v25.5q0 1.55-1.2 2.75t-2.8 1.2H11.3Zm3.95-8.95 3-3h30.5V7.25H7.25Zm0-28.5v28.5Z"/>
                                    </svg>
                                </div>
                                <div
                                    class="col-auto col-xl-1 order-last d-flex justify-content-end ms-auto ms-xl-2 mt-3 mt-xl-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                                        <path
                                            d="M11.2 45.3q-2.6 0-4.425-1.8-1.825-1.8-1.825-4.45V32.1h6.7V3.5l3.15 3.15 3.15-3.15 3.1 3.15L24.2 3.5l3.1 3.15 3.15-3.15 3.1 3.15L36.7 3.5l3.15 3.15 3.2-3.15v35.55q0 2.65-1.825 4.45-1.825 1.8-4.425 1.8Zm25.6-4q1 0 1.625-.625t.625-1.625V9.6H15.6v22.5h18.95v6.95q0 1 .625 1.625t1.625.625ZM18.25 17.65v-3h11.5v3Zm0 6.7v-3h11.5v3Zm16.15-6.7q-.6 0-1.05-.45-.45-.45-.45-1.05 0-.6.45-1.05.45-.45 1.05-.45.6 0 1.05.45.45.45.45 1.05 0 .6-.45 1.05-.45.45-1.05.45Zm0 6.45q-.6 0-1.05-.45-.45-.45-.45-1.05 0-.6.45-1.05.45-.45 1.05-.45.6 0 1.05.45.45.45.45 1.05 0 .6-.45 1.05-.45.45-1.05.45ZM11.15 41.3H30.6v-5.2H8.95v2.95q0 1 .65 1.625t1.55.625Zm-2.2 0v-5.2 5.2Z"/>
                                    </svg>
                                </div>
                            </div>
                            <div
                                class="accordion__content-item row splitted px-4 py-3 align-items-center justify-content-between">
                                <div class="col-auto col-xl-1 order-first">
                                    <div class="big-icon rounded d-flex align-items-center justify-content-center">
                                        <img class="rounded big-icon" src="/img/avatars/1.jpg" alt="">
                                    </div>
                                </div>
                                <span class="col-5 col-xl-3 order-2 semibold ps-0">Петренко Николаев Алексей</span>
                                <div class="col-6 col-xl-4 order-4 order-xl-3 row mx-0 px-0 mt-3 mt-xl-0">
                                    <span class="col-12 col-xl-6 blue semibold">+7 (495) 852-56-56</span>
                                    <span class="col-12 col-xl-6 thin opacity-80">pochta3431@gmail.com</span>
                                </div>
                                <div
                                    class="col-auto col-xl-1 order-3 order-xl-4 d-flex justify-content-end ms-auto position-relative opacity-15">
                                    <svg class="black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                         height="20" width="20">
                                        <path
                                            d="M14.95 22.1q.95 0 1.6-.65.65-.65.65-1.6 0-.95-.65-1.6-.65-.65-1.6-.65-.95 0-1.6.65-.65.65-.65 1.6 0 .95.65 1.6.65.65 1.6.65Zm9.2 0q.95 0 1.6-.65.65-.65.65-1.6 0-.95-.65-1.6-.65-.65-1.6-.65-.95 0-1.6.65-.65.65-.65 1.6 0 .95.65 1.6.65.65 1.6.65Zm8.85 0q.95 0 1.6-.65.65-.65.65-1.6 0-.95-.65-1.6-.65-.65-1.6-.65-.95 0-1.6.65-.65.65-.65 1.6 0 .95.65 1.6.65.65 1.6.65ZM3.3 44.7V7.25q0-1.6 1.175-2.8 1.175-1.2 2.775-1.2h33.5q1.6 0 2.8 1.2 1.2 1.2 1.2 2.8v25.5q0 1.55-1.2 2.75t-2.8 1.2H11.3Zm3.95-8.95 3-3h30.5V7.25H7.25Zm0-28.5v28.5Z"/>
                                    </svg>
                                </div>
                                <div
                                    class="col-auto col-xl-1 order-last d-flex justify-content-end ms-auto ms-xl-2 mt-3 mt-xl-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                                        <path
                                            d="M11.2 45.3q-2.6 0-4.425-1.8-1.825-1.8-1.825-4.45V32.1h6.7V3.5l3.15 3.15 3.15-3.15 3.1 3.15L24.2 3.5l3.1 3.15 3.15-3.15 3.1 3.15L36.7 3.5l3.15 3.15 3.2-3.15v35.55q0 2.65-1.825 4.45-1.825 1.8-4.425 1.8Zm25.6-4q1 0 1.625-.625t.625-1.625V9.6H15.6v22.5h18.95v6.95q0 1 .625 1.625t1.625.625ZM18.25 17.65v-3h11.5v3Zm0 6.7v-3h11.5v3Zm16.15-6.7q-.6 0-1.05-.45-.45-.45-.45-1.05 0-.6.45-1.05.45-.45 1.05-.45.6 0 1.05.45.45.45.45 1.05 0 .6-.45 1.05-.45.45-1.05.45Zm0 6.45q-.6 0-1.05-.45-.45-.45-.45-1.05 0-.6.45-1.05.45-.45 1.05-.45.6 0 1.05.45.45.45.45 1.05 0 .6-.45 1.05-.45.45-1.05.45ZM11.15 41.3H30.6v-5.2H8.95v2.95q0 1 .65 1.625t1.55.625Zm-2.2 0v-5.2 5.2Z"/>
                                    </svg>
                                </div>
                            </div>
                            <div
                                class="accordion__content-item row splitted px-4 py-3 align-items-center justify-content-between">
                                <div class="col-auto col-xl-1 order-first">
                                    <div class="big-icon rounded d-flex align-items-center justify-content-center">
                                        <img class="rounded big-icon" src="/img/avatars/1.jpg" alt="">
                                    </div>
                                </div>
                                <span class="col-5 col-xl-3 order-2 semibold ps-0">Петренко Николаев Алексей</span>
                                <div class="col-6 col-xl-4 order-4 order-xl-3 row mx-0 px-0 mt-3 mt-xl-0">
                                    <span class="col-12 col-xl-6 blue semibold">+7 (495) 852-56-56</span>
                                    <span class="col-12 col-xl-6 thin opacity-80">pochta3431@gmail.com</span>
                                </div>
                                <div
                                    class="col-auto col-xl-1 order-3 order-xl-4 d-flex justify-content-end ms-auto position-relative sms">
                                    <svg class="black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                         height="20" width="20">
                                        <path
                                            d="M14.95 22.1q.95 0 1.6-.65.65-.65.65-1.6 0-.95-.65-1.6-.65-.65-1.6-.65-.95 0-1.6.65-.65.65-.65 1.6 0 .95.65 1.6.65.65 1.6.65Zm9.2 0q.95 0 1.6-.65.65-.65.65-1.6 0-.95-.65-1.6-.65-.65-1.6-.65-.95 0-1.6.65-.65.65-.65 1.6 0 .95.65 1.6.65.65 1.6.65Zm8.85 0q.95 0 1.6-.65.65-.65.65-1.6 0-.95-.65-1.6-.65-.65-1.6-.65-.95 0-1.6.65-.65.65-.65 1.6 0 .95.65 1.6.65.65 1.6.65ZM3.3 44.7V7.25q0-1.6 1.175-2.8 1.175-1.2 2.775-1.2h33.5q1.6 0 2.8 1.2 1.2 1.2 1.2 2.8v25.5q0 1.55-1.2 2.75t-2.8 1.2H11.3Zm3.95-8.95 3-3h30.5V7.25H7.25Zm0-28.5v28.5Z"/>
                                    </svg>
                                </div>
                                <div
                                    class="col-auto col-xl-1 order-last d-flex justify-content-end ms-auto ms-xl-2 mt-3 mt-xl-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                                        <path
                                            d="M11.2 45.3q-2.6 0-4.425-1.8-1.825-1.8-1.825-4.45V32.1h6.7V3.5l3.15 3.15 3.15-3.15 3.1 3.15L24.2 3.5l3.1 3.15 3.15-3.15 3.1 3.15L36.7 3.5l3.15 3.15 3.2-3.15v35.55q0 2.65-1.825 4.45-1.825 1.8-4.425 1.8Zm25.6-4q1 0 1.625-.625t.625-1.625V9.6H15.6v22.5h18.95v6.95q0 1 .625 1.625t1.625.625ZM18.25 17.65v-3h11.5v3Zm0 6.7v-3h11.5v3Zm16.15-6.7q-.6 0-1.05-.45-.45-.45-.45-1.05 0-.6.45-1.05.45-.45 1.05-.45.6 0 1.05.45.45.45.45 1.05 0 .6-.45 1.05-.45.45-1.05.45Zm0 6.45q-.6 0-1.05-.45-.45-.45-.45-1.05 0-.6.45-1.05.45-.45 1.05-.45.6 0 1.05.45.45.45.45 1.05 0 .6-.45 1.05-.45.45-1.05.45ZM11.15 41.3H30.6v-5.2H8.95v2.95q0 1 .65 1.625t1.55.625Zm-2.2 0v-5.2 5.2Z"/>
                                    </svg>
                                </div>
                            </div>
                            <div
                                class="accordion__content-item row splitted px-4 py-3 align-items-center justify-content-between">
                                <div class="col-auto col-xl-1 order-first">
                                    <div class="big-icon rounded d-flex align-items-center justify-content-center">
                                        <img class="rounded big-icon" src="/img/avatars/1.jpg" alt="">
                                    </div>
                                </div>
                                <span class="col-5 col-xl-3 order-2 semibold ps-0">Петренко Николаев Алексей</span>
                                <div class="col-6 col-xl-4 order-4 order-xl-3 row mx-0 px-0 mt-3 mt-xl-0">
                                    <span class="col-12 col-xl-6 blue semibold">+7 (495) 852-56-56</span>
                                    <span class="col-12 col-xl-6 thin opacity-80">pochta3431@gmail.com</span>
                                </div>
                                <div
                                    class="col-auto col-xl-1 order-3 order-xl-4 d-flex justify-content-end ms-auto position-relative opacity-15">
                                    <svg class="black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                         height="20" width="20">
                                        <path
                                            d="M14.95 22.1q.95 0 1.6-.65.65-.65.65-1.6 0-.95-.65-1.6-.65-.65-1.6-.65-.95 0-1.6.65-.65.65-.65 1.6 0 .95.65 1.6.65.65 1.6.65Zm9.2 0q.95 0 1.6-.65.65-.65.65-1.6 0-.95-.65-1.6-.65-.65-1.6-.65-.95 0-1.6.65-.65.65-.65 1.6 0 .95.65 1.6.65.65 1.6.65Zm8.85 0q.95 0 1.6-.65.65-.65.65-1.6 0-.95-.65-1.6-.65-.65-1.6-.65-.95 0-1.6.65-.65.65-.65 1.6 0 .95.65 1.6.65.65 1.6.65ZM3.3 44.7V7.25q0-1.6 1.175-2.8 1.175-1.2 2.775-1.2h33.5q1.6 0 2.8 1.2 1.2 1.2 1.2 2.8v25.5q0 1.55-1.2 2.75t-2.8 1.2H11.3Zm3.95-8.95 3-3h30.5V7.25H7.25Zm0-28.5v28.5Z"/>
                                    </svg>
                                </div>
                                <div
                                    class="col-auto col-xl-1 order-last d-flex justify-content-end ms-auto ms-xl-2 mt-3 mt-xl-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                                        <path
                                            d="M11.2 45.3q-2.6 0-4.425-1.8-1.825-1.8-1.825-4.45V32.1h6.7V3.5l3.15 3.15 3.15-3.15 3.1 3.15L24.2 3.5l3.1 3.15 3.15-3.15 3.1 3.15L36.7 3.5l3.15 3.15 3.2-3.15v35.55q0 2.65-1.825 4.45-1.825 1.8-4.425 1.8Zm25.6-4q1 0 1.625-.625t.625-1.625V9.6H15.6v22.5h18.95v6.95q0 1 .625 1.625t1.625.625ZM18.25 17.65v-3h11.5v3Zm0 6.7v-3h11.5v3Zm16.15-6.7q-.6 0-1.05-.45-.45-.45-.45-1.05 0-.6.45-1.05.45-.45 1.05-.45.6 0 1.05.45.45.45.45 1.05 0 .6-.45 1.05-.45.45-1.05.45Zm0 6.45q-.6 0-1.05-.45-.45-.45-.45-1.05 0-.6.45-1.05.45-.45 1.05-.45.6 0 1.05.45.45.45.45 1.05 0 .6-.45 1.05-.45.45-1.05.45ZM11.15 41.3H30.6v-5.2H8.95v2.95q0 1 .65 1.625t1.55.625Zm-2.2 0v-5.2 5.2Z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion__item visible bg-white rounded">
                        <div class="accordion__head p-4 row align-items-center justify-content-between">
                            <div class="col-1 pb-4 pb-xl-0">
                                <div class="big-icon bg-light rounded d-flex justify-content-center align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                                        <path
                                            d="M9 44q-1.2 0-2.1-.9Q6 42.2 6 41V10q0-1.2.9-2.1Q7.8 7 9 7h3.25V4h3.25v3h17V4h3.25v3H39q1.2 0 2.1.9.9.9.9 2.1v31q0 1.2-.9 2.1-.9.9-2.1.9Zm0-3h30V19.5H9V41Zm0-24.5h30V10H9Zm0 0V10v6.5Z"/>
                                    </svg>
                                </div>
                            </div>
                            <span class="col-5 px-0 pb-4 pb-xl-0">14 августа в 10:00 (сегодня)</span>
                            <div
                                class="row mx-0 col-12 col-xl-5 accordion__head-splitted splitted splitted-xl-none px-0 pt-4 pt-xl-0 order-last order-xl-3 justify-content-between">
                                <span class="col-auto col-xl-5 order-2 order-xl-1 opacity-80 red-dot">23
                                    участников</span>
                                <button
                                    class="col-auto col-xl-7 order-1 order-xl-2 excursion__menu blue-hover font-size-07 letter-spacing-3 text-uppercase bold">
                                    выгрузить
                                    <span
                                        class="blue-hover font-size-07 letter-spacing-3 text-uppercase bold hide visible-xxl">в
                                        excel</span>
                                    <span class="blue fs-6">&gt;</span>
                                </button>
                            </div>
                            <div
                                class="expand-img pb-4 pb-xl-0 order-2 order-xl-last col-auto d-flex justify-content-end">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                                    <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="accordion__content">
                        </div>
                    </div>
                    <div class="accordion__item visible bg-white rounded">
                        <div class="accordion__head p-4 row align-items-center justify-content-between">
                            <div class="col-1 pb-4 pb-xl-0">
                                <div class="big-icon bg-light rounded d-flex justify-content-center align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                                        <path
                                            d="M9 44q-1.2 0-2.1-.9Q6 42.2 6 41V10q0-1.2.9-2.1Q7.8 7 9 7h3.25V4h3.25v3h17V4h3.25v3H39q1.2 0 2.1.9.9.9.9 2.1v31q0 1.2-.9 2.1-.9.9-2.1.9Zm0-3h30V19.5H9V41Zm0-24.5h30V10H9Zm0 0V10v6.5Z"/>
                                    </svg>
                                </div>
                            </div>
                            <span class="col-5 px-0 pb-4 pb-xl-0">14 августа в 10:00 (сегодня)</span>
                            <div
                                class="row mx-0 col-12 col-xl-5 accordion__head-splitted splitted splitted-xl-none px-0 pt-4 pt-xl-0 order-last order-xl-3 justify-content-between">
                                <span class="col-auto col-xl-5 order-2 order-xl-1 opacity-80 ">23
                                    участников</span>
                                <button
                                    class="col-auto col-xl-7 order-1 order-xl-2 excursion__menu blue-hover font-size-07 letter-spacing-3 text-uppercase bold">
                                    выгрузить
                                    <span
                                        class="blue-hover font-size-07 letter-spacing-3 text-uppercase bold hide visible-xxl">в
                                        excel</span>
                                    <span class="blue fs-6">&gt;</span>
                                </button>
                            </div>
                            <div
                                class="expand-img pb-4 pb-xl-0 order-2 order-xl-last col-auto d-flex justify-content-end">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                                    <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="accordion__content">
                        </div>
                    </div>
                    <div class="accordion__item visible bg-white rounded">
                        <div class="accordion__head p-4 row align-items-center justify-content-between">
                            <div class="col-1 pb-4 pb-xl-0">
                                <div class="big-icon bg-light rounded d-flex justify-content-center align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                                        <path
                                            d="M9 44q-1.2 0-2.1-.9Q6 42.2 6 41V10q0-1.2.9-2.1Q7.8 7 9 7h3.25V4h3.25v3h17V4h3.25v3H39q1.2 0 2.1.9.9.9.9 2.1v31q0 1.2-.9 2.1-.9.9-2.1.9Zm0-3h30V19.5H9V41Zm0-24.5h30V10H9Zm0 0V10v6.5Z"/>
                                    </svg>
                                </div>
                            </div>
                            <span class="col-5 px-0 pb-4 pb-xl-0">14 августа в 10:00 (сегодня)</span>
                            <div
                                class="row mx-0 col-12 col-xl-5 accordion__head-splitted splitted splitted-xl-none px-0 pt-4 pt-xl-0 order-last order-xl-3 justify-content-between">
                                <span class="col-auto col-xl-5 order-2 order-xl-1 opacity-15">0
                                    участников</span>
                                <button
                                    class="col-auto col-xl-7 order-1 order-xl-2 excursion__menu blue-hover font-size-07 letter-spacing-3 text-uppercase bold">
                                    выгрузить
                                    <span
                                        class="blue-hover font-size-07 letter-spacing-3 text-uppercase bold hide visible-xxl">в
                                        excel</span>
                                    <span class="blue fs-6">&gt;</span>
                                </button>
                            </div>
                            <div
                                class="expand-img pb-4 pb-xl-0 order-2 order-xl-last col-auto d-flex justify-content-end">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                                    <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="accordion__content">
                        </div>
                    </div>

                    <button class="button col-12 px-4 active rounded shadow-none">
                        <span class="bold">Показать ещё</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                            <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                        </svg>
                    </button>
                </div>
                <div class="row align-items-center mb-4">
                    <h1 class="col-12 col-lg-auto mb-4 mb-lg-0 lh-1 bold">Отзывы об экскурсии</h1>
                    <span class="col-auto ms-lg-auto bold fs-5">4.86 из 5</span>
                    <div class="col-auto ms-2 align-items-center">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                    <span class="col-auto ms-2 thin font-size-09">43 оценки</span>
                </div>
                <div class="reviews__rating mb-4">
                    <div class="row align-items-center" id="review-5">
                        <div class="col-auto col-md-2 align-items-center d-flex gap-1 justify-content-end opacity-15">
                            <svg class="black" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                            <svg class="black" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                            <svg class="black" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                            <svg class="black" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                            <svg class="black" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                        <div class="col col-md-9 rounded reviews__line"></div>
                        <span class="col-1 thin font-size-09 text-end">1090</span>
                    </div>
                    <div class="row align-items-center" id="review-4">
                        <div class="col-auto col-md-2 align-items-center d-flex gap-1 justify-content-end opacity-15">
                            <svg class="opacity-0" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16"
                                 height="16" viewBox="0 0 428.000000 427.000000" preserveAspectRatio="xMidYMid meet">
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
                            <svg class="black" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                            <svg class="black" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                            <svg class="black" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                            <svg class="black" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                        <div class="col col-md-9 rounded reviews__line">
                        </div>
                        <span class="col-1 thin font-size-09 text-end">140</span>
                    </div>
                    <div class="row align-items-center" id="review-3">
                        <div class="col-auto col-md-2 align-items-center d-flex gap-1 justify-content-end opacity-15">
                            <svg class="opacity-0" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16"
                                 height="16" viewBox="0 0 428.000000 427.000000" preserveAspectRatio="xMidYMid meet">
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
                            <svg class="opacity-0" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16"
                                 height="16" viewBox="0 0 428.000000 427.000000" preserveAspectRatio="xMidYMid meet">
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
                            <svg class="black" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                            <svg class="black" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                            <svg class="black" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                        <div class="col col-md-9 rounded reviews__line">
                        </div>
                        <span class="col-1 thin font-size-09 text-end">21</span>
                    </div>
                    <div class="row align-items-center" id="review-2">
                        <div class="col-auto col-md-2 align-items-center d-flex gap-1 justify-content-end opacity-15">
                            <svg class="opacity-0" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16"
                                 height="16" viewBox="0 0 428.000000 427.000000" preserveAspectRatio="xMidYMid meet">
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
                            <svg class="opacity-0" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16"
                                 height="16" viewBox="0 0 428.000000 427.000000" preserveAspectRatio="xMidYMid meet">
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
                            <svg class="opacity-0" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16"
                                 height="16" viewBox="0 0 428.000000 427.000000" preserveAspectRatio="xMidYMid meet">
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
                            <svg class="black" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                            <svg class="black" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                        <div class="col col-md-9 rounded reviews__line">
                        </div>
                        <span class="col-1 thin font-size-09 text-end">0</span>
                    </div>
                    <div class="row align-items-center" id="review-1">
                        <div class="col-auto col-md-2 align-items-center d-flex gap-1 justify-content-end opacity-15">
                            <svg class="opacity-0" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16"
                                 height="16" viewBox="0 0 428.000000 427.000000" preserveAspectRatio="xMidYMid meet">
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
                            <svg class="opacity-0" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16"
                                 height="16" viewBox="0 0 428.000000 427.000000" preserveAspectRatio="xMidYMid meet">
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
                            <svg class="opacity-0" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16"
                                 height="16" viewBox="0 0 428.000000 427.000000" preserveAspectRatio="xMidYMid meet">
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
                            <svg class="opacity-0" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16"
                                 height="16" viewBox="0 0 428.000000 427.000000" preserveAspectRatio="xMidYMid meet">
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
                            <svg class="black" version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                        <div class="col col-md-9 rounded reviews__line">
                        </div>
                        <span class="col-1 thin font-size-09 text-end">4</span>
                    </div>
                </div>
                <div class="row mb-4 mb-md-3 align-items-center mx-0">
                    <span class="col-auto thin opacity-40 px-0 ms-0 ms-md-auto">сортировка по</span>
                    <div class="col-auto hide visible-md row ms-5 me-0 px-0 align-items-center">
                        <span class="col-auto blue px-0">дате <svg xmlns="http://www.w3.org/2000/svg"
                                                                   viewBox="0 0 48 48" height="20" width="20">
                                <path d="m24 30-10-9.95h20Z"/>
                            </svg>
                        </span>
                        <span class="col-auto ms-4 px-0">оценке <svg class="opacity-15"
                                                                     xmlns="http://www.w3.org/2000/svg"
                                                                     viewBox="0 0 48 48" height="20" width="20">
                                <path d="m24 30-10-9.95h20Z"/>
                            </svg>
                        </span>
                    </div>
                    <div class="dropdown hide-md col-auto position-relative mx-0 ms-auto px-0 bg-white rounded">
                        <button type="button"
                                class="big-button col-auto ps-2rem dropdown-toggle text-start font-size-09"
                                data-bs-toggle="dropdown"> дате
                        </button>
                        <ul class="dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3 pt-0 rounded font-size-09">
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> дате </a>
                            </li>
                            <li><a class="dropdown-item w-100 mt-3 p-0 font-size-09" href="#"> оценке </a>
                            </li>
                        </ul>
                        <svg class="col-auto px-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20"
                             width="20">
                            <path d="m24 30-10-9.95h20Z"/>
                        </svg>
                    </div>
                </div>
                <div class="comment row align-items-start mb-4 mx-0">
                    <div class="comment__avatar col-auto row mx-0 px-0 align-items-center">
                        <div
                            class="comment__avatar big-icon col-auto px-0 rounded d-flex align-items-center justify-content-center bg-white">
                            <img class="rounded big-icon" src="/img/avatars/2.jpg" alt="">
                        </div>
                        <div class="col hide-md">
                            <div class="row lh-1">
                                <span class="col-12 thin opacity-40">2 недели назад</span>
                                <div class="col-12 comment__name lh-1 my-1">
                                    <span class="semibold lh-1">Екатерина Иванова</span>
                                </div>
                                <div class="col-12 ms-auto align-items-center">
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                    </div>
                    <div class="comment__content ms-0 ms-md-4 mt-4 mt-md-0 col-12 col-md rounded bg-white">
                        <div class="hide visible-md">
                            <div class="row lh-1">
                                <span class="col-auto thin opacity-40">2 недели назад</span>
                                <div class="col-auto ms-auto align-items-center">
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                            <div class="comment__name lh-1">
                                <span class="semibold lh-1">Екатерина Иванова</span>
                            </div>
                        </div>
                        <p class="opacity-70 thin lh-lg mt-md-3">Lorem ipsum dolor sit, amet consectetur adipisicing
                            elit.
                            Illum nemo nostrum voluptatem harum quae, consectetur laboriosam magni laudantium debitis
                            officia vel sit asperiores quam facilis commodi rerum sed! Optio, natus. Lorem ipsum dolor
                            sit amet consectetur adipisicing elit. Hic, quibusdam. Veritatis, est assumenda quas
                            obcaecati corrupti maiores enim quasi!</p>
                        <div class="comment__images row-cols-auto d-flex mt-3">
                            <img class="comment__image col-auto rounded" src="/img/travels/2.jpg" alt="">
                            <img class="comment__image col-auto rounded" src="/img/travels/5.jpg" alt="">
                            <img class="comment__image col-auto rounded" src="/img/travels/1.jpg" alt="">
                            <img class="comment__image col-auto rounded" src="/img/travels/3.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="comment row align-items-start mb-4 mx-0">
                    <div class="comment__avatar row mx-0 col-auto px-0">
                        <div
                            class="comment__avatar big-icon col-auto px-0 rounded d-flex align-items-center justify-content-center bg-white">
                            <svg class="black opacity-15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                 height="20" width="20">
                                <path
                                    d="M17.8 28.9q-1.15 0-1.95-.8t-.8-1.95q0-1.2.8-1.975.8-.775 1.95-.775 1.2 0 1.975.8.775.8.775 1.95 0 1.2-.8 1.975-.8.775-1.95.775Zm12.45 0q-1.2 0-1.975-.8-.775-.8-.775-1.95 0-1.2.8-1.975.8-.775 1.95-.775t1.95.8q.8.8.8 1.95 0 1.2-.8 1.975-.8.775-1.95.775ZM24 40.75q7 0 11.875-4.875T40.75 24q0-1.3-.2-2.5t-.5-2.25q-1 .3-2.125.375-1.125.075-2.375.075-4.8 0-9.05-1.95-4.25-1.95-7.3-5.6-1.65 3.95-4.775 6.925Q11.3 22.05 7.3 23.7v.35q0 7 4.85 11.85T24 40.75Zm0 3.95q-4.25 0-8.025-1.625-3.775-1.625-6.6-4.425-2.825-2.8-4.45-6.575Q3.3 28.3 3.3 24q0-4.3 1.625-8.075Q6.55 12.15 9.375 9.35q2.825-2.8 6.6-4.45 3.775-1.65 8.075-1.65 4.3 0 8.05 1.65 3.75 1.65 6.55 4.45 2.8 2.8 4.45 6.575Q44.75 19.7 44.75 24q0 4.3-1.625 8.075-1.625 3.775-4.45 6.575-2.825 2.8-6.6 4.425Q28.3 44.7 24 44.7ZM19.4 7.65q4.4 5.15 8.125 7.05 3.725 1.9 8.175 1.9 1.2 0 1.9-.05t1.55-.3Q36.9 12.2 33.025 9.6 29.15 7 24 7q-1.35 0-2.55.2-1.2.2-2.05.45ZM7.45 20.1q2.4-.9 5.475-4.075Q16 12.85 17.3 8.35q-4.35 1.95-6.575 4.975Q8.5 16.35 7.45 20.1ZM19.4 7.65Zm-2.1.7Z"/>
                            </svg>
                        </div>
                        <div class="col hide-md">
                            <div class="row lh-1">
                                <span class="col-12 thin opacity-40">3 месяца назад</span>
                                <div class="comment__name col-12 lh-1 my-1">
                                    <span class="semibold lh-1">Николаев Алексей</span>
                                </div>
                                <div class="col-12 align-items-center">
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                    </div>
                    <div class="comment__content ms-0 ms-md-4 mt-4 mt-md-0 col-12 col-md rounded bg-white">
                        <div class="hide visible-md">
                            <div class="row lh-1">
                                <span class="col-auto thin opacity-40">3 месяца назад</span>
                                <div class="col-auto ms-auto align-items-center">
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                            <div class="comment__name lh-1">
                                <span class="semibold lh-1">Николаев Алексей</span>
                            </div>
                        </div>
                        <p class="opacity-70 thin lh-lg mt-md-3">Lorem ipsum dolor sit, amet consectetur adipisicing
                            elit.
                            Illum nemo nostrum voluptatem harum quae, consectetur laboriosam magni laudantium debitis
                            officia vel sit asperiores quam facilis commodi rerum sed! Optio, natus.</p>
                    </div>
                </div>
                <div class="comment row align-items-start mb-4 mx-0">
                    <div class="comment__avatar col-auto row mx-0 px-0">
                        <div
                            class="comment__avatar big-icon col-auto px-0 rounded d-flex align-items-center justify-content-center bg-white">
                            <img class="rounded big-icon" src="/img/avatars/7.jpg" alt="">
                        </div>
                        <div class="col hide-md">
                            <div class="row lh-1">
                                <span class="col-12 thin opacity-40">полгода назад</span>
                                <div class="comment__name col-12 lh-1 my-1">
                                    <span class="semibold lh-1">Имя Отчество</span>
                                </div>
                                <div class="col-12 align-items-center">
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                    </div>
                    <div class="comment__content ms-0 ms-md-4 mt-4 mt-md-0 col-12 col-md rounded bg-white">
                        <div class="hide visible-md">
                            <div class="row lh-1">
                                <span class="col-auto thin opacity-40">полгода назад</span>
                                <div class="col-auto ms-auto align-items-center">
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                            <div class="comment__name lh-1">
                                <span class="semibold lh-1">Имя Отчество</span>
                            </div>
                        </div>
                        <p class="opacity-70 thin lh-lg mt-md-3">Lorem ipsum dolor sit, amet consectetur adipisicing
                            elit.
                            Illum nemo nostrum voluptatem harum quae, consectetur laboriosam magni laudantium debitis
                            officia vel sit asperiores quam facilis commodi rerum sed! Optio, natus. Lorem ipsum dolor
                            sit amet consectetur adipisicing elit. Hic, quibusdam. Veritatis, est assumenda quas
                            obcaecati corrupti maiores enim quasi!</p>
                        <p class="opacity-70 thin lh-lg mt-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                            Illum nemo nostrum voluptatem harum quae, consectetur laboriosam magni laudantium debitis
                            officia vel sit asperiores quam facilis commodi rerum sed! Optio, natus. Lorem ipsum dolor
                            sit amet consectetur adipisicing elit. Hic, quibusdam. Veritatis, est assumenda quas
                            obcaecati corrupti maiores enim quasi!</p>
                    </div>
                </div>

                <button class="button col-12 px-4 active rounded shadow-none">
                    <span class="bold">Показать ещё</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                        <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                    </svg>
                </button>
            </div>

            <!--ДОБАВЛЕНИЕ/РЕДАКТИРОВАНИЕ ЭКСКУРСИИ-->
            <add-tour v-if="activeTitle == 'Добавить'" />

            <!--МОИ ОБЪЕКТЫ-->
            <div id="my-objects" class="my-objects col ">
                <!--ВСЕ ОБЪЕКТЫ-->
                <h2 class="lh-1 mb-5 bold mt-5 mt-lg-0">Мои объекты</h2>
                <div class="row mx-0 mb-5">
                    <button
                        class="button col col-md-auto order-2 order-md-1 bg-white d-flex rounded mt-5 mt-md-0 px-4 justify-content-center align-items-center active semibold">
                        Действующие
                    </button>
                    <button
                        class="button col col-md-auto order-3 order-md-2 bg-white d-flex rounded mt-5 mt-md-0 ms-2 px-4 justify-content-center align-items-center semibold">
                        Удаленные
                    </button>
                    <button
                        class="button col-12 col-md-3 order-1 order-md-3 bg-green d-flex rounded ms-md-auto px-4 justify-content-center align-items-center bold">
                        Добавить
                        объект
                    </button>
                </div>

                <!--ДЕЙСТВУЮЩИЕ-->
                <div id="active-objects" class="active-objects visible">
                    <div class="row mx-0 row-cols-1 row-cols-xl-3 gap-3 justify-content-center">
                        <div class="object row col bg-white rounded mx-0 px-0">
                            <div class="col-12 px-0">
                                <img class="cover w-100 rounded-top" src="/img/travels/2.jpg" alt=""/>
                            </div>
                            <div class="col-12 px-0">
                                <div class="px-5 py-4">
                                    <h2 class="mb-2 bold">Медовые водопады</h2>
                                    <p class="short-descrtiption opacity-80 lh-lg">Lorem ipsum dolor sit amet
                                        consectetur
                                        adipisicing elit. Iusto, eius omnis distinctio, est quisquam architecto ducimus
                                        quod
                                        labore veniam ullam sint cum eum incidunt libero sapiente, dolor ea! Similique,
                                        voluptatibus!</p>
                                </div>
                                <div class="splitted">
                                    <div class="row align-items-center mx-0 px-5 py-4 d-flex justify-content-between">
                                        <button
                                            class="px-0 col-auto blue-hover font-size-06 letter-spacing-3 text-uppercase bold">
                                            редактировать<span class="blue font-size-07">&gt;</span>
                                        </button>
                                        <button
                                            class="col-auto hide visible-md px-0 font-size-06 letter-spacing-3 text-uppercase bold position-relative red red-underline">
                                            удалить
                                        </button>
                                        <div
                                            class="dropdown col-auto hide-md position-relative mx-0 ms-auto px-0 bg-white rounded">
                                            <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                <div
                                                    class="col-auto menu-dots rounded d-flex px-0 gap-1 align-items-center justify-content-center">
                                                    <div class="menu-dot bg-blue rounded"></div>
                                                    <div class="menu-dot bg-blue rounded"></div>
                                                    <div class="menu-dot bg-blue rounded"></div>
                                                </div>
                                            </button>
                                            <ul
                                                class="dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3 pt-0 text-center rounded font-size-09">
                                                <li>
                                                    <button class="dropdown-item mt-3 p-0"><span
                                                        class="px-0 font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">удалить</span>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="object row col bg-white rounded mx-0 px-0">
                            <div class="col-12 px-0">
                                <img class="cover w-100 rounded-top" src="/img/travels/2.jpg" alt=""/>
                            </div>
                            <div class="col-12 px-0">
                                <div class="px-5 py-4">
                                    <h2 class="mb-2 bold">Медовые водопады</h2>
                                    <p class="short-descrtiption opacity-80 lh-lg">Lorem ipsum dolor sit amet
                                        consectetur
                                        adipisicing elit. Iusto, eius omnis distinctio, est quisquam architecto ducimus
                                        quod
                                        labore veniam ullam sint cum eum incidunt libero sapiente, dolor ea! Similique,
                                        voluptatibus!</p>
                                </div>
                                <div class="splitted">
                                    <div class="row align-items-center mx-0 px-5 py-4 d-flex justify-content-between">
                                        <button
                                            class="px-0 col-auto blue-hover font-size-06 letter-spacing-3 text-uppercase bold">
                                            редактировать<span class="blue font-size-07">&gt;</span>
                                        </button>
                                        <button
                                            class="col-auto hide visible-md px-0 font-size-06 letter-spacing-3 text-uppercase bold position-relative red red-underline">
                                            удалить
                                        </button>
                                        <div
                                            class="dropdown col-auto hide-md position-relative mx-0 ms-auto px-0 bg-white rounded">
                                            <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                <div
                                                    class="col-auto menu-dots rounded d-flex px-0 gap-1 align-items-center justify-content-center">
                                                    <div class="menu-dot bg-blue rounded"></div>
                                                    <div class="menu-dot bg-blue rounded"></div>
                                                    <div class="menu-dot bg-blue rounded"></div>
                                                </div>
                                            </button>
                                            <ul
                                                class="dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3 pt-0 text-center rounded font-size-09">
                                                <li>
                                                    <button class="dropdown-item mt-3 p-0"><span
                                                        class="px-0 font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">удалить</span>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="object row col bg-white rounded mx-0 px-0">
                            <div class="col-12 px-0">
                                <img class="cover w-100 rounded-top" src="/img/travels/2.jpg" alt=""/>
                            </div>
                            <div class="col-12 px-0">
                                <div class="px-5 py-4">
                                    <h2 class="mb-2 bold">Медовые водопады</h2>
                                    <p class="short-descrtiption opacity-80 lh-lg">Lorem ipsum dolor sit amet
                                        consectetur
                                        adipisicing elit. Iusto, eius omnis distinctio, est quisquam architecto ducimus
                                        quod
                                        labore veniam ullam sint cum eum incidunt libero sapiente, dolor ea! Similique,
                                        voluptatibus!</p>
                                </div>
                                <div class="splitted">
                                    <div class="row align-items-center mx-0 px-5 py-4 d-flex justify-content-between">
                                        <button
                                            class="px-0 col-auto blue-hover font-size-06 letter-spacing-3 text-uppercase bold">
                                            редактировать<span class="blue font-size-07">&gt;</span>
                                        </button>
                                        <button
                                            class="col-auto hide visible-md px-0 font-size-06 letter-spacing-3 text-uppercase bold position-relative red red-underline">
                                            удалить
                                        </button>
                                        <div
                                            class="dropdown col-auto hide-md position-relative mx-0 ms-auto px-0 bg-white rounded">
                                            <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                <div
                                                    class="col-auto menu-dots rounded d-flex px-0 gap-1 align-items-center justify-content-center">
                                                    <div class="menu-dot bg-blue rounded"></div>
                                                    <div class="menu-dot bg-blue rounded"></div>
                                                    <div class="menu-dot bg-blue rounded"></div>
                                                </div>
                                            </button>
                                            <ul
                                                class="dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3 pt-0 text-center rounded font-size-09">
                                                <li>
                                                    <button class="dropdown-item mt-3 p-0"><span
                                                        class="px-0 font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">удалить</span>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="object row col bg-white rounded mx-0 px-0">
                            <div class="col-12 px-0">
                                <img class="cover w-100 rounded-top" src="/img/travels/2.jpg" alt=""/>
                            </div>
                            <div class="col-12 px-0">
                                <div class="px-5 py-4">
                                    <h2 class="mb-2 bold">Медовые водопады</h2>
                                    <p class="short-descrtiption opacity-80 lh-lg">Lorem ipsum dolor sit amet
                                        consectetur
                                        adipisicing elit. Iusto, eius omnis distinctio, est quisquam architecto ducimus
                                        quod
                                        labore veniam ullam sint cum eum incidunt libero sapiente, dolor ea! Similique,
                                        voluptatibus!</p>
                                </div>
                                <div class="splitted">
                                    <div class="row align-items-center mx-0 px-5 py-4 d-flex justify-content-between">
                                        <button
                                            class="px-0 col-auto blue-hover font-size-06 letter-spacing-3 text-uppercase bold">
                                            редактировать<span class="blue font-size-07">&gt;</span>
                                        </button>
                                        <button
                                            class="col-auto hide visible-md px-0 font-size-06 letter-spacing-3 text-uppercase bold position-relative red red-underline">
                                            удалить
                                        </button>
                                        <div
                                            class="dropdown col-auto hide-md position-relative mx-0 ms-auto px-0 bg-white rounded">
                                            <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                <div
                                                    class="col-auto menu-dots rounded d-flex px-0 gap-1 align-items-center justify-content-center">
                                                    <div class="menu-dot bg-blue rounded"></div>
                                                    <div class="menu-dot bg-blue rounded"></div>
                                                    <div class="menu-dot bg-blue rounded"></div>
                                                </div>
                                            </button>
                                            <ul
                                                class="dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3 pt-0 text-center rounded font-size-09">
                                                <li>
                                                    <button class="dropdown-item mt-3 p-0"><span
                                                        class="px-0 font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">удалить</span>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="object row col bg-white rounded mx-0 px-0">
                            <div class="col-12 px-0">
                                <img class="cover w-100 rounded-top" src="/img/travels/2.jpg" alt=""/>
                            </div>
                            <div class="col-12 px-0">
                                <div class="px-5 py-4">
                                    <h2 class="mb-2 bold">Медовые водопады</h2>
                                    <p class="short-descrtiption opacity-80 lh-lg">Lorem ipsum dolor sit amet
                                        consectetur
                                        adipisicing elit. Iusto, eius omnis distinctio, est quisquam architecto ducimus
                                        quod
                                        labore veniam ullam sint cum eum incidunt libero sapiente, dolor ea! Similique,
                                        voluptatibus!</p>
                                </div>
                                <div class="splitted">
                                    <div class="row align-items-center mx-0 px-5 py-4 d-flex justify-content-between">
                                        <button
                                            class="px-0 col-auto blue-hover font-size-06 letter-spacing-3 text-uppercase bold">
                                            редактировать<span class="blue font-size-07">&gt;</span>
                                        </button>
                                        <button
                                            class="col-auto hide visible-md px-0 font-size-06 letter-spacing-3 text-uppercase bold position-relative red red-underline">
                                            удалить
                                        </button>
                                        <div
                                            class="dropdown col-auto hide-md position-relative mx-0 ms-auto px-0 bg-white rounded">
                                            <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                <div
                                                    class="col-auto menu-dots rounded d-flex px-0 gap-1 align-items-center justify-content-center">
                                                    <div class="menu-dot bg-blue rounded"></div>
                                                    <div class="menu-dot bg-blue rounded"></div>
                                                    <div class="menu-dot bg-blue rounded"></div>
                                                </div>
                                            </button>
                                            <ul
                                                class="dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3 pt-0 text-center rounded font-size-09">
                                                <li>
                                                    <button class="dropdown-item mt-3 p-0"><span
                                                        class="px-0 font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">удалить</span>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="object row col bg-white rounded mx-0 px-0">
                            <div class="col-12 px-0">
                                <img class="cover w-100 rounded-top" src="/img/travels/2.jpg" alt=""/>
                            </div>
                            <div class="col-12 px-0">
                                <div class="px-5 py-4">
                                    <h2 class="mb-2 bold">Медовые водопады</h2>
                                    <p class="short-descrtiption opacity-80 lh-lg">Lorem ipsum dolor sit amet
                                        consectetur
                                        adipisicing elit. Iusto, eius omnis distinctio, est quisquam architecto ducimus
                                        quod
                                        labore veniam ullam sint cum eum incidunt libero sapiente, dolor ea! Similique,
                                        voluptatibus!</p>
                                </div>
                                <div class="splitted">
                                    <div class="row align-items-center mx-0 px-5 py-4 d-flex justify-content-between">
                                        <button
                                            class="px-0 col-auto blue-hover font-size-06 letter-spacing-3 text-uppercase bold">
                                            редактировать<span class="blue font-size-07">&gt;</span>
                                        </button>
                                        <button
                                            class="col-auto hide visible-md px-0 font-size-06 letter-spacing-3 text-uppercase bold position-relative red red-underline">
                                            удалить
                                        </button>
                                        <div
                                            class="dropdown col-auto hide-md position-relative mx-0 ms-auto px-0 bg-white rounded">
                                            <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                <div
                                                    class="col-auto menu-dots rounded d-flex px-0 gap-1 align-items-center justify-content-center">
                                                    <div class="menu-dot bg-blue rounded"></div>
                                                    <div class="menu-dot bg-blue rounded"></div>
                                                    <div class="menu-dot bg-blue rounded"></div>
                                                </div>
                                            </button>
                                            <ul
                                                class="dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3 pt-0 text-center rounded font-size-09">
                                                <li>
                                                    <button class="dropdown-item mt-3 p-0"><span
                                                        class="px-0 font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">удалить</span>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-0 px-0 mt-4 mt-lg-5 d-flex justify-content-center align-items-center">
                        <button class="button bold bg-blue col-12 col-lg-auto px-4 rounded">Показать еще
                            <svg class="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20"
                                 width="20">
                                <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                            </svg>
                        </button>
                        <div
                            class="pages-selector row flex-nowrap col-12 col-lg-auto justify-content-center mt-4 mt-lg-0 mx-0 px-0">
                            <button class="pages-selector__page button bold bg-white col-auto ms-lg-2 rounded"><span
                                class="fs-5 blue-hover opacity-15">&lt;</span>
                            </button>
                            <button class="pages-selector__page button bold bg-white col-auto ms-2 rounded">1</button>
                            <button class="pages-selector__page button bold bg-white col-auto ms-2 rounded">2</button>
                            <button class="pages-selector__page button bold bg-white col-auto ms-2 rounded">3</button>
                            <button class="pages-selector__page button bold bg-white col-auto ms-2 rounded"><span
                                class="fs-5 blue-hover">&gt;</span>
                            </button>
                        </div>
                    </div>
                </div>
                <!--УДАЛЕННЫЕ-->
                <div id="active-objects" class="active-objects visible">
                    <div class="row mx-0 row-cols-1 row-cols-xl-3 gap-3 justify-content-center">
                        <div class="object row col bg-white rounded mx-0 px-0">
                            <div class="col-12 px-0">
                                <img class="cover w-100 rounded-top archived" src="/img/travels/2.jpg" alt=""/>
                            </div>
                            <div class="col-12 px-0">
                                <div class="px-5 py-4">
                                    <h2 class="mb-2 bold">Медовые водопады</h2>
                                    <p class="short-descrtiption opacity-80 lh-lg">Lorem ipsum dolor sit amet
                                        consectetur
                                        adipisicing elit. Iusto, eius omnis distinctio, est quisquam architecto ducimus
                                        quod
                                        labore veniam ullam sint cum eum incidunt libero sapiente, dolor ea! Similique,
                                        voluptatibus!</p>
                                </div>
                                <div class="splitted">
                                    <div class="row align-items-center mx-0 px-5 py-4 d-flex justify-content-center">
                                        <button
                                            class="px-0 col-auto font-size-06 letter-spacing-3 text-uppercase bold position-relative black-underline">
                                            восстановить
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="object row col bg-white rounded mx-0 px-0">
                            <div class="col-12 px-0">
                                <img class="cover w-100 rounded-top archived" src="/img/travels/2.jpg" alt=""/>
                            </div>
                            <div class="col-12 px-0">
                                <div class="px-5 py-4">
                                    <h2 class="mb-2 bold">Медовые водопады</h2>
                                    <p class="short-descrtiption opacity-80 lh-lg">Lorem ipsum dolor sit amet
                                        consectetur
                                        adipisicing elit. Iusto, eius omnis distinctio, est quisquam architecto ducimus
                                        quod
                                        labore veniam ullam sint cum eum incidunt libero sapiente, dolor ea! Similique,
                                        voluptatibus!</p>
                                </div>
                                <div class="splitted">
                                    <div class="row align-items-center mx-0 px-5 py-4 d-flex justify-content-center">
                                        <button
                                            class="px-0 col-auto font-size-06 letter-spacing-3 text-uppercase bold position-relative black-underline">
                                            восстановить
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-0 px-0 mt-5 d-flex justify-content-center align-items-center hide">
                        <button class="button bold bg-blue col-auto px-4 rounded">Показать еще
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                                <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                            </svg>
                        </button>
                        <div class="pages row col-auto mx-0 px-0">
                            <button class="page button bold bg-white col-auto ms-2 rounded"><span
                                class="fs-5 opacity-15">&lt;</span>
                            </button>
                            <button class="page button bold bg-white col-auto ms-2 rounded">1</button>
                            <button class="page button bold bg-white col-auto ms-2 rounded">2</button>
                            <button class="page button bold bg-white col-auto ms-2 rounded">3</button>
                            <button class="page button bold bg-white col-auto ms-2 rounded"><span
                                class="fs-5 ">&gt;</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!--ДОБАВЛЕНИЕ ОБЪЕКТА-->
            <div id="add-object" class="add-object col ">
                <div class="row align-items-center mx-0 mb-5">
                    <button class="button col-auto px-4 active rounded shadow-none bold"><span
                        class="fs-6 me-1">&lt;</span>Назад
                    </button>
                    <h1 class="col-12 col-lg-auto bold fs-2 px-0 ms-lg-4">Добавление новой экскурсии</h1>
                </div>
                <div class="mb-4 row mx-0">
                    <span class="thin position-relative mb-2 col-12 px-0">название экскурсии <svg
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
                    <input type="text" name="add-obj-name" class="col-12 px-2rem py-4 rounded border-0 font-size-09">
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
                    <textarea name="add-obj-description" cols="30" rows="3"
                              class="col-12 px-2rem py-4 rounded border-0 font-size-09"></textarea>
                </div>
                <div class="mb-4 row mx-0">
                    <span class="thin position-relative mb-2 col-12 px-0">добавьте фото <svg
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
                    <span class="thin position-relative mb-2 col-12 px-0">укажите адрес или координаты <svg
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

            <!--ТРАНЗАКЦИИ (добавлено)-->
            <div id="transactions" class="transactions col ">
                <h2 class="lh-1 mt-4 mt-lg-0 mb-4 bold">Транзакции</h2>
                <div class="hide visible-lg">
                    <div class="mb-4 d-flex flex-row">
                        <div>
                            <input type="checkbox" id="transactions-all">
                            <label for="transactions-all"
                                   class="align-items-center checkbox position-relative row mx-0 px-0">
                                <div
                                    class="col-auto custom-checkbox rounded bg-white d-flex align-items-center justify-content-center">
                                    <div class="col-auto custom-checkbox dot">
                                    </div>
                                </div>
                                <span class="col-auto thin ms-1">все</span>
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" id="transactions-pending">
                            <label for="transactions-pending"
                                   class="align-items-center checkbox position-relative row mx-0 px-0">
                                <div
                                    class="col-auto custom-checkbox rounded bg-white d-flex align-items-center justify-content-center">
                                    <div class="col-auto custom-checkbox dot">
                                    </div>
                                </div>
                                <span class="col-auto thin ms-1">в ожидании</span>
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" id="transactions-rejected">
                            <label for="transactions-rejected"
                                   class="align-items-center checkbox position-relative row mx-0 px-0">
                                <div
                                    class="col-auto custom-checkbox rounded bg-white d-flex align-items-center justify-content-center">
                                    <div class="col-auto custom-checkbox dot">
                                    </div>
                                </div>
                                <span class="col-auto thin ms-1">отклоненные</span>
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" id="transactions-paid">
                            <label for="transactions-paid"
                                   class="align-items-center checkbox position-relative row mx-0 px-0">
                                <div
                                    class="col-auto custom-checkbox rounded bg-white d-flex align-items-center justify-content-center">
                                    <div class="col-auto custom-checkbox dot">
                                    </div>
                                </div>
                                <span class="col-auto thin ms-1">оплаченные</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row px-0 mx-0">
                    <div class="col-12 row mx-0 px-0 bg-white rounded mt-2">
                        <div class="row col-12 col-xl-auto order-1 px-4 py-4 py-xl-3 pe-xl-0 mx-0 align-items-center">
                            <span class="col col-xl-auto bold font-size-09 mx-0">
                                <span class="hide visible-xl bold font-size-09">транзакция </span>№ 365149/0</span>
                            <div class="col-auto d-flex ms-xl-4 align-items-center">
                                <span class="thin">сумма</span>
                                <span class="bold ms-2 font-size-09">600 &#8381;</span>
                            </div>
                        </div>
                        <div
                            class="splitted splitted-xl-none col-12 col-xl-6 px-4 py-3 order-3 order-xl-2 d-flex justify-content-end align-items-center ms-xl-auto">
                            <div
                                class="col row mx-0 d-flex align-items-center justify-content-xl-end me-xl-4 me-xll-5 hide">
                                <div class="col-auto">
                                    <svg class="black opacity-15" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 48 48"
                                         height="20" width="20">
                                        <path
                                            d="M11.2 45.3q-2.6 0-4.425-1.8-1.825-1.8-1.825-4.45V32.1h6.7V3.5l3.15 3.15 3.15-3.15 3.1 3.15L24.2 3.5l3.1 3.15 3.15-3.15 3.1 3.15L36.7 3.5l3.15 3.15 3.2-3.15v35.55q0 2.65-1.825 4.45-1.825 1.8-4.425 1.8Zm25.6-4q1 0 1.625-.625t.625-1.625V9.6H15.6v22.5h18.95v6.95q0 1 .625 1.625t1.625.625ZM18.25 17.65v-3h11.5v3Zm0 6.7v-3h11.5v3Zm16.15-6.7q-.6 0-1.05-.45-.45-.45-.45-1.05 0-.6.45-1.05.45-.45 1.05-.45.6 0 1.05.45.45.45.45 1.05 0 .6-.45 1.05-.45.45-1.05.45Zm0 6.45q-.6 0-1.05-.45-.45-.45-.45-1.05 0-.6.45-1.05.45-.45 1.05-.45.6 0 1.05.45.45.45.45 1.05 0 .6-.45 1.05-.45.45-1.05.45ZM11.15 41.3H30.6v-5.2H8.95v2.95q0 1 .65 1.625t1.55.625Zm-2.2 0v-5.2 5.2Z"/>
                                    </svg>
                                </div>
                                <span class="col thin">26 сентября в 20:41</span>
                            </div>
                            <div class="col-auto mx-0 row align-items-center">
                                <span class="col-auto thin blue pe-0">в ожидании</span>
                                <div class="col d-flex align-items-center justify-content-center">
                                    <div
                                        class="bg-light rounded-circle round-icon d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 48 48" height="20"
                                             width="20">
                                            <path
                                                d="M9.75 32.25q-1.2-1.9-1.725-3.95-.525-2.05-.525-4.25 0-6.65 4.825-11.55T23.8 7.6h2.15L22.3 3.95l2.15-2.2L32.3 9.6l-7.85 7.8-2.2-2.2 3.6-3.6h-2q-5.05 0-8.7 3.675-3.65 3.675-3.65 8.775 0 1.55.3 2.9.3 1.35.75 2.5Zm13.7 14.15-7.85-7.8 7.85-7.9 2.2 2.2-3.7 3.65h2.2q5.05 0 8.7-3.675Q36.5 29.2 36.5 24.1q0-1.55-.275-2.9-.275-1.35-.825-2.5l2.8-2.8q1.2 1.95 1.75 3.975.55 2.025.55 4.225 0 6.65-4.825 11.55t-11.425 4.9h-2.3l3.7 3.65Z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="splitted col-12 px-0 mx-0 order-2 order-xl-3">
                            <div class="row mx-0 px-4 py-4 align-items-center">
                                <div class="col-auto row align-items-center mx-0">
                                    <div class="col-12 col-lg-auto row px-0 mx-0 align-items-center">
                                        <span class="col-auto thin font-size-08 px-0 mx-0">оплата за <span
                                            class="col-auto px-0 mx-0 position-relative regular blue blue-underline font-size-08">Некоторое
                                                название
                                                экскурсии</span>
                                        </span>
                                    </div>
                                    <div class="col-12 col-lg-auto px-0 mx-0 align-items-center">
                                        <span class="col-auto thin font-size-08 ms-lg-1 px-0 me-0">от <span
                                            class="col-auto px-0 mx-0 position-relative regular blue blue-underline font-size-08">Куницина
                                                Ирина
                                                Петровна
                                                +7(495)
                                                560-55-00</span>
                                        </span>
                                    </div>
                                </div>
                                <button
                                    class="col-12 col-xxl-auto letter-spacing-3 blue-hover bold font-size-06 mt-3 mt-xxl-0 ms-xxl-auto text-start text-uppercase">
                                    подробнее
                                    о заказе
                                    <span class="blue fs-6">&gt;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 row mx-0 px-0 bg-white rounded mt-2">
                        <div class="row col-12 col-xl-auto order-1 px-4 py-4 py-xl-3 pe-xl-0 mx-0 align-items-center">
                            <span class="col col-xl-auto bold font-size-09 mx-0">
                                <span class="hide visible-xl bold font-size-09">транзакция </span>№ 365149/0</span>
                            <div class="col-auto d-flex ms-xl-4 align-items-center">
                                <span class="thin">сумма</span>
                                <span class="bold ms-2 font-size-09">600 &#8381;</span>
                            </div>
                        </div>
                        <div
                            class="splitted splitted-xl-none col-12 col-xl-6 px-4 py-3 order-3 order-xl-2 d-flex justify-content-xl-end align-items-center ms-xl-auto">
                            <div class="col row mx-0 d-flex align-items-center justify-content-xl-end me-xl-4 me-xll-5">
                                <div class="col-auto">
                                    <svg class="black opacity-15" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 48 48"
                                         height="20" width="20">
                                        <path
                                            d="M11.2 45.3q-2.6 0-4.425-1.8-1.825-1.8-1.825-4.45V32.1h6.7V3.5l3.15 3.15 3.15-3.15 3.1 3.15L24.2 3.5l3.1 3.15 3.15-3.15 3.1 3.15L36.7 3.5l3.15 3.15 3.2-3.15v35.55q0 2.65-1.825 4.45-1.825 1.8-4.425 1.8Zm25.6-4q1 0 1.625-.625t.625-1.625V9.6H15.6v22.5h18.95v6.95q0 1 .625 1.625t1.625.625ZM18.25 17.65v-3h11.5v3Zm0 6.7v-3h11.5v3Zm16.15-6.7q-.6 0-1.05-.45-.45-.45-.45-1.05 0-.6.45-1.05.45-.45 1.05-.45.6 0 1.05.45.45.45.45 1.05 0 .6-.45 1.05-.45.45-1.05.45Zm0 6.45q-.6 0-1.05-.45-.45-.45-.45-1.05 0-.6.45-1.05.45-.45 1.05-.45.6 0 1.05.45.45.45.45 1.05 0 .6-.45 1.05-.45.45-1.05.45ZM11.15 41.3H30.6v-5.2H8.95v2.95q0 1 .65 1.625t1.55.625Zm-2.2 0v-5.2 5.2Z"/>
                                    </svg>
                                </div>
                                <span class="col thin">26 сентября в 20:41</span>
                            </div>
                            <div class="col-auto mx-0 row align-items-center">
                                <span class="hide visible-md col-auto thin green pe-0">оплачено</span>
                                <div class="col d-flex align-items-center justify-content-center">
                                    <div
                                        class="bg-light rounded-circle round-icon d-flex align-items-center justify-content-center">
                                        <svg class="green" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 48 48"
                                             height="20" width="20">
                                            <path d="M18.9 36.4 7 24.5l2.9-2.85 9 9L38.05 11.5l2.9 2.85Z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="splitted col-12 px-0 mx-0 order-2 order-xl-3">
                            <div class="row mx-0 px-4 py-4 align-items-center">
                                <div class="col-auto row align-items-center mx-0">
                                    <div class="col-12 col-lg-auto row px-0 mx-0 align-items-center">
                                        <span class="col-auto thin font-size-08 px-0 mx-0">оплата за <span
                                            class="col-auto px-0 mx-0 position-relative regular blue blue-underline font-size-08">Некоторое
                                                название
                                                экскурсии</span>
                                        </span>
                                    </div>
                                    <div class="col-12 col-lg-auto px-0 mx-0 align-items-center">
                                        <span class="col-auto thin font-size-08 ms-lg-1 px-0 me-0">от <span
                                            class="col-auto px-0 mx-0 position-relative regular blue blue-underline font-size-08">Куницина
                                                Ирина
                                                Петровна
                                                +7(495)
                                                560-55-00</span>
                                        </span>
                                    </div>
                                </div>
                                <button
                                    class="col-12 col-xxl-auto letter-spacing-3 blue-hover bold font-size-06 mt-3 mt-xxl-0 ms-xxl-auto text-start text-uppercase">
                                    подробнее
                                    о заказе
                                    <span class="blue fs-6">&gt;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 row mx-0 px-0 bg-white rounded mt-2">
                        <div class="row col-12 col-xl-auto order-1 px-4 py-4 py-xl-3 pe-xl-0 mx-0 align-items-center">
                            <span class="col col-xl-auto bold font-size-09 mx-0">
                                <span class="hide visible-xl bold font-size-09">транзакция </span>№ 365149/0</span>
                            <div class="col-auto d-flex ms-xl-4 align-items-center">
                                <span class="thin">сумма</span>
                                <span class="bold ms-2 font-size-09">600 &#8381;</span>
                            </div>
                        </div>
                        <div
                            class="splitted splitted-xl-none col-12 col-xl-6 px-4 py-3 order-3 order-xl-2 d-flex justify-content-xl-end align-items-center ms-xl-auto">
                            <div class="col row mx-0 d-flex align-items-center justify-content-xl-end me-xl-4 me-xll-5">
                                <div class="col-auto">
                                    <svg class="black opacity-15" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 48 48"
                                         height="20" width="20">
                                        <path
                                            d="M11.2 45.3q-2.6 0-4.425-1.8-1.825-1.8-1.825-4.45V32.1h6.7V3.5l3.15 3.15 3.15-3.15 3.1 3.15L24.2 3.5l3.1 3.15 3.15-3.15 3.1 3.15L36.7 3.5l3.15 3.15 3.2-3.15v35.55q0 2.65-1.825 4.45-1.825 1.8-4.425 1.8Zm25.6-4q1 0 1.625-.625t.625-1.625V9.6H15.6v22.5h18.95v6.95q0 1 .625 1.625t1.625.625ZM18.25 17.65v-3h11.5v3Zm0 6.7v-3h11.5v3Zm16.15-6.7q-.6 0-1.05-.45-.45-.45-.45-1.05 0-.6.45-1.05.45-.45 1.05-.45.6 0 1.05.45.45.45.45 1.05 0 .6-.45 1.05-.45.45-1.05.45Zm0 6.45q-.6 0-1.05-.45-.45-.45-.45-1.05 0-.6.45-1.05.45-.45 1.05-.45.6 0 1.05.45.45.45.45 1.05 0 .6-.45 1.05-.45.45-1.05.45ZM11.15 41.3H30.6v-5.2H8.95v2.95q0 1 .65 1.625t1.55.625Zm-2.2 0v-5.2 5.2Z"/>
                                    </svg>
                                </div>
                                <span class="col thin">26 сентября в 20:41</span>
                            </div>
                            <div class="col-auto mx-0 row align-items-center">
                                <span class="hide visible-md col-auto thin red pe-0">отклонено</span>
                                <div class="col d-flex align-items-center justify-content-center">
                                    <div
                                        class="bg-light rounded-circle round-icon d-flex align-items-center justify-content-center">
                                        <svg class="red" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 48 48"
                                             height="20" width="20">
                                            <path
                                                d="m12.45 38.35-2.8-2.8L21.2 24 9.65 12.45l2.8-2.8L24 21.2 35.55 9.65l2.8 2.8L26.8 24l11.55 11.55-2.8 2.8L24 26.8Z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="splitted col-12 px-0 mx-0 order-2 order-xl-3">
                            <div class="row mx-0 px-4 py-4 align-items-center">
                                <div class="col-auto row align-items-center mx-0">
                                    <div class="col-12 col-lg-auto row px-0 mx-0 align-items-center">
                                        <span class="col-auto thin font-size-08 px-0 mx-0">оплата за <span
                                            class="col-auto px-0 mx-0 position-relative regular blue blue-underline font-size-08">Некоторое
                                                название
                                                экскурсии</span>
                                        </span>
                                    </div>
                                    <div class="col-12 col-lg-auto px-0 mx-0 align-items-center">
                                        <span class="col-auto thin font-size-08 ms-lg-1 px-0 me-0">от <span
                                            class="col-auto px-0 mx-0 position-relative regular blue blue-underline font-size-08">Куницина
                                                Ирина
                                                Петровна
                                                +7(495)
                                                560-55-00</span>
                                        </span>
                                    </div>
                                </div>
                                <button
                                    class="col-12 col-xxl-auto letter-spacing-3 blue-hover bold font-size-06 mt-3 mt-xxl-0 ms-xxl-auto text-start text-uppercase">
                                    подробнее
                                    о заказе
                                    <span class="blue fs-6">&gt;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 row mx-0 px-0 bg-white rounded mt-2">
                        <div class="row col-12 col-xl-auto order-1 px-4 py-4 py-xl-3 pe-xl-0 mx-0 align-items-center">
                            <span class="col col-xl-auto bold font-size-09 mx-0">
                                <span class="hide visible-xl bold font-size-09">транзакция </span>№ 365149/0</span>
                            <div class="col-auto d-flex ms-xl-4 align-items-center">
                                <span class="thin">сумма</span>
                                <span class="bold ms-2 font-size-09">600 &#8381;</span>
                            </div>
                        </div>
                        <div
                            class="splitted splitted-xl-none col-12 col-xl-6 px-4 py-3 order-3 order-xl-2 d-flex justify-content-xl-end align-items-center ms-xl-auto">
                            <div class="col row mx-0 d-flex align-items-center justify-content-xl-end me-xl-4 me-xll-5">
                                <div class="col-auto">
                                    <svg class="black opacity-15" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 48 48"
                                         height="20" width="20">
                                        <path
                                            d="M11.2 45.3q-2.6 0-4.425-1.8-1.825-1.8-1.825-4.45V32.1h6.7V3.5l3.15 3.15 3.15-3.15 3.1 3.15L24.2 3.5l3.1 3.15 3.15-3.15 3.1 3.15L36.7 3.5l3.15 3.15 3.2-3.15v35.55q0 2.65-1.825 4.45-1.825 1.8-4.425 1.8Zm25.6-4q1 0 1.625-.625t.625-1.625V9.6H15.6v22.5h18.95v6.95q0 1 .625 1.625t1.625.625ZM18.25 17.65v-3h11.5v3Zm0 6.7v-3h11.5v3Zm16.15-6.7q-.6 0-1.05-.45-.45-.45-.45-1.05 0-.6.45-1.05.45-.45 1.05-.45.6 0 1.05.45.45.45.45 1.05 0 .6-.45 1.05-.45.45-1.05.45Zm0 6.45q-.6 0-1.05-.45-.45-.45-.45-1.05 0-.6.45-1.05.45-.45 1.05-.45.6 0 1.05.45.45.45.45 1.05 0 .6-.45 1.05-.45.45-1.05.45ZM11.15 41.3H30.6v-5.2H8.95v2.95q0 1 .65 1.625t1.55.625Zm-2.2 0v-5.2 5.2Z"/>
                                    </svg>
                                </div>
                                <span class="col thin">26 сентября в 20:41</span>
                            </div>
                            <div class="col-auto mx-0 row align-items-center">
                                <span class="hide visible-md col-auto thin green pe-0">оплачено</span>
                                <div class="col d-flex align-items-center justify-content-center">
                                    <div
                                        class="bg-light rounded-circle round-icon d-flex align-items-center justify-content-center">
                                        <svg class="green" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 48 48"
                                             height="20" width="20">
                                            <path d="M18.9 36.4 7 24.5l2.9-2.85 9 9L38.05 11.5l2.9 2.85Z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="splitted col-12 px-0 mx-0 order-2 order-xl-3">
                            <div class="row mx-0 px-4 py-4 align-items-center">
                                <div class="col-auto row align-items-center mx-0">
                                    <div class="col-12 col-lg-auto row px-0 mx-0 align-items-center">
                                        <span class="col-auto thin font-size-08 px-0 mx-0">оплата за <span
                                            class="col-auto px-0 mx-0 position-relative regular blue blue-underline font-size-08">Некоторое
                                                название
                                                экскурсии</span>
                                        </span>
                                    </div>
                                    <div class="col-12 col-lg-auto px-0 mx-0 align-items-center">
                                        <span class="col-auto thin font-size-08 ms-lg-1 px-0 me-0">от <span
                                            class="col-auto px-0 mx-0 position-relative regular blue blue-underline font-size-08">Куницина
                                                Ирина
                                                Петровна
                                                +7(495)
                                                560-55-00</span>
                                        </span>
                                    </div>
                                </div>
                                <button
                                    class="col-12 col-xxl-auto letter-spacing-3 blue-hover bold font-size-06 mt-3 mt-xxl-0 ms-xxl-auto text-start text-uppercase">
                                    подробнее
                                    о заказе
                                    <span class="blue fs-6">&gt;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--КАЛЕНДАРЬ (добавлено)-->
            <div id="calendar" class="calendar mt-4 col ">
                <div class="row row-cols-2 align-items-start mx-0">
                    <h2 class="col-12 lh-1 mb-4 bold px-0">Календарь</h2>
                    <div class="col-12 col-xl row mx-0 px-0 order-2 order-xl-1">
                        <div class="overflow-x-auto d-flex align-items-center mx-0 px-0 mt-5 mt-xl-0">
                            <button
                                class="button bg-white d-flex rounded px-4 justify-content-center align-items-center active semibold">
                                Сегодня
                            </button>
                            <button
                                class="button bg-white d-flex rounded ms-2 px-4 justify-content-center align-items-center semibold">
                                Ближайшие
                                даты
                            </button>
                            <button
                                class="button bg-white d-flex rounded ms-2 px-4 justify-content-center align-items-center semibold">
                                Выбранная
                                дата
                            </button>
                        </div>
                        <div class="col-12 col-xl mx-0 mt-3 mt-xl-0 px-0">
                            <div class="mt-4">
                                <span class="bold font-size-09">10 сентября</span>
                                <div
                                    class="row mx-0 p-4 mt-2 bg-white rounded d-flex justify-content-between align-items-center">
                                    <span class="col-12 font-size-09">Медовые водопады</span>
                                    <div class="col-12 row mx-0 px-0 mt-2">
                                        <span class="col-auto bold blue font-size-09">14 сентября в 14:00</span>
                                        <button
                                            class="col-12 col-sm-auto letter-spacing-3 blue-hover text-start text-uppercase bold font-size-07 mt-3 mt-sm-0 ms-sm-auto">
                                            подробнее
                                            <span class="blue fs-6">&gt;</span>
                                        </button>
                                    </div>
                                </div>
                                <div
                                    class="row mx-0 p-4 mt-2 bg-white rounded d-flex justify-content-between align-items-center">
                                    <span class="col-12 font-size-09">Медовые водопады</span>
                                    <div class="col-12 row mx-0 px-0 mt-2">
                                        <span class="col-auto bold blue font-size-09">14 сентября в 14:00</span>
                                        <button
                                            class="col-12 col-sm-auto letter-spacing-3 blue-hover text-start text-uppercase bold font-size-07 mt-3 mt-sm-0 ms-sm-auto">
                                            подробнее
                                            <span class="blue fs-6">&gt;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <span class="bold font-size-09">10 сентября</span>
                                <div
                                    class="row mx-0 p-4 mt-2 bg-white rounded d-flex justify-content-between align-items-center">
                                    <span class="col-12 font-size-09">Медовые водопады</span>
                                    <div class="col-12 row mx-0 px-0 mt-2">
                                        <span class="col-auto bold blue font-size-09">14 сентября в 14:00</span>
                                        <button
                                            class="col-12 col-sm-auto letter-spacing-3 blue-hover text-start text-uppercase bold font-size-07 mt-3 mt-sm-0 ms-sm-auto">
                                            подробнее
                                            <span class="blue fs-6">&gt;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <span class="bold font-size-09">10 сентября</span>
                                <div
                                    class="row mx-0 p-4 mt-2 bg-white rounded d-flex justify-content-between align-items-center">
                                    <span class="col-12 font-size-09">Медовые водопады</span>
                                    <div class="col-12 row mx-0 px-0 mt-2">
                                        <span class="col-auto bold blue font-size-09">14 сентября в 14:00</span>
                                        <button
                                            class="col-12 col-sm-auto letter-spacing-3 blue-hover text-start text-uppercase bold font-size-07 mt-3 mt-sm-0 ms-sm-auto">
                                            подробнее
                                            <span class="blue fs-6">&gt;</span>
                                        </button>
                                    </div>
                                </div>
                                <div
                                    class="row mx-0 p-4 mt-2 bg-white rounded d-flex justify-content-between align-items-center">
                                    <span class="col-12 font-size-09">Медовые водопады</span>
                                    <div class="col-12 row mx-0 px-0 mt-2">
                                        <span class="col-auto bold blue font-size-09">14 сентября в 14:00</span>
                                        <button
                                            class="col-12 col-sm-auto letter-spacing-3 blue-hover text-start text-uppercase bold font-size-07 mt-3 mt-sm-0 ms-sm-auto">
                                            подробнее
                                            <span class="blue fs-6">&gt;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button class="button col-12 px-4 mt-5 active rounded shadow-none">
                                <span class="bold">Показать ещё</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                                    <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="col-12 col-xl row d-flex mx-0 px-0 ps-xl-5 order-1 order-xl-2">
                        <div
                            class="calendar__head col-12 button bg-white rounded d-flex p-1 justify-content-between align-items-center">
                            <div
                                class="calendar__left round-icon rounded d-flex align-items-center justify-content-center bg-light-blue fs-4">
                                &lt;
                            </div>
                            <span class="bold font-size-09">Сентябрь 2022</span>
                            <div
                                class="calendar__right round-icon rounded d-flex align-items-center justify-content-center bg-light-blue fs-4">
                                &gt;
                            </div>
                        </div>
                        <div class="calendar__body col-12 bg-white rounded px-3 px-md-4 mt-2">
                            <div class="calendar__days-of-week row mx-0 py-3 text-center gap-2">
                                <span
                                    class="calendar__day-of-week cell d-flex align-items-center justify-content-center">пн</span>
                                <span
                                    class="calendar__day-of-week cell d-flex align-items-center justify-content-center">вт</span>
                                <span
                                    class="calendar__day-of-week cell d-flex align-items-center justify-content-center">ср</span>
                                <span
                                    class="calendar__day-of-week cell d-flex align-items-center justify-content-center">чт</span>
                                <span
                                    class="calendar__day-of-week cell d-flex align-items-center justify-content-center">пт</span>
                                <span
                                    class="calendar__day-of-week cell d-flex align-items-center justify-content-center">сб</span>
                                <span
                                    class="calendar__day-of-week cell d-flex align-items-center justify-content-center">вс</span>
                            </div>
                            <div class="calendar__days row mx-0 py-4 text-center splitted gap-2">
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center opacity-15">27</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center opacity-15">28</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center opacity-15">29</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center opacity-15">30</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center opacity-15">31</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center">1</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center">2</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center">3</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center">4</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center">5</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center">6</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center">7</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center bg-light">8</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center">9</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center active">10</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center">11</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center">12</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center">13</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center bg-light-blue">14</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center">15</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center">16</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center">17</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center bg-light-blue">18</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center">19</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center">20</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center bg-light-blue">21</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center">22</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center">23</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center">24</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center">25</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center">26</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center">27</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center">28</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center bg-light-blue">29</span>
                                <span
                                    class="calendar__day cell fs-6 bold rounded d-flex align-items-center justify-content-center">30</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--НАСТРОЙКИ (добавлено)-->
            <div id="settings" class="settings mt-5 mt-lg-0 col ">
                <div class="row mx-0 px-0">
                    <h2 class="lh-1 mb-4 bold px-0">Настройка профиля гида</h2>
                    <button
                        class="col-auto hide visible-lg letter-spacing-3 blue-hover text-uppercase bold px-0 font-size-07 ms-auto">
                        смотреть
                        профиль
                        <span class="blue fs-6">&gt;</span>
                    </button>
                </div>
                <div class="mb-4 row mx-0 position-relative">
                    <span class="thin mb-2 col-12 px-0">ваше имя фамилия или название организации</span>
                    <div class="col-12 bg-white rounded mx-0 px-0 pe-2rem d-flex align-items-center">
                        <input type="text" name="settings-name" placeholder="Николаев Артем"
                               class="d-flex flex-grow-1 ps-2rem py-4 rounded border-0 font-size-09">
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 48 48" height="20" width="20">
                            <path
                                d="M24 23.8q-3.45 0-5.625-2.175T16.2 16q0-3.45 2.175-5.625T24 8.2q3.45 0 5.625 2.175T31.8 16q0 3.45-2.175 5.625T24 23.8ZM7.7 40.45v-5q0-2 1-3.425 1-1.425 2.55-2.175 3.4-1.5 6.5-2.25t6.25-.75q3.15 0 6.225.775Q33.3 28.4 36.7 29.9q1.6.7 2.6 2.125t1 3.425v5Zm3.4-3.4h25.8V35.5q0-.8-.475-1.525-.475-.725-1.175-1.075-3.15-1.5-5.775-2.075Q26.85 30.25 24 30.25q-2.85 0-5.525.575Q15.8 31.4 12.7 32.9q-.7.35-1.15 1.075-.45.725-.45 1.525ZM24 20.4q1.9 0 3.15-1.25T28.4 16q0-1.9-1.25-3.15T24 11.6q-1.9 0-3.15 1.25T19.6 16q0 1.9 1.25 3.15T24 20.4Zm0-4.4Zm0 21.05Z"/>
                        </svg>
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
                    <textarea name="add-obj-description" cols="30" rows="12"
                              class="col-12 px-2rem py-4 rounded border-0 font-size-09"></textarea>
                </div>
                <div class="mb-4 row mx-0">
                    <span class="thin position-relative mb-2 col-12 px-0">добавьте фото <svg
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

            <!--МОИ ДОКУМЕНТЫ (добавлено)-->
            <div id="settings" class="settings col ">
                <h2 class="lh-1 mb-5 mt-5 mt-lg-0 bold">Мои документы</h2>
                <div class="col-12 row bg-white rounded px-3 py-4 mx-0 mb-2 d-flex">
                    <div class="col-12 col-lg row align-items-center">
                        <svg class="col-auto" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 48 48" height="20"
                             width="20">
                            <path
                                d="M14 33.9h13.75v-3H14Zm0-8.4h20.05v-3H14Zm0-8.45h20.05v-3H14ZM9.25 42.7q-1.6 0-2.775-1.175Q5.3 40.35 5.3 38.75V9.25q0-1.65 1.175-2.825Q7.65 5.25 9.25 5.25h29.5q1.65 0 2.825 1.175Q42.75 7.6 42.75 9.25v29.5q0 1.6-1.175 2.775Q40.4 42.7 38.75 42.7Zm0-3.95h29.5V9.25H9.25v29.5Zm0-29.5v29.5-29.5Z"/>
                        </svg>
                        <span class="col font-size-09 px-0">Свидетельство о регистрации индивидуального
                            предпринимателя.pdf</span>
                        <span class="col-auto opacity-40 thin font-size-08">34.08kb</span>
                    </div>
                    <div
                        class="col-auto row mt-3 mt-lg-0 align-items-center justify-content-between justify-content-lg-start">
                        <button class="col-auto"><span
                            class="font-size-08 position-relative black-underline">Открыть</span></button>
                        <button class="col-auto ms-auto"><span
                            class="font-size-08 position-relative red red-underline">Удалить</span></button>
                    </div>
                </div>
                <div class="col-12 row bg-white rounded px-3 py-4 mx-0 mb-2 d-flex">
                    <div class="col-12 col-lg row align-items-center">
                        <svg class="col-auto" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 48 48" height="20"
                             width="20">
                            <path
                                d="M14 33.9h13.75v-3H14Zm0-8.4h20.05v-3H14Zm0-8.45h20.05v-3H14ZM9.25 42.7q-1.6 0-2.775-1.175Q5.3 40.35 5.3 38.75V9.25q0-1.65 1.175-2.825Q7.65 5.25 9.25 5.25h29.5q1.65 0 2.825 1.175Q42.75 7.6 42.75 9.25v29.5q0 1.6-1.175 2.775Q40.4 42.7 38.75 42.7Zm0-3.95h29.5V9.25H9.25v29.5Zm0-29.5v29.5-29.5Z"/>
                        </svg>
                        <span class="col font-size-09 px-0">Свидетельство о регистрации индивидуального
                            предпринимателя.pdf</span>
                        <span class="col-auto opacity-40 thin font-size-08">34.08kb</span>
                    </div>
                    <div
                        class="col-auto row mt-3 mt-lg-0 align-items-center justify-content-between justify-content-lg-start">
                        <button class="col-auto"><span
                            class="font-size-08 position-relative black-underline">Открыть</span></button>
                        <button class="col-auto"><span
                            class="font-size-08 position-relative red red-underline">Удалить</span></button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
<script>
import Breadcrumbs from "@/components/Fragments/Breadcrumbs.vue";
import AddTour from "@/components/Tours/AddTour.vue";

export default {
    components: {AddTour, Breadcrumbs},
    data() {
        return {
            visible: false,
            mobileMenuActive: {
                title: "Мои экскурсии",
                svg: '          <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"\n' +
                    '                         viewBox="0 0 40 40">\n' +
                    '                        <path\n' +
                    '                            d="M14.35 44.25q-1.5 0-2.55-1.05-1.05-1.05-1.05-2.55 0-1.5 1.05-2.55 1.05-1.05 2.55-1.05 1.5 0 2.55 1.075 1.05 1.075 1.05 2.525 0 1.5-1.05 2.55-1.05 1.05-2.55 1.05Zm20 0q-1.5 0-2.55-1.05-1.05-1.05-1.05-2.55 0-1.5 1.05-2.55 1.05-1.05 2.55-1.05 1.5 0 2.55 1.075 1.05 1.075 1.05 2.525 0 1.5-1.05 2.55-1.05 1.05-2.55 1.05Zm-22.05-33 5 10.45h14.3l5.7-10.45Zm-1.85-3.6H39.1q1.5 0 2.3 1.35.8 1.35 0 2.75L35.15 23.1q-.6 1-1.525 1.625-.925.625-2.125.625H16.55l-2.6 4.9h24.3v3.6h-24.4q-2.35 0-3.35-1.575t.05-3.425l3.15-5.75L6.25 7.3h-4V3.7H8.6ZM17.3 21.7h14.3Z"/>\n' +
                    '                    </svg>'
            },
            mobileMenu: [
                {
                    title: "Мои объекты",
                    svg: '          <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"\n' +
                        '                         viewBox="0 0 40 40">\n' +
                        '                        <path\n' +
                        '                            d="M14.35 44.25q-1.5 0-2.55-1.05-1.05-1.05-1.05-2.55 0-1.5 1.05-2.55 1.05-1.05 2.55-1.05 1.5 0 2.55 1.075 1.05 1.075 1.05 2.525 0 1.5-1.05 2.55-1.05 1.05-2.55 1.05Zm20 0q-1.5 0-2.55-1.05-1.05-1.05-1.05-2.55 0-1.5 1.05-2.55 1.05-1.05 2.55-1.05 1.5 0 2.55 1.075 1.05 1.075 1.05 2.525 0 1.5-1.05 2.55-1.05 1.05-2.55 1.05Zm-22.05-33 5 10.45h14.3l5.7-10.45Zm-1.85-3.6H39.1q1.5 0 2.3 1.35.8 1.35 0 2.75L35.15 23.1q-.6 1-1.525 1.625-.925.625-2.125.625H16.55l-2.6 4.9h24.3v3.6h-24.4q-2.35 0-3.35-1.575t.05-3.425l3.15-5.75L6.25 7.3h-4V3.7H8.6ZM17.3 21.7h14.3Z"/>\n' +
                        '                    </svg>'
                },
                {
                    title: "Мои транзакции",
                    svg: '    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"\n' +
                        '                         viewBox="0 0 44 44">\n' +
                        '                        <path\n' +
                        '                            d="M32.6 27.2q1.25 0 2.225-.975.975-.975.975-2.275 0-1.25-.975-2.2-.975-.95-2.225-.95t-2.225.95q-.975.95-.975 2.2 0 1.3.975 2.275.975.975 2.225.975ZM9.25 36.1v2.65-29.5V36.1Zm0 6.6q-1.55 0-2.75-1.175T5.3 38.75V9.25q0-1.6 1.2-2.8 1.2-1.2 2.75-1.2h29.5q1.65 0 2.825 1.2 1.175 1.2 1.175 2.8v6.45h-4V9.25H9.25v29.5h29.5v-6.4h4v6.4q0 1.6-1.175 2.775Q40.4 42.7 38.75 42.7Zm17.7-9.35q-1.65 0-2.7-1.025Q23.2 31.3 23.2 29.7V18.4q0-1.65 1.05-2.675t2.7-1.025H41.1q1.7 0 2.725 1.025Q44.85 16.75 44.85 18.4v11.3q0 1.6-1.025 2.625T41.1 33.35Zm14.9-3V17.7H26.2v12.65Z"/>\n' +
                        '                    </svg>'
                },
                {
                    title: "Календарь",
                    svg: '       <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"\n' +
                        '                         viewBox="0 0 44 44">\n' +
                        '                        <path\n' +
                        '                            d="M3.3 44.7V7.25q0-1.6 1.175-2.8 1.175-1.2 2.775-1.2h33.5q1.6 0 2.8 1.2 1.2 1.2 1.2 2.8v25.5q0 1.55-1.2 2.75t-2.8 1.2H11.3Zm3.95-8.95 3-3h30.5V7.25H7.25Zm0-28.5v28.5Z"/>\n' +
                        '                    </svg>'
                },
                {
                    title: "Настройка профиля гида",
                    svg: '        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"\n' +
                        '                         viewBox="0 0 44 44">\n' +
                        '                        <path\n' +
                        '                            d="m18.8 44.7-1.05-6.5q-.8-.3-1.725-.825-.925-.525-1.575-1.075l-6.1 2.85-5.3-9.4 5.6-4.05q-.1-.35-.125-.85-.025-.5-.025-.85t.025-.85q.025-.5.125-.85l-5.6-4.1 5.3-9.3 6.15 2.8q.65-.55 1.55-1.05t1.7-.75l1.05-6.65h10.4l1.05 6.6q.8.3 1.725.775.925.475 1.575 1.075l6.1-2.8 5.3 9.3-5.6 4q.05.4.1.9t.05.9q0 .4-.05.875t-.1.875l5.6 4-5.3 9.4-6.15-2.85q-.65.55-1.525 1.1-.875.55-1.725.8l-1.05 6.5Zm5.15-14.2q2.7 0 4.6-1.9 1.9-1.9 1.9-4.6 0-2.7-1.9-4.6-1.9-1.9-4.6-1.9-2.7 0-4.6 1.9-1.9 1.9-1.9 4.6 0 2.7 1.9 4.6 1.9 1.9 4.6 1.9Zm0-3q-1.5 0-2.5-1.025t-1-2.475q0-1.45 1-2.475 1-1.025 2.5-1.025 1.45 0 2.475 1.025Q27.45 22.55 27.45 24q0 1.45-1.025 2.475Q25.4 27.5 23.95 27.5ZM24 24Zm-1.95 16.75h3.9l.7-5.6q1.7-.4 3.225-1.25 1.525-.85 2.725-2.1l5.3 2.3 1.75-3.25-4.65-3.4q.2-.85.325-1.7T35.45 24q0-.9-.1-1.75t-.35-1.7l4.65-3.4-1.75-3.25-5.3 2.3q-1.15-1.35-2.65-2.275-1.5-.925-3.3-1.125l-.7-5.55h-3.9l-.7 5.55q-1.75.3-3.275 1.2-1.525.9-2.725 2.2l-5.25-2.3-1.75 3.25 4.6 3.35q-.2.9-.325 1.75T12.5 24q0 .9.125 1.775.125.875.325 1.725l-4.6 3.35 1.75 3.25 5.25-2.3q1.25 1.25 2.775 2.125T21.35 35.2Z"/>\n' +
                        '                    </svg>'
                },
            ],
            breadcrumbs: [
                {
                    text: "Главная",
                    href: "/",
                },
                {
                    text: "Кабинет гида",
                    active: true,
                }],
            activeTitle: 'Мои экскурсии',
        }
    },
    methods: {
        toggle() {
            this.visible = !this.visible;
            this.setBodyClass()
        },
        mobileMenuItem(item) {
            this.mobileMenuActive.title = item.title;
            this.mobileMenuActive.svg = item.svg;
        },
        changeActiveTitle(title) {
            this.activeTitle = title;
        }
    }
}
</script>
