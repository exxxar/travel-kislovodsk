<template>
    <div id="calendar" class="col ">
        <div class="row row-cols-2 align-items-start mx-0">
            <h2 class="col-12 lh-1 mb-4 bold px-0 title-guide-cabinet">Календарь</h2>
            <div class="col-12 col-xl row mx-0 px-0 order-2 order-xl-1">
                <div class="overflow-x-auto d-flex align-items-center mx-0 px-0 mt-5 mt-xl-0">
                    <button
                        class="button bg-white d-flex rounded px-4 justify-content-center align-items-center semibold">
                        Сегодня
                    </button>
                    <button
                        class="button bg-white d-flex rounded ms-2 px-4 justify-content-center align-items-center semibold">
                        Ближайшие даты
                    </button>
                    <button
                        class="button bg-white d-flex rounded ms-2 px-4 justify-content-center align-items-center semibold">
                        Выбранная
                        дата
                    </button>
                </div>
                <div class="col-12 col-xl mx-0 mt-3 mt-xl-0 px-0" v-if="schedule.length>0">
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

                    <button class="button col-12 px-4 mt-5 active rounded shadow-none">
                        <span class="bold">Показать ещё</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                            <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="col-12 col-xl row d-flex mx-0 px-0 ps-xl-5 order-1 order-xl-2">
                <tour-calendar-component :inline="true" :only-self-tour="true"/>
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
            schedule: []
        }
    },
    computed: {
        ...mapGetters(['getGuideSchedules']),
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

        loadGuideSchedulesByPage() {
            this.$store.dispatch("loadGuideSchedulesByPage").then(() => {
                this.schedule = this.getGuideSchedules
                console.log("loadGuideSchedulesByPage", this.schedule)
            })
        }
    }
}
</script>
