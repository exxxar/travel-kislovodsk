<template>

    <div class="excursion-card card w-100" v-if="tour">
        <div class="row g-0">
            <div class="col-md-8 d-flex justify-content-between flex-column">
                <div class="card-body">
                    <h2 class="card-title">
                        {{ tour.title || 'Нет заголовка' }}
                    </h2>
                    <p class="card-text">
                        {{ tour.short_description || tour.description || 'Нет описания' }}
                    </p>
                    <p class="card-text"><small class="text-muted">
                        {{ moment(tour.created_at).format('YYYY-MM-DD H:m:s') }}</small></p>

                    <div class="row">
                        <div class="col-sm-3 col-6">
                            <p class="dt-excursion-type position-static col-auto">
                                {{ tour.tour_type }}
                            </p>
                        </div>
                        <div class="col-sm-4 col-6 d-flex justify-content-around align-items-center">
                            <p>
                                <span class="excursion_number letter-spacing-3 text-uppercase bold">{{
                                        tour.base_price
                                    }}</span>
                                <span class="font-size-08 text-uppercase"><i class="fa-solid fa-ruble-sign"></i></span>
                            </p>

                            <p>
                                <span class="excursion_number letter-spacing-3 text-uppercase bold">{{
                                        tour.duration
                                    }}</span>
                                <span class="font-size-08 text-uppercase"><i class="fa-solid fa-clock-rotate-left"></i></span>
                            </p>

                        </div>


                        <div
                            class="col-sm-5 mt-2 mt-sm-0 align-items-center col-12 dt-rating__star d-flex justify-content-around align-items-center">
                            <p class="w-100 d-flex justify-content-center align-items-center">
                                <span class="excursion__rating font-size-07 opacity-40 me-1">рейтинг экскурсии</span>
                                <span class="excursion_number excursion_number__rating text-uppercase bold">
                            {{ tour.rating }}
                        </span>
                            </p>

                            <div class="w-100 d-flex justify-content-center">
                                <rating-component :rating="tour.rating"/>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <div class="align-items-center row excursion__info position-relative">
                        <div class="dropdown">
                            <button class="btn btn-link btn-action w-100 dropdown-toggle"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-chevron-right" style="color:red; margin-right: 10px;"></i>
                                Действия
                            </button>
                            <ul class="dropdown-menu w-100">
                                <li v-if="!tour.is_draft">
                                    <a class="dropdown-item"><i class="fa-solid fa-eye"></i> Просмотреть тур</a>
                                </li>

                                <li v-if="tour.is_active">
                                    <a
                                        @click="openGuideTourGroup(tour)"
                                        class="dropdown-item"><i class="fa-solid fa-eye"></i> Бронь тура</a>
                                </li>
                                <li v-if="tour.verified_at==null&&tour.request_verify_at==null&&tour.is_draft">
                                    <a data-bs-toggle="modal" :data-bs-target="'#verifyRequestModalDialog'+tour.id"
                                       class="dropdown-item"><i class="fa-solid fa-eye"></i> Запросить верифкацию
                                        тура</a>
                                </li>
                                <li v-if="tour.is_active">
                                    <a data-bs-toggle="modal" :data-bs-target="'#archiveModalDialog'+tour.id"
                                       class="dropdown-item"><i class="fa-solid fa-eye"></i> Архивировать тур</a>
                                </li>

                                <li v-if="!tour.is_active&&!tour.is_draft">
                                    <a class="dropdown-item"
                                       data-bs-toggle="modal" :data-bs-target="'#archiveRestoreModalDialog'+tour.id"
                                       href="#restore-tour-object"><i class="fa-solid fa-trash-can-arrow-up"></i>
                                        Восстановить из архива</a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                       @click="openEditTour"
                                       href="#edit-tour-object"><i class="fa-solid fa-pen-to-square"></i> Редактировать</a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                       style="color:red;"
                                       data-bs-toggle="modal"
                                       :data-bs-target="'#removeTourModalDialog'+tour.id"
                                       href="#remove-tour-object">
                                        <i
                                            style="color:red;"
                                            class="fa-solid fa-trash"></i> Удалить
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 excursion-card__preview">
                <img class="img-fluid rounded-start d-sm-block d-none" style="height: 100%;" v-lazy="tour.preview_image"
                     alt=""/>
                <img class="img-fluid rounded-start d-sm-none d-block" style="max-height: 200px;"
                     v-lazy="tour.preview_image" alt=""/>
            </div>
        </div>
    </div>

    <action-modal-dialog-component
        :id="'archiveModalDialog'+tour.id"
        v-on:accept="addToArchive">
        <template v-slot:head>
            <p>Диалог архивирования тура</p>
        </template>

        <template v-slot:body>
            <p>Вы действтельно хотите отправить тур "{{ tour.title || 'Нет заголовка' }}" в архив?</p>
        </template>
    </action-modal-dialog-component>

    <action-modal-dialog-component
        :id="'removeTourModalDialog'+tour.id"
        v-on:accept="removeTour">
        <template v-slot:head>
            <p>Диалог удаления тура</p>
        </template>

        <template v-slot:body>
            <p>Вы действтельно хотите удалить тур "{{ tour.title || 'Нет заголовка' }}"?</p>
        </template>
    </action-modal-dialog-component>

    <action-modal-dialog-component
        :id="'archiveRestoreModalDialog'+tour.id"
        v-on:accept="removeTourFromArchive">
        <template v-slot:head>
            <p>Диалог восстановления тура</p>
        </template>

        <template v-slot:body>
            <p>Вы действтельно хотите восстановить тур "{{ tour.title || 'Нет заголовка' }}" из архива?</p>
        </template>
    </action-modal-dialog-component>

    <action-modal-dialog-component
        :id="'verifyRequestModalDialog'+tour.id"
        v-on:accept="requestVerify">
        <template v-slot:head>
            <p>Диалог запроса верификации тура</p>
        </template>

        <template v-slot:body>
            <p>Вы действтельно хотите запросить у администрации сайта проверку тура
                "{{ tour.title || 'Нет заголовка' }}"?</p>
        </template>
    </action-modal-dialog-component>
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
    computed: {
        moment() {
            return window.moment
        }
    },
    data() {
        return {}
    },
    methods: {
        requestVerify() {

            this.$store.dispatch("requestGuideTourVerified", this.tour.id).then(() => {
                this.eventBus.emit('load_guide_tours', 'Действующие');

                this.$notify({
                    title: "Мои туры",
                    text: "Тур успешно отправлен на верификацию",
                    type: 'success'
                });
            })
        },
        openEditTour() {
            this.eventBus.emit('open_edit_tour_window', this.tour)
        },
        openGuideTourGroup(tour) {
            this.eventBus.emit('open_gide_tour_group', tour);
        },
        removeTour() {
            this.$store.dispatch("removeTour", this.tour.id).then(() => {
                this.eventBus.emit('load_guide_tours', 'Действующие');

                this.$notify({
                    title: "Мои туры",
                    text: "Тур успешно удалён",
                    type: 'success'
                });
            })
        },
        removeTourFromArchive() {
            this.$store.dispatch("removeTourFromArchive", this.tour.id).then(() => {
                this.eventBus.emit('load_guide_tours', 'Архив');

                this.$notify({
                    title: "Мои туры",
                    text: "Тур успешно убран из Архива",
                    type: 'success'
                });
            })
        },
        addToArchive() {
            this.$store.dispatch("addTourToArchive", this.tour.id).then(() => {
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


.excursion-card {
    .dt-rating__star {
        img {
            width: 20px;
            height: 20px;
        }
    }

    .card-footer {
        background-color: white;

        .btn-action {
            color: #0071eb;
            font-weight: 600;
            text-decoration: none;
            font-size: 12px;
        }
    }

    .excursion-card__preview {
        img {
            object-fit: cover;
            width: 100%;
        }
    }
}
</style>
