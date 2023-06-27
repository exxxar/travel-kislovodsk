<template>
    <div id="add-object-tour" class="add-object-tour col ">
        <div class="row align-items-center mx-0 mb-3 mb-lg-5 mt-4">
            <div class="col-12">
                <input type="checkbox" v-model="generate_test_data"
                       class="hide"
                       id="add-exc-accept-mark">
                <label for="add-exc-accept-mark"
                       class="align-items-center checkbox position-relative row  mb-2">
                    <div
                        class="col-auto custom-checkbox rounded bg-white d-flex align-items-center justify-content-center">
                        <div class="col-auto custom-checkbox dot"></div>
                    </div>
                    <span class="col-auto thin ms-2 px-0">Заполнить проверочными данными в качестве примера</span>
                </label>
            </div>
        </div>


        <form v-on:submit.prevent="submitTourObject" id="addObjectForm">
            <div class="row">
                <div class="col-12">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseOne">
                                    Основные данные
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                 aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <div class="mb-3 row mx-0">
                                        <span class="dt-label-input thin position-relative mb-2 col-12 px-0">название экскурсии
                                            <i class="fa-regular fa-circle-question dt-text-muted--white-50"></i>
                                        </span>
                                        <input type="text" v-model="tourObject.title" maxlength="255"
                                               name="add-obj-name"
                                               class="col-12 px-2rem py-4 rounded font-size-09" required>
                                    </div>
                                    <div class="mb-3 row mx-0">
                                        <span class="dt-label-input thin position-relative mb-2 col-12 px-0">описание
                                            <i class="fa-regular fa-circle-question dt-text-muted--white-50"></i>
                                        </span>
                                        <textarea name="add-obj-description" cols="30" rows="10"
                                                  v-model="tourObject.description"
                                                  maxlength="255"
                                                  class="col-12 px-2rem py-4 rounded font-size-09"></textarea>
                                    </div>

                                    <div class="mb-3 row mx-0">
                                        <span class="dt-label-input thin position-relative mb-2 col-12 px-0">добавьте фото
                                            <i class="fa-regular fa-circle-question dt-text-muted--white-50"></i>
                                        </span>
                                        <div name="add-obj-photo" class="row mx-0 px-0 gap-2">
                                            <div
                                                class="col-auto add-additional-photo px-0 rounded d-flex align-items-center justify-content-center bg-white position-relative">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20"
                                                     width="20">
                                                    <path d="M22 38.5V26H9.5v-4H22V9.5h4V22h12.5v4H26v12.5Z"/>
                                                </svg>
                                                <input type="file" id="files" multiple accept="image/*"
                                                       @change="onChange"
                                                       style="display:none;"/>
                                                <label @click="resetImages" for="files"
                                                       class="col-auto photo-btn px-0 rounded d-flex align-items-center justify-content-center bg-white position-relative">
                                                    <i class="fa-solid fa-plus"></i>
                                                </label>
                                            </div>
                                            <div class="add-additional-photo  mr-2" v-for="(item, index) in items">
                                                <img class="position-relative top-0 start-0 img rounded w-100 h-100"
                                                     v-if="item.imageUrl" v-lazy="item.imageUrl"
                                                     alt="">
                                                <div
                                                    class="delete rounded position-absolute justify-content-center align-items-center">
                                                    <i class="fa-regular fa-circle-xmark"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 mx-0">
                <span class="dt-label-input thin position-relative mb-2 col-12 px-0">Расположение туристического объекта
                        <i class="fa-regular fa-circle-question dt-text-muted--white-50"></i>
                </span>
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <input type="text" v-model="tourObject.country" maxlength="255"
                                                       placeholder="Страна объекта"
                                                       name="add-obj-city"
                                                       class="col-12 px-2rem py-4 rounded font-size-09">
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <input type="text" v-model="tourObject.city" maxlength="255"
                                                       placeholder="Город объекта"
                                                       name="add-obj-city"
                                                       class="col-12 px-2rem py-4 rounded font-size-09"
                                                       required>
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <input type="text" v-model="tourObject.address" maxlength="255"
                                                       placeholder="Адрес объекта"
                                                       name="add-obj-city"
                                                       class="col-12 px-2rem py-4 rounded font-size-09"
                                                       required>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="col-12 position-relative mx-0 px-0 border rounded text-center align-items-center
                        d-flex justify-content-center" style="height: 50px">
                                                    <a class="btn btn-link dt-text--regular" data-bs-toggle="modal"
                                                       data-bs-target="#map-select-start-coords">Укажите точку на
                                                        карте</a>
                                                </div>
                                                <selected-map-modal-dialog-component id="map-select-start-coords"
                                                                                     v-on:coords="selectCoords"/>
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <p class="pt-3"
                                                   v-if="tourObject.latitude===null||tourObject.longitude===null">
                                                    Координаты не
                                                    указаны</p>
                                                <p class="pt-3" v-else>Координаты: {{ tourObject.longitude }}
                                                    {{ tourObject.latitude }}</p>
                                            </div>


                                            <div class="col-12 col-md-8">
                                                <p class="pt-3" v-if="tourObject.pogoda_klimat_id===null">Регион для
                                                    отображения погоды не
                                                    выбран</p>
                                                <p class="pt-3 mb-3" v-else>Погода будет указана для города
                                                    <strong class="bold">{{ selectedLocation }}</strong>
                                                    <button v-if="tourObject.pogoda_klimat_id!==null"
                                                            type="button" class="btn btn-outline-success"
                                                            style="margin-left: 15px;"
                                                            data-bs-toggle="modal" data-bs-target="#show-weather">
                                                        <i class="fa-solid fa-umbrella"></i>
                                                    </button>
                                                </p>

                                            </div>

                                            <div class="col-12" v-if="weather_locations.length>0">
                                                <div class="list-group">
                                                    <a href="#select-weather"
                                                       @click="setLocationId(item.id)"
                                                       v-for="item in weather_locations"
                                                       class="list-group-item list-group-item-action">{{
                                                            item.title || 'Не указан'
                                                        }}</a>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="mb-3 row mx-0">
                                        <label for="add-obj-comment-mark"
                                               class="align-items-center checkbox position-relative row mx-0 px-0 mt-3">
                                            <input type="checkbox" id="add-obj-comment-mark"
                                                   v-model="tourObject.need_comment"
                                                   class="col-auto custom-checkbox">
                                            <div
                                                class="col-auto custom-checkbox rounded bg-white d-flex align-items-center justify-content-center">
                                                <div class="col-auto custom-checkbox dot">
                                                </div>
                                            </div>
                                            <span class="col-auto thin ms-1">добавить комментарий</span>
                                            <input type="text" name="add-obj-comment"
                                                   class="d-none col-12 px-2rem py-4 rounded font-size-09 mt-2">
                                        </label>
                                    </div>


                                    <div class="mb-3 row mx-0" v-if="tourObject.need_comment">
                    <span class="dt-label-input thin position-relative mb-2 col-12 px-0">комментарий
                      <i class="fa-regular fa-circle-question dt-text-muted--white-50"></i>
                    </span>
                                        <textarea name="add-obj-description" cols="30" rows="10"
                                                  v-model="tourObject.comment" maxlength="255"
                                                  class="col-12 px-2rem py-4 rounded font-size-09"></textarea>
                                    </div>

                                    <div class="add-obj-accept position-relative splitted d-flex align-items-center justify-content-between
                        row mx-0 px-0 py-5 mt-5">
                                        <a class="col-12 col-lg-auto dt-btn-text mb-4 mb-lg-0 px-0">
                                            предосмотр объекта
                                            <span class="blue fs-6">&gt;</span>
                                        </a>
                                        <button type="submit"
                                                class="big-button bold bg-green col-12 col-lg-auto px-5 ms-lg-5 rounded">
                                            Сохранить
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
import {mapGetters} from "vuex";


