<template>
    <main class="container-xl">
        <breadcrumbs :items="breadcrumbs" class="pb-4"></breadcrumbs>
        <div class="main row">
            <h1 class="col-12 mb-4 ps-4 ps-lg-0 bold fs-1">Сообщения</h1>
            <!--HEAD-->
            <!--СКРЫТЬ/ПОКАЗАТЬ БЛОК СООБЩЕНИЙ/ЧАТА: ДОБАВИТЬ КЛАССЫ hide ИЛИ visible К БЛОКАМ messsages-head ИЛИ messages-body-->
            <div class="col-12 col-lg-3 me-lg-4 bg-white messages-head visible-lg">
                <message-user-card/>
            </div>
            <!--BODY-->
            <chat-form/>
        </div>
    </main>
</template>
<script>
import Breadcrumbs from "@/components/Fragments/Breadcrumbs.vue";
import ChatForm from "@/components/Messages/ChatForm.vue";
import MessageUserCard from "@/components/Messages/MessageUserList.vue";

export default {
    components: {MessageUserCard, ChatForm, Breadcrumbs},
    data() {
        return {
            breadcrumbs: [
                {
                    text: "Главная",
                    href: "/",
                },
                {
                    text: "Сообщения",
                    active: true,
                }],
            usersList: [{
                img: "/img/avatars/1.jpg", name: "Николаев Артем", message: "Lorem ipsum dolor sit amet, " +
                    "consectetur adipisicing elit. Iste, expedita!", unread: true,
                date: "вчера"
            }, {
                img: "/img/avatars/2.jpg", name: "Анастасия", message: "Lorem ipsum dolor sit amet, " +
                    "consectetur adipisicing elit. Iste, expedita!", unread: true, date: "вчера"
            }, {
                img: "/img/avatars/3.jpg", name: "Григорий", message: "Lorem ipsum dolor sit amet, " +
                    "consectetur adipisicing elit. Iste, expedita!", unread: false, date: "dxthf"
            }, {
                img: "", name: "Куницина Ирина Петровна", message: "Lorem ipsum dolor sit amet, " +
                    "consectetur adipisicing elit. Iste, expedita!", unread: false, date: "позавчера"
            }]
        }
    },
    mounted() {

    }
}
</script>
