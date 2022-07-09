<template>
    <div class="panel panel-inclination">
        <div class="container">
            <div class="list">
                <a href="#" v-for="( inclination, key ) in inclinations" :key="key"
                   class="item" :class="{ 'is-active': currentInclination === key }"
                   @click.prevent="selectInclination( key )">
                    <div>
                        <span>{{ inclination.name }}</span>
                    </div>
                </a>
            </div>

            <div class="description">
                <div v-if="currentInclination !== false && inclinations[ currentInclination ] !== undefined">
                    {{ inclinations[ currentInclination ].description }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "panel-inclination",

    props: {
        character: {
            type: Object,
            required: true,
        }
    },

    data: () => {
        return {
            currentInclination: null,
            inclinations: {}
        }
    },

    methods: {
        selectInclination(key) {
            this.currentInclination = key;

            this.$emit('change', this.currentInclination);
        },
    },

    created() {
        this.inclinations = window.__app.inclinations;

        this.currentInclination = this.character.inclination;
    },
}
</script>

<style lang="scss">
    .panel-inclination {
        .container {
            max-width: 940px;
            width: 100%;
            margin: auto;

            .list {
                display: flex;
                justify-content: space-between;

                .item {
                    width: calc(25% - 10px);
                    height: 140px;
                    border: 1px solid #808080;
                    color: white;
                    text-align: center;
                    display: block;
                    text-decoration: none;
                    font-size: 20px;
                    padding: 4px;
                    transition: all .3s ease-out;

                    > div {
                        background-color: rgba(0, 0, 0, 0.5);
                        line-height: 130px;
                        height: 130px;
                    }

                    &:hover {
                        border: 1px solid white;
                    }

                    &.is-active {
                        border: 1px solid #ffd073;
                        color: #ffd073;
                    }
                }
            }

            .description {
                font-size: 20px;
                color: white;
                line-height: 35px;
                max-width: 470px;
                width: 100%;
                margin: 40px auto 20px auto;
            }
        }
    }
</style>