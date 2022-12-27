<template>
    <div class="footer-menu d-md-none d-block" v-if="!user.is_guest">
        <ul>
            <li @click="openSideBar"><a href="#sidebar"><i class="fa-solid fa-bars"></i></a></li>
            <li><a href="/tours-all"><i class="fa-solid fa-map-location-dot"></i></a></li>
            <li class="footer-menu--center">
                <a :href="profileLink"><i class="fa-solid fa-house"></i></a>
            </li>
            <li v-bind:class="{'has-new':hasMessages}"><a href="/messages"><i class="fa-regular fa-comments"></i></a></li>
            <li v-bind:class="{'has-new':hasLikes}"><a href="/favorites"><i class="fa-solid fa-heart"></i></a></li>
        </ul>
    </div>
</template>
<script>
export default {
    data(){
      return {
          hasMessages: false,
          hasLikes:false,
      }
    },
    computed: {
        user() {
            return window.user
        },
        profileLink(){
            if (this.user.is_guide)
                return "/guide-cabinet"
            if (this.user.is_user)
                return "/user-cabinet"
            if (this.user.is_admin)
                return "/admin"
        }
    },
    mounted() {
        window.eventBus.on("like_notification", (data) => {
            this.hasLikes = true
        })

        window.eventBus.on("fcm_message_notification", (data) => {
            if (data.user_ids.indexOf(this.user.id)!==-1) {
                this.hasMessages = true
            }
        })
    },
    methods:{
        openSideBar(){
            this.eventBus.emit("toggle-sidebar-menu")
        }
    }
}
</script>
<style lang="scss">
.footer-menu {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    box-sizing: border-box;
    padding: 10px;
    z-index: 9999;

    ul {
        width: 100%;
        height: 60px;
        border-radius: 10px;
        background-color: white;
        box-shadow: 0px 0px 2px 0px black;
        padding: 10px;
        box-sizing: border-box;
        display: flex;
        justify-content: space-around;
        border: 2px #0071eb solid;

        li {
            position: relative;
            height: 100%;

            &.active:after {
                content: "";
                position: absolute;
                width: 5px;
                height: 5px;
                border-radius: 50%;
                top: 0px;
                background-color: #2196f3;
            }

            &.has-new:after {
                content: "";
                position: absolute;
                width: 5px;
                height: 5px;
                border-radius: 50%;
                top: 0px;
                background-color: red;
            }

            a {
                width: 100%;
                height: 100%;
                font-size: 14px;
                color: #0a53be;

                display: flex;
                justify-content: center;
                align-items: center;
                flex-wrap: wrap;
                flex-direction: column;


                i {
                    font-size: 20px;
                    color: #0a53be;
                }

                span {
                    font-size: 10px;
                }
            }

            &.footer-menu--center {
                width: 74px;
                height: 74px;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 50%;
                background: radial-gradient(#03a9f4, #0171e9);
                position: relative;
                top: -20px;
                box-shadow: 0px 0px 2px 0px #000000;
                border: 2px #0171e9 solid;
                color: white;

                a {
                    color: white;

                    i {
                        font-size: 24px;
                        color: white;
                    }
                }
            }
        }
    }
}
</style>
