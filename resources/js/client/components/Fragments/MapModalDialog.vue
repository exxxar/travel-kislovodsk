<template>
    <div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-body" v-if="!multiply&&coords">

                    <YandexMap
                        :coordinates="[coords.lat,coords.lon]"
                        v-if="coords"
                        @click="onClick"

                    >
                        <YandexMarker :coordinates="[coords.lat,coords.lon]" :marker-id="123">
                        </YandexMarker>
                    </YandexMap>

                </div>
                <div class="modal-body" v-if="coords&&multiply">
                    <YandexMap
                        :coordinates="[coords[0].lat,coords[0].lon]"
                        v-if="coords"
                        @click="onClick"
                    >
                        <YandexMarker
                            v-for="(cord,index) in coords"
                            @click="filterTour(cord)"
                            :coordinates="[cord.lat,cord.lon]" :marker-id="'marker-'+index">
                        </YandexMarker>
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
    setup() {
        return {
            center: [0, 0],
        }
    },

    mounted() {

    },
    methods: {
        filterTour(cord) {
            this.$store.dispatch("loadToursFilteredByCoordsByPage", {
                page: 0,
                filters: {
                    latitude: cord.lat || 0,
                    longitude: cord.lon || 0
                }
            }).then(resp => {
                console.log(resp)
                if (resp.data.length > 0)
                    window.location.href = "/tour/" + resp.data[0].id
            })

        },
        onClick(e) {
            this.$emit("coords", e.get('coords'))
            this.coords.lat = e[1]
            this.coords.lon = e[0]
        }
    },
    props: ["coords", "multiply"]
}

</script>
<style>
.yandex-container,
.ymap-container {
    height: 100vh;

}
</style>
