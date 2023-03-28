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

                <button @click="changeActiveTitle('Туристы')"
                        :class="{'personal-account-nav__link_active' : activeType == 'Туристы',
                            'bg-white' : activeType != 'Туристы'}"
                        class="button col col-md-auto order-2 order-md-1 d-flex rounded mt-5 mt-md-0 ms-2 px-4
                                    justify-content-center align-items-center semibold dt-btn__menu">
                    Туристы & Пользователи
                </button>
                <button @click="changeActiveTitle('Гиды')"
                        :class="{'personal-account-nav__link_active' : activeType == 'Гиды',
                            'bg-white' : activeType != 'Гиды'}"
                        class="button col col-md-auto order-2 order-md-1 d-flex rounded mt-5 mt-md-0 ms-2 px-4
                                    justify-content-center align-items-center semibold dt-btn__menu">
                    Гиды & Тур.компании
                </button>
                <button @click="changeActiveTitle('Модерация')"
                        :class="{'personal-account-nav__link_active' : activeType == 'Модерация',
                            'bg-white' : activeType != 'Модерация'}"
                        class="button col col-md-auto order-2 order-md-1 d-flex rounded mt-5 mt-md-0 ms-2 px-4
                                    justify-content-center align-items-center semibold dt-btn__menu">
                    Запрос модерации от гидов
                </button>
                <button @click="changeActiveTitle('Администрация')"
                        :class="{'personal-account-nav__link_active' : activeType == 'Администрация',
                            'bg-white' : activeType != 'Администрация'}"
                        class="button col col-md-auto order-2 order-md-1 d-flex rounded mt-5 mt-md-0 ms-2 px-4
                                    justify-content-center align-items-center semibold dt-btn__menu">
                    Администрация
                </button>
                <button @click="changeActiveTitle('Удаленные')"
                        :class="{'personal-account-nav__link_active' : activeType == 'Удаленные',
                            'bg-white' : activeType != 'Удаленные'}"
                        class="button col col-md-auto order-3 order-md-2 d-flex rounded mt-5 mt-md-0 ms-2 px-4
                                justify-content-center align-items-center semibold dt-btn__menu">
                    Удаленные
                </button>
                <button @click="changeActiveTitle('Заблокированные')"
                        :class="{'personal-account-nav__link_active' : activeType == 'Заблокированные',
                            'bg-white' : activeType != 'Заблокированные'}"
                        class="button col col-md-auto order-3 order-md-2 d-flex rounded mt-5 mt-md-0 ms-2 px-4
                                justify-content-center align-items-center semibold dt-btn__menu">
                    Заблокированные
                </button>
            </div>

            <div class="col-12 d-flex justify-content-center">
                <div class="dropdown" style="min-width: 500px;">
                    <button type="button" class="w-100 dt-btn-add order-1 order-lg-2 button  bg-green d-flex rounded
                        ms-auto px-4 justify-content-center align-items-center bold" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-bars text-white"></i>
                    </button>
                    <ul class="dropdown-menu p-2 w-100">
                        <li @click="openAddUser"><a class="dropdown-item cursor-pointer"><i
                            class="fa-regular fa-square-plus"></i> Добавить пользователя </a></li>
                        <li><a data-bs-toggle="modal" data-bs-target="#excelToursUpload"
                               class="dropdown-item cursor-pointer"><i class="fa-solid fa-upload"></i> Загрузить Excel </a>
                        </li>
                        <li><a href="/load-template/tour-objects.xlsx" class="dropdown-item cursor-pointer"><i
                            class="fa-solid fa-file-export"></i> Скачать шаблон </a></li>
                        <li data-bs-toggle="modal" data-bs-target="#adminAddTourModal"><a class="dropdown-item"> Удалить
                            всех </a></li>

                        <li><a href="/load-template/tours.xlsx" class="dropdown-item"> Экспортировать всех пользователей </a>
                        </li>
                        <li><a href="/load-template/tours.xlsx" class="dropdown-item"> Скачать справочники </a></li>

                    </ul>
                </div>
            </div>

        </div>
    </div>

    <div class="container mb-5 mt-5">
        <div class="row">
            <div class="col-12">
                <div class="row" v-if="users.length>0&&!load">
                    <div class="col-md-6 mb-2" :key="item" v-for="item in users">
                        <admin-user-card-component
                            :item="item"
                        />

                    </div>
                </div>
                <div class="row  d-flex justify-content-center" v-else-if="!load&&users.length===0">

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
                <paginate-component v-if="pagination"
                                    :pagination="pagination"/>
            </div>
        </div>
    </div>


    <!-- Modal -->
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
</template>
<script>

import {mapGetters} from "vuex";

export default {
    data() {
        return {
            activeType: "Все",
            load: false,
            users: [],
            pagination: null
        }
    },
    computed: {
        ...mapGetters([ 'getAdminUsers',
          'getAdminUsersPaginateObject']),
    },
    mounted() {
        this.loadByPage()

        this.eventBus.on('pagination_page', (page) => {
            console.log("page", page)
            this.loadByPage(this.activeType, page)
        })

        /*  this.eventBus.on('select_guide_tour_object_type', (type) => {
              this.changeActiveTitle(type)
          })*/
    },
    methods: {
        openAddUser() {
            this.eventBus.emit('open_add_users_window')
        },
        changeActiveTitle(title) {
            this.activeType = title
            this.loadByPage(title)
        },
        loadByPage(title = "Все", page = 0){
            switch (title) {
                default:
                case "Все":
                    this.loadFilteredUsers({
                        need_all: true,
                    }, page)
                    break;
                case "Туристы":
                    this.loadFilteredUsers({
                        need_tourist: true,
                    }, page)
                    break;
                case "Гиды":
                    this.loadFilteredUsers({
                        need_guides: true,
                    }, page)
                    break;
                case "Модерация":
                    this.loadFilteredUsers({
                        need_moderate: true,
                    }, page)
                    break;
                case "Администрация":
                    this.loadFilteredUsers({
                        need_admins: true,
                    }, page)
                    break;
                case "Заблокированные":
                    this.loadFilteredUsers({
                        need_blocked: true,
                    }, page)
                    break;
                case "Удаленные":
                    this.loadFilteredUsers({
                        need_removed: true,
                    }, page)
                    break;
            }
        },

        loadFilteredUsers(filter, page){
            this.pagination = null
            this.load = true
            this.$store.dispatch("loadAdminUsersFilteredByPage", {
                filterObject: filter,
                page: page
            }).then(() => {
                this.users = this.getAdminUsers
                this.pagination = this.getAdminUsersPaginateObject
                this.load = false
            })
        },
        loadRemovedUsers(page) {
            this.loadFilteredUsers({
                need_removed: true
            }, page)
        },
        loadUsers(page) {
            this.loadFilteredUsers({
                need_active: true
            }, page)
        }

    }
}
</script>

