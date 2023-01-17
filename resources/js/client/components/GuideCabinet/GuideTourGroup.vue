<template>

    <div id="current-excurion" class="current-excursion col ">
        <div class="row mx-0 align-items-center mb-5 mt-5 mt-lg-0">
            <button
                @click="$emit('hideTourGroup')"
                class="btn btn-primary col-auto px-2rem active rounded shadow-none bold"><span
                class="fs-6 me-1">&lt;</span>Назад к экскурсиям
            </button>
            <div class="col-auto row mx-0 px-0 hide visible-xl ms-auto">
                <button
                    class="col-auto excursion__menu font-size-07 blue-hover letter-spacing-3 text-uppercase bold ms-auto">
                    страница
                    экскурсии <span class="blue fs-6">&gt;</span>
                </button>
                <button
                    class="col-auto excursion__menu font-size-07 blue-hover letter-spacing-3 text-uppercase bold ms-2">
                    редактировать<span
                    class="blue fs-6">&gt;</span>
                </button>
                <button
                    class="col-auto ms-3 ms-xl-5 px-0 excursion__menu font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">
                    в&nbsp;архив
                </button>
            </div>
            <div class="dropdown col-auto hide-xl position-relative mx-0 ms-auto px-0 bg-white rounded">
                <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown">
                    <div
                        class="col-auto menu-dots rounded d-flex px-0 gap-1 align-items-center justify-content-center">
                        <div class="menu-dot bg-blue rounded"></div>
                        <div class="menu-dot bg-blue rounded"></div>
                        <div class="menu-dot bg-blue rounded"></div>
                    </div>
                </button>
                <ul
                    class="dropdown-menu col-12 flex-grow-1 border-0 px-2rem pb-3 pt-0 text-center rounded font-size-09">
                    <li>
                        <button
                            class="dropdonw-item p-0 col-12 mt-3 font-size-07 blue-hover letter-spacing-3 text-uppercase bold">
                            редактировать<span
                            class="blue fs-6">&gt;</span>

                        </button>
                    </li>
                    <li>
                        <button class="dropdown-item mt-3 p-0"><span
                            class="px-0 font-size-07 letter-spacing-3 text-uppercase bold position-relative red red-underline">удалить</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="excursion row mx-0 mb-5">
            <div class="col px-0 me-5">
                <div class="col-auto">
                    <h1 class="excursion__name mb-4 bold">{{ tour.title || 'Нет заголовка' }}</h1>
                    <p class="excursion__description opacity-80 mb-4 lh-lg">
                        {{ tour.short_description || 'Нет короткого описания' }}
                    </p>
                    <div class="excursion__info row align-items-center">
                        <div class="col-auto me-auto">
                                    <span class="excursion__type font-size-07 bg-blue rounded-1 px-1">
                                        {{ tour.tour_type || 'Тип тура не задан' }}
                                    </span>
                        </div>
                        <div class="col-auto me-auto">
                            <span class="excursion_number letter-spacing-3 text-uppercase bold">
                                 {{ tour.base_price || 'Не указана' }}
                            </span>
                            <span class="font-size-05 text-uppercase">руб.</span>
                        </div>
                        <div class="col-auto me-auto">
                            <span
                                class="excursion_number letter-spacing-3 text-uppercase bold">{{
                                    tour.duration.split(' ')[0]
                                }}</span>
                            <span class="font-size-05 text-uppercase">{{ tour.duration.split(' ')[1] }}</span>
                        </div>
                        <div class="col-12 col-lg-auto row mt-3 mt-xxl-0 align-items-center">
                            <div class="col-auto">
                                        <span class="excursion__rating font-size-07 opacity-40 me-1">рейтинг
                                            экскурсии</span>
                                <span
                                    class="excursion_number letter-spacing-3 text-uppercase bold">{{
                                        tour.rating
                                    }}</span>
                            </div>
                            <div class="col-auto me-auto align-items-center rating">
                                <rating-component :rating="tour.rating"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="current-excursion__image col-12 col-lg-4 px-0 mt-4 mt-lg-0">
                <img class="rounded cover w-100 h-100 rounded-end" v-lazy="tour.preview_image" alt=""/>
            </div>
        </div>
        <div class="accordion row mx-0 mb-6 gap-2" v-if="groupedByDate.length>0">
            <div
                v-for="(date, index) in groupedByDate"

                class="accordion__item visible bg-white rounded bg-white rounded">
                <div

                    class="accordion__head p-4 row align-items-center justify-content-between">
                    <div class="col-1 pb-4 pb-xl-0">
                        <div class="big-icon bg-light rounded d-flex justify-content-center align-items-center">
                            <i class="fa-regular fa-calendar-days"></i>
                        </div>
                    </div>
                    <span class="col-5 px-0 py-2 py-xl-0">{{ date.date }}</span>
                    <div
                        class="row mx-0 col-12 col-xl-5 accordion__head-splitted splitted splitted-xl-none px-0 pt-4 pt-xl-0 order-last order-xl-3 justify-content-between">

                        <ul class="group-list-controls d-flex justify-content-between align-items-center">
                            <li><a @click="startGroupChat(date)">Групповой чат<i class="fa-solid fa-comments"></i></a>
                            </li>
                            <li><a @click="downloadGroupDocument(date.items[0])"
                                   target="_blank">Эксель <i class="fa-solid fa-file-csv"></i></a></li>
                            <li>{{ date.items.length }}
                                участников
                            </li>
                        </ul>
                    </div>
                    <div
                        @click="toggleAccordion(date.date)"
                        class="expand-img col-auto py-2 py-xl-0 order-2 order-xl-last d-flex justify-content-end">
                        <span v-if="selectedDate === date.date">
                                <i class="fa-solid fa-angle-down"></i>
                        </span>
                        <span v-else>
                            <i class="fa-solid fa-chevron-up"></i>
                        </span>
                    </div>
                </div>

                <div class="accordion__content" v-if="selectedDate === date.date">
                    <div
                        v-for="person in date.items"
                        class="accordion__content-item row splitted px-4 py-3 align-items-center justify-content-between">
                        <div class="col-auto col-xl-1 order-first">
                            <div class="big-icon rounded d-flex align-items-center justify-content-center">
                                <img class="rounded big-icon" v-lazy="person.avatar" alt="">
                            </div>
                        </div>
                        <span
                            class="col-5 col-xl-3 order-2 semibold ps-0">{{ person.tname }} {{
                                person.sname
                            }} {{ person.fname }}</span>
                        <div class="col-6 col-xl-4 order-4 order-xl-3 row mx-0 px-0 mt-3 mt-xl-0">
                            <span class="col-12 col-xl-6 blue semibold">{{ $filters.phoneFilter(person.phone) }}</span>
                            <span class="col-12 col-xl-6 thin opacity-80">{{ person.email }}</span>
                        </div>
                        <div
                            @click="startChatWithUser(person.user_id)"
                            class="col-auto col-xl-1 order-3 order-xl-4 d-flex justify-content-end ms-auto position-relative">


                            <i v-bind:class="{'text-main-color': person.has_private_chat_with_guide}"
                               class="fa-regular fa-message "></i>
                        </div>
                        <div
                            v-if="person.transaction"
                            data-bs-toggle="modal" :data-bs-target="'#transaction-modal-'+person.user_id"
                            class="col-auto col-xl-1 order-last d-flex justify-content-end ms-auto ms-xl-2 mt-3 mt-xl-0">
                            <i class="text-main-color fa-solid fa-file-invoice-dollar"></i>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" :id="'transaction-modal-'+person.user_id" tabindex="-1"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Информация о транзакции</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <transaction-card :key="person.user_id" :item="person.transaction"/>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


            <button
                v-if="canLoadMore"
                @click="loadMore"
                class="btn btn-outline-primary col-12 px-4 active rounded shadow-none">
                <span class="bold">Показать ещё</span>
                <i class="fa-solid fa-chevron-down"></i>
            </button>
        </div>

        <review-list-component  :object="tour" :object-type="'tour'"/>
    </div>
