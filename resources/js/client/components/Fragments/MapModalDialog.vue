<template>
<div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body" v-if="!multiply&&coords">

                <YandexMap
                    :coordinates="[coords.lat,coords.lon]"
                    v-if="coords"
                >
                    <YandexMarker :coordinates="[coords.lat,coords.lon]" :marker-id="123">
                    </YandexMarker>
                </YandexMap>

            </div>
            <div class="modal-body" v-if="coords&&multiply">

                <YandexMap
                    :coordinates="[coords[0].lat,coords[0].lon]"
                    v-if="coords"
                >
                    <YandexMarker
                        v-for="(cord,index) in coords"

                        :coordinates="[cord.lat,cord.lon]"  :marker-id="'marker-'+index">
                    </YandexMarker>
                </YandexMap>
            </div>

        </div>
    </div>
</div>
</template>
<script>
import { YandexMap, YandexMarker } from 'vue-yandex-maps'

export default  {
    components: { YandexMap, YandexMarker },
    setup() {
        return {
            center: [0, 0],
        }
    },
    mounted(){

    },
    props:["coords","multiply"]
}

</script>
<style>
.yandex-container,
.ymap-container {
    height: 100vh;

}
</style>
