<template>
    <add-tour-object v-if="activeTitle == 'Добавить объект'" @hideAddObject="activeTitle = 'Мои объекты'"/>
    <div v-if="activeTitle == 'Мои объекты'" class="dt-tour-objects-list col">
        <h2 class="lh-1 mb-5 bold mt-5 mt-lg-0">Мои объекты</h2>
        <div class="row mx-0 mb-5">
            <button @click="activeType = 'Действующие объекты'"
                    :class="{'personal-account-nav__link_active' : activeType == 'Действующие объекты',
                            'bg-white' : activeType != 'Действующие объекты'}"
                    class="button col col-md-auto order-2 order-md-1 d-flex rounded mt-5 mt-md-0 px-4
                                    justify-content-center align-items-center semibold dt-btn__menu">
                Действующие
            </button>
            <button @click="activeType = 'Удаленные объекты'"
                    :class="{'personal-account-nav__link_active' : activeType == 'Удаленные объекты',
                            'bg-white' : activeType != 'Удаленные объекты'}"
                    class="button col col-md-auto order-3 order-md-2 d-flex rounded mt-5 mt-md-0 ms-2 px-4
                                justify-content-center align-items-center semibold dt-btn__menu">
                Удаленные
            </button>
            <button @click="activeTitle='Добавить объект'"
                    class="button col-12 col-md-3 order-1 order-md-3 bg-green d-flex rounded ms-md-auto px-4 justify-content-center align-items-center bold">
                Добавить объект
            </button>
        </div>
        <div v-if="activeType == 'Действующие объекты'">
            <div class="row mx-0 row-cols-1 row-cols-xl-3 gap-3">
                <tour-object-card v-for="item in tours.filter(t => !t.deleted_at)" :data="item" :key="item"/>
            </div>
        </div>
        <div v-if="activeType == 'Удаленные объекты'">
            <div class="row mx-0 row-cols-1 row-cols-xl-3 gap-3">
                <tour-object-card v-for="item in tours.filter(t => t.deleted_at)" :data="item" :key="item"/>
            </div>
        </div>
        <tour-object-paginate/>
    </div>
</template>
<script>
import TourObjectCard from "@/components/TourObjects/TourObjectCard.vue";
import TourObjectPaginate from "@/components/TourObjects/TourObjectPaginate.vue";
import AddTourObject from "@/components/TourObjects/AddTourObject.vue";

export default {
    components: {AddTourObject, TourObjectPaginate, TourObjectCard},
    data() {
        return {
            activeType: "Действующие объекты", activeTitle: "Мои объекты",
            tours: [{
                title: 'Медовые водопады',
                description: 'Lorem ipsum dolor sit amet\n' +
                    '                    consectetur adipisicing elit. Iusto, eius omnis distinctio, est quisquam\n' +
                    '                    architecto ducimus quod labore veniam ullam sint cum eum incidunt libero\n' +
                    '                    sapiente, dolor ea! Similique, voluptatibus!',
                preview_image: '/img/travels/2.jpg'
            }, {
                title: 'Медовые водопады',
                description: 'Lorem ipsum dolor sit amet\n' +
                    '                    consectetur adipisicing elit. Iusto, eius omnis distinctio, est quisquam\n' +
                    '                    architecto ducimus quod labore veniam ullam sint cum eum incidunt libero\n' +
                    '                    sapiente, dolor ea! Similique, voluptatibus!',
                preview_image: '/img/travels/2.jpg'
            }, {
                title: 'Медовые водопады',
                description: 'Lorem ipsum dolor sit amet\n' +
                    '                    consectetur adipisicing elit. Iusto, eius omnis distinctio, est quisquam\n' +
                    '                    architecto ducimus quod labore veniam ullam sint cum eum incidunt libero\n' +
                    '                    sapiente, dolor ea! Similique, voluptatibus!',
                preview_image: '/img/travels/2.jpg'
            }, {
                title: 'Медовые водопады',
                description: 'Lorem ipsum dolor sit amet\n' +
                    '                    consectetur adipisicing elit. Iusto, eius omnis distinctio, est quisquam\n' +
                    '                    architecto ducimus quod labore veniam ullam sint cum eum incidunt libero\n' +
                    '                    sapiente, dolor ea! Similique, voluptatibus!',
                preview_image: '/img/travels/2.jpg'
            }, {
                title: 'Медовые водопады',
                description: 'Lorem ipsum dolor sit amet\n' +
                    '                    consectetur adipisicing elit. Iusto, eius omnis distinctio, est quisquam\n' +
                    '                    architecto ducimus quod labore veniam ullam sint cum eum incidunt libero\n' +
                    '                    sapiente, dolor ea! Similique, voluptatibus!',
                preview_image: '/img/travels/2.jpg'
            }, {
                title: 'Медовые водопады',
                description: 'Lorem ipsum dolor sit amet\n' +
                    '                    consectetur adipisicing elit. Iusto, eius omnis distinctio, est quisquam\n' +
                    '                    architecto ducimus quod labore veniam ullam sint cum eum incidunt libero\n' +
                    '                    sapiente, dolor ea! Similique, voluptatibus!',
                preview_image: '/img/travels/2.jpg'
            }, {
                title: 'Медовые водопады',
                description: 'Lorem ipsum dolor sit amet\n' +
                    '                    consectetur adipisicing elit. Iusto, eius omnis distinctio, est quisquam\n' +
                    '                    architecto ducimus quod labore veniam ullam sint cum eum incidunt libero\n' +
                    '                    sapiente, dolor ea! Similique, voluptatibus!',
                preview_image: '/img/travels/2.jpg', deleted_at: "12.11.2022"
            }, {
                title: 'Медовые водопады',
                description: 'Lorem ipsum dolor sit amet\n' +
                    '                    consectetur adipisicing elit. Iusto, eius omnis distinctio, est quisquam\n' +
                    '                    architecto ducimus quod labore veniam ullam sint cum eum incidunt libero\n' +
                    '                    sapiente, dolor ea! Similique, voluptatibus!',
                preview_image: '/img/travels/2.jpg', deleted_at: "12.11.2022"
            },]
        }
    }
}
</script>
