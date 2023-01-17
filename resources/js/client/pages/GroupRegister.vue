
<template>
    <main class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 mx-0 px-0">
                <breadcrumbs :items="breadcrumbs" class="d-flex justify-content-center"/>

                <h1 class="col-12 px-0 mb-5 bold fs-1 lh-sm">Онлайн-заявка на регистрацию<br/>туристких групп</h1>
                <p class="col-12 px-0 mb-5 bold font-size-09 thin">
                    <span class="bold red font-size-09">Собрались в поход - проинформируйте МЧС!</span>
                    - consequuntur blanditiis quae excepturi nisi voluptas ea quibusdam sunt ipsam amet dignissimos,
                    quam
                    tempora dolor, soluta magni labore vitae dolores eius natus. Iure eos unde saepe dolores inventore,
                    blanditiis quasi culpa numquam, nesciunt laudantium natus alias sit voluptatem. Natus odit, facilis
                    quibusdam numquam autem vero alias minus libero ad magni nobis architecto recusandae commodi
                    suscipit exercitationem tenetur reprehenderit amet totam dolorum distinctio minima ullam veniam
                    saepe!
                </p>
                <div class="col-12 mb-5">
                    <img class="icon-svg px-0" v-lazy="'/img/icons/info-red.svg'" alt="info">
                    <div class="col row px-0 mx-0 ms-2">
                        <span class="col-12 px-0 bold font-size-09">срок подачи заявления за 10 рабочих дней до даты
                            проведения мероприятия</span>
                        <span class="col-12 px-0 opacity-70 thin font-size-09">application deadline 10 working days
                            before the start of the route</span>
                    </div>
                </div>
                <div class="col-12 px-0 mx-0 mb-5 d-flex justify-content-center">
                    <img class="px-0 rounded img-250 w-100" v-lazy="'/img/3.png'" alt="">
                </div>
                <div class="col-12 px-0 mx-0 mb-5">
                    <img class="icon-svg px-0" v-lazy="'/img/icons/info-red.svg'" alt="info">
                    <div class="col row px-0 mx-0 ms-2">
                        <p class="px-0">
                            <span class="px-0 bold font-size-09 red">Все поля обязательны к заполнению.</span>
                            <span class="px-0 thin font-size-09">В случае отсутствия информации по какому-либо из
                                пунктов, просим </span>
                            <span class="px-0 bold font-size-09">указывать прочерк или писать "не актуально".</span>
                        </p>
                    </div>
                </div>

                <form v-on:submit.prevent="submitForm">
                    <div class="col-12 px-0 mx-0 mb-5 align-items-center">
                        <div class="col-12 col-md-3 ps-0 pe-4 mx-0">
                            <span class="col-auto px-0 mx-0 blue bold font-size-09">01.</span>
                            <div class="col px-0 ms-2 d-flex flex-column">
                                <span class="bold font-size-09">Дата регистрации</span>
                                <span class="thin font-size-09 opacity-70">Registration date</span>
                            </div>
                        </div>
                        <input type="date" name="group-registration-date" placeholder="15 сентября 2022"
                               v-model="groupForm.registration_date"
                               class="col-12 col-md-3 mt-2 mt-md-0 px-2rem py-4 rounded border-0 " required>
                    </div>
                    <div class="col-12 row px-0 mx-0 mb-5">
                        <div class="col-12 row px-0 mx-0">
                            <span class="col-auto px-0 mx-0 blue bold font-size-09">02.</span>
                            <div class="col px-0 ms-2 d-flex flex-column">
                            <span class="bold font-size-09">Сведения о туристской организации (при проведении
                                туристского мероприятия туристкой организацией)</span>
                                <span class="thin font-size-09 opacity-70">Tourist agency information (for tourist event
                                held by tourist agency)</span>
                            </div>
                        </div>
                        <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                            <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                                <span class="thin">Наименование</span>
                                <span class="thin opacity-70">Name</span>
                            </div>
                            <input type="text" name="group-agency-name" v-model="groupForm.company.title"
                                   class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 " required>
                        </div>
                        <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                            <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                                <span class="thin ">Адрес</span>
                                <span class="thin opacity-70">Address</span>
                            </div>
                            <input type="text" name="group-agency-address" v-model="groupForm.company.address"
                                   class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 " required>
                        </div>
                        <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                            <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                                <span class="thin ">Контактный телефон</span>
                                <span class="thin opacity-70">Phone number</span>
                            </div>
                            <input type="text" name="group-agency-phone" v-mask="'+7(###)###-##-##'"
                                   v-model="groupForm.company.phone"
                                   class="col-12 col-md-4 mt-2 mt-md-0 px-2rem py-4 rounded border-0 " required>
                        </div>
                    </div>
                    <div class="col-12 row px-0 mx-0 mb-5">
                        <div class="col-12 row px-0 mx-0">
                            <span class="col-auto px-0 mx-0 blue bold font-size-09">03.</span>
                            <div class="col px-0 ms-2 d-flex flex-column">
                            <span class="bold font-size-09">Сведения о руководителе туристской группы / сведения о
                                туристе, совершающем одиночный маршрут</span>
                                <span class="thin font-size-09 opacity-70">Tour group leader information / individual
                                tourist</span>
                            </div>
                        </div>
                        <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                            <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                                <span class="thin ">Фамилия</span>
                                <span class="thin opacity-70">Last name</span>
                            </div>
                            <input type="text" name="group-leader-lastname" v-model="groupForm.guide.last_name"
                                   class="col-12 col-md-4 mt-2 mt-md-0 px-2rem py-4 rounded border-0 " required>
                        </div>
                        <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                            <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                                <span class="thin ">Имя</span>
                                <span class="thin opacity-70">First name</span>
                            </div>
                            <input type="text" name="group-leader-firstname" v-model="groupForm.guide.first_name"
                                   class="col-12 col-md-4 mt-2 mt-md-0 px-2rem py-4 rounded border-0 " required>
                        </div>
                        <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                            <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                                <span class="thin ">Отчество</span>
                                <span class="thin opacity-70">-</span>
                            </div>
                            <input type="text" name="group-leader-patronymic" v-model="groupForm.guide.second_name"
                                   class="col-12 col-md-4 mt-2 mt-md-0 px-2rem py-4 rounded border-0 " required>
                        </div>
                        <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                            <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                                <span class="thin ">Год рождения</span>
                                <span class="thin opacity-70">Date of birth</span>
                            </div>
                            <input type="date" name="group-leader-birthdate" v-model="groupForm.guide.date_of_birth"
                                   class="col-12 col-md-2 mt-2 mt-md-0 px-2rem py-4 rounded border-0 " required>
                        </div>
                        <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                            <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                                <span class="thin ">Адрес проживания</span>
                                <span class="thin opacity-70">Home address</span>
                            </div>
                            <input type="text" name="group-leader-home-address" v-model="groupForm.guide.home_address"
                                   class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 " required>
                        </div>
                        <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                            <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                                <span class="thin ">Домашний телефон</span>
                                <span class="thin opacity-70">Home phone</span>
                            </div>
                            <input type="text" name="group-leader-home-phone" v-mask="'+7(###)###-##-##'"
                                   v-model="groupForm.guide.home_phone"
                                   class="col-12 col-md-4 mt-2 mt-md-0 px-2rem py-4 rounded border-0 " required>
                        </div>
                        <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                            <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                                <span class="thin ">Рабочий телефон</span>
                                <span class="thin opacity-70">Office phone</span>
                            </div>
                            <input type="text" name="group-leader-office-phone" v-mask="'+7(###)###-##-##'"
                                   v-model="groupForm.guide.office_phone"
                                   class="col-12 col-md-4 mt-2 mt-md-0 px-2rem py-4 rounded border-0 " required>
                        </div>
                        <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                            <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                                <span class="thin ">Мобильный телефон</span>
                                <span class="thin opacity-70">Mobile phone</span>
                            </div>
                            <input type="text" name="group-leader-mobile-phone" v-mask="'+7(###)###-##-##'"
                                   v-model="groupForm.guide.mobile_phone"
                                   class="col-12 col-md-4 mt-2 mt-md-0 px-2rem py-4 rounded border-0 " required>
                        </div>
                        <div class="col-12 row mx-0 mt-3 px-0">
                            <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                            <span class="thin ">Сведения о близком родственнике или ином контактном лице (ФИО,
                                контактный телефон) - заполняет турист, совершающий одиночный маршрут</span>
                                <span class="thin opacity-70">information about relative or other contact
                                person (name, telephone number) - for individual tourist</span>
                            </div>
                            <input type="text" name="group-leader-relative"
                                   v-model="groupForm.guide.relative_contact_information"
                                   class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 " required>
                        </div>
                    </div>
                    <div class="col-12 row px-0 mx-0 mb-5">
                        <div class="col-12 row px-0 mx-0">
                            <span class="col-auto px-0 mx-0 blue bold font-size-09">04.</span>
                            <div class="col px-0 ms-2 d-flex flex-column">
                                <span class="bold font-size-09">Список участников туристкой группы</span>
                                <span class="thin font-size-09 opacity-70">Tour group participants</span>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-2 mx-0 px-0">
                            <div class="col mx-0 px-0">
                                <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                                    <div class="col-12 ps-0">
                                        <span class="thin ">ФИО</span>
                                        <span class="thin opacity-70 ms-2">name</span>
                                    </div>
                                    <input type="text" name="group-participant-name" v-model="memberForm.full_name"
                                           class="col-12 px-2rem py-4 rounded border-0 ">
                                </div>
                                <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                                    <div class="col-12 ps-0">
                                        <span class="thin ">дата рождения</span>
                                        <span class="thin opacity-70 ms-2">date of birth</span>
                                    </div>
                                    <input type="date" name="group-participant-birthdate"
                                           v-model="memberForm.date_of_birth"
                                           class="col-12 col-md-6 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
                                </div>
                                <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                                    <div class="col-12 ps-0">
                                        <span class="thin ">адрес места жительства</span>
                                        <span class="thin opacity-70 ms-2">home address</span>
                                    </div>
                                    <input type="text" name="group-participant-home-address"
                                           v-model="memberForm.home_address"
                                           class="col-12 px-2rem py-4 rounded border-0 ">
                                </div>
                                <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                                    <div class="col-12 ps-0">
                                        <span class="thin ">контактный телефон</span>
                                        <span class="thin opacity-70 ms-2">phone number</span>
                                    </div>
                                    <input type="text" name="group-participant-phone" v-mask="'+7(###)###-##-##'"
                                           v-model="memberForm.phone_number"
                                           class="col-12 col-md-8 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
                                </div>
                                <button @click="addGroupMember()" type="button"
                                        class="big-button bold bg-blue col-12 col-md-auto mt-3 px-5 rounded font-size-09">
                                    Добавить
                                    /
                                    add
                                </button>
                            </div>
                            <div class="col mx-0 mt-4 px-0 ps-md-4 member-list"
                                 v-if="groupForm.tour_group_members.length>0">
                                <div class="participant-card row mx-0 mt-3 p-3 rounded align-items-start"
                                     v-for="(item, index) in groupForm.tour_group_members">
                                    <div class="col d-flex flex-column justify-content-md-between">
                                        <span class="bold">{{ item.full_name || 'Не добавлено' }}</span>
                                        <span class="thin">{{ item.date_of_birth || 'Не добавлено' }}</span>
                                        <span class="thin">{{ item.home_address || 'Не добавлено' }}</span>
                                        <span class="thin">{{ item.phone_number || 'Не добавлено' }}</span>
                                    </div>
                                    <button type="button" @click="removeGroupMember(index)"
                                            class="col-12 col-md-auto mt-2 mt-md-0 ms-md-4 text-start">
                                        <span class="position-relative red red-underline">Удалить</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col mx-0 mt-4 px-0 ps-md-4" v-else>

                                <div class="alert alert-success mt-3" role="alert">
                                    Добавьте участников группы
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 row px-0 mx-0 mb-5">
                        <div class="col-12 row px-0 mx-0">
                            <span class="col-auto px-0 mx-0 blue bold font-size-09">05.</span>
                            <div class="col px-0 ms-2 d-flex flex-column">
                                <span class="bold font-size-09">Численность группы (вместе с руководителем)</span>
                                <span class="thin font-size-09 opacity-70">Group size (inc. tour group leader)</span>
                            </div>
                        </div>
                        <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                            <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                                <span class="thin ">Общее количество</span>
                                <span class="thin opacity-70">Total number</span>
                            </div>
                            <div class="col-12 col-md-9 mt-2 px-0 d-flex justify-content-between">
                                <input type="number"  name="group-number-total"
                                       v-model="groupForm.group_info.members_count"
                                       min="0" step="1" class="w-100 mt-2 mt-md-0 px-2rem py-4 rounded border-0 "
                                       required>
                            </div>
                        </div>
                        <div class="col-12 row mx-0 mt-3 px-0 align-items-start">
                            <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                                <span class="thin ">Из них дети (с указанием возраста)</span>
                                <span class="thin opacity-70">Number of children (age)</span>
                            </div>
                            <div class="col-12 col-md-9 mt-2 px-0 d-flex flex-wrap">
                                <div class="row w-100 mt-2">
                                    <div class="col-md-4 col-12 d-none d-sm-block">
                                        <p>Возраст</p>
                                    </div>
                                    <div class="col-md-6 col-12 d-none d-sm-block">
                                        <p>Колличество</p>
                                    </div>
                                    <div class="col-md-2 col-12 text-center d-none d-sm-block">
                                        <p>Действие</p>
                                    </div>
                                </div>

                                <div class="row w-100 mt-2" v-for="(item, index) in groupForm.group_info.children">
                                    <div class="col-md-4 col-12">
                                        <p class="d-block d-sm-none">Возраст</p>
                                        <input type="number" min="0" name="group-number-children"
                                               v-model="groupForm.group_info.children[index].age"
                                               class="col-3 px-2rem py-4 rounded border-0 w-100" required>


                                    </div>
                                    <div class="col-md-6 col-12">
                                        <p class="d-block d-sm-none">Колличество</p>
                                        <input type="number" min="0" name="group-children-age"
                                               v-model="groupForm.group_info.children[index].count"
                                               class="col  px-2rem py-4 rounded border-0 w-100" required>
                                    </div>
                                    <div class="col-md-2 col-12 d-flex justify-content-center align-items-center">

                                        <button @click="removeChildren(index)" type="button"
                                                class="btn btn-danger mt-2 w-100">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </div>
                                </div>


                            </div>
                            <button @click="addChildren()" type="button"
                                    class="big-button bold bg-blue col-12 col-md-auto mt-3 px-5 rounded font-size-09">
                                Добавить
                                /
                                add
                            </button>
                        </div>
                        <div class="col-12 row mx-0 mt-3 px-0 align-items-start">
                            <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                                <span class="thin ">Из них иностранные граждане (с указанием страны)</span>
                                <span class="thin opacity-70">Number of foriegn citizens (country)</span>
                            </div>

                            <div class="col-12 col-md-9 mt-2 px-0 d-flex justify-content-between flex-wrap">

                                <div class="row w-100 mt-2">
                                    <div class="col-md-4 col-12">
                                        <p>Колличество</p>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <p>Страна</p>
                                    </div>
                                    <div class="col-md-2 col-12 text-center">
                                        <p>Действие</p>
                                    </div>
                                </div>


                                <div class="row w-100 mt-2"
                                     v-for="(item, index) in groupForm.group_info.foreign_citizens">
                                    <div class="col-md-4 col-12">

                                        <input type="number" min="0" name="group-number-foreign-citizens"
                                               v-model="groupForm.group_info.foreign_citizens[index].count"
                                               class="col-3 px-2rem py-4 rounded border-0 w-100" required>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <input type="text" name="group-foreign-citizens-countries"
                                               v-model="groupForm.group_info.foreign_citizens[index].country"
                                               class="col ms-2 ms-md-3 px-2rem py-4 rounded border-0 w-100" required>
                                    </div>
                                    <div class="col-md-2 col-12 d-flex justify-content-center align-items-center">
                                        <button @click="removeForeignCitizen(index)" type="button"
                                                class="btn btn-danger">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </div>
                                </div>


                            </div>
                            <button @click="addForeignCitizen()" type="button"
                                    class="big-button bold bg-blue col-12 col-md-auto mt-3 px-5 rounded font-size-09">
                                Добавить
                                /
                                add
                            </button>
                        </div>
                    </div>
                    <div class="col-12 row px-0 mx-0 mb-5">
                        <div class="col-12 row px-0 mx-0">
                            <span class="col-auto px-0 mx-0 blue bold font-size-09">06.</span>
                            <div class="col px-0 ms-2 d-flex flex-column">
                                <span class="bold font-size-09">Информация о маршруте передвижения</span>
                                <span class="thin font-size-09 opacity-70">Route information</span>
                            </div>
                        </div>
                        <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                            <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                                <span class="thin ">Место начала маршрута</span>
                                <span class="thin opacity-70">Start point</span>
                            </div>
                            <input type="text" name="group-route-start" v-model="groupForm.route_info.start_point"
                                   class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 " required>
                        </div>
                        <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                            <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                                <span class="thin ">Место окончания маршрута</span>
                                <span class="thin opacity-70">Final destination</span>
                            </div>
                            <input type="text" name="group-route-end" v-model="groupForm.route_info.final_point"
                                   class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 " required>
                        </div>
                        <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                            <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                                <span class="thin ">Протяженность маршрута</span>
                                <span class="thin opacity-70">Route distance</span>
                            </div>
                            <input type="number" min="0" name="group-route-distance"
                                   v-model="groupForm.route_info.route_distance"
                                   class="col-12 col-md-4 mt-2 mt-md-0 px-2rem py-4 rounded border-0 " required>
                        </div>
                        <div class="col-12 row mx-0 mt-3 px-0">
                            <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column ">
                                <span class="thin ">Сведения о субъектах РФ, по которым пролегает маршрут</span>
                                <span class="thin opacity-70">Areas of the Russian Federation on which the route
                                runs</span>
                            </div>
                            <div class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
                                <div class="row w-100 mt-2">
                                    <div class="col-md-10 col-12">
                                        <p>Локация</p>
                                    </div>

                                    <div class="col-md-2 col-12 text-center">
                                        <p>Действие</p>
                                    </div>
                                </div>

                                <div class="row w-100 mt-2"
                                     v-for="(item, index) in groupForm.route_info.federation_areas">
                                    <div class="col-md-10 col-12">
                                        <input type="text" name="group-route-subjects"
                                               v-model="groupForm.route_info.federation_areas[index]"
                                               class="col px-2rem py-4 rounded border-0 w-100" required
                                        >
                                    </div>

                                    <div class="col-md-2 col-12 d-flex justify-content-center align-items-center">
                                        <button @click="removeFederationAreas(index)" type="button"
                                                class="btn btn-danger">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <!-- make click -->
                            <button @click="addFederationAreas" type="button"
                                    class="big-button bold bg-blue col-12 col-md-auto mt-3 px-5 rounded font-size-09">
                                Добавить
                                /
                                add
                            </button>
                        </div>
                        <div class="col-12 row mx-0 mt-3 px-0 align-items-start">
                            <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                                <span class="thin ">Предполагаемые места ночлега и отдыха</span>
                                <span class="thin opacity-70">Lodging points</span>
                            </div>
                            <div class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
                                <div class="row w-100 mt-2">
                                    <div class="col-md-10 col-12">
                                        <p>Локация</p>
                                    </div>

                                    <div class="col-md-2 col-12 text-center">
                                        <p>Действие</p>
                                    </div>
                                </div>

                                <div class="row w-100 mt-2"
                                     v-for="(item, index) in groupForm.route_info.lodging_points">
                                    <div class="col-md-10 col-12">
                                        <input type="text" name="group-route-subjects"
                                               v-model="groupForm.route_info.lodging_points[index]"
                                               class="col px-2rem py-4 rounded border-0 w-100"
                                               required>
                                    </div>

                                    <div class="col-md-2 col-12 d-flex justify-content-center align-items-center">
                                        <button @click="removeLodgingPoints(index)" type="button"
                                                class="btn btn-danger">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- make click -->
                            <button @click="addLodgingPoints()" type="button"
                                    class="big-button bold bg-blue col-12 col-md-auto mt-3 px-5 rounded font-size-09">
                                Добавить
                                /
                                add
                            </button>
                        </div>
                        <div class="col-12 row mx-0 mt-3 px-0">
                            <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                            <span class="thin ">Маршруты аварийных выходов (для маршрутов, имеющих категории
                                сложности)</span>
                                <span class="thin opacity-70">Emergency exit routes (for routes with category of
                                difficulty)</span>
                            </div>

                            <div class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
                                <div class="row w-100 ">
                                    <div class="col-md-10 col-12">
                                        <p>Локация</p>
                                    </div>

                                    <div class="col-md-2 col-12 text-center">
                                        <p>Действие</p>
                                    </div>
                                </div>

                                <div class="row w-100 mt-2"
                                     v-for="(item, index) in groupForm.route_info.emergency_exit_routes">
                                    <div class="col-md-10 col-12">
                                        <input type="text" name="group-route-emergency-exit"

                                               v-model="groupForm.route_info.emergency_exit_routes[index]"
                                               class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 "
                                               required>
                                    </div>

                                    <div class="col-md-2 col-12 d-flex justify-content-center align-items-center">
                                        <button @click="removeEmergencyExitRoutes(index)" type="button"
                                                class="btn btn-danger">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- make click -->
                            <button @click="addEmergencyExitRoutes()" type="button"
                                    class="big-button bold bg-blue col-12 col-md-auto mt-3 px-5 rounded font-size-09">
                                Добавить
                                /
                                add
                            </button>
                        </div>
                        <div class="col-12 row mx-0 mt-3 px-0">
                            <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                            <span class="thin ">Наличие опасных участков на маршруте (речные пороги, водопады,
                                ледники,
                                переходы по льду и иные участки)</span>
                                <span class="thin opacity-70">Dangerous route sections (river rapids, waterfalls,
                                glaciers,
                                ice transitions and other)</span>
                            </div>

                            <div class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
                                <div class="row w-100 mt-2">
                                    <div class="col-md-10 col-12">
                                        <p>Локация</p>
                                    </div>

                                    <div class="col-md-2 col-12 text-center">
                                        <p>Действие</p>
                                    </div>
                                </div>

                                <div class="row w-100 mt-2"
                                     v-for="(item, index) in groupForm.route_info.dangerous_route_sections">
                                    <div class="col-md-10 col-12">
                                        <input type="text" name="group-route-emergency-exit"

                                               v-model="groupForm.route_info.dangerous_route_sections[index]"
                                               class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 "
                                               required>
                                    </div>

                                    <div class="col-md-2 col-12 d-flex justify-content-center align-items-center">
                                        <button @click="removeDangerousRouteSection(index)" type="button"
                                                class="btn btn-danger">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>


                            <!-- make click -->
                            <button @click="addDangerousRouteSection()" type="button"
                                    class="big-button bold bg-blue col-12 col-md-auto mt-3 px-5 rounded font-size-09">
                                Добавить
                                /
                                add
                            </button>
                        </div>
                        <div class="col-12 row mx-0 mt-3 px-0">
                            <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                            <span class="thin ">Категория сложности, способ передвижения, применяемые средства
                                передвижения</span>
                                <span class="thin opacity-70">Category of difficulty, means of travel</span>
                            </div>
                            <div class="col-12 col-md-9 mt-2 mt-md-0 px-0">
                                <!-- v-for="(item, index) in groupForm.route_info.???" -->
                                <p class="mt-2 mb-2">Категория сложности</p>
                                <input type="number" min="0" name="group-route-category"
                                       id="group-route-category"
                                       v-model="groupForm.route_info.difficulty_category"
                                       class="col-12 mt-2 mt-md-0 px-2rem py-4 rounded border-0 " required>

                                <p class="mt-2 ">Способ передвижения</p>
                                <input type="text" name="group-informing-date-and-method"
                                       v-model="groupForm.route_info.travel_type"
                                       id="group-route-category-travel-type"
                                       class="col-12 mt-2 px-2rem py-4 rounded border-0 " required>
                                <!-- v-for="(item, index) in groupForm.route_info.???" -->

                                <p class="mt-2">Средства передвижения</p>
                                <input type="text" name="group-informing-date-and-method"
                                       v-model="groupForm.route_info.type_of_transport"
                                       class="col-12 mt-2 px-2rem py-4 rounded border-0 " required>
                                <!-- v-for="(item, index) in groupForm.route_info.???" -->
                            </div>

                        </div>
                    </div>
                    <div class="col-12 row px-0 mx-0 mb-5 align-items-center">
                        <div class="col-12 col-md-3 row ps-0 pe-4 mx-0">
                            <span class="col-auto px-0 mx-0 blue bold font-size-09">07.</span>
                            <div class="col px-0 ms-2 d-flex flex-column">
                                <span class="bold font-size-09">Дата выхода на маршрут</span>
                                <span class="thin font-size-09 opacity-70">Start date</span>
                            </div>
                        </div>
                        <input type="date" name="group-start-date" v-model="groupForm.start_date"
                               class="col-12 col-md-3 mt-2 mt-md-0 px-2rem py-4 rounded border-0 " required>
                    </div>
                    <div class="col-12 row px-0 mx-0 mb-5">
                        <div class="col-12 col-md-3 row ps-0 pe-4 mx-0">
                            <span class="col-auto px-0 mx-0 blue bold font-size-09">08.</span>
                            <div class="col px-0 ms-2 d-flex flex-column">
                            <span class="bold font-size-09">Дата возвращения с маршрута / Резервная дата возвращения
                                с
                                маршрута</span>
                                <span class="thin font-size-09 opacity-70">Return date / reserve return date</span>
                            </div>
                        </div>
                        <input type="date" name="group-return-date" v-model="groupForm.return_date"
                               class="col-12 col-md-3 mt-2 mt-md-0 px-2rem py-4 rounded border-0 " required>
                    </div>
                    <div class="col-12 row px-0 mx-0 mb-5">
                        <div class="col-12 col-md-3 row ps-0 pe-4 mx-0">
                            <span class="col-auto px-0 mx-0 blue bold font-size-09">09.</span>
                            <div class="col px-0 ms-2 d-flex flex-column">
                            <span class="bold font-size-09">Срок и способ информирования территориального органа МЧС
                                России об окончании маршрута</span>
                                <span class="thin font-size-09 opacity-70">Date and method of informing Ministry of
                                emergencies regional department about the end of the route</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
                            <div class="row">
                                <div class="col-4">
                                    <input type="date" name="group-informing-date-and-method"
                                           v-model="groupForm.date_and_method_informing_on_finish.date"
                                           class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 w-100"
                                           required>

                                </div>
                                <div class="col-8">
                                    <input type="text" name="group-informing-date-and-method"
                                           v-model="groupForm.date_and_method_informing_on_finish.method"
                                           class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 w-100"
                                           required>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-12 row px-0 mx-0 mb-5">
                        <div class="col-12 col-md-3 row ps-0 pe-4 mx-0">
                            <span class="col-auto px-0 mx-0 blue bold font-size-09">10.</span>
                            <div class="col px-0 ms-2 d-flex flex-column">
                            <span class="bold font-size-09">Дата/время и способы организации сеансов связи на
                                маршруте
                                передвижения</span>
                                <span class="thin font-size-09 opacity-70">Date and method of informing Ministry of
                                emergencies regional department about the end of the route</span>
                            </div>
                        </div>

                        <div class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
                            <div class="row">
                                <div class="col-4">
                                    <p>Дата</p>
                                </div>
                                <div class="col-8">
                                    <p>Способ</p>
                                </div>
                            </div>

                            <div class="row mt-2"
                                 v-for="(item, index) in groupForm.date_and_method_communication_sessions">
                                <div class="col-md-4 col-12">
                                    <input type="date" name="group-informing-date-and-method"
                                           v-model="groupForm.date_and_method_communication_sessions[index].date"
                                           class="col-12 px-2rem py-4 rounded border-0 w-100" required>
                                </div>
                                <div class="col-md-6 col-12">
                                    <input type="text" name="group-informing-date-and-method"
                                           v-model="groupForm.date_and_method_communication_sessions[index].method"
                                           class="col-12 px-2rem py-4 rounded border-0 w-100" required>
                                </div>
                                <div class="col-md-2 col-12 d-flex justify-content-center align-items-center">
                                    <button @click="removeCommunicationSession(index)" type="button"
                                            class="btn btn-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- make click -->
                        <button @click="addCommunicationSession()" type="button"
                                class="big-button bold bg-blue col-12 col-md-auto mt-3 px-5 rounded font-size-09">
                            Добавить
                            /
                            add
                        </button>
                    </div>
                    <div class="col-12 row px-0 mx-0 mb-5">
                        <div class="col-12 row px-0 mx-0">
                            <span class="col-auto px-0 mx-0 blue bold font-size-09">11.</span>
                            <div class="col px-0 ms-2 d-flex flex-column">
                                <span class="bold font-size-09">Наличие средств связи на маршруте</span>
                                <span class="thin font-size-09 opacity-70">Communications means</span>
                            </div>
                        </div>
                        <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                            <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                                <span class="thin">Мобильный телефон (с указанием нескольких абонентов)</span>
                                <span class="thin opacity-70">Mobile phone of several participants</span>
                            </div>

                            <div
                                v-if="groupForm.communications.mobile_phones.length>0"
                                class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
                                <div class="row">
                                    <div class="col-md-10 col-12">
                                        <p>Информация</p>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <p>Действие</p>
                                    </div>
                                </div>


                                <div class="row mt-2" v-for="(item, index) in groupForm.communications.mobile_phones">
                                    <div class="col-md-10 col-12">
                                        <input type="text" name="group-mobile-phones" v-mask="'+7(###)###-##-##'"

                                               v-model="groupForm.communications.mobile_phones[index]"
                                               class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 w-100"
                                               required>
                                    </div>
                                    <div class="col-md-2 col-12 d-flex justify-content-center align-items-center">
                                        <button @click="removeMobilPhone(index)" type="button"
                                                class="btn btn-danger">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>


                            <button @click="addMobilPhone()" type="button"
                                    class="big-button bold bg-blue col-12 col-md-auto mt-3 px-5 rounded font-size-09">
                                Добавить
                                /
                                add
                            </button>
                        </div>
                        <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                            <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                                <span class="thin ">Спутниковый телефон</span>
                                <span class="thin opacity-70">Satellite phone</span>
                            </div>

                            <div
                                v-if="groupForm.communications.satellite_phones.length>0"
                                class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
                                <div class="row">
                                    <div class="col-md-10 col-12">
                                        <p>Информация</p>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <p>Действие</p>
                                    </div>
                                </div>

                                <div class="row mt-2"
                                     v-for="(item, index) in groupForm.communications.satellite_phones">
                                    <div class="col-md-10 col-12">
                                        <input type="text" name="group-satellite-phone"
                                               v-model="groupForm.communications.satellite_phones[index]"
                                               class="col-12 col-md-4 px-2rem py-4 rounded border-0 w-100" required>
                                    </div>
                                    <div class="col-md-2 col-12 d-flex justify-content-center align-items-center">
                                        <button @click="removeSatellitePhone(index)" type="button"
                                                class="btn btn-danger">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>


                            <button @click="addSatellitePhone()" type="button"
                                    class="big-button bold bg-blue col-12 col-md-auto mt-3 px-5 rounded font-size-09">
                                Добавить
                                /
                                add
                            </button>
                        </div>
                        <div class="col-12 row mx-0 mt-3 px-0">
                            <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                                <span class="thin ">Радиостанция (с указанием частот)</span>
                                <span class="thin opacity-70">Radio station (with frequency indication)</span>
                            </div>

                            <div
                                v-if="groupForm.communications.radio_stations.length>0"
                                class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
                                <div class="row">
                                    <div class="col-md-10 col-12">
                                        <p>Информация</p>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <p>Действие</p>
                                    </div>
                                </div>


                                <div class="row mt-2" v-for="(item, index) in groupForm.communications.radio_stations">
                                    <div class="col-md-10 col-12">
                                        <input type="text" name="group-radio-station"
                                               v-for="(item, index) in groupForm.communications.radio_stations"
                                               v-model="groupForm.communications.radio_stations[index]"
                                               class="col-12 col-md-4 mt-2 mt-md-0 px-2rem py-4 rounded border-0 w-100"
                                               required>
                                    </div>
                                    <div class="col-md-2 col-12 d-flex justify-content-center align-items-center">
                                        <button @click="removeRadioStation(index)" type="button"
                                                class="btn btn-danger">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>


                            <button @click="addRadioStation()" type="button"
                                    class="big-button bold bg-blue col-12 col-md-auto mt-3 px-5 rounded font-size-09">
                                Добавить
                                /
                                add
                            </button>
                        </div>
                    </div>
                    <div class="col-12 row px-0 mx-0 mb-5">
                        <div class="col-12 col-md-3 row ps-0 pe-4 mx-0">
                            <span class="col-auto px-0 mx-0 blue bold font-size-09">12.</span>
                            <div class="col px-0 ms-2 d-flex flex-column">
                            <span class="bold font-size-09">Наличие заряженных запасных элементов питания к
                                средствам
                                связи, а также сигнальных средств</span>
                                <span class="thin font-size-09 opacity-70">Charged batteries for communication means and
                                signal means</span>
                            </div>
                        </div>

                        <div
                            v-if="groupForm.charge_batteries.length>0"
                            class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
                            <div class="row">
                                <div class="col-md-10 col-12">
                                    <p>Информация</p>
                                </div>
                                <div class="col-md-2 col-12">
                                    <p>Действие</p>
                                </div>
                            </div>

                            <div class="row mt-2" v-for="(item, index) in groupForm.charge_batteries">
                                <div class="col-md-10 col-12">
                                    <input type="text" name="group-batteries-and-signals"

                                           v-model="groupForm.charge_batteries[index]"
                                           class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 w-100"
                                           required>

                                </div>
                                <div class="col-md-2 col-12 d-flex justify-content-center align-items-center">
                                    <button @click="removeChargesBattery(index)" type="button"
                                            class="btn btn-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>
                            </div>

                        </div>

                        <button @click="addChargesBattery()" type="button"
                                class="big-button bold bg-blue col-12 col-md-auto mt-3 px-5 rounded font-size-09">
                            Добавить
                            /
                            add
                        </button>
                    </div>
                    <div class="col-12 row px-0 mx-0 mb-5">
                        <div class="col-12 col-md-3 row ps-0 pe-4 mx-0">
                            <span class="col-auto px-0 mx-0 blue bold font-size-09">13.</span>
                            <div class="col px-0 ms-2 d-flex flex-column">
                                <span class="bold font-size-09">Наличие средств оказания первой помощи</span>
                                <span class="thin font-size-09 opacity-70">First aid equipment</span>
                            </div>
                        </div>
                        <div
                            v-if="groupForm.first_aid_equipments.length>0"
                            class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
                            <div class="row">
                                <div class="col-md-10 col-12">
                                    <p>Информация</p>
                                </div>
                                <div class="col-md-2 col-12">
                                    <p>Действие</p>
                                </div>
                            </div>

                            <div class="row mt-2" v-for="(item, index) in groupForm.first_aid_equipments">
                                <div class="col-md-10 col-12">
                                    <input type="text" name="group-first-aid"
                                           v-model="groupForm.first_aid_equipments[index]"
                                           class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 w-100"
                                           required>
                                </div>
                                <div class="col-md-2 col-12 d-flex justify-content-center align-items-center">
                                    <button @click="removeFirstAidEquipments(index)" type="button"
                                            class="btn btn-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>
                            </div>
                        </div>


                        <button @click="addFirstAidEquipments()" type="button"
                                class="big-button bold bg-blue col-12 col-md-auto mt-3 px-5 rounded font-size-09">
                            Добавить
                            /
                            add
                        </button>
                    </div>
                    <div class="col-12 row px-0 mx-0 mb-5">
                        <div class="col-12 col-md-3 row ps-0 pe-4 mx-0">
                            <span class="col-auto px-0 mx-0 blue bold font-size-09">14.</span>
                            <div class="col px-0 ms-2 d-flex flex-column">
                                <span class="bold font-size-09">Наличие медицинских работников</span>
                                <span class="thin font-size-09 opacity-70">Medical professionals on the route</span>
                            </div>
                        </div>
                        <div
                            v-if="groupForm.medical_professionals.length>0"
                            class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
                            <div class="row">
                                <div class="col-md-10 col-12">
                                    <p>Информация</p>
                                </div>
                                <div class="col-md-2 col-12">
                                    <p>Действие</p>
                                </div>
                            </div>

                            <div class="row mt-2" v-for="(item, index) in groupForm.medical_professionals">
                                <div class="col-md-10 col-12">
                                    <input type="text" name="group-first-aid"
                                           v-model="groupForm.medical_professionals[index]"
                                           class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 w-100"
                                           required>
                                </div>
                                <div class="col-md-2 col-12 d-flex justify-content-center align-items-center">
                                    <button @click="removeMedicalProfessionals(index)" type="button"
                                            class="btn btn-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>
                            </div>
                        </div>


                        <button @click="addMedicalProfessionals()" type="button"
                                class="big-button bold bg-blue col-12 col-md-auto mt-3 px-5 rounded font-size-09">
                            Добавить
                            /
                            add
                        </button>
                    </div>
                    <div class="col-12 row px-0 mx-0 mb-5">
                        <div class="col-12 col-md-3 row ps-0 pe-4 mx-0">
                            <span class="col-auto px-0 mx-0 blue bold font-size-09">15.</span>
                            <div class="col px-0 ms-2 d-flex flex-column">
                            <span class="bold font-size-09">Наличие страхового полиса на маршруте (название
                                страхового
                                агенства, контактный телефон)</span>
                                <span class="thin font-size-09 opacity-70">Insurance (name of insurance agency, phone
                                number)</span>
                            </div>
                        </div>
                        <input type="text" name="group-insurance"
                               v-model="groupForm.insurance"
                               class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 " required>
                    </div>
                    <div class="col-12 row px-0 mx-0 mb-5">
                        <div class="col-12 col-md-3 row ps-0 pe-4 mx-0">
                            <span class="col-auto px-0 mx-0 blue bold font-size-09">16.</span>
                            <div class="col px-0 ms-2 d-flex flex-column">
                            <span class="bold font-size-09">Дополнительная информация, которую желает сообщить
                                ответственный испольнитель / турист</span>
                                <span class="thin font-size-09 opacity-70">Additional information</span>
                            </div>
                        </div>

                        <div class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 "
                             v-if="groupForm.additional_info.length>0"
                        >
                            <div class="row">
                                <div class="col-md-10 col-12"><p>Информация</p></div>
                                <div class="col-md-2 col-12"><p>Действие</p></div>
                            </div>

                            <div class="row mt-2" v-for="(item, index) in groupForm.additional_info">
                                <div class="col-md-10 col-12">
                                    <input type="text" name="group-insurance"
                                           v-model="groupForm.additional_info[index]"
                                           class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 w-100"
                                           required>
                                </div>
                                <div class="col-md-2 col-12 d-flex justify-content-center align-items-center">
                                    <button @click="removeCommunicationSession(index)" type="button"
                                            class="btn btn-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>
                            </div>
                        </div>


                        <button @click="addAdditionalInfo()" type="button"
                                class="big-button bold bg-blue col-12 col-md-auto mt-3 px-5 rounded font-size-09">
                            Добавить
                            /
                            add
                        </button>
                    </div>
                    <div class="col-12 px-0 mx-0 mb-3">
                        <div class="dt-check">
                            <div class="dt-check__input bg-white">
                                <input type="checkbox" name="type_person" v-model="groupForm.approve_info"/>
                                <div class="dt-check__input-check"></div>
                            </div>
                            <label class="dt-check__label">
                                <slot name="label">
                                    <p class="letter-spacing-1 thin">все данные введены мною верно</p>
                                </slot>
                            </label>
                        </div>
                    </div>
                    <div class="col-12 row mx-0 px-0 align-items-center mb-3">
                        <div class="dt-check px-0 col">
                            <div class="dt-check__input bg-white">
                                <input type="checkbox" name="type_person" v-model="groupForm.accept_rules"/>
                                <div class="dt-check__input-check"></div>
                            </div>
                            <label class="dt-check__label">
                                <slot name="label">
                                    <p class="letter-spacing-1 thin">
                                        Я соглашаюсь с
                                        <a href="#" class="text-decoration-underline thin">Условиями использования
                                            сайта</a>
                                        и даю
                                        согласие на обработку своих персональных данных в соотвествии с
                                        <a href="#" class="text-decoration-underline thin">Политикой обработки
                                            персональных
                                            данных.</a>
                                    </p>
                                </slot>
                            </label>
                        </div>
                        <button
                            type="submit"
                            :disabled="!groupForm.accept_rules||!groupForm.approve_info"
                            class="big-button bold bg-blue col-12 col-md-4 mt-5 mt-md-0 ms-0 ms-md-5 px-5 rounded font-size-09">
                            <span v-if="!load" class="text-white">Отправить заявку</span>
                            <div v-if="load" class="spinner-border text-white" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</template>
