<template>
    <div class="card-body position-relative zindex-2 py-5" v-if="!user.is_guest">
        <form v-on:submit.prevent="submitReview" class="mx-auto w-100">
            <div class="row g-4">

                <div class="col-sm-12">
                    <p v-if="objectType==='guide'"> Укажите оценку гиду</p>
                    <p v-if="objectType==='tour'"> Укажите оценку тура</p>
                    <StarRating
                        :increment="0.1"
                        :active-color="'white'"
                        :active-border-color="'#2364f1'"
                        :border-color="'gray'"
                        :rounded-corners="true"
                        :border-width="3"
                        v-bind:star-size="15"
                        v-model:rating="review.rating"
                    />
                </div>
                <div class="col-sm-12">
                    <label class="form-label fs-base" for="message">Текст отзыва</label>
                    <textarea
                        v-model="review.comment"
                        class="form-control form-control-lg" rows="6"
                        placeholder="Ведите текст вашего отзыва" required="" id="message">

                    </textarea>
                </div>

                <div class="col-sm-12">
                    <div class="photo-preview-review d-flex justify-content-start flex-wrap w-100">
                        <label for="photos"
                               style="margin-right: 10px;"
                               class="photo-loader-review ml-2">
                            <i class="fa-solid fa-plus"></i>
                            <input type="file" id="photos" multiple accept="image/*" @change="onChangePhotos"
                                   style="display:none;"/>

                        </label>
                        <div class="mb-2" style="margin-right: 10px;" v-for="img in items" v-if="items.length>0">
                            <img v-lazy="img.imageUrl">
                        </div>

                    </div>

                </div>
                <div class="col-sm-12 text-center pt-4">
                    <button class="btn btn-primary p-3" style="min-width: 200px;" type="submit">
                        <span v-if="!load" class="text-white">Отправить отзыв</span>
                        <div v-if="load" class="spinner-border text-white" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </button>


                </div>
            </div>
        </form>
    </div>
</template>
<script>
import StarRating from 'vue-star-rating'

export default {
    props: ["objectId", "objectType"],
    components: {
        StarRating
    },
    data() {
        return {
            load:false,
            review: {
                rating: 1,
                comment: null,
            },
            photos: [],
            items: []
        }
    },
    computed: {
        user() {
            return window.user
        }
    },
    methods: {
        onChangePhotos(e) {
            const files = e.target.files
            this.photos = files

            for (let i = 0; i < files.length; i++)
                this.items.push({imageUrl: URL.createObjectURL(files[i])})


        },
        resetImages() {
            let files = document.querySelector("#photos")
            files.value = ""
            this.photos = [];
            this.items = [];
        },
        submitReview() {

            this.load = true
            let data = new FormData();

            Object.keys(this.review)
                .forEach(key => {
                    const item = this.review[key] || ''
                    if (typeof item === 'object')
                        data.append(key, JSON.stringify(item))
                    else
                        data.append(key, item)
                });

            data.append("object_id", this.objectId)
            data.append("object_type", this.objectType || 'tour')

            for (let i = 0; i < this.photos.length; i++)
                data.append('files[]', this.photos[i]);


            this.$store.dispatch("addReview", data).then((data) => {
                this.load = false

                this.resetImages()

                this.review.comment = null;
                this.review.rating = 1;

                this.eventBus.emit("request_reload_reviews")


                this.$notify({
                    title: "Страница тура",
                    text: "Отзыв успшено добавлен",
                    type: 'success'
                });
            }).catch(()=>{
                this.load = false
            })
        },
    }
}
</script>
<style lang="scss">

.photo-loader-review {
    width: 100px;
    height: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 42px;
    background: white;
    border-radius: 10px;
    border: 1px lightgray solid;
}

.photo-preview-review {
    img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        background: white;
        padding: 5px;
        box-sizing: border-box;
        border-radius: 10px;
        border: 1px lightgray solid;
    }
}
</style>
