<template>
    <div>
        <div class="personal-account__content col pt-0">
            <h2 class="lh-1 bold mt-lg-0 title-guide-cabinet">
                Мои транзакции
            </h2>
            <div class="personal-account-transactions__row d-lg-flex d-none">
                <div class="personal-account-transactions-check dt-check personal-account-check">
                    <div class="personal-account-transactions-check__input dt-check__input bg-white">
                        <input type="radio" name="transactions_status"
                               checked
                               @click="transaction_type=0"
                        >
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="personal-account-transactions-check__label dt-check__label">
                        <slot name="label">
                            <h5>
                                все
                            </h5>
                        </slot>
                    </label>
                </div>
                <div class="personal-account-transactions-check dt-check personal-account-check"
                     v-for="type in status_types">
                    <div class="personal-account-transactions-check__input dt-check__input bg-white">
                        <input type="radio" name="transactions_status"
                               @click="transaction_type=type.id"
                        >
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="personal-account-transactions-check__label dt-check__label">
                        <slot name="label">
                            <h5>
                                {{ type.title }}
                            </h5>
                        </slot>
                    </label>
                </div>

            </div>
            <div class="personal-account-transactions" v-if="transaction_list.length>0">
                <transaction-card v-for="item in transaction_list" :key="item.id" :item="item"/>
            </div>
            <div class="personal-account-transactions" v-else>
                <div class="row d-flex justify-content-center">
                    <div class="col col-12 col-md-6">
                        <div class="empty-list">
                            <img v-lazy="'/img/no-tour.jpg'" alt="">
                            <p>По данному фильтру ничего не найдено:(</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import TransactionCard from "@/components/Transactions/TransactionCard.vue";
import {mapGetters} from "vuex";

export default {
    components: {
        TransactionCard
    },

    computed: {
        ...mapGetters(['getTransactions', 'getTransactionsByTransactionType', 'getDictionariesByTypeSlug']),
    },
    data: () => ({
        status_types: [],
        transaction_type: 0,
        transaction_list: []
    }),
    watch: {
        transaction_type: function (oldVal, newVal) {
            this.loadTransactionsByPage()
        }
    },
    mounted() {

        this.loadDictionaries()
        this.loadTransactionsByPage()

        this.eventBus.on('transaction_page', (page) => {
            this.loadTransactionsByPage(page)
        });
    },
    methods: {
        loadDictionaries() {
            this.$store.dispatch("loadAllDictionaries").then(() => {
                this.status_types = this.getDictionariesByTypeSlug("transaction_type")
            })
        },
        loadTransactionsByPage(page = 0) {

            if (this.transaction_type === 0) {
                return this.$store.dispatch("loadTransactionsByPage", {
                    page: page
                }).then(() => {
                    this.transaction_list = this.getTransactions
                    this.eventBus.emit('update_transactions_pagination')
                })
            } else
                return this.$store.dispatch("loadTransactionsFilteredByPage", {
                    filterObject: {
                        transaction_type: this.transaction_type
                    }
                }).then(() => {
                    this.transaction_list = this.getTransactions
                    this.eventBus.emit('update_transactions_pagination')
                })

        }
    }
}
</script>
