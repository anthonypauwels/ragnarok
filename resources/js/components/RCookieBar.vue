<template>
    <div class="r-cookie-bar" :class="{show}">
        <div class="r-cookie-bar__text">Ce site utilise des cookies pour son fonctionnement</div>
        <div class="r-cookie-bar__btn">
            <button @click.prevent="onClick">OK</button>
        </div>
    </div>
</template>

<script>
import { useLocalStorage } from "../lib/core";

const localStorage = useLocalStorage();

export default {
    name: "r-cookie-bar",
    data()
    {
        return {
            show: false,
        }
    },
    methods: {
        onClick() {
            localStorage.set( 'cookie-bar-is-gone', true );

            this.show = false;

            setTimeout( () => {
                this.$el.remove();
            }, 300 );
        }
    },
    mounted () {
        if ( localStorage.get('cookie-bar-is-gone') !== true ) {
            this.show = true;
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
        padding: 20px;
        transition: all .3s ease-out;
        opacity: 0;
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        pointer-events: none;
        width: calc(100% - 60px);
        display: flex;
        justify-content: space-between;

        @include min-md {
            width: 600px;
            padding: 20px 40px;
        }

        &.show {
            opacity: 1;
            pointer-events: all;
        }

        &__btn {
            display: flex;
            flex-flow: column;
            justify-content: center;

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
        }

    }
</style>