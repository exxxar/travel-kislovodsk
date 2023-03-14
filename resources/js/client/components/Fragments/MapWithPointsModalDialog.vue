<template>
    <div class="modal fade" tabindex="-1"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Просмотр туров на карте</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-8">
                            <YandexMap
                                :zoom="zoom"
                                :coordinates="center"
                                v-if="coords&&isLoaded"
                                @click="onClick"
                                :show-all-markers="true"
                                :use-object-manager="true"
                            >
                                <YandexMarker
                                    v-for="(cord,index) in coords"
                                    :coordinates="[cord.lat,cord.lon]"
                                    :options="cord.options"
                                    :properties="cord.properties"
                                    :marker-id="'marker-'+index">
                                </YandexMarker>
                            </YandexMap>
                        </div>
                        <div class="col-md-4">
<!--                            <div class="card mb-2">
                                <div class="card-body">
                                    Фильтр отображаемых точек
                                </div>
                            </div>-->
                            <div class="scroll-container">
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div
                                        v-for="(tour, index) in tours"
                                        class="accordion-item">
                                        <h2 class="accordion-header" :id="'flush-heading-'+index">
                                            <button class="accordion-button collapsed" type="button"

                                                    data-bs-toggle="collapse"
                                                    :data-bs-target="'#flush-collapse-'+index" aria-expanded="false"
                                                    aria-controls="flush-collapseOne">

                                                <span
                                                    class="btn btn-outline-primary green-icon"
                                                    style="margin-right: 10px;"
                                                    @click="goToCenter(tour)"><i
                                                    class="fa-solid fa-location-dot"></i></span>

                                                <a
                                                    :href="'/tour/'+tour.id"
                                                    class="btn btn-outline-primary"
                                                    style="margin-right: 10px;"><i class="fa-solid fa-chevron-right"></i>
                                                </a>

                                                {{
                                                    tour.title || 'Нет заголовка'
                                                }}
                                            </button>
                                        </h2>
                                        <div :id="'flush-collapse-'+index" class="accordion-collapse collapse"
                                             aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <div class="list-group">
                                                    <li
                                                        @click="goToCenter(object)"
                                                        v-for="object in tour.tour_objects"
                                                        class="list-group-item list-group-item-action"
                                                        aria-current="true">
                                                       <span
                                                           class="btn btn-outline-primary red-icon"
                                                           style="margin-right: 10px;"
                                                           @click="goToCenter(object)"><i
                                                           class="fa-solid fa-location-dot"></i></span>

                                                        <a
                                                            :href="'/tour-object/'+object.id"
                                                            class="btn btn-outline-primary"
                                                            style="margin-right: 10px;"><i class="fa-solid fa-chevron-right"></i>
                                                        </a>

                                                       {{ object.title || 'Нет названия' }}

                                                    </li>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
</template>
<script>
import {YandexMap, YandexMarker} from 'vue-yandex-maps'
import {mapGetters} from "vuex";

export default {
    components: {YandexMap, YandexMarker},
    data() {
        return {
            zoom: 10,
            center: [0, 0],
            isLoaded: true,
            properties: {
                hintContent: "Москва",
                balloonContentHeader: "Москва",
                balloonContentBody: "Столица России",
                population: 11848762
            },
            options: {
                preset: "islands#redDotIcon",
                }
        }
    },
    computed: {

        coords() {
            let tmp = []
            this.tours.forEach(item => {
                tmp.push({lat:
                    item.start_latitude,
                    lon: item.start_longitude,
                    properties: {
                        hintContent: item.title,
                    },
                    options: {
                        preset: "islands#darkGreenDotIcon",
                    }
                })
                item.tour_objects.forEach(sub => {
                    tmp.push({lat: sub.latitude,
                        lon: sub.longitude,
                        properties: {
                            hintContent: sub.title,
                        },
                        options: {
                            preset: "islands#redDotIcon",
                        }
                    })
                })
            })

            return tmp
        }
    },
    mounted() {

    },
    methods: {
        goToCenter(object) {
            this.isLoaded = false
            this.zoom = 5
            this.center = [
                object.latitude || object.start_latitude || 0,
                object.longitude || object.start_longitude || 0
            ]

            setTimeout(() => {
                this.isLoaded = true
            }, 1)

        },

        onClick(e) {
            this.$emit("coords", e.get('coords'))
            this.coords.lat = e[1]
            this.coords.lon = e[0]
        }
    },
    props: ["tours"]
}

</script>
<style lang="scss">
.yandex-container,
.ymap-container {
    height: 100vh;

}

.scroll-container {
    height: 80vh;
    overflow-y: auto;
    padding: 10px 20px 10px 10px;
    box-sizing: border-box;
}

.green-icon {
    i {
        color:green;
    }

}

.red-icon {
   i {
       color:red;
   }
}
</style>
