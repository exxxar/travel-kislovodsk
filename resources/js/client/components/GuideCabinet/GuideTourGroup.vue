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
                    <h1 class="excursion__name mb-4 bold">{{tour.title || 'Нет заголовка'}}</h1>
                    <p class="excursion__description opacity-80 mb-4 lh-lg">
                        {{tour.short_description || 'Нет короткого описания'}}
                    </p>
                    <div class="excursion__info row align-items-center">
                        <div class="col-auto me-auto">
                                    <span class="excursion__type font-size-07 bg-blue rounded-1 px-1">
                                        {{tour.tour_type || 'Тип тура не задан'}}
                                    </span>
                        </div>
                        <div class="col-auto me-auto">
                            <span class="excursion_number letter-spacing-3 text-uppercase bold">
                                 {{tour.base_price || 'Не указана'}}
                            </span>
                            <span class="font-size-05 text-uppercase">руб.</span>
                        </div>
                        <div class="col-auto me-auto">
                            <span class="excursion_number letter-spacing-3 text-uppercase bold">{{tour.duration.split(' ')[0]}}</span>
                            <span class="font-size-05 text-uppercase">{{tour.duration.split(' ')[1]}}</span>
                        </div>
                        <div class="col-12 col-lg-auto row mt-3 mt-xxl-0 align-items-center">
                            <div class="col-auto">
                                        <span class="excursion__rating font-size-07 opacity-40 me-1">рейтинг
                                            экскурсии</span>
                                <span class="excursion_number letter-spacing-3 text-uppercase bold">4.20</span>
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
        <div class="accordion row mx-0 mb-6 gap-2">
            <div
                v-for="date in groupedByDate"
                class="accordion__item visible bg-white rounded bg-white rounded">
                <div class="accordion__head p-4 row align-items-center justify-content-between">
                    <div class="col-1 pb-4 pb-xl-0">
                        <div class="big-icon bg-light rounded d-flex justify-content-center align-items-center">
                            <i class="fa-regular fa-calendar-days"></i>
                        </div>
                    </div>
                    <span class="col-5 px-0 py-2 py-xl-0">{{ date.date }}</span>
                    <div
                        class="row mx-0 col-12 col-xl-5 accordion__head-splitted splitted splitted-xl-none px-0 pt-4 pt-xl-0 order-last order-xl-3 justify-content-between">

                        <ul class="group-list-controls d-flex justify-content-between align-items-center">
                            <li><a @click="startGroupChat(date)">Групповой чат<i class="fa-solid fa-comments"></i></a></li>
                            <li><a :href="'/api/guide-cabinet/booked-tour-info/'+date.tour_id"
                                   target="_blank">Эксель <i class="fa-solid fa-file-csv"></i></a></li>
                            <li>{{date.items.length}}
                                участников</li>
                        </ul>
                    </div>
                    <div
                        class="expand-img col-auto py-2 py-xl-0 order-2 order-xl-last d-flex justify-content-end">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                            <path d="M24 31.4 11.3 18.7l2.85-2.8L24 25.8l9.85-9.85 2.85 2.8Z"/>
                        </svg>
                    </div>
                </div>
                <div class="accordion__content">
                    <div
                        v-for="person in date.items"
                        class="accordion__content-item row splitted px-4 py-3 align-items-center justify-content-between">
                        <div class="col-auto col-xl-1 order-first">
                            <div class="big-icon rounded d-flex align-items-center justify-content-center">
                                <img class="rounded big-icon" v-lazy="person.avatar" alt="">
                            </div>
                        </div>
                        <span class="col-5 col-xl-3 order-2 semibold ps-0">{{person.tname}} {{person.sname}} {{person.fname}}</span>
                        <div class="col-6 col-xl-4 order-4 order-xl-3 row mx-0 px-0 mt-3 mt-xl-0">
                            <span class="col-12 col-xl-6 blue semibold">{{$filters.phoneFilter(person.phone)}}</span>
                            <span class="col-12 col-xl-6 thin opacity-80">{{person.email}}</span>
                        </div>
                        <div
                            class="col-auto col-xl-1 order-3 order-xl-4 d-flex justify-content-end ms-auto position-relative opacity-15">
                            <svg class="black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                 height="20" width="20">
                                <path
                                    d="M14.95 22.1q.95 0 1.6-.65.65-.65.65-1.6 0-.95-.65-1.6-.65-.65-1.6-.65-.95 0-1.6.65-.65.65-.65 1.6 0 .95.65 1.6.65.65 1.6.65Zm9.2 0q.95 0 1.6-.65.65-.65.65-1.6 0-.95-.65-1.6-.65-.65-1.6-.65-.95 0-1.6.65-.65.65-.65 1.6 0 .95.65 1.6.65.65 1.6.65Zm8.85 0q.95 0 1.6-.65.65-.65.65-1.6 0-.95-.65-1.6-.65-.65-1.6-.65-.95 0-1.6.65-.65.65-.65 1.6 0 .95.65 1.6.65.65 1.6.65ZM3.3 44.7V7.25q0-1.6 1.175-2.8 1.175-1.2 2.775-1.2h33.5q1.6 0 2.8 1.2 1.2 1.2 1.2 2.8v25.5q0 1.55-1.2 2.75t-2.8 1.2H11.3Zm3.95-8.95 3-3h30.5V7.25H7.25Zm0-28.5v28.5Z"/>
                            </svg>
                        </div>
                        <div
                            @click="startChatWithUser(person.user_id)"
                            class="col-auto col-xl-1 order-last d-flex justify-content-end ms-auto ms-xl-2 mt-3 mt-xl-0">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                                <path
                                    d="M11.2 45.3q-2.6 0-4.425-1.8-1.825-1.8-1.825-4.45V32.1h6.7V3.5l3.15 3.15 3.15-3.15 3.1 3.15L24.2 3.5l3.1 3.15 3.15-3.15 3.1 3.15L36.7 3.5l3.15 3.15 3.2-3.15v35.55q0 2.65-1.825 4.45-1.825 1.8-4.425 1.8Zm25.6-4q1 0 1.625-.625t.625-1.625V9.6H15.6v22.5h18.95v6.95q0 1 .625 1.625t1.625.625ZM18.25 17.65v-3h11.5v3Zm0 6.7v-3h11.5v3Zm16.15-6.7q-.6 0-1.05-.45-.45-.45-.45-1.05 0-.6.45-1.05.45-.45 1.05-.45.6 0 1.05.45.45.45.45 1.05 0 .6-.45 1.05-.45.45-1.05.45Zm0 6.45q-.6 0-1.05-.45-.45-.45-.45-1.05 0-.6.45-1.05.45-.45 1.05-.45.6 0 1.05.45.45.45.45 1.05 0 .6-.45 1.05-.45.45-1.05.45ZM11.15 41.3H30.6v-5.2H8.95v2.95q0 1 .65 1.625t1.55.625Zm-2.2 0v-5.2 5.2Z"/>
                            </svg>
                        </div>
                    </div>

                </div>
            </div>


            <button class="button col-12 px-4 active rounded shadow-none">
                <span class="bold">Показать ещё</span>
                <i class="fa-solid fa-chevron-down"></i>
            </button>
        </div>

        <review-list-component :tour="tour"/>
    </div>
