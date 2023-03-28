<template>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center mb-4">
                <button @click="changeActiveTitle('Все')"
                        :class="{'personal-account-nav__link_active' : activeType == 'Все',
                            'bg-white' : activeType != 'Все'}"
                        class="button col col-md-auto order-2 order-md-1 d-flex rounded mt-5 mt-md-0 ms-2 px-4
                                    justify-content-center align-items-center semibold dt-btn__menu">
                    Все
                </button>
                <button @click="changeActiveTitle('Оплаченные')"
                        :class="{'personal-account-nav__link_active' : activeType == 'Оплаченные',
                            'bg-white' : activeType != 'Оплаченные'}"
                        class="button col col-md-auto order-2 order-md-1 d-flex rounded mt-5 mt-md-0 ms-2 px-4
                                    justify-content-center align-items-center semibold dt-btn__menu">
                    Оплаченные
                </button>
                <button @click="changeActiveTitle('В ожидании')"
                        :class="{'personal-account-nav__link_active' : activeType == 'В ожидании',
                            'bg-white' : activeType != 'В ожидании'}"
                        class="button col col-md-auto order-2 order-md-1 d-flex rounded mt-5 mt-md-0 ms-2 px-4
                                    justify-content-center align-items-center semibold dt-btn__menu">
                    В ожидании
                </button>
                <button @click="changeActiveTitle('Отклоненные')"
                        :class="{'personal-account-nav__link_active' : activeType == 'Отклоненные',
                            'bg-white' : activeType != 'Отклоненные'}"
                        class="button col col-md-auto order-2 order-md-1 d-flex rounded mt-5 mt-md-0 ms-2 px-4
                                    justify-content-center align-items-center semibold dt-btn__menu">
                    Отклоненные
                </button>
                <button @click="changeActiveTitle('Удаленные')"
                        :class="{'personal-account-nav__link_active' : activeType == 'Удаленные',
                            'bg-white' : activeType != 'Удаленные'}"
                        class="button col col-md-auto order-3 order-md-2 d-flex rounded mt-5 mt-md-0 ms-2 px-4
                                justify-content-center align-items-center semibold dt-btn__menu">
                    Удаленные
                </button>
            </div>

            <div class="col-12 d-flex justify-content-center">
                <div class="dropdown" style="min-width: 500px;">
                    <button type="button" class="w-100 dt-btn-add order-1 order-lg-2 button  bg-green d-flex rounded
                        ms-auto px-4 justify-content-center align-items-center bold" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-bars text-white"></i>
                    </button>
                    <ul class="dropdown-menu p-2 w-100">
                        <li><a class="dropdown-item cursor-pointer"><i
                            class="fa-regular fa-square-plus"></i> Добавить объект </a></li>
                        <li><a class="dropdown-item cursor-pointer"><i
                            class="fa-regular fa-square-plus"></i> Создать ссылку на оплату </a></li>
                        <li><a data-bs-toggle="modal" data-bs-target="#excelToursUpload"
                               class="dropdown-item cursor-pointer"><i class="fa-solid fa-upload"></i> Загрузить Excel </a>
                        </li>
                        <li><a href="/load-template/tour-objects.xlsx" class="dropdown-item cursor-pointer"><i
                            class="fa-solid fa-file-export"></i> Скачать шаблон </a></li>
                        <li data-bs-toggle="modal" data-bs-target="#adminAddTourModal"><a class="dropdown-item"> Удалить
                            все
                            туристические объекты </a></li>
                        <li data-bs-toggle="modal" data-bs-target="#adminAddTourModal"><a class="dropdown-item">
                            Сгенерировать демонстрационные туристические объекты </a></li>
                        <li><a href="/load-template/tours.xlsx" class="dropdown-item"> Экспортировать все туристические объекты </a>
                        </li>
                        <li><a href="/load-template/tours.xlsx" class="dropdown-item"> Скачать справочники </a></li>

                    </ul>
                </div>
            </div>

        </div>
    </div>

    <div class="container mb-5">
        <div class="row">
            <div class="col-12">
                <div class="row" v-if="transaction_list.length>0">
                    <div class="personal-account-transactions col-12"
                         >
                        <transaction-card v-for="item in transaction_list"
                                          :key="item.id"
                                          :item="item"/>
                    </div>
                </div>
                <div class="row  d-flex justify-content-center" v-else-if="!load&&transaction_list.length===0">

                    <div class="col col-12 col-md-6">
                        <div class="empty-list">
                            <img v-lazy="'/img/no-tour.jpg'" alt="">
                            <p>По данному фильтру ничего не найдено:(</p>
                        </div>
                    </div>


                </div>

                <div v-if="load">
                    <div class="row d-flex justify-content-center">
                        <div class="col col-12 col-md-6">
                            <div class="empty-list">
                                <img v-lazy="'/img/load.gif'" alt="">
                                <p>Грузим информацию....</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <div class="container mb-5">
        <div class="row">
            <div class="col-12">
                <paginate-component v-if="pagination" :pagination="pagination"/>
            </div>
        </div>
    </div>
</template>
<script>
import TransactionCard from "@/components/AdminCabinet/Transactions/AdminTransactionCard.vue";
import {mapGetters} from "vuex";

export default {

    components: {
        TransactionCard
    },

    computed: {
        ...mapGetters(['getAdminTransactions',
            'getAdminTransactionsByTransactionType',
            'getDictionariesByTypeSlug',
            'getAdminTransactionsPaginateObject']),
    },
    data: () => ({
        load: false,
        status_types: [],
        transaction_type: 0,
        transaction_list: [],
        pagination: null,
        activeType: "Все",
    }),
    watch: {
        transaction_type: function (oldVal, newVal) {
            this.pagination = null
            this.loadTransactionsByPage(0)
        }
    },
    mounted() {

        this.loadDictionaries()
        this.loadAdminTransactionsByPage()
        /*
        this.eventBus.on('pagination_page', (page) => {
            this.loadTransactionsByPage(page)
        });*/
    },
    methods: {
        changeActiveTitle(title) {
            this.activeType = title
            this.loadByPage(title)
        },
        loadByPage(title, page = 0){
            switch (title) {
                default:
                case "Все":
                    this.loadAdminTransactionsByPage(0, page)
                    break;
                case "Оплаченные":
                    this.loadAdminTransactionsByPage(3, page)
                    break;
                case "В ожидании":
                    this.loadAdminTransactionsByPage(1, page)
                    break;
                case "Отклоненные":
                    this.loadAdminTransactionsByPage(2,page)
                    break;
                case "Удаленные":
                    this.loadAdminTransactionsByPage(-1, page)
                    break;
            }
        },
        loadDictionaries() {
            this.$store.dispatch("loadAllDictionaries").then(() => {
                this.status_types = this.getDictionariesByTypeSlug("transaction_type")
            })
        },
        loadAdminTransactionsByPage(transactionType, page = 0) {

            this.load = true
                return this.$store.dispatch("loadAdminTransactionsFilteredByPage", {
                    filterObject:{
                        transaction_type:transactionType || 0
                    },
                    page
                }).then(() => {
                    this.transaction_list = this.getAdminTransactions
                    this.pagination = this.getAdminTransactionsPaginateObject
                    this.load = false
                })

        }
    }
}
</script>
