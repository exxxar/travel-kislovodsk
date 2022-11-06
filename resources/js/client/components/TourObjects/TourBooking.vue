<template>
    <div class="col-lg-8 dt-content-booking">
        <button @click="closeBooking" class="dt-btn-blue dt-btn--height-50">
            <span class="dt-font--size-12">Назад к списанию</span>
        </button>
        <h1 class="dt-content__title fw-bold">Забронировать экскурсию «Медовые водопады»</h1>
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
                    <input type="date" name="name" placeholder="Выберите дату"
                           class="dt-input" autocomplete="off">
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
                    <input type="time" name="name" placeholder="Время" class="dt-input" autocomplete="off">
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
            <div class="dt-ticket__item">
                <div class="dt-ticket__name"></div>
                <div class="dt-ticket__price"></div>
                <div class="dt-counter"></div>
                <div class="dt-total-price"></div>
            </div>
        </div>
        <div class="dt-check__group dt-content--bottom-60">
            <label class="dt-check__group-title">дополнительные услуги </label>
            <div class="dt-checkboxes-vertical d-flex">
                <div class="dt-check">
                    <div class="dt-check__input">
                        <input type="checkbox" name="type_person"/>
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__label dt-check__label--thin">
                        <slot name="label">
                            <p>страховка</p>
                        </slot>
                    </label>
                </div>
                <div class="dt-check">
                    <div class="dt-check__input">
                        <input type="checkbox" name="type_person"/>
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__label dt-check__label--thin">
                        <slot name="label">
                            <p>трансфер</p>
                        </slot>
                    </label>
                </div>
                <div class="dt-check">
                    <div class="dt-check__input">
                        <input type="checkbox" name="type_person"/>
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__label dt-check__label--thin">
                        <slot name="label">
                            <p>отель</p>
                        </slot>
                    </label>
                </div>
                <div class="dt-check">
                    <div class="dt-check__input">
                        <input type="checkbox" name="type_person"/>
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__label dt-check__label--thin">
                        <slot name="label">
                            <p>такси</p>
                        </slot>
                    </label>
                </div>
                <div class="dt-check">
                    <div class="dt-check__input">
                        <input type="checkbox" name="type_person"/>
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__label dt-check__label--thin">
                        <slot name="label">
                            <p>билеты</p>
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
                                <p class="dt-price__non-active">25 200</p>
                            </span>
                </div>
                <div class="dt-price__active me-2">21 900</div>
                <span class="text-muted-black fw-regular">за 1 человека</span>
            </div>
        </div>
        <div class="dt-personal-data dt-content--bottom-60">
            <div class="row dt-personal-data__item">
                <div class="col-lg-3">
                    <label class="dt-personal-data__label">ваша Фамилия Имя Отчество</label>
                </div>
                <div class="col-lg-9">
                    <div class="dt-input__wrapper">
                        <div class="dt-input__group">
                            <input type="text" name="user" placeholder="Иванов Иван Иванович"
                                   class="dt-input" autocomplete="off">
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
                            <input type="text" name="phone" placeholder="+7 (000) 000-00-00"
                                   class="dt-input" autocomplete="off">
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
                            <input type="email" name="email" placeholder="name@mail.ru"
                                   class="dt-input" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row dt-content--bottom-60">
            <div class="col-lg-6">
                <div class="dt-check align-items-start mb-3">
                    <div class="dt-check__input">
                        <input type="checkbox"/>
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
                        <input type="checkbox"/>
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
                <button class="dt-btn-blue w-100">
                    <span>Оформить заказ</span>
                </button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    methods: {
        closeBooking() {
            this.$emit('closeBooking');
        }
    }
}
</script>
