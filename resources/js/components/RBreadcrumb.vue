<template>
    <ul class="r-breadcrumb">
        <li v-for="(tab, name) in tabs" :key="name">
            <a href="#" :class="{ 'is-active': currentTab === name, 'is-disabled': !tab.condition() }" @click.prevent="handleClick( name )">{{ tab.label }}</a>
        </li>
    </ul>
</template>

<script>
export default {
    name: "r-breadcrumb",

    props: {
        tabs: {
            type: Object,
            required: true,
        },

        current: {
            type: String,
            required: true,
        }
    },

    watch: {
        current(value) {
            this.currentTab = value;
        }
    },

    data() {
        return {
            currentTab: this.current,
        }
    },

    methods: {
        handleClick(tab)
        {
            this.currentTab = tab;

            this.$emit('change', tab );
        }
    },
}
</script>

<style lang="scss">
.r-breadcrumb {
    list-style: none;
    text-align: center;
    margin-bottom: 40px;

    li {
        display: inline-block;

        a {
            color: white;
            text-decoration: none;
            text-transform: uppercase;
            font-weight: bold;
            font-size: 26px;
            transition: all .3s ease-in-out;

            &.is-disabled {
                color: #666666;
                pointer-events: none;
                cursor: default;
            }

            &.is-active {
                pointer-events: none;
                cursor: default;
            }

            &.is-active, &:hover:not(.disabled) {
                color: #ffd073;
            }
        }

        & + li {
            &:before {
                content: url('/img/arrow.png');
                display: inline-block;
                width: 22px;
                height: 30px;
                margin: 0 10px;
                top: 4px;
            }
        }
    }
}
</style>