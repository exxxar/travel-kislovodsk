<template>
<div class="modal fade"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <img v-lazy="url" alt="">
            </div>

        </div>
    </div>
</div>
</template>
<script>
export default  {
    props:["url"]
}

</script>
