import axios from 'axios';
import util from "./utilites";

const BASE_CHATS_LINK = '/api/chats'

let state = {
    chat_messages: [],
    chats: [],
    chat_users: [],
    chats_paginate_object: null,
    chat_messages_paginate_object: null,
    chat_users_paginate_object: null,
}

const getters = {
    getChatMessages: state => state.chat_messages || [],
    getChatUsers: state => state.chat_users || [],
    getChats: state => state.chats || [],
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
    getChatMessagesPaginateObject: state => state.chat_messages_paginate_object || null,
    getChatsPaginateObject: state => state.chats_paginate_object || null,
    getChatUsersPaginateObject: state => state.chat_users_paginate_object || null,
}

const actions = {
    errorsChatMessages(context) {
        context.commit('setChatMessages',
            !localStorage.getItem('travel_store_chat_messages') ?
                [] : JSON.parse(localStorage.getItem('travel_store_chat_messages')))

        context.commit('setChatMessagesPaginateObject',
            !localStorage.getItem('travel_store_chat_messages_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_chat_messages_paginate_object')))
    },
    errorsChatUsers(context) {
        context.commit('setChatUsers',
            !localStorage.getItem('travel_store_chat_users') ?
                [] : JSON.parse(localStorage.getItem('travel_store_chat_users')))

        context.commit('setChatUsersPaginateObject',
            !localStorage.getItem('travel_store_chat_users_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_chat_users_paginate_object')))
    },
    async startGroupChat(context, chatObject = {schedule_id: null, tour_id: null}){
        let link =  `${BASE_CHATS_LINK}/start-group-chat`

        let _axios = util.makeAxiosFactory(link, 'POST', chatObject)

        return _axios.then((response) => {
            return response;
        }).catch(err => {
            context.dispatch("errorsChatMessages")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async chatMessagesPage(context, payload) {

        let link = payload.url || BASE_CHATS_LINK,
            method = payload.method || 'GET',
            data = payload.data || null
        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            context.commit('setChatMessages', dataObject.data)
            delete dataObject.data
            context.commit('setChatMessagesPaginateObject', dataObject)

        }).catch(err => {
            context.dispatch("errorsChatMessages")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async chatUsersPage(context, payload) {

        let link = payload.url || BASE_CHATS_LINK,
            method = payload.method || 'GET',
            data = payload.data || null

        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            context.commit('setChatUsers', dataObject.data)
            delete dataObject.data
            context.commit('setChatUsersPaginateObject', dataObject)

        }).catch(err => {
            context.dispatch("errorsChatMessages")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async chatsPage(context, payload) {

        let link = payload.url || BASE_CHATS_LINK,
            method = payload.method || 'GET',
            data = payload.data || null

        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            context.commit('setChats', dataObject.data)
            delete dataObject.data
            context.commit('setChatsPaginateObject', dataObject)

        }).catch(err => {
            context.dispatch("errorsChatMessages")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async startChat(context, chatObject = {recipient_id: null, message: null}) {

        let _axios = util.makeAxiosFactory(BASE_CHATS_LINK+"/start-chat", 'POST', chatObject)

        return _axios.then((response) => {
            return response;
        }).catch(err => {
            context.dispatch("errorsChatMessages")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        });
    },
    async sendMessage(context, messageObject) {

        return await context.dispatch("chatMessagesPage", {
            url: `${BASE_CHATS_LINK}/send-message`,
            method: 'POST',
            data: messageObject
        })
    },
    async sendTransaction(context, transactionObject) {

        return await context.dispatch("chatMessagesPage", {
            url: `${BASE_CHATS_LINK}/send-transaction`,
            method: 'POST',
            data: transactionObject
        })

    },
    async sendFile(context, formData) {
        return axios.post(`${BASE_CHATS_LINK}/send-file`, formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then((response) => {
            let dataObject = response.data
            context.commit('setChatMessages', dataObject.data)
            delete dataObject.data
            context.commit('setChatMessagesPaginateObject', dataObject)
        }).catch(err => {
            context.dispatch("errorsChatMessages")
        })
    },
    async nextChatMessagesPage(context, userId) {

        return await context.dispatch("chatMessagesPage", {
            url: state
                .chat_messages_paginate_object
                .links
                .next || BASE_CHATS_LINK + `/messages/${userId}`
        })
    },
    async nextChatUsersPage(context) {
        return await context.dispatch("chatUsersPage", {
            url: state
                .chat_users_paginate_object
                .links
                .next || BASE_CHATS_LINK + '/users'
        })
    },
    async nextChatsPage(context) {
        console.log("nextChatsPage", state
            .chats_paginate_object
            .links
            .next)
        return await context.dispatch("chatsPage", {
            url: state
                .chats_paginate_object
                .links
                .next || BASE_CHATS_LINK + '/chats'
        })
    },
    async readMessage(context, payload) {

        let _axios = util.makeAxiosFactory(`${BASE_CHATS_LINK}/read-message/${payload.chatId}`)

        return _axios.then((response) => {

        }).catch(err => {
            context.dispatch("errorsChatMessages")
            context.commit("setErrors", err.response.data.errors || [])
            return Promise.reject(err);
        })
    },
    async loadChatUsersByChatId(context, payload = {chatId:null}) {

        return await context.dispatch("chatUsersPage", {
            url: `${BASE_CHATS_LINK}/users/${payload.chatId}`
        })
    },
    async loadChats(context, payload = {page: 0, size: 50}) {
        let page = payload.page || 0
        let size = payload.size || 50
        return await context.dispatch("chatsPage", {
            url: `${BASE_CHATS_LINK}/chats?page=${page}&size=${size}`
        })
    },
    async loadChatMessagesByChatId(context, payload = {page: 0, size: 15}) {

        let page = payload.page || 0
        let size = payload.size || 15
        let chatId = payload.chatId
        return await context.dispatch("chatMessagesPage", {
            url: `${BASE_CHATS_LINK}/messages/${chatId}?page=${page}&size=${size}`
        })

    },
}

const mutations = {
    setChatMessages(state, payload) {
        state.chat_messages = payload || [];
        localStorage.setItem('travel_store_chat_messages', JSON.stringify(payload));
    },
    appendChatMessages(state, payload) {
        state.chat_messages.push(payload || []);
        localStorage.setItem('travel_store_chat_messages', JSON.stringify(payload));
    },
    setChatMessagesPaginateObject(state, payload) {
        state.chat_messages_paginate_object = payload || [];
        localStorage.setItem('travel_store_chat_messages_paginate_object', JSON.stringify(payload));
    },
    setChats(state, payload) {
        state.chats = payload || [];
        localStorage.setItem('travel_store_chats', JSON.stringify(payload));
    },
    appendChats(state, payload) {
        if (state.chats.length === 0)
            state.chats = payload;
        else {
            state.chats = [...state.chats, ...payload];

        }


        localStorage.setItem('travel_store_chats', JSON.stringify(payload));
    },
    setChatUsers(state, payload) {
        state.chat_users = payload || [];
        localStorage.setItem('travel_store_chat_users', JSON.stringify(payload));
    },
    appendChatUsers(state, payload) {
        if (state.chat_users.length === 0)
            state.chat_users = payload;
        else
            state.chat_users = [...state.chat_users, ...payload];

        localStorage.setItem('travel_store_chat_users', JSON.stringify(payload));
    },
    setChatsPaginateObject(state, payload) {
        state.chats_paginate_object = payload || [];
        localStorage.setItem('travel_store_chats_paginate_object', JSON.stringify(payload));
    },
    setChatUsersPaginateObject(state, payload) {
        state.chat_users_paginate_object = payload || [];
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
