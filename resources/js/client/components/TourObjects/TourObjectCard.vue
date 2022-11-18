<template>
    <div class="object object__info row col bg-white rounded mx-0 px-0">
        <div class="col-12 px-0">
            <img class="cover w-100 rounded-top" :class="{'archived': data.deleted_at}"
                 :src="data.preview_image"
                 alt="travel"/>
        </div>
        <div class="col-12 px-0">
            <div class="object__body">
                <h2 class="object__name mb-2 bold">{{ data.title }}</h2>
                <p class="short-descrtiption opacity-80 lh-lg">
                    {{data.description}}
                </p>
            </div>
            <div v-if="!data.deleted_at" class="object__body splitted">
                <div class="align-items-baseline mx-0 d-flex justify-content-between position-relative">
                    <button class="dt-btn-text">редактировать</button>
                    <button class="dt-btn-text-red fw-bold text-uppercase d-lg-block d-none">
                        удалить
                    </button>
                    <div class="dropdown position-absolute d-lg-none d-block" style="top: -10px; right: 0;">
                        <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <div
                                class="col-auto menu-dots rounded d-flex px-0 gap-1 align-items-center justify-content-center">
                                <div class="menu-dot bg-blue rounded"></div>
                                <div class="menu-dot bg-blue rounded"></div>
                                <div class="menu-dot bg-blue rounded"></div>
                            </div>
                        </button>
                        <ul class="w-auto dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3
                                                    pt-0 text-center rounded font-size-09">
                            <li>
                                <button class="dropdown-item mt-3 p-0"><span
                                    class="px-0 font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">удалить</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div v-else class="object__body splitted">
                <div class="align-items-baseline mx-0 d-flex justify-content-center position-relative">
                    <button class="letter-spacing-3 text-uppercase bold position-relative black-underline">
                        восстановить
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "TourObjectCard",
    props: {
        data: {
            type: Object,
            default: {}
        }
    },
}
</script>

<style scoped>

</style>
