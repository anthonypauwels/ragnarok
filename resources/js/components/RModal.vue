<template>
    <transition name="fade-fast">
        <div class="r-modal" v-if="show !== false" @click.self="closeModal">
            <div class="r-modal__inner">
                <button class="r-modal__close" @click="closeModal">&times;</button>

                <slot></slot>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    name: "RModal",

    props: {
        show: {
            type: Boolean,
            required: true,
        }
    },

    watch: {
        show(value) {
            if ( value ) {
                document.querySelector('.wrapper').classList.add('modal-is-open');
            } else {
                document.querySelector('.wrapper').classList.remove('modal-is-open');
            }
        }
    },

    methods: {
        closeModal() {
            this.$emit( 'close' );
        }
    },
}
</script>

<style lang="scss">
.r-modal {
    position: fixed;
    width: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    overflow: scroll;

    @include min-md {
        overflow: auto;
    }

    &__close {
        position: absolute;
        top: 42px;
        left: 20px;
        color: #808080;
        font-size: 26px;
        background-color: transparent;
        border: 0;
        cursor: pointer;
        z-index: 10;

        @include min-md {
            top: 22px;
        }
    }

    &__inner {
        background-color: rgba(0, 0, 0, 0.9);
        color: white;
        line-height: 36px;
        font-size: 18px;
        padding: 40px 20px 40px 20px;
        min-height: 100vh;

        @include min-sm {
            padding: 20px;
            position: fixed;
            width: 90%;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -65%);
            min-height: auto;
        }

        @include min-md {
            font-size: 20px;
            width: 100%;
            max-width: 760px;
        }

        &:before {
            content: '';
            position: fixed;
            top: 10px;
            left: 10px;
            right: 10px;
            bottom: 10px;
            pointer-events: none;
            border: 1px solid #66583c;
        }
    }
}
</style>