<template>
    <transaction-list :is-user-transactions="true" />
</template>

<script>
import TransactionList from "@/components/Transactions/TransactionList.vue";

export default {
    name: "Transactions",
    components: {TransactionList}
}
</script>

<style scoped>

</style>
