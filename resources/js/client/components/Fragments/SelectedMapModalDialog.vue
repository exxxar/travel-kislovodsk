<template>
    <div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-body">
                    <YandexMap
                        v-if="reload"
                        :zoom="zoom"
                        :coordinates="center"
                        @click="onClick"
                    >
                        <YandexMarker
                            :coordinates="center"
                            :marker-id="'random'+Math.random()+'marker'"
                        />
                    </YandexMap>

                </div>


            </div>
        </div>
    </div>
</template>
<script>
import {YandexMap, YandexMarker} from 'vue-yandex-maps'

export default {
    components: {YandexMap, YandexMarker},

    data() {
        return {
            reload:true,
            zoom: 10,
            center: [
                43.905518, 42.715718
            ],
        }
    },
    methods: {
        onClick(e) {
            this.$emit("coords", e.get('coords'))
            this.reload = false
            this.$nextTick(()=>{
                this.zoom = e.get('target').getZoom();
                this.center = e.get('coords')
                this.reload = true;

                this.$notify({
                    title: "Создание тура",
                    text: "Вы выбрали координаты: "+ this.center,
                    type: 'success'
                });
            })


        }
    },
}

</script>
<style>
.yandex-container,
.ymap-container {
    height: 100vh;

}
</style>
