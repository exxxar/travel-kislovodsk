<template>
    <div class="card text-center">




                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item" @click="selectTab(1)">
                            <a class="nav-link"
                               v-bind:class="{'active':activeTab===1}"
                               aria-current="true" href="#user"><i class="fa-solid fa-user-tie text-success"></i>  Учетная запись</a>
                        </li>

                        <li class="nav-item"
                            v-if="item.company"
                            @click="selectTab(3)">
                            <a class="nav-link"
                               v-bind:class="{'active':activeTab===3}"
                               aria-current="true" href="#company"><i class="fa-regular fa-building text-success"></i> Компания</a>
                        </li>
                        <li class="nav-item" @click="selectTab(4)">
                            <a class="nav-link"
                               v-bind:class="{'active':activeTab===4}"
                               aria-current="true" href="#documents"><i class="fa-solid fa-folder-open text-success"></i> Документы</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body" style="height:190px; overflow-y: auto;" v-if="activeTab===1">
                    <p class="card-text text-left"><strong>Имя учетной записи:</strong>{{item.name || 'Имя аккаунта не указано'}}</p>
                    <p class="card-text text-left" v-if="item.profile">
                        <strong>Имя:</strong>{{item.profile.fname || 'Имя не указано'}} <br>
                        <strong>Фамилия:</strong>{{item.profile.tname || 'Имя не указано'}} <br>
                        <strong>Отчество:</strong>{{item.profile.sname || 'Имя не указано'}} <br>
                    </p>
                    <p class="card-text text-left"><strong>Почта пользователя</strong>{{item.email || 'Почта аккаунта не указана'}}</p>
                    <p class="card-text text-left"><strong>Телефон пользователя:</strong>{{item.phone || 'Номер телефона не указан'}}</p>
                    <p class="card-text text-left" v-if="item.role"><strong>Роль пользователя:</strong>{{item.role.display_name || 'не указан'}}</p>
                    <p class="card-text text-left" v-if="item.user_law_status"><strong>Юридический статус:</strong>{{item.user_law_status.title || 'не указан'}}</p>
                    <p class="card-text text-left"><strong>Дата верификации почты:</strong>{{item.email_verified_at || 'не указан'}}</p>
                    <p class="card-text text-left"><strong>Дата верификации номера телефона:</strong>{{item.phone_verified_at || 'не указан'}}</p>
                    <p class="card-text text-left"><strong>SMS-оповещения:</strong>{{item.sms_notification ?'включены' : 'выключены'}}</p>
                    <p class="card-text text-left"><strong>Почтовые оповещения:</strong>{{item.email_notification ? 'включены' : 'выключены'}}</p>
                    <p class="card-text text-left"><strong>Дата подтверждения учетной записи:</strong>{{item.verified_at || 'не указан'}}</p>
                    <p class="card-text text-left"><strong>Дата блокировки учетной записи:</strong>{{item.blocked_at || 'не указан'}}</p>
                </div>

                <div class="card-body"  style="height:190px; overflow-y: auto;" v-if="activeTab===3&&item.company">
                    <p class="card-text text-left">
                        <strong>Название:</strong>{{item.title || 'не указан'}}
                    </p>

                    <p class="card-text text-left">
                        <strong>Описание:</strong>{{item.description || 'не указан'}}
                    </p>

                    <p class="card-text text-left">
                        <strong>ИНН:</strong>{{item.inn || 'не указан'}}
                    </p>

                    <p class="card-text text-left">
                        <strong>ИНН:</strong>{{item.ogrn || 'не указан'}}
                    </p>

                    <p class="card-text text-left">
                        <strong>Юридический адрес:</strong>{{item.law_address || 'не указан'}}
                    </p>

                    <p class="card-text text-left">
                        <strong>Дата подтверждения:</strong>{{item.approve_at || 'не указан'}}
                    </p>

                    <p class="card-text text-left">
                        <strong>Дата запроса подтверждения:</strong>{{item.request_approve_at || 'не указан'}}
                    </p>

                </div>

                <div class="card-body"  style="height:190px; overflow-y: auto;"  v-if="activeTab===4">
                    <div class="list-group w-100" v-if="item.documents.length>0">
                        <a
                            :key="'document'+index"
                            v-for="(document, index) in item.documents"
                            href="#" class="list-group-item list-group-item-action active" aria-current="true">
                            {{document.origin_title || document.title || 'Без названия'}}
                        </a>

                    </div>
                    <p v-else>Документы не добавлены</p>
                </div>


