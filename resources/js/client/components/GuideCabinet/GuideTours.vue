<template>
    <div id="my-excurions" class="col">
        <h2 class="mb-2 bold mt-5 mt-lg-0">Мои экскурсии</h2>
        <div class="row">
            <div class="d-flex flex-nowrap col-md-10 col-12 mb-2 pb-3" style="overflow: auto">
                <button @click="changeActiveTitle('Действующие')"
                        :class="{'personal-account-nav__link_active': activeType == 'Действующие',
                                'bg-white' : activeType != 'Действующие'}"
                        class="dt-btn__menu col-auto button d-flex rounded px-4 justify-content-center align-items-center semibold">
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

            <div class="dropdown col-md-2 col-12 mb-2">
                <button type="button" class="w-100 dt-btn-add order-1 order-lg-2 button  bg-green d-flex rounded
                                    justify-content-center align-items-center bold"
                        data-bs-toggle="dropdown">
                    <i class="fa-solid fa-bars text-white"></i>
                </button>
                <ul class="dropdown-menu">
                    <li @click="openAddTour"><a class="dropdown-item"> Добавить экскурсию </a> </li>
                    <li><a class="dropdown-item"
                           data-bs-toggle="modal"
                           data-bs-target="#excelToursUpload"> Загрузить Excel </a> </li>
                    <li><a href="/load-template/tours.xlsx" class="dropdown-item"> Скачать шаблон </a> </li>

                </ul>
            </div>
        </div>

        <div class="dt-excursions">
            <guide-tour-list-component/>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="excelToursUpload"
         data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Загрузка туров через Excel-файл</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <excel-uploader-component :type="1"/>
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
;
export default {
    components: {},


    data(){
        return {
            activeType: "Действующие",
        }
    },
    methods:{
        openAddTour(){
            this.eventBus.emit('open_add_tours_window')
        },

        changeActiveTitle(title) {
            this.activeType = title

            const dropdownElementList = document.querySelectorAll('.dropdown-toggle')
            const dropdownList = [...dropdownElementList].map(dropdownToggleEl => new bootstrap.Dropdown(dropdownToggleEl))

            dropdownList.forEach(item=>{
                item.hide()
            })

            this.eventBus.emit('select_guide_tours_type', this.activeType)
        },

    }
}
</script>
