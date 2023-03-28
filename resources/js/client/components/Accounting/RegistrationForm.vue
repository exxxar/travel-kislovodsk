<template>
    <form v-on:submit.prevent="preRegistration">
        <div class="dt-check align-items-start mt-2">
            <div class="dt-check__input input-border">
                <input type="checkbox" v-model="i_am_guide"/>
                <div class="dt-check__input-check"></div>
            </div>
            <label class="dt-check__label">
                <slot name="label">
                    <h5>Я хочу стать гидом</h5>
                </slot>
            </label>
        </div>
        <div class="dt-check__group mt-2" v-if="i_am_guide">

            <div class="dt-check align-items-start">
                <div class="dt-check__input">
                    <input type="radio" name="type_person" v-model="form.law_status" value="0"/>
                    <div class="dt-check__input-check"></div>
                </div>
                <label class="dt-check__label">
                    <slot name="label">
                        <h5>Пользователь</h5>
                    </slot>
                </label>
            </div>

            <h3 class="mb-2 mt-2">Выберите тип вашей организации</h3>
            <div class="dt-check align-items-start">
                <div class="dt-check__input">
                    <input type="radio" name="type_person" v-model="form.law_status" value="1"/>
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
                    <input type="radio" name="type_person" v-model="form.law_status" value="2"/>
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
                    <input type="radio" name="type_person" v-model="form.law_status" value="3"/>
                    <div class="dt-check__input-check"></div>
                </div>
                <label class="dt-check__label">
                    <slot name="label">
                        <h5>Самозанятый</h5>
                    </slot>
                </label>
            </div>
        </div>
        <div v-if="i_am_guide">
            <h3 class="mb-2 mt-2">Данные о вашей организации</h3>
            <div class="dt-input__wrapper">
                <div class="d-flex align-items-center justify-content-between"><label
                    class="dt-input__label">Название<span class="red ml-2fs-6">*</span></label>
                </div>
                <div class="dt-input__group input-border">
                    <input type="text" name="company_title" id="company_title_reg"
                           v-model="form.company.title"
                           placeholder="ООО 'Кисловодск-Тревел'" class="dt-input"
                           autocomplete="off">
                    <div class="dt-input__group-item">
                        <div class="dt-input__icon">
                            <i class="fa-solid fa-database"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dt-input__wrapper">
                <div class="d-flex align-items-center justify-content-between"><label
                    class="dt-input__label">Короткое описание</label>
                </div>
                <div class="dt-input__group input-border">
                    <input type="text"
                           maxlength="255"
                           name="company_description" id="company_description_reg"
                           v-model="form.company.description"
                           placeholder="Кратко о компании" class="dt-input"
                           autocomplete="off">
                    <div class="dt-input__group-item">
                        <div class="dt-input__icon">
                            <i class="fa-solid fa-database"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dt-input__wrapper">
                <div class="d-flex align-items-center justify-content-between"><label
                    class="dt-input__label">Юридический адрес</label>
                </div>
                <div class="dt-input__group input-border">
                    <input type="text"
                           maxlength="255"
                           name="company_law_address" id="company_law_address_reg"
                           v-model="form.company.law_address"
                           placeholder="Кратко о компании" class="dt-input"
                           autocomplete="off">
                    <div class="dt-input__group-item">
                        <div class="dt-input__icon">
                            <i class="fa-solid fa-database"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dt-input__wrapper">
                <div class="d-flex align-items-center justify-content-between"><label
                    class="dt-input__label">ОГРН<span class="red ml-2fs-6">*</span></label>
                </div>
                <div class="dt-input__group input-border">
                    <input type="number"
                           maxlength="255"
                           name="company_ogrn" id="company_ogrn_reg"
                           v-model="form.company.ogrn"
                           placeholder="ОГРН компании" class="dt-input"
                           autocomplete="off">
                    <div class="dt-input__group-item">
                        <div class="dt-input__icon">
                            <i class="fa-solid fa-database"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dt-input__wrapper mb-5">
                <div class="d-flex align-items-center justify-content-between"><label
                    class="dt-input__label">ИНН<span class="red ml-2fs-6">*</span></label>
                </div>
                <div class="dt-input__group input-border">
                    <input type="number"
                           maxlength="255"
                           name="company_inn" id="company_inn_reg"
                           v-model="form.company.inn"
                           placeholder="ИНН компании" class="dt-input"
                           autocomplete="off">
                    <div class="dt-input__group-item">
                        <div class="dt-input__icon">
                            <i class="fa-solid fa-database"></i>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
        </div>
        <div class="dt-input__wrapper mt-5">
            <div class="d-flex align-items-center justify-content-between"><label
                class="dt-input__label">Имя аккаунта<span class="red ml-2fs-6">*</span></label>
            </div>
            <div class="dt-input__group input-border">
                <input type="text" name="username" id="username_reg"
                       pattern="[A-Za-z0-9]+"
                       v-model="form.username"
                       maxlength="255"
                       placeholder="Иван" class="dt-input"
                       autocomplete="off">
                <div class="dt-input__group-item">
                    <div class="dt-input__icon">
                        <i class="fa-regular fa-building"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="dt-input__wrapper">
            <div class="d-flex align-items-center justify-content-between"><label
                class="dt-input__label">Фамилия<span class="red ml-2fs-6">*</span></label>
            </div>
            <div class="dt-input__group input-border">
                <input type="text" name="last_name" id="last_name_reg"
                       v-model="form.last_name"
                       placeholder="Иванов" class="dt-input"
                       autocomplete="off">
                <div class="dt-input__group-item">
                    <div class="dt-input__icon">
                        <i class="fa-regular fa-user"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="dt-input__wrapper">
            <div class="d-flex align-items-center justify-content-between"><label
                class="dt-input__label">Имя<span class="red ml-2fs-6">*</span></label>
            </div>
            <div class="dt-input__group input-border">
                <input type="text" name="first_name" id="first_name_reg"
                       v-model="form.first_name"
                       placeholder="Иван" class="dt-input"
                       autocomplete="off">
                <div class="dt-input__group-item">
                    <div class="dt-input__icon">
                        <i class="fa-regular fa-user"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="dt-input__wrapper">
            <div class="d-flex align-items-center justify-content-between"><label
                class="dt-input__label">Отчество</label>
            </div>
            <div class="dt-input__group input-border">
                <input type="text" name="patronymic" id="patronymic_reg"
                       v-model="form.patronymic"
                       placeholder="Иванович" class="dt-input"
                       autocomplete="off">
                <div class="dt-input__group-item">
                    <div class="dt-input__icon">
                        <i class="fa-regular fa-user"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="dt-input__wrapper">
            <div class="d-flex align-items-center justify-content-between">
                <label class="dt-input__label">Телефон<span class="red ml-2fs-6">*</span></label>
            </div>
            <div class="dt-input__group input-border">

                <input type="text" name="phone" id="phone_reg"
                       v-model="form.phone"
                       v-mask="'+7(###)###-##-##'"
                       placeholder="+7(000)000-00-00"
                       class="dt-input" autocomplete="off">
                <div class="dt-input__group-item">
                    <div class="dt-input__icon">
                        <i class="fa-solid fa-phone-volume"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="dt-input__wrapper">
            <div class="d-flex align-items-center justify-content-between">
                <label class="dt-input__label">Почта<span class="red ml-2fs-6">*</span></label>
            </div>
            <div class="dt-input__group input-border">

                <input type="text" name="email" id="email_reg"
                       v-model="form.email"
                       placeholder="test@travel.com"
                       class="dt-input" autocomplete="off">
                <div class="dt-input__group-item">
                    <div class="dt-input__icon">
                        <i class="fa-solid fa-at"></i>
                    </div>
                </div>
            </div>
        </div>






        <div class="dt-input__wrapper">
            <div class="d-flex align-items-center justify-content-between">
                <label class="dt-input__label">Пароль<span class="red ml-2fs-6">*</span></label>
            </div>
            <div class="dt-input__group input-border">
                <input type="password"
                       v-model="form.password"
                       name="password" id="password" class="dt-input">
            </div>
        </div>
        <div class="dt-input__wrapper">
            <div class="d-flex align-items-center justify-content-between">
                <label class="dt-input__label">Повторите пароль<span class="red ml-2fs-6">*</span></label>
            </div>
            <div class="dt-input__group input-border">
                <input type="password"
                       v-model="form.confirm_password"
                       name="confirm_password" id="confirm_password" class="dt-input">
            </div>
        </div>

        <div class="dt-check align-items-start mt-2">
            <div class="dt-check__input input-border">
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
        <div class="d-flex align-items-center justify-content-center w-100" v-if="!is_send_sms">
            <button class="btn dt-btn dt-btn-blue w-100"
                    type="submit"
                    :disabled="!accept_rules">
                <span v-if="!load" class="text-white"> Регистрация</span>
                <div v-if="load" class="spinner-border text-white" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </button>
        </div>


    </form>

    <form v-on:submit.prevent="registration" v-if="is_send_sms">
        <div class="alert alert-warning" role="alert">
            Вам должен прийти телефонный вызов. Последние 4 цифры номера - код подтверждения.
        </div>

        <div class="dt-input__wrapper mb-4">
            <div class="d-flex align-items-center justify-content-between"><label
                class="dt-input__label">sms-код подтверждения</label>
            </div>
            <div class="dt-input__group input-border">
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
                    type="submit"
            >

                <span v-if="!load" class="text-white"> Отправить</span>
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
            is_send_sms: false,
            i_am_guide: false,
            load:false,
            form: {
                username: null,
                photo: null,
                code: null,
                first_name: null,
                last_name: null,
                patronymic: null,
                phone: null,
                email: null,
                law_status: 0,

                password: null,
                confirm_password: null,

                company: {
                    title: null,
                    logo: null,
                    description: null,
                    inn: null,
                    ogrn: null,
                    law_address: null,
                }
            },
            accept_rules: false,
        }
    },
    watch: {
        'i_am_guide': function (oldVal, newVal) {
            this.form.law_status = this.i_am_guide ? 1 : 0;
        }
    },
    methods: {
        preRegistration() {
            this.load = true
            this.$store.dispatch("preRegistration", this.form).then((response) => {
                if (response.data.sms) {
                    this.$notify({
                        title: "Кисловодск-Туризм",
                        text: "Вам отправили телефонный вызов! Код - последние 4 цифры",
                        type: 'warn'
                    });

                    this.is_send_sms = true
                } else {
                    let role = response.data.role
                    window.location.href = `/${role}-cabinet`
                }
                this.load = false
            }).catch(()=>{
                this.load = false
            })
        },
        registration() {
            this.is_send_sms = false
            this.load = true
            this.$store.dispatch("registration", this.form).then((response) => {
                if (response.data.sms) {
                    this.$notify({
                        title: "Кисловодск-Туризм",
                        text: "Вам повторно отправили телефонный вызов! Код - последние 4 цифры",
                        type: 'warn'
                    });

                    this.is_send_sms = true
                } else {
                    let role = response.data.role
                    window.location.href = `/${role}-cabinet`
                }
                this.load = false
            }).catch(()=>{
                this.is_send_sms = true
                this.load = false
            })
        }
    }
}
</script>
<style>
.input-border {
    border: 2px solid rgb(0 123 255);
}
</style>
