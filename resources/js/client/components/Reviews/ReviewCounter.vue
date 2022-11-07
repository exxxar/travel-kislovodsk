<template>
    <div>
        <div class="dt-reviews__header d-flex justify-content-between">
            <p class="dt-article__title mb-0">Отзывы об экскурсии</p>
            <div class="dt-article__reviews-count d-flex align-items-center">
                <h3 class="fw-bold me-3">4.86 из 5</h3>
                <div class="dt-rating__star d-flex w-auto me-3">
                   <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                   <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                   <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                   <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                   <img v-lazy="'/img/icons/star_blue.svg'" alt="">
                </div>
                <p class="fw-thin">43 оценки</p>
            </div>
        </div>
        <div class="dt-reviews__rating">
            <div class="dt-rating__item d-flex align-items-center">
                <div class="dt-rating__star d-flex me-4">
                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                </div>
                <div class="loading loading--percently-80 me-2"></div>
                <p class="dt-main-text-thin">1090</p>
            </div>
            <div class="dt-rating__item d-flex align-items-center">
                <div class="dt-rating__star d-flex me-4">
                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                </div>
                <div class="loading loading--percently-40 me-2"></div>
                <p class="dt-main-text-thin">140</p>
            </div>
            <div class="dt-rating__item d-flex align-items-center">
                <div class="dt-rating__star d-flex me-4">
                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                </div>
                <div class="loading loading--percently-20 me-2"></div>
                <p class="dt-main-text-thin">21</p>
            </div>
            <div class="dt-rating__item d-flex align-items-center">
                <div class="dt-rating__star d-flex me-4">
                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                </div>
                <div class="loading me-2"></div>
                <p class="dt-main-text-thin">0</p>
            </div>
            <div class="dt-rating__item d-flex align-items-center">
                <div class="dt-rating__star d-flex me-4">
                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                </div>
                <div class="loading loading--percently-10 me-2"></div>
                <p class="dt-main-text-thin">4</p>
            </div>
        </div>
        <div class="dt-reviews__sort-by d-flex justify-content-end">
            <p class="dt-sort-by__title fw-thin">сортировка по</p>
            <p class="dt-sort-by__item active fw-regular">дате</p>
            <p class="dt-sort-by__item fw-regular">оценке</p>
        </div>
    </div>
</template>

<script>
export default {}
</script>

<style scoped>

</style>
