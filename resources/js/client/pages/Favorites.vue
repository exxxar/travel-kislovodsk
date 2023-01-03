<template>
    <main class="dt-page-main mt-0">
        <div class="container">
            <div class="row d-flex mt-5">
                <div class="col-12 ">
                    <breadcrumbs-component :items="breadcrumbs"/>
                </div>
            </div>
            <div class="dt-popular">
                <div class="dt-popular__header dt-block-header text-center">
                    <h1 class="dt-header__title">То что понравилось</h1>
                    <h6 class="dt-header__subtitle">основываясь на ваших предпочтениях</h6>
                </div>
                <div class="dt-popular__tabs">
                    <tour-categories-list-slider-component/>
                    <tour-favorite-list-component/>
                    <div class="dt-popular__action text-center d-flex justify-content-center">
                        <a href="/tours-all" class="align-items-center btn d-flex dt-btn dt-btn-blue justify-content-center">
                            Все экскурсии
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
<script>
import {mapGetters} from "vuex";

export default {

    computed: {
        user() {
            return window.user
        },
    },
    data() {
        return {
            breadcrumbs: [
                {
                    text: "Главная",
                    href: "/",
                },
                {
                    text: "Избранное",
                    active: true,
                }],

        }
    },

}
</script>
<style lang="scss">

</style>
