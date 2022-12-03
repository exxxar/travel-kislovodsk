<template>
    <div class="personal-account__content">
        <h2 class="personal-account__title personal-account__title_black fw-bold">
            Просмотренные
        </h2>
        <div class="personal-account-viewed">
            <div class="dt-form row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">
                <div class="col col-xs-12" v-for="item in watches">
                    <tour-card-component :tour="item.tour" :key="item"/>
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

            watches: []
        }
    },
    computed: {
        ...mapGetters(['getUserWatchedTours']),
    },
    mounted() {
        this.loadUserWatchedToursByPage();
    },
    methods: {
        loadUserWatchedToursByPage() {
            this.$store.dispatch("loadUserWatchedToursByPage").then(() => {
                this.watches = this.getUserWatchedTours
                console.log("watched", this.watches)
            })
        }
    }
}
</script>

