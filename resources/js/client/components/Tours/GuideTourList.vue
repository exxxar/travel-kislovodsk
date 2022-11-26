<template>
    <div class="dt-excursions__item" v-for="item in data">
        <guide-tour-card :data="item" :key="item"/>
    </div>
</template>
<script>
import GuideTourCard from "@/components/Tours/GuideTourCard.vue";

export default {
    components: {GuideTourCard},
    props: {
        data: {
            type: Array,
            default: function () {
                return []
            }
        }
    },
    data() {
        return {

        }
    }
}
</script>
