<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center mb-4">
                <button @click="changeActiveTitle('Все')"
                        :class="{'personal-account-nav__link_active' : activeType == 'Все',
                            'bg-white' : activeType != 'Все'}"
                        class="button col col-md-auto order-2 order-md-1 d-flex rounded mt-5 mt-md-0 ms-2 px-4
                                    justify-content-center align-items-center semibold dt-btn__menu">
                    Все
                </button>
                <button @click="changeActiveTitle('Действующие объекты')"
                        :class="{'personal-account-nav__link_active' : activeType == 'Действующие объекты',
                            'bg-white' : activeType != 'Действующие объекты'}"
                        class="button col col-md-auto order-2 order-md-1 d-flex rounded mt-5 mt-md-0 ms-2 px-4
                                    justify-content-center align-items-center semibold dt-btn__menu">
                    Действующие
                </button>
                <button @click="changeActiveTitle('Шаблоны')"
                        :class="{'personal-account-nav__link_active' : activeType == 'Шаблоны',
                            'bg-white' : activeType != 'Шаблоны'}"
                        class="button col col-md-auto order-2 order-md-1 d-flex rounded mt-5 mt-md-0 ms-2 px-4
                                    justify-content-center align-items-center semibold dt-btn__menu">
                    Шаблоны
                </button>
                <button @click="changeActiveTitle('Запрос модерации')"
                        :class="{'personal-account-nav__link_active' : activeType == 'Запрос модерации',
                            'bg-white' : activeType != 'Запрос модерации'}"
                        class="button col col-md-auto order-2 order-md-1 d-flex rounded mt-5 mt-md-0 ms-2 px-4
                                    justify-content-center align-items-center semibold dt-btn__menu">
                    Запрос модерации
                </button>
                <button @click="changeActiveTitle('Удаленные объекты')"
                        :class="{'personal-account-nav__link_active' : activeType == 'Удаленные объекты',
                            'bg-white' : activeType != 'Удаленные объекты'}"
                        class="button col col-md-auto order-3 order-md-2 d-flex rounded mt-5 mt-md-0 ms-2 px-4
                                justify-content-center align-items-center semibold dt-btn__menu">
                    Удаленные
                </button>
            </div>

            <div class="col-12 d-flex justify-content-center mb-5">
                <div class="dropdown" style="min-width: 500px;">
                    <button type="button" class="w-100 dt-btn-add order-1 order-lg-2 button  bg-green d-flex rounded
                        ms-auto px-4 justify-content-center align-items-center bold" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-bars text-white"></i>
                    </button>
                    <ul class="dropdown-menu p-2 w-100">
                        <li data-bs-toggle="modal" data-bs-target="#adminAddTourObjectModal"><a class="dropdown-item cursor-pointer"><i
                            class="fa-regular fa-square-plus"></i> Добавить объект </a></li>
                        <li><a data-bs-toggle="modal" data-bs-target="#excelToursUpload"
                               class="dropdown-item cursor-pointer"><i class="fa-solid fa-upload"></i> Загрузить Excel </a>
                        </li>
                        <li><a href="/load-template/tour-objects.xlsx" class="dropdown-item cursor-pointer"><i
                            class="fa-solid fa-file-export"></i> Скачать шаблон </a></li>
                        <li data-bs-toggle="modal" data-bs-target="#adminAddTourModal"><a class="dropdown-item"> Удалить
                            все туристические объекты </a></li>
                        <li data-bs-toggle="modal" data-bs-target="#adminAddTourModal"><a class="dropdown-item">
                            Сгенерировать демонстрационные туристические объекты </a></li>
                        <li><a href="/load-template/tours.xlsx" class="dropdown-item"> Экспортировать все туристические объекты </a>
                        </li>
                        <li><a href="/load-template/tours.xlsx" class="dropdown-item"> Скачать справочники </a></li>

                    </ul>
                </div>
            </div>

        </div>
    </div>

    <div class="container mb-5">
        <div class="row">
            <div class="col-12">
                <div class="row" v-if="tour_objects.length>0&&!load">
                    <div class="col-12 col-md-6 col-xl-3 col-lg-6 mb-2" :key="item" v-for="item in tour_objects">
                        <admin-tour-object-card-component
                            :tour-object="item"
                            :key="item"
                            v-on:edit="openTourObjectEditorWindow"
                        />
                    </div>
                </div>
                <div class="row  d-flex justify-content-center" v-else-if="!load&&tour_objects.length===0">

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


            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row">
            <div class="col-12">
                <paginate-component
                    v-if="pagination" :pagination="pagination"/>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="adminAddTourObjectModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Добавление объекта для тура</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <admin-add-tour-object-component/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="excelToursUpload"
         data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Загрузка туристических объектов через
                        Excel-файл</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <excel-uploader-component :type="2"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="adminEditTourObjectModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Редактирование объекта для тура</h1>
                    <button type="button" class="btn-close"
                            @click="selectedTourObjectId = null"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <admin-edit-tour-object v-if="selectedTourObjectId!=null" :tour-object-id="selectedTourObjectId"/>
                </div>
                <div class="modal-footer">
                    <button type="button" @click="selectedTourObjectId = null"
                            class="btn btn-secondary" data-bs-dismiss="modal">Закрыть
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

