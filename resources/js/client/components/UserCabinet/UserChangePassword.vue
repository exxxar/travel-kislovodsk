<template>
    <form class="personal-account__content">
        <h2 class="personal-account__title personal-account__title_black fw-bold">
            Смена пароля
        </h2>
        <div class="personal-account-changing-password">
            <div class="personal-account-changing-password-input__container">
                <div class="dt-input__wrapper">
                    <div class="d-flex align-items-center justify-content-between"><label
                        class="dt-input__label">новый пароль</label>
                    </div>
                    <div class="dt-input__group bg-white">
                        <input type="password" class="dt-input" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="personal-account-changing-password-input__container">
                <div class="dt-input__wrapper">
                    <div class="d-flex align-items-center justify-content-between"><label
                        class="dt-input__label">повторите новый пароль</label>
                    </div>
                    <div class="dt-input__group bg-white">
                        <input type="password" class="dt-input" autocomplete="off">
                    </div>
                </div>
            </div>
            <button type="submit" class="personal-account-changing-password__submit dt-btn dt-btn-blue personal-account__submit">
                Сохранить
            </button>
        </div>
    </form>
</template>

<script>
export default {
    name: "ChangingPassword"
}
</script>
