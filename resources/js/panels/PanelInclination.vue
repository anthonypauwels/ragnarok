<template>
    <div class="panel panel-inclination">
        <div class="container">
            <div class="list">
                <a href="#" v-for="( inclination, key ) in inclinations" :key="key"
                   class="item" :class="{ 'is-active': currentInclination === key }"
                   @click.prevent="selectInclination( key )">
                    <div>
                        <img :src="'/img/' + inclination.image" :alt="inclination.name">
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
        padding: 0 20px;

        .container {
            max-width: 940px;
            width: 100%;
            margin: auto;

            .list {
                display: flex;
                justify-content: space-between;
                flex-flow: row wrap;

                .item {
                    width: calc(50% - 10px);
                    border: 1px solid #808080;
                    color: white;
                    text-align: center;
                    display: block;
                    text-decoration: none;
                    font-size: 20px;
                    padding: 4px;
                    transition: border .3s ease-out, color .3s ease-out;
                    margin-bottom: 20px;

                    @include min-md {
                        width: calc(25% - 10px);
                        margin-bottom: 0;
                    }

                    > div {
                        background-color: rgba(0, 0, 0, 0.5);
                        height: 100px;
                        display: flex;
                        flex-flow: column;
                        justify-content: center;

                        @include min-md {
                            height: 130px;
                        }

                        img {
                            width: 25%;
                            display: block;
                            margin: 0 auto 5px;
                        }

                        span {
                            display: block;
                            line-height: 20px;
                        }
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
                color: white;
                font-size: 16px;
                line-height: 36px;
                max-width: 470px;
                width: 100%;
                margin: 0 auto;

                @include min-md {
                    font-size: 20px;
                    margin: 40px auto 20px auto;
                }
            }
        }
    }
</style>