</template>
<script>
import {mapGetters} from "vuex";

export default {
    props:["tour"],
    data() {
        return {
            bookeds: []
        }
    },

    computed: {
        ...mapGetters(['getGuideBookedToursByTourId']),
        groupedByDate() {
            let arr = [];

            this.bookeds.forEach(item => {

                let arrItem = arr.find(sub => sub.date === item.start_at&&sub.schedule_id === item.schedule_id)

                if (!arrItem) {
                    arr.push({
                        date: item.start_at,
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

        console.log("тур группы=>", this.tour)

    },
    methods: {
        startChatWithUser(userId){

            this.$store.dispatch("startChat", {
                recipient_id: userId,
                message: `Добрый день!`
            }).then((resp)=>{
                let chatId = resp.data.chat_id
                window.open(`/messages#chat-${chatId}`)
            })
        },
        startGroupChat(item){

            this.$store.dispatch("startGroupChat",{
                schedule_id: item.schedule_id, tour_id: item.tour_id
            }).then((resp) => {
                let chatId = resp.data.chat_id;
                window.open(`/messages#chat-${chatId}`)
            })
        },
        loadActualGuideBookedTours() {

            this.$store.dispatch("loadActualGuideBookedTours").then(() => {
                this.bookeds = this.getGuideBookedToursByTourId(this.tour.id)

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
                font-size:16px;
                color:#0071eb;
            }
        }
    }
}
</style>
