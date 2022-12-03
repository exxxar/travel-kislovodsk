<template>
    <main class="dt-page-main mt-0">
        <div class="container">
            <div class="dt-popular">
                <div class="dt-popular__header dt-block-header text-center">
                    <h1 class="dt-header__title">Самые горячие экскурсии</h1>
                    <h6 class="dt-header__subtitle">то что точно понравится</h6>
                </div>
                <div class="dt-popular__tabs">
                    <tour-categories-list-slider-component/>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                             aria-labelledby="pills-home-tab">
                            <div class="dt-form row-cols-lg-4 row-cols-sm-1 row-cols-md-2" v-if="tours.length>0">
                                <div class="col col-xs-12" v-for="item in tours">
                                    <tour-card-component :tour="item" :key="item"/>


                                </div>

                            </div>
                            <div class="dt-form row d-flex justify-content-center" v-else>
                                <div class="col-md-6 col-12">
                                    <div class="empty-list">
                                        <img v-lazy="'/img/no-tour.jpg'" alt="">
                                        <p>В данной категории ничего не найдено</p>
                                    </div>
                                </div>


                            </div>
                        </div>


                    </div>

                    <div class="dt-popular__action text-center d-flex justify-content-center">
                        <a href="/tours-all" class="align-items-center btn d-flex dt-btn-blue justify-content-center">
                            <span>Все экскурсии</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
<script>
import TourCard from "@/components/Tours/TourCard.vue";
import {mapGetters} from "vuex";

export default {
    components: {TourCard},
    data() {
        return {

            tours: []
        }
    },
    computed: {
        ...mapGetters(['getToursByCategoryId', 'getTourById', 'getTours']),
    },
    mounted() {
        this.loadAllHotTours();
        this.eventBus.on('select_category', (id) => {
            if (id != null) {
                this.tours = this.getToursByCategoryId(id)
            } else
                this.loadAllHotTours();
        })
    },
    methods: {
        loadAllHotTours() {

            this.$store.dispatch("loadAllHotTours").then(() => {

                this.tours = this.getTours
                console.log("loadAllHotTours",   this.tours)
            })
        }
    }
}
</script>

