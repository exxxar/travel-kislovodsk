<template>
    <form class="col-lg-8 dt-content-booking" v-on:submit.prevent="submit">
        <button @click="closeBooking" class="dt-btn-blue dt-btn--height-50">
            <span class="dt-font--size-12">Назад к описанию</span>
        </button>
        <h1 class="dt-content__title fw-bold">Забронировать экскурсию «{{ tour.title }}»</h1>
        <div class="dt-alert dt-alert-danger d-flex align-items-center">
            <div class="dt-alert__icon d-flex">
                <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%" viewBox="0 0 48 48"
                     fill="#f73637">
                    <path
                        d="M22.35 34.3h3.6V22h-3.6ZM24 18.7q.9 0 1.475-.575.575-.575.575-1.425 0-.95-.575-1.525T24 14.6q-.9 0-1.475.575-.575.575-.575 1.525 0 .85.575 1.425.575.575 1.475.575Zm0 26q-4.3 0-8.05-1.625-3.75-1.625-6.575-4.45t-4.45-6.575Q3.3 28.3 3.3 24q0-4.35 1.625-8.1T9.35 9.35q2.8-2.8 6.575-4.45Q19.7 3.25 24 3.25q4.35 0 8.125 1.65 3.775 1.65 6.55 4.425t4.425 6.55Q44.75 19.65 44.75 24q0 4.3-1.65 8.075-1.65 3.775-4.45 6.575-2.8 2.8-6.55 4.425T24 44.7Zm.05-3.95q6.95 0 11.825-4.9 4.875-4.9 4.875-11.9 0-6.95-4.875-11.825Q31 7.25 24 7.25q-6.95 0-11.85 4.875Q7.25 17 7.25 24q0 6.95 4.9 11.85 4.9 4.9 11.9 4.9ZM24 24Z"/>
                </svg>
            </div>
            <span class="dt-alert__title">Для бронирования внимательно заполните все поля ниже.</span>
        </div>
        <div class="dt-content__date-and-time d-flex">
            <div class="dt-input__wrapper me-3 w-100">
                <div class="dt-input__group">

                    <div class="dropdown w-100">
                        <button class="btn dropdown-toggle w-100" type="button" id="dropdownDateMenu"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            {{ bookingForm.date || 'Выберите дату путешествия' }}
                        </button>
                        <ul class="dropdown-menu w-100" aria-labelledby="dropdownDateMenu">
                            <li class="cursor-pointer" v-for="day in sortedScheduleDates">
                                <a class="dropdown-item" @click="changeDate(day.start_day)">{{ day.start_day }}</a>
                            </li>
                        </ul>
                    </div>

                    <div class="dt-input__group-item">
                        <div class="dt-input__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%"
                                 viewBox="0 0 48 48" fill="#0071eb">
                                <path
                                    d="M9.25 44.7q-1.6 0-2.775-1.175Q5.3 42.35 5.3 40.75v-30.5q0-1.65 1.175-2.825Q7.65 6.25 9.25 6.25h3v-3H16v3h16v-3h3.75v3h3q1.65 0 2.825 1.175Q42.75 8.6 42.75 10.25v30.5q0 1.6-1.175 2.775Q40.4 44.7 38.75 44.7Zm0-3.95h29.5V19.5H9.25v21.25Zm0-24.25h29.5v-6.25H9.25Zm0 0v-6.25 6.25ZM24 28.15q-.9 0-1.525-.625Q21.85 26.9 21.85 26q0-.9.625-1.525.625-.625 1.525-.625.9 0 1.525.625.625.625.625 1.525 0 .9-.625 1.525-.625.625-1.525.625Zm-8 0q-.9 0-1.525-.625Q13.85 26.9 13.85 26q0-.9.625-1.525.625-.625 1.525-.625.9 0 1.525.625.625.625.625 1.525 0 .9-.625 1.525-.625.625-1.525.625Zm16 0q-.9 0-1.525-.625Q29.85 26.9 29.85 26q0-.9.625-1.525.625-.625 1.525-.625.9 0 1.525.625.625.625.625 1.525 0 .9-.625 1.525-.625.625-1.525.625Zm-8 8q-.9 0-1.525-.625Q21.85 34.9 21.85 34q0-.9.625-1.525.625-.625 1.525-.625.9 0 1.525.625.625.625.625 1.525 0 .9-.625 1.525-.625.625-1.525.625Zm-8 0q-.9 0-1.525-.625Q13.85 34.9 13.85 34q0-.9.625-1.525.625-.625 1.525-.625.9 0 1.525.625.625.625.625 1.525 0 .9-.625 1.525-.625.625-1.525.625Zm16 0q-.9 0-1.525-.625Q29.85 34.9 29.85 34q0-.9.625-1.525.625-.625 1.525-.625.9 0 1.525.625.625.625.625 1.525 0 .9-.625 1.525-.625.625-1.525.625Z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dt-input__wrapper">
                <div class="dt-input__group">

                    <div class="dropdown w-100">
                        <button class="btn dropdown-toggle w-100" type="button" id="dropdownTimeMenu"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            {{ bookingForm.time || 'Время' }}
                        </button>
                        <ul class="dropdown-menu w-100" aria-labelledby="dropdownTimeMenu">
                            <li class="cursor-pointer" v-for="time in sortedScheduleTimes"><a class="dropdown-item "
                                                                                              @click="changeTime(time)">{{
                                    time.start_time
                                }}</a>
                            </li>
                        </ul>
                    </div>

                    <div class="dt-input__group-item">
                        <div class="dt-input__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%"
                                 viewBox="0 0 48 48" fill="#0071eb">
                                <path
                                    d="M9.25 44.7q-1.6 0-2.775-1.175Q5.3 42.35 5.3 40.75v-30.5q0-1.65 1.175-2.825Q7.65 6.25 9.25 6.25h3v-3H16v3h16v-3h3.75v3h3q1.65 0 2.825 1.175Q42.75 8.6 42.75 10.25v30.5q0 1.6-1.175 2.775Q40.4 44.7 38.75 44.7Zm0-3.95h29.5V19.5H9.25v21.25Zm0-24.25h29.5v-6.25H9.25Zm0 0v-6.25 6.25ZM24 28.15q-.9 0-1.525-.625Q21.85 26.9 21.85 26q0-.9.625-1.525.625-.625 1.525-.625.9 0 1.525.625.625.625.625 1.525 0 .9-.625 1.525-.625.625-1.525.625Zm-8 0q-.9 0-1.525-.625Q13.85 26.9 13.85 26q0-.9.625-1.525.625-.625 1.525-.625.9 0 1.525.625.625.625.625 1.525 0 .9-.625 1.525-.625.625-1.525.625Zm16 0q-.9 0-1.525-.625Q29.85 26.9 29.85 26q0-.9.625-1.525.625-.625 1.525-.625.9 0 1.525.625.625.625.625 1.525 0 .9-.625 1.525-.625.625-1.525.625Zm-8 8q-.9 0-1.525-.625Q21.85 34.9 21.85 34q0-.9.625-1.525.625-.625 1.525-.625.9 0 1.525.625.625.625.625 1.525 0 .9-.625 1.525-.625.625-1.525.625Zm-8 0q-.9 0-1.525-.625Q13.85 34.9 13.85 34q0-.9.625-1.525.625-.625 1.525-.625.9 0 1.525.625.625.625.625 1.525 0 .9-.625 1.525-.625.625-1.525.625Zm16 0q-.9 0-1.525-.625Q29.85 34.9 29.85 34q0-.9.625-1.525.625-.625 1.525-.625.9 0 1.525.625.625.625.625 1.525 0 .9-.625 1.525-.625.625-1.525.625Z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dt-alert dt-alert-danger d-flex align-items-center">
            <div class="dt-alert__icon d-flex">
                <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%" viewBox="0 0 48 48"
                     fill="#f73637">
                    <path
                        d="M22.35 34.3h3.6V22h-3.6ZM24 18.7q.9 0 1.475-.575.575-.575.575-1.425 0-.95-.575-1.525T24 14.6q-.9 0-1.475.575-.575.575-.575 1.525 0 .85.575 1.425.575.575 1.475.575Zm0 26q-4.3 0-8.05-1.625-3.75-1.625-6.575-4.45t-4.45-6.575Q3.3 28.3 3.3 24q0-4.35 1.625-8.1T9.35 9.35q2.8-2.8 6.575-4.45Q19.7 3.25 24 3.25q4.35 0 8.125 1.65 3.775 1.65 6.55 4.425t4.425 6.55Q44.75 19.65 44.75 24q0 4.3-1.65 8.075-1.65 3.775-4.45 6.575-2.8 2.8-6.55 4.425T24 44.7Zm.05-3.95q6.95 0 11.825-4.9 4.875-4.9 4.875-11.9 0-6.95-4.875-11.825Q31 7.25 24 7.25q-6.95 0-11.85 4.875Q7.25 17 7.25 24q0 6.95 4.9 11.85 4.9 4.9 11.9 4.9ZM24 24Z"/>
                </svg>
            </div>
            <span class="dt-alert__title">Цены указаны с учетом скидки</span>
        </div>
        <div class="dt-content__tickets dt-content--bottom-60">

            <div class="dt-ticket__item" v-for="(item, index) in tour.prices">
                <div class="dt-ticket__name">{{ item.title }}</div>
                <div class="dt-ticket__price"><strong>{{ item.price }}₽</strong></div>
                <div class="dt-counter">
                    <button type="button" @click="increment(item.slug)">
                        +
                    </button>
                    <span>{{ getCountBySlug(item.slug) }}</span>
                    <button type="button" @click="decrement(item.slug)"
                            v-bind:class="{'disabled':getCountBySlug(item.slug)===0}"
                            :disabled="getCountBySlug(item.slug)===0">
                        -
                    </button>
                </div>
                <div class="dt-total-price"><p>{{ getCountBySlug(item.slug) * item.price }}₽</p></div>
            </div>
        </div>
        <div class="dt-check__group dt-content--bottom-60">
            <label class="dt-check__group-title">дополнительные услуги </label>
            <div class="dt-checkboxes-vertical d-flex">
                <div class="dt-check" v-for="item in service">
                    <div class="dt-check__input">
                        <input type="checkbox" name="type_person"
                               :value="item.id"
                               v-model="bookingForm.services"/>
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__label dt-check__label--thin">
                        <slot name="label">
                            <p>{{ item.title }}</p>
                        </slot>
                    </label>
                </div>

            </div>
        </div>
        <div class="dt-total-price dt-content--bottom-60 d-flex justify-content-between">
            <p class="dt-total-price__title">
                итоговая стоимость
            </p>
            <div class="dt-total-price__price d-flex align-items-center">
                <div class="d-flex me-2">
                            <span style='color:#f83737;text-decoration:line-through'>
                                <p class="dt-price__non-active">{{ summaryFullPrice }}</p>
                            </span>
                </div>
                <div class="dt-price__active me-2">{{ summaryDiscountPrice }}</div>
                <span class="text-muted-black fw-regular">за {{ summaryPeopleCount }} человек</span>
            </div>
        </div>
        <div class="dt-personal-data dt-content--bottom-60">
            <ul class="d-flex w-100 flex-wrap">
                <li
                    style="padding: 10px; margin-left:5px;"
                    @click="active_person_index=index"
                    v-for="(person, index) in bookingForm.persons">
                    <button
                        type="button"
                        class="btn "
                        v-bind:class="{'btn-outline-primary':active_person_index!==index&&checkFormVerified(index),
                            'btn-primary':active_person_index===index&&checkFormVerified(index),
                            'btn-outline-danger':active_person_index!==index&&!checkFormVerified(index),
                            'btn-danger':active_person_index===index&&!checkFormVerified(index)
                            }"
                    >Участник #{{ index + 1 }}
                    </button>
                </li>
            </ul>
        </div>

        <div class="dt-personal-data dt-content--bottom-60"

             v-for="(person, index) in bookingForm.persons">


            <div v-if="active_person_index===index">
                <h2 class="mb-2 mt-2">Регистрационные данные на участника #{{ index + 1 }}</h2>
                <div class="row dt-personal-data__item">
                    <div class="col-lg-3">
                        <label class="dt-personal-data__label">Фамилия Имя Отчество</label>
                    </div>
                    <div class="col-lg-9">
                        <div class="dt-input__wrapper">
                            <div class="dt-input__group">
                                <input type="text" name="user"
                                       v-model="bookingForm.persons[index].full_name"
                                       placeholder="Иванов Иван Иванович"
                                       class="dt-input" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row dt-personal-data__item">
                    <div class="col-lg-3">
                        <label class="dt-personal-data__label">телефон</label>
                    </div>
                    <div class="col-lg-9">
                        <div class="dt-input__wrapper">
                            <div class="dt-input__group">
                                <input type="text" name="phone"
                                       v-model="bookingForm.persons[index].phone"
                                       v-mask="'+7(###)###-##-##'"
                                       placeholder="+7(000)000-00-00"
                                       class="dt-input" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row dt-personal-data__item">
                    <div class="col-lg-3">
                        <label class="dt-personal-data__label">почта</label>
                    </div>
                    <div class="col-lg-9">
                        <div class="dt-input__wrapper">
                            <div class="dt-input__group">
                                <input type="email" name="email"
                                       v-model="bookingForm.persons[index].email"
                                       placeholder="name@mail.ru"
                                       class="dt-input" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row dt-personal-data__item">
                    <div class="col-lg-3">
                        <label class="dt-personal-data__label">Возраст</label>
                    </div>
                    <div class="col-lg-9">
                        <div class="dt-input__wrapper">
                            <div class="dt-input__group">
                                <input type="number" name="age"
                                       v-model="bookingForm.persons[index].age"
                                       placeholder="18"
                                       class="dt-input" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                </div>

                <h3>Документ, удостоверяющий личность</h3>
                <div class="row dt-personal-data__item">
                    <div class="col-lg-3">
                        <label class="dt-personal-data__label">Тип документа</label>
                    </div>
                    <div class="col-lg-9">
                        <div class="dt-input__wrapper">
                            <div class="dt-input__group">
                                <input type="text" name="document_type_title"
                                       placeholder="Паспорт"
                                       v-model="bookingForm.persons[index].document_type_title"
                                       class="dt-input" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row dt-personal-data__item">
                    <div class="col-lg-3">
                        <label class="dt-personal-data__label">Информация о документе</label>
                    </div>
                    <div class="col-lg-9">
                        <div class="dt-input__wrapper">
                            <div class="dt-input__group">
                            <textarea type="number" name="document_info"
                                      placeholder="1234 55555, РО МВД России по городу Ростову, 24 августа 2022"
                                      v-model="bookingForm.persons[index].document_info"
                                      class="dt-input" autocomplete="off" required>
                            </textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="alert alert-success" role="alert" v-if="user.is_guest&&index===0">
                    После создания аккаунта будет выполнен автоматический вход в систему.
                </div>

                <div class="form-check form-switch" v-if="user.is_guest">
                    <input class="form-check-input"
                           type="checkbox"
                           :disabled="index===0"
                           v-model="bookingForm.persons[index].need_create_account"
                           v-if="user.is_guest"
                           id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Создать аккаунт</label>
                </div>

                <div v-if="bookingForm.persons[index].need_create_account&&user.is_guest">


                    <div class="row dt-personal-data__item">
                        <div class="col-lg-3">
                            <label class="dt-personal-data__label">Имя аккаунта</label>
                        </div>
                        <div class="col-lg-9">
                            <div class="dt-input__wrapper">
                                <div class="dt-input__group">
                                    <input type="text" name="username" id="username_reg"
                                           pattern="[A-Za-z0-9]+"
                                           v-model="bookingForm.persons[index].account.username"
                                           maxlength="255"
                                           placeholder="travel" class="dt-input"
                                           autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row dt-personal-data__item">
                        <div class="col-lg-3">
                            <label class="dt-personal-data__label">Пароль</label>
                        </div>
                        <div class="col-lg-9">
                            <div class="dt-input__wrapper">
                                <div class="dt-input__group">
                                    <input type="password"
                                           v-model="bookingForm.persons[index].account.password"
                                           name="password" id="password" class="dt-input">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row dt-personal-data__item">
                        <div class="col-lg-3">
                            <label class="dt-personal-data__label">Повторите пароль</label>
                        </div>
                        <div class="col-lg-9">
                            <div class="dt-input__wrapper">
                                <div class="dt-input__group">
                                    <input type="password"
                                           v-model="bookingForm.persons[index].account.confirm_password"
                                           name="confirm_password" id="confirm_password" class="dt-input">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


        </div>

        <div class="row dt-content--bottom-60">
            <div class="col-lg-6">
                <div class="dt-check align-items-start mb-3">
                    <div class="dt-check__input">
                        <input type="checkbox" v-model="bookingForm.booking_is_correct"/>
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__label dt-check__label--thin dt-font--size-12">
                        <slot name="label">
                            <p>все данные введены мною верно</p>
                        </slot>
                    </label>
                </div>
                <div class="dt-check align-items-start">
                    <div class="dt-check__input">
                        <input type="checkbox" v-model="bookingForm.accept_rules"/>
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__label dt-check__label--thin dt-font--size-12">
                        <slot name="label">
                            <p>Я соглашаюсь с <a href="#">Условиями использования сайта</a>
                                и даю согласие на обработку своих персональных данных в соответствии с
                                <a href="#">Политикой обработки персональных данных.</a>
                            </p>
                        </slot>
                    </label>
                </div>
            </div>
            <div class="col-1"></div>

            <div class="col-lg-5 align-items-center d-flex">
                <button type="submit" class="dt-btn-blue w-100"
                        v-bind:class="{'disabled':!bookingForm.accept_rules || !bookingForm.booking_is_correct}"
                        :disabled="!bookingForm.accept_rules || !bookingForm.booking_is_correct || bookingForm.persons.length===0">
                    <span>Оформить заказ </span>
                </button>
            </div>

        </div>
    </form>

    <action-modal-dialog-component
        :hide-controls="true"
        :id="'choosePayment-on-booking'">
        <template v-slot:head>
            <p>Диалог выбора способа</p>
        </template>

        <template v-slot:body>

            <div class="row" v-if="payment">
                <div class="col-12">
                    <a v-if="payment.bankcard.url"
                       :href="payment.bankcard.url" >
                        <img class="w-100" v-lazy="'/img/2payments22.png'" alt="">
                    </a>
                </div>
                <div class="col-12">
                    <a v-if="payment.sbp.url"
                       :href="payment.sbp.url">
                        <img class="w-100" v-lazy="'/img/sbp.jpg'" alt="">
                    </a>
                </div>
            </div>
        </template>
    </action-modal-dialog-component>