<script>
import Breadcrumbs from "@/components/Fragments/Breadcrumbs.vue";

const getInitialFormData = () => ({
    groupForm: {
        registration_date: null,
        start_date: null,
        return_date: null,
        company: {
            title: null,
            address: null,
            phone: null,
        },
        guide: {
            last_name: null,
            second_name: null,
            first_name: null,
            date_of_birth: null,
            home_address: null,
            home_phone: null,
            office_phone: null,
            mobile_phone: null,
            relative_contact_information: null,
        },
        tour_group_members: [],
        group_info: {
            members_count: 0,
            children: [
                {
                    count: 0,
                    age: 0,
                }
            ],
            foreign_citizens: [
                {
                    count: 0,
                    country: '',
                }
            ]
        },
        route_info: {
            start_point: null,
            final_point: null,
            route_distance: null,
            federation_areas: [""],
            lodging_points: [""],
            emergency_exit_routes: [""],
            dangerous_route_sections: [""],
            difficulty_category: '1',
            travel_type: 'Пешая',
            type_of_transport: 'Пешком'
        },
        date_and_method_informing_on_finish: {
            date: null,
            method: null
        },
        date_and_method_communication_sessions: [
            {
                date: null,
                method: null,
            }
        ],
        communications: {
            mobile_phones: [""],
            satellite_phones: [],
            radio_stations: [],
        },
        charge_batteries: [""],
        first_aid_equipments: [""],
        medical_professionals: [""],
        insurance: null,
        additional_info: [],
        approve_info: false,
        accept_rules: false,

    },
});

