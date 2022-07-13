<template>
    <svg class="sprite-icon" :viewBox="'0 0 '+ width +' ' + height" :width="width" :height="height">
        <use :xlink:href="'/img/sprites.svg#' + icon" />
    </svg>
</template>

<script>
export default {
    name: 'sprite-icon',
    props: {
        icon: {
            type: String,
            required: true,
        },
        width: {
            type: Number,
            required: false,
            default: 32,
        },
        height: {
            type: Number,
            required: false,
            default: 32,
        },
    },
};
</script>
