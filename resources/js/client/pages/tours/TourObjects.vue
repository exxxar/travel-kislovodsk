<template>
    <main class="container dt-page-excursions dt-page-excursion">
        <breadcrumbs :items="breadcrumbs"></breadcrumbs>
        <div class="dt-page__header">
            <p class="dt-header__title fs-1">
                Авторские экскурсионные туры по России
            </p>
            <p class="dt-header__description" :class="{'dt-text-more': !isShowMoreText}">
                118 увлекательных экскурсий в городе Ставропольский край – Минеральные воды и источники в
                Ставрополье славились лечебными свойствами уже давно: здесь лечили больных в войсках Кавказской
                линии. А с 1803 года начали обустраивать курорты на Кавказских минеральных водах., экскурсионные
                маршруты охватывают 111 достопримечательностей в городе и за его пределами, смотрите расписание
                экскурсий на и бронируйте билеты онлайн.
            </p>

        </div>

        <div class="dt-page__content row">
            <div class="col-lg-12 col-12 co dt-content">
                <tour-objects-component/>
            </div>
        </div>
    </main>


</template>
<script>
import Breadcrumbs from "@/components/Fragments/Breadcrumbs.vue";


export default {
    components: { Breadcrumbs},
    data() {
        return {
            breadcrumbs: [
                {
                    text: "Главная",
                    href: "/",
                },
                {
                    text: "Все туристические объекты",
                    active: true,
                }],


        }
    }

}
</script>
