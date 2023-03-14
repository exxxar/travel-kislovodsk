<template>
    <div id="add-excursion" class="add-excursion col ">

        <div class="row align-items-center mx-0 mb-3 mb-lg-5 mt-4">
            <button @click="$emit('hideAddExcursion')"
                    class="personal-account-nav__link_active button col-auto px-2rem active rounded shadow-none bold">
                <span class="fs-6 me-1">&lt;</span>Назад
            </button>
            <h1 class="col-12 col-lg-auto bold fs-2 ms-lg-3 mt-5 mt-lg-0 px-0">Добавление новой экскурсии</h1>
        </div>

        <div class="row align-items-center mx-0 mb-3 mb-lg-5 mt-4">
            <div class="col-12">
                <input type="checkbox" v-model="generate_test_data" id="add-exc-accept-mark">
                <label for="add-exc-accept-mark"
                       class="align-items-center checkbox position-relative row  mb-2">
                    <div
                        class="col-auto custom-checkbox rounded bg-white d-flex align-items-center justify-content-center">
                        <div class="col-auto custom-checkbox dot"></div>
                    </div>
                    <span class="col-auto thin ms-2 px-0">Заполнить проверочными данными в качестве примера</span>
                </label>
            </div>
        </div>
        <form v-on:submit.prevent="submitTour">
            <div class="row">
                <div class="col-12">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseOne">
                                    Основные данные
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                 aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <div class="mb-3 row mx-0">
                        <span class="dt-label-input thin position-relative mb-2 col-12 px-0">название экскурсии
                           <i class="fa-regular fa-circle-question dt-text-muted&#45;&#45;white-50"></i>
                        </span>
                                        <input type="text" name="add-exc-name"
                                               v-model="tour.title"
                                               placeholder="Начни что-то писать..."
                                               class="col-12 px-2rem py-4 rounded font-size-09" required/>
                                    </div>
                                    <div class="mb-3 row mx-0">
                        <span class="dt-label-input thin position-relative mb-2 col-12 px-0">продающее короткое описание
                            <i class="fa-regular fa-circle-question dt-text-muted&#45;&#45;white-50"></i>
                        </span>
                                        <textarea name="add-exc-description" cols="30" rows="7"
                                                  v-model="tour.short_description"
                                                  placeholder="Начни что-то писать..."
                                                  class="col-12 px-2rem py-4 rounded font-size-09" required>
                    </textarea>
                                    </div>

                                    <div class="mb-3 row mx-0">
                        <span class="dt-label-input thin position-relative mb-2 col-12 px-0">описание
                            <i class="fa-regular fa-circle-question dt-text-muted&#45;&#45;white-50"></i>
                        </span>
                                        <textarea name="add-exc-description" cols="30" rows="15"
                                                  v-model="tour.description"
                                                  placeholder="Начни что-то писать..."
                                                  class="col-12 px-2rem py-4 rounded font-size-09" required></textarea>
                                    </div>


                                    <div class="mb-3 row mx-0">
                        <span class="dt-label-input thin position-relative mb-1 col-12 px-0">выберите категории
                            <i class="fa-regular fa-circle-question dt-text-muted&#45;&#45;white-50"></i>
                        </span>
                                        <div
                                            class="d-flex flex-lg-wrap flex-nowrap gap-1 mx-0 overflow overflow-auto px-0 row row-cols-auto"
                                            v-if="categories.length">
                                            <label :for="'category-tour'+category.id"
                                                   class="align-items-center checkbox px-0 mx-0 mt-1 mb-3 mb-lg-0"
                                                   v-for="category in categories">
                                                <input type="checkbox" :id="'category-tour'+category.id"
                                                       :value="category.id"
                                                       v-model="tour.categories">
                                                <span class="semibold category bg-white px-4 py-3 rounded">{{
                                                        category.title
                                                    }}</span>
                                            </label>
                                        </div>

                                    </div>

                                    <div class="row mx-0 justify-content-between">
                                        <div class="col-12 col-lg row mb-3 mx-0 px-0 pe-lg-3">
                            <span class="dt-label-input thin position-relative mb-2 col-12 px-0">тип экскурсии
                                <i class="fa-regular fa-circle-question dt-text-muted white-50"></i>
                            </span>
                                            <div class="dropdown dropdown-border position-relative bg-white rounded p-0"
                                                 v-if="tour_types.length>0">
                                                <button type="button"
                                                        class="big-button col-11 ps-2rem dropdown-toggle text-start font-size-09"
                                                        data-bs-toggle="dropdown"> {{
                                                        getTourTypeById(tour.tour_type_id).title || 'Не выбрано'
                                                    }}
                                                </button>
                                                <ul class="dropdown-menu col-12 flex-grow-1  px-2rem pb-3 pt-0 rounded font-size-09">
                                                    <li @click="tour.tour_type_id=item.id"
                                                        v-for="item in tour_types">
                                                        <a class="dropdown-item w-100 mt-3 p-0 font-size-09">
                                                            {{ item.title }}
                                                        </a>
                                                    </li>
                                                </ul>
                                                <svg class="h-100 expand-icon" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 48 48"
                                                     height="20" width="20">
                                                    <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg row mb-3 mx-0 px-0">
                            <span class="dt-label-input thin position-relative mb-2 col-12 px-0">передвижение
                                <i class="fa-regular fa-circle-question dt-text-muted&#45;&#45;white-50"></i>
                            </span>
                                            <div
                                                class="dropdown dropdown-border position-relative bg-white rounded p-0">
                                                <button type="button"
                                                        class="big-button col-11 ps-2rem dropdown-toggle text-start font-size-09"
                                                        data-bs-toggle="dropdown">
                                                    {{
                                                        getMovementTypeById(tour.movement_type_id).title || 'Не выбрано'
                                                    }}
                                                </button>
                                                <ul class="dropdown-menu col-12 flex-grow-1  px-2rem pb-3 pt-0 rounded font-size-09">
                                                    <li @click="tour.movement_type_id=item.id"
                                                        v-for="item in movements"><a
                                                        class="dropdown-item w-100 mt-3 p-0 font-size-09">
                                                        {{ item.title }} </a>
                                                    </li>

                                                </ul>
                                                <svg class="h-100 expand-icon" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 48 48"
                                                     height="20" width="20">
                                                    <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                                                </svg>
                                            </div>
                                        </div>

                                        <div v-if="getSelectedTourType().slug==='group_tour_type'"
                                             class="col-12 row mx-0 px-0">
                                            <div class="col-6 d-flex flex-column mx-0 px-0 pe-lg-3">
                            <span class="dt-label-input thin position-relative mb-2 col-12 px-0">Минимальный размер группы
                                <i class="fa-regular fa-circle-question dt-text-muted&#45;&#45;white-50"></i>
                            </span>
                                                <input type="number" min="0" max="100" v-model="tour.min_group_size"
                                                       class="form-control w-100  ps-2rem">
                                            </div>
                                            <div class="col-6 d-flex flex-column p-0">
                            <span class="dt-label-input thin position-relative mb-2 col-12 px-0">Максимальный размер группы
                                <i class="fa-regular fa-circle-question dt-text-muted&#45;&#45;white-50"></i>
                            </span>
                                                <input type="number" name="add-exc-included-input"
                                                       v-model="tour.max_group_size"
                                                       min="0" max="100" class="form-control w-100  ps-2rem">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mx-0">
                                        <div class="col-12 col-lg-8 row mx-0 px-0 mb-3">
                            <span class="dt-label-input thin position-relative mb-2 col-12 px-0">длительность экскурсии
                                <i class="fa-regular fa-circle-question dt-text-muted&#45;&#45;white-50"></i>
                            </span>
                                            <div
                                                class="dropdown dropdown-border col-12 position-relative mx-0 px-0 bg-white pe-2rem rounded ">
                                                <button type="button"
                                                        class="big-button col-11 ps-2rem dropdown-toggle text-start font-size-09 w-100"
                                                        data-bs-toggle="dropdown">
                                                    {{ getDurationById(tour.duration_type_id).title || 'Не выбрано' }}
                                                </button>
                                                <ul
                                                    class="dropdown-menu col-12 flex-grow-1 px-2rem pb-3 pt-0 rounded font-size-09">
                                                    <li v-for="item in durations"
                                                        @click="tour.duration_type_id = item.id"><a
                                                        class="dropdown-item w-100 mt-3 p-0 font-size-09"> {{
                                                            item.title
                                                        }} </a>
                                                    </li>

                                                </ul>
                                                <svg class="h-100 expand-icon" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 48 48"
                                                     height="20" width="20">
                                                    <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                                                </svg>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-4 row mx-0 px-0 ps-lg-3 mb-3">
                            <span class="dt-label-input thin position-relative mb-2 col-12 px-0">длительность экскурсии текстом
                                <i class="fa-regular fa-circle-question dt-text-muted&#45;&#45;white-50"></i>
                            </span>

                                            <input type="text" name="add-exc-name"
                                                   v-model="tour.duration"
                                                   placeholder="12 ч."
                                                   class="col-12 px-2rem py-4 rounded font-size-09" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseTwo">
                                    Фотографии к туру
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                                 aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body">
                                    <div class="mb-3 row mx-0">
                                        <div class="col-12 col-lg-12 px-0">
                            <span class="dt-label-input thin position-relative mb-2 col-auto px-0">добавить титульное фото
                                <i class="fa-regular fa-circle-question dt-text-muted&#45;&#45;white-50"></i>
                            </span>
                                            <div class="col-12 col-lg-auto mt-1 mx-0 d-flex">
                                                <label for="preview_photo" class="dt-preview-block photo-loader ml-2"
                                                       v-if="preview_photo===null">
                                                    <i class="fa-solid fa-plus blue"></i>
                                                    <input type="file" id="preview_photo" accept="image/*"
                                                           @change="onChangePreview"
                                                           style="display:none;"/>
                                                </label>

                                                <div
                                                    class=" d-flex flex-column align-items-center justify-content-center"
                                                    v-if="preview_photo!==null">
                                                    <div class="dt-preview-block h-100">
                                                        <img class="rounded" v-lazy="preparePreviewImage" alt="">
                                                    </div>

                                                    <a class="btn btn-link dt-text&#45;&#45;regular"
                                                       @click="preview_photo = null"
                                                       style="font-size: 12px">Сбросить</a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-12 mt-4 px-0">
                            <span class="dt-label-input thin position-relative mb-2 col-auto px-0">добавьте фото (минимум 5)
                                <i class="fa-regular fa-circle-question dt-text-muted&#45;&#45;white-50"></i>
                            </span>
                                            <a style="margin-left:10px;" v-if="photos.length>0" @click="resetImages"
                                               class="btn btn-link thin position-relative mb-0 mb-lg-2 col-auto px-0 dt-text&#45;&#45;regular">Сбросить
                                                <i class="fa-solid fa-trash-can blue"></i>
                                            </a>

                                            <div class="col-auto mt-1 d-flex">


                                                <div class="photo-preview d-flex justify-content-start flex-wrap w-100">
                                                    <label for="photos" style="margin-right: 10px;"
                                                           class="photo-loader ml-2">
                                                        <i class="fa-solid fa-plus blue"></i>
                                                        <input type="file" id="photos" multiple accept="image/*"
                                                               @change="onChangePhotos"
                                                               style="display:none;"/>

                                                    </label>
                                                    <div class="mb-2 img-preview" style="margin-right: 10px;"
                                                         v-for="img in items"
                                                         v-if="items.length>0">
                                                        <img v-lazy="img.imageUrl">
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseThree">
                                    Указание стартовой локации
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                                 aria-labelledby="panelsStayOpen-headingThree">
                                <div class="accordion-body">
                                    <div class="mb-3 row mx-0 justify-content-between">
                                        <div class="col-12 col-lg-12 row mx-0 px-0">
                                            <input type="checkbox"
                                                   v-model="tour.comfort_loading"
                                                   id="add-exc-description-mark">
                                            <label for="add-exc-description-mark"
                                                   class="align-items-center col-12 col-md-auto checkbox position-relative row mx-0 px-0">
                                                <div
                                                    class="col-auto custom-checkbox rounded bg-white d-flex align-items-center justify-content-center">
                                                    <div class="col-auto custom-checkbox dot">
                                                    </div>
                                                </div>
                                                <span
                                                    class="dt-label-input col-auto thin ms-1">Забираем сами с адреса</span>
                                            </label>
                                        </div>

                                    </div>

                                    <div class="row mx-0 justify-content-between" v-if="!tour.comfort_loading">


                                        <div class="col-12 col-lg-8 row mx-0 px-0 mb-3">
                            <span class="dt-label-input thin position-relative mb-2 col-12 px-0">город отправления
                                <i class="fa-regular fa-circle-question dt-text-muted&#45;&#45;white-50"></i>
                            </span>
                                            <div class="col-12 position-relative mx-0 px-0 rounded">
                                                <input type="text" name="add-exc-name" v-model="tour.start_city"
                                                       placeholder="г. Ставрополь"
                                                       class="col-12 px-2rem py-4 rounded  font-size-09" required/>
                                                <svg class="h-100 expand-icon" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 48 48"
                                                     height="20" width="20">
                                                    <path
                                                        d="M24 23.65q1.5 0 2.575-1.075Q27.65 21.5 27.65 20q0-1.5-1.075-2.575Q25.5 16.35 24 16.35q-1.5 0-2.575 1.075Q20.35 18.5 20.35 20q0 1.5 1.075 2.575Q22.5 23.65 24 23.65Zm0 15.75q6.4-5.85 9.45-10.625Q36.5 24 36.5 20.4q0-5.7-3.625-9.3Q29.25 7.5 24 7.5t-8.875 3.6Q11.5 14.7 11.5 20.4q0 3.6 3.125 8.35T24 39.4Zm0 5.2q-8.3-7.05-12.4-13.075Q7.5 25.5 7.5 20.4q0-7.7 4.975-12.3Q17.45 3.5 24 3.5q6.55 0 11.525 4.6Q40.5 12.7 40.5 20.4q0 5.1-4.1 11.125T24 44.6Zm0-24.2Z"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 row mx-0 px-0 ps-lg-3 mb-3">
                            <span class="dt-label-input thin position-relative mb-2 col-12 px-0">Адрес отправления
                                <i class="fa-regular fa-circle-question dt-text-muted&#45;&#45;white-50"></i>
                            </span>
                                            <div class="col-12 position-relative mx-0 px-0  rounded">
                                                <input type="text" name="add-exc-name" v-model="tour.start_address"
                                                       placeholder="ул. Ленина, 24"
                                                       class="col-12 px-2rem py-4 rounded  font-size-09" required/>
                                                <svg class="h-100 expand-icon" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 48 48"
                                                     height="20" width="20">
                                                    <path
                                                        d="M24 23.65q1.5 0 2.575-1.075Q27.65 21.5 27.65 20q0-1.5-1.075-2.575Q25.5 16.35 24 16.35q-1.5 0-2.575 1.075Q20.35 18.5 20.35 20q0 1.5 1.075 2.575Q22.5 23.65 24 23.65Zm0 15.75q6.4-5.85 9.45-10.625Q36.5 24 36.5 20.4q0-5.7-3.625-9.3Q29.25 7.5 24 7.5t-8.875 3.6Q11.5 14.7 11.5 20.4q0 3.6 3.125 8.35T24 39.4Zm0 5.2q-8.3-7.05-12.4-13.075Q7.5 25.5 7.5 20.4q0-7.7 4.975-12.3Q17.45 3.5 24 3.5q6.55 0 11.525 4.6Q40.5 12.7 40.5 20.4q0 5.1-4.1 11.125T24 44.6Zm0-24.2Z"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-12 row mx-0 px-0 mb-3">
                            <span class="dt-label-input thin position-relative mb-2 col-12 px-0">
                                Текущие координаты
                                <small>{{ tour.start_latitude }}</small>, <small>{{ tour.start_longitude }}</small>
                                <i class="fa-regular fa-circle-question dt-text-muted&#45;&#45;white-50"></i>
                            </span>
                                            <div class="col-12 position-relative mx-0 px-0 border rounded text-center align-items-center
                            d-flex justify-content-center" style="height: 50px">
                                                <a class="btn btn-link dt-text&#45;&#45;regular" data-bs-toggle="modal"
                                                   data-bs-target="#map-select-start-coords">Укажите точку на карте</a>
                                            </div>
                                            <selected-map-modal-dialog-component id="map-select-start-coords"
                                                                                 v-on:coords="selectCoords"/>
                                        </div>
                                    </div>

                                    <div class="mb-3 row mx-0">
                        <span class="dt-label-input thin position-relative mb-2 col-12 px-0">Пояснение к стартовой локации
                            <i class="fa-regular fa-circle-question dt-text-muted&#45;&#45;white-50"></i>
                        </span>
                                        <textarea name="add-exc-description" cols="30" rows="15"
                                                  v-model="tour.start_comment"
                                                  class="col-12 px-2rem py-4 rounded  font-size-09"></textarea>
                                    </div>


                                </div>
                            </div>
                        </div>


                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseFour">
                                    Составление маршрута
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse"
                                 aria-labelledby="panelsStayOpen-headingFour">
                                <div class="accordion-body">
                                    <div class="col-12 position-relative mx-0 px-0 border rounded text-center align-items-center
                                d-flex justify-content-center mb-3" style="height: 50px">
                                        <a class="btn btn-link dt-text--regular" @click="openAddTourObjectWindow">
                                            Добавить новый туристический объект
                                        </a>
                                    </div>


                                    <div class="row mx-0">
                                        <div class="col-12 mx-0 px-0 mt-1 mb-1"
                                             v-if="tour.tour_objects.length>0"
                                             v-for="(id, index) in tour.tour_objects">
                                            <div class="card"  v-if="getTourObjectById(id)">
                                                <div class="card-body">
                                                    <h3>Точка маршрута № {{ index + 1 }}</h3>
                                                    <div class="row tour-object-list-item">
                                                        <div class="col-md-10 mt-2 mb-2">
                                                            <div class="row flex-nowrap overflow-auto pb-3">
                                                                <div class="col-lg-2 col-md-3 col-sm-4 col-6"

                                                                     v-for="img in getTourObjectById(id).photos">
                                                                    <img v-lazy="img" class="w-100 rounded m-0" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-11 d-flex flex-wrap">
                                                                    <p class="object__title text-wrap mb-2">{{
                                                                            getTourObjectById(id).title
                                                                        }}</p>
                                                                    <p class="object__description text-wrap">
                                                                        {{ getTourObjectById(id).city }}
                                                                        {{ getTourObjectById(id).address }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-md-2 d-flex align-items-start justify-content-center">
                                                            <a @click="removeTourObject(index)"
                                                               class="btn btn-danger w-100">
                                                                <i class="fa-solid fa-trash-can text-white"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-12 mx-0 px-0 mt-1 mb-1" v-else>
                                            <h3> На текущий момент вы не выбрали ни одного туристического объекта</h3>
                                        </div>

                                        <div class="col-12 mx-0 px-0 mt-3 mb-3">
                                            <div class="dropdown w-100">
                                                <button class="btn btn-primary p-3 dropdown-toggle" type="button"
                                                        id="dropdownMenuButton1"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                    Выбор туристического объекта
                                                </button>
                                                <ul style="overflow-y: scroll; height: 360px;"
                                                    class="dropdown-menu tour-object-list-item w-100"
                                                    aria-labelledby="dropdownMenuButton1">
                                                    <li @click="addTourObject(item)"
                                                        v-for="item in filteredTourObjects">

                                                        <div class="dropdown-item">

                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div
                                                                        class="row mb-2 flex-nowrap overflow-auto pb-3">
                                                                        <div class="col-lg-2 col-md-3 col-sm-4 col-6"
                                                                             v-for="img in item.photos">
                                                                            <img v-lazy="img" class="w-100 m-0 rounded"
                                                                                 alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <p class="object__title text-wrap mb-2">
                                                                                {{ item.title }}</p>
                                                                            <p class="object__description text-wrap">
                                                                                {{ item.city }}
                                                                                {{ item.address }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseFive">
                                    Сервисы
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse"
                                 aria-labelledby="panelsStayOpen-headingFive">
                                <div class="accordion-body">
                                    <div class="row mb-3">
                                        <div name="add-exc-included" class="col-12 col-lg mb-lg-0">
                                            <h1 class="bold mb-3">Что входит в стоимость</h1>
                                            <div class="row mx-0 pe-2 rounded bg-white align-items-center">
                                                <input type="text" name="add-exc-included-input"
                                                       v-model="include_service"
                                                       placeholder="Начни что-то писать..."
                                                       class="col px-2rem rounded  font-size-09 flex-grow-1">

                                            </div>

                                            <div class="row mx-0 pe-2 rounded bg-white align-items-center">
                                                <button
                                                    @click="addIncludeService"
                                                    type="button"
                                                    class="button mt-2 w-100 button-icon col-auto bold bg-blue px-lg-4 rounded">
                                                    <span class="d-lg-block d-none bold white">Добавить</span>
                                                    <i class="d-block d-lg-none fa-solid fa-plus bold white"></i>
                                                </button>

                                            </div>


                                            <div v-for="(item, index) in tour.include_services"
                                                 class="row mx-0 rounded px-2rem py-3 mt-2 bg-white bg-opacity-50">
                                                <span class="col px-0 font-size-09 lh-sm">{{ item }}</span>
                                                <button
                                                    type="button"
                                                    @click="removeIncludeServices(index)"
                                                    class="col-auto ms-auto px-0">
                                                    <span
                                                        class="position-relative red red-underline lh-sm">Удалить</span>
                                                </button>
                                            </div>


                                        </div>
                                        <div name="add-exc-excluded" class="col-12 col-lg">
                                            <h1 class="bold mb-3">Что не входит в стоимость</h1>
                                            <div class="row mx-0 pe-2 rounded bg-white align-items-center">
                                                <input type="text" name="add-exc-excluded-input"
                                                       v-model="exclude_service"
                                                       placeholder="Начни что-то писать..."
                                                       class="col px-2rem rounded  font-size-09 flex-grow-1">

                                            </div>

                                            <div class="row mx-0 pe-2 rounded bg-white align-items-center">
                                                <button
                                                    @click="addExcludeService"
                                                    type="button"
                                                    class="button mt-2 w-100 button-icon col-auto bold bg-blue px-lg-4 rounded">
                                                    <span class="d-lg-block d-none bold white">Добавить</span>
                                                    <i class="d-block d-lg-none fa-solid fa-plus bold white"></i>
                                                </button>
                                            </div>

                                            <div v-for="(item, index) in tour.exclude_services"
                                                 class="row mx-0 rounded px-2rem py-3 mt-2 bg-white bg-opacity-50">
                                                <span class="col px-0 font-size-09 lh-sm">{{ item }}</span>
                                                <button
                                                    type="button"
                                                    @click="removeExcludeServices(index)"
                                                    class="col-auto ms-auto px-0">
                                                    <span
                                                        class="position-relative red red-underline lh-sm">Удалить</span>
                                                </button>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--                        <div class="accordion-item">
                                                    <h2 class="accordion-header" id="panelsStayOpen-headingSix">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false"
                                                                aria-controls="panelsStayOpen-collapseSix">
                                                            Сервисы
                                                        </button>
                                                    </h2>
                                                    <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse"
                                                         aria-labelledby="panelsStayOpen-headingSix">
                                                        <div class="accordion-body">

                                                        </div>
                                                    </div>
                                                </div>-->

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseSeven">
                                    Цена для карточки
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse"
                                 aria-labelledby="panelsStayOpen-headingSeven">
                                <div class="accordion-body">
                                    <div class="row align-items-end mb-4">
                                        <div class="col-6">
                             <span class="dt-label-input thin position-relative mb-2 col-12 px-0">Конечная цена билета, руб.
                                    <i class="fa-regular fa-circle-question dt-text-muted--white-50"></i>
                                </span>
                                            <div
                                                class="col mx-0 px-0 pe-2rem rounded bg-white d-flex align-items-center">
                                                <input type="text" name="add-exc-last-price"
                                                       v-model="tour.base_price"
                                                       class="w-100 d-flex flex-grow-1 ps-2rem pe-2 py-3 rounded  font-size-09 semibold">

                                            </div>
                                        </div>

                                        <div class="col-6">
                             <span class="dt-label-input thin position-relative mb-2 col-12 px-0">Цена до скидки, руб.
                                    <i class="fa-regular fa-circle-question dt-text-muted--white-50"></i>
                                </span>
                                            <div
                                                class="col mx-0 px-0 pe-2rem rounded bg-white d-flex align-items-center">
                                                <input type="text" name="add-exc-last-price"
                                                       v-model="tour.discount_price"
                                                       class="w-100 d-flex flex-grow-1 ps-2rem pe-2 py-3 rounded  font-size-09 semibold">

                                            </div>
                                        </div>


                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingEight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseEight" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseEight">
                                    Цена для расчета
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseEight" class="accordion-collapse collapse"
                                 aria-labelledby="panelsStayOpen-headingEight">
                                <div class="accordion-body">
                                    <div class="row align-items-end mx-0 px-0 mb-3"
                                         v-for="(item, index) in tour.prices">
                                        <div class="col-12 col-xxl-4 row mx-0 px-0">
                                <span class="dt-label-input thin position-relative mb-2 col-12 px-0">тип билета
                                    <i class="fa-regular fa-circle-question dt-text-muted--white-50"></i>
                                </span>
                                            <div
                                                class="dropdown  dropdown-border col-12 position-relative mx-0 px-0 bg-white rounded">
                                                <button type="button"
                                                        class="big-button col-10 ps-2rem dropdown-toggle text-start font-size-09"
                                                        data-bs-toggle="dropdown">
                                                    {{
                                                        getTicketTypeById(tour.prices[index].ticket_type_id).title || 'Не выбрано'
                                                    }}
                                                </button>
                                                <ul
                                                    class="dropdown-menu col-12 flex-grow-1  px-2rem pb-3 pt-0 rounded font-size-09">
                                                    <li @click="tour.prices[index].ticket_type_id = item.id"
                                                        v-for="item in filteredTickets">
                                                        <a class="dropdown-item w-100 mt-3 p-0 font-size-09">
                                                            {{ item.title }} </a>
                                                    </li>

                                                </ul>
                                                <svg class="h-100 expand-icon " xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 48 48"
                                                     height="20" width="20">
                                                    <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div
                                            class="col-6 col-xxl-3 order-1 row mx-0 px-0 pe-xxl-0 mt-3 mt-xxl-0 ms-xxl-2">
                                <span class="dt-label-input thin position-relative mb-2 col-12 px-0">конечная цена билета, руб.
                                    <i class="fa-regular fa-circle-question dt-text-muted--white-50"></i>
                                </span>
                                            <div
                                                class="col mx-0 px-0 pe-2rem rounded bg-white d-flex align-items-center">
                                                <input type="number" name="add-exc-last-price"
                                                       v-model="tour.prices[index].base_price"
                                                       class="w-100 d-flex flex-grow-1 ps-2rem pe-2 py-3 rounded  font-size-09 semibold">

                                            </div>
                                        </div>
                                        <input type="checkbox" v-model="tour.prices[index].has_discount"
                                               :id="'add-exc-discount-mark-'+index">
                                        <label :for="'add-exc-discount-mark-'+index"
                                               class="align-items-center order-3 order-xxl-2 col-8 col-xxl-auto checkbox position-relative row mx-0 px-0 ms-xxl-4 align-items-center">
                                            <div
                                                class="col-auto custom-checkbox rounded bg-white d-flex align-items-center justify-content-center">
                                                <div class="col-auto custom-checkbox dot">
                                                </div>
                                            </div>
                                            <span class="dt-label-input col-auto thin ms-1">добавить скидку</span>
                                        </label>
                                        <div
                                            class="discount-block order-2 order-xxl-3 hide row col-6 col-xxl px-0 ps-3 ps-xxl-0 mx-0 mt-3 mt-xxl-0 justify-content-center align-items-center">
                                            <div class="col-12 col-xxl-10 row mx-0 px-0">
                                    <span class="dt-label-input thin position-relative mb-2 col-12 px-0">цена до скидки
                                        <i class="fa-regular fa-circle-question dt-text-muted--white-50"></i>
                                    </span>
                                                <div
                                                    class="col mx-0 px-0 pe-2rem rounded bg-white d-flex align-items-center">
                                                    <input type="text" name="add-exc-price"
                                                           v-model="tour.prices[index].discount_price"
                                                           class="w-100 d-flex flex-grow-1 ps-2rem pe-2 py-3 rounded  font-size-09 semibold">
                                                    <span class="opacity-25 w-auto h-auto">руб.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <button @click="removePrice(index)" type="button"
                                                class="col-auto order-last px-0 pt-2rem ms-auto">
                                            <span class="position-relative red red-underline">Удалить</span>
                                        </button>
                                    </div>

                                    <div class="mt-3 mb-4">
                                        <button v-if="tour.prices.length<tickets.length" @click="addPrice" type="button"
                                                class="button bold bg-blue col-12 col-lg-auto mt-4 px-4 rounded">
                                            <span class="bold white">Добавить новый тип билета</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingNine">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseNine" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseNine">
                                    Информация об оплате
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseNine" class="accordion-collapse collapse"
                                 aria-labelledby="panelsStayOpen-headingNine">
                                <div class="accordion-body">
 <span class="dt-label-input thin position-relative mb-2 col-12 px-0">тип оплаты
                                        <i class="fa-regular fa-circle-question dt-text-muted--white-50"></i>
                                    </span>
                                    <div class="mb-3 row mx-0 justify-content-between">
                                        <div class="col-12 col-md-6 p-0">
                                            <div
                                                class="dropdown  dropdown-border col-12 position-relative mx-0 px-0 bg-white pe-2rem rounded">
                                                <button
                                                    class="big-button col-11 ps-2rem dropdown-toggle text-start font-size-09 w-100"
                                                    type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    {{ getPaymentsById().title }}
                                                </button>
                                                <ul class="dropdown-menu w-auto" aria-labelledby="dropdownMenuButton1">
                                                    <li v-for="(item, index) in payments"
                                                        @click="tour.payment_type_id = item.id">
                                                        <a class="dropdown-item">{{ item.title }}</a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>


                                    </div>
                                    <h3>Введите способы оплаты (до 3х способов)</h3>
                                    <span class="dt-label-input thin position-relative mb-2 col-12 px-0">укажите, как оплатить
                        <i class="fa-regular fa-circle-question dt-text-muted--white-50"></i>
                    </span>
                                    <div class="mb-3 row mx-0 justify-content-between"
                                         v-for="(item, index) in tour.payment_infos">
                                        <div class="col-12 col-md-10 d-flex flex-column p-0">
                                            <input type="text" name="add-exc-price ps-2rem"
                                                   v-model="tour.payment_infos[index]"
                                                   class="w-100 rounded  pl-2 ps-2rem">
                                        </div>
                                        <div class="col-12 col-md-2 d-flex justify-content-center align-items-center">
                                            <button class="btn btn-link red" @click="removePaymentInfo(index)">
                                                Удалить
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-12">
                                            <button type="button" :disabled="tour.payment_infos.length>=3"
                                                    class="button w-100 bold bg-blue px-lg-4 rounded"
                                                    @click="addPaymentInfo">
                                                Добавить
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseTen" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseTen">
                                    Расписание тура
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTen" class="accordion-collapse collapse"
                                 aria-labelledby="panelsStayOpen-headingTen">
                                <div class="accordion-body">
                                    <div class="row mt-3">
                                        <div class="col-lg-4 col-12 ">


                                            <input type="checkbox"
                                                   v-model="tour.is_regular"
                                                   id="set-is-regular-mark">
                                            <label for="set-is-regular-mark"
                                                   class="align-items-center col-12 col-md-auto checkbox position-relative row mx-0 px-0">
                                                <div
                                                    class="col-auto custom-checkbox rounded bg-white d-flex align-items-center justify-content-center">
                                                    <div class="col-auto custom-checkbox dot">
                                                    </div>
                                                </div>
                                                <span class="dt-label-input col-auto thin ms-1" v-if="!tour.is_regular">
                                    Сделать тур регулярным
                                </span>

                                                <span class="dt-label-input col-auto thin ms-1" v-else>
                                    Сделать тур с привязкой к дате
                                </span>
                                            </label>


                                        </div>
                                    </div>

                                    <h1 class="bold mt-3" v-if="!tour.is_regular">Дата старта экскурсий</h1>
                                    <div v-if="!tour.is_regular"
                                         class="row mx-0 px-0 mt-3">
                                        <div class="col-12 col-lg-12 p-0 pe-3">
                                <span class="dt-label-input thin position-relative mb-2 col-12 px-0">выберите дату и время
                                </span>
                                            <date-time-calendar-component
                                                class="dropdown-border w-100"
                                                placeholder="Выберите до 20 дат"
                                                v-model="tour.dates"/>
                                        </div>

                                        <div class="add-exc-dates col-lg-6 col-12  d-flex flex-column gap-2 mt-2rem p-0"
                                             v-if="tour.dates.length>0">
                                            <div class="add-exc-date bg-light mx-0 px-3 px-lg-4 py-3 rounded row"
                                                 v-for="(item, index) in tour.dates">
                                                <span class="col px-0 font-size-09 lh-sm"> {{
                                                        moment(item).format('YYYY-MM-DD')
                                                    }}</span>
                                                <span class="col px-0 font-size-09 lh-sm">{{
                                                        moment(item).format('HH:mm')
                                                    }}</span>
                                                <button class="col-auto ms-auto px-0">
                            <span class="position-relative red red-underline lh-sm"
                                  @click="removeDateItem(index)">Удалить</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <h1 class="bold mt-3" v-if="tour.is_regular">Указание регулярности экускурсии</h1>
                                    <div v-if="tour.is_regular"
                                         class="row mx-0 px-0 mt-3">

                                        <div class="alert alert-info" role="alert">
                                            Данный блок позволяет задать автоматический интервал туру.
                                            Оставьте пустыми те поля, которые должны повторяться. Поле "Часы" не должно
                                            быть пустым
                                        </div>

                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">Период</th>
                                                <th scope="col">Число</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Часы</td>

                                                <td>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control"
                                                               placeholder="10:00"
                                                               v-mask="'##:##'"
                                                               v-model="tour.regularity.time" required>

                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>День</td>

                                                <td>
                                                    <div class="input-group mb-3">
                                                        <input type="number" class="form-control"
                                                               placeholder="31"
                                                               min="1" max="31"
                                                               step="1"
                                                               v-model="tour.regularity.day">

                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>День недели</td>

                                                <td>
                                                    <div class="input-group mb-3">
                                                        <select
                                                            v-model="tour.regularity.day_of_week"
                                                            class="form-select" id="inputGroupSelect02">
                                                            <option value="-1" selected>Сделайте выбор</option>
                                                            <option value="1">Понедельник</option>
                                                            <option value="2">Вторник</option>
                                                            <option value="3">Среда</option>
                                                            <option value="3">Четверг</option>
                                                            <option value="3">Пятница</option>
                                                            <option value="3">Суббота</option>
                                                            <option value="3">Воскресенье</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Месяц</td>

                                                <td>
                                                    <div class="input-group mb-3">
                                                        <input type="number" class="form-control"
                                                               placeholder="4"
                                                               min="1" max="12"
                                                               step="1"
                                                               v-model="tour.regularity.month">

                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Год</td>

                                                <td>
                                                    <div class="input-group mb-3">
                                                        <input type="number" class="form-control"
                                                               placeholder="2023"
                                                               min="2023" max="2040"
                                                               step="1"
                                                               v-model="tour.regularity.year"
                                                        >

                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--                    <div class="accordion-item">
                                                <h2 class="accordion-header" id="panelsStayOpen-headingTen">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#panelsStayOpen-collapseTen" aria-expanded="false"
                                                            aria-controls="panelsStayOpen-collapseTen">
                                                        Сервисы
                                                    </button>
                                                </h2>
                                                <div id="panelsStayOpen-collapseTen" class="accordion-collapse collapse"
                                                     aria-labelledby="panelsStayOpen-headingTen">
                                                    <div class="accordion-body">

                                                    </div>
                                                </div>
                                            </div>-->
                    </div>
                </div>

                <div class="col-12">
                    <div
                        class="add-exc-accept align-items-baseline splitted d-flex align-items-center justify-content-center justify-content-lg-start row mx-0 px-0 py-5 mt-5">
                        <button
                            class="col-12 col-lg-auto order-first dt-btn-text px-0">
                            предосмотр карточки
                        </button>
                        <button
                            class="col-12 col-lg-auto order-first dt-btn-text px-0 mx-0 ms-lg-4 mt-4 mt-lg-0 mb-3">
                            предосмотр
                            <span
                                class="font-size-06 letter-spacing-3 text-uppercase bold hide visible-lg">страницы</span>
                            экскурсии
                        </button>
                        <div class="w-100"></div>
                        <!--        <input type="checkbox"
                                       v-model="tour.is_draft"
                                       id="draft-mark">
                                <label for="draft-mark"
                                       class="align-items-center order-2 order-lg-3 checkbox position-relative row col-12 col-lg-auto justify-content-center px-0 mx-0 ms-lg-auto align-items-center">
                                    <div
                                        class="col-auto custom-checkbox rounded bg-white d-flex align-items-center justify-content-center">
                                        <div class="col-auto custom-checkbox dot">
                                        </div>
                                    </div>
                                    <span class="col-auto thin ms-2 px-0">Сохранить как черновик</span>
                                </label>-->
                        <input type="checkbox" v-model="data_is_correct" id="add-data-is-correct">
                        <label for="add-data-is-correct"
                               class="align-items-center order-2 order-lg-3 checkbox position-relative row col-12 col-lg-auto
                               justify-content-center px-0 mx-0 ms-lg-auto align-items-center mb-4">
                            <div
                                class="col-auto custom-checkbox rounded bg-white d-flex align-items-center justify-content-center">
                                <div class="col-auto custom-checkbox dot"></div>
                            </div>
                            <span class="col-auto thin ms-2 px-0">все данные введены верно</span>
                        </label>

                        <button :disabled="!isFormComplete"
                                class="big-button order-last bold bg-green col-12 col-lg-auto px-4 mx-0 ms-lg-5 mt-2 mt-lg-0 rounded">
                            Отправить на проверку
                        </button>
                    </div>
                    <!--редактирование-->
                    <div class="add-exc-accept splitted d-flex align-items-center row mx-0 px-0 py-5 mb-0 hide">
                        <button
                            class="col-auto excursion__menu font-size-06 blue-hover letter-spacing-3 text-uppercase bold px-0">
                            предосмотр карточки
                            <span class="blue fs-6">&gt;</span>
                        </button>
                        <button
                            class="col-auto excursion__menu font-size-06 blue-hover letter-spacing-3 text-uppercase bold px-0 ms-4">
                            предосмотр страницы экскурсии
                            <span class="blue fs-6">&gt;</span>
                        </button>
                        <input type="checkbox" id="add-exc-accept-mark">
                        <label for="add-exc-accept-mark"
                               class="align-items-center checkbox position-relative row col-auto px-0 ms-auto align-items-center">
                            <div
                                class="col-auto custom-checkbox rounded bg-white d-flex align-items-center justify-content-center">
                                <div class="col-auto custom-checkbox dot"></div>
                            </div>
                            <span class="col-auto thin ms-2 .font-size-06 px-0">все данные введены верно</span>
                        </label>
                        <button class="big-button bold bg-green col-auto px-4 ms-5 rounded">Сохранить</button>
                    </div>

                </div>
            </div>
        </form>
    </div>


</template>
<script>
import {mapGetters} from "vuex";


const getInitialFormData = () => ({
    tour: {
        title: null,
        base_price: 0,
        discount_price: 0,
        short_description: null,
        description: null,
        categories: [],
        min_group_size: 0,
        max_group_size: 0,
        comfort_loading: false,
        start_city: null,
        start_address: null,
        start_latitude: 0,
        start_longitude: 0,
        start_comment: null,

        is_draft: true,
        duration: null,
        tour_objects: [],

        dates: [],
        payment_infos: [],
        prices: [],
        include_services: [],
        exclude_services: [],
        duration_type_id: null,
        movement_type_id: null,
        tour_type_id: null,
        payment_type_id: null,

        is_regular: false,
        regularity: {
            time: "10:00",
            day: null,
            day_of_week: null,
            month: null,
            year: null,
        }

    },
});
const getTestFormData = () => ({
    tour: {
        title: "г. Большой Тхач",
        base_price: 17000,
        discount_price: 12000,
        short_description: "Недельный поход в красивийшее место Кавказа",
        description: "Недельный поход в красивийшее место Кавказа",
        categories: [16, 17, 19, 20],
        min_group_size: 5,
        max_group_size: 15,
        comfort_loading: false,
        start_city: "Москва",
        start_address: "улица Мнёвники",
        start_latitude: 55.776018,
        start_longitude: 37.503052,
        start_comment: "Сбор в сквере маршала Жукова, недалеко от метров Хорошёво",

        is_draft: true,
        duration: "12 ч.",
        tour_objects: [1,2,3,4,5],

        dates: [],
        payment_infos: [],
        prices: [],
        include_services: ["Трансфер между локациями", "Питание", "Информационное сопровождение"],
        exclude_services: ["Биллеты на подъемник", "Аренда снаряжения"],
        duration_type_id: 32,
        movement_type_id: 37,
        tour_type_id: 23,
        payment_type_id: 28,

        is_regular: false,
        regularity: {
            time: "10:00",
            day: null,
            day_of_week: null,
            month: null,
            year: null,
        }

    },
});

export default {

    data() {
        return {
            generate_test_data: false,
            include_service: null,
            exclude_service: null,
            categories: [],
            durations: [],
            movements: [],
            services: [],
            payments: [],
            tour_types: [],
            tickets: [],
            tour_objects: [],
            accept_rules: true,
            data_is_correct: false,
            tour: {
                title: null,
                base_price: 0,
                discount_price: 0,
                short_description: null,
                description: null,
                categories: [],
                min_group_size: 0,
                max_group_size: 0,
                comfort_loading: false,
                start_city: null,
                start_address: null,
                start_latitude: 0,
                start_longitude: 0,
                start_comment: null,

                is_draft: true,
                duration: null,
                tour_objects: [],

                dates: [],
                payment_infos: [],
                prices: [],
                include_services: [],
                exclude_services: [],
                duration_type_id: null,
                movement_type_id: null,
                tour_type_id: null,
                payment_type_id: null,

                is_regular: false,
                regularity: {
                    time: "10:00",
                    day: null,
                    day_of_week: 1,
                    month: null,
                    year: null,
                }

            },
            preview_photo: null,
            photos: [],
            items: []
        }
    },
    watch: {
        generate_test_data: function (oldVal, newVal) {
            if (!this.generate_test_data) {
                this.tour = getInitialFormData().tour
                this.preview_photo = null
                this.photos = []
                this.items = []
            }
            else {
                this.tour = getTestFormData().tour

                this.preview_photo = null
                this.photos = []
                this.items = []
            }


        }
    },
    computed: {
        ...mapGetters(['getCategories',
            'getDictionariesByTypeSlug',
            'getGuideActiveTourObjects',
            'getTourObjects']),
        filteredTourObjects() {
            return this.tour_objects.filter(item => {
                let inArray = this.tour.tour_objects.find(obj => obj.id === item.id)
                return !inArray
            })
        },
        moment() {
            return window.moment
        },
        filteredTickets() {
            return this.tickets.filter(item => {
                let inArray = this.tour.prices.find(price => price.ticket_type_id === item.id)
                return !inArray
            })
        },
        isFormComplete() {
            return true/*this.accept_rules
                && this.data_is_correct
                && this.photos.length >= 5
                && this.tour.categories.length >= 1
                && this.tour.categories.length <= 5*/
            //return this.tour.is
        },
        preparePreviewImage() {
            return URL.createObjectURL(this.preview_photo)
        },
    },
    mounted() {
        this.loadTourCategories()
        this.loadAllDictionaries()
        this.loadTourObjects()
    },
    methods: {
        onChangePreview(e) {
            const files = e.target.files
            this.preview_photo = files[0]
        },
        onChangePhotos(e) {
            const files = e.target.files
            this.photos = files

            for (let i = 0; i < files.length; i++)
                this.items.push({imageUrl: URL.createObjectURL(files[i])})
        },
        addPaymentInfo() {
            this.tour.payment_infos.push("");
        },
        removePaymentInfo(index) {
            this.tour.payment_infos.splice(index, 1)
        },
        preparedPrices() {
            this.tickets.forEach((item, index) => {
                this.tour.prices.push({
                    base_price: 0,
                    discount_price: 0,
                    has_discount: false,
                    ticket_type_id: this.tickets[index].id
                })

            })
        },
        getPaymentsById() {
            return this.payments.find(item => item.id === this.tour.payment_type_id) || {
                title: 'Не выбрано'
            }
        },
        getDurationById(id) {
            return this.durations.find(item => item.id === id) || {
                slug: 'Не выбрано'
            }
        },
        getMovementTypeById(id) {
            return this.movements.find(item => item.id === id) || {
                title: 'Не выбрано'
            }
        },
        getSelectedTourType() {
            return this.tour_types.find(item => item.id === this.tour.tour_type_id) || {
                slug: 'Не выбрано'
            }
        },
        getTourTypeById(id) {
            return this.tour_types.find(item => item.id === id) || {
                title: 'Не выбрано'
            }
        },
        getTicketTypeById(id) {
            return this.tickets.find(item => item.id === id) || {
                title: 'Не выбрано'
            }
        },
        removePrice(index) {
            this.tour.prices.splice(index, 1);
        },
        addPrice() {
            this.tour.prices.push({
                base_price: 0,
                discount_price: 0,
                has_discount: false,
                ticket_type_id: null
            })
        },
        removeDateItem(index) {
            this.tour.dates.splice(index, 1);
        },
        removeExcludeServices(index) {
            this.tour.exclude_services.splice(index, 1);
        },
        removeIncludeServices(index) {
            this.tour.include_services.splice(index, 1);
        },
        addIncludeService() {
            let canAdd = this.include_service != null ? this.include_service.length > 0 : false;

            if (!canAdd) {
                this.$notify({
                    title: "Оповещение",
                    text: "Необходимо ввести данные",
                    type: 'warn'
                });
                return;
            }

            this.tour.include_services.push(this.include_service);
            this.include_service = null

            this.$notify({
                title: "Добавление тура",
                text: "Сервис успешно добавлен",
                type: 'success'
            });
        },
        addExcludeService() {
            let canAdd = this.exclude_service != null ? this.exclude_service.length > 0 : false;

            if (!canAdd) {
                this.$notify({
                    title: "Оповещение",
                    text: "Необходимо ввести данные",
                    type: 'warn'
                });
                return;
            }

            this.tour.exclude_services.push(this.exclude_service);
            this.exclude_service = null

            this.$notify({
                title: "Добавление тура",
                text: "Сервис успешно добавлен",
                type: 'success'
            });
        },
        openAddTourObjectWindow() {
            this.eventBus.emit('open_add_tour_objects_window')
        },
        removeTourObject(index) {
            this.tour.tour_objects.splice(index, 1)
        },
        getTourObjectById(id) {
            return this.tour_objects.find(item => item.id === id) || null
        },
        addTourObject(item) {
            this.tour.tour_objects.push(item.id)
        },
        loadTourObjects() {
            this.$store.dispatch("loadGuideTourObjectsByPage").then(() => {
                this.tour_objects = this.getGuideActiveTourObjects

            })

            this.$store.dispatch("loadTourObjectsByPage", {size: 1000}).then(() => {
                this.tour_objects = [...this.tour_objects, ...this.getTourObjects]
            })
        },
        selectCoords(e) {

            this.tour.start_longitude = e[0]
            this.tour.start_latitude = e[1]
        },
        resetImages() {
            let files = document.querySelector("#photos")
            files.value = ""
            this.photos = [];
            this.items = [];
        },

        submitTour() {

            let data = new FormData();

            Object.keys(this.tour)
                .forEach(key => {
                    const item = this.tour[key] || ''
                    if (typeof item === 'object')
                        data.append(key, JSON.stringify(item))
                    else
                        data.append(key, item)
                });


            data.append('preview', this.preview_photo);

            for (let i = 0; i < this.photos.length; i++)
                data.append('files[]', this.photos[i]);


            this.$store.dispatch("addTour", data).then((data) => {
                let tour = data.data

                this.resetImages()

                this.tour = getInitialFormData().tour

                let URL = "/tour/" + tour.id;
                window.open(URL);

                this.$notify({
                    title: "Добавление тура",
                    text: "Новый тур успешно добавлен",
                    type: 'success'
                });
            })
        },
        loadTourCategories() {
            this.$store.dispatch("loadAllCategories").then(() => {
                this.categories = this.getCategories
            })
        },
        loadAllDictionaries() {
            this.$store.dispatch("loadAllDictionaries").then(() => {
                this.durations = this.getDictionariesByTypeSlug('duration_type')
                this.movements = this.getDictionariesByTypeSlug('movement_type')
                this.services = this.getDictionariesByTypeSlug('service_type')
                this.payments = this.getDictionariesByTypeSlug('payment_type')
                this.tour_types = this.getDictionariesByTypeSlug('tour_type')
                this.tickets = this.getDictionariesByTypeSlug('ticket_type')


                this.preparedPrices();
            })
        }
    }
}
</script>
<style scoped>

</style>

<style lang="scss">
.tour-object-list {
    display: flex;
    justify-content: space-between;
    overflow-x: auto;
    flex-wrap: wrap;
    /* padding: 5px; */
    box-sizing: border-box;
}

.tour-object-list-item img {
    height: 100px;
    object-fit: cover;
    width: 100px;
    margin: 10px;
}

.photo-loader {
    width: 100px;
    height: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 42px;
    background: white;
    border-radius: 10px;
    border: 1px lightgray solid;

    .fa-plus {
        font-size: 25px;
    }
}

.photo-preview {
    img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        background: white;
        //padding: 13px;
        box-sizing: border-box;
        border-radius: 10px;
        border: 1px lightgray solid;
    }
}

button[disabled] {
    background: gray;
}

button {
    min-width: 50px;
}

select, .dropdown-border,
input, textarea {
    border: 1px #0c63e4 solid;
}

.checkbox > input:not(:checked) + .category {
    border: 3px solid #eef6ff;
}
</style>
