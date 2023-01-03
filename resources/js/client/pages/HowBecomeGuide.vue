<template>
    <main class="container">
        <div class="main row d-flex justify-content-center">
            <div class="col-12">
                <breadcrumbs-component :items="breadcrumbs"/>
                <h1 class="px-0 mb-4 bold fs-1">О проекте</h1>
                <p class="px-0 mb-5 thin font-size-09">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis ad exercitationem laborum
                    consequuntur blanditiis quae excepturi nisi voluptas ea quibusdam sunt ipsam amet dignissimos, quam
                    tempora dolor, soluta magni labore vitae dolores eius natus. Iure eos unde saepe dolores inventore,
                    blanditiis quasi culpa numquam, nesciunt laudantium natus alias sit voluptatem. Natus odit, facilis
                    quibusdam numquam autem vero alias minus libero ad magni nobis architecto recusandae commodi
                    suscipit exercitationem tenetur reprehenderit amet totam dolorum distinctio minima ullam veniam
                    saepe! At dolores voluptatem nam rem et ea dolore exercitationem temporibus soluta quisquam, ducimus
                    repudiandae! Optio dolor temporibus, consectetur eos exercitationem hic reiciendis!
                </p>

            </div>
            <div class="col-12 align-self-center mx-0 px-0 mt-5 d-flex justify-content-center">
                <benefits-component></benefits-component>
            </div>
        </div>
    </main>
</template>
<script>
import {mapGetters} from "vuex";

export default {

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
                    text: "Как стать гидом",
                    active: true,
                }],

        }
    },

}
</script>
<style lang="scss">

</style>
