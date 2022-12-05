<template>
    <div class="personal-account__content">
        <h2 class="personal-account__title personal-account__title_black fw-bold">
            Настройка профиля
        </h2>

        <div class="mb-4 mx-0 position-relative">
            <h3 class="mb-2 mt-3">Информация о пользователе</h3>
            <form v-on:submit.prevent="submitGuide">
                <div class="dt-input__wrapper">
                    <div class="d-flex align-items-center justify-content-between"><label
                        class="dt-input__label">Фамилия</label>
                    </div>
                    <div class="dt-input__group bg-white"
                         v-bind:class="{'border-success':form_user.is_success_saved}"
                    >
                        <input type="text" placeholder="Иванов" class="dt-input"
                               v-model="form_user.last_name"

                               autocomplete="off" maxlength="255" required>
                        <div class="dt-input__group-item">
                            <div class="dt-input__icon">
                                <i class="fa-regular fa-user"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dt-input__wrapper mt-2">
                    <div class="d-flex align-items-center justify-content-between"><label
                        class="dt-input__label">Имя</label>
                    </div>
                    <div class="dt-input__group bg-white"
                         v-bind:class="{'border-success':form_user.is_success_saved}"
                    >
                        <input type="text" placeholder="Иван" class="dt-input"
                               v-model="form_user.first_name"

                               autocomplete="off" maxlength="255">
                        <div class="dt-input__group-item">
                            <div class="dt-input__icon">
                                <i class="fa-regular fa-user"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dt-input__wrapper mt-2">
                    <div class="d-flex align-items-center justify-content-between"><label
                        class="dt-input__label">Отчество</label>
                    </div>
                    <div class="dt-input__group bg-white"
                         v-bind:class="{'border-success':form_user.is_success_saved}"
                    >
                        <input type="text" placeholder="Иванович" class="dt-input"
                               v-model="form_user.patronymic"

                               autocomplete="off" maxlength="255">
                        <div class="dt-input__group-item">
                            <div class="dt-input__icon">
                                <i class="fa-regular fa-user"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dt-input__wrapper d-flex mt-3 mb-3">
                    <label class="dt-check__input">
                        <input type="checkbox" id="check-1"
                               :checked="form_user.email_notification"
                               v-model="form_user.email_notification"/>
                        <div class="dt-check__input-check"></div>
                    </label>
                    <label class="dt-check__label" for="check-1">
                        Оповещать по Email
                    </label>
                </div>

                <div class="dt-input__wrapper d-flex mt-3 mb-3">
                    <label class="dt-check__input">
                        <input type="checkbox" id="check-2"
                               :checked="form_user.sms_notification"
                               v-model="form_user.sms_notification"/>
                        <div class="dt-check__input-check"></div>
                    </label>
                    <label class="dt-check__label" for="check-2">
                        Оповещать по SMS
                    </label>
                </div>
                <div class="row col-12 col-lg-5 col-xl-4 col-xxl-3 mx-0 pe-lg-5 mt-3">
                    <button type="submit" class="big-button bg-blue bold px-4 px-xxl-5 font-size-09 rounded">Сохранить
                    </button>
                </div>
            </form>
            <h3 class="mb-2 mt-3">Изменение пароля</h3>
            <form v-on:submit.prevent="submitPassword">
                <div class="dt-input__wrapper ">
                    <div class="d-flex align-items-center justify-content-between"><label
                        class="dt-input__label">Пароль</label>
                    </div>
                    <div class="dt-input__group bg-white"
                         v-bind:class="{'border-success':form_password.is_success_saved}"
                    >
                        <input type="password" placeholder="Пароль" class="dt-input"
                               v-model="form_password.password"

                               autocomplete="off" maxlength="255">
                        <div class="dt-input__group-item">
                            <div class="dt-input__icon">
                                <i class="fa-solid fa-key"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dt-input__wrapper mt-2">
                    <div class="d-flex align-items-center justify-content-between"><label
                        class="dt-input__label">Повторно пароль</label>
                    </div>
                    <div class="dt-input__group bg-white"
                         v-bind:class="{'border-success':form_password.is_success_saved}"
                    >
                        <input type="password" placeholder="Пароль" class="dt-input"
                               v-model="form_password.confirm_password"

                               autocomplete="off" maxlength="255">
                        <div class="dt-input__group-item">
                            <div class="dt-input__icon">
                                <i class="fa-solid fa-key"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row col-12 col-lg-5 col-xl-4 col-xxl-3 mx-0 pe-lg-5 mt-3">
                    <button type="submit" class="big-button bg-blue bold px-4 px-xxl-5 font-size-09 rounded">Сохранить
                    </button>
                </div>
            </form>

            <h3 class="mb-2 mt-3">Данные авторизации</h3>


            <form v-on:submit.prevent="submitAccounting">
                <div class="dt-input__wrapper ">
                    <div class="d-flex align-items-center justify-content-between"><label
                        class="dt-input__label">Почта</label>
                    </div>
                    <div class="dt-input__group bg-white"
                         v-bind:class="{'border-success':form_accounting.is_success_saved}"
                    >
                        <input type="email" placeholder="Почта" class="dt-input"
                               v-model="form_accounting.email"

                               autocomplete="off" maxlength="255">
                        <div class="dt-input__group-item">
                            <div class="dt-input__icon">
                                <i class="fa-solid fa-at"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dt-input__wrapper mt-2">
                    <div class="d-flex align-items-center justify-content-between"><label
                        class="dt-input__label">Имя аккаунта</label>
                    </div>
                    <div class="dt-input__group bg-white"
                         v-bind:class="{'border-success':form_accounting.is_success_saved}"
                    >
                        <input type="text" placeholder="Пароль" class="dt-input"
                               v-model="form_accounting.name"

                               autocomplete="off" maxlength="255">
                        <div class="dt-input__group-item">
                            <div class="dt-input__icon">
                                <i class="fa-solid fa-heading"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dt-input__wrapper mt-2">
                    <div class="d-flex align-items-center justify-content-between"><label
                        class="dt-input__label">Номер телефона</label>
                    </div>
                    <div class="dt-input__group bg-white"
                         v-bind:class="{'border-success':form_accounting.is_success_saved}"
                    >
                        <input type="text" class="dt-input"
                               v-model="form_accounting.phone"
                               v-mask="'+7(###)###-##-##'"
                               placeholder="+7(000)000-00-00"
                               autocomplete="off" maxlength="255">
                        <div class="dt-input__group-item">
                            <div class="dt-input__icon">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row col-12 col-lg-5 col-xl-4 col-xxl-3 mx-0 pe-lg-5 mt-3">
                    <button type="submit" class="big-button bg-blue bold px-4 px-xxl-5 font-size-09 rounded">Сохранить
                    </button>
                </div>
            </form>

            <form v-on:submit.prevent="submitImages">

                <input type="file" id="files" multiple accept="image/*" @change="onChange" style="display:none;"/>
                <div class="mb-4 row mx-0 mt-2">
                    <span class="dt-label  thin position-relative mb-2 col-12 px-0 d-flex align-items-center">добавьте фото
                        <i class="fa-regular fa-circle-question opacity-25 info-icon ms-1"></i>
                    </span>
                    <div name="add-obj-photo" class="row mx-0 px-0 gap-2">
                        <label for="files"
                               class="col-auto photo-btn px-0 rounded d-flex align-items-center justify-content-center bg-white position-relative">

                            <i class="fa-solid fa-plus"></i>
                        </label>
                        <div class="add-additional-photo  mr-2" v-for="(item, index) in items">
                            <img class="position-relative top-0 start-0 img rounded w-100 h-100"
                                 v-if="item.imageUrl" v-lazy="item.imageUrl"
                                 alt="">
                            <div class="delete rounded position-absolute justify-content-center align-items-center">
                                <i class="fa-regular fa-circle-xmark"></i>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row col-12 col-lg-5 col-xl-4 col-xxl-3 mx-0 pe-lg-5 mt-3">

                    <button type="submit"
                            :disabled="photos.length===0"
                            class="big-button bg-blue bold px-4 px-xxl-5 font-size-09 rounded">Загрузить фотографии
                    </button>
                </div>
            </form>


        </div>

    </div>
