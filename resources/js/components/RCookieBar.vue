<template>
    <div class="r-cookie-bar">
        Ce site utilise des cookies pour son fonctionnement <button @click.prevent="onClick">OK</button>
    </div>
</template>

<script>
import { useLocalStorage } from "../lib/core";

const localStorage = useLocalStorage();

export default {
    name: "r-cookie-bar",
    methods: {
        onClick() {
            localStorage.set( 'cookie-bar-is-gone', true );

            this.$el.classList.remove('show');

            setTimeout( () => {
                this.$el.remove();
            }, 300 );
        }
    },
    mounted () {
        if ( localStorage.get('cookie-bar-is-gone') !== true ) {
            this.$el.classList.add('show');
        }
    }
}
</script>

<style lang="scss">
    .r-cookie-bar {
        border: 1px solid #ffd073;
        border-radius: 5px;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        padding: 20px 40px;
        transition: all .3s ease-out;
        opacity: 0;
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        pointer-events: none;

        button {
            border: 1px solid #808080;
            border-radius: 2px;
            color: white;
            background-color: transparent;
            padding: 5px 10px;
            display: inline-block;
            margin-left: 20px;
            transition: all .3s ease-out;
            cursor: pointer;

            &:hover {
                border: 1px solid #ffd073;
                color: #ffd073;
            }
        }

        &.show {
            opacity: 1;
            pointer-events: all;
        }

    }
</style>