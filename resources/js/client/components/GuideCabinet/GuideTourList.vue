<template>
    <div class="dt-excursions__item" v-for="item in tours" v-if="tours.length>0">
        <div class="row mb-2">
            <div class="col-12">
                <guide-tour-card-component :tour="item" :key="item"/>
            </div>
        </div>
    </div>
    <div class="dt-excursions__item" v-else-if="!load&&tours.length===0">
        <div class="row d-flex justify-content-center">
            <div class="col col-12 col-md-6">
                <div class="empty-list">
                    <img v-lazy="'/img/no-tour.jpg'" alt="">
                    <p>По данному фильтру ничего не найдено:(</p>
                </div>
            </div>

        </div>
    </div>

    <div v-if="load">
        <div class="row d-flex justify-content-center">
            <div class="col col-12 col-md-6">
                <div class="empty-list">
                    <img v-lazy="'/img/load.gif'" alt="">
                    <p>Грузим информацию....</p>
                </div>
            </div>
        </div>
    </div>

    <paginate-component v-if="pagination"
                        :pagination="pagination"/>
</template>
<script>
import {mapGetters} from "vuex";

export default {
    data() {
        return {
            load: false,
            activeType: null,
            tours: [],
            category:0,
            pagination: null
        }
    },
    computed: {
        ...mapGetters(['getGuideTours',
            'getGuideToursPaginateObject']),
    },
    mounted() {

        this.loadTours()

        this.eventBus.on('load_guide_tours', (title) => {
            console.log("load_guide_tours", title)
            this.changeActiveTitle(title)
           /* this.loadTours().then(() => {
                if (title)

            })*/

        })

        this.eventBus.on('select_guide_tours_type', (type) => {
            console.log("select_guide_tours_type", type)
            this.changeActiveTitle(type)
        })

        this.eventBus.on('pagination_page', (page) => {
            this.loadTours(page)
        })
    },
    methods: {
        changeActiveTitle(title) {
            switch (title) {
                default:
                case "Действующие":
                    //this.tours = this.getGuideTours;
                    this.category = 0
                    break;
                case "Архив":
                    //this.tours = this.getGuideArchiveTours;
                    this.category = 1
                    break;
                case "На модерации":
                    //this.tours = this.getGuideIsModerateTours;
                    this.category = 2
                    break;
                case "Черновики":
                    //this.tours = this.getGuideIsDraftTours
                    this.category = 3
                    break;
            }

            this.loadTours()
        },
        loadTours(page = 0) {
            this.load = true
            this.tours = []
            return this.$store.dispatch("loadGuideToursByPage", {
                page: page,
                category: this.category
            }).then(() => {
                this.tours = this.getGuideTours
                this.pagination = this.getGuideToursPaginateObject
                this.load = false
            })
        }
    }
}
</script>
<style lang="scss">
.empty-list {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;

    img {
        width: 100%;
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