</template>
<script>
import {mapGetters} from "vuex";

export default {

    data() {
        return {

            form_accounting: {
                email: null,
                phone: null,
                name: null,
                is_success_saved: false,
            },
            form_user: {
                is_success_saved: false,
                first_name: null,
                last_name: null,
                patronymic: null,
                sms_notification: false,
                email_notification: false,
                verified_at: null
            },
            form_password: {
                password: null,
                confirm_password: null,
                is_success_saved: false,
            },
            photos: [],
            items: []
        }
    },
    mounted() {


        this.form_user.first_name = this.user.profile.fname
        this.form_user.last_name = this.user.profile.tname
        this.form_user.patronymic = this.user.profile.sname
        this.form_user.sms_notification = this.user.sms_notification
        this.form_user.email_notification = this.user.email_notification
        this.form_user.verified_at = this.user.verified_at


        this.form_accounting.email = this.user.email
        this.form_accounting.phone = this.user.phone
        this.form_accounting.name = this.user.name
    },
    computed: {
        user() {
            return window.user
        },
    },
    methods: {

        onChange(e) {
            const files = e.target.files
            this.photos = files

            for (let i = 0; i < files.length; i++)
                this.items.push({imageUrl: URL.createObjectURL(files[i])})

        },
        submitAccounting() {
            this.form_accounting.is_success_saved = false;
            this.$store.dispatch("updateUserAccounting", this.form_accounting).then(() => {
                this.form_accounting.is_success_saved = true;

                this.$notify({
                    title: "Кабинет пользователя",
                    text: "Информация об аккаунте успешно обновлена",
                    type: 'success'
                });
            })
        },
        submitGuide() {
            this.form_user.is_success_saved = false;
            this.$store.dispatch("updateUserProfile", this.form_user).then(() => {
                this.form_user.is_success_saved = true;

                this.$notify({
                    title: "Кабинет пользователя",
                    text: "Информация о гиде успешно обновлена",
                    type: 'success'
                });
            })
        },
        submitPassword() {
            this.form_password.is_success_saved = false;
            this.$store.dispatch("updateGuidePassword", this.form_password).then(() => {
                this.form_password.is_success_saved = true;

                this.$notify({
                    title: "Кабинет гида",
                    text: "Пароль успешно обновлен",
                    type: 'success'
                });
            })
        },
        submitImages() {

            let data = new FormData();
            for (let i = 0; i < this.photos.length; i++)
                data.append('files[]', this.photos[i]);


            this.$store.dispatch("addUserImage", data).then(() => {
                let files = document.querySelector("#files")
                files.value = ""
                this.photos = [];
                this.items = [];
                this.$notify({
                    title: "Кабинет пользователя",
                    text: "Изображение профиля успешно обновлено",
                    type: 'success'
                });
            })
        }
    }
}
</script>
<style lang="scss">
.dt-input__icon {
    i {
        color: #0071eb;
    }
}

.photo-btn {
    padding: 20px;
    width: 100px;
    height: 100px;
    cursor: pointer;

    i {
        color: #0071eb;
    }
}

.add-additional-photo {
    padding: 0px;
}

.bg-blue[disabled] {
    background: gray !important;
}

.border-success {
    border: 1px green solid !important;;
}
</style>
