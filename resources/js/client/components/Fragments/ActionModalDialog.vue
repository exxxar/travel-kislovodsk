<template>
    <!-- Modal -->
    <div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <slot name="head"></slot>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <slot name="body"></slot>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary"
                            @click="decline"
                            data-bs-dismiss="modal">Отменить
                    </button>
                    <button type="button"
                            @click="accept"
                            data-bs-dismiss="modal"
                            class="btn btn-danger">Подтвердить
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    methods: {
        accept() {
            this.$notify({
                title: "Диалог подтвреждения",
                text: "Вы успешно подтвердили действие!",
                type: 'success'
            });

            this.$emit("accept")
        },
        decline() {
            this.$notify({
                title: "Диалог подтвреждения",
                text: "Вы отклонили данное действие!",
                type: 'success'
            });

            this.$emit("decline")
        }
    }
}
</script>
