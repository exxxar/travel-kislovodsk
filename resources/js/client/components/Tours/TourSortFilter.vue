<template>
    <div class="dt-sort">
        <div class="dt-sort-by d-lg-flex d-none">
            <p class="dt-sort-by__title">сортировка по</p>
            <p class="dt-sort-by__item  d-flex align-items-center"
               v-bind:class="{'active':filters.sort_type===item.id}"
               v-for="item in sortTypes" @click="changeSort(item.id)">
                {{ item.title }}
                <span class="dt-sort-by__icon" v-if="direction[item.id]===0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                          <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                        </svg>
                        </span>
                <span class="dt-sort-by__icon" v-else>
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                              <path
                                  d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                            </svg>
                        </span>

            </p>

        </div>
        <div class="dt-sort-by d-lg-none d-flex justify-content-between">
            <p class="dt-sort-by__title">сортировка по</p>
            <p class="dt-sort-by__item active">популярности</p>
        </div>
    </div>
</template>
<script>
import {mapGetters} from "vuex";

export default {
    props: {
        isLinksWhite: {
            type: Boolean,
            default: false
        }
    },

    watch: {
        filters: {
            handler(newValue, oldValue) {
                this.eventBus.emit('select_filtered_sort', this.filters)
            },
            deep: true
        }
    },
    data() {
        return {
            direction: [],
            filters: {
                sort_type: 0,
                sort_direction: 0
            },
        }
    },
    computed: {
        ...mapGetters(['getDictionariesByTypeSlug']),

        sortTypes() {
            return this.getDictionariesByTypeSlug("sort_type")
        },
    },
    mounted() {
        this.loadDictionaries()
    },
    methods: {
        changeSort(id) {
            this.filters.sort_type = id
            this.direction[id] = this.direction[id] === 0 ? 1 : 0;
            this.filters.sort_direction = this.filters.sort_direction === 0 ? 1 : 0
        },
        loadDictionaries() {
            this.$store.dispatch("loadAllDictionaryTypes")
        },
    }
}


</script>
<style lang="scss">
.dt-sort-by__icon {
    svg {
        width: 10px;
    }
}
</style>