import {mapGetters} from "vuex";
import AdminEditTourObject from '@/components/AdminCabinet/TourObjects/AdminEditTourObject.vue';

export default {
    components: {AdminEditTourObject},
    data() {
        return {
            activeType: "Все",
            load: false,
            tour_objects: [],
            pagination: null,
            selectedTourObjectId: null,
        }
    },
    computed: {
        ...mapGetters([ 'getAdminTourObjects',
          'getAdminTourObjectsPaginateObject']),
    },
    mounted() {
        this.loadAllTourObjects()

        this.eventBus.on('pagination_page', (page) => {
            this.loadByPage( this.activeType, page)
        })

        /*  this.eventBus.on('select_guide_tour_object_type', (type) => {
              this.changeActiveTitle(type)
          })*/
    },
    methods: {
        openTourObjectEditorWindow(tourObjectId) {
            this.selectedTourObjectId = tourObjectId.id

            let myModal = new bootstrap.Modal(document.getElementById('adminEditTourObjectModal'))
            myModal.show()
        },
        changeActiveTitle(title) {
            this.activeType = title
            this.loadByPage(title)
        },
        loadByPage(title, page = 0){
            switch (title) {
                default:
                case "Все":
                    this.loadAllTourObjects(page)
                    break;
                case "Шаблоны":
                    this.loadTemplateTourObjects(page)
                    break;
                case "Запрос модерации":
                    this.loadNeedModerateTourObject(page)
                    break;
                case "Действующие объекты":
                    this.loadTourObjects(page)
                    break;
                case "Удаленные объекты":
                    this.loadRemovedTourObjects(page)
                    break;
            }
        },
        loadNeedModerateTourObject(page){
            this.loadFilteredTourObjects({
                need_not_verified: true,
            }, page)
        },
        loadTemplateTourObjects(page){
            this.loadFilteredTourObjects({
                need_template: true
            }, page)
        },
        loadAllTourObjects(page){
            this.loadFilteredTourObjects({
                need_all: true
            }, page)
        },
        loadFilteredTourObjects(filter, page){
            this.pagination = null
            this.load = true
            this.$store.dispatch("loadAdminTourObjectsFilteredByPage", {
                filterObject: filter,
                page: page
            }).then(() => {
                this.tour_objects = this.getAdminTourObjects
                this.pagination = this.getAdminTourObjectsPaginateObject
                this.load = false
            })
        },
        loadRemovedTourObjects(page) {
            this.loadFilteredTourObjects({
                need_removed: true
            }, page)
        },
        loadTourObjects(page) {
            this.loadFilteredTourObjects({
                need_active: true
            }, page)
        }

    }
}
</script>

