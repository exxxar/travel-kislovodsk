<template>
    <div class="row" v-if="tour_objects.length>0&&!load">
        <div class="col-12 col-md-6 col-xl-4 col-lg-6 mb-2" :key="item" v-for="item in tour_objects">
            <tour-object-card-component
                :tour-object="item"
            />
        </div>
    </div>
    <div class="row  d-flex justify-content-center" v-else-if="!load&&tour_objects.length===0">

        <div class="col col-12 col-md-6">
            <div class="empty-list">
                <img v-lazy="'/img/no-tour.jpg'" alt="">
                <p>По данному фильтру ничего не найдено:(</p>
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
            tour_objects: [],
            pagination: null
        }
    },
    computed: {
        ...mapGetters(['getTourObjects', 'getTourObjectsPaginateObject']),
    },
    mounted() {
        this.loadTourObjects()

        this.eventBus.on('pagination_page', (index) => {
            this.load = true
            this.$store.dispatch("loadTourObjectsByPage", {
                page: index,
            }).then(() => {
                this.load = false
                this.tour_objects = this.getTourObjects
                this.pagination = this.getTourObjectsPaginateObject
            })

        })

    },
    methods: {
        loadTourObjects() {
            this.pagination = null
            this.load = true
            this.$store.dispatch("loadTourObjectsByPage").then(() => {
                this.tour_objects = this.getTourObjects
                this.pagination = this.getTourObjectsPaginateObject
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
