<template>
    <div class="col">
        <div class="row align-items-center mx-0 mb-5">
            <button @click="$emit('hideEditTourObject')"
                    class="personal-account-nav__link_active button col-auto px-4 active rounded shadow-none bold"><span
                class="fs-6 me-1">&lt;</span>Назад
            </button>
            <h1 class="col-12 col-lg-auto bold fs-2 px-0 ms-lg-4">Добавление нового объекта</h1>
        </div>
        <form v-on:submit.prevent="submitTourObject"
              v-if="isCompletelyLoaded"
              id="addObjectForm">
            <div class="mb-4 row mx-0">
            <span class="thin position-relative mb-2 col-12 px-0">название экскурсии
       <i class="fa-regular fa-circle-question"></i>
            </span>
                <input type="text"
                       v-model="tourObject.title"
                       maxlength="255"
                       name="add-obj-name" class="col-12 px-2rem py-4 rounded border-0 font-size-09" required>
            </div>
            <div class="mb-4 row mx-0">
                    <span class="thin position-relative mb-2 col-12 px-0">описание
                      <i class="fa-regular fa-circle-question"></i>
                    </span>
                <textarea name="add-obj-description" cols="30" rows="10"
                          v-model="tourObject.description"
                          maxlength="255"
                          class="col-12 px-2rem py-4 rounded border-0 font-size-09"></textarea>
            </div>

            <div class="mb-4 row mx-0">
                    <span class="thin position-relative mb-2 col-12 px-0">добавьте фото
                 <i class="fa-regular fa-circle-question"></i>
                    </span>
                <div name="add-obj-photo" class="row mx-0 px-0 gap-2">
                    <div
                        class="col-auto add-additional-photo px-0 rounded d-flex align-items-center justify-content-center bg-white position-relative">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                            <path d="M22 38.5V26H9.5v-4H22V9.5h4V22h12.5v4H26v12.5Z"/>
                        </svg>
                        <input type="file" id="files" multiple accept="image/*" @change="onChange"
                               style="display:none;"/>
                        <label
                            @click="resetImages"
                            for="files"
                            class="col-auto photo-btn px-0 rounded d-flex align-items-center justify-content-center bg-white position-relative">

                            <i class="fa-solid fa-plus"></i>
                        </label>

                    </div>

                    <div class="add-additional-photo  mr-2" v-for="(item, index) in items">

                        <img class="position-relative top-0 start-0 img rounded w-100 h-100"
                             v-if="item.imageUrl" v-lazy="item.imageUrl"
                             alt="">
                        <div class="delete rounded position-absolute justify-content-center align-items-center">
                            <i class="fa-regular fa-circle-xmark"></i>
                        </div>
                    </div>

                    <div
                        v-if="tourObject.photos.length>0"
                        class="add-additional-photo  mr-2" v-for="(item, index) in tourObject.photos">

                        <img class="position-relative top-0 start-0 img rounded w-100 h-100"
                             v-lazy="item"
                             alt="">
                        <div class="delete rounded position-absolute justify-content-center align-items-center">
                            <i class="fa-regular fa-circle-xmark"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4 row mx-0">
                <span class="thin position-relative mb-2 col-12 px-0">Расположение туристического объекта
                        <i class="fa-regular fa-circle-question"></i>
                </span>

                <div class="row">
                    <div class="col-md-4">
                        <input type="text"
                               v-model="tourObject.city"
                               maxlength="255"
                               placeholder="Город объекта"
                               name="add-obj-city" class="col-12 px-2rem py-4 rounded border-0 font-size-09" required>

                    </div>
                    <div class="col-md-8">
                        <input type="text"
                               v-model="tourObject.address"
                               maxlength="255"
                               placeholder="Адрес объекта"
                               name="add-obj-city" class="col-12 px-2rem py-4 rounded border-0 font-size-09" required>

                    </div>
                    <div class="col-12 col-md-4">
                        <button data-bs-toggle="modal" data-bs-target="#map-select-object-coords"
                                class="map-point col-12 col-lg-auto py-4 mt-3 mt-lg-0 ms-lg-4 px-0 rounded ">
                            <span class="position-relative black-underline">Укажите точку на карте</span>
                        </button>



                        <selected-map-modal-dialog-component id="map-select-object-coords"
                                                             v-on:coords="selectCoords"/>
                    </div>
                    <div class="col-12 col-md-8">
                        <p class="pt-3" v-if="tourObject.latitude===null||tourObject.longitude===null">Координаты не указаны</p>
                        <p class="pt-3" v-else>Координаты: {{ tourObject.longitude }} {{ tourObject.latitude }}</p>
                    </div>
                </div>
            </div>


            <div class="mb-4 row mx-0">

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
                           class="d-none col-12 px-2rem py-4 rounded border-0 font-size-09 mt-2">
                </label>
            </div>

            <div class="mb-4 row mx-0" v-if="tourObject.need_comment">
                    <span class="thin position-relative mb-2 col-12 px-0">комментарий
                      <i class="fa-regular fa-circle-question"></i>
                    </span>
                <textarea name="add-obj-description" cols="30" rows="10"
                          v-model="tourObject.comment"
                          maxlength="255"
                          class="col-12 px-2rem py-4 rounded border-0 font-size-09"></textarea>
            </div>

            <div
                class="add-obj-accept position-relative splitted d-flex align-items-center justify-content-between row mx-0 px-0 py-5 mt-5">
                <a
                    class="col-12 col-lg-auto font-size-07 blue-hover letter-spacing-3 text-uppercase bold mb-4 mb-lg-0 px-0">
                    предосмотр
                    объекта
                    <span class="blue fs-6">&gt;</span>
                </a>
                <button
                    type="submit"
                    class="big-button bold bg-green col-12 col-lg-auto px-5 ms-lg-5 rounded">Сохранить
                </button>
            </div>
        </form>
    </div>
</template>
<script>


export default {
    props: ["tourObjectId"],
    data() {
        return {
            isCompletelyLoaded:false,
            tourObject: null,
            photos: [],
            items: []
        }
    },
    mounted() {
        this.loadGuideTourObjectById()
    },
    methods: {
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
                    if (typeof item === 'object')
                        data.append(key, JSON.stringify(item))
                    else
                        data.append(key, item)
                });




            for (let i = 0; i < this.photos.length; i++)
                data.append('files[]', this.photos[i]);


            this.$store.dispatch("editTourObject", {
                id: this.tourObject.id,
                data: data
            }).then((data) => {
                let tourObject = data.data

                this.resetImages()

                this.$emit("hideEditTourObject")

                this.$notify({
                    title: "Редактирование туристического объекта",
                    text: "Туристический объект успешно отредактирован",
                    type: 'success'
                });
            })
        },
        loadGuideTourObjectById() {
            return this.$store.dispatch("loadGuideTourObjectById", this.tourObjectId).then((resp) => {
                this.tourObject = resp.data


                this.isCompletelyLoaded = true;
            })
        },
    }
}
</script>
