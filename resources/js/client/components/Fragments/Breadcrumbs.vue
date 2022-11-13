<template>
    <div class="dt-page__breadcrumbs">
        <nav style="--bs-breadcrumb-divider: '&gt;';" aria-label="breadcrumb" class="lh-1">
            <ol class="breadcrumb">
                <li class="breadcrumb-item d-flex align-items-center" v-for="(item, index) in items" :key="index"
                    :class="{ active: item[0] }" :disabled="item.active">
                    <a :href="item.href" class="breadcrumb-link letter-spacing-2">{{ item.text }}</a>
                </li>
            </ol>
        </nav>
    </div>
</template>
<script>
export default {
    props: {
        items: {
            type: Array,
            default: () => {
                return [];
            },
        },
    },
}
</script>
