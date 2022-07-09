<template>
    <button class="r-button" @click.prevent="onClick">
        <span>
            <slot></slot>
        </span>
    </button>
</template>

<script>
    export default {
        name: "r-button",
        methods: {
            onClick(e)
            {
                this.$emit( 'click', e );
            },
        }
    }
</script>

<style scoped lang="scss">
    .r-button {
        display: inline-block;
        border: 1px solid #99855c;
        background: none;
        text-decoration: none;
        width: 300px;
        padding: 4px;
        cursor: pointer;
        transition: border .3s ease-in-out;

        > span {
            display: block;
            background-color: #2e2719;
            background-image: url('/img/button.png');
            background-size: cover;
            text-transform: uppercase;
            color: #d0bc93;
            text-align: center;
            padding: 10px 0;
            font-size: 20px;
            text-decoration: none;
            transition: background-color .3s ease-in-out, color .3s ease-in-out;
        }

        &:hover {
            border: 1px solid #ffd073;

            > span {
                color: white;
                background-color: #70603e;
            }
        }

        &--small {
            > span {
                font-size: 16px;
            }
        }

        &--block {
            display: block;
        }

        &--link {
            border: 0;
            padding: 10px 0;

            > span {
                color: #808080;
                background-color: transparent;
                background-image: none;
                text-transform: none;
                padding: 0;
                display: inline-block;
                transition: color .3s ease-in-out;

                &:after {
                    content: '';
                    display: block;
                    position: absolute;
                    height: 2px;
                    width: 0%;
                    background-color: white;
                    bottom: -2px;
                    left: 0;
                    transition: width 0.3s ease-in-out;
                }
            }

            &:hover {
                border: 0;

                > span {
                    color: white;
                    background-color: transparent;

                    &:after {
                        width: 100%;
                    }
                }
            }
        }
    }
</style>