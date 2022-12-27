<template>
    <form v-on:submit.prevent="submitDocument">
        <div class="row">
            <div class="col-12">

                <div class="form-floating">
                    <select class="form-select"
                            v-model="fileType"
                            id="floatingSelect"
                            aria-label="Выбор типа загружаемого файла">
                        <option value="1">Файл с турами</option>
                        <option value="2">Файл с туристическими объектами</option>
                    </select>
                    <label for="floatingSelect"> Загружаемый тип Excel-файла</label>
                </div>
            </div>
            <div class="col-12 mt-2">
                <label for="excel-document" class="form-label">Файл для загрузки</label>
                <input class="form-control"
                       accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                       @change="onChange"
                       type="file"
                       id="excel-document">
            </div>

            <div class="col-12 mt-2">
                <button
                    :disabled="file==null||fileType==null"
                    type="submit" class="btn btn-primary w-100">Загрузить
                </button>
            </div>
        </div>
    </form>
</template>
<script>
export default {
    props: ["type"],
    data() {
        return {
            file: null,
            fileType: null,
        }
    },
    mounted() {
        this.fileType = this.type || null
    },
    methods: {
        onChange(e) {
            const file = e.target.files[0]
            this.file = file
        },
        submitDocument() {
            let data = new FormData();
            data.append('file', this.file);

            this.$store.dispatch(this.fileType === 1 ?
                    "uploadToursExcel" :
                    "uploadTourObjectsExcel",
                data).then(() => {
                let files = document.querySelector("#excel-document")
                files.value = ""

                this.file = null;
                this.$notify({
                    title: "Кабинет гида",
                    text: this.fileType === 1 ?
                        "Туры успешно загружены. Отредактируйте их!" :
                        "Туристические объекты успешно загружены. Отредактируйте их!",
                    type: 'success'
                });


                this.eventBus.emit(this.fileType === 1 ? 'tour_page' : 'tour_object_page', 0)
            })
        }
    }
}
</script>
