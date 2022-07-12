<template>
    <div class="panel panel-race">
        <div class="container">
            <div class="list-wrapper">
                <div class="list">
                    <a href="#" v-for="( race, key ) in races" :key="key"
                       class="item" :class="{ 'is-active': currentRace === key }"
                       @click.prevent="selectRace( key )">
                        <div>
                            <span>{{ race.name }}</span>
                        </div>
                    </a>
                </div>
            </div>

            <div class="description">
                <div v-if="races[ currentRace ] !== undefined">
                    <div v-html="races[ currentRace ].description"></div>

                    <dl>
                        <dd v-if="races[ currentRace ].bonus !== undefined">
                            <ul>
                                <li v-for="(bonus, index) in races[ currentRace ].bonus" :key="index">{{ bonus }}</li>
                            </ul>
                        </dd>

                        <dt v-if="Object.keys( races[ currentRace ].can ).length > 0">{{ 'character.panels.race.can' | __ }}</dt>
                        <dd v-if="Object.keys( races[ currentRace ].can ).length > 0">
                            <ul>
                                <li v-for="(skill, index) in races[ currentRace ].can" :key="index">{{ skill }}</li>
                            </ul>
                        </dd>

                        <dt v-if="Object.keys( races[ currentRace ].cannot ).length > 0">{{ 'character.panels.race.cannot' | __ }}</dt>
                        <dd v-if="Object.keys( races[ currentRace ].cannot ).length > 0">
                            <ul>
                                <li v-for="(skill, index) in races[ currentRace ].cannot" :key="index">{{ skill }}</li>
                            </ul>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "panel-race",

    props: {
        character: {
            type: Object,
            required: true,
        }
    },

    data: () => {
        return {
            races: [],
            currentRace: null,
        }
    },

    methods: {
        selectRace(key) {
            this.currentRace = key;

            this.$emit('change', this.currentRace);
        },
    },

    created() {
        this.races = window.__app.races;

        this.currentRace = this.character.race;
    },
}
</script>

<style lang="scss">
    .panel-race {
        padding: 0 20px;

        .container {
            @include min-md {
                max-width: 940px;
                width: 100%;
                margin: auto;
                display: flex;
                justify-content: space-between;
            }

            .list-wrapper {
                overflow: scroll;
                margin-bottom: 20px;

                @include min-md {
                    overflow: auto;
                    height: 30rem;
                    width: calc(50% - 10px);
                    margin-bottom: 0;
                }
            }

            .list {
                display: flex;
                flex-flow: row nowrap;
                width: 1420px;

                @include min-md {
                    flex-flow: row wrap;
                    justify-content: space-between;
                    width: auto;
                }

                .item {
                    width: 140px;
                    height: 140px;
                    border: 1px solid #808080;
                    color: white;
                    text-align: center;
                    display: block;
                    text-decoration: none;
                    font-size: 20px;
                    padding: 4px;
                    transition: all .3s ease-out;

                    @include min-md {
                        width: calc(33% - 11.79px);
                        margin-top: 20px;
                    }

                    & + .item {
                        margin-left: 20px;

                        @include min-md {
                            margin-left: 0;
                        }
                    }

                    &:nth-child(1), &:nth-child(2), &:nth-child(3) {
                        @include min-md {
                            margin-top: 0;
                        }
                    }

                    &:hover {
                        border: 1px solid white;
                    }

                    &.is-active {
                        border: 1px solid #ffd073;
                        color: #ffd073;
                    }

                    > div {
                        background-color: rgba(0, 0, 0, 0.5);
                        line-height: 130px;
                        height: 130px;

                        > span {
                            line-height: 20px;
                        }
                    }
                }
            }

            .description {
                color: white;
                line-height: 36px;
                font-size: 16px;
                overflow: auto;
                max-width: 470px;
                width: 100%;
                margin: 0 auto;

                @include min-md {
                    padding: 0 20px;
                    font-size: 20px;
                    height: 30rem;
                    width: calc(50% - 10px);
                    max-width: 100%;
                    margin: 0;
                }

                dl {
                    margin-top: 1rem;

                    dt {
                        font-size: 18px;
                        line-height: 36px;
                        color: #FFD073;
                    }

                    dd {
                        ul {
                            list-style: disc;
                            padding-left: 1.25rem;

                            li {
                                font-size: 18px;
                                line-height: 36px;
                                color: white;
                            }
                        }
                    }
                }
            }
        }
    }
</style>