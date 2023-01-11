<template>
    <div class="personal-account__content">
        <h2 class="personal-account__title personal-account__title_black fw-bold">
            Просмотренные
        </h2>
        <div class="personal-account-viewed">
            <div class="dt-form row" v-if="watches.length>0">
                <div class="col-12 col-md-4" v-for="item in watches">
                    <tour-card-component :tour="item.tour" :key="item"/>
                </div>

                <div class="col-12">
                    <paginate-component v-if="pagination"
                                        :pagination="pagination"/>
                </div>
            </div>

            <div class="dt-form row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 d-flex justify-content-center"
                 v-else-if="watches.length===0&&!load">
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


        </div>


    </div>
</template>

<script>

import {mapGetters} from "vuex";

export default {
    data() {
        return {
            pagination: null,
            watches: [],
            load: false
        }
    },
    computed: {
        ...mapGetters(['getUserWatchedTours', 'getUserWatchedToursPaginateObject']),
    },
    mounted() {
        this.loadUserWatchedToursByPage();

        this.eventBus.on('pagination_page', (page) => {
            this.loadUserWatchedToursByPage(page)
        })
    },
    methods: {
        loadUserWatchedToursByPage(page = 0) {
            this.load = true
            this.watches = []
            this.$store.dispatch("loadUserWatchedToursByPage", {
                page: page
            }).then(() => {
                this.watches = this.getUserWatchedTours
                this.pagination = this.getUserWatchedToursPaginateObject
                this.load = false
            })
        }
    }
}
</script>