export default {
    components: {Breadcrumbs},
    data() {
        return {
            load:false,
            memberForm: {
                full_name: null,
                date_of_birth: null,
                home_address: null,
                phone_number: null
            },
            groupForm: {
                registration_date: null,
                start_date: null,
                return_date: null,
                company: {
                    title: null,
                    address: null,
                    phone: null,
                },
                guide: {
                    last_name: null,
                    second_name: null,
                    first_name: null,
                    date_of_birth: null,
                    home_address: null,
                    home_phone: null,
                    office_phone: null,
                    mobile_phone: null,
                    relative_contact_information: null,
                },
                tour_group_members: [],
                group_info: {
                    members_count: 0,
                    children: [
                        {
                            count: 0,
                            age: 0,
                        }
                    ],
                    foreign_citizens: [
                        {
                            count: 0,
                            country: '',
                        }
                    ]
                },
                route_info: {
                    start_point: null,
                    final_point: null,
                    route_distance: null,
                    federation_areas: [""],
                    lodging_points: [""],
                    emergency_exit_routes: [""],
                    dangerous_route_sections: [""],
                    difficulty_category: '1',
                    travel_type: 'Пешая',
                    type_of_transport: 'Пешком'
                },
                date_and_method_informing_on_finish: {
                    date: null,
                    method: null
                },
                date_and_method_communication_sessions: [
                    {
                        date: null,
                        method: null,
                    }
                ],
                communications: {
                    mobile_phones: [""],
                    satellite_phones: [],
                    radio_stations: [],
                },
                charge_batteries: [""],
                first_aid_equipments: [""],
                medical_professionals: [""],
                insurance: null,
                additional_info: [],
                approve_info: false,
                accept_rules: false,

            },
            breadcrumbs: [
                {
                    text: "Главная",
                    href: "/",
                },
                {
                    text: "онлайн-заявка на регистрацию туристких групп",
                    active: true,
                }]
        }
    },

    methods: {
        submitForm() {
            this.load = true
            this.$store.dispatch("sendMCHSGroupForm", this.groupForm).then(() => {
                this.groupForm = getInitialFormData().groupForm
                this.load = false
                this.$notify({
                    title: "Кисловодск-Туризм",
                    text: "Форма регистрации группы в МЧС успешно отправлена. Менеджер свяжется с вами в течении суток.",
                    type: 'success'
                });
            }).catch(()=>{
                this.load = false
            })
        },
        removeMedicalProfessionals(index) {
            this.groupForm.medical_professionals.splice(index, 1)
        },
        removeFirstAidEquipments(index) {
            this.groupForm.first_aid_equipments.splice(index, 1)
        },
        removeAdditionalInfo(index) {
            this.groupForm.additional_info.splice(index, 1)
        },
        removeChargesBattery(index) {
            this.groupForm.charge_batteries.splice(index, 1)
        },
        removeMobilPhone(index) {
            this.groupForm.communications.mobile_phones.splice(index, 1)
        },
        removeSatellitePhone(index) {
            this.groupForm.communications.satellite_phones.splice(index, 1)
        },
        removeRadioStation(index) {
            this.groupForm.communications.radio_stations.splice(index, 1)
        },
        removeCommunicationSession(index) {
            this.groupForm.date_and_method_communication_sessions.splice(index, 1)
        },
        removeDangerousRouteSection(index) {
            this.groupForm.route_info.dangerous_route_sections.splice(index, 1)
        },

        removeEmergencyExitRoutes(index) {
            this.groupForm.route_info.emergency_exit_routes.splice(index, 1)
        },
        removeFederationAreas(index) {
            this.groupForm.route_info.federation_areas.splice(index, 1)
        },
        removeGroupMember(index) {
            this.groupForm.tour_group_members.splice(index, 1)
            this.groupForm.group_info.members_count = this.groupForm.tour_group_members.length + 1

            this.$notify({
                title: "Кисловодск-Туризм",
                text: "Участник группы удален",
                type: 'success'
            });
        },
        removeChildren(index) {
            this.groupForm.group_info.children.splice(index, 1)
        },

        removeForeignCitizen(index) {
            this.groupForm.group_info.foreign_citizens.splice(index, 1)
        },
        addCommunicationSession() {
            this.groupForm.date_and_method_communication_sessions.push({
                date: null,
                method: null
            })
        },
        addDangerousRouteSection(index) {
            this.groupForm.route_info.dangerous_route_sections.push("")
        },
        addEmergencyExitRoutes(index) {
            this.groupForm.route_info.emergency_exit_routes.push("")
        },
        addForeignCitizen() {
            this.groupForm.group_info.foreign_citizens.push({
                count: 0,
                country: null,
            })
        },
        removeLodgingPoints(index) {
            this.groupForm.route_info.lodging_points.splice(index, 1)
        },
        addLodgingPoints() {
            this.groupForm.route_info.lodging_points.push("")
        },
        addFederationAreas() {
            this.groupForm.route_info.federation_areas.push("")
        },
        addChildren() {
            this.groupForm.group_info.children.push({
                age: 0,
                count: 0,
            })
        },
        addChargesBattery() {
            this.groupForm.charge_batteries.push("")
        },
        addMobilPhone() {
            this.groupForm.communications.mobile_phones.push("")
        },
        addSatellitePhone() {
            this.groupForm.communications.satellite_phones.push("")
        },
        addRadioStation() {
            this.groupForm.communications.radio_stations.push("")
        },
        addMedicalProfessionals() {
            this.groupForm.medical_professionals.push("")
        },
        addFirstAidEquipments() {
            this.groupForm.first_aid_equipments.push("")
        },
        addAdditionalInfo() {
            this.groupForm.additional_info.push("")
        },
        addGroupMember() {

            if (this.memberForm.full_name === null ||
                this.memberForm.phone_number === null ||
                this.memberForm.date_of_birth === null ||
                this.memberForm.home_address === null
            ) {
                this.$notify({
                    title: "Кисловодск-Туризм",
                    text: "Все поля формы должны быть заполнены!",
                    type: 'warn'
                });
                return;
            }

            const json = JSON.parse(JSON.stringify(this.memberForm))
            this.groupForm.tour_group_members.push(json)
            this.memberForm.phone_number = null
            this.memberForm.full_name = null
            this.memberForm.date_of_birth = null
            this.memberForm.home_address = null

            this.groupForm.group_info.members_count = this.groupForm.tour_group_members.length + 1

            this.$notify({
                title: "Кисловодск-Туризм",
                text: "Добавлен новый участник группы",
                type: 'success'
            });

        }
    }
}
</script>
<style lang="scss">
img.icon-svg {
    width: 20px;
    height: 20px;
}

.member-list {
    height: 540px;
    overflow-y: auto;
}
</style>
