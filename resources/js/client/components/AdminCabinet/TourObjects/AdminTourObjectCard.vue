<template>
    <div class="card tour-card">
        <div class="card-body p-0">
            <div class="tour-card__logo">
                <img v-if="tourObject.photos" class="cover w-100" :class="{'archived': tourObject.deleted_at}"
                     v-lazy="tourObject.photos[0]"
                     alt="travel"/>
            </div>
            <div class="tour-card__content">
                <h5 class="tour-card__name mb-2 bold">
                    <span v-if="tourObject.is_verified" class="badge bg-success" style="margin-right: 10px;"><i class="fa-solid fa-check text-white"></i> Проверено</span>
                    <span v-if="!tourObject.is_verified" class="badge bg-warning" style="margin-right: 10px;"><i class="fa-solid fa-triangle-exclamation text-white"></i> Не проверено</span>
                    <span v-if="tourObject.is_global_template" class="badge bg-info" style="margin-right: 10px;"><i class="fa-solid fa-flag-checkered text-white"></i> Шаблон</span>
                </h5>
                <h2 class="tour-card__name mb-2 bold">
                   {{ tourObject.title }}</h2>
                <p class="tour-card__description">
                    {{ tourObject.description }}
                </p>
            </div>
        </div>
        <div class="card-footer ">

            <div class="dropdown">
                <button class="btn btn-link btn-action w-100 dropdown-toggle"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-chevron-right" style="color:red; margin-right: 10px;"></i> Действия
                </button>
                <ul class="dropdown-menu w-100">
                    <li v-if="!tourObject.deleted_at">
                        <a class="dropdown-item"
                           :href="'/tour-object/'+tourObject.id"><i class="fa-solid fa-eye"></i> Просмотр объекта</a>
                    </li>
                    <li v-if="!tourObject.deleted_at">
                        <a class="dropdown-item"
                           @click="openEditTourObject"
                           href="#edit-tour-object"><i class="fa-solid fa-pen-to-square"></i> Редактировать</a>
                    </li>
                    <li>
                        <a class="dropdown-item"><i class="fa-solid fa-eye"></i> Сделать глобальным</a>
                    </li>
                    <li>
                        <a class="dropdown-item"><i class="fa-solid fa-eye"></i> Назначит тур. оператору \ гиду</a>
                    </li>
                    <li>
                        <a class="dropdown-item"><i class="fa-solid fa-eye"></i> Верифицировать объект</a>
                    </li>
                    <li>
                        <a class="dropdown-item"><i class="fa-solid fa-eye"></i> Убрать верификацию с объекта</a>
                    </li>
                    <li v-if="!tourObject.deleted_at">
                        <a class="dropdown-item"
                           style="color:red;"
                           data-bs-toggle="modal" :data-bs-target="'#removeTourObjectModalDialog'+tourObject.id"
                           href="#remove-tour-object">
                            <i
                                style="color:red;"
                                class="fa-solid fa-trash"></i> Удалить
                        </a>
                    </li>
                    <li v-if="tourObject.deleted_at">
                        <a class="dropdown-item"
                           @click="restoreRemovedTourObject"
                           href="#restore-tour-object"><i class="fa-solid fa-trash-can-arrow-up"></i> Восстановить</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <action-modal-dialog-component
        :id="'removeTourObjectModalDialog'+tourObject.id"
        v-on:accept="removeTourObject">
        <template v-slot:head>
            <p>Диалог удаления тура</p>
        </template>

        <template v-slot:body>
            <p>Вы действтельно хотите удалить тур "{{ tourObject.title || 'Нет заголовка' }}"?</p>
        </template>
    </action-modal-dialog-component>
</template>

<script>
export default {
    name: "TourObjectCard",
    props: {
        tourObject: {
            type: Object,
            default: {}
        }
    },
    methods: {
        openEditTourObject() {
            this.$emit('edit', this.tourObject)
           // this.eventBus.emit('open_edit_tour_object_window', this.tourObject)
        },
        restoreRemovedTourObject() {
            this.$store.dispatch("restoreRemovedGuideTourObjectsById", this.tourObject.id).then(() => {
                this.eventBus.emit("pagination_page", 0)
                this.$notify({
                    title: "Восстановление туристического объекта",
                    text: "Туристический объект успешно восстановлен",
                    type: 'success'
                });
            })
        },
        removeTourObject() {
            this.$store.dispatch("removedGuideTourObjectsById", this.tourObject.id).then(() => {
                this.eventBus.emit("pagination_page", 0)
                this.$notify({
                    title: "Удаление туристического объекта",
                    text: "Туристический объект успешно удален",
                    type: 'success'
                });
            })
        }
    }
}
</script>

<style scoped lang="scss">
.dt-tour-objects-list {
    & .tour-card {
        &__logo img {
            height: 200px;
        }
        &__content {
            & .tour-card__name {
                font-size: 16px;
            }
            & .tour-card__description {
                font-size: 12px;
                font-family: "Manrope Thin";
            }
        }
    }
}
@media (max-width: 991.98px) {
    .dt-tour-objects-list {
        & .tour-card {
            &__logo img {
                height: 160px;
            }
        }
    }
}

</style>

<style lang="scss">
.tour-card {
    background-color: white;
    overflow: hidden;

    img {
        height: 350px;
        object-fit: cover;
    }

    .tour-card__logo {

    }

    .tour-card__content {
        min-height: 270px;
    }

    .tour-card__name {
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        display: -webkit-box;
        overflow: hidden;

        padding: 10px;
        box-sizing: border-box;

    }

    .tour-card__description {
        overflow: hidden;
        padding: 10px;
        box-sizing: border-box;
        position: relative;
        text-overflow: ellipsis;
        height: 150px;

        &:after {
            content: '';
            width: 100%;
            height: 100px;
            background: linear-gradient(transparent, white);
            position: absolute;
            bottom: 0;
            left: 0;
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
}
</style>
