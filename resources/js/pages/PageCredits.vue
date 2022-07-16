<template>
    <div class="page-credits">
        <h2 class="title">{{ 'credits.title' | __ }}</h2>

        <div class="text">
            <ul>
                <li v-html="$options.filters.__('credits.list.ragnarok')"></li>

                <li v-html="$options.filters.__('credits.list.game-icons-net')"></li>

                <li v-html="$options.filters.__('credits.list.two-steps-from-hell')"></li>
            </ul>
        </div>

        <div class="btn-wrapper">
            <r-button @click="$router.push('/')">
                <span>{{ 'credits.back' | __ }}</span>
            </r-button>
        </div>
    </div>
</template>

<script>

import RButton from "../components/RButton";

export default {
    name: "page-credits",
    components: {
        RButton
    },
}
</script>

<style lang="scss">
    .page-credits {
        overflow: hidden;
        padding-top: 120px;
        padding-bottom: 100px;

        @include min-md {
            padding-top: 0;
            padding-bottom: 0;
        }

        .text {
            max-width: 520px;
            width: 100%;
            color: white;
            line-height: 36px;
            font-size: 18px;
            margin: auto;
            overflow: auto;
            padding: 0 40px;

            @include min-md {
                font-size: 18px;
                height: calc(100vh - 270px);
            }

            ul {
                li {
                    margin-top: 20px;

                    a {
                        color: #808080;
                        font-size: 18px;
                        text-decoration: none;
                        transition: color 0.3s ease-in-out;

                        &:hover {
                            color: white;
                        }
                    }
                }
            }
        }

        .btn-wrapper {
            margin-top: 20px;
        }
    }
</style>