<template>
    <div class="row mx-0  gap-3" v-if="tour_objects.length>0">
        <guide-tour-object-card-component v-for="item in tour_objects"
                                          :tour-object="item"
                                          :key="item"/>
    </div>
    <div class="row gap-3 d-flex justify-content-center" v-else>

        <div class="col col-12 col-md-6">
            <div class="empty-list">
                <img v-lazy="'/img/no-tour.jpg'" alt="">
                <p>По данному фильтру ничего не найдено:(</p>
            </div>
        </div>


    </div>
</template>
<script>
import {mapGetters} from "vuex";

export default {
    data() {
        return {
            activeType: null,
            tour_objects: []
        }
    },
    computed: {
        ...mapGetters(['getGuideActiveTourObjects', 'getGuideRemovedTourObjects']),
    },
    mounted() {
        this.loadTourObjects()


        this.eventBus.on('tour_object_page', (index) => {
            this.$store.dispatch("loadGuideTourObjectsByPage",{
                page: index,
            }).then(() => {
                this.tour_objects = this.getGuideActiveTourObjects
                this.eventBus.emit('update_tour_object_pagination')
            })

        })

        this.eventBus.on('select_guide_tour_object_type', (type) => {
            this.changeActiveTitle(type)
        })
    },
    methods: {
        changeActiveTitle(title) {
            switch (title) {
                default:
                case "Действующие объекты":
                    this.loadTourObjects()
                    break;
                case "Удаленные объекты":
                    this.loadRemovedTourObjects()
                    break;
            }


        },

        loadRemovedTourObjects() {
            this.$store.dispatch("loadRemovedGuideTourObjectsByPage").then(() => {
                this.tour_objects = this.getGuideRemovedTourObjects

                this.eventBus.emit('update_tour_object_pagination')
            })
        },
        loadTourObjects() {

            this.$store.dispatch("loadGuideTourObjectsByPage").then(() => {

                this.tour_objects = this.getGuideActiveTourObjects

                this.eventBus.emit('update_tour_object_pagination')
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
