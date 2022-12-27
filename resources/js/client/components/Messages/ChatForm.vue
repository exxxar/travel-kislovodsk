<template>
    <div class="dt-page__messages-content bg-white col-12 col-lg-8">

        <div class="messages-list px-2rem" v-if="sortedChatMessages.length>0">
            <div v-for="item in sortedChatMessages" v-bind:class="{ 'self-message': item.user_id === user.id }"
                 class="message mt-2 d-flex align-items-center">

                <div class="message-text rounded-3 w-100">
                    <div class="row d-flex justify-content-end" v-if="item.user_id === user.id">
                        <div class="col-6 d-flex justify-content-end">
                            <a @click="removeItem(item.id)" >удалить</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <p v-html="item.message"></p>
                        </div>
                    </div>

                    <div class="w-100" v-if="item.transaction">
                        <transaction-card :item="item.transaction"/>
                    </div>

                    <div class="w-100" v-if="item.content">
                        <div class="row" v-if="item.content.type==='files'">
                           <div class="col-md-4"  v-for="file in item.content.links">
                               <a :href="file" target="_blank"
                                  class="w-100 card mb-2" aria-current="true">
                                   <span class="card-body">
                                          <img v-lazy="file" class="custom-chat-image" alt="">
                                   </span>

                               </a>
                           </div>
                        </div>

                    </div>
                </div>

                <div class="message-info">
                    <span class="thin opacity-40" v-if="item.created_at">{{
                            moment(item.created_at).format('HH:mm')
                        }}</span>
                    <span class="thin opacity-40" v-else>Отправляется...</span>
                </div>
            </div>
            <div class="messages-body__scroll"></div>
        </div>

        <div class="messages-list px-2rem" v-else>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-8 col-12 d-flex justify-content-center align-items-center flex-column">


                    <img v-lazy="'/img/no-tour.jpg'" alt="">
                    <p>Выберите чат!</p>

                </div>
            </div>
        </div>
        <div class="messages-control" v-if="chatId!==null">


            <form v-on:submit.prevent="sendChatMessage" class="d-flex rounded bg-light align-items-center m-2rem pe-2">
                <input v-model="message"
                       :disabled="loading"
                       class="d-flex rounded order-2 order-lg-1 flex-grow-1 px-3 px-lg-4 border-0 bg-light" type="text">


                <button class="attach-file big-icon order-1 order-lg-2 ps-4 ps-xl-0 position-relative">
                    <div class="btn-group dropup">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            <i class="fa-solid fa-paperclip"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <!-- Dropdown menu links -->
                            <li><a class="dropdown-item" data-bs-toggle="modal"
                                   data-bs-target="#chat-action-users-list-modal">Список участников</a></li>
                            <li><a class="dropdown-item active" data-bs-toggle="modal"
                                   data-bs-target="#chat-action-transactions-list-modal">Отправить транзакцию</a></li>
                            <li><a class="dropdown-item" data-bs-toggle="modal"
                                   data-bs-target="#chat-action-file-upload-modal">Отправить файл</a></li>
                            <li><a class="dropdown-item" data-bs-toggle="modal"
                                   data-bs-target="#chat-action-tours-list-modal" disabled>Отправить тур</a></li>
                        </ul>
                    </div>

                </button>
                <button
                    type="submit" class="order-3 big-icon rounded ms-3 dt-btn dt-btn-blue">
                    <svg class="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="20" width="20">
                        <path d="M6 40V27.75L21.1 24 6 20.15V8l38 16Z"/>
                    </svg>
                </button>
            </form>


        </div>
    </div>

    <chat-action-modals/>
</template>
<script>
import {mapGetters} from 'vuex';
import ChatActionModals from '@/components/Messages/Actions/ChatActionModals.vue'
import TransactionCard from "@/components/Transactions/TransactionCard.vue";

