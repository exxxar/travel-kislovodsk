<template>
    <div class="container p-2 mt-5">
        <div class="row d-flex justify-content-center mb-5">
            <div class="col-12">
                <h1 class="text-center text-uppercase bold" >Экскурсии и туры</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <admin-menu-component :active="0"/>
            </div>
        </div>
    </div>

    <admin-tours-component/>

  </template>
