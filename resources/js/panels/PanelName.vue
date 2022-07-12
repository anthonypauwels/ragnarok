<template>
    <div class="panel panel-name">
        <div class="container">
            <r-input type="text" name="name" :value="character.name" @input="value => $emit('change', value )">{{ 'character.panels.name.input' | __ }}</r-input>
        </div>
    </div>
</template>

<script>
import RInput from "../components/RInput";

export default {
    name: "panel-name",

    components: {
        RInput,
    },

    props: {
        character: {
            type: Object,
            required: true,
        }
    },

    mounted() {
        this.$el.addEventListener('keypress', event => {
            if ( event.keyCode === 13 ) { // key code of the enter key
                event.preventDefault();
                this.$emit('next' );
            }
        });
    },
}
</script>

<style lang="scss">
    .panel-name {
        max-width: 340px;
        width: 100%;
        margin: auto;
        padding: 0 20px;
    }
</style>