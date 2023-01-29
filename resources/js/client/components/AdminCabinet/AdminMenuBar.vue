<template>
    <div class="row">
        <div class="col-md-3">
            <a href="/admin/tours"
               v-bind:class="{'border-success':active===0}"
               class="card text-bg-dark  mb-2">
                <img v-lazy="'/img/load.gif'" class="card-img card-img-menu-item" alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title text-center">Туры</h5>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="/admin/tour-objects"
               v-bind:class="{'border-success':active===1}"
               class="card  text-bg-dark mb-2">
                <img v-lazy="'/img/load.gif'" class="card-img card-img-menu-item" alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title text-center">Туристические объекты</h5>
                </div>
            </a>
        </div>


        <div class="col-md-3">
            <a href="/admin/users"
               v-bind:class="{'border-success':active===2}"
               class="card  text-bg-dark mb-2">
                <img v-lazy="'/img/load.gif'" class="card-img card-img-menu-item" alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title text-center">Пользователи</h5>
                </div>
            </a>
        </div>


        <div class="col-md-3">
            <a href="/admin/transactions"
               v-bind:class="{'border-success':active===3}"
               class="card  text-bg-dark mb-2">
                <img v-lazy="'/img/load.gif'" class="card-img card-img-menu-item" alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title text-center">Транзакции</h5>
                </div>
            </a>
        </div>
    </div>
</template>
<script>
export default {
    props:["active"]
}
</script>
<style>
.card-img-menu-item {
    max-height: 50px;
    object-fit: cover;
}
</style>
