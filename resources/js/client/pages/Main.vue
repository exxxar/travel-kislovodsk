<template>
    <main class="dt-page-main mt-0">
        <div class="align-items-center d-flex dt-page__preheader-search justify-content-center position-relative">
            <div class="dt-wrapper--black-70 position-absolute"></div>

            <div class="container dt-search__content text-center">
                <h1 class="dt-search__title">Экскурсии по Ставропольскому краю</h1>

                <tour-search-filter :is-links-white="true" :need-redirect-to-all="true"/>
            </div>
        </div>
        <div class="container mb-5 mt-5" v-if="user.is_admin">
            <admin-menu-component/>
        </div>
        <div class="container">
            <div
                class="align-items-center d-flex dt-online-register justify-content-center text-center position-relative">
                <div class="dt-wrapper bg-img-1 position-absolute w-100 h-100"></div>
                <div class="dt-online-register__info d-flex align-items-center">
                    <h3 class="fw-bold dt-online-register-title text-white">Онлайн заявка на регистрацию туристических
                        групп</h3>
                    <a href="/group-register" class="btn dt-btn-white dt-online-register-btn"><span>Заполнить</span></a>
                </div>
            </div>
            <div class="dt-popular">
                <div class="dt-popular__header dt-block-header text-center">
                    <h1 class="dt-header__title">Популярные направления</h1>
                    <h6 class="dt-header__subtitle">основываясь на оценках посетителей</h6>
                </div>
                <div class="dt-popular__tabs">
                    <tour-categories-list-slider-component/>
                    <tour-list-component/>
                    <div class="dt-popular__action text-center d-flex justify-content-center">
                        <a href="/tours-all"
                           class="align-items-center btn d-flex dt-btn dt-btn-blue justify-content-center">
                            Все экскурсии
                        </a>
                    </div>
                </div>
            </div>
            <benefits-component/>

            <callback-section-component/>


        </div>


    </main>
</template>
<script>
import TourSearchFilter from "@/components/Tours/TourSearchFilter.vue";

export default {
    components: {TourSearchFilter},
    computed:{
        user(){
            return window.user
        }
    }
}
</script>
<style lang="scss">
.dt-page-main .dt-online-register .dt-wrapper.bg-img-1 {
    background: url('img/3.png') no-repeat;
    background-size: cover;
    background-position-y: -470px;
    background-color: #030202b3;
    background-blend-mode: darken;
}

.dt-btn-white {
    display: flex;
    justify-content: center;
    align-items: center;
}

</style>
