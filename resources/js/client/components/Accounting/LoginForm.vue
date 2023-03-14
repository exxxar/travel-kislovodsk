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

                <div class="form-check form-switch d-flex align-items-center">
                    <label class="form-check-label d-flex"
                           @click="is_email = !is_email"
                           for="switchEmailPhoneEntrance">
                         <span class="mb-2 cursor-pointer"
                               v-if="is_email">Войти по номеру телефона</span>
                        <span class="mb-2 cursor-pointer"
                              v-else>Войти через email</span>

                        <input class="form-check-input"
                               style="margin-left:10px; margin-right: 5px;"
                               type="checkbox" id="switchEmailPhoneEntrance">
                    </label>


                </div>


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

        <div class="dt-input__wrapper mb-4" v-if="is_send_sms">
            <div class="d-flex align-items-center justify-content-between"><label
                class="dt-input__label">sms-код подтверждения</label>
            </div>
            <div class="dt-input__group">
                <input type="text" name="sms"
                       v-mask="'####'"
                       placeholder="XXXX"
                       maxlength="4"
                       minlength="4"
                       v-model="form.code" class="dt-input" autocomplete="off">
                <div class="dt-input__group-item">
                    <div class="dt-input__icon">
                        <i class="fa-solid fa-comment-sms"></i>
                    </div>
                </div>


            </div>

        </div>

        <div class="d-flex align-items-center justify-content-center w-100">
            <button class="btn dt-btn dt-btn-blue w-100"
                    type="submit" :disabled="!accept_rules">
                <span v-if="!load" class="text-white">Войти</span>
                <div v-if="load" class="spinner-border text-white" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </button>
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            load: false,
            is_send_sms: false,
            is_email: false,
            is_hidden_password: true,
            form: {
                username: null,
                password: null,
                code: null,
            },
            accept_rules: false,
        }
    },
    methods: {
        login() {
            this.is_send_sms = false
            this.load = true
            this.$store.dispatch(this.form.code == null ? "login" : 'loginWithCode', this.form).then(response => {
                if (response.data.sms) {
                    this.$notify({
                        title: "Кисловодск-Туризм",
                        text: response.data.message,
                        type: 'warn'
                    });

                    this.is_send_sms = true
                } else {
                    let role = response.data.role

                    if (role !== 'admin')
                        window.location.href = `/${role}-cabinet`
                    else
                        window.location.href = `/admin/cabinet`
                }

                this.load = false
            }).catch(() => {
                this.load = false
            })
        }
    }
}
</script>
<style lang="scss">
.dt-btn-transparent {
    padding: 10px 20px;
    width: 100%;

    img {
        object-fit: contain;
        height: 100%;
        width: 100%;
    }
}

.cursor-pointer {
    cursor: pointer;
}
</style>
