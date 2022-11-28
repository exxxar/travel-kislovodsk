<template>
    <main class="container">
        <div class="main row d-flex justify-content-center">
            <div class="row col-11 col-md-10 col-lg-8 mx-0 px-0">
                <breadcrumbs :items="breadcrumbs" class="d-flex justify-content-center" />
                <h1 class="col-12 px-0 mb-5 bold fs-1 lh-sm">Онлайн-заявка на регистрацию<br />туристких групп</h1>
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
                <div class="col-12 row px-0 mx-0 mb-5">
                    <svg class="col-auto px-0 red" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 48 48" height="24"
                        width="24">
                        <path
                            d="M22.35 34.3h3.6V22h-3.6ZM24 18.7q.9 0 1.475-.575.575-.575.575-1.425 0-.95-.575-1.525T24 14.6q-.9 0-1.475.575-.575.575-.575 1.525 0 .85.575 1.425.575.575 1.475.575Zm0 26q-4.3 0-8.05-1.625-3.75-1.625-6.575-4.45t-4.45-6.575Q3.3 28.3 3.3 24q0-4.35 1.625-8.1T9.35 9.35q2.8-2.8 6.575-4.45Q19.7 3.25 24 3.25q4.35 0 8.125 1.65 3.775 1.65 6.55 4.425t4.425 6.55Q44.75 19.65 44.75 24q0 4.3-1.65 8.075-1.65 3.775-4.45 6.575-2.8 2.8-6.55 4.425T24 44.7Zm.05-3.95q6.95 0 11.825-4.9 4.875-4.9 4.875-11.9 0-6.95-4.875-11.825Q31 7.25 24 7.25q-6.95 0-11.85 4.875Q7.25 17 7.25 24q0 6.95 4.9 11.85 4.9 4.9 11.9 4.9ZM24 24Z" />
                    </svg>
                    <div class="col row px-0 mx-0 ms-2">
                        <span class="col-12 px-0 bold font-size-09">срок подачи заявления за 10 рабочих дней до даты
                            проведения мероприятия</span>
                        <span class="col-12 px-0 opacity-70 thin font-size-09">application deadline 10 working days
                            before the start of the route</span>
                    </div>
                </div>
                <div class="col-12 row px-0 mx-0 mb-5">
                    <img class="px-0 rounded img-250" v-lazy="'/img/3.png'" alt="">
                </div>
                <div class="col-12 row px-0 mx-0 mb-5">
                    <svg class="col-auto px-0 red" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 48 48" height="24"
                        width="24">
                        <path
                            d="M22.35 34.3h3.6V22h-3.6ZM24 18.7q.9 0 1.475-.575.575-.575.575-1.425 0-.95-.575-1.525T24 14.6q-.9 0-1.475.575-.575.575-.575 1.525 0 .85.575 1.425.575.575 1.475.575Zm0 26q-4.3 0-8.05-1.625-3.75-1.625-6.575-4.45t-4.45-6.575Q3.3 28.3 3.3 24q0-4.35 1.625-8.1T9.35 9.35q2.8-2.8 6.575-4.45Q19.7 3.25 24 3.25q4.35 0 8.125 1.65 3.775 1.65 6.55 4.425t4.425 6.55Q44.75 19.65 44.75 24q0 4.3-1.65 8.075-1.65 3.775-4.45 6.575-2.8 2.8-6.55 4.425T24 44.7Zm.05-3.95q6.95 0 11.825-4.9 4.875-4.9 4.875-11.9 0-6.95-4.875-11.825Q31 7.25 24 7.25q-6.95 0-11.85 4.875Q7.25 17 7.25 24q0 6.95 4.9 11.85 4.9 4.9 11.9 4.9ZM24 24Z" />
                    </svg>
                    <div class="col row px-0 mx-0 ms-2">
                        <p class="px-0">
                            <span class="px-0 bold font-size-09 red">Все поля обязательны к заполнению.</span>
                            <span class="px-0 thin font-size-09">В случае отсутствия информации по какому-либо из
                                пунктов, просим </span>
                            <span class="px-0 bold font-size-09">указывать прочерк или писать "не актуально".</span>
                        </p>
                    </div>
                </div>
                <div class="col-12 row px-0 mx-0 mb-5 align-items-center">
                    <div class="col-12 col-md-3 row ps-0 pe-4 mx-0">
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
                            class="col-12 col-md-2 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
                    </div>
                    <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                        <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                            <span class="thin ">Адрес проживания</span>
                            <span class="thin opacity-70">Home address</span>
                        </div>
                        <input type="text" name="group-leader-home-address" v-model="groupForm.guide.home_address"
                            class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
                    </div>
                    <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                        <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                            <span class="thin ">Домашний телефон</span>
                            <span class="thin opacity-70">Home phone</span>
                        </div>
                        <input type="text" name="group-leader-home-phone" v-mask="'+7(###)###-##-##'"
                            v-model="groupForm.guide.home_phone"
                            class="col-12 col-md-4 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
                    </div>
                    <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                        <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                            <span class="thin ">Рабочий телефон</span>
                            <span class="thin opacity-70">Office phone</span>
                        </div>
                        <input type="text" name="group-leader-office-phone" v-mask="'+7(###)###-##-##'"
                            v-model="groupForm.guide.office_phone"
                            class="col-12 col-md-4 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
                    </div>
                    <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                        <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                            <span class="thin ">Мобильный телефон</span>
                            <span class="thin opacity-70">Mobile phone</span>
                        </div>
                        <input type="text" name="group-leader-mobile-phone" v-mask="'+7(###)###-##-##'"
                            v-model="groupForm.guide.mobile_phone"
                            class="col-12 col-md-4 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
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
                            class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
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
                                <input type="date" name="group-participant-birthdate" v-model="memberForm.date_of_birth"
                                    class="col-12 col-md-6 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
                            </div>
                            <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                                <div class="col-12 ps-0">
                                    <span class="thin ">адрес места жительства</span>
                                    <span class="thin opacity-70 ms-2">home address</span>
                                </div>
                                <input type="text" name="group-participant-home-address"
                                    v-model="memberForm.home_address" class="col-12 px-2rem py-4 rounded border-0 ">
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
                        <div class="col mx-0 mt-4 px-0 ps-md-4">
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
                            <input type="number" name="group-number-total" v-model="groupForm.group_info.members_count"
                                min="0" step="1" class="col-3 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
                        </div>
                    </div>
                    <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                        <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                            <span class="thin ">Из них дети (с указанием возраста)</span>
                            <span class="thin opacity-70">Number of children (age)</span>
                        </div>
                        <div class="col-12 col-md-9 mt-2 px-0 d-flex"
                            v-for="(item, index) in groupForm.group_info.children">

                            <input type="number" name="group-number-children"
                                v-model="groupForm.group_info.children[index].age"
                                class="col-3 px-2rem py-4 rounded border-0 ">

                            <input type="number" name="group-children-age"
                                v-model="groupForm.group_info.children[index].count"
                                class="col ms-2 ms-md-3 px-2rem py-4 rounded border-0 ">

                        </div>
                        <button @click="addChildren()" type="button"
                            class="big-button bold bg-blue col-12 col-md-auto mt-3 px-5 rounded font-size-09">
                            Добавить
                            /
                            add
                        </button>
                    </div>
                    <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                        <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                            <span class="thin ">Из них иностранные граждане (с указанием страны)</span>
                            <span class="thin opacity-70">Number of foriegn citizens (country)</span>
                        </div>

                        <div class="col-12 col-md-9 mt-2 px-0 d-flex justify-content-between"
                            v-for="(item, index) in groupForm.group_info.foreign_citizens">

                            <input type="number" name="group-number-foreign-citizens"
                                v-model="groupForm.group_info.foreign_citizens[index].count"
                                class="col-3 px-2rem py-4 rounded border-0 ">

                            <input type="text" name="group-foreign-citizens-countries"
                                v-model="groupForm.group_info.foreign_citizens[index].country"
                                class="col ms-2 ms-md-3 px-2rem py-4 rounded border-0 ">

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
                            class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
                    </div>
                    <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                        <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                            <span class="thin ">Место окончания маршрута</span>
                            <span class="thin opacity-70">Final destination</span>
                        </div>
                        <input type="text" name="group-route-end" v-model="groupForm.route_info.final_point"
                            class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
                    </div>
                    <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                        <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                            <span class="thin ">Протяженность маршрута</span>
                            <span class="thin opacity-70">Route distance</span>
                        </div>
                        <input type="number" name="group-route-distance" v-model="groupForm.route_info.route_distance"
                            class="col-12 col-md-4 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
                    </div>
                    <div class="col-12 row mx-0 mt-3 px-0">
                        <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                            <span class="thin ">Сведения о субъектах РФ, по которым пролегает маршрут</span>
                            <span class="thin opacity-70">Areas of the Russian Federation on which the route
                                runs</span>
                        </div>
                        <input type="text" name="group-route-subjects"
                            v-for="(item, index) in groupForm.route_info.federation_areas"
                            v-model="groupForm.route_info.federation_areas[index]"
                            class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
                        <button @click="addAdditionalInfo()" type="button"
                            class="big-button bold bg-blue col-12 col-md-auto mt-3 px-5 rounded font-size-09">
                            Добавить
                            /
                            add
                        </button>
                    </div>
                    <div class="col-12 row mx-0 mt-3 px-0 align-items-center">
                        <div class="col-12 col-md-3 ps-0 pe-4 d-flex flex-column">
                            <span class="thin ">Предполагаемые места ночлега и отдыха</span>
                            <span class="thin opacity-70">Lodging points</span>
                        </div>
                        <input type="text" name="group-route-lodging-points"
                            v-for="(item, index) in groupForm.route_info.lodging_points"
                            v-model="groupForm.route_info.lodging_points[index]"
                            class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
                        <button @click="addAdditionalInfo()" type="button"
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
                        <input type="text" name="group-route-emergency-exit"
                            v-for="(item, index) in groupForm.route_info.emergency_exit_routes"
                            v-model="groupForm.route_info.emergency_exit_routes[index]"
                            class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
                        <button @click="addAdditionalInfo()" type="button"
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
                        <input type="text" name="group-route-dangerous-sections"
                            v-for="(item, index) in groupForm.route_info.dangerous_route_sections"
                            v-model="groupForm.route_info.dangerous_route_sections[index]"
                            class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
                        <button @click="addAdditionalInfo()" type="button"
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
                            <input type="number" name="group-route-category"
                                v-model="groupForm.route_info.difficulty_category"
                                class="col-12 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">

                            <input type="text" name="group-informing-date-and-method"
                                class="col-12 mt-2 px-2rem py-4 rounded border-0 ">
                            <!-- v-for="(item, index) in groupForm.route_info.???" -->

                            <input type="text" name="group-informing-date-and-method"
                                class="col-12 mt-2 px-2rem py-4 rounded border-0 ">
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
                        class="col-12 col-md-3 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
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
                        class="col-12 col-md-3 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
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
                    <input type="text" name="group-informing-date-and-method"
                        v-model="groupForm.date_and_method_informing_on_finish"
                        class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
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

                    <div class="col-12 col-md-9 mt-2 mt-md-0"
                        v-for="(item, index) in groupForm.date_and_method_communication_sessions">
                        <input type="date" name="group-informing-date-and-method"
                            v-model="groupForm.date_and_method_communication_sessions[index].date"
                            class="col-12 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">

                        <input type="text" name="group-informing-date-and-method"
                            v-model="groupForm.date_and_method_communication_sessions[index].method"
                            class="col-12 mt-2 px-2rem py-4 rounded border-0 ">
                    </div>

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
                        <input type="text" name="group-mobile-phones" v-mask="'+7(###)###-##-##'"
                            v-for="(item, index) in groupForm.communications.mobile_phones"
                            v-model="groupForm.communications.mobile_phones[index]"
                            class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">

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
                        <input type="text" name="group-satellite-phone"
                            v-for="(item, index) in groupForm.communications.satellite_phones"
                            v-model="groupForm.communications.satellite_phones[index]" v-mask="'+7(###)###-##-##'"
                            class="col-12 col-md-4 px-2rem py-4 rounded border-0 ">

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
                        <input type="text" name="group-radio-station"
                            v-for="(item, index) in groupForm.communications.radio_stations"
                            v-model="groupForm.communications.radio_stations[index]"
                            class="col-12 col-md-4 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">

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
                    <input type="text" name="group-batteries-and-signals"
                        v-for="(item, index) in groupForm.charge_batteries" v-model="groupForm.charge_batteries[index]"
                        class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">

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
                    <input type="text" name="group-first-aid" v-for="(item, index) in groupForm.first_aid_equipments"
                        v-model="groupForm.first_aid_equipments[index]"
                        class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">

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
                    <input type="text" name="group-first-aid" v-for="(item, index) in groupForm.medical_professionals"
                        v-model="groupForm.medical_professionals[index]"
                        class="col-f12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">

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
                        class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">
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
                    <input type="text" name="group-insurance" v-for="(item, index) in groupForm.additional_info"
                        v-model="groupForm.additional_info[index]"
                        class="col-12 col-md-9 mt-2 mt-md-0 px-2rem py-4 rounded border-0 ">

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
                            <input type="checkbox" name="type_person" v-model="groupForm.approve_info" />
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
                            <input type="checkbox" name="type_person" v-model="groupForm.accept_rules" />
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
                        class="big-button bold bg-blue col-12 col-md-4 mt-5 mt-md-0 ms-0 ms-md-5 px-5 rounded font-size-09">Отправить
                        заявку</button>
                </div>
            </div>
        </div>
    </main>
