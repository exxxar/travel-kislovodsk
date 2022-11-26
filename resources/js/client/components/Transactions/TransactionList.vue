<template>
    <div>
        <div :class="{'personal-account__content col pt-0': isUserTransactions}">
            <h2 class="lh-1 bold mt-lg-0 title-guide-cabinet">
                {{ isUserTransactions ? 'Мои транзакции' : 'Транзакции' }}
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
                <TransactionCard v-for="item in transactions_list" :key="item.id" :item="item"
                                 :is-user="isUserTransactions" />
            </div>
        </div>
    </div>
</template>

<script>
import TransactionCard from "@/components/Transactions/TransactionCard.vue";

export default {
    components: {
        TransactionCard
    },
    props: {
        isUserTransactions: {
            type: Boolean,
            default: false,
            required: true
        }
    },
    data: () => ({
        transactions_list: [
            {
                id: 3651490,
                amount: 600,
                name_tour: "Некоторое название экскурсии",
                status: "в ожидании",
                name_user: 'Имя Фамилия',
                phone_user: "+7(960)560-55-56"
            },
            {
                id: 3651490,
                amount: 21900,
                name_tour: "Некоторое название экскурсии",
                status: "оплачено",
                name_user: 'Имя Фамилия',
                phone_user: "+7(960)560-55-56"
            },
            {
                id: 3651490,
                amount: 1700,
                name_tour: "Некоторое название экскурсии",
                status: "отклонено",
                name_user: 'Имя Фамилия',
                phone_user: "+7(960)560-55-56"
            },
            {
                id: 3651490,
                amount: 5890,
                name_tour: "Медовые водопады",
                status: "оплачено",
                name_user: 'Имя Фамилия',
                phone_user: "+7(960)560-55-56"
            }
        ]
    })
}
</script>
