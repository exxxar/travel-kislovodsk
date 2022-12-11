<template>

    <Datepicker
                @input="$emit('input', $event.target.value)"
                class="w-100"
                ref="dp"
                multi-dates multi-dates-limit="20" >
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

<!--        <template #dp-input="{ value, onInput, onEnter, onTab, onClear }">

            <p class="calendar-text"> {{value||'Когда?'}}</p>

        </template>-->

        <template #day="{ day, date }">
                {{ day }}
        </template>
    </Datepicker>

</template>
<script>
import Datepicker from '@vuepic/vue-datepicker';

import '@vuepic/vue-datepicker/dist/main.css'
import { ref } from 'vue';


export default {
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
            months: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль","Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"],

        }
    },
    computed: {

        moment() {
            return window.moment
        }

,
    },

}
</script>

<style lang="scss">

.blue-color {
    color: #0071eb;
}

</style>
