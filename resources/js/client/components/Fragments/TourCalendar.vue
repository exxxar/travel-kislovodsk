<template>
    <Datepicker @input="$emit('input', $event.target.value)" :range="true"
                :multiCalendars="multiCalendars||false" ref="dp" :inline="inline||false" :auto-apply="autoApply||false"
                @update:modelValue="update" :enableTimePicker="false">
        <template #calendar-header="{ index, day }">
            <div :class="index === 5 || index === 6 ? 'blue-color' : ''">
                {{ this.days[index] }}
            </div>
        </template>

        <template #action-select>
            <p class="blue-color fw-bold" @click="selectDate">Выбрать</p>
        </template>

        <template #month-overlay="{ text, value }">
            {{ months[value] }}
        </template>

        <template #month="{ text, value }">
            {{ months[value] }}
        </template>
        <template #dp-input="{ value, onInput, onEnter, onTab, onClear }">
            <p class="calendar-text dt-text--regular"> {{ value || 'Когда?' }} <span
                class="dt-text-muted--white-50">{{ !value ? '(необязательно)?' : '' }} </span>
            </p>
        </template>
        <template #day="{ day, date }">
            <temlplate v-if="checkDate(date)">
                <p class="selected-day">{{ day }}</p>
            </temlplate>
            <template v-else>
                {{ day }}
            </template>
        </template>
    </Datepicker>
</template>
<script>
import {mapGetters} from "vuex";
import Datepicker from '@vuepic/vue-datepicker';

import '@vuepic/vue-datepicker/dist/main.css'
import {ref} from 'vue';


export default {
    props: ["inline", "autoApply", "onlySelfTour", "multiCalendars"],
    setup() {
        const date = ref();
        const dp = ref(null);

        const selectDate = () => {
            if (dp) {
                // Close the menu programmatically
                dp.value.selectDate()
            }
        }

        return {
            date,
            dp,
            selectDate
        }
    },
    components: {Datepicker},
    data() {
        return {
            date: null,
            days: ["Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс"],
            months: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"],

        }
    },
    computed: {
        ...mapGetters(['getTourDates']),
        moment() {
            return window.moment
        },
        filteredDates() {
            if (!this.getTourDates)
                return []

            let tmp = []

            let dates = this.getTourDates

            dates.forEach(item => {
                if (tmp.indexOf(moment(item).format('YYYY-MM-DD')) === -1)
                    tmp.push(moment(item).format('YYYY-MM-DD'))
            })

            return tmp
        }
        ,
    },
    mounted() {
        this.loadDictionaries()
    },
    methods: {
        update(data) {
            this.$emit("select-date", {
                start_date: moment(data[0]).format('YYYY-MM-DD'),
                end_date: moment(data[1] || data[0]).format('YYYY-MM-DD')
            })
        },
        checkDate(date) {
            let preparedDate = moment(date).format('YYYY-MM-DD')

            return this.filteredDates.filter(item => item === preparedDate).length > 0
        },

        loadDictionaries() {
            this.$store.dispatch("loadTourDates", this.onlySelfTour)
        },

    }
}
</script>

<style lang="scss">
.dt-list {
    a.active {
        color: #0071eb !important;
    }
}

.blue-color {
    color: #0071eb;
}

.selected-day {
    position: relative;
    background: rgba(0, 113, 235, 0.56);
    /* padding: 9px; */
    border-radius: 5px;
    width: 30px;
    height: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;


}

.dp__range_between {

    .selected-day {
        background: #0071eb !important;
    }

}

.calendar-text {
    width: 230px !important;
    text-align: left;
    font-size: 0.8rem;
}

.dt-input__wrapper .dp__main.dp__theme_light {
    width: 75% !important;
}
</style>
