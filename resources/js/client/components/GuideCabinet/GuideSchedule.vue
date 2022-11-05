<template>
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
</template>
