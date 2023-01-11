<template xmlns="http://www.w3.org/1999/html">
    <div class="personal-account-transactions-card" @click="sendTransaction">
        <div class="personal-account-transactions-card-head__column">
            <div class="personal-account-transactions-card-head__text fw-bold">
                № {{ item.id }}
            </div>
            <div class="personal-account-transactions-card-head__text">
                <span class="personal-account-transactions-card-head__text_grey">
                    сумма
                </span>
                <span class="fw-bold">{{ item.amount }} ₽</span>
            </div>
        </div>
        <div v-if="item.status_type.slug === 'transaction_in_progress_type'"
             class="personal-account-transactions-card-head__status personal-account-transactions-card-head__status_blue">
            в ожидании, <a data-bs-toggle="modal"
                           class="cursor-pointer underline"
                           :data-bs-target="'#requestPaymentDialog'+item.id">
            повторить оплату?</a>
            <div class="personal-account-transactions-card-head__icon">
                <svg class="personal-account-transactions-card-head__svg" xmlns="http://www.w3.org/2000/svg"
                     height="100%" width="100" viewBox="0 0 48 48">
                    <path
                        d="M9.75 32.25q-1.2-1.9-1.725-3.95-.525-2.05-.525-4.25 0-6.65 4.825-11.55T23.8 7.6h2.15L22.3 3.95l2.15-2.2L32.3 9.6l-7.85 7.8-2.2-2.2 3.6-3.6h-2q-5.05 0-8.7 3.675-3.65 3.675-3.65 8.775 0 1.55.3 2.9.3 1.35.75 2.5Zm13.7 14.15-7.85-7.8 7.85-7.9 2.2 2.2-3.7 3.65h2.2q5.05 0 8.7-3.675Q36.5 29.2 36.5 24.1q0-1.55-.275-2.9-.275-1.35-.825-2.5l2.8-2.8q1.2 1.95 1.75 3.975.55 2.025.55 4.225 0 6.65-4.825 11.55t-11.425 4.9h-2.3l3.7 3.65Z"/>
                </svg>
            </div>
        </div>
        <div v-if="item.status_type.slug === 'transaction_payed_type'"
             class="personal-account-transactions-card-head__status personal-account-transactions-card-head__status_green">
            оплачено
            <div class="personal-account-transactions-card-head__icon">
                <svg class="personal-account-transactions-card-head__svg" xmlns="http://www.w3.org/2000/svg"
                     height="100%" width="100%" viewBox="0 0 48 48">
                    <path d="M18.9 36.4 7 24.5l2.9-2.85 9 9L38.05 11.5l2.9 2.85Z"/>
                </svg>
            </div>
        </div>
        <div v-if="item.status_type.slug === 'transaction_discard_type'"
             class="personal-account-transactions-card-head__status personal-account-transactions-card-head__status_red">
            отклонено,  <a data-bs-toggle="modal"
                           class="cursor-pointer underline"
                           :data-bs-target="'#requestPaymentDialog'+item.id">
            повторить оплату?</a>
            <div class="personal-account-transactions-card-head__icon">
                <svg class="personal-account-transactions-card-head__svg" xmlns="http://www.w3.org/2000/svg"
                     height="100%" width="100%" viewBox="0 0 48 48">
                    <path fill="#f73637"
                          d="m12.45 38.35-2.8-2.8L21.2 24 9.65 12.45l2.8-2.8L24 21.2 35.55 9.65l2.8 2.8L26.8 24l11.55 11.55-2.8 2.8L24 26.8Z"/>
                </svg>
            </div>
        </div>
        <div class="personal-account-transactions-card-body">
            <div class="personal-account-transactions-card-body__text">
                <div class="personal-account-transactions-card-body__text_grey">
                    оплата за
                    <a :href="'/tour/'+item.tour.id"
                       target="_blank"
                       class="personal-account-transactions-card-body__text_blue">
                        {{ item.tour.title }}
                    </a>
                    <span v-if="item.user">
                    от
                    <span class="personal-account-transactions-card-body__text_blue ms-0">
                        {{ item.user.tname }} {{  item.user.fname }}
                    </span>
                    </span>
                </div>
                <div class="personal-account-transactions-card-body__text_grey ms-2" >

                </div>
            </div>
            <a :href="'/tour/'+item.id" class="personal-account-input__link text-uppercase dt-travel-card__action">
                <button class="dt-btn-text">подробнее о заказе</button>
            </a>
        </div>
    </div>

    <action-modal-dialog-component
        :id="'requestPaymentDialog'+item.id"
        v-on:accept="requestPaymentByTransaction">
        <template v-slot:head>
            <p>Диалог запроса оплаты</p>
        </template>

        <template v-slot:body>
            <p>Вы действительно хотите повторить оплату по текущей транзакции?
                "{{ item.description || 'Нет описания' }}"?</p>
        </template>
    </action-modal-dialog-component>
</template>
<script>
export default {
    props: ['item'],
    methods:{
        requestPaymentByTransaction(){
            this.$store.dispatch("requestPaymentByTransactionId", this.item.id).then((resp)=>{
                window.open(resp.url, '_blank')
            })
        },
        sendTransaction(){
            this.eventBus.emit("send_transaction_to_active_chat", this.item.id)
        }
    }
}
</script>
