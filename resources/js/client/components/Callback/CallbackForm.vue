<template>
    <div class="card mb-3">
        <form v-on:submit.prevent="sendRequest" class="card-body">
            <h5 class="card-title">Форма обратной связи</h5>
            <div class="form-group">
                <input type="text"
                       name="name"
                       class="form-control"
                       v-model="form.name" placeholder="Ваше Ф.И.О." required>
            </div>
            <div class="form-group">
                <input type="text" name="phone" class="form-control" v-model="form.phone"
                       pattern="[\+]\d{2} [\(]\d{3}[\)] \d{3}[\-]\d{2}[\-]\d{2}"
                       maxlength="19"
                       v-mask="['+7 (###) ###-##-##']"
                       placeholder="Номер телефона" required>
            </div>
            <div class="form-group">
                <select name="question-type" v-model="type" class="form-control" required>
                    <option v-for="(option,index) in question_types" :value="index">
                        {{option}}
                    </option>
                </select>
            </div>
            <div class="form-group">
                    <textarea name="message" v-model="message" class="form-control"
                              placeholder="Текст сообщения" required></textarea>
            </div>


            <div class="form-group mb-2">
                <mobile-voice-callback-form :phone="phone" :cansend="cansend"></mobile-voice-callback-form>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary mr-1 mb-1 w-100">
                    <i class="icon ion-md-mail"></i>
                    Отправить
                </button>
            </div>
            <div class="form-group mb-2">

                <a href="/m/rules" class="btn btn-link mr-1 mb-1" title="Пользовательское соглашение" aria-label="Пользовательское соглашение">
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

            form:{
                name: null,
                phone: null,
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
            axios
                .post('../api/v1/wish', {
                    from: this.name,
                    phone: this.phone,
                    message: "*" + this.question_types[this.type] + "*:\n" + this.message
                })
                .then(response => {
                    this.sendMessage("Сообщение успешно отправлено");
                    $('#contactModalBox').modal('hide')
                    this.name = "";
                    this.phone = "";
                    this.message = "";
                    this.cansend = false;
                })
        },

    },

}
</script>
