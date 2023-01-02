<template>

    <main class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 align-self-center">
                <breadcrumbs :items="breadcrumbs" class="p-0"/>

                <h1 class="col-12 px-0 mb-4 bold text-center">Войти в систему</h1>


                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <login-form-component/>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </main>
</template>
<script>
import Breadcrumbs from "@/components/Fragments/Breadcrumbs.vue";
export default {
    data(){
      return {
          breadcrumbs: [
              {
                  text: "Главная",
                  href: "/",
              },
              {
                  text: "Вход в систему",
                  active: true,
              }],
      }
    },
    components:{
        Breadcrumbs
    }
}
</script>
