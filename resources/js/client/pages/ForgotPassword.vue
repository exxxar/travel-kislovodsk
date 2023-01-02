<template>

    <main class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 align-self-center">
                <breadcrumbs :items="breadcrumbs" class="p-0"/>

                <h1 class="mb-3 bold text-center">Восстановление пароля</h1>

                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <password-recovery-form-component/>
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
                  text: "Восстановление пароля",
                  active: true,
              }],
      }
    },
    components:{
        Breadcrumbs
    }
}
</script>
