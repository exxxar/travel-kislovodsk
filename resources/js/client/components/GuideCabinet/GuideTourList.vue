<template>
    <div class="dt-excursions__item" v-for="item in tours" v-if="tours.length>0">
        <guide-tour-card-component :data="item" :key="item"/>
    </div>
    <div class="dt-excursions__item" v-else>
        <div class="row d-flex justify-content-center">
            <div class="col col-12 col-md-6">
                <div class="empty-list">
                    <img v-lazy="'/img/no-tour.jpg'" alt="">
                    <p>По данному фильтру ничего не найдено:(</p>
                </div>
            </div>

        </div>
    </div>
</template>
<script>
import {mapGetters} from "vuex";

export default {
    data(){
        return {
            activeType: null,
            tours: []
        }
    },
    computed: {
        ...mapGetters(['getGuideTours','getGuideArchiveTours','getGuideIsDraftTours','getGuideIsModerateTours']),
    },
    mounted() {
        this.loadTours()

        this.eventBus.on('select_guide_tours_type', (type)=>{

            this.changeActiveTitle(type)
        })
    },
    methods:{
        changeActiveTitle(title) {
            switch (title ) {
                default:
                case "Действующие": this.tours = this.getGuideTours; break;
                case "Архив": this.tours = this.getGuideArchiveTours; break;
                case "На модерации": this.tours = this.getGuideIsModerateTours; break;
                case "Черновики": this.tours = this.getGuideIsDraftTours; break;
            }
        },
        loadTours(){
            this.$store.dispatch("loadGuideToursByPage").then(()=>{
                this.tours = this.getGuideTours
            })
        }
    }
}
</script>
<style lang="scss">
.empty-list {
    width:100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    img {
        width:100%;
        object-fit: cover;
        mix-blend-mode: darken;
    }

    p {
        width: 100%;
        text-align: center;
        margin-bottom: 10px;
    }
}
</style>
