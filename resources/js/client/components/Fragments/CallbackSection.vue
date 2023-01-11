<template>

    <div
        class="row mt-5 callback-module col-12 px-5 py-2rem mx-0 bg-light d-flex justify-content-between align-items-center">
        <div class="col-12 col-lg-6 row px-0 mx-0">
            <span class="col-12 px-0 bold fs-5">Остались вопросы?</span>
            <span class="col-12 px-0 mt-2 thin font-size-09">Вы можете пообщаться, задать их через
                                специальную
                                форму, и мы обязательно ответим на любой ваш вопрос.</span>
        </div>
        <button
            data-bs-toggle="modal" data-bs-target="#callback-from"
            class="big-button rounded col-12 col-lg-auto px-5 mt-3 mt-lg-0 bg-blue bold font-size-09">Задать вопрос</button>
    </div>

    <div class="modal fade" id="callback-from" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Форма обратной связи</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <callback-component/>
                </div>
            </div>
        </div>
    </div>
</template>
<style lang="scss">
.callback-module {
    background-color: rgb(0 0 0 / 33%) !important;
    background-image: url('img/mountain.png') !important;
    background-position: center;
    background-size: cover;
    background-position-y: center;
    background-blend-mode: color;
    background-repeat: no-repeat;
    border-radius: 5px;
    span {
        color: white;
    }
}

</style>
