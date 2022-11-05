<template>
    <div class="personal-account__content">
        <h2 class="personal-account__title personal-account__title_black fw-bold">
            Мои транзакции
        </h2>
        <div class="personal-account-transactions__row">
            <div class="personal-account-transactions-check dt-check personal-account-check">
                <div class="personal-account-transactions-check__input dt-check__input">
                    <input type="radio" name="transactions_status">
                    <div class="dt-check__input-check"></div>
                </div>
                <label class="personal-account-transactions-check__label dt-check__label">
                    <slot name="label">
                        <h5>
                            все
                        </h5>
                    </slot>
                </label>
            </div>
            <div class="personal-account-transactions-check dt-check personal-account-check">
                <div class="personal-account-transactions-check__input dt-check__input">
                    <input type="radio" name="transactions_status">
                    <div class="dt-check__input-check"></div>
                </div>
                <label class="personal-account-transactions-check__label dt-check__label">
                    <slot name="label">
                        <h5>
                            в ожидании
                        </h5>
                    </slot>
                </label>
            </div>
            <div class="personal-account-transactions-check dt-check personal-account-check">
                <div class="personal-account-transactions-check__input dt-check__input">
                    <input type="radio" name="transactions_status">
                    <div class="dt-check__input-check"></div>
                </div>
                <label class="personal-account-transactions-check__label dt-check__label">
                    <slot name="label">
                        <h5>
                            отклоненные
                        </h5>
                    </slot>
                </label>
            </div>
            <div class="personal-account-transactions-check dt-check personal-account-check">
                <div class="personal-account-transactions-check__input dt-check__input">
                    <input type="radio" name="transactions_status">
                    <div class="dt-check__input-check"></div>
                </div>
                <label class="personal-account-transactions-check__label dt-check__label">
                    <slot name="label">
                        <h5>
                            оплаченные
                        </h5>
                    </slot>
                </label>
            </div>
        </div>
        <div class="personal-account-transactions">
            <div class="personal-account-transactions-card">
                <div class="personal-account-transactions-card-head">
                    <div class="personal-account-transactions-card-head__column">
                        <div class="personal-account-transactions-card-head__text">
                            № 365149/0
                        </div>
                        <div class="personal-account-transactions-card-head__text">
                                        <span class="personal-account-transactions-card-head__text_grey">
                                            сумма
                                        </span>
                            600 ₽
                        </div>
                    </div>
                    <div class="personal-account-transactions-card-head__status personal-account-transactions-card-head__status_blue">
                        в ожидании
                        <div class="personal-account-transactions-card-head__icon">
                            <svg class="personal-account-transactions-card-head__svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14" height="20" viewBox="0 0 14 20">
                                <image id="autorenew_FILL0_wght600_GRAD0_opsz48" width="14" height="20" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAUCAYAAAC9BQwsAAABXUlEQVQ4jZXTPWtVQRDG8Z83EmOlGATlGlSMYJ+QNlZpJUXEKlhZWAhiIVgIdqa0sdEvEEgacy0iFgGbSPwAKVS4iOILKIaAjaIMzCXrslfiUxz27M7/zOwzcw64+cUQjeAE3reOO8Mo3MNLTP4v+ADfsNGCa3AM1/AkgSi124IPFusprOJ0vn/6V0WdAnqBCdzHKUxnqWHORbyuMx7GCg7hEnp5tpSl19DZ+FhkvIozmalXBNzBTAV1s7LFAOfxO10s9Qsfqr0fadjlTqbu4/MwIwp9zTufjzuOZsb96mfER8a36eKRfYDH0o9+J5v9Md0tdbQBXs8WrsXjEWYTHigqeIVbxV605W4a9jjAXbypoBix0HJe4TbWc+9KMOXIldA5vMPzXEdc/H8L2ce/ZjV0EsdzPZ7nm3iKh9gZBNbgFubwDNu5/t6ytzX98fMGcAE3WlArYwnXc7on/AEsckS7DU5eAAAAAABJRU5ErkJggg=="/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="personal-account-transactions-card-body">
                    <div class="personal-account-transactions-card-body__text">
                                    <span class="personal-account-transactions-card-body__text_grey">
                                        оплата за
                                    </span>
                        <div class="personal-account-transactions-card-body__text_blue">
                            Некоторое название экскурсии
                        </div>
                    </div>
                    <a href="#" class="personal-account-input__link text-uppercase dt-travel-card__action">
                        <h6 class="dt-btn-text">подробнее о заказе</h6>
                    </a>
                </div>
            </div>
            <div class="personal-account-transactions-card">
                <div class="personal-account-transactions-card-head">
                    <div class="personal-account-transactions-card-head__column">
                        <div class="personal-account-transactions-card-head__text">
                            № 365149/0
                        </div>
                        <div class="personal-account-transactions-card-head__text">
                                        <span class="personal-account-transactions-card-head__text_grey">
                                            сумма
                                        </span>
                            600 ₽
                        </div>
                    </div>
                    <div class="personal-account-transactions-card-head__status personal-account-transactions-card-head__status_green">
                        оплачено
                        <div class="personal-account-transactions-card-head__icon">
                            <svg class="personal-account-transactions-card-head__svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="14" viewBox="0 0 18 14">
                                <image id="done_FILL0_wght600_GRAD0_opsz48" width="18" height="14" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAAOCAYAAAAi2ky3AAAAoklEQVQoka3SvwpBYRQA8B/dFAaewztIFhPlCWxeTNmMDBaLwWt4AJOUTfrKV7fbxedeZz2nX+dfY3mcqxEdZLhmNZEtuphUhSIyxh2D5h+QKU6/QmXIISQi1EarKhKhULDD5gP2EYnQECPM3mBfkQjtscCjBEtC8jtal2D9VMTrK+WwEKsXdkYvBSlCRSwZyY9WxMKYt1SkrKM8Fo5wSUHgCWEEMQufwN2RAAAAAElFTkSuQmCC"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="personal-account-transactions-card-body">
                    <div class="personal-account-transactions-card-body__text">
                                    <span class="personal-account-transactions-card-body__text_grey">
                                        оплата за
                                    </span>
                        <div class="personal-account-transactions-card-body__text_blue">
                            Некоторое название экскурсии
                        </div>
                    </div>
                    <a href="#" class="personal-account-input__link text-uppercase dt-travel-card__action">
                        <h6 class="dt-btn-text">подробнее о заказе</h6>
                    </a>
                </div>
            </div>
            <div class="personal-account-transactions-card">
                <div class="personal-account-transactions-card-head">
                    <div class="personal-account-transactions-card-head__column">
                        <div class="personal-account-transactions-card-head__text">
                            № 365149/0
                        </div>
                        <div class="personal-account-transactions-card-head__text">
                                        <span class="personal-account-transactions-card-head__text_grey">
                                            сумма
                                        </span>
                            600 ₽
                        </div>
                    </div>
                    <div class="personal-account-transactions-card-head__status personal-account-transactions-card-head__status_red">
                        отклонено
                        <div class="personal-account-transactions-card-head__icon">
                            <svg class="personal-account-transactions-card-head__svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14" height="14" viewBox="0 0 14 14">
                                <image id="close_FILL0_wght600_GRAD0_opsz48" width="14" height="14" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOCAYAAAAfSC3RAAAAiUlEQVQokZ3SwQ3AIAhA0V/Su9u0G7iBS9YNHKHb9NZjQ4KJMcKh3FSeQXB7zxOgAA14iCMBGahi6DKYApYsR3OL2OIGjgB3dFhuEysvB3hGmvuIHXp4iRTsw80dtwGzQjNcYVZIQ/gZM5zf5HZbAqTlud3u0OueOyqFbsujUSnUTQ95OP/75FA/NoM/a4yG+/wAAAAASUVORK5CYII="/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="personal-account-transactions-card-body">
                    <div class="personal-account-transactions-card-body__text">
                                    <span class="personal-account-transactions-card-body__text_grey">
                                        оплата за
                                    </span>
                        <div class="personal-account-transactions-card-body__text_blue">
                            Некоторое название экскурсии
                        </div>
                    </div>
                    <a href="#" class="personal-account-input__link text-uppercase dt-travel-card__action">
                        <h6 class="dt-btn-text">подробнее о заказе</h6>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Transactions"
}
</script>

<style scoped>

</style>
