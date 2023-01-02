<template>
    <div id="calendar" class="col ">
        <div class="row row-cols-2 align-items-start mx-0">
            <h2 class="col-12 lh-1 mb-4 bold px-0 title-guide-cabinet">Календарь</h2>
            <div class="col-12 col-xl row mx-0 px-0 order-2 order-xl-1">
                <div class="overflow-x-auto d-flex align-items-center mx-0 px-0 mt-5 mt-xl-0">
                    <button
                        type="button"
                        @click="filterObject.filter_type =1"
                        v-bind:class="{'btn-primary':filterObject.filter_type ===1
                  }"
                        class="btn btn-schedule">
                        Сегодня
                    </button>
                    <button
                        type="button"
                        @click="filterObject.filter_type =2"
                        v-bind:class="{'btn-primary':filterObject.filter_type ===2 }"
                        class="btn ms-2 px-4 btn-schedule">
                        Ближайшие даты
                    </button>
                    <button
                        type="button"
                        @click="filterObject.filter_type =0"
                        v-bind:class="{'btn-primary':filterObject.filter_type ===0}"
                        class="btn btn-schedule">
                        Выбранная
                        дата
                    </button>
                </div>
                <div class="col-12 col-xl mx-0 mt-3 mt-xl-0 px-0" v-if="schedule.length>0">
                    <p class="mt-2" style="color:gray; text-align: center;"><small>Событий всего - {{schedule.length}}</small></p>
                    <div class="mt-4" v-for="item in groupByDate">
                        <span class="bold font-size-09">{{ item.date }}</span>
                        <div
                            v-for="date in item.schedules"
                            class="row mx-0 p-4 mt-2 bg-white rounded d-flex justify-content-between align-items-center">
                            <span class="col-12 font-size-09">{{ date.tour.title }}</span>
                            <div class="col-12 row mx-0 px-0 mt-2">
                                <span class="col-auto bold blue font-size-09">{{ date.start_at }}</span>
                                <a
                                    :href="'/tour/'+date.tour.id"
                                    target="_blank"
                                    class="col-12 col-sm-auto letter-spacing-3 blue-hover text-start text-uppercase bold font-size-07 mt-3 mt-sm-0 ms-sm-auto">
                                    подробнее
                                    <span class="blue fs-6">&gt;</span>
                                </a>
                            </div>
                        </div>

                    </div>

                    <button
                        v-if="canLoadMore"
                        @click="loadMoreSchedule"
                        class="btn btn-primary col-12 px-4 mt-5 active rounded shadow-none">
                        <span class="bold">Показать ещё</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                            <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                        </svg>
                    </button>
                </div>
                <div class="col-12 col-xl mx-0 mt-3 mt-xl-0 px-0" v-else-if="!load&&schedule.length===0">

                    <div class="empty-list">
                        <img v-lazy="'/img/no-tour.jpg'" alt="">
                        <p>По данному фильтру ничего не найдено:(</p>
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
            <div class="col-12 col-xl row mx-0 px-0 ps-xl-5 order-1 order-xl-2 sticky-calendar d-none d-lg-flex" >
                <tour-calendar-component
                    v-on:select-date="updateDate"
                    :inline="true"
                    :only-self-tour="true"/>
                <p class="mt-5" v-if="filterObject.data!=null">{{ filterObject.data }}</p>
            </div>
        </div>
    </div>
</template>
<script>
import {mapGetters} from "vuex";

export default {
    data() {
        return {
            load:false,
            canLoadMore: false,
            page: 0,
            activeType: null,
            filterObject: {
                date: null,
                filter_type: null
            },
            schedule: []
        }
    },
    watch: {
        'filterObject.date': function (oldVal, newVal) {
            this.page = 0
            this.loadGuideSchedulesFilteredByPage();
        },
        'filterObject.filter_type': function (oldVal, newVal) {
            if ( this.filterObject.filter_type==null)
                return;

            this.page = 0
            this.loadGuideSchedulesFilteredByPage();
        }
    },
    computed: {
        ...mapGetters(['getGuideSchedules', 'getGuideSchedulesCanLoadMore']),
        groupByDate() {
            if (this.schedule.length === 0)
                return [];

            let dates = [];

            this.schedule.forEach(item => {
                let selectedItems = dates.find(date => date.date === item.start_day)

                if (!selectedItems)
                    dates.push({
                        date: item.start_day,
                        schedules: [
                            item
                        ]
                    })
                else {
                    selectedItems.schedules.push(item)
                }
            })

            return dates;
        }
    },
    mounted() {
        this.loadGuideSchedulesByPage()

    },
    methods: {
        updateDate(date) {
            this.filterObject.filter_type = 0
            this.filterObject.date = date
        },
        loadGuideSchedulesFilteredByPage() {
            this.load = true
            this.$store.dispatch("loadGuideSchedulesFilteredByPage", {
                page: this.page,
                filterObject: this.filterObject
            }).then(() => {
                this.schedule = this.getGuideSchedules
                this.canLoadMore = this.getGuideSchedulesCanLoadMore
                this.load = false
            })
        },
        loadMoreSchedule() {
            this.page++;
            this.filterObject.filter_type = null
            this.loadGuideSchedulesByPage();
        },
        loadGuideSchedulesByPage() {
            this.load = true
            this.$store.dispatch("loadGuideSchedulesByPage", {
                page: this.page
            }).then(() => {
                this.schedule = this.getGuideSchedules
                this.canLoadMore = this.getGuideSchedulesCanLoadMore
                this.load = false
            })
        }
    }
}
</script>
<style lang="scss">
.sticky-calendar {
    position: sticky;
    top: 20px;
}

.btn-schedule {
    min-width: 196px;
    padding: 10px;
    background: white;
    margin: 0 10px;
}
</style>
