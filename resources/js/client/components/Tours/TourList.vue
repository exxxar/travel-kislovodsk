<template>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
             aria-labelledby="pills-home-tab">
            <div class="dt-form row-cols-lg-4 row-cols-sm-1 row-cols-md-2" v-if="tours.length>0">
                <div class="col col-xs-12" v-for="item in tours" >
                    <tour-card-component :data="item" :key="item"/>
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
        this.loadTours();
        this.eventBus.on('select_category', (id) => {
            console.log("select_category", id)
            if (id != null) {
                console.log("tours before", this.tours)
                this.tours = this.getToursByCategoryId(id)
                console.log("tours after", this.tours)

            } else
                this.loadTours();
        })
    },
    methods: {
        loadTours() {
            this.$store.dispatch("loadToursByPage").then(() => {
                this.tours = this.getTours
            })
        }
    }
}
</script>
<style lang="scss">
.empty-list {
    width:100%;
    img {
        width:100%;
        object-fit: cover;
        mix-blend-mode: darken;
    }

    p {
        width: 100%;
        text-align: center;
    }
}
</style>
