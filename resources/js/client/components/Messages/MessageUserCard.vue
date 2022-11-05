<template>
    <div v-for="user in users" class="messages-head__message row mx-0 px-4 align-items-center"
         :class="{'unread': user.unread}">
        <div class="icon-wrap col-auto px-0 mx-0">
            <div class="round-icon rounded-3 d-flex align-items-center justify-content-center bg-light">
                <img class="rounded-3 round-icon" :class="{'hide': !user.img}" :src="user.img" alt="">
                <svg v-if="!user.img" class="black opacity-15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                     height="23" width="23">
                    <path
                        d="M17.8 28.9q-1.15 0-1.95-.8t-.8-1.95q0-1.2.8-1.975.8-.775 1.95-.775 1.2 0 1.975.8.775.8.775 1.95 0 1.2-.8 1.975-.8.775-1.95.775Zm12.45 0q-1.2 0-1.975-.8-.775-.8-.775-1.95 0-1.2.8-1.975.8-.775 1.95-.775t1.95.8q.8.8.8 1.95 0 1.2-.8 1.975-.8.775-1.95.775ZM24 40.75q7 0 11.875-4.875T40.75 24q0-1.3-.2-2.5t-.5-2.25q-1 .3-2.125.375-1.125.075-2.375.075-4.8 0-9.05-1.95-4.25-1.95-7.3-5.6-1.65 3.95-4.775 6.925Q11.3 22.05 7.3 23.7v.35q0 7 4.85 11.85T24 40.75Zm0 3.95q-4.25 0-8.025-1.625-3.775-1.625-6.6-4.425-2.825-2.8-4.45-6.575Q3.3 28.3 3.3 24q0-4.3 1.625-8.075Q6.55 12.15 9.375 9.35q2.825-2.8 6.6-4.45 3.775-1.65 8.075-1.65 4.3 0 8.05 1.65 3.75 1.65 6.55 4.45 2.8 2.8 4.45 6.575Q44.75 19.7 44.75 24q0 4.3-1.625 8.075-1.625 3.775-4.45 6.575-2.825 2.8-6.6 4.425Q28.3 44.7 24 44.7ZM19.4 7.65q4.4 5.15 8.125 7.05 3.725 1.9 8.175 1.9 1.2 0 1.9-.05t1.55-.3Q36.9 12.2 33.025 9.6 29.15 7 24 7q-1.35 0-2.55.2-1.2.2-2.05.45ZM7.45 20.1q2.4-.9 5.475-4.075Q16 12.85 17.3 8.35q-4.35 1.95-6.575 4.975Q8.5 16.35 7.45 20.1ZM19.4 7.65Zm-2.1.7Z"/>
                </svg>
            </div>
        </div>
        <div class="col align-items-center ps-3 mx-0">
            <span class="messages-head__name semibold font-size-09 lh-1">{{ user.name }}</span>
            <p class="messages-head__text opacity-40 thin lh-1 d-none">{{ user.message }}</p>
            <p class="messages-head__date opacity-40 thin lh-1">4 дня назад</p>
        </div>
        <div class="messages-head__unread col-auto mx-0 px-0 d-none"></div>
    </div>
</template>
<script>
export default {
    props: {
        users: {
            type: Array || Object,
            default: {}
        }
    },
}
</script>
