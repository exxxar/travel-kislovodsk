<template>
    <div>
        <div class="personal-account__content col pt-0">
            <h2 class="lh-1 bold mt-lg-0 title-guide-cabinet">
                Мои транзакции
            </h2>
            <div class="personal-account-transactions__row d-lg-flex d-none">
                <div class="personal-account-transactions-check dt-check personal-account-check">
                    <div class="personal-account-transactions-check__input dt-check__input bg-white">
                        <input type="radio" name="transactions_status">
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
                <div class="personal-account-transactions-check dt-check personal-account-check">
                    <div class="personal-account-transactions-check__input dt-check__input bg-white">
                        <input type="radio" name="transactions_status">
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="personal-account-transactions-check__label dt-check__label">
                        <slot name="label">
                            <h5>
                                в ожидании
                            </h5>
                        </slot>
                    </label>
                </div>
                <div class="personal-account-transactions-check dt-check personal-account-check">
                    <div class="personal-account-transactions-check__input dt-check__input bg-white">
                        <input type="radio" name="transactions_status">
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="personal-account-transactions-check__label dt-check__label">
                        <slot name="label">
                            <h5>
                                отклоненные
                            </h5>
                        </slot>
                    </label>
                </div>
                <div class="personal-account-transactions-check dt-check personal-account-check">
                    <div class="personal-account-transactions-check__input dt-check__input bg-white">
                        <input type="radio" name="transactions_status">
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="personal-account-transactions-check__label dt-check__label">
                        <slot name="label">
                            <h5>
                                оплаченные
                            </h5>
                        </slot>
                    </label>
                </div>
            </div>
            <div class="personal-account-transactions">
                <transaction-card v-for="item in transaction_list" :key="item.id" :item="item"/>
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
        ...mapGetters(['getGuideTransactions']),
    },
    data: () => ({
        transaction_list: [        ]
    }),
    mounted(){
        console.log("loadGuideTransactionsByPage")
      this.loadGuideTransactionsByPage()
    },
    methods:{
        loadGuideTransactionsByPage(){
            console.log("loadGuideTransactionsByPage 1")
            return this.$store.dispatch("loadGuideTransactionsByPage").then(()=>{
                console.log("loadGuideTransactionsByPage 2")
                this.transaction_list = this.getGuideTransactions
            })
        }
    }
}
</script>
