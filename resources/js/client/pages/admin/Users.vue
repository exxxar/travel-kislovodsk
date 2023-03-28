<template>
    <div class="container p-2 mt-5">
        <div class="row d-flex justify-content-center mb-5">
            <div class="col-12">
                <h1 class="text-center text-uppercase bold">Пользователи и гиды</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <admin-menu-component :active="2"/>
            </div>
        </div>
    </div>

    <admin-users-component/>

</template>
