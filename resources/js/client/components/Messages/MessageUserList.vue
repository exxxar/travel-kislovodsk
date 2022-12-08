<template>
    <div v-for="chat in chats" class="messages-head__message flex-nowrap row mx-0 px-4 align-items-center"
         :class="{ 'unread': chat.read_at === null }">
        <div class="icon-wrap col-auto px-0 mx-0 float-start">
            <div class="round-icon rounded-3 d-flex align-items-center justify-content-center bg-light">
                <img class="rounded-3 round-icon" :class="{ 'hide': !chat.avatar }" v-lazy="chat.avatar" alt="">
                <svg v-if="!chat.img" class="black opacity-15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                     height="23" width="23">
                    <path
                        d="M17.8 28.9q-1.15 0-1.95-.8t-.8-1.95q0-1.2.8-1.975.8-.775 1.95-.775 1.2 0 1.975.8.775.8.775 1.95 0 1.2-.8 1.975-.8.775-1.95.775Zm12.45 0q-1.2 0-1.975-.8-.775-.8-.775-1.95 0-1.2.8-1.975.8-.775 1.95-.775t1.95.8q.8.8.8 1.95 0 1.2-.8 1.975-.8.775-1.95.775ZM24 40.75q7 0 11.875-4.875T40.75 24q0-1.3-.2-2.5t-.5-2.25q-1 .3-2.125.375-1.125.075-2.375.075-4.8 0-9.05-1.95-4.25-1.95-7.3-5.6-1.65 3.95-4.775 6.925Q11.3 22.05 7.3 23.7v.35q0 7 4.85 11.85T24 40.75Zm0 3.95q-4.25 0-8.025-1.625-3.775-1.625-6.6-4.425-2.825-2.8-4.45-6.575Q3.3 28.3 3.3 24q0-4.3 1.625-8.075Q6.55 12.15 9.375 9.35q2.825-2.8 6.6-4.45 3.775-1.65 8.075-1.65 4.3 0 8.05 1.65 3.75 1.65 6.55 4.45 2.8 2.8 4.45 6.575Q44.75 19.7 44.75 24q0 4.3-1.625 8.075-1.625 3.775-4.45 6.575-2.825 2.8-6.6 4.425Q28.3 44.7 24 44.7ZM19.4 7.65q4.4 5.15 8.125 7.05 3.725 1.9 8.175 1.9 1.2 0 1.9-.05t1.55-.3Q36.9 12.2 33.025 9.6 29.15 7 24 7q-1.35 0-2.55.2-1.2.2-2.05.45ZM7.45 20.1q2.4-.9 5.475-4.075Q16 12.85 17.3 8.35q-4.35 1.95-6.575 4.975Q8.5 16.35 7.45 20.1ZM19.4 7.65Zm-2.1.7Z" />
                </svg>
            </div>
        </div>
        <div class="col align-items-center ps-3 mx-0 float-none overflow-hidden" @click="selectChat(chat)">
            <span class="messages-head__name semibold font-size-09 lh-1">{{ chat.title }}</span>
            <p class="messages-head__text opacity-40 thin d-none">{{ chat.message }}...</p>
            <p
                v-if="chat.last_message_at"
                class="messages-head__date opacity-40 thin">{{ moment(chat.last_message_at)
                .format('YYYY-MM-DD HH:mm:ss') }}
            </p>
            <p
                v-else
                class="messages-head__date opacity-40 thin">
                Нет новых сообщений
            </p>
        </div>
        <div class="messages-head__unread col-auto mx-0 px-0 float-end d-none"></div>
    </div>
    <div class="messages-head__scroll"></div>
    <button v-if="canLoadMore" @click="loadMoreChats">Загрузить еще
    </button>
</template>
<script>
import { mapGetters } from 'vuex';
export default {
    data() {
        return {
            chats: []
        }
    },
    computed: {
        ...mapGetters(['getChatUsers', 'getChats', 'getChatsPaginateObject']),
        canLoadMore() {
            if (this.getChatsPaginateObject == null)
                return false;
            return this.getChatsPaginateObject.links.next != null
        },
        moment() {
            return window.moment
        },
    },
    mounted() {
        this.eventBus.on('load_chats', () => {
            this.loadChats()
        })
        this.loadChats()



    },
    methods: {
        selectChat(chat) {
            this.eventBus.emit('select_chat', chat.id)
            this.readMessage(chat)
        },
        readMessage(chat) {
            if (!chat.read_at) {
                chat.read_at = new Date();
                this.$store.dispatch("readMessage", {
                    chatId: chat.id
                }).then(() => {
                    this.loadChats()
                })
            }
        },
        loadMoreChats() {
            console.log("loadMoreChats")
            return this.$store.dispatch("nextChatsPage").then(() => {
                this.chats = this.getChats

            })
        },
        loadChats() {
            return this.$store.dispatch("loadChats").then(() => {
                this.chats = this.getChats

                if (window.location.hash.indexOf("#chat")!==-1){
                    let chatId = window.location.hash.split('-')[1]
                    this.eventBus.emit('select_chat', chatId)
                }
            })
        }
    }
}
</script>
<style lang="scss">
.messages-head {
    height: 500px;
    position: relative;
    &::-webkit-scrollbar {
        display: none;
    }
}
.messages-head__text {
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.messages-head__scroll {
    position: absolute;
    top: 0;
    right: 0;
    width: 3px;
    height: 20%;
    background-color: #0071eb;
    cursor: pointer;
    border-radius: 0.375rem;
}
</style>
