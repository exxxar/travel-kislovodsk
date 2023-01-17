<template>
    <main className="container">
        <div className="row d-flex justify-content-center">
            <guide-settings v-if="user.is_guide"/>
            <user-settings v-else/>
        </div>
    </main>
</template>
<script>
import {mapGetters} from "vuex";
import GuideSettings from "@/components/GuideCabinet/GuideSettings.vue";
import UserSettings from "@/components/UserCabinet/UserSettings.vue";

export default {
    components: {
        GuideSettings,UserSettings
    },
    computed: {
        user() {
            return window.user
        },
    },
    data() {
        return {
            breadcrumbs: [
                {
                    text: "Главная",
                    href: "/",
                },
                {
                    text: "Партенрам",
                    active: true,
                }],

        }
    },

}
</script>
<style lang="scss">

</style>
