<template>
    <div class="page-character">
        <h2 class="title">{{ ( this.edit ? 'character.title.edit' : 'character.title.new' ) | __ }}</h2>

        <r-breadcrumb :current="tab" :tabs="tabs" @change="onChangeTab"></r-breadcrumb>

        <div class="panel-wrapper">
            <transition name="fade">
                <panel-name :character="character" v-if="tab === 'name'" @change="onChangeName" @next="nextTab"></panel-name>
                <panel-race :character="character" v-if="tab === 'race'" @change="onChangeRace"></panel-race>
                <panel-inclination :character="character" v-if="tab === 'inclination'" @change="onChangeInclination"></panel-inclination>
                <panel-skills :character="character" v-if="tab === 'skills'" @change="onChangeSkills"></panel-skills>
            </transition>
        </div>

        <div class="btn-wrapper">
            <r-button @click="onClickButton">
                <span v-if="tab === 'skills'">{{ 'character.resume' | __ }}</span>
                <span v-else>{{ 'character.next' | __ }}</span>
            </r-button>
        </div>
    </div>
</template>

<script>
import PanelName from "../panels/PanelName";
import PanelRace from "../panels/PanelRace";
import PanelInclination from "../panels/PanelInclination";
import PanelSkills from "../panels/PanelSkills";
import RBreadcrumb from "../components/RBreadcrumb";
import RButton from "../components/RButton";
import {decodeBase64, encodeBase64} from "../../lib/helpers/base64";
import {__} from "../../helpers";
import logging from "../../lib/core/config/logging";

export default {
    name: "page-character",

    components: {
        RBreadcrumb,
        RButton,
        PanelName,
        PanelRace,
        PanelInclination,
        PanelSkills,
    },

    data()
    {
        return {
            edit: false,
            inclinations: {},
            tabsList: [
                'name',
                'race',
                'inclination',
                'skills',
            ],
            tabs: {
                name: {
                    label: __('character.panels.name.title'),
                    condition: () => {
                        return true;
                    }
                },
                race: {
                    label: __('character.panels.race.title'),
                    condition: () => {
                        return this.character.name !== '';
                    }
                },
                inclination: {
                    label: __('character.panels.inclination.title'),
                    condition: () => {
                        return this.character.race !== '';
                    }
                },
                skills: {
                    label: __('character.panels.skills.title'),
                    condition: () => {
                        return this.character.inclination !== '';
                    }
                },
            },
            tab: 'name',
            character: {
                name: '',
                race: '',
                inclination: '',
                skills: {},
                spells: {},
                xpSpend: 0,
            }
        }
    },

    methods: {
        encode(obj)
        {
            return encodeBase64( obj );
        },

        decode(hash)
        {
            return decodeBase64( hash );
        },

        nextTab()
        {
            this.onChangeTab( this.tabsList[ this.tabsList.findIndex( el => el === this.tab ) + 1 ] );
        },

        onChangeName(name)
        {
            this.character.name = name;
        },

        onChangeRace(race)
        {
            this.character.race = race;

            this.$app.get('events').emit('character:reset');
        },

        onChangeInclination(inclination)
        {
            this.character.inclination = inclination;

            this.$app.get('events').emit('character:reset');
        },

        onChangeSkills(skills)
        {
            this.character.skills = skills;
        },

        onChangeTab(tab)
        {
            this.tab = tab;
            window.scrollTo({
                top: 0,
                left: 0,
                behavior: "smooth",
            } );
        },

        onClickButton()
        {
            switch ( this.tab ) {
                case 'name':
                    if ( this.character.name === '' ) {
                        return;
                    }

                    this.nextTab();
                    break;

                case 'race':
                    if ( this.character.race === '' ) {
                        return;
                    }

                    this.nextTab();
                    break;

                case 'inclination':
                    if ( this.character.inclination === '' ) {
                        return;
                    }

                    this.nextTab();
                    break;

                case 'skills':
                    /** shallow copy for JSON.stringify */
                    const character = Object.assign( {}, this.character );

                    character.skills = {};
                    character.spells = {};

                    Object.entries( this.character.skills ).forEach( ( [ k, v ] ) => {
                        character.skills[ k ] = v;
                    } );

                    Object.entries( this.character.spells ).forEach( ( [ k, v ] ) => {
                        character.spells[ k ] = v;
                    } );

                    const token = this.encode( character );

                    window.scrollTo({
                        top: 0,
                        left: 0,
                        behavior: "smooth",
                    } );

                    this.$router.push( { name: 'resume', params: { token } } );
                    break;

                default: return;
            }
        },

        recomputeXP(skills, spells)
        {
            let xpSpend = 0;

            for ( let [ key, xp_index ] of Object.entries( skills ) ) {
                const [ inclination, skill_name ] = key.split('_');

                const skill = this.inclinations[ inclination ].skills[ skill_name ];

                xpSpend+= skill.xp[ xp_index ];
            }

            for ( let [ id, nbr ] of Object.entries( spells ) ) {
                for ( let [ rank, spellsByRank ] of Object.entries( this.spells ) ) {
                    for ( let spell of Object.values( spellsByRank ) ) {
                        if ( spell.id === id ) {
                            xpSpend = xpSpend + ( rank * nbr );
                        }
                    }
                }
            }

            this.character.xpSpend = xpSpend;
        },

        resetXp()
        {
            this.character.skills = {};
            this.character.spells = {};

            this.recomputeXP( this.character.skills, this.character.spells );
        }
    },

    created() {
        this.inclinations = window.__app.inclinations;
        this.spells = window.__app.spells;

        const token = this.$route.params.token;

        if ( token ) {
            this.character = this.decode( token );
            this.edit = true;
        }

        this.$app.get('events').on('character:reset', () => this.resetXp() );
        this.$app.get('events').on('character:skills', skills => this.recomputeXP( skills, this.character.spells ) );
        this.$app.get('events').on('character:spells', spells => this.recomputeXP( this.character.skills, spells ) );
    }
}
</script>

<style lang="scss">
    .page-character {
        overflow: hidden;
        padding-top: 120px;
        padding-bottom: 100px;

        @include min-md {
            padding-top: 0;
            padding-bottom: 0;
        }

        .panel-wrapper {
            z-index: 2;

            @include min-md {
                height: 32rem;

                .panel {
                    height: 32rem;
                }
            }
        }

        .btn-wrapper {
            max-width: 300px;
            width: 100%;
            margin: 20px auto 0 auto;
            text-align: center;

            @include min-md {
                margin: 20px auto 4rem;
            }
        }
    }
</style>