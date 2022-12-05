<template>
    <div class="excursion row bg-white rounded mx-0 mb-4 overflow-hidden" v-if="tour">
        <div class="col px-0">
            <div class="px-4 py-4 align-items-center row mx-0 excursion__info position-relative">
                <p class="excursion__name mb-2 bold order-2 order-xxl-1 col-12 mt-4 mt-xxl-0">
                    {{ tour.title || 'Нет заголовка'}}
                </p>
                <p class="short-descrtiption opacity-80 mb-3 lh-lg order-3 order-xxl-2 col-12">
                    {{ tour.short_description || tour.description || 'Нет описания' }}
                </p>
                <div class="col-12 col-xxl-auto order-1 order-xxl-3 row align-items-center mx-0">
                    <p class="dt-excursion-type position-static col-auto">
                        {{ tour.tour_type }}
                    </p>
                    <div v-if="tour.is_active || tour.is_moderation || tour.is_draft"
                        class="dropdown position-absolute d-lg-none d-block w-auto" style="top: 20px; right: 10px;">
                        <button type="button" class="dropdown-toggle" tour-bs-toggle="dropdown">
                            <div
                                class="col-auto menu-dots rounded d-flex px-0 gap-1 align-items-center justify-content-center">
                                <div class="menu-dot bg-blue rounded"></div>
                                <div class="menu-dot bg-blue rounded"></div>
                                <div class="menu-dot bg-blue rounded"></div>
                            </div>
                        </button>
                        <ul class="w-auto dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3
                                                    pt-0 text-center rounded font-size-09">
                            <li class="text-start" v-if="!tour.is_draft">
                                <a :href="'/tour/'+tour.id" target="_blank" class="dropdown-item mt-3 p-0">
                                    <span class="dt-btn-text">страница экскурсии</span>
                                </a>
                            </li>
                            <li v-if="tour.is_active" class="text-start">
                                <button @click="addToArchive"
                                        class="dropdown-item mt-3 p-0"><span
                                    class="px-0 font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">в архив</span>
                                </button>
                            </li>
                            <li class="text-start" v-if="tour.is_draft || tour.is_moderation">
                                <button class="dropdown-item mt-3 p-0"><span
                                    class="px-0 font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">удалить</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto order-last row me-auto">
                    <div class="col-auto">
                        <span class="excursion_number letter-spacing-3 text-uppercase bold">{{ tour.base_price }}</span>
                        <span class="font-size-08 text-uppercase"><i class="fa-solid fa-ruble-sign"></i></span>
                    </div>
                    <div class="col-auto">
                        <span class="excursion_number letter-spacing-3 text-uppercase bold">{{ tour.duration }}</span>
                        <span class="font-size-08 text-uppercase"><i class="fa-solid fa-clock-rotate-left"></i></span>
                    </div>
                </div>
                <div v-if="tour.is_moderation" class="col-12 col-sm-auto order-last mt-3 mt-sm-0 ms-sm-auto">
                    <span class="excursion__status green font-size-08">на проверке</span>
                </div>
                <div v-if="!tour.is_moderation" class="col-auto order-last row align-items-center mt-3 mt-sm-0">
                    <div class="col-auto">
                        <span class="excursion__rating font-size-07 opacity-40 me-1">рейтинг экскурсии</span>
                        <span class="excursion_number excursion_number__rating text-uppercase bold">
                            {{ tour.rating }}
                        </span>
                    </div>
                    <div class="col-auto align-items-center d-flex gap-1 dt-rating">
                        <div class="dt-rating__star d-flex">
                            <img v-lazy="tour.rating>=1?'/img/icons/star_blue.svg':'/img/icons/star_grey.svg'" alt="">
                            <img v-lazy="tour.rating>=2?'/img/icons/star_blue.svg':'/img/icons/star_grey.svg'" alt="">
                            <img v-lazy="tour.rating>=3?'/img/icons/star_blue.svg':'/img/icons/star_grey.svg'" alt="">
                            <img v-lazy="tour.rating>=4?'/img/icons/star_blue.svg':'/img/icons/star_grey.svg'" alt="">
                            <img v-lazy="tour.rating>=5?'/img/icons/star_blue.svg':'/img/icons/star_grey.svg'" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="tour.is_active" class="splitted">
                <div class="row align-items-center p-4 mx-0">
                    <a :href="'/tour/'+tour.id" target="_blank" class="dt-btn-text col-auto d-none d-lg-block">
                        Страница экскурсии
                    </a>
                    <button class="col-auto dt-btn-text">Редактировать</button>
                    <button
                        @click="addToArchive"
                        class="dt-btn-text-red fw-bold text-uppercase col-auto ms-3 px-0 d-none d-lg-block">
                        в архив
                    </button>
                    <div class="col-auto ms-auto sms lh-1 position-relative">
                        <a href="/messages"><i class="fa-regular fa-comment-dots"></i></a>
                    </div>
                </div>
            </div>
            <div v-if="!tour.is_active && !tour.is_moderation && !tour.is_draft" class="splitted">
                <div class="row align-items-center p-4 mx-0">
                    <button class="col-auto mx-auto px-0 position-relative dt-btn-text-red text-uppercase fw-bold">
                        убрать из архива
                    </button>
                </div>
            </div>
            <div v-if="tour.is_draft" class="splitted">
                <div class="row align-items-center justify-content-center justify-content-xxl-start p-4 mx-0">
                    <button class="col-auto dt-btn-text">Редактировать</button>
                    <button class="col-auto ms-auto dt-btn-text-red fw-bold text-uppercase px-0 d-none d-lg-block">
                        Удалить
                    </button>
                </div>
            </div>
            <div v-if="tour.is_moderation" class="splitted">
                <div class="row align-items-center p-4 mx-0 justify-content-center">
                    <button class="dt-btn-text col-auto d-none d-lg-block">
                        Страница экскурсии
                    </button>
                    <button class="col-auto dt-btn-text">Редактировать</button>
                    <button class="d-none d-lg-block dt-btn-text-red col-auto ms-auto px-0 fw-bold text-uppercase">
                        Удалить
                    </button>
                </div>
            </div>
        </div>
        <div class="excursion__image col-12 col-xl-4 px-0">
            <img class="cover w-100" style="height:250px;" v-lazy="tour.preview_image" alt=""/>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        tour: {
            type: Object,
            default: {
                function() {
                    return {}
                }
            }
        }
    },
    data() {
        return {}
    },
    methods:{
        addToArchive(){
            this.$store.dispatch("addTourToArchive", this.tour.id).then(()=>{
                this.eventBus.emit('load_guide_tours');

                this.$notify({
                    title: "Мои туры",
                    text: "Тур успешно добавлен в Архив",
                    type: 'success'
                });
            })
        }
    }
}
</script>
<style lang="scss">
.dt-rating__star {
    img {
        width: 20px;
        height: 20px;
    }
}
</style>
