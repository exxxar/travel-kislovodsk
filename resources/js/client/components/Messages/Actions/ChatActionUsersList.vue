<template>
    <div class="list-group chat-user-list" v-if="users.length>0">
        <div
            v-for="(user, index) in users"
            class="list-group-item list-group-item-action" aria-current="true">
            <div class="row d-flex align-items-center">
                <div class="col-4"><img class="chat-user-avatar" v-lazy="user.photo" alt=""></div>
                <div class="col-8">{{ user.tname || '-' }} {{ user.fname || '-' }}</div>
            </div>
        </div>

    </div>
    <p v-else>Ошибка загрузки списка пользователей</p>
</template>
<script>
import {mapGetters} from "vuex";

export default {
    data() {
        return {
            users: []
        }
    },
    computed: {
        ...mapGetters(['getChatUsers']),
    },
    mounted() {
        this.eventBus.on('request_load_chat_users_by_chat_id', (id) => {
            this.loadChatUserById(id)
        })
    },
    methods: {
        loadChatUserById(id) {
            return this.$store.dispatch("loadChatUsersByChatId", {
                chatId: id
            }).then(() => {
                this.users = this.getChatUsers
            })
        }
    }
}
</script>
<style lang="scss">
.chat-user-avatar {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 50%;
}

</style>
