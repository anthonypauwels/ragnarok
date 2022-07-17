<template>
    <div class="page-home">
        <h2 class="title">{{ 'home.title' | __ }}</h2>

        <div class="text">
            <p v-html="$options.filters.__('home.text')"></p>
        </div>

        <div class="btn-wrapper">
            <r-button @click="$router.push('/new')">
                <span>{{ 'home.button' | __ }}</span>
            </r-button>
        </div>
    </div>
</template>

<script>
import RButton from "../components/RButton";

export default {
    name: "page-home",
    components: {
        RButton
    },
}
</script>

<style lang="scss">
    .page-home {
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
            font-size: 16px;
            margin: auto;
            overflow: auto;
            padding: 0 40px;

            @include min-md {
                font-size: 18px;
                height: calc(100vh - 270px);
            }

            a {
                color: #808080;
                font-size: 14px;
                text-decoration: none;
                transition: color 0.3s ease-in-out;

                &:hover {
                    color: white;
                }
            }
        }

        .btn-wrapper {
            margin-top: 20px;
        }
    }
</style>