<template>
    <main class="container-xl">
        <h3 class="col-lg-3 ps-4 ps-lg-0 mb-5 opacity-40 letter-spasing-3 text-uppercase">главная <span
            class="fs-6 opacity-40">&gt;</span> сообщения</h3>
        <div class="main row">
            <h1 class="col-12 mb-4 ps-4 ps-lg-0 bold fs-1">Сообщения</h1>
            <!--HEAD-->
            <!--СКРЫТЬ/ПОКАЗАТЬ БЛОК СООБЩЕНИЙ/ЧАТА: ДОБАВИТЬ КЛАССЫ hide ИЛИ visible К БЛОКАМ messsages-head ИЛИ messages-body-->
            <div class="col-12 col-lg-3 me-lg-4 bg-white messages-head visible-lg">
                <div class="messages-head__message row mx-0 px-4 py-3 align-items-center unread">
                    <div class="icon-wrap col-auto px-0 mx-0">
                        <div class="round-icon rounded-3 d-flex align-items-center justify-content-center bg-light">
                            <img class="rounded-3 round-icon" src="./img/avatars/1.jpg" alt="">
                            <svg class="black opacity-15 hide" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                 height="23" width="23">
                                <path
                                    d="M17.8 28.9q-1.15 0-1.95-.8t-.8-1.95q0-1.2.8-1.975.8-.775 1.95-.775 1.2 0 1.975.8.775.8.775 1.95 0 1.2-.8 1.975-.8.775-1.95.775Zm12.45 0q-1.2 0-1.975-.8-.775-.8-.775-1.95 0-1.2.8-1.975.8-.775 1.95-.775t1.95.8q.8.8.8 1.95 0 1.2-.8 1.975-.8.775-1.95.775ZM24 40.75q7 0 11.875-4.875T40.75 24q0-1.3-.2-2.5t-.5-2.25q-1 .3-2.125.375-1.125.075-2.375.075-4.8 0-9.05-1.95-4.25-1.95-7.3-5.6-1.65 3.95-4.775 6.925Q11.3 22.05 7.3 23.7v.35q0 7 4.85 11.85T24 40.75Zm0 3.95q-4.25 0-8.025-1.625-3.775-1.625-6.6-4.425-2.825-2.8-4.45-6.575Q3.3 28.3 3.3 24q0-4.3 1.625-8.075Q6.55 12.15 9.375 9.35q2.825-2.8 6.6-4.45 3.775-1.65 8.075-1.65 4.3 0 8.05 1.65 3.75 1.65 6.55 4.45 2.8 2.8 4.45 6.575Q44.75 19.7 44.75 24q0 4.3-1.625 8.075-1.625 3.775-4.45 6.575-2.825 2.8-6.6 4.425Q28.3 44.7 24 44.7ZM19.4 7.65q4.4 5.15 8.125 7.05 3.725 1.9 8.175 1.9 1.2 0 1.9-.05t1.55-.3Q36.9 12.2 33.025 9.6 29.15 7 24 7q-1.35 0-2.55.2-1.2.2-2.05.45ZM7.45 20.1q2.4-.9 5.475-4.075Q16 12.85 17.3 8.35q-4.35 1.95-6.575 4.975Q8.5 16.35 7.45 20.1ZM19.4 7.65Zm-2.1.7Z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="col align-items-center ps-3 mx-0">
                        <span class="messages-head__name semibold font-size-09 lh-1">Николаев Артем</span>
                        <p class="messages-head__text opacity-40 thin lh-1 d-none">Lorem ipsum dolor sit amet,
                            consectetur adipisicing elit. Iste, expedita!</p>
                        <p class="messages-head__date opacity-40 thin lh-1">вчера</p>
                    </div>
                    <div class="messages-head__unread col-auto mx-0 px-0 d-none"></div>
                </div>
                <div class="messages-head__message row mx-0 px-4 py-3 align-items-center unread">
                    <div class="icon-wrap col-auto px-0 mx-0">
                        <div class="round-icon rounded-3 d-flex align-items-center justify-content-center bg-light">
                            <img class="rounded-3 round-icon" src="./img/avatars/2.jpg" alt="">
                            <svg class="black opacity-15 hide" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                 height="23" width="23">
                                <path
                                    d="M17.8 28.9q-1.15 0-1.95-.8t-.8-1.95q0-1.2.8-1.975.8-.775 1.95-.775 1.2 0 1.975.8.775.8.775 1.95 0 1.2-.8 1.975-.8.775-1.95.775Zm12.45 0q-1.2 0-1.975-.8-.775-.8-.775-1.95 0-1.2.8-1.975.8-.775 1.95-.775t1.95.8q.8.8.8 1.95 0 1.2-.8 1.975-.8.775-1.95.775ZM24 40.75q7 0 11.875-4.875T40.75 24q0-1.3-.2-2.5t-.5-2.25q-1 .3-2.125.375-1.125.075-2.375.075-4.8 0-9.05-1.95-4.25-1.95-7.3-5.6-1.65 3.95-4.775 6.925Q11.3 22.05 7.3 23.7v.35q0 7 4.85 11.85T24 40.75Zm0 3.95q-4.25 0-8.025-1.625-3.775-1.625-6.6-4.425-2.825-2.8-4.45-6.575Q3.3 28.3 3.3 24q0-4.3 1.625-8.075Q6.55 12.15 9.375 9.35q2.825-2.8 6.6-4.45 3.775-1.65 8.075-1.65 4.3 0 8.05 1.65 3.75 1.65 6.55 4.45 2.8 2.8 4.45 6.575Q44.75 19.7 44.75 24q0 4.3-1.625 8.075-1.625 3.775-4.45 6.575-2.825 2.8-6.6 4.425Q28.3 44.7 24 44.7ZM19.4 7.65q4.4 5.15 8.125 7.05 3.725 1.9 8.175 1.9 1.2 0 1.9-.05t1.55-.3Q36.9 12.2 33.025 9.6 29.15 7 24 7q-1.35 0-2.55.2-1.2.2-2.05.45ZM7.45 20.1q2.4-.9 5.475-4.075Q16 12.85 17.3 8.35q-4.35 1.95-6.575 4.975Q8.5 16.35 7.45 20.1ZM19.4 7.65Zm-2.1.7Z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="col align-items-center ps-3 mx-0">
                        <span class="messages-head__name semibold font-size-09 lh-1">Анастасия</span>
                        <p class="messages-head__text opacity-40 thin lh-1 d-none">Lorem ipsum dolor sit amet,
                            consectetur
                            adipisicing elit. Iste, expedita!</p>
                        <p class="messages-head__date opacity-40 thin lh-1">вчера</p>
                    </div>
                    <div class="messages-head__unread col-auto mx-0 px-0 d-none"></div>
                </div>
                <div class="messages-head__message row mx-0 px-4 py-3 align-items-center ">
                    <div class="icon-wrap col-auto px-0 mx-0">
                        <div class="round-icon rounded-3 d-flex align-items-center justify-content-center bg-light">
                            <img class="rounded-3 round-icon" src="./img/avatars/3.jpg" alt="">
                            <svg class="black opacity-15 hide" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                 height="23" width="23">
                                <path
                                    d="M17.8 28.9q-1.15 0-1.95-.8t-.8-1.95q0-1.2.8-1.975.8-.775 1.95-.775 1.2 0 1.975.8.775.8.775 1.95 0 1.2-.8 1.975-.8.775-1.95.775Zm12.45 0q-1.2 0-1.975-.8-.775-.8-.775-1.95 0-1.2.8-1.975.8-.775 1.95-.775t1.95.8q.8.8.8 1.95 0 1.2-.8 1.975-.8.775-1.95.775ZM24 40.75q7 0 11.875-4.875T40.75 24q0-1.3-.2-2.5t-.5-2.25q-1 .3-2.125.375-1.125.075-2.375.075-4.8 0-9.05-1.95-4.25-1.95-7.3-5.6-1.65 3.95-4.775 6.925Q11.3 22.05 7.3 23.7v.35q0 7 4.85 11.85T24 40.75Zm0 3.95q-4.25 0-8.025-1.625-3.775-1.625-6.6-4.425-2.825-2.8-4.45-6.575Q3.3 28.3 3.3 24q0-4.3 1.625-8.075Q6.55 12.15 9.375 9.35q2.825-2.8 6.6-4.45 3.775-1.65 8.075-1.65 4.3 0 8.05 1.65 3.75 1.65 6.55 4.45 2.8 2.8 4.45 6.575Q44.75 19.7 44.75 24q0 4.3-1.625 8.075-1.625 3.775-4.45 6.575-2.825 2.8-6.6 4.425Q28.3 44.7 24 44.7ZM19.4 7.65q4.4 5.15 8.125 7.05 3.725 1.9 8.175 1.9 1.2 0 1.9-.05t1.55-.3Q36.9 12.2 33.025 9.6 29.15 7 24 7q-1.35 0-2.55.2-1.2.2-2.05.45ZM7.45 20.1q2.4-.9 5.475-4.075Q16 12.85 17.3 8.35q-4.35 1.95-6.575 4.975Q8.5 16.35 7.45 20.1ZM19.4 7.65Zm-2.1.7Z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="col align-items-center ps-3 mx-0">
                        <span class="messages-head__name semibold font-size-09 lh-1">Григорий</span>
                        <p class="messages-head__text opacity-40 thin lh-1 d-none">Lorem ipsum dolor sit amet,
                            consectetur
                            adipisicing elit. Iste, expedita!</p>
                        <p class="messages-head__date opacity-40 thin lh-1">вчера</p>
                    </div>
                    <div class="messages-head__unread col-auto mx-0 px-0 d-none"></div>
                </div>
                <div class="messages-head__message row mx-0 px-4 py-3 align-items-center current">
                    <div class="icon-wrap col-auto px-0 mx-0">
                        <div class="round-icon rounded-3 d-flex align-items-center justify-content-center bg-light">
                            <img class="rounded-3 round-icon hide" src="./img/avatars/1.jpg" alt="">
                            <svg class="black opacity-15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                 height="23" width="23">
                                <path
                                    d="M17.8 28.9q-1.15 0-1.95-.8t-.8-1.95q0-1.2.8-1.975.8-.775 1.95-.775 1.2 0 1.975.8.775.8.775 1.95 0 1.2-.8 1.975-.8.775-1.95.775Zm12.45 0q-1.2 0-1.975-.8-.775-.8-.775-1.95 0-1.2.8-1.975.8-.775 1.95-.775t1.95.8q.8.8.8 1.95 0 1.2-.8 1.975-.8.775-1.95.775ZM24 40.75q7 0 11.875-4.875T40.75 24q0-1.3-.2-2.5t-.5-2.25q-1 .3-2.125.375-1.125.075-2.375.075-4.8 0-9.05-1.95-4.25-1.95-7.3-5.6-1.65 3.95-4.775 6.925Q11.3 22.05 7.3 23.7v.35q0 7 4.85 11.85T24 40.75Zm0 3.95q-4.25 0-8.025-1.625-3.775-1.625-6.6-4.425-2.825-2.8-4.45-6.575Q3.3 28.3 3.3 24q0-4.3 1.625-8.075Q6.55 12.15 9.375 9.35q2.825-2.8 6.6-4.45 3.775-1.65 8.075-1.65 4.3 0 8.05 1.65 3.75 1.65 6.55 4.45 2.8 2.8 4.45 6.575Q44.75 19.7 44.75 24q0 4.3-1.625 8.075-1.625 3.775-4.45 6.575-2.825 2.8-6.6 4.425Q28.3 44.7 24 44.7ZM19.4 7.65q4.4 5.15 8.125 7.05 3.725 1.9 8.175 1.9 1.2 0 1.9-.05t1.55-.3Q36.9 12.2 33.025 9.6 29.15 7 24 7q-1.35 0-2.55.2-1.2.2-2.05.45ZM7.45 20.1q2.4-.9 5.475-4.075Q16 12.85 17.3 8.35q-4.35 1.95-6.575 4.975Q8.5 16.35 7.45 20.1ZM19.4 7.65Zm-2.1.7Z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="col align-items-center ps-3 mx-0">
                        <span class="messages-head__name semibold font-size-09 lh-1">Куницина Ирина Петровна</span>
                        <p class="messages-head__text opacity-40 thin lh-1 d-none">Lorem ipsum dolor sit amet,
                            consectetur
                            adipisicing elit. Iste, expedita!</p>
                        <p class="messages-head__date opacity-40 thin lh-1">позавчера</p>
                    </div>
                    <div class="messages-head__unread col-auto mx-0 px-0 d-none"></div>
                </div>
                <div class="messages-head__message row mx-0 px-4 py-3 align-items-center ">
                    <div class="icon-wrap col-auto px-0 mx-0">
                        <div class="round-icon rounded-3 d-flex align-items-center justify-content-center bg-light">
                            <img class="rounded-3 round-icon hide" src="./img/avatars/1.jpg" alt="">
                            <svg class="black opacity-15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                 height="23" width="23">
                                <path
                                    d="M17.8 28.9q-1.15 0-1.95-.8t-.8-1.95q0-1.2.8-1.975.8-.775 1.95-.775 1.2 0 1.975.8.775.8.775 1.95 0 1.2-.8 1.975-.8.775-1.95.775Zm12.45 0q-1.2 0-1.975-.8-.775-.8-.775-1.95 0-1.2.8-1.975.8-.775 1.95-.775t1.95.8q.8.8.8 1.95 0 1.2-.8 1.975-.8.775-1.95.775ZM24 40.75q7 0 11.875-4.875T40.75 24q0-1.3-.2-2.5t-.5-2.25q-1 .3-2.125.375-1.125.075-2.375.075-4.8 0-9.05-1.95-4.25-1.95-7.3-5.6-1.65 3.95-4.775 6.925Q11.3 22.05 7.3 23.7v.35q0 7 4.85 11.85T24 40.75Zm0 3.95q-4.25 0-8.025-1.625-3.775-1.625-6.6-4.425-2.825-2.8-4.45-6.575Q3.3 28.3 3.3 24q0-4.3 1.625-8.075Q6.55 12.15 9.375 9.35q2.825-2.8 6.6-4.45 3.775-1.65 8.075-1.65 4.3 0 8.05 1.65 3.75 1.65 6.55 4.45 2.8 2.8 4.45 6.575Q44.75 19.7 44.75 24q0 4.3-1.625 8.075-1.625 3.775-4.45 6.575-2.825 2.8-6.6 4.425Q28.3 44.7 24 44.7ZM19.4 7.65q4.4 5.15 8.125 7.05 3.725 1.9 8.175 1.9 1.2 0 1.9-.05t1.55-.3Q36.9 12.2 33.025 9.6 29.15 7 24 7q-1.35 0-2.55.2-1.2.2-2.05.45ZM7.45 20.1q2.4-.9 5.475-4.075Q16 12.85 17.3 8.35q-4.35 1.95-6.575 4.975Q8.5 16.35 7.45 20.1ZM19.4 7.65Zm-2.1.7Z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="col align-items-center ps-3 mx-0">
                        <span class="messages-head__name semibold font-size-09 lh-1">Алексей</span>
                        <p class="messages-head__text opacity-40 thin lh-1 d-none">Lorem ipsum dolor sit amet,
                            consectetur
                            adipisicing elit. Iste, expedita!</p>
                        <p class="messages-head__date opacity-40 thin lh-1">позавчера</p>
                    </div>
                    <div class="messages-head__unread col-auto mx-0 px-0 d-none"></div>
                </div>
                <div class="messages-head__message row mx-0 px-4 py-3 align-items-center ">
                    <div class="icon-wrap col-auto px-0 mx-0">
                        <div class="round-icon rounded-3 d-flex align-items-center justify-content-center bg-light">
                            <img class="rounded-3 round-icon" src="./img/avatars/4.jpg" alt="">
                            <svg class="black opacity-15 hide" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                 height="23" width="23">
                                <path
                                    d="M17.8 28.9q-1.15 0-1.95-.8t-.8-1.95q0-1.2.8-1.975.8-.775 1.95-.775 1.2 0 1.975.8.775.8.775 1.95 0 1.2-.8 1.975-.8.775-1.95.775Zm12.45 0q-1.2 0-1.975-.8-.775-.8-.775-1.95 0-1.2.8-1.975.8-.775 1.95-.775t1.95.8q.8.8.8 1.95 0 1.2-.8 1.975-.8.775-1.95.775ZM24 40.75q7 0 11.875-4.875T40.75 24q0-1.3-.2-2.5t-.5-2.25q-1 .3-2.125.375-1.125.075-2.375.075-4.8 0-9.05-1.95-4.25-1.95-7.3-5.6-1.65 3.95-4.775 6.925Q11.3 22.05 7.3 23.7v.35q0 7 4.85 11.85T24 40.75Zm0 3.95q-4.25 0-8.025-1.625-3.775-1.625-6.6-4.425-2.825-2.8-4.45-6.575Q3.3 28.3 3.3 24q0-4.3 1.625-8.075Q6.55 12.15 9.375 9.35q2.825-2.8 6.6-4.45 3.775-1.65 8.075-1.65 4.3 0 8.05 1.65 3.75 1.65 6.55 4.45 2.8 2.8 4.45 6.575Q44.75 19.7 44.75 24q0 4.3-1.625 8.075-1.625 3.775-4.45 6.575-2.825 2.8-6.6 4.425Q28.3 44.7 24 44.7ZM19.4 7.65q4.4 5.15 8.125 7.05 3.725 1.9 8.175 1.9 1.2 0 1.9-.05t1.55-.3Q36.9 12.2 33.025 9.6 29.15 7 24 7q-1.35 0-2.55.2-1.2.2-2.05.45ZM7.45 20.1q2.4-.9 5.475-4.075Q16 12.85 17.3 8.35q-4.35 1.95-6.575 4.975Q8.5 16.35 7.45 20.1ZM19.4 7.65Zm-2.1.7Z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="col align-items-center ps-3 mx-0">
                        <span class="messages-head__name semibold font-size-09 lh-1">Виктория</span>
                        <p class="messages-head__text opacity-40 thin lh-1 d-none">Lorem ipsum dolor sit amet,
                            consectetur
                            adipisicing elit. Iste, expedita!</p>
                        <p class="messages-head__date opacity-40 thin lh-1">2 дня назад</p>
                    </div>
                    <div class="messages-head__unread col-auto mx-0 px-0 d-none"></div>
                </div>
                <div class="messages-head__message row mx-0 px-4 py-3 align-items-center ">
                    <div class="icon-wrap col-auto px-0 mx-0">
                        <div class="round-icon rounded-3 d-flex align-items-center justify-content-center bg-light">
                            <img class="rounded-3 round-icon" src="./img/avatars/5.jpg" alt="">
                        </div>
                        <svg class="black opacity-15 hide" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                             height="23" width="23">
                            <path
                                d="M17.8 28.9q-1.15 0-1.95-.8t-.8-1.95q0-1.2.8-1.975.8-.775 1.95-.775 1.2 0 1.975.8.775.8.775 1.95 0 1.2-.8 1.975-.8.775-1.95.775Zm12.45 0q-1.2 0-1.975-.8-.775-.8-.775-1.95 0-1.2.8-1.975.8-.775 1.95-.775t1.95.8q.8.8.8 1.95 0 1.2-.8 1.975-.8.775-1.95.775ZM24 40.75q7 0 11.875-4.875T40.75 24q0-1.3-.2-2.5t-.5-2.25q-1 .3-2.125.375-1.125.075-2.375.075-4.8 0-9.05-1.95-4.25-1.95-7.3-5.6-1.65 3.95-4.775 6.925Q11.3 22.05 7.3 23.7v.35q0 7 4.85 11.85T24 40.75Zm0 3.95q-4.25 0-8.025-1.625-3.775-1.625-6.6-4.425-2.825-2.8-4.45-6.575Q3.3 28.3 3.3 24q0-4.3 1.625-8.075Q6.55 12.15 9.375 9.35q2.825-2.8 6.6-4.45 3.775-1.65 8.075-1.65 4.3 0 8.05 1.65 3.75 1.65 6.55 4.45 2.8 2.8 4.45 6.575Q44.75 19.7 44.75 24q0 4.3-1.625 8.075-1.625 3.775-4.45 6.575-2.825 2.8-6.6 4.425Q28.3 44.7 24 44.7ZM19.4 7.65q4.4 5.15 8.125 7.05 3.725 1.9 8.175 1.9 1.2 0 1.9-.05t1.55-.3Q36.9 12.2 33.025 9.6 29.15 7 24 7q-1.35 0-2.55.2-1.2.2-2.05.45ZM7.45 20.1q2.4-.9 5.475-4.075Q16 12.85 17.3 8.35q-4.35 1.95-6.575 4.975Q8.5 16.35 7.45 20.1ZM19.4 7.65Zm-2.1.7Z"/>
                        </svg>
                    </div>
                    <div class="col align-items-center ps-3 mx-0">
                        <span class="messages-head__name semibold font-size-09 lh-1">Александр</span>
                        <p class="messages-head__text opacity-40 thin lh-1 d-none">Lorem ipsum dolor sit amet,
                            consectetur
                            adipisicing elit. Iste, expedita!</p>
                        <p class="messages-head__date opacity-40 thin lh-1">2 дня назад</p>
                    </div>
                    <div class="messages-head__unread col-auto mx-0 px-0 d-none"></div>
                </div>
                <div class="messages-head__message row mx-0 px-4 py-3 align-items-center ">
                    <div class="icon-wrap col-auto px-0 mx-0">
                        <div class="round-icon rounded-3 d-flex align-items-center justify-content-center">
                            <img class="rounded-3 round-icon hide" src="./img/avatars/5.jpg" alt="">
                            <svg class="black opacity-15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                 height="23" width="23">
                                <path
                                    d="M17.8 28.9q-1.15 0-1.95-.8t-.8-1.95q0-1.2.8-1.975.8-.775 1.95-.775 1.2 0 1.975.8.775.8.775 1.95 0 1.2-.8 1.975-.8.775-1.95.775Zm12.45 0q-1.2 0-1.975-.8-.775-.8-.775-1.95 0-1.2.8-1.975.8-.775 1.95-.775t1.95.8q.8.8.8 1.95 0 1.2-.8 1.975-.8.775-1.95.775ZM24 40.75q7 0 11.875-4.875T40.75 24q0-1.3-.2-2.5t-.5-2.25q-1 .3-2.125.375-1.125.075-2.375.075-4.8 0-9.05-1.95-4.25-1.95-7.3-5.6-1.65 3.95-4.775 6.925Q11.3 22.05 7.3 23.7v.35q0 7 4.85 11.85T24 40.75Zm0 3.95q-4.25 0-8.025-1.625-3.775-1.625-6.6-4.425-2.825-2.8-4.45-6.575Q3.3 28.3 3.3 24q0-4.3 1.625-8.075Q6.55 12.15 9.375 9.35q2.825-2.8 6.6-4.45 3.775-1.65 8.075-1.65 4.3 0 8.05 1.65 3.75 1.65 6.55 4.45 2.8 2.8 4.45 6.575Q44.75 19.7 44.75 24q0 4.3-1.625 8.075-1.625 3.775-4.45 6.575-2.825 2.8-6.6 4.425Q28.3 44.7 24 44.7ZM19.4 7.65q4.4 5.15 8.125 7.05 3.725 1.9 8.175 1.9 1.2 0 1.9-.05t1.55-.3Q36.9 12.2 33.025 9.6 29.15 7 24 7q-1.35 0-2.55.2-1.2.2-2.05.45ZM7.45 20.1q2.4-.9 5.475-4.075Q16 12.85 17.3 8.35q-4.35 1.95-6.575 4.975Q8.5 16.35 7.45 20.1ZM19.4 7.65Zm-2.1.7Z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="col align-items-center ps-3 mx-0">
                        <span class="messages-head__name semibold font-size-09 lh-1">Николай</span>
                        <p class="messages-head__text opacity-40 thin lh-1 d-none">Lorem ipsum dolor sit amet,
                            consectetur
                            adipisicing elit. Iste, expedita!</p>
                        <p class="messages-head__date opacity-40 thin lh-1">3 дня назад</p>
                    </div>
                    <div class="messages-head__unread col-auto mx-0 px-0 d-none"></div>
                </div>
                <div class="messages-head__message row mx-0 px-4 py-3 align-items-center ">
                    <div class="icon-wrap col-auto px-0 mx-0">
                        <div class="round-icon rounded-3 d-flex align-items-center justify-content-center bg-light">
                            <img class="rounded-3 round-icon" src="./img/avatars/3.jpg" alt="">
                            <svg class="black opacity-15 hide" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                 height="23" width="23">
                                <path
                                    d="M17.8 28.9q-1.15 0-1.95-.8t-.8-1.95q0-1.2.8-1.975.8-.775 1.95-.775 1.2 0 1.975.8.775.8.775 1.95 0 1.2-.8 1.975-.8.775-1.95.775Zm12.45 0q-1.2 0-1.975-.8-.775-.8-.775-1.95 0-1.2.8-1.975.8-.775 1.95-.775t1.95.8q.8.8.8 1.95 0 1.2-.8 1.975-.8.775-1.95.775ZM24 40.75q7 0 11.875-4.875T40.75 24q0-1.3-.2-2.5t-.5-2.25q-1 .3-2.125.375-1.125.075-2.375.075-4.8 0-9.05-1.95-4.25-1.95-7.3-5.6-1.65 3.95-4.775 6.925Q11.3 22.05 7.3 23.7v.35q0 7 4.85 11.85T24 40.75Zm0 3.95q-4.25 0-8.025-1.625-3.775-1.625-6.6-4.425-2.825-2.8-4.45-6.575Q3.3 28.3 3.3 24q0-4.3 1.625-8.075Q6.55 12.15 9.375 9.35q2.825-2.8 6.6-4.45 3.775-1.65 8.075-1.65 4.3 0 8.05 1.65 3.75 1.65 6.55 4.45 2.8 2.8 4.45 6.575Q44.75 19.7 44.75 24q0 4.3-1.625 8.075-1.625 3.775-4.45 6.575-2.825 2.8-6.6 4.425Q28.3 44.7 24 44.7ZM19.4 7.65q4.4 5.15 8.125 7.05 3.725 1.9 8.175 1.9 1.2 0 1.9-.05t1.55-.3Q36.9 12.2 33.025 9.6 29.15 7 24 7q-1.35 0-2.55.2-1.2.2-2.05.45ZM7.45 20.1q2.4-.9 5.475-4.075Q16 12.85 17.3 8.35q-4.35 1.95-6.575 4.975Q8.5 16.35 7.45 20.1ZM19.4 7.65Zm-2.1.7Z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="col align-items-center ps-3 mx-0">
                        <span class="messages-head__name semibold font-size-09 lh-1">Григорий</span>
                        <p class="messages-head__text opacity-40 thin lh-1 d-none">Lorem ipsum dolor sit amet,
                            consectetur
                            adipisicing elit. Iste, expedita!</p>
                        <p class="messages-head__date opacity-40 thin lh-1">3 дня назад</p>
                    </div>
                    <div class="messages-head__unread col-auto mx-0 px-0 d-none"></div>
                </div>
                <div class="messages-head__message row mx-0 px-4 align-items-center ">
                    <div class="icon-wrap col-auto px-0 mx-0">
                        <div class="round-icon rounded-3 d-flex align-items-center justify-content-center bg-light">
                            <img class="rounded-3 round-icon hide" src="./img/avatars/5.jpg" alt="">
                            <svg class="black opacity-15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                 height="23" width="23">
                                <path
                                    d="M17.8 28.9q-1.15 0-1.95-.8t-.8-1.95q0-1.2.8-1.975.8-.775 1.95-.775 1.2 0 1.975.8.775.8.775 1.95 0 1.2-.8 1.975-.8.775-1.95.775Zm12.45 0q-1.2 0-1.975-.8-.775-.8-.775-1.95 0-1.2.8-1.975.8-.775 1.95-.775t1.95.8q.8.8.8 1.95 0 1.2-.8 1.975-.8.775-1.95.775ZM24 40.75q7 0 11.875-4.875T40.75 24q0-1.3-.2-2.5t-.5-2.25q-1 .3-2.125.375-1.125.075-2.375.075-4.8 0-9.05-1.95-4.25-1.95-7.3-5.6-1.65 3.95-4.775 6.925Q11.3 22.05 7.3 23.7v.35q0 7 4.85 11.85T24 40.75Zm0 3.95q-4.25 0-8.025-1.625-3.775-1.625-6.6-4.425-2.825-2.8-4.45-6.575Q3.3 28.3 3.3 24q0-4.3 1.625-8.075Q6.55 12.15 9.375 9.35q2.825-2.8 6.6-4.45 3.775-1.65 8.075-1.65 4.3 0 8.05 1.65 3.75 1.65 6.55 4.45 2.8 2.8 4.45 6.575Q44.75 19.7 44.75 24q0 4.3-1.625 8.075-1.625 3.775-4.45 6.575-2.825 2.8-6.6 4.425Q28.3 44.7 24 44.7ZM19.4 7.65q4.4 5.15 8.125 7.05 3.725 1.9 8.175 1.9 1.2 0 1.9-.05t1.55-.3Q36.9 12.2 33.025 9.6 29.15 7 24 7q-1.35 0-2.55.2-1.2.2-2.05.45ZM7.45 20.1q2.4-.9 5.475-4.075Q16 12.85 17.3 8.35q-4.35 1.95-6.575 4.975Q8.5 16.35 7.45 20.1ZM19.4 7.65Zm-2.1.7Z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="col align-items-center ps-3 mx-0">
                        <span class="messages-head__name semibold font-size-09 lh-1">Куницина Ирина Петровна</span>
                        <p class="messages-head__text opacity-40 thin lh-1 d-none">Lorem ipsum dolor sit amet,
                            consectetur
                            adipisicing elit. Iste, expedita!</p>
                        <p class="messages-head__date opacity-40 thin lh-1">4 дня назад</p>
                    </div>
                    <div class="messages-head__unread col-auto mx-0 px-0 d-none"></div>
                </div>
                <div class="messages-head__message row mx-0 px-4 align-items-center ">
                    <div class="icon-wrap col-auto px-0 mx-0">
                        <div class="round-icon rounded-3 d-flex align-items-center justify-content-center bg-light">
                            <img class="rounded-3 round-icon hide" src="./img/avatars/5.jpg" alt="">
                            <svg class="black opacity-15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                 height="23" width="23">
                                <path
                                    d="M17.8 28.9q-1.15 0-1.95-.8t-.8-1.95q0-1.2.8-1.975.8-.775 1.95-.775 1.2 0 1.975.8.775.8.775 1.95 0 1.2-.8 1.975-.8.775-1.95.775Zm12.45 0q-1.2 0-1.975-.8-.775-.8-.775-1.95 0-1.2.8-1.975.8-.775 1.95-.775t1.95.8q.8.8.8 1.95 0 1.2-.8 1.975-.8.775-1.95.775ZM24 40.75q7 0 11.875-4.875T40.75 24q0-1.3-.2-2.5t-.5-2.25q-1 .3-2.125.375-1.125.075-2.375.075-4.8 0-9.05-1.95-4.25-1.95-7.3-5.6-1.65 3.95-4.775 6.925Q11.3 22.05 7.3 23.7v.35q0 7 4.85 11.85T24 40.75Zm0 3.95q-4.25 0-8.025-1.625-3.775-1.625-6.6-4.425-2.825-2.8-4.45-6.575Q3.3 28.3 3.3 24q0-4.3 1.625-8.075Q6.55 12.15 9.375 9.35q2.825-2.8 6.6-4.45 3.775-1.65 8.075-1.65 4.3 0 8.05 1.65 3.75 1.65 6.55 4.45 2.8 2.8 4.45 6.575Q44.75 19.7 44.75 24q0 4.3-1.625 8.075-1.625 3.775-4.45 6.575-2.825 2.8-6.6 4.425Q28.3 44.7 24 44.7ZM19.4 7.65q4.4 5.15 8.125 7.05 3.725 1.9 8.175 1.9 1.2 0 1.9-.05t1.55-.3Q36.9 12.2 33.025 9.6 29.15 7 24 7q-1.35 0-2.55.2-1.2.2-2.05.45ZM7.45 20.1q2.4-.9 5.475-4.075Q16 12.85 17.3 8.35q-4.35 1.95-6.575 4.975Q8.5 16.35 7.45 20.1ZM19.4 7.65Zm-2.1.7Z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="col align-items-center ps-3 mx-0">
                        <span class="messages-head__name semibold font-size-09 lh-1">Куницина Ирина Петровна</span>
                        <p class="messages-head__text opacity-40 thin lh-1 d-none">Lorem ipsum dolor sit amet,
                            consectetur
                            adipisicing elit. Iste, expedita!</p>
                        <p class="messages-head__date opacity-40 thin lh-1">4 дня назад</p>
                    </div>
                    <div class="messages-head__unread col-auto mx-0 px-0 d-none"></div>
                </div>
                <div class="messages-head__message row mx-0 px-4 align-items-center ">
                    <div class="icon-wrap col-auto px-0 mx-0">
                        <div class="round-icon rounded-3 d-flex align-items-center justify-content-center bg-light">
                            <img class="rounded-3 round-icon hide" src="./img/avatars/5.jpg" alt="">
                            <svg class="black opacity-15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                 height="23" width="23">
                                <path
                                    d="M17.8 28.9q-1.15 0-1.95-.8t-.8-1.95q0-1.2.8-1.975.8-.775 1.95-.775 1.2 0 1.975.8.775.8.775 1.95 0 1.2-.8 1.975-.8.775-1.95.775Zm12.45 0q-1.2 0-1.975-.8-.775-.8-.775-1.95 0-1.2.8-1.975.8-.775 1.95-.775t1.95.8q.8.8.8 1.95 0 1.2-.8 1.975-.8.775-1.95.775ZM24 40.75q7 0 11.875-4.875T40.75 24q0-1.3-.2-2.5t-.5-2.25q-1 .3-2.125.375-1.125.075-2.375.075-4.8 0-9.05-1.95-4.25-1.95-7.3-5.6-1.65 3.95-4.775 6.925Q11.3 22.05 7.3 23.7v.35q0 7 4.85 11.85T24 40.75Zm0 3.95q-4.25 0-8.025-1.625-3.775-1.625-6.6-4.425-2.825-2.8-4.45-6.575Q3.3 28.3 3.3 24q0-4.3 1.625-8.075Q6.55 12.15 9.375 9.35q2.825-2.8 6.6-4.45 3.775-1.65 8.075-1.65 4.3 0 8.05 1.65 3.75 1.65 6.55 4.45 2.8 2.8 4.45 6.575Q44.75 19.7 44.75 24q0 4.3-1.625 8.075-1.625 3.775-4.45 6.575-2.825 2.8-6.6 4.425Q28.3 44.7 24 44.7ZM19.4 7.65q4.4 5.15 8.125 7.05 3.725 1.9 8.175 1.9 1.2 0 1.9-.05t1.55-.3Q36.9 12.2 33.025 9.6 29.15 7 24 7q-1.35 0-2.55.2-1.2.2-2.05.45ZM7.45 20.1q2.4-.9 5.475-4.075Q16 12.85 17.3 8.35q-4.35 1.95-6.575 4.975Q8.5 16.35 7.45 20.1ZM19.4 7.65Zm-2.1.7Z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="col align-items-center ps-3 mx-0">
                        <span class="messages-head__name semibold font-size-09 lh-1">Куницина Ирина Петровна</span>
                        <p class="messages-head__text opacity-40 thin lh-1 d-none">Lorem ipsum dolor sit amet,
                            consectetur
                            adipisicing elit. Iste, expedita!</p>
                        <p class="messages-head__date opacity-40 thin lh-1">4 дня назад</p>
                    </div>
                    <div class="messages-head__unread col-auto mx-0 px-0 d-none"></div>
                </div>
            </div>
            <!--BODY-->
            <div class="messages-body__name col-12 p-4 row bg-white splitted mx-0 hide-lg">
                <div class="col-auto px-0">
                    <button class="big-icon bg-blue rounded fs-4">&lt;</button>
                </div>
                <div class="col row">
                    <span class="col-12 bold font-size-09">Николаев Артем</span>
                    <span class="col-12 thin opacity-40 font-size-09">час назад</span>
                </div>
                <div class="icon-wrap col-auto px-0 mx-0">
                    <div class="big-icon rounded-3 d-flex align-items-center justify-content-center bg-light">
                        <img class="rounded-3 big-icon" src="./img/avatars/1.jpg" alt="">
                        <svg class="black opacity-15 hide" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                             height="23"
                             width="23">
                            <path
                                d="M17.8 28.9q-1.15 0-1.95-.8t-.8-1.95q0-1.2.8-1.975.8-.775 1.95-.775 1.2 0 1.975.8.775.8.775 1.95 0 1.2-.8 1.975-.8.775-1.95.775Zm12.45 0q-1.2 0-1.975-.8-.775-.8-.775-1.95 0-1.2.8-1.975.8-.775 1.95-.775t1.95.8q.8.8.8 1.95 0 1.2-.8 1.975-.8.775-1.95.775ZM24 40.75q7 0 11.875-4.875T40.75 24q0-1.3-.2-2.5t-.5-2.25q-1 .3-2.125.375-1.125.075-2.375.075-4.8 0-9.05-1.95-4.25-1.95-7.3-5.6-1.65 3.95-4.775 6.925Q11.3 22.05 7.3 23.7v.35q0 7 4.85 11.85T24 40.75Zm0 3.95q-4.25 0-8.025-1.625-3.775-1.625-6.6-4.425-2.825-2.8-4.45-6.575Q3.3 28.3 3.3 24q0-4.3 1.625-8.075Q6.55 12.15 9.375 9.35q2.825-2.8 6.6-4.45 3.775-1.65 8.075-1.65 4.3 0 8.05 1.65 3.75 1.65 6.55 4.45 2.8 2.8 4.45 6.575Q44.75 19.7 44.75 24q0 4.3-1.625 8.075-1.625 3.775-4.45 6.575-2.825 2.8-6.6 4.425Q28.3 44.7 24 44.7ZM19.4 7.65q4.4 5.15 8.125 7.05 3.725 1.9 8.175 1.9 1.2 0 1.9-.05t1.55-.3Q36.9 12.2 33.025 9.6 29.15 7 24 7q-1.35 0-2.55.2-1.2.2-2.05.45ZM7.45 20.1q2.4-.9 5.475-4.075Q16 12.85 17.3 8.35q-4.35 1.95-6.575 4.975Q8.5 16.35 7.45 20.1ZM19.4 7.65Zm-2.1.7Z"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div
                class="splitted splitted-lg-none hide visible-lg col-12 col-lg p-4 bg-white messages-body position-relative d-flex flex-column justify-content-end visible">
                <div class="mt-2 d-flex align-items-center messages-body__right-wrap">
                    <div class="messages-body__message messages-body__right rounded-3 font-size-09">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus autem ipsam obcaecati.
                        Aliquam harum qui architecto repudiandae sapiente obcaecati ex, cum quos facere laborum illum
                        accusamus, deleniti nihil itaque explicabo?
                    </div>
                    <span class="message-body__time thin mx-3 opacity-40">21:03</span>
                </div>
                <span class="messages-body__date my-4">20 сентября</span>
                <div class="mt-2 d-flex align-items-center messages-body__left-wrap">
                    <div class="messages-body__message messages-body__left rounded-3 font-size-09 white">
                        Добрый день! Произвела оплату за экскурсию.
                    </div>
                    <span class="message-body__time thin ms-3 opacity-40">20:32</span>
                </div>
                <div class="mt-2 d-flex align-items-center messages-body__left-wrap">
                    <div class="messages-body__message messages-body__left rounded-3 font-size-09 white">
                        Напишите, пожалуйста, что необходимо брать с собой в поездку.
                    </div>
                    <span class="message-body__time thin ms-3 opacity-40">20:33</span>
                </div>
                <div class="col-12 row mx-0 px-0 bg-white rounded mt-2 border">
                    <div class="row col-12 col-xl-auto order-1 px-4 py-4 py-xl-3 pe-xl-0 mx-0 align-items-center">
                        <span class="col col-xl-auto bold font-size-09 mx-0">
                            <span class="hide visible-xl bold font-size-09">транзакция </span>№ 365149/0</span>
                        <div class="col-auto d-flex ms-xl-4 align-items-center">
                            <span class="thin">сумма</span>
                            <span class="bold ms-2 font-size-09">600 &#8381;</span>
                        </div>
                    </div>
                    <div
                        class="splitted splitted-xl-none col-12 col-xl-6 px-4 py-3 order-3 order-xl-2 d-flex justify-content-xl-end align-items-center ms-xl-auto">
                        <div class="col row mx-0 d-flex align-items-center justify-content-xl-end me-xl-4 me-xll-5">
                            <div class="col-auto">
                                <svg class="black opacity-15" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 48 48"
                                     height="20" width="20">
                                    <path
                                        d="M11.2 45.3q-2.6 0-4.425-1.8-1.825-1.8-1.825-4.45V32.1h6.7V3.5l3.15 3.15 3.15-3.15 3.1 3.15L24.2 3.5l3.1 3.15 3.15-3.15 3.1 3.15L36.7 3.5l3.15 3.15 3.2-3.15v35.55q0 2.65-1.825 4.45-1.825 1.8-4.425 1.8Zm25.6-4q1 0 1.625-.625t.625-1.625V9.6H15.6v22.5h18.95v6.95q0 1 .625 1.625t1.625.625ZM18.25 17.65v-3h11.5v3Zm0 6.7v-3h11.5v3Zm16.15-6.7q-.6 0-1.05-.45-.45-.45-.45-1.05 0-.6.45-1.05.45-.45 1.05-.45.6 0 1.05.45.45.45.45 1.05 0 .6-.45 1.05-.45.45-1.05.45Zm0 6.45q-.6 0-1.05-.45-.45-.45-.45-1.05 0-.6.45-1.05.45-.45 1.05-.45.6 0 1.05.45.45.45.45 1.05 0 .6-.45 1.05-.45.45-1.05.45ZM11.15 41.3H30.6v-5.2H8.95v2.95q0 1 .65 1.625t1.55.625Zm-2.2 0v-5.2 5.2Z"/>
                                </svg>
                            </div>
                            <span class="col thin">26 сентября в 20:41</span>
                        </div>
                        <div class="col-auto mx-0 row align-items-center">
                            <span class="hide visible-md col thin green">оплачено</span>
                            <div class="col d-flex align-items-center justify-content-center">
                                <div
                                    class="bg-light rounded-circle round-icon d-flex align-items-center justify-content-center">
                                    <svg class="green" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 48 48"
                                         height="20" width="20">
                                        <path d="M18.9 36.4 7 24.5l2.9-2.85 9 9L38.05 11.5l2.9 2.85Z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="splitted col-12 px-0 mx-0 order-2 order-xl-3">
                        <div class="row mx-0 px-4 py-4 py-xl-3 align-items-center">
                            <div class="col-auto row align-items-center mx-0">
                                <div class="col-auto row px-0 mx-0 align-items-center">
                                    <span class="col-auto thin font-size-08 px-0 mx-0">оплата за</span>
                                    <span
                                        class="col-auto ms-2 px-0 mx-0 position-relative blue blue-underline font-size-08">Некоторое
                                        название
                                        экскурсии</span>
                                </div>
                                <div class="col-auto px-0 mx-0 align-items-center">
                                    <span class="col-auto thin font-size-08 ms-xl-2 px-0 me-0">от</span>
                                    <span
                                        class="col-auto px-0 mx-0 position-relative blue blue-underline font-size-08">Куницина
                                        Ирина
                                        Петровна
                                        +7(495)
                                        560-55-00</span>
                                </div>
                            </div>
                            <button
                                class="col-12 col-xxl-auto letter-spasing-3 bold font-size-06 mt-3 mt-xl-0 ms-xxl-auto text-start">
                                ПОДРОБНЕЕ
                                О
                                ЗАКАЗЕ
                                <span class="blue fs-6">&gt;</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="mt-2 d-flex align-items-center messages-body__right-wrap">
                    <div class="messages-body__message messages-body__right rounded-3 font-size-09">
                        Добрый вечер! Вижу оплату.
                    </div>
                    <span class="message-body__time thin mx-3 opacity-40">21:01</span>
                </div>
                <div class="mt-2 d-flex align-items-center messages-body__right-wrap">
                    <div class="messages-body__message messages-body__right rounded-3 font-size-09">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus autem ipsam obcaecati.
                        Aliquam harum qui architecto repudiandae sapiente obcaecati ex, cum quos facere laborum illum
                        accusamus, deleniti nihil itaque explicabo?
                    </div>
                    <span class="message-body__time thin mx-3 opacity-40">21:03</span>
                </div>
                <div class="mt-2 d-flex align-items-center messages-body__right-wrap">
                    <div class="messages-body__message messages-body__right rounded-3 font-size-09">
                        <a class="blue blue-underline position-relative" href="">google.com/page</a>
                    </div>
                    <span class="message-body__time thin mx-3 opacity-40">21:03</span>
                </div>
                <div class="messages-body__input d-flex rounded pe-2 mt-2rem bg-light align-items-center">
                    <input class="d-flex order-2 order-lg-1 flex-grow-1 px-3 px-lg-4 border-0 bg-light" type="text">
                    <button class="big-icon order-1 order-lg-2 ps-4 ps-xl-0">
                        <svg class="black" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 48 48" height="24"
                             width="24">
                            <path
                                d="M23 45.4q-5.15 0-8.775-3.55T10.6 33.2V11.15q0-3.7 2.575-6.3 2.575-2.6 6.275-2.6 3.75 0 6.325 2.6t2.575 6.35v19.95q0 2.25-1.55 3.825-1.55 1.575-3.8 1.575-2.3 0-3.825-1.65-1.525-1.65-1.525-4V11.05h3.15v20q0 1 .65 1.7t1.55.7q.95 0 1.575-.675t.625-1.625v-20q0-2.4-1.675-4.05T19.45 5.45q-2.4 0-4.075 1.65Q13.7 8.75 13.7 11.15V33.3q0 3.8 2.725 6.4Q19.15 42.3 23 42.3q3.9 0 6.6-2.625 2.7-2.625 2.7-6.475V11.05h3.15v22.1q0 5.1-3.65 8.675Q28.15 45.4 23 45.4Z"/>
                        </svg>
                    </button>
                    <button class="bg-blue order-3 big-icon rounded ms-3">
                        <svg class="white" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 48 48" height="20"
                             width="20">
                            <path d="M6 40V27.75L21.1 24 6 20.15V8l38 16Z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </main>
</template>
