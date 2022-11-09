<template>
    <div class="personal-account__content">
        <h2 class="personal-account__title personal-account__title_black fw-bold">
            Мои отзывы
        </h2>
        <personal-review-list />
    </div>
</template>

<script>
import PersonalReviewList from "@/components/Reviews/PersonalReviewList.vue";
export default {
    name: "Reviews",
    components: {PersonalReviewList}
}
</script>

<style scoped>

</style>
