<template>
    <div id="transactions" class="col">
        <transaction-list/>
        <transaction-pagination/>
    </div>
</template>
<script>
import TransactionList from "@/components/Transactions/TransactionList.vue";
import TransactionPagination from "@/components/Transactions/TransactionPaginate.vue";
export default {
    components: {TransactionList, TransactionPagination},

}
</script>