</template>
<script>
import Breadcrumbs from "@/components/Fragments/Breadcrumbs.vue";

export default {
    components: { Breadcrumbs },
    data() {
        return {
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
                tour_group_members: [
                    {
                        full_name: null,
                        date_of_birth: null,
                        home_address: null,
                        phone_number: null
                    }
                ],
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
                    federation_areas: [],
                    lodging_points: [],
                    emergency_exit_routes: [],
                    dangerous_route_sections: [],
                    difficulty_category: null,
                    travel_types: []
                },
                date_and_method_informing_on_finish: null,
                date_and_method_communication_sessions: [
                    {
                        date: null,
                        method: null,
                    }
                ],
                communications: {
                    mobile_phones: [],
                    satellite_phones: [],
                    radio_stations: [],
                },
                charge_batteries: [],
                first_aid_equipments: [],
                medical_professionals: [],
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
        removeGroupMember(index) {
            this.groupForm.tour_group_members.splice(index, 1)
        },

        addForeignCitizen() {

        },
        addChildren() {

        },
        addChargesBattery() {

        },
        addMobilPhone() {

        },
        addSatellitePhone() {

        },
        addRadioStation() {

        },
        addMedicalProfessionals() {

        },
        addFirstAidEquipments() {

        },
        addAdditionalInfo() {

        },
        addGroupMember() {
            let json = JSON.parse(JSON.stringify(this.memberForm))
            this.groupForm.tour_group_members.push(json)
            this.memberForm.phone_number = null
            this.memberForm.full_name = null
            this.memberForm.date_of_birth = null
            this.memberForm.home_address = null
        }
    }
}
</script>
