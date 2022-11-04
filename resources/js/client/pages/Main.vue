<template>
    <main class="container dt-page dt-page-main">
        <div class="align-items-center d-flex dt-online-register justify-content-center text-center position-relative">
            <div class="dt-wrapper position-absolute w-100 h-100"></div>
            <div class="dt-online-register__info d-flex align-items-center">
                <h3 class="fw-bold dt-online-register-title">Онлайн заявка на регистрацию туристических групп</h3>
                <button class="btn dt-btn-white dt-online-register-btn"><span>Заполнить</span></button>
            </div>
        </div>
        <div class="dt-popular">
            <div class="dt-popular__header dt-block-header text-center">
                <h1 class="dt-header__title">Популярные направления</h1>
                <h6 class="dt-header__subtitle">основываясь на оценках посетителей</h6>
            </div>
            <div class="dt-popular__tabs">
                <tour-categories-list-slider-component/>
                <tour-list-component/>
                <div class="dt-popular__action text-center d-flex justify-content-center">
                    <div class="align-items-center btn d-flex dt-btn-blue justify-content-center">
                        <span>Все экскурсии</span>
                    </div>
                </div>
            </div>
        </div>
        <benefits-component/>
    </main>

</template>
