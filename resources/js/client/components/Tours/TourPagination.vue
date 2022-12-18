<template>
    <div class="row">
        <div class="col-lg-3">

        </div>
        <div class="col-lg-6 dt-pagination d-flex justify-content-between align-items-center">

            <nav aria-label="Page navigation" class="dt-nav-pagination dt-pagination_body">
                <ul class="pagination" v-if="pagination">
                    <li class="page-item page-item-control"
                        v-bind:class="{'disabled':!pagination.links.prev}"
                        @click="prevPage">
                        <div class="page-link" >
                            <svg width="6" height="10" viewBox="0 0 8 12" fill="#eff0f0">
                                <path data-v-346e8e5a=""
                                      d="M8 1.42L3.42 6L8 10.59L6.59 12L0.59 6L6.59 1.23266e-07L8 1.42Z"></path>
                            </svg>
                        </div>
                    </li>


                        <li class="page-item" :key="'paginate'+index"
                            v-for="(item, index) in filteredLinks"
                            v-bind:class="{'active':item.active}"
                            @click="page(item.label)"
                        >
                            <div class="page-link">{{item.label}}</div>
                        </li>


                    <li class="page-item page-item-control"
                        v-bind:class="{'disabled':!pagination.links.next}"

                    >
                        <div class="page-link" @click="nextPage">
                            <svg width="6" height="10" viewBox="0 0 8 12">
                                <path
                                    d="M0 10.5801L4.58 6.00012L0 1.41012L1.41 0.00012207L7.41 6.00012L1.41 12.0001L0 10.5801Z"></path>
                            </svg>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="col-lg-3">

        </div>
    </div>
</template>
<script>
import {mapGetters} from "vuex";

export default {
    data(){
      return {
          pagination:null,
      }
    },
    computed: {
        ...mapGetters(['getToursPaginateObject']),
        filteredLinks(){
            if (!this.pagination)
                return [];

            return this.pagination.meta.links.filter((item, index)=>{
                return index>0
                    &&index<this.pagination.meta.last_page
                    &&this.pagination.meta.current_page>index-3
                    &&this.pagination.meta.current_page<index+3
            })

        }
    },
    methods:{
        nextPage(){
            this.eventBus.emit('next_tour_page')
        },
        page(index){
            this.eventBus.emit('tour_page', index)
        },
        prevPage(){
            this.eventBus.emit('prev_tour_page')
        }
    },
    mounted() {
        this.eventBus.on('update_tour_pagination',()=>{

            this.pagination = this.getToursPaginateObject

        })

    }
}
</script>
