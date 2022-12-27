<template>


    <div id="documents" class="dt-page__guide-documents col ">

        <div class="row mb-2">
            <div class="col-12">
                <form v-on:submit.prevent="submitDocuments" id="files">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Загрузка документов</label>
                        <input class="form-control" type="file"
                               multiple id="formFile" @change="onChange">
                    </div>

                    <button
                        :disabled="files.length===0"
                        type="submit" class="big-button bg-blue bold px-4 px-xxl-5 font-size-09 rounded">Отправить
                    </button>

                </form>
            </div>
        </div>

        <h2 class="lh-1 mb-2 mt-5 mt-lg-0 bold">Мои документы</h2>
        <div
            v-if="documents.length>0"
            v-for="(doc, index) in documents" :key="'doc'+index"
            class="col-12 row bg-white rounded px-3 py-4 mx-0 mb-2 d-flex">
            <div class="col-12 col-lg row align-items-center">
                <svg class="col-auto" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 48 48" height="20"
                     width="20">
                    <path
                        d="M14 33.9h13.75v-3H14Zm0-8.4h20.05v-3H14Zm0-8.45h20.05v-3H14ZM9.25 42.7q-1.6 0-2.775-1.175Q5.3 40.35 5.3 38.75V9.25q0-1.65 1.175-2.825Q7.65 5.25 9.25 5.25h29.5q1.65 0 2.825 1.175Q42.75 7.6 42.75 9.25v29.5q0 1.6-1.175 2.775Q40.4 42.7 38.75 42.7Zm0-3.95h29.5V9.25H9.25v29.5Zm0-29.5v29.5-29.5Z"/>
                </svg>
                <span class="col font-size-09 px-0">
                   {{doc.origin_title || doc.title || 'Без названия'}}
                </span>

                <span class="col-auto opacity-40 thin font-size-08">{{ doc.size / 1000 }} кб</span>
                <span class="col-auto opacity-40 thin font-size-08" style="color:green;" v-if="doc.approved_at!==null">
                    Проверено!
                </span>
                <span class="col-auto opacity-40 thin font-size-08" v-if="doc.approved_at==null&&doc.request_approve_at==null">
                    <a
                        @click="verifiedDocument(doc)" class="btn btn-link"><i class="fa-solid fa-triangle-exclamation text-danger"></i></a>
                </span>

                <span class="col-auto opacity-40 thin font-size-08" v-if="doc.approved_at==null&&doc.request_approve_at!=null">
                  <i class="fa-solid fa-flag-checkered text-danger" ></i>
                </span>
            </div>
            <div
                class="col-auto row mt-3 mt-lg-0 align-items-center justify-content-between justify-content-lg-start">
                <a :href="doc.path" target="_blank" class="col-auto"><span
                    class="font-size-08 position-relative black-underline">Открыть</span></a>
                <button
                    @click="removeDocument(doc.id)"
                    class="col-auto ms-auto"><span
                    class="font-size-08 position-relative red red-underline">Удалить</span></button>
            </div>
        </div>
        <div v-else
            class="col-12 row bg-white rounded px-3 py-4 mx-0 mb-2 d-flex">
            Документы еще не загружены
        </div>

    </div>
</template>
<script>
import {mapGetters} from "vuex";

export default {
    data() {
        return {
            files: [],
            documents: [],
        }
    },
    mounted() {
        this.loadGuideDocuments()
    },
    computed: {
        ...mapGetters(['getGuideDocuments'])
    },
    methods: {
        verifiedDocument(doc){

            if (doc.request_approve_at!=null)
            {
                this.loadGuideDocuments();
                this.$notify({
                    title: "Кабинет гида",
                    text: "Запрос на верификацию уже отправлен! Дождитесь подтверждения!",
                    type: 'warn'
                });
                return;
            }


            this.$store.dispatch("requestGuideProfileDocumentVerified", doc.id).then(() => {
                this.loadGuideDocuments();
                this.$notify({
                    title: "Кабинет гида",
                    text: "Запрос на верификацию успешно отправлен",
                    type: 'success'
                });
            })
        },
        onChange(e) {
            const files = e.target.files
            this.files = files
        },
        loadGuideDocuments() {
            this.$store.dispatch("loadGuideDocuments").then(() => {
                this.documents = this.getGuideDocuments
            })
        },
        removeDocument(id){
            this.$store.dispatch("removeGuideDocument", id).then(() => {
                this.loadGuideDocuments();
                this.$notify({
                    title: "Кабинет гида",
                    text: "Документы успешно удален",
                    type: 'success'
                });
            })
        },
        submitDocuments() {

            let data = new FormData();
            for (let i = 0; i < this.files.length; i++)
                data.append('files[]', this.files[i]);


            this.$store.dispatch("addGuideDocuments", data).then(() => {
                let files = document.querySelector("#files")
                files.value = ""
                this.loadGuideDocuments();
                this.files = [];
                this.$notify({
                    title: "Кабинет гида",
                    text: "Документы успешно загружены",
                    type: 'success'
                });
            })
        }
    }
}
</script>
