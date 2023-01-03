<template>

    <main class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 align-self-center">
                <breadcrumbs-component :items="breadcrumbs"/>

                <h1 class="text-center w-100 mb-3">Войти в систему</h1>


                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <registration-form-component/>
                            </div>
                        </div>
                    </div>
                </div>


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
                    text: "Регистрация",
                    active: true,
                }],

        }
    },

}
</script>
<style lang="scss">

</style>
