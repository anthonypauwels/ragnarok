<template>
    <div class="r-animation-link" :class="{'is-disabled': isDisabled}">
        <span class="animation-link__link" @click.prevent="toggleDisabled"><slot></slot></span>
    </div>
</template>

<script>
import { useLocalStorage } from "../../lib/core";

const localStorage = useLocalStorage();

export default {
    name: "r-animation-link",
    data: () => {
        return {
            isDisabled: false,
        }
    },
    methods: {
        toggleDisabled()
        {
            this.isDisabled = !this.isDisabled;

            localStorage.set('animation-is-disabled', this.isDisabled );

            if ( this.isDisabled ) {
                document.body.classList.remove( 'with-animation' );
            } else {
                document.body.classList.add( 'with-animation' );
            }
        },
    },
    mounted() {
        this.isDisabled = localStorage.get('animation-is-disabled', false );

        if ( !this.isDisabled ) {
            document.body.classList.add( 'with-animation' );
        }
    }
}
</script>

<style lang="scss">
.r-animation-link {
    font-size: 14px;

    .animation-link__link {
        color: #808080;
        display: inline-block;
        text-decoration: none;
        transition: color .3s ease-out;
        background: none;
        border: none;
        cursor: pointer;

        &:after {
            content: '';
            position: absolute;
            width: 0%;
            height: 2px;
            background-color: #ffd073;
            top: 50%;
            left: 0;
            right: 0;
            transition: width .3s ease-out, background-color .3s ease-out;
        }

        &:hover {
            color: white;

            &:after {
                background-color: black;
            }
        }
    }

    &.is-disabled {
        .animation-link__link:after {
            width: 100%;
        }
    }
}
</style>