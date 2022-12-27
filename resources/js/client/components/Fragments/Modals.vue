<template>
    <div class="dt-modal modal fade" tabindex="-1" id="dtModalEntry" aria-hidden="true" data-bs-backdrop="static"
         data-bs-keyboard="false">
        <div class="dt-modal-entry">
            <div class="modal-dialog modal-fullscreen-sm-down mt-0" style="height: 100vh">
                <div class="modal-content dt-modal-content">
                    <div class="dt-modal-header">
                        <h1 class="dt-modal__title">Вход</h1>
                        <button type="button" class="dt-close-button" data-bs-dismiss="modal" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 48 48">
                                <path d="m12.45 38.35-2.8-2.8L21.2 24 9.65 12.45l2.8-2.8L24 21.2 35.55 9.65l2.8 2.8L26.8
                                      24l11.55 11.55-2.8 2.8L24 26.8Z"/>
                            </svg>
                        </button>

                    </div>
                    <div class="dt-modal-body">
                        <login-form-component/>
                    </div>
                    <div class="dt-modal-footer">
                        <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#dtModalRegistry"
                           class="text-uppercase dt-travel-card__action">
                            <h6 class="dt-btn-text">Регистрация</h6>
                        </a>
                        <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#dtModalRecovery-1"
                           class="text-uppercase dt-travel-card__action">
                            <h6 class="dt-btn-text">Забыли пароль?</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dt-modal modal fade" tabindex="-1" id="dtModalRegistry" aria-hidden="true" data-bs-backdrop="static"
         data-bs-keyboard="false">
        <div class="dt-modal-registry">
            <div class="modal-dialog modal-fullscreen-sm-down mt-0">
                <div class="modal-content dt-modal-content">
                    <div class="dt-modal-header">
                        <h1 class="dt-modal__title">Регистрация</h1>
                        <button type="button" class="dt-close-button" data-bs-dismiss="modal" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 48 48">
                                <path d="m12.45 38.35-2.8-2.8L21.2 24 9.65 12.45l2.8-2.8L24 21.2 35.55 9.65l2.8 2.8L26.8
                                      24l11.55 11.55-2.8 2.8L24 26.8Z"/>
                            </svg>
                        </button>

                    </div>
                    <div class="dt-modal-body">
                        <registration-form-component/>
                    </div>
                    <div class="dt-modal-footer">
                        <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#dtModalEntry"
                           class="text-uppercase dt-travel-card__action">
                            <h6 class="dt-btn-text">Вход</h6>
                        </a>
                        <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#dtModalRecovery-1"
                           class="text-uppercase dt-travel-card__action">
                            <h6 class="dt-btn-text">Забыли пароль?</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dt-modal modal fade" tabindex="-1" id="dtModalRecovery-1" aria-hidden="true" data-bs-backdrop="static"
         data-bs-keyboard="false">
        <div class="dt-modal-entry">
            <div class="modal-dialog modal-fullscreen-sm-down mt-0">
                <div class="modal-content dt-modal-content">
                    <div class="dt-modal-header dt-header__recovery">
                        <h1 class="dt-modal__title">Восстановление пароля</h1>
                        <button type="button" class="dt-close-button" data-bs-dismiss="modal" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 48 48">
                                <path d="m12.45 38.35-2.8-2.8L21.2 24 9.65 12.45l2.8-2.8L24 21.2 35.55 9.65l2.8 2.8L26.8
                                      24l11.55 11.55-2.8 2.8L24 26.8Z"/>
                            </svg>
                        </button>

                    </div>
                    <password-recovery-form-component/>
                    <div class="dt-modal-footer">
                        <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#dtModalEntry"
                           class="text-uppercase dt-travel-card__action">
                            <h6 class="dt-btn-text">Вход</h6>
                        </a>
                        <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#dtModalRegistry"
                           class="text-uppercase dt-travel-card__action">
                            <h6 class="dt-btn-text">Регистрация</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dt-modal modal fade" tabindex="-1" id="dtModalRecovery-2" aria-hidden="true" data-bs-backdrop="static"
         data-bs-keyboard="false">
        <div class="dt-modal-entry">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content dt-modal-content">
                    <div class="dt-modal-header dt-header__recovery">
                        <h1 class="dt-modal__title">Смена пароля</h1>
                        <button type="button" class="dt-close-button" data-bs-dismiss="modal" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 48 48">
                                <path d="m12.45 38.35-2.8-2.8L21.2 24 9.65 12.45l2.8-2.8L24 21.2 35.55 9.65l2.8 2.8L26.8
                                      24l11.55 11.55-2.8 2.8L24 26.8Z"/>
                            </svg>
                        </button>

                    </div>
                    <change-password-form-component/>
                    <div class="dt-modal-footer">
                        <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#dtModalEntry"
                           class="text-uppercase dt-travel-card__action">
                            <h6 class="dt-btn-text">Вход</h6>
                        </a>
                        <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#dtModalRegistry"
                           class="text-uppercase dt-travel-card__action">
                            <h6 class="dt-btn-text">Регистрация</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dt-modal modal fade" tabindex="-1" id="dtModalRecovery-3" aria-hidden="true" data-bs-backdrop="static"
         data-bs-keyboard="false">
        <div class="dt-modal-entry">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content dt-modal-content">
                    <div class="dt-modal-header dt-header__recovery">
                        <h1 class="dt-modal__title">Смена пароля</h1>
                        <button type="button" class="dt-close-button" data-bs-dismiss="modal" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 48 48">
                                <path d="m12.45 38.35-2.8-2.8L21.2 24 9.65 12.45l2.8-2.8L24 21.2 35.55 9.65l2.8 2.8L26.8
                                      24l11.55 11.55-2.8 2.8L24 26.8Z"/>
                            </svg>
                        </button>

                    </div>
                    <change-password-form-component/>
                    <div class="dt-modal-footer">
                        <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#dtModalEntry"
                           class="text-uppercase dt-travel-card__action">
                            <h6 class="dt-btn-text">Вход</h6>
                        </a>
                        <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#dtModalRegistry"
                           class="text-uppercase dt-travel-card__action">
                            <h6 class="dt-btn-text">Регистрация</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
