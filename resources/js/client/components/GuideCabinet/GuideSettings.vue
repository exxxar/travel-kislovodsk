<template>
    <div id="settings" class="col">
        <div class="d-flex justify-content-between">
            <h2 class="lh-1 bold px-0 title-guide-cabinet">Настройка профиля гида</h2>
            <a :href="'/guide/'+user.id" target="_blank" class="d-lg-flex d-none dt-btn-text">смотреть профиль</a>
        </div>
        <div class="mb-4 mx-0 position-relative">
            <h3 class="mb-2 mt-3">Информация об организации</h3>
            <form v-on:submit.prevent="submitCompany">
                <div class="dt-input__wrapper">
                    <div class="d-flex align-items-center justify-content-between"><label
                        class="dt-input__label">Название организации</label>
                    </div>
                    <div class="dt-input__group bg-white"
                         v-bind:class="{'border-success':form_company.is_success_saved}"
                    >
                        <input type="text" placeholder="ООО 'РосТуризм'" class="dt-input"
                               v-model="form_company.title"

                               autocomplete="off" maxlength="255" required>
                        <div class="dt-input__group-item">
                            <div class="dt-input__icon">
                                <i class="fa-regular fa-building"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dt-input__wrapper mt-2">
                    <div class="d-flex align-items-center justify-content-between"><label
                        class="dt-input__label">Юридический адрес организации</label>
                    </div>
                    <div class="dt-input__group bg-white"
                         v-bind:class="{'border-success':form_company.is_success_saved}"
                    >
                        <input type="text" placeholder="г. Кисловодск, ул. Ленина, 23, офис 33" class="dt-input"
                               v-model="form_company.law_address"

                               autocomplete="off" maxlength="255" required>
                        <div class="dt-input__group-item">
                            <div class="dt-input__icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dt-input__wrapper mt-2">
                    <div class="d-flex align-items-center justify-content-between"><label
                        class="dt-input__label">ОГРН</label>
                    </div>
                    <div class="dt-input__group bg-white"
                         v-bind:class="{'border-success':form_company.is_success_saved}"
                    >
                        <input type="number" placeholder="0000000000000" class="dt-input"
                               v-model="form_company.ogrn"

                               autocomplete="off" maxlength="15" required>
                        <div class="dt-input__group-item">
                            <div class="dt-input__icon">
                                <i class="fa-solid fa-database"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dt-input__wrapper mt-2">
                    <div class="d-flex align-items-center justify-content-between"><label
                        class="dt-input__label">ИНН</label>
                    </div>
                    <div class="dt-input__group bg-white"
                         v-bind:class="{'border-success':form_company.is_success_saved}"
                    >
                        <input type="text" placeholder="00000000000" class="dt-input"
                               v-model="form_company.inn"

                               autocomplete="off" maxlength="15" required>
                        <div class="dt-input__group-item">
                            <div class="dt-input__icon">
                                <i class="fa-solid fa-database"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4 row mx-0 mt-2">
                    <span class="dt-label thin position-relative mb-2 col-12 px-0 d-flex align-items-center">описание

                        <i class="fa-regular fa-circle-question opacity-25 info-icon ms-1"></i>
                    </span>
                    <textarea name="add-obj-description" cols="30" rows="12"
                              v-bind:class="{'border-success':form_company.is_success_saved}"
                              v-model="form_company.description"
                              class="col-12 px-2rem py-4 rounded border-0 font-size-09"></textarea>
                </div>


                <div class="row col-12 col-lg-5 col-xl-4 col-xxl-3 mx-0 pe-lg-5 mt-3">
                    <button type="submit" class="big-button bg-blue bold px-4 px-xxl-5 font-size-09 rounded">Сохранить
                    </button>
                </div>
            </form>

            <h3 class="mb-2 mt-3">Информация о личности гида</h3>
            <form v-on:submit.prevent="submitGuide">
                <div class="dt-input__wrapper">
                    <div class="d-flex align-items-center justify-content-between"><label
                        class="dt-input__label">Фамилия гида</label>
                    </div>
                    <div class="dt-input__group bg-white"
                         v-bind:class="{'border-success':form_guide.is_success_saved}"
                    >
                        <input type="text" placeholder="Иванов" class="dt-input"
                               v-model="form_guide.last_name"

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
                        class="dt-input__label">Имя гида</label>
                    </div>
                    <div class="dt-input__group bg-white"
                         v-bind:class="{'border-success':form_guide.is_success_saved}"
                    >
                        <input type="text" placeholder="Иван" class="dt-input"
                               v-model="form_guide.first_name"

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
                        class="dt-input__label">Отчество гида</label>
                    </div>
                    <div class="dt-input__group bg-white"
                         v-bind:class="{'border-success':form_guide.is_success_saved}"
                    >
                        <input type="text" placeholder="Иванович" class="dt-input"
                               v-model="form_guide.patronymic"

                               autocomplete="off" maxlength="255">
                        <div class="dt-input__group-item">
                            <div class="dt-input__icon">
                                <i class="fa-regular fa-user"></i>
                            </div>
                        </div>
                    </div>
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

            <form v-on:submit.prevent="submitImages">
                <div class="alert alert-success mt-3" role="alert" v-if="message">
                    {{ message }}
                </div>
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
export default {
    data() {
        return {
            form_company: {
                title: null,
                description: null,
                ogrn: null,
                inn: null,
                law_address: null,
                is_success_saved: false,
            },
            form_guide: {
                is_success_saved: false,
                first_name: null,
                last_name: null,
                patronymic: null,
            },
            form_password: {
                password: null,
                confirm_password: null,
                is_success_saved: false,
            },
            photos: [],
            items: [],
            message: null
        }
    },
    mounted() {
        this.form_company.title = this.user.company.title
        this.form_company.inn = this.user.company.inn
        this.form_company.description = this.user.company.description
        this.form_company.ogrn = this.user.company.ogrn
        this.form_company.law_address = this.user.company.law_address

        this.form_guide.first_name = this.user.profile.fname
        this.form_guide.last_name = this.user.profile.tname
        this.form_guide.patronymic = this.user.profile.sname
    },
    computed: {
        user() {
            return window.user
        },

    },
    methods: {

        onChange(e) {
            this.message = null;
            const files = e.target.files
            this.photos = files

            console.log(files)
            for (let i = 0; i < files.length; i++)
                this.items.push({imageUrl: URL.createObjectURL(files[i])})

        },
        submitCompany() {
            this.form_company.is_success_saved = false;
            this.$store.dispatch("updateGuideCompany", this.form_company).then(() => {
                this.form_company.is_success_saved = true;
            })
        },
        submitGuide() {
            this.form_guide.is_success_saved = false;
            this.$store.dispatch("updateGuideProfile", this.form_guide).then(() => {
                this.form_guide.is_success_saved = true;
            })
        },
        submitPassword() {
            this.form_password.is_success_saved = false;
            this.$store.dispatch("updateGuidePassword", this.form_password).then(() => {
                this.form_password.is_success_saved = true;
            })
        },
        submitImages() {

            let data = new FormData();
            for (let i = 0; i < this.photos.length; i++)
                data.append('files[]', this.photos[i]);


            this.$store.dispatch("addGuideImage", data).then(() => {
                let files = document.querySelector("#files")
                files.value = ""
                this.photos = [];
                this.items = [];
                this.message = "Изображение профиля успешно обновлено"
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
