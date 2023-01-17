<template>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
             aria-labelledby="pills-home-tab">
            <div class="dt-form row" v-if="favorites.length>0">
                <div class="col-12 col-md-6 col-lg-3" v-for="item in favorites" >
                    <tour-card-component :tour="item.tour" :key="item"/>
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

            favorites: []
        }
    },
    computed: {
        ...mapGetters(['getFavoritesByCategoryId',  'getFavorites']),
    },
    mounted() {
        this.loadAllFavorites();
        this.eventBus.on('select_category', (id) => {
            if (id != null) {
                this.favorites = this.getFavoritesByCategoryId(id)
            } else
                this.loadAllFavorites();
        })
    },
    methods: {
        loadAllFavorites() {
            this.$store.dispatch("loadAllFavorites").then(() => {
                this.favorites = this.getFavorites

            })
        },
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