</template>
<script>
import {mapGetters} from "vuex";
import {saveAs} from 'file-saver';
import TransactionCard from "@/components/Transactions/TransactionCard.vue";
export default {
    props: ["tour"],
    components:{
        TransactionCard
    },
    data() {
        return {
            selectedDate: null,
            page: 0,
            canLoadMore: false,
            bookeds: []
        }
    },

    computed: {
        ...mapGetters(['getGuideBookedTours', 'canGuideBookedToursLoadMore']),
        groupedByDate() {
            let arr = [];

            if (this.bookeds.length === 0)
                return [];

            this.bookeds.forEach(item => {

                let arrItem = arr.find(sub => sub.date === item.schedule.start_at /*&& sub.schedule_id === item.schedule_id*/)

                if (!arrItem) {


                    arr.push({
                        date: item.schedule.start_at,
                        schedule_id: item.schedule_id,
                        tour_id: item.tour_id,
                        items: [
                            item
                        ]
                    })
                } else
                    arrItem.items.push(item)

            })

            return arr;
        }
    },
    mounted() {
        this.loadActualGuideBookedTours()
    },
    methods: {
        toggleAccordion(date) {

            if (this.selectedDate != null) {
                this.selectedDate = null

            } else {
                this.selectedDate = date
            }


        },
        loadMore() {
            this.page++;
            this.loadActualGuideBookedTours()
        },
        downloadGroupDocument(item) {
            this.$notify({
                title: "Кисловодск-Туризм",
                text: "Внимание! Начал формироваться документ по группе",
                type: 'success'
            });
            this.$store.dispatch("downloadGroupDocument", {
                schedule_id: item.schedule_id,
                tour_id: item.tour_id
            }).then((resp) => {
                saveAs(resp.data, 'result.xlsx');

                this.$notify({
                    title: "Кисловодск-Туризм",
                    text: "Документ успешно сформирован",
                    type: 'success'
                });
            })
        },
        startChatWithUser(userId) {
            this.$store.dispatch("startChat", {
                recipient_id: userId,
                message: `Добрый день!`
            }).then((resp) => {
                let chatId = resp.data.chat_id
                window.open(`/messages#chat-${chatId}`)
            })
        },
        startGroupChat(item) {
            this.$store.dispatch("startGroupChat", {
                schedule_id: item.schedule_id, tour_id: item.tour_id
            }).then((resp) => {
                let chatId = resp.data.chat_id;
                window.open(`/messages#chat-${chatId}`)
            })
        },
        loadActualGuideBookedTours() {
            this.$store.dispatch("loadActualGuideBookedTours", {
                page: this.page,
                tourId: this.tour.id
            }).then(() => {
                this.bookeds = this.getGuideBookedTours
                this.canLoadMore = this.canGuideBookedToursLoadMore

            })
        }
    }
}
</script>
<style lang="scss">
.current-excursion {
    display: block !important;
}

.rating {
    display: flex;

    img {
        width: 20px;
        height: 20px;
    }
}

.group-list-controls {
    li {
        a {
            i {
                font-size: 16px;
                color: #0071eb;
            }
        }
    }
}

.text-main-color {
    color: #0071eb;
}

.dt-rating__star {
    img {
        width: 20px;
        height: 20px;
    }
}
</style>
