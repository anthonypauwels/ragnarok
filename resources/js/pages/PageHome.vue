<template>
    <div class="page-home">
        <h2 class="title">{{ 'home.title' | __ }}</h2>

        <div class="intro">
            <p v-html="$options.filters.__('home.text')"></p>

            <div class="button-container">
                <r-button @click="$router.push('/new')">
                    <span>{{ 'home.button' | __ }}</span>
                </r-button>
            </div>
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

        .intro {
            width: 520px;
            color: white;
            line-height: 36px;
            font-size: 18px;
            margin: auto;
            height: calc(100vh - 200px);
            overflow: auto;
            padding: 0 40px;
        }

        .button-container {
            margin-top: 20px;
        }
    }
</style>