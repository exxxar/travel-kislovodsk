<template>
    <form v-on:submit.prevent="login">
        <div class="dt-actions d-flex mb-4">
            <div class="dt-entry-gosuslugi flex-fill w-100 me-3">
                <a href="/vk-login" target="_blank" class="btn dt-btn-transparent">
                    <img v-lazy="'/img/VK_Full_Logo_(2021-present).svg.png'" alt="">
                </a>
            </div>
            <div class="dt-entry-vk flex-fill w-100">
                <button class="btn dt-btn-transparent">
                    <img v-lazy="'/img/logo-gosuslugi-ru.png'" alt="">
                </button>
            </div>
        </div>
        <div class="dt-input__wrapper mb-4">
            <div class="d-flex align-items-center justify-content-between"><label
                class="dt-input__label"><span v-if="is_email">почта</span><span v-else>телефон</span></label>

                <span class="mb-2" @click="is_email = !is_email" v-if="is_email">Войти по номеру телефона</span>
                <span class="mb-2" @click="is_email = !is_email" v-if="!is_email">Войти через email</span>
            </div>
            <div class="dt-input__group">
                <input type="text" name="phone"
                       v-model="form.username"
                       v-if="!is_email"
                       v-mask="'+7(###)###-##-##'"
                       placeholder="+7(000)000-00-00"
                       class="dt-input" autocomplete="off">

                <input type="text" name="email"
                       v-model="form.username"
                       v-if="is_email"
                       placeholder="index@example.com"
                       class="dt-input" autocomplete="off">
                <div class="dt-input__group-item">
                    <div class="dt-input__icon" v-if="!is_email">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div class="dt-input__icon" v-if="is_email">
                        <i class="fa-solid fa-at"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="dt-input__wrapper mb-4">
            <div class="d-flex align-items-center justify-content-between"><label
                class="dt-input__label">пароль</label>
            </div>
            <div class="dt-input__group">
                <input :type="is_hidden_password?'password':'text'" name="password"
                       v-model="form.password" class="dt-input" autocomplete="off">
                <div class="dt-input__group-item">
                    <div class="dt-input__icon" @click="is_hidden_password=!is_hidden_password">
                        <i class="fa-solid fa-eye" v-if="is_hidden_password"></i>
                        <i class="fa-solid fa-eye-slash" v-else></i>

                    </div>
                </div>
            </div>
        </div>
        <div class="dt-check align-items-start mb-4">
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
        <div class="d-flex align-items-center justify-content-center w-100">
            <button class="btn dt-btn dt-btn-blue w-100"
                    type="submit" :disabled="!accept_rules">Войти
            </button>
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            is_email: false,
            is_hidden_password:true,
            form: {
                username: null,
                password: null,
            },
            accept_rules: false,
        }
    },
    methods: {
        login() {
            this.$store.dispatch("login", this.form)
        }
    }
}
</script>