</template>
<script>
import {mapGetters} from "vuex";
import {ref} from 'vue';

export default {

    props: ["tour"],
    data() {
        return {
            payment: null,
            step: 0,
            active_person_index: 0,
            service: [],
            bookingForm: {

                tour_id: null,
                date: null,
                time: null,
                schedule_id: null,
                counts: [],
                services: [],
                persons: [],
                accept_rules: false,
                booking_is_correct: false
            }
        }

    },
    computed: {
        ...mapGetters(['getDictionariesByTypeSlug']),
        sortedScheduleTimes() {
            if (this.bookingForm.date == null)
                return [];

            function compare(a, b) {
                if (a.start_time < b.start_time)
                    return -1;
                if (a.start_time > b.start_time)
                    return 1;
                return 0;
            }

            return this.tour.schedules.filter(item => item.start_day == this.bookingForm.date).sort(compare);
        },
        sortedScheduleDates() {

            let tmpDates = [];

            function compare(a, b) {
                if (a.start_day < b.start_day)
                    return -1;
                if (a.start_day > b.start_day)
                    return 1;
                return 0;
            }

            let dates = this.tour.schedules.filter(item => {
                if (tmpDates.indexOf(item.start_day) === -1) {
                    tmpDates.push(item.start_day)
                    return true;
                }
            })

            return dates.sort(compare);
        },
        summaryPeopleCount() {

            let people = 0;

            this.bookingForm.counts.forEach(item => {
                people += item.count
            })

            return people
        },
        summaryPrice() {
            let summary = 0;
            this.tour.prices.forEach(item => {
                summary += item.price * this.getCountBySlug(item.slug)
            })

            return summary;
        },
        summaryFullPrice() {
            let tourBasePrice = this.tour.base_price
            let tourDiscountPrice = this.tour.discount_price

            return this.summaryPrice + Math.round(this.summaryPrice * (tourDiscountPrice / tourBasePrice));
        },
        summaryDiscountPrice() {
            return this.summaryPrice
        },
        user() {
            return window.user
        }
    },
    mounted() {
        this.loadDictionaries()

    },
    methods: {
        checkFormVerified(index) {
            let isVerified = true
            Object.keys(this.bookingForm.persons[index]).forEach(key => {
                isVerified = isVerified && (this.bookingForm.persons[index][key] != null)
            })

            return isVerified
        },
        changeTime(time) {
            this.bookingForm.time = time.start_time
            this.bookingForm.schedule_id = time.id
        },
        changeDate(day) {
            this.bookingForm.date = day

            this.bookingForm.time = this.sortedScheduleTimes[0].start_time || '--:--'

            this.bookingForm.schedule_id = this.sortedScheduleTimes[0].id
        },
        submit() {
            this.bookingForm.tour_id = this.tour.id

            this.$store.dispatch("bookATour", this.bookingForm).then((resp) => {

                let myModal = new bootstrap.Modal(document
                    .getElementById('choosePayment-on-booking'), {})

                this.payment = resp

                if (resp.bankcard.url || resp.sbp.url) {
                    myModal.show()

                    // window.location.reload()
                }


            })
        },
        getCountBySlug(slug) {
            let items = this.bookingForm.counts.filter(item => item.slug === slug) || []
            return items.length > 0 ? items[0].count : 0
        },
        increment(slug) {

            let findItem = this.bookingForm.counts.find(item => item.slug === slug)

            if (!findItem) {
                this.bookingForm.counts.push({
                    slug: slug,
                    count: 1
                })
            } else
                findItem.count++;

            this.bookingForm.persons.push({
                full_name: null,
                phone: null,
                age: null,
                document_info: null,
                document_type_title: null,
                email: null,
                need_create_account: this.bookingForm.persons.length === 0,
                account: {
                    username: null,
                    password: null,
                    confirm_password: null,
                },
            })

        },
        decrement(slug) {
            let findItem = this.bookingForm.counts.find(item => item.slug === slug)


            if (!findItem) {
                this.bookingForm.counts.push({
                    slug: slug,
                    count: 0
                })
            } else
                findItem.count--;

            this.bookingForm.persons.splice(this.summaryPeopleCount, 1);

            if (this.active_person_index > 0)
                this.active_person_index--;

        },
        closeBooking() {
            this.$emit('closeBooking');
        },
        loadDictionaries() {
            this.$store.dispatch("loadAllDictionaries").then(() => {
                this.service = this.getDictionariesByTypeSlug("service_type")
            })
        },
    }
}
</script>
<style lang="scss">
button {
    transition: background 1s;
}

button.disabled {
    background: gray;
    transition: background 1s;
}

.dt-content__tickets {

    .dt-ticket__item {
        background: white;
        display: flex;
        justify-content: space-between;
        padding: 10px 25px;
        margin-top: 10px;
        box-sizing: border-box;
        align-items: center;
        border-radius: 10px;

        .dt-ticket__name {
            min-width: 150px;
        }

        .dt-ticket__price {
            min-width: 150px;
        }

        .dt-total-price {
            min-width: 150px;
            text-align: right;

            p {
                font-weight: bold;
                color: #0d6efd;
            }
        }

        .dt-counter {
            min-width: 100px;
            display: flex;
            justify-content: space-between;
            align-items: center;


            span {
                padding: 10px;
            }

            button {
                font-size: 20px;
                display: flex;
                justify-content: center;
                align-items: center;
                background: #0071eb63;
                border-radius: 5px;
                color: #0d6efd;
                font-family: 'Manrope Bold';
                font-weight: 900;
                line-height: 0px;
                width: 30px;
                height: 30px;

                &.disabled {
                    background: lightgray;
                    color: gray;
                }
            }
        }
    }
}


.not-verified {
    border-bottom: 1px red solid;
}
</style>
