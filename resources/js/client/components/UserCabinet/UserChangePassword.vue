<template>
    <form class="personal-account__content">
        <h2 class="personal-account__title personal-account__title_black fw-bold">
            Смена пароля
        </h2>
        <div class="personal-account-changing-password">
            <div class="personal-account-changing-password-input__container">
                <label class="personal-account-input__label">
                    новый пароль
                </label>
                <div class="dt-input__group personal-account-input__group">
                    <input type="text" name="name" class="dt-input" autocomplete="off">
                </div>
            </div>
            <div class="personal-account-changing-password-input__container">
                <label class="personal-account-input__label">
                    повторите новый пароль
                </label>
                <div class="dt-input__group personal-account-input__group">
                    <input type="text" name="name" class="dt-input" autocomplete="off">
                </div>
            </div>
            <button type="submit" class="personal-account-changing-password__submit dt-btn-blue personal-account__submit">
                <span>Сохранить</span>
            </button>
        </div>
    </form>
</template>

<script>
export default {
    name: "ChangingPassword"
}
</script>
