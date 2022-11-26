<template>
    <div>
        <div class="dt-reviews__header d-flex justify-content-between">
            <p class="dt-article__title mb-0">Отзывы об экскурсии</p>
            <div class="dt-article__reviews-count d-flex align-items-center">
                <h3 class="fw-bold me-3">{{tour.rating}} из 5</h3>
                <div class="dt-rating__star d-flex w-auto me-3">
                    <img v-lazy="tour.rating>=1?'/img/icons/star_blue.svg':'/img/icons/star_grey.svg'"  alt="">
                    <img v-lazy="tour.rating>=2?'/img/icons/star_blue.svg':'/img/icons/star_grey.svg'"  alt="">
                    <img v-lazy="tour.rating>=3?'/img/icons/star_blue.svg':'/img/icons/star_grey.svg'"  alt="">
                    <img v-lazy="tour.rating>=4?'/img/icons/star_blue.svg':'/img/icons/star_grey.svg'"  alt="">
                    <img v-lazy="tour.rating>=5?'/img/icons/star_blue.svg':'/img/icons/star_grey.svg'"  alt="">
                </div>
                <p class="fw-thin">{{maxReviews}} оценки</p>
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
                <div class="loading loading--percently me-2">
                    <div class="line" v-bind:style="{'width':((statistic[5]/maxReviews)*100)+'%'}"></div>
                </div>
                <p class="dt-main-text-thin">{{statistic[5]}}</p>
            </div>
            <div class="dt-rating__item d-flex align-items-center">
                <div class="dt-rating__star d-flex me-4">
                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                </div>
                <div class="loading loading--percently me-2">
                    <div class="line" v-bind:style="{'width':((statistic[4]/maxReviews)*100)+'%'}"></div>
                </div>
                <p class="dt-main-text-thin">{{statistic[4]}}</p>
            </div>
            <div class="dt-rating__item d-flex align-items-center">
                <div class="dt-rating__star d-flex me-4">
                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                </div>
                <div class="loading loading--percently me-2">
                    <div class="line" v-bind:style="{'width':((statistic[3]/maxReviews)*100)+'%'}"></div>
                </div>
                <p class="dt-main-text-thin">{{statistic[3]}}</p>
            </div>
            <div class="dt-rating__item d-flex align-items-center">
                <div class="dt-rating__star d-flex me-4">
                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                </div>
                <div class="loading loading--percently me-2">
                    <div class="line" v-bind:style="{'width':((statistic[2]/maxReviews)*100)+'%'}"></div>
                </div>
                <p class="dt-main-text-thin">{{statistic[2]}}</p>
            </div>
            <div class="dt-rating__item d-flex align-items-center">
                <div class="dt-rating__star d-flex me-4">
                    <img v-lazy="'/img/icons/star_grey.svg'" alt="">
                </div>
                <div class="loading loading--percently me-2">
                    <div class="line" v-bind:style="{'width':((statistic[1]/maxReviews)*100)+'%'}"></div>
                </div>
                <p class="dt-main-text-thin">{{statistic[1]}}</p>
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
export default {
    props:["tour"],
    computed:{
        maxReviews(){
            let sum  = 0;

            this.tour.rating_statistic.forEach(item=>{
                sum +=item;
            })

            return sum
        },
        statistic(){
            return this.tour.rating_statistic
        }
    },
    mounted() {

    }
}
</script>

<style lang="scss">
.loading--percently {
    position: relative;
    .line {
        position: absolute;
        height: 100%;
        background: #2364f1;
        top:0;
        left:0;
        width: 20%;
    }
}
</style>
