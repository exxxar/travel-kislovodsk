<template>
    <img v-lazy="rating>=1?'/img/icons/star_blue.svg':'/img/icons/star_grey.svg'"  alt="">
    <img v-lazy="rating>=2?'/img/icons/star_blue.svg':'/img/icons/star_grey.svg'"  alt="">
    <img v-lazy="rating>=3?'/img/icons/star_blue.svg':'/img/icons/star_grey.svg'"  alt="">
    <img v-lazy="rating>=4?'/img/icons/star_blue.svg':'/img/icons/star_grey.svg'"  alt="">
    <img v-lazy="rating>=5?'/img/icons/star_blue.svg':'/img/icons/star_grey.svg'"  alt="">
</template>
<script>
export default {
    props:["rating"]
}
</script>
