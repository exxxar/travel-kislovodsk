<template>
    <div class="row">
        <div class="col-lg-3">

        </div>
        <div class="col-lg-6 dt-pagination d-flex justify-content-center align-items-center">
            <!--            <button class="button bold bg-blue col-12 col-lg-auto px-4 rounded">Показать еще
                            <svg class="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20"
                                 width="20">
                                <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                            </svg>
                        </button>-->
            <nav aria-label="Page navigation" class="dt-nav-pagination dt-pagination_body">
                <ul class="pagination" v-if="pagination">
                    <li class="page-item page-item-control"
                        v-bind:class="{'disabled':pagination.links.prev===null}"
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
                        @click="page(index)"
                        v-bind:class="{'active':currentPage==index }"
                    >

                        <div class="page-link" v-if="index!==0&&index!==filteredLinks.length-1">{{item.label}}</div>
                    </li>

                    <li class="page-item page-item-control"
                        v-bind:class="{'disabled':pagination.links.next===null}"

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


export default {
    props:["pagination"],
    data(){
        return {
            currentPage:1,
        }
    },
    computed: {
        filteredLinks(){
            if (!this.pagination)
                return [];

            return this.pagination.meta.links
        }
    },
    methods:{
        nextPage(){
            this.currentPage = this.pagination.meta.current_page+1
            this.eventBus.emit('pagination_page', this.pagination.meta.current_page+1)
        },
        page(index){
            if (this.currentPage===index)
                return;
            window.scrollTo({
                top: 500,
                behavior: "smooth"
            })
            this.currentPage = index
            this.eventBus.emit('pagination_page', index)
        },
        prevPage(){
            if (this.currentPage===1)
                return

            this.currentPage = this.pagination.meta.current_page-1
            this.eventBus.emit('pagination_page', this.pagination.meta.current_page-1)
        }
    },

}
</script>
