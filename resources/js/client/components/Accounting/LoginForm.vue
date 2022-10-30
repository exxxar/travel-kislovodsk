<template>
    <div class="dt-actions d-flex">
        <div class="dt-entry-gosuslugi flex-fill w-100 me-3">
            <button class="btn dt-btn-transparent">
                <img v-lazy="'/img/VK_Full_Logo_(2021-present).svg.png'" alt="">
            </button>
        </div>
        <div class="dt-entry-vk flex-fill w-100">
            <button class="btn dt-btn-transparent">
                <img v-lazy="'/img/logo-gosuslugi-ru.png'" alt="">
            </button>
        </div>
    </div>
    <div class="dt-input__wrapper">
        <div class="d-flex align-items-center justify-content-between"><label
            class="dt-input__label">телефон</label>
        </div>
        <div class="dt-input__group">
            <input type="text" name="name" placeholder="+7 (000) 000-00-00"
                   class="dt-input" autocomplete="off">
            <div class="dt-input__group-item">
                <div class="dt-input__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%"
                         viewBox="0 0 48 48" fill="#0071eb">
                        <path d="M39.8 42.65q-6.25 0-12.4-3.05t-11.075-7.95Q11.4 26.75 8.35 20.575 5.3 14.4 5.3 8.2q0-1.25.85-2.1.85-.85 2.05-.85h7q1.2 0 1.975.675Q17.95 6.6 18.2 7.8l1.35 5.85q.2 1.05-.025 1.875T18.7 16.9l-5.15 4.85q2.65 4.3 5.8 7.425t7.1 5.275l4.9-5q.7-.75 1.575-1.025.875-.275 1.875-.025l5.35 1.25q1.2.3 1.875 1.125T42.7 32.8v6.9q0 1.25-.85 2.1-.85.85-2.05.85Zm-28.2-24.4 4-3.9-1.1-5.1H9.3q-.05 1.8.5 3.975t1.8 5.025Zm18.5 18.2q1.9.9 4.175 1.475 2.275.575 4.425.725V33.4L34 32.35Zm-18.5-18.2Zm18.5 18.2Z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="dt-input__wrapper">
        <div class="d-flex align-items-center justify-content-between"><label
            class="dt-input__label">пароль</label>
        </div>
        <div class="dt-input__group">
            <input type="password" name="name" class="dt-input" autocomplete="off">
            <div class="dt-input__group-item">
                <div class="dt-input__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%"
                         viewBox="0 0 48 48" fill="#222425" opacity="0.15">
                        <path d="M24 31.5q3.55 0 6.025-2.475Q32.5 26.55 32.5 23q0-3.55-2.475-6.025Q27.55 14.5 24 14.5q-3.55 0-6.025 2.475Q15.5 19.45 15.5 23q0 3.55 2.475 6.025Q20.45 31.5 24 31.5Zm0-3.7q-2 0-3.4-1.4T19.2 23q0-2 1.4-3.4t3.4-1.4q2 0 3.4 1.4t1.4 3.4q0 2-1.4 3.4T24 27.8Zm0 11.35q-7.7 0-13.9-4.5T.85 23q3.05-7.15 9.25-11.65T24 6.85q7.7 0 13.9 4.5T47.15 23q-3.05 7.15-9.25 11.65T24 39.15ZM24 23Zm0 12q6 0 11.05-3.275Q40.1 28.45 42.75 23q-2.65-5.45-7.675-8.725Q30.05 11 24 11q-6 0-11.05 3.275Q7.9 17.55 5.2 23q2.7 5.45 7.725 8.725Q17.95 35 24 35Z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="dt-check align-items-start">
        <div class="dt-check__input">
            <input type="checkbox"/>
            <div class="dt-check__input-check"></div>
        </div>
        <label class="dt-check__label">
            <slot name="label">
                <h5> Я соглашаюсь с <a href="#">Условиями использования сайта</a>
                    и даю согласие на обработку своих персональных данных в соответствии с
                    <a href="#">Политикой обработки персональных данных.</a>
                </h5>
            </slot>
        </label>
    </div>
    <div class="btn dt-btn-blue d-flex align-items-center justify-content-center w-100">
        <span>Войти</span>
    </div>
</template>
