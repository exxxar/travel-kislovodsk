<template>
    <div class="mb-3">
        <label for="form-files" class="form-label">Disabled file input example</label>
        <input class="form-control" type="file" id="form-files"
               multiple accept="image/*" @change="onChange"
        >

        <button v-if="files.length>0" class="btn btn-primary" @click="sendFiles">
            Отправить файлы
        </button>
    </div>
</template>
<script>
export default {
    data(){
        return {
            files:[]
        }
    },
    methods:{
        onChange(e) {
            const files = e.target.files
            this.files = files
        },
        sendFiles(){
            this.eventBus.emit("send_file_to_active_chat",this.files)
        }
    }
}
</script>
