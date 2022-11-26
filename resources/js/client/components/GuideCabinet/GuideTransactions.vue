<template>
    <div id="transactions" class="col">
        <transaction-list :is-user-transactions="false" />
    </div>
</template>
<script>
import TransactionList from "@/components/Transactions/TransactionList.vue";
export default {
    components: {TransactionList}
}
</script>
