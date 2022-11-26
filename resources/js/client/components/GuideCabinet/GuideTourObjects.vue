<template>
    <div class="dt-tour-objects-list col">
        <h2 class="lh-1 mb-5 bold mt-5 mt-lg-0">Мои объекты</h2>
        <div class="row mx-0 mb-5">
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
            <button
                class="button col-12 col-md-3 order-1 order-md-3 bg-green d-flex rounded ms-md-auto px-4 justify-content-center align-items-center bold">
                Добавить объект
            </button>
        </div>

        <guide-tour-object-list-component/>
        <guide-tour-object-paginate-component/>
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
        changeActiveTitle(title) {
            this.activeType = title
            this.eventBus.emit('select_guide_tour_object_type', this.activeType)
        },

    }
}
</script>