<!--                <img v-lazy="item.profile.photo"  class="card-img-bottom img-admin-user-card" alt="...">-->


    </div>
    <!--
        <div class="card">
            <div class="card-body">

            </div>
        </div>

        <div class="personal-account-transactions-card" @click="sendTransaction">
            <div class="personal-account-transactions-card-head__column">
                <div class="personal-account-transactions-card-head__text fw-bold">
                    № {{ item.id }}
                </div>
                <div class="personal-account-transactions-card-head__text">
                    <span class="personal-account-transactions-card-head__text_grey">
                        Почта
                    </span>
                    <span class="fw-bold">{{ item.email }} ₽</span>
                </div>
            </div>
            <div
                 class="personal-account-transactions-card-head__status personal-account-transactions-card-head__status_blue">
                {{item.role.display_name || item.role.name || 'Не указано'}}
            </div>

            <div class="personal-account-transactions-card-body">
                <div class="personal-account-transactions-card-body__text">
                    <div class="personal-account-transactions-card-body__text_grey">

                    </div>
                    <div class="personal-account-transactions-card-body__text_grey ms-2">
                    </div>
                </div>

                <div class="dropdown">
                    <button class="btn btn-ghost-success dropdown-toggle"
                            type="button" :id="'transaction-menu-'+item.id"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <ul class="dropdown-menu" :aria-labelledby="'transaction-menu-'+item.id" >
                        <li><a class="dropdown-item" href="#">Запросить повторно</a></li>
                        <li><a class="dropdown-item" href="#">Детали транзакции</a></li>
                        <li><a class="dropdown-item" href="#">Удалить</a></li>
                        <li><a class="dropdown-item" :href="'/tour/'+item.id">Тур к транзакции</a></li>
                    </ul>
                </div>
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

        <action-modal-dialog-component
            :hide-controls="true"
            :id="'choosePayment'+item.id">
            <template v-slot:head>
                <p>Диалог выбора способа</p>
            </template>

            <template v-slot:body>

                <div class="row" v-if="payment">
                    <div class="col-12 d-flex align-items-center justify-content-center flex-column pt-5 pb-5" v-if="payment.bankcard.url">
                        <p>Оплата банковской картой</p>
                        <a
                            class="cursor-pointer select-payment-method"
                           :href="payment.bankcard.url" >
                            <img class="w-100" v-lazy="'/img/2payments22.png'" alt="">
                        </a>
                    </div>
                    <div class="col-12 d-flex align-items-center justify-content-center flex-column" v-if="payment.sbp.url">
                        <p>Оплата через систему быстрых платежей</p>
                        <a
                            class="cursor-pointer select-payment-method"
                           :href="payment.sbp.url">
                            <img class="w-100" v-lazy="'/img/sbp.jpg'" alt="">
                        </a>
                    </div>
                </div>
                <div class="row" v-else>
                    <div class="col-12">
                        <div class="empty-list">
                            <img v-lazy="'/img/load.gif'" alt="">
                            <p>Грузим информацию....</p>
                        </div>
                    </div>
                </div>
            </template>
        </action-modal-dialog-component>
    -->


</template>
<script>
export default {
    props: ['item'],
    data() {
        return {
            activeTab: 1
        }
    },
    methods: {
        selectTab(tab){
            this.activeTab = tab
        }
    }
}
</script>
<style lang="scss">
.select-payment-method {
    border: 2px white solid;
    border-radius: 10px;

    &:hover {
        border: 2px #1553ce solid;

    }
}

.img-admin-user-card {
    height: 100px;
    width: 100%;
    object-fit: cover;
}
</style>
