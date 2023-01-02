<template>
    <div class="dt-modal-body">
        <div class="dt-input__wrapper">
            <div class="d-flex align-items-center justify-content-between"><label
                class="dt-input__label">ваш телефон</label>
            </div>
            <div class="dt-input__group">
                <input type="text" name="phone"
                       v-mask="'+7(###)###-##-##'"
                       placeholder="+7(000)000-00-00"
                       class="dt-input" autocomplete="off">
                <div class="dt-input__group-item">
                    <div class="dt-input__icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn dt-btn dt-btn-blue w-100 mt-2">
            Выслать код для восстановления
        </button>

        <div class="dt-input__wrapper">
            <div class="d-flex align-items-center justify-content-between"><label
                class="dt-input__label">введите код из смс</label>
            </div>
            <div class="dt-input__group">
                <input type="text"
                       v-mask="'##-##-##'"
                       placeholder="XX-XX-XX"
                       name="sms" class="dt-input" autocomplete="off">

                <div class="dt-input__group-item">
                    <div class="dt-input__icon">
                        <i class="fa-solid fa-comment-sms"></i>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn dt-btn dt-btn-blue w-100 mt-2">
            Сменить пароль
        </button>
    </div>
</template>
