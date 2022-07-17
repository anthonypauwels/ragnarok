<template>
    <div class="r-music-player" :class="{'is-mute': isMute}">
        <span class="r-music-player__mute" @click.prevent="toggleMute"><slot></slot></span>
        <transition name="fade">
            <span class="r-music-player__title" v-if="!isMute">{{ musics[ currentSound ].name }}</span>
        </transition>
    </div>
</template>

<script>
import { Howl } from 'howler';
import { useLocalStorage } from "../../lib/core";

const localStorage = useLocalStorage();

export default {
    name: "r-music-player",

    data() {
        return {
            isMute: false,
            musics: [
                {
                    name: 'Two Steps From Hell - Archangel',
                    src: './sounds/two-steps-from-hell-archangel.mp3',
                },
                {
                    name: 'Two Steps From Hell - Victory',
                    src: './sounds/two-steps-from-hell-victory.mp3',
                },
                {
                    name: 'Two Steps From Hell - A Hero\'s return',
                    src: './sounds/two-steps-from-hell-a-heros-return.mp3',
                },
                {
                    name: 'Two Steps From Hell - Heart Of Courage',
                    src: './sounds/two-steps-from-hell-heart-of-courage.mp3',
                },
            ],
            sounds: [],
            currentSound: 0,
        }
    },

    methods: {
        toggleMute()
        {
            this.isMute = !this.isMute;

            if ( this.isMute ) {
                this.fadeIn( this.currentSound );
            } else {
                this.fadeOut( this.currentSound );
            }

            localStorage.set('music-is-mute', this.isMute );
        },

        play(i)
        {
            this.currentSound = i;

            if ( !this.isMute ) {
                this.sounds[ i ].play();
            }
        },

        fadeIn(i)
        {
            const duration = 500;

            setTimeout(() => this.sounds[ i ].pause(), duration);
            this.sounds[ i ].fade(0.05, 0, duration);
        },

        fadeOut(i)
        {
            const duration = 500;

            this.sounds[ i ].play();
            this.sounds[ i ].fade(0, 0.05, duration);
        },

        getRandomId()
        {
            return Math.floor(Math.random() * ( ( this.sounds.length - 1 ) + 1) );
        }
    },

    mounted() {
        this.musics
            .map( function ( element ) {
                this.sounds.push( new Howl( {
                    src: [ element.src ],
                    volume: 0.05,
                    onend: function() {
                        let newIndex = this.currentSound + 1;

                        if ( newIndex > this.sounds.length - 1 ) {
                            newIndex = 0;
                        }

                        this.play( newIndex );
                    }.bind( this )
                } ) );
            }.bind( this ) );

        this.isMute = localStorage.get('music-is-mute');

        this.play( this.getRandomId() );
    }
}
</script>

<style lang="scss">
    .r-music-player {
        font-size: 14px;

        &__mute {
            color: #808080;
            display: inline-block;
            margin-right: 20px;
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

        &__title {
            color: #ffd073;
            display: none;

            @include min-xs {
                display: inline;
            }
        }

        &.is-mute {
            .r-music-player__mute:after {
                width: 100%;
            }
        }
    }
</style>