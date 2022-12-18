<template>
    <ul class="nav nav-pills dt-popular-list d-flex" id="pills-tab" role="tablist">
        <li class="nav-item flex-fill">
            <a class="nav-link"
               v-bind:class="{'active':selected_category_id===null}"
               @click="filterTourByCategory(null)"
               id="pills-1" data-toggle="pill" href="#pills-1" role="tab"
               aria-controls="pills-1" aria-selected="true">Все направления</a>
        </li>

        <li class="nav-item flex-fill" v-for="item in getCategories">
            <a class="nav-link"
               v-bind:class="{'active':selected_category_id===item.id}"
               @click="filterTourByCategory(item.id)" :id="'pills-'+item.id" data-toggle="pill" :href="'#pills-'+item.id" role="tab"
               :aria-controls="'pills-'+item.id" aria-selected="true">{{item.title}}</a>
        </li>
    </ul>
</template>

<script>
import {mapGetters} from 'vuex';

export default {
    data(){
      return {
          selected_category_id: null
      }
    },
    computed: {
        ...mapGetters(['getCategories','getCategoryById']),
    },
    mounted() {
        this.loadTourCategories().then(()=>{

        })
    },
    methods:{
        filterTourByCategory(id){
            this.selected_category_id = id
            this.eventBus.emit('select_category', id)
        },
        loadTourCategories(){
           return this.$store.dispatch("loadAllCategories")
        }
    }
}
</script>
