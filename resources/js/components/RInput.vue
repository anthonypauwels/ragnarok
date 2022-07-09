<template>
    <div class="r-input">
        <label :for="id">
            <slot></slot>
        </label>

        <div class="r-input-border" ref="border">
            <input :type="type" :id="id" :name="name" autocomplete="off"
                   @focus="onFocusIn" @blur="onFocusOut" ref="input"
                   v-model="dataValue" @input="event => $emit('input', event.target.value)">
        </div>
    </div>
</template>

<script>
    export default {
        name: "r-input",
        props: {
            name: {
                type: String,
                required: true,
            },

            type: {
                type: String,
                required: true,
            },

            value: {
                type: String|Number,
                required: true,
            },
        },
        data() {
            return {
                id: 'input-' + this.name,
                dataValue: this.value,
            }
        },
        methods: {
            onFocusIn() {
                const border = this.$refs.border;

                if ( border ) {
                    border.classList.remove('is-active');
                    border.classList.add('is-focus');
                }
            },

            onFocusOut(event) {
                const border = this.$refs.border;

                if ( border ) {
                    if ( event.target.value !== '') {
                        border.classList.remove('is-focus');
                        border.classList.add('is-active');
                    } else {
                        border.classList.remove('is-focus');
                        border.classList.remove('is-active');
                    }
                }
            },
        },

        updated() {
            const border = this.$refs.border;

            if ( border ) {
                if ( this.$refs.input.value !== '' ) {
                    border.classList.remove('is-focus');
                    border.classList.add('is-active');
                }
            }
        }
    }
</script>

<style scoped lang="scss">
    .r-input {
        label {
            color: #ccb17a;
            font-weight: bold;
            font-size: 20px;
            display: block;
            margin-bottom: 10px;
        }

        &-border {
            padding: 4px;
            border: 1px solid #99855c;
            transition: border .3s ease-out;

            &.is-active {
                border: 1px solid #ffd073;
            }

            &.is-focus {
                border: 1px solid white;
            }

            input {
                display: block;
                background-color: rgba(0, 0, 0, 0.5);
                color: #ffd073;
                text-align: center;
                padding: 10px 10px;
                font-size: 20px;
                text-decoration: none;
                border: 0;
                width: 100%;
                position: relative;
            }
        }
    }
</style>