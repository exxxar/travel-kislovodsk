<template>
    <div class="card tour-card">
        <div class="card-body p-0">
            <a :href="'/tour-object/'+tourObject.id" class="tour-card__logo">
                <img class="cover w-100" :class="{'archived': tourObject.deleted_at}"
                     v-lazy="tourObject.photos[0]"
                     alt="travel"/>
            </a>
            <div class="tour-card__content-2">
                <h2 class="tour-card__name mb-2 bold"><a :href="'/tour-object/'+tourObject.id">{{ tourObject.title }}</a></h2>
                <p class="tour-card__description">
                    {{ tourObject.description }}
                </p>

                <a href="#show-weather"
                   data-bs-toggle="modal"
                   v-if="tourObject.pogoda_klimat_id"
                   class="btn btn-link w-100 text-center p-3"
                   :data-bs-target="'#show-weather-tour-object-'+tourObject.id"
                >Посмотреть погоду</a>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-center align-items-center">

            <a :href="'/tour-object/'+tourObject.id"
               class="text-uppercase dt-travel-card__action p-3">
                <h6 class="dt-btn-text">Подробнее</h6>
            </a>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" :id="'show-weather-tour-object-'+tourObject.id" tabindex="-1" aria-labelledby="show-weather" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="show-weather">Прогноз погоды в {{tourObject.city }} на 14 дней </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <weather-component
                        v-if="tourObject.pogoda_klimat_id"
                        :region-id="tourObject.pogoda_klimat_id"/>
                </div>
            </div>
        </div>
    </div>
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

    .tour-card__content-2 {
        min-height: 200px;
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
