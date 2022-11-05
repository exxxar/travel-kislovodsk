<template>
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
</template>
