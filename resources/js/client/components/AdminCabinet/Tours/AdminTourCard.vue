<template>

    <div class="excursion-card card w-100" v-if="tour">
        <div class="row g-0">
            <div class="col-12 d-flex justify-content-between flex-column">
                <div class="card-body">

                    <h6> <span class="badge bg-success" v-if="tour.verified_at">Проверен</span>
                        <span class="badge bg-danger" v-if="!tour.verified_at">Не проверен</span>
                    </h6>
                    <h2 class="card-title">



                        {{ tour.title || 'Нет заголовка' }}
                    </h2>
                    <p class="card-text scroll-description">
                        {{ tour.short_description || tour.description || 'Нет описания' }}
                    </p>
                    <p class="card-text"><small class="text-muted">
                        {{ moment(tour.created_at).format('YYYY-MM-DD H:m:s') }}</small></p>

                    <div class="row">
                        <div class="col-12">
                            <p class="dt-excursion-type position-static col-auto">
                                {{ tour.tour_type }}
                            </p>
                        </div>
                        <div class="col-12 d-flex justify-content-around align-items-center mt-2">
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
                            class="mt-2 align-items-center col-12 d-flex justify-content-around align-items-center">
                            <p class="w-100 d-flex justify-content-center align-items-center">
                                <span class="excursion__rating font-size-07 opacity-40 me-1">рейтинг экскурсии</span>
                                <span class="excursion_number excursion_number__rating text-uppercase bold">
                            {{ tour.rating }}
                        </span>
                            </p>




                        </div>

                        <div class="w-100 d-flex mt-2 dt-rating__star justify-content-center col-12">
                            <rating-component :rating="tour.rating"/>
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
                                <li v-if="tour.verified_at==null&&tour.request_verify_at!=null&&tour.is_draft">
                                    <a class="dropdown-item disabled"
                                       href="#" tabindex="-1" aria-disabled="true"><i
                                        style="color:red;"
                                        class="fa-solid fa-triangle-exclamation"></i> Тур уже на верификации</a>
                                </li>

                                <li v-if="!tour.is_draft">
                                    <a class="dropdown-item"><i class="fa-solid fa-eye"></i> Просмотреть тур</a>
                                </li>

                                <li v-if="tour.is_active">
                                    <a
                                        @click="openGuideTourGroup(tour)"
                                        class="dropdown-item"><i class="fa-solid fa-bookmark"></i> Бронь тура</a>
                                </li>
                                <li v-if="tour.verified_at==null&&tour.request_verify_at==null&&tour.is_draft">
                                    <a data-bs-toggle="modal" :data-bs-target="'#verifyRequestModalDialog'+tour.id"
                                       class="dropdown-item"><i class="fa-solid fa-eye"></i> Запросить верифкацию
                                        тура</a>
                                </li>
                                <li v-if="tour.is_active">
                                    <a data-bs-toggle="modal" :data-bs-target="'#archiveModalDialog'+tour.id"
                                       class="dropdown-item"><i class="fa-solid fa-box-archive"></i> Архивировать тур</a>
                                </li>

                                <li v-if="!tour.is_active&&!tour.is_draft">
                                    <a class="dropdown-item"
                                       data-bs-toggle="modal" :data-bs-target="'#archiveRestoreModalDialog'+tour.id"
                                       href="#restore-tour-object"><i class="fa-solid fa-trash-can-arrow-up"></i>
                                        Восстановить из архива</a>
                                </li>
                                <li>
                                    <a class="dropdown-item"><i class="fa-solid fa-pen-to-square"></i> Дублировать</a>
                                </li>
                                <li v-if="!tour.verified_at">
                                    <a class="dropdown-item"
                                       data-bs-toggle="modal"
                                       :data-bs-target="'#approveTourModalDialog'+tour.id"
                                    ><i class="fa-solid fa-pen-to-square"></i> Подтвердить тур</a>
                                </li>
                                <li v-if="tour.verified_at">
                                    <a class="dropdown-item"
                                       data-bs-toggle="modal"
                                       :data-bs-target="'#declineTourModalDialog'+tour.id"
                                    ><i class="fa-solid fa-pen-to-square"></i> Отклонить тур</a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                       @click="openEditTour"
                                       href="#edit-tour-object"><i class="fa-solid fa-pen-to-square"></i> Редактировать</a>
                                </li>
                                <li v-if="!tour.deleted_at">
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
                                <li v-if="tour.deleted_at">
                                    <a class="dropdown-item"
                                       style="color:red;"
                                       data-bs-toggle="modal"
                                       :data-bs-target="'#restoreTourModalDialog'+tour.id"
                                       href="#restore-tour-object">
                                        <i
                                            style="color:red;"
                                            class="fa-solid fa-trash"></i> Восстановить тур
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 excursion-card__preview">

                <img class="img-fluid rounded-start" style="max-height: 200px;"
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
        :id="'approveTourModalDialog'+tour.id"
        v-on:accept="approveTour">
        <template v-slot:head>
            <p>Диалог подтверждения тура</p>
        </template>

        <template v-slot:body>
            <p>Вы действтельно хотите подтвердить тур "{{ tour.title || 'Нет заголовка' }}"?</p>
        </template>
    </action-modal-dialog-component>

    <action-modal-dialog-component
        :id="'declineTourModalDialog'+tour.id"
        v-on:accept="declineTour">
        <template v-slot:head>
            <p>Диалог деактивации тура</p>
        </template>

        <template v-slot:body>
            <p>Вы действтельно хотите деактивировать тур "{{ tour.title || 'Нет заголовка' }}"?</p>
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
        :id="'restoreTourModalDialog'+tour.id"
        v-on:accept="restoreTour">
        <template v-slot:head>
            <p>Диалог восстановления тура</p>
        </template>

        <template v-slot:body>
            <p>Вы действтельно хотите восстановить тур "{{ tour.title || 'Нет заголовка' }}"?</p>
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
        declineTour(){
            this.$store.dispatch("declineTourByAdmin", this.tour.id).then(() => {
                this.eventBus.emit('load_admin_tours', 'Все');

                this.$notify({
                    title: "Мои туры",
                    text: "Тур успешно деактивирован",
                    type: 'success'
                });
            })
        },
        approveTour() {
            this.$store.dispatch("approveTourByAdmin", this.tour.id).then(() => {
                this.eventBus.emit('load_admin_tours', 'Все');

                this.$notify({
                    title: "Мои туры",
                    text: "Тур успешно подвтержден",
                    type: 'success'
                });
            })
        },
        openEditTour() {
            this.$emit('edit', this.tour.id)
        },
        openGuideTourGroup(tour) {
            this.eventBus.emit('open_gide_tour_group', tour);
        },
        restoreTour(){
            this.$store.dispatch("restoreAdminTour", this.tour.id).then(() => {
                this.eventBus.emit('load_admin_tours', 'Все');

                this.$notify({
                    title: "Мои туры",
                    text: "Тур успешно восстановлен",
                    type: 'success'
                });
            })
        },
        removeTour() {
            this.$store.dispatch("removeAdminTour", this.tour.id).then(() => {
                this.eventBus.emit('load_admin_tours', 'Удаленные');

                this.$notify({
                    title: "Мои туры",
                    text: "Тур успешно удалён",
                    type: 'success'
                });
            })
        },
        removeTourFromArchive() {
            this.$store.dispatch("removeTourFromArchive", this.tour.id).then(() => {
                this.eventBus.emit('load_admin_tours', 'Архив');

                this.$notify({
                    title: "Мои туры",
                    text: "Тур успешно убран из Архива",
                    type: 'success'
                });
            })
        },
        addToArchive() {
            this.$store.dispatch("addTourToArchive", this.tour.id).then(() => {
                this.eventBus.emit('load_admin_tours','Архив');

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
    border: 1px #efefef solid;

    .card-title {
        height: 150px;
        overflow-y: auto;
    }

    .dt-rating__star {
        img {
            width: 20px;
            height: 20px;
        }
    }

    .card-footer {
        background-color: white;
        border-top: 1px #efefef solid !important;
        .btn-action {
            color: #0071eb;
            font-weight: 600;
            text-decoration: none;
            font-size: 12px;
        }
    }

    .card-text.scroll-description {
        height: 200px;
        overflow-y: auto;
    }

    .excursion-card__preview {
        img {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }
    }
}
</style>
