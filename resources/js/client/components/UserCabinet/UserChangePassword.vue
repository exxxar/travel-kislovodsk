<template>
    <form class="personal-account__content">
        <h2 class="personal-account__title personal-account__title_black fw-bold">
            Смена пароля
        </h2>
        <form v-on:submit.prevent="submitPassword" class="personal-account-changing-password">
            <div class="personal-account-changing-password-input__container">
                <div class="dt-input__wrapper">
                    <div class="d-flex align-items-center justify-content-between"><label
                        class="dt-input__label">Новый пароль</label>
                    </div>
                    <div class="dt-input__group bg-white">
                        <input type="password"
                               v-model="form_password.password"
                               class="dt-input" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="personal-account-changing-password-input__container">
                <div class="dt-input__wrapper">
                    <div class="d-flex align-items-center justify-content-between"><label
                        class="dt-input__label">Повторите новый пароль</label>
                    </div>
                    <div class="dt-input__group bg-white">
                        <input type="password"
                               v-model="form_password.confirm_password"
                               class="dt-input" autocomplete="off">
                    </div>
                </div>
            </div>
            <button type="submit" class="personal-account-changing-password__submit dt-btn-blue personal-account__submit">
                <span>Сохранить</span>
            </button>
        </form>
    </form>
</template>

<script>


export default {

    data() {
        return {

            form_password: {
                password: null,
                confirm_password: null,
                is_success_saved: false,
            },
        }
    },
    mounted() {


    },
    computed: {
        user() {
            return window.user
        },
    },
    methods: {
        submitPassword() {
            this.form_password.is_success_saved = false;
            this.$store.dispatch("updateUserPassword", this.form_password).then(() => {
                this.form_password.is_success_saved = true;

                this.form_password.password = null
                this.form_password.confirm_password = null

                this.$notify({
                    title: "Кабинет туриста",
                    text: "Пароль успешно обновлен",
                    type: 'success'
                });
            })
        },

    }
}
</script>

