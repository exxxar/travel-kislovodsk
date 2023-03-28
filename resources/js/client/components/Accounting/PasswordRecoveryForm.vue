<template>
    <div class="dt-modal-body">
        <form v-on:submit.prevent="recoveryStep0" v-if="step===0">
            <div class="dt-input__wrapper">
                <div class="d-flex align-items-center justify-content-between"><label
                    class="dt-input__label">ваш телефон</label>
                </div>
                <div class="dt-input__group input-border">
                    <input type="text" name="phone"
                           v-mask="'+7(###)###-##-##'"
                           placeholder="+7(000)000-00-00"
                           v-model="form.phone"
                           class="dt-input" autocomplete="off">
                    <div class="dt-input__group-item">
                        <div class="dt-input__icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn dt-btn dt-btn-blue w-100 mt-2">
                <span v-if="!load" class="text-white">Выслать код для восстановления</span>
                <div v-if="load" class="spinner-border text-white" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </button>
        </form>

        <form v-on:submit.prevent="recoveryStep1" v-if="step===1">
            <div class="dt-input__wrapper">
                <div class="d-flex align-items-center justify-content-between"><label
                    class="dt-input__label">введите код из смс</label>
                </div>
                <div class="dt-input__group input-border">
                    <input type="text"
                           v-mask="'####'"
                           placeholder="XXXX"
                           v-model="form.code"
                           name="sms" class="dt-input" autocomplete="off">

                    <div class="dt-input__group-item">
                        <div class="dt-input__icon">
                            <i class="fa-solid fa-comment-sms"></i>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn dt-btn dt-btn-blue w-100 mt-2">

                <span v-if="!load" class="text-white"> Сменить пароль</span>
                <div v-if="load" class="spinner-border text-white" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </button>
        </form>

        <form v-on:submit.prevent="recoveryStep2" v-if="step===2">
            <div class="dt-input__wrapper">
                <div class="d-flex align-items-center justify-content-between"><label
                    class="dt-input__label">новый пароль</label>
                </div>
                <div class="dt-input__group input-border">
                    <input type="password"
                           v-model="form.password"
                           name="password" class="dt-input">
                </div>
            </div>
            <div class="dt-input__wrapper">
                <div class="d-flex align-items-center justify-content-between"><label
                    class="dt-input__label">повторите новый пароль</label>
                </div>
                <div class="dt-input__group input-border">
                    <input type="password"
                           v-model="form.confirm_password"
                           name="confirm_password" class="dt-input">
                </div>
            </div>
            <button class="btn dt-btn dt-btn-blue d-flex align-items-center justify-content-center w-100 mt-2">
                <span v-if="!load" class="text-white"> Отправить</span>
                <div v-if="load" class="spinner-border text-white" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </button>
        </form>

        <div v-if="step===3">
            <div class="dt-success-notification text-center">
                <svg xmlns="http://www.w3.org/2000/svg" height="40" width="40" viewBox="0 0 48 48">
                    <path
                        d="M21.05 33.1 35.2 18.95l-2.3-2.25-11.85 11.85-6-6-2.25 2.25ZM24 44q-4.1 0-7.75-1.575-3.65-1.575-6.375-4.3-2.725-2.725-4.3-6.375Q4 28.1 4 24q0-4.15 1.575-7.8 1.575-3.65 4.3-6.35 2.725-2.7 6.375-4.275Q19.9 4 24 4q4.15 0 7.8 1.575 3.65 1.575 6.35 4.275 2.7 2.7 4.275 6.35Q44 19.85 44 24q0 4.1-1.575 7.75-1.575 3.65-4.275 6.375t-6.35 4.3Q28.15 44 24 44Zm0-3q7.1 0 12.05-4.975Q41 31.05 41 24q0-7.1-4.95-12.05Q31.1 7 24 7q-7.05 0-12.025 4.95Q7 16.9 7 24q0 7.05 4.975 12.025Q16.95 41 24 41Zm0-17Z"/>
                </svg>
                <h3>Вы успешно изменили пароль</h3>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            step: 0,
            load: false,
            form: {
                phone: null,
                password: null,
                confirm_password: null,
                code: null,
            },
        }
    },
    mounted() {
       this.step = 0
        this.eventBus.on("reset_recovery_form", ()=>{
            this.step = 0
            this.form.phone = null
            this.form.code = null
            this.form.password = null
            this.form.confirm_password = null
        })
    },
    activated() {
      this.step = 0
    },
    methods: {
        recoveryStep0() {
            this.step = 0
            this.load = true
            this.$store.dispatch('preRecovery', this.form).then(response => {
                if (response.data.sms)
                {
                    this.step = 1
                    this.$notify({
                        title: "Кисловодск-Туризм",
                        text: response.data.message,
                        type: 'success'
                    });

                }

                this.load = false

            }).catch(()=>{
                this.load = false
            })

        },
        recoveryStep1() {
            this.$store.dispatch('preRecoveryCode', this.form).then(response => {
                if (response.data.sms) {
                    this.step=2
                    this.$notify({
                        title: "Кисловодск-Туризм",
                        text: response.data.message,
                        type: 'success'
                    });
                }
            }).catch(()=>{
                this.step = 0
                this.form.code = null
                this.load = false
            })
        },
        recoveryStep2() {

            this.$store.dispatch('recovery', this.form).then(response => {
                if (response.data.sms) {
                    this.step = 3

                    this.$notify({
                        title: "Кисловодск-Туризм",
                        text: response.data.message,
                        type: 'success'
                    });

                }

            }).catch(()=>{
                this.step = 0
                this.form.code = null
                this.form.password = null
                this.form.confirm_password = null
                this.load = false
            })
        }

    }
}
</script>
