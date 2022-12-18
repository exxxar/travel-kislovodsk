<template>
    <!-- Modal User List -->
    <div class="modal fade" id="chat-action-users-list-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Список пользователей</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <chat-action-users-list/>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Tours List -->
    <div class="modal fade" id="chat-action-tours-list-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Список пользователей</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1>Тут будет список туров</h1>
                </div>

            </div>
        </div>
    </div>


    <!-- Modal Transactions List -->
    <div class="modal fade" id="chat-action-transactions-list-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Список транзакций</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <chat-action-transactions-list/>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal File Upload-->
    <div class="modal fade" id="chat-action-file-upload-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавление файлов в чат</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <chat-action-file-upload/>
                </div>

            </div>
        </div>
    </div>

</template>

<script>
import ChatActionUsersList from '@/components/Messages/Actions/ChatActionUsersList.vue'
import ChatActionTransactionsList from '@/components/Messages/Actions/ChatActionTransactionsList.vue'
import ChatActionToursList from '@/components/Messages/Actions/ChatActionToursList.vue'
import ChatActionFileUpload from '@/components/Messages/Actions/ChatActionFileUpload.vue'


export default {
    components:{
        ChatActionUsersList,ChatActionTransactionsList, ChatActionToursList, ChatActionFileUpload
    }
}
</script>
