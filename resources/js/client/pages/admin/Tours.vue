<template>
    <div class="container p-2 mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <admin-menu-component :active="0"/>
            </div>
        </div>
    </div>

    <admin-tours-component/>

    <!-- Modal -->
    <div class="modal fade" id="adminAddTourModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Добавление тура</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <admin-add-tour-component/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
</template>