const getTestFormData = () => ({
    tourObject: {
        title: 'Каньон реки Блайд, в Мпумаланге, восточная Южная Африка.',
        description: 'Длина каньона - 26 км, глубина в отдельных местах - 800 метров. Каньон известен ' +
            'завораживающими скальными образованиями, красивыми водопадами и древними пещерами, простирающимися на 40 км вглубь земли.',
        country: 'Country',
        city: 'Каролина',
        address: 'провинция Мпумаланга',
        latitude: '-26.070125',
        longitude: '30.113865',
        comment: 'Расположен за чертой города',
        photos: [],
        need_comment: false,
        pogoda_klimat_id: null,
    },
});

const getInitialFormData = () => ({
    tourObject: {
        title: null,
        description: null,
        country: null,
        city: null,
        address: null,
        latitude: null,
        longitude: null,
        comment: null,
        photos: [],
        need_comment: false,
        pogoda_klimat_id: null,
    },
});


export default {
    data() {
        return {
            generate_test_data: false,
            weather_locations: [],
            location: null,
            tourObject: {
                title: null,
                description: null,
                country: null,
                city: null,
                address: null,
                latitude: null,
                longitude: null,
                comment: null,
                photos: [],
                need_comment: false,
                pogoda_klimat_id: null,

            },
            photos: [],
            items: []
        }
    },
    watch: {
        'tourObject.city': function (oldVal, newVal) {
            this.findLocation();
        },
        generate_test_data: function (oldVal, newVal) {
            if (!this.generate_test_data) {
                this.tourObject = getInitialFormData().tourObject
            } else {
                this.tourObject = getTestFormData().tourObject
            }
        }
    },
    computed: {
        selectedLocation() {
            let location = this.weather_locations.find(item => item.id === this.tourObject.pogoda_klimat_id)
            return location ? location.title : 'Не указано'
        }
    },
    mounted() {

    },
    methods: {
        findLocation() {
            this.weather_locations = []
            this.$store.dispatch("findWeatherLocation", this.tourObject.city).then(resp => {
                this.weather_locations = resp
            }).catch(err => {
                this.weather_locations = []
            })

        },
        setLocationId(id) {
            this.tourObject.pogoda_klimat_id = null
            setTimeout(() => {
                this.tourObject.pogoda_klimat_id = id
            }, 1000)

        },
        selectCoords(e) {
            this.tourObject.longitude = e[0]
            this.tourObject.latitude = e[1]
        },
        resetImages() {
            let files = document.querySelector("#files")
            files.value = ""
            this.photos = [];
            this.items = [];
        },
        onChange(e) {
            const files = e.target.files
            this.photos = files

            for (let i = 0; i < files.length; i++)
                this.items.push({imageUrl: URL.createObjectURL(files[i])})


        },
        submitTourObject() {

            let data = new FormData();

            Object.keys(this.tourObject)
                .forEach(key => {
                    const item = this.tourObject[key] || ''
                    data.append(key, item)
                });


            for (let i = 0; i < this.photos.length; i++)
                data.append('files[]', this.photos[i]);


            this.$store.dispatch("addAdminTourObject", data).then((data) => {
                let tourObject = data.data

                this.resetImages()

                let URL = "/tour-object/" + tourObject.id;
                window.open(URL);

                this.tourObject = getInitialFormData().tourObject

                this.$notify({
                    title: "Добавление туристического объекта",
                    text: "Новый объект успешно добавлен",
                    type: 'success'
                });
            })
        }
    }
}
</script>
<style scoped>

</style>

<style lang="scss">
.tour-object-list {
    display: flex;
    justify-content: space-between;
    overflow-x: auto;
    flex-wrap: wrap;
    /* padding: 5px; */
    box-sizing: border-box;
}

.tour-object-list-item img {
    height: 100px;
    object-fit: cover;
    width: 100px;
    margin: 10px;
}

.photo-loader {
    width: 100px;
    height: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 42px;
    background: white;
    border-radius: 10px;
    border: 1px lightgray solid;

    .fa-plus {
        font-size: 25px;
    }
}

.photo-preview {
    img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        background: white;
        //padding: 13px;
        box-sizing: border-box;
        border-radius: 10px;
        border: 1px lightgray solid;
    }
}

button[disabled] {
    background: gray;
}

button {
    min-width: 50px;
}

select, .dropdown-border,
input, textarea {
    border: 1px #0c63e4 solid;
}

.checkbox > input:not(:checked) + .category {
    border: 3px solid #eef6ff;
}
</style>
