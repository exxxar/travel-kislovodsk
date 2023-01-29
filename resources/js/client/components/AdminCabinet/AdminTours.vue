<template>


    <div class="row m-0 mt-5">
        <div class="d-flex flex-nowrap justify-content-center col-12 mb-2" style="overflow: auto">
            <button @click="changeActiveTitle('Все')"
                    :class="{'personal-account-nav__link_active': activeType == 'Все',
                                'bg-white' : activeType != 'Все'}"
                    class="dt-btn__menu col-auto button d-flex rounded px-4 justify-content-center align-items-center semibold">
                Все
            </button>
            <button @click="changeActiveTitle('Действующие')"
                    :class="{'personal-account-nav__link_active': activeType == 'Действующие',
                                'bg-white' : activeType != 'Действующие'}"
                    class="dt-btn__menu col-auto button d-flex rounded ms-2  px-4 justify-content-center align-items-center semibold">
                Действующие
            </button>
            <button @click="changeActiveTitle('Архив')"
                    :class="{'personal-account-nav__link_active': activeType == 'Архив',
                                'bg-white' : activeType != 'Архив'}"
                    class="dt-btn__menu col-auto button d-flex rounded ms-2 px-4 justify-content-center align-items-center semibold">
                Архив
            </button>
            <button @click="changeActiveTitle('На модерации')"
                    :class="{'personal-account-nav__link_active': activeType == 'На модерации',
                                'bg-white' : activeType != 'На модерации'}"
                    class="dt-btn__menu col-auto button d-flex rounded ms-2 px-4 justify-content-center align-items-center semibold">
                На модерации
            </button>
            <button @click="changeActiveTitle('Черновики')"
                    :class="{'personal-account-nav__link_active': activeType == 'Черновики',
                                'bg-white' : activeType != 'Черновики'}"
                    class="dt-btn__menu col-auto button d-flex rounded ms-2 px-4 justify-content-center align-items-center semibold">
                Черновики
            </button>
        </div>

        <div class="col-12 d-flex justify-content-center mb-2">
            <div class="dropdown" style="width: 200px;">
                <button type="button"
                        class="w-100 order-1 order-lg-2 button  bg-green d-flex rounded
                                    justify-content-center align-items-center bold"
                        data-bs-toggle="dropdown">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <ul
                    class="dropdown-menu w-100">
                    <li data-bs-toggle="modal" data-bs-target="#adminAddTourModal"><a class="dropdown-item"> Добавить экскурсию </a></li>
                    <li><a class="dropdown-item"
                           data-bs-toggle="modal"
                           data-bs-target="#excelToursUpload"> Загрузить Excel </a></li>
                    <li><a href="/load-template/tours.xlsx" class="dropdown-item"> Скачать шаблон </a></li>

                </ul>
            </div>
        </div>

    </div>

    <div class="dt-excursions mb-5">
        <div class="container">

            <div class="row" v-if="tours.length>0">
                <div class="col-12 col-md-3 mb-2" v-for="item in tours">
                    <div class="dt-excursions__item">
                        <admin-tour-card-component :tour="item" :key="item"/>
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-center" v-else-if="!load&&tours.length===0">
                <div class="col col-12 col-md-6">
                    <div class="empty-list">
                        <img v-lazy="'/img/no-tour.jpg'" alt="">
                        <p>По данному фильтру ничего не найдено:(</p>
                    </div>
                </div>

            </div>


            <div v-if="load">
                <div class="row d-flex justify-content-center">
                    <div class="col col-12 col-md-6">
                        <div class="empty-list">
                            <img v-lazy="'/img/load.gif'" alt="">
                            <p>Грузим информацию....</p>
                        </div>
                    </div>
                </div>
            </div>

            <paginate-component v-if="pagination"
                                :pagination="pagination"/>
        </div>
    </div>


</template>
<script>
import {mapGetters} from "vuex";

export default {
    data() {
        return {
            load: false,
            activeType: null,
            tours: [],
            category: -1,
            pagination: null
        }
    },
    computed: {
        ...mapGetters(['getAdminTours',
            'getAdminToursPaginateObject']),
    },
    mounted() {
        this.loadTours()
        this.eventBus.on('load_admin_tours', (title) => {
            this.changeActiveTitle(title)
        })

        this.eventBus.on('pagination_page', (page) => {
            this.loadTours(page)
        })
    },
    methods: {
        changeActiveTitle(title) {
            switch (title) {
                default:
                case "Все":
                    //this.tours = this.getGuideTours;
                    this.category = -1
                    break;
                case "Действующие":
                    //this.tours = this.getGuideTours;
                    this.category = 0
                    break;
                case "Архив":
                    //this.tours = this.getGuideArchiveTours;
                    this.category = 1
                    break;
                case "На модерации":
                    //this.tours = this.getGuideIsModerateTours;
                    this.category = 2
                    break;
                case "Черновики":
                    //this.tours = this.getGuideIsDraftTours
                    this.category = 3
                    break;
            }
            this.activeType = title
            this.loadTours()
        },
        loadTours(page = 0) {
            this.load = true
            this.tours = []
            return this.$store.dispatch("loadAdminToursByPage", {
                page: page,
                category: this.category
            }).then(() => {
                this.tours = this.getAdminTours
                this.pagination = this.getAdminToursPaginateObject
                this.load = false
            })
        }
    }
}
</script>
<style lang="scss">
.empty-list {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;

    img {
        width: 100%;
        object-fit: cover;
        mix-blend-mode: darken;
    }

    p {
        width: 100%;
        text-align: center;
        margin-bottom: 10px;
    }
}
</style>