export default {
    components: {
        ChatActionModals, TransactionCard
    },
    data() {
        return {
            loading: false,
            chatId: null,
            message: null,
            messages: [],
        }
    },
    computed: {
        ...mapGetters(['getChatMessages']),
        user() {
            return window.user
        },
        moment() {
            return window.moment
        },
        sortedChatMessages() {
            if (this.messages.length === 0)
                return [];
            return this.messages.sort((a, b) => {
                if (a.id > b.id) {
                    return 1;
                }
                if (a.id < b.id) {
                    return -1;
                }
            })
        },
    },
    mounted() {


        window.eventBus.on("fcm_message_notification", (data) => {
            if (this.chatId != null && data.chatId == this.chatId)
                this.loadChatMessagesByChatId(this.chatId)
        })

        this.eventBus.on('select_chat', (id) => {
            this.loadChatMessagesByChatId(id)
            this.chatId = id;
        })


        this.eventBus.on('send_transaction_to_active_chat', (transactionId) => {
            this.sendTransactionMessage(transactionId)
        })


        this.eventBus.on('send_file_to_active_chat', (files) => {
            this.sendFileMessage(files)
        })


    },
    methods: {
        checkFileType(file) {
            let images = ["gif", "jpg", "bmp", "png", "jpeg"];

            let fileExt = file.substring(file.length - 6, 6)
                .split(".")[1];

            return images.indexOf(fileExt) != -1 ? "image" : "file";
        },
        removeItem(id){
            this.loading = true
            return this.$store.dispatch("removeMessage", id).then((response) => {
                this.loading = false
                this.loadChatMessagesByChatId(this.chatId)
                this.eventBus.emit('load_chats')
            })

        },
        sendChatMessage() {
            this.loading = true
            const message = this.message
            this.message = null
            this.messages.push({
                id: 9999,
                message: message,
                user_id: this.user.id,
                profile: this.user.profile,
                chat_id: this.chatId,
            });

            setTimeout(() => {
                let objDiv = document.querySelector(".messages-list")
                objDiv.scrollTop = 1000000;
            }, 500)

            return this.$store.dispatch("sendMessage", {
                chat_id: this.chatId,
                message: message
            }).then((response) => {
                this.loading = false
                this.loadChatMessagesByChatId(this.chatId)
                this.eventBus.emit('load_chats')
            })


        },
        sendTransactionMessage(transactionId) {
            this.loading = true

            setTimeout(() => {
                let objDiv = document.querySelector(".messages-list")
                objDiv.scrollTop = 1000000;
            }, 500)

            return this.$store.dispatch("sendMessage", {
                chat_id: this.chatId,
                message: "Транзакция пользователя",
                transaction_id: transactionId
            }).then((response) => {
                this.loading = false
                this.loadChatMessagesByChatId(this.chatId)
                this.eventBus.emit('load_chats')
            })


        },
        sendFileMessage(files) {
            this.loading = true

            let data = new FormData();
            data.append("chat_id", this.chatId)

            for (let i = 0; i < files.length; i++)
                data.append('files[]', files[i]);


            return this.$store.dispatch("sendFile", data).then((response) => {
                this.loading = false
                this.loadChatMessagesByChatId(this.chatId)
                this.eventBus.emit('load_chats')
            })
        },
        loadChatMessagesByChatId(id) {

            this.$store.dispatch("loadChatMessagesByChatId", {
                chatId: id
            }).then(() => {
                this.messages = this.getChatMessages

                setTimeout(() => {
                    let objDiv = document.querySelector(".messages-list")
                    objDiv.scrollTop = 1000000;
                }, 500)
            })

            this.eventBus.emit("request_load_chat_users_by_chat_id", id)
        }
    }
}
</script>
<style lang="scss">
.dt-page__messages-content {
    height: 100vh;
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    @media (min-width: 992px) {
        & {
            border-radius: 0.375rem;
        }

    }

    .messages-list {
        width: 100%;
        flex-grow: 3;
        overflow-y: scroll;
        box-sizing: border-box;
        display: flex;
        flex-direction: column;

        .message {
            max-width: 100%;
            justify-content: start;

            .message-text {
                border-top-left-radius: 0 !important;
                background-color: #0071eb;
                color: #ffffff;
                padding: 10px 20px !important;
                word-wrap: break-word;
                max-width: 100%;
                @media (min-width: 992px) {
                    max-width: 740px;
                }
            }

            .message-info {
                margin-left: 1rem;
                margin-right: 0;
            }

            &.self-message {
                justify-content: end;

                .message-text {
                    border-top-right-radius: 0 !important;
                    border-top-left-radius: 0.375rem !important;
                    background-color: #f8f9fa;
                    color: #222425;
                    order: 2;
                }

                .message-info {
                    margin-left: 0;
                    margin-right: 1rem;
                }
            }
        }

        .messages-body__scroll {
            position: absolute;
            top: 0;
            right: 0;
            width: 3px;
            height: 20%;
            background-color: #0071eb;
            cursor: pointer;
            border-radius: 0.375rem;
        }

        &::-webkit-scrollbar {
            display: none;
        }
    }

    .messages-control {
        form {
            .attach-file:hover svg {
                fill: #f73637 !important;
            }
        }
    }
}

.custom-chat-image {
    width: 200px;
    height: 200px;
    object-fit: cover;
}
</style>
