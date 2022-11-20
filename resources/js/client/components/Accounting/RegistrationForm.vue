<template>
    <form v-on:submit.prevent="registration">
    <div class="dt-input__wrapper">
        <div class="d-flex align-items-center justify-content-between"><label
            class="dt-input__label">имя</label>
        </div>
        <div class="dt-input__group">
            <input type="text" name="name" id="name_reg"
                   v-model="form.name"
                   placeholder="Иван" class="dt-input"
                   autocomplete="off">
            <div class="dt-input__group-item">
                <div class="dt-input__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" height="100%" width="100%"
                         viewBox="0 0 48 48" fill="#0071eb">
                        <path d="M24 23.8q-3.45 0-5.625-2.175T16.2 16q0-3.45 2.175-5.625T24 8.2q3.45 0 5.625 2.175T31.8 16q0 3.45-2.175 5.625T24 23.8ZM7.7 40.45v-5q0-2 1-3.425 1-1.425 2.55-2.175 3.4-1.5 6.5-2.25t6.25-.75q3.15 0 6.225.775Q33.3 28.4 36.7 29.9q1.6.7 2.6 2.125t1 3.425v5Zm3.4-3.4h25.8V35.5q0-.8-.475-1.525-.475-.725-1.175-1.075-3.15-1.5-5.775-2.075Q26.85 30.25 24 30.25q-2.85 0-5.525.575Q15.8 31.4 12.7 32.9q-.7.35-1.15 1.075-.45.725-.45 1.525ZM24 20.4q1.9 0 3.15-1.25T28.4 16q0-1.9-1.25-3.15T24 11.6q-1.9 0-3.15 1.25T19.6 16q0 1.9 1.25 3.15T24 20.4Zm0-4.4Zm0 21.05Z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="dt-input__wrapper">
        <div class="d-flex align-items-center justify-content-between">
            <label class="dt-input__label">телефон</label>
        </div>
        <div class="dt-input__group">

            <input type="text" name="phone" id="phone_reg"
                   v-model="form.phone"
                   v-mask="'+7(###)###-##-##'"
                   placeholder="+7(000)000-00-00"
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
    <div class="dt-check__group">
        <div class="dt-check align-items-start">
            <div class="dt-check__input">
                <input type="radio" name="type_person" v-model="form.law_status" value="0"/>
                <div class="dt-check__input-check"></div>
            </div>
            <label class="dt-check__label">
                <slot name="label">
                    <h5>Физическое лицо</h5>
                </slot>
            </label>
        </div>
        <div class="dt-check align-items-start">
            <div class="dt-check__input">
                <input type="radio" name="type_person" v-model="form.law_status" value="1"/>
                <div class="dt-check__input-check"></div>
            </div>
            <label class="dt-check__label">
                <slot name="label">
                    <h5>Юридическое лицо</h5>
                </slot>
            </label>
        </div>
        <div class="dt-check align-items-start">
            <div class="dt-check__input">
                <input type="radio" name="type_person" v-model="form.law_status" value="2"/>
                <div class="dt-check__input-check"></div>
            </div>
            <label class="dt-check__label">
                <slot name="label">
                    <h5>Самозанятый</h5>
                </slot>
            </label>
        </div>
    </div>
    <div class="dt-input__wrapper">
        <div class="d-flex align-items-center justify-content-between">
            <label class="dt-input__label">пароль</label>
        </div>
        <div class="dt-input__group">
            <input type="password"
                   v-model="form.password"
                   name="password" id="password" class="dt-input">
        </div>
    </div>
    <div class="dt-input__wrapper">
        <div class="d-flex align-items-center justify-content-between">
            <label class="dt-input__label">повторите пароль</label>
        </div>
        <div class="dt-input__group">
            <input type="password"
                   v-model="form.confirm_password"
                   name="confirm_password" id="confirm_password" class="dt-input">
        </div>
    </div>

    <div class="dt-check align-items-start">
        <div class="dt-check__input">
            <input type="checkbox" v-model="accept_rules"/>
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
        <button class="btn dt-btn-blue w-100"
                type="submit"
                :disabled="!accept_rules">
            Регистрация</button>
    </div>
    </form>
</template>
<script>

export default {
    data() {
        return {
            form: {
                name: null,
                phone: null,
                law_status: 1,
                password: null,
                confirm_password: null,
            },
            accept_rules: false,
        }
    },
    methods: {
        registration() {
            this.$store.dispatch("registration", this.form)
        }
    }
}
</script>
