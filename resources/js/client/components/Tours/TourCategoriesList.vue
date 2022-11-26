<template>
    <ul class="nav nav-pills dt__tabs-list d-lg-flex d-none" id="pills-tab" role="tablist">
        <li class="nav-item flex-fill me-1 mb-3">
            <a class="nav-link" id="pills-1"
               v-bind:class="{'active':filters.tour_categories.length===0}"
               @click="filterTourByCategory(null)"
               data-toggle="pill" href="#pills-1" role="tab"
               aria-controls="pills-1" aria-selected="true">Все</a>

            </li>

        <li class="nav-item flex-fill me-1 mb-3" v-for="item in getCategories">
            <a class="nav-link" id="pills-1"
               v-bind:class="{'active':filters.tour_categories.indexOf(item.id)>-1}"
               @click="filterTourByCategory(item.id)" :id="'pills-'+item.id"
               data-toggle="pill" :href="'#pills-'+item.id" role="tab"
               aria-controls="pills-1" aria-selected="true">{{item.title}}</a>
        </li>
    </ul>

</template>

<script>
import {mapGetters} from 'vuex';

export default {
    data(){
        return {
            filters:{
                tour_categories: []
            }

        }
    },
    computed: {
        ...mapGetters(['getCategories','getCategoryById']),
    },
    mounted() {
        this.loadTourCategories().then(()=>{
            console.log(this.getCategories)
        })

        this.eventBus.on('reset_filters', () => {
           this.filters.tour_categories = []
        })
    },
    methods:{
        filterTourByCategory(id){
            if (id===null)
            {
                this.filters.tour_categories = [];
                return;
            }
            let index  = this.filters.tour_categories.indexOf(id);
            if (index>-1)
                this.filters.tour_categories.splice(index, 1);
            else
                this.filters.tour_categories.push(id)

            this.eventBus.emit('select_filtered_categories', this.filters)
        },
        loadTourCategories(){
            return this.$store.dispatch("loadAllCategories")
        }
    }
}
</script>
