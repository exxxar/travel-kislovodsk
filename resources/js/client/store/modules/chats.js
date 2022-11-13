import axios from 'axios';
import util from "./utilites";

const BASE_CHATS_LINK = '/api/chats'

let state = {
    chat_messages: [],
    chat_users: [],
    chat_messages_paginate_object: [],
    chat_users_paginate_object: [],
}

const getters = {
    getChatMessages: state => state.chat_messages || [],
    getChatUsers: state => state.chat_users || [],
    getChatMessagesByUserId: (state) => (id) => {
        return state.chat_messages.find(item => item.user_id === id)
    },
    getChatUserById: (state) => (id) => {
        return state.chat_users.find(item => item.id === id)
    },
    getChatUsersBySearch: (state) => (search) => {
        return state.chat_users.find(item =>
            item.profile.fname.toLowerCase().indexOf(search) !== -1 ||
            item.profile.sname.toLowerCase().indexOf(search) !== -1 ||
            item.profile.tname.toLowerCase().indexOf(search) !== -1
        )
    },
    getChatMessagesPaginateObject: state => state.chat_messages_paginate_object || [],
    getChatUsersPaginateObject: state => state.chat_users_paginate_object || [],
}

const actions = {
    errorsChatMessages({commit}) {
        commit('setChatMessages',
            !localStorage.getItem('travel_store_chat_messages') ?
                [] : JSON.parse(localStorage.getItem('travel_store_chat_messages')))

        commit('setChatMessagesPaginateObject',
            !localStorage.getItem('travel_store_chat_messages_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_chat_messages_paginate_object')))
    },
    errorsChatUsers({commit}) {
        commit('setChatUsers',
            !localStorage.getItem('travel_store_chat_users') ?
                [] : JSON.parse(localStorage.getItem('travel_store_chat_users')))

        commit('setChatUsersPaginateObject',
            !localStorage.getItem('travel_store_chat_users_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_chat_users_paginate_object')))
    },
    async chatMessagesPage({commit}, link, method = 'GET', data = null) {
        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            commit('setChatMessages', dataObject.data)
            delete dataObject.data
            commit('setChatMessagesPaginateObject', dataObject)

        }).catch(err => {
            this.errorsChatMessages(commit)
        })
    },
    async chatUsersPage({commit}, link, method = 'GET', data = null) {
        let _axios = util.makeAxiosFactory(method)

        return _axios.then((response) => {
            let dataObject = response.data
            commit('setChatUsers', dataObject.data)
            delete dataObject.data
            commit('setChatUsersPaginateObject', dataObject)

        }).catch(err => {
            this.errorsChatUsers(commit)
        })
    },
    async sendMessage({commit}, messageObject) {
        return await this.chatMessagesPage(commit, `${BASE_CHATS_LINK}/send-message`, 'POST', messageObject)
    },
    async sendTransaction({commit}, transactionObject) {
        return await this.chatMessagesPage(commit, `${BASE_CHATS_LINK}/send-transaction`, 'POST', transactionObject)

    },
    async sendFile({commit}, formData) {
        return axios.post(`${BASE_CHATS_LINK}/send-file`,formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then((response) => {
            let dataObject = response.data
            commit('setChatMessages', dataObject.data)
            delete dataObject.data
            commit('setChatMessagesPaginateObject', dataObject)
        }).catch(err => {
            this.errorsChatMessages(commit)
        })
    },
    async nextChatMessagesPage({commit}, userId) {
        return await this.chatMessagesPage(commit, state
            .chat_messages_paginate_object
            .links
            .next || BASE_CHATS_LINK+`/messages/${userId}`)
    },
    async nextChatUsersPage({commit}) {
        return await this.chatUsersPage(commit, state
            .chat_users_paginate_object
            .links
            .next || BASE_CHATS_LINK+'/users')
    },
    async loadChatUsers({commit}, page = 0, size = 15) {
        return await this.bookingsPage(commit, `${BASE_CHATS_LINK}/users?page=${page}&size=${size}`)
    },
    async loadChatMessagesByChatId({commit}, userId, page = 0, size = 15) {
        return await this.chatMessagesPage(commit, `${BASE_CHATS_LINK}/messages/${userId}?page=${page}&size=${size}`)
    },
}

const mutations = {
    setChatMessages(state, payload) {
        state.chat_messages = payload.data || [];
        localStorage.setItem('travel_store_chat_messages', JSON.stringify(payload));
    },
    setChatMessagesPaginateObject(state, payload) {
        state.paginate_object = payload.data || [];
        localStorage.setItem('travel_store_chat_messages_paginate_object', JSON.stringify(payload));
    },
    setChatUsers(state, payload) {
        state.chat_users = payload.data || [];
        localStorage.setItem('travel_store_chat_users', JSON.stringify(payload));
    },
    setChatUsersPaginateObject(state, payload) {
        state.paginate_object = payload.data || [];
        localStorage.setItem('travel_store_chat_users_paginate_object', JSON.stringify(payload));
    }
}

const chatsModule = {
    state,
    mutations,
    actions,
    getters
}
export default chatsModule;
