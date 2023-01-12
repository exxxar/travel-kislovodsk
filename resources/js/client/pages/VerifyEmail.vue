<template>
    <div class="container d-flex align-items-center justify-content-center"  style="padding:30px 0px; min-height: 100vh;">
        <div class="row">
            <div class="col-12 d-flex justify-content-center flex-column align-items-center">

                <img v-lazy="'img/load.gif'" alt="" style="width: 350px;mix-blend-mode: darken;object-fit: cover;">

                <div class="alert alert-success" role="alert" v-if="success">
                    Обновленная ссылка верификации успешно отправлена на вашу почту!
                </div>

                <p> Перед дальнейшей работой проверьте свою почту и перейдите по ссылке верификации аккаунта.
                </p>

                <form v-on:submit.prevent="requestEmailVerify" class="d-inline mb-2">
                    <button type="submit" class="btn btn-outline-primary mt-2 p-3">
                        Получить еще одну ссылку верификации
                    </button>
                </form>


            </div>
            <div class="col-12 d-flex justify-content-center">
                <a href="/logout" class="btn btn-primary p-3">Выйти из текущего аккаунта</a>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
      return {
          success:false
      }
    },
    methods:{
        requestEmailVerify(){
            this.success = false
            this.$notify({
                title: "Кисловодск-Туризм",
                text: "Отправлен запрос на подтверждение почты!",
                type: 'success'
            });

            this.$store.dispatch("requestEmailVerify").then(()=>{
                this.success = true;
            })
        }
    }
}
</script>
