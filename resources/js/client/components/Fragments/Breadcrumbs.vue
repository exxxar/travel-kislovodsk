<template>
    <div class="dt-page__breadcrumbs">
        <nav style="--bs-breadcrumb-divider: '❯';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item d-flex align-items-center" v-for="(item, index) in items" :key="index"
                    :class="{ active: item[0] }">
                    <a href="#"><h6>{{ item.text }}</h6></a>
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
