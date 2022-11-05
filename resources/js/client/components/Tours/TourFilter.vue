<template>
    <div class="col-lg-3 dt-filters-by d-lg-block d-none">
        <div class="dt-filters-by__item">
            <div class="dt-check">
                <div class="dt-check__input">
                    <input type="checkbox" name="hot_excursion">
                    <div class="dt-check__input-check"></div>
                </div>
                <label class="dt-check__label fw-bold d-flex">
                    <slot name="label">
                        <p>горящие экскурсии</p>
                        <div class="dt-icon" style="width: 12px">
                        </div>
                    </slot>
                </label>
            </div>
        </div>
        <div class="dt-filters-by__item">
            <div class="dt-check__group">
                <label class="dt-check__group-title">стоимость, руб: </label>
                <div class="dt-check">
                    <div class="dt-check__input">
                        <input type="radio" name="price"/>
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__lapel">
                        <slot name="label">
                            <p>до 700 рублей</p>
                        </slot>
                    </label>
                </div>
                <div class="dt-check">
                    <div class="dt-check__input">
                        <input type="radio" name="price"/>
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__label">
                        <slot name="label">
                            <p>от 700 до 2500 рублей</p>
                        </slot>
                    </label>
                </div>
                <div class="dt-check">
                    <div class="dt-check__input">
                        <input type="radio" name="price"/>
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__label">
                        <slot name="label">
                            <p>более 2500 рублей</p>
                        </slot>
                    </label>
                </div>
                <div class="dt-check">
                    <div class="dt-check__input">
                        <input type="radio" name="price" value="true"/>
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__label">
                        <slot name="label">
                            <p>индивидуально</p>
                        </slot>
                    </label>
                </div>
            </div>
        </div>
        <div class="dt-filters-by__item">
            <div class="dt-check__group">
                <label class="dt-check__group-title">передвижение: </label>
                <div class="dt-check">
                    <div class="dt-check__input">
                        <input type="checkbox" name="type_person"/>
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__label">
                        <slot name="label">
                            <p>пешая</p>
                        </slot>
                    </label>
                </div>
                <div class="dt-check">
                    <div class="dt-check__input">
                        <input type="checkbox" name="type_person"/>
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__label">
                        <slot name="label">
                            <p>автобусная</p>
                        </slot>
                    </label>
                </div>
                <div class="dt-check">
                    <div class="dt-check__input">
                        <input type="checkbox" name="type_person"/>
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__label">
                        <slot name="label">
                            <p>комбинированная</p>
                        </slot>
                    </label>
                </div>
            </div>
        </div>
        <div class="dt-filters-by__item">
            <div class="dt-check__group">
                <label class="dt-check__group-title">длительность: </label>
                <div class="dt-check">
                    <div class="dt-check__input">
                        <input type="checkbox" name="type_person"/>
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__label">
                        <slot name="label">
                            <p>один-два часа</p>
                        </slot>
                    </label>
                </div>
                <div class="dt-check">
                    <div class="dt-check__input">
                        <input type="checkbox" name="type_person"/>
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__label">
                        <slot name="label">
                            <p>несколько часов</p>
                        </slot>
                    </label>
                </div>
                <div class="dt-check">
                    <div class="dt-check__input">
                        <input type="checkbox" name="type_person"/>
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__label">
                        <slot name="label">
                            <p>день</p>
                        </slot>
                    </label>
                </div>
                <div class="dt-check">
                    <div class="dt-check__input">
                        <input type="checkbox" name="type_person"/>
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__label">
                        <slot name="label">
                            <p>несколько дней</p>
                        </slot>
                    </label>
                </div>
            </div>
        </div>
        <div class="dt-filters-by__item">
            <div class="dt-check__group">
                <label class="dt-check__group-title">тип оплаты: </label>
                <div class="dt-check">
                    <div class="dt-check__input">
                        <input type="checkbox" name="type_person"/>
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__label">
                        <slot name="label">
                            <p>предоплата на сайте</p>
                        </slot>
                    </label>
                </div>
                <div class="dt-check">
                    <div class="dt-check__input">
                        <input type="checkbox" name="type_person"/>
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__label">
                        <slot name="label">
                            <p>полная оплата онлайн</p>
                        </slot>
                    </label>
                </div>
                <div class="dt-check">
                    <div class="dt-check__input">
                        <input type="checkbox" name="type_person"/>
                        <div class="dt-check__input-check"></div>
                    </div>
                    <label class="dt-check__label">
                        <slot name="label">
                            <p>без предоплаты</p>
                        </slot>
                    </label>
                </div>
            </div>
        </div>
        <div class="dt-filters-by__item">
            <div class="text-center">
                <h6 class="text-uppercase dt-btn-text-red">Сбросить фильтры</h6>
            </div>
        </div>
    </div>
</template>
