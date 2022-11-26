<template>
    <div id="my-excurions" class="col">
        <h2 class="lh-1 mb-5 bold mt-5 mt-lg-0">Мои экскурсии</h2>
        <div class="row mx-0 mb-5">
            <div class="order-2 order-lg-1 row flex-nowrap col-12 col-lg-auto overflow-x-auto px-0 mx-0
                                mt-5 mt-lg-0">
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
            <button
                    class="dt-btn-add order-1 order-lg-2 button col-12 col-lg-3 bg-green d-flex rounded ms-auto px-4
                                    justify-content-center align-items-center bold">
                Добавить экскурсию
            </button>
        </div>

        <div class="dt-excursions">
            <guide-tour-list-component/>
        </div>

    </div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    data(){
        return {
            activeType: null,
        }
    },
    methods:{
        changeActiveTitle(title) {
            this.activeType = title
            this.eventBus.emit('select_guide_tours_type', this.activeType)
        },

    }
}
</script>
