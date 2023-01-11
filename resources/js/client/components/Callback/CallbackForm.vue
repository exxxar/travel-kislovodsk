<template>
    <div class="card mb-3">
        <form v-on:submit.prevent="sendRequest" class="card-body">
            <div class="form-group mb-2">
                <input type="text"
                       name="name"
                       class="form-control"
                       v-model="form.name" placeholder="Ваше Ф.И.О." required>
            </div>
            <div class="form-group mb-2">
                <input type="text" name="phone" class="form-control" v-model="form.phone"
                       pattern="[\+]\d{1}[\(]\d{3}[\)]\d{3}[\-]\d{2}[\-]\d{2}"
                       maxlength="19"
                       v-mask="['+7(###)###-##-##']"
                       placeholder="Номер телефона" required>
            </div>
            <div class="form-group mb-2">
                <input type="email" name="email" class="form-control" v-model="form.email"
                       placeholder="Почта для обратной связи">
            </div>
            <div class="form-group mb-2">
                <select name="question-type" v-model="form.type" class="form-control" required>
                    <option v-for="(option,index) in question_types" :value="index">
                        {{ option }}
                    </option>
                </select>
            </div>
            <div class="form-group mb-2">
                    <textarea name="message" v-model="form.message"
                              style="min-height: 200px"
                              class="form-control"
                              placeholder="Текст сообщения" required></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-outline-primary mr-1 mb-1 w-100 p-3">
                    <i class="fa-solid fa-paper-plane"></i>
                    Отправить
                </button>
            </div>
            <div class="form-group mb-2 d-flex justify-content-center">

                <a href="/rules" class="btn btn-link mt-2" title="Пользовательское соглашение"
                   aria-label="Пользовательское соглашение">
                    <i class="icon ion-ios-filing"></i>
                    Пользовательское соглашение!
                </a>

            </div>


        </form>
    </div>
</template>
<script>
export default {
    data() {
        return {

            form: {
                name: null,
                phone: null,
                email: null,
                type: 0,
                message: '',
            },
            question_types: [
                "Вопросы по заказу тура",
                "Стать гидом",
                "Реклама и продвижение",
                "Другие вопросы"
            ]
        };
    },
    methods: {
        sendRequest: function (e) {

            this.$store.dispatch("sendQuestionForm", this.form).then(() => {

                this.form.name = "";
                this.form.phone = "";
                this.form.email = "";
                this.form.message = "";
                this.form.type = 0;
                this.form.cansend = false;

                this.$notify({
                    title: "Сообщения",
                    text: "Ваше сообщение успешно отправлено",
                    type: 'success'
                });
            })

        },

    },

}
</script>
