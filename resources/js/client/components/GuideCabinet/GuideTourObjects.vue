<template>
    <div class="dt-tour-objects-list col">
        <h2 class="mb-sm-2 bold mt-5 mt-lg-0">Мои объекты</h2>
        <div class="row mb-4">

            <div class="col-md-10 d-flex mb-4">
                <button @click="changeActiveTitle('Действующие объекты')"
                        :class="{'personal-account-nav__link_active' : activeType == 'Действующие объекты',
                            'bg-white' : activeType != 'Действующие объекты'}"
                        class="button col col-md-auto order-2 order-md-1 d-flex rounded mt-5 mt-md-0 px-4
                                    justify-content-center align-items-center semibold dt-btn__menu">
                    Действующие
                </button>
                <button @click="changeActiveTitle('Удаленные объекты')"
                        :class="{'personal-account-nav__link_active' : activeType == 'Удаленные объекты',
                            'bg-white' : activeType != 'Удаленные объекты'}"
                        class="button col col-md-auto order-3 order-md-2 d-flex rounded mt-5 mt-md-0 ms-2 px-4
                                justify-content-center align-items-center semibold dt-btn__menu">
                    Удаленные
                </button>
            </div>


            <div class="dropdown col-md-2 col-12">
                <button type="button"
                        class="w-100 dt-btn-add order-1 order-lg-2 button  bg-green d-flex rounded ms-auto px-4
                                    justify-content-center align-items-center bold"
                        data-bs-toggle="dropdown">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <ul
                    class="dropdown-menu p-2 w-100">
                    <li @click="openAddTourObject"><a class="dropdown-item"> Добавить объект </a> </li>
                    <li><a
                        data-bs-toggle="modal"
                        data-bs-target="#excelToursUpload"
                        class="dropdown-item"> Загрузить Excel </a> </li>
                    <li><a href="/load-template/tour-objects.xlsx" class="dropdown-item"> Скачать шаблон </a> </li>

                </ul>
            </div>

        </div>
        <guide-tour-object-list-component/>
        <guide-tour-object-paginate-component/>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="excelToursUpload"
         data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Загрузка туристических объектов через Excel-файл</h5>
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

export default {
    data() {
        return {
            activeType: "Действующие объекты",
        }
    },
    methods: {
        openAddTourObject(){
            this.eventBus.emit('open_add_tour_objects_window')
        },
        changeActiveTitle(title) {
            this.activeType = title
            this.eventBus.emit('select_guide_tour_object_type', this.activeType)
        },

    }
}
</script>

