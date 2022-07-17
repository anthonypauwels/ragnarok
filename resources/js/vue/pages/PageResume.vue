<template>
    <div class="page-resume">
        <h2 class="title">{{ character.name }}</h2>

        <h3 class="page-resume__meta" >
            <span>{{ races[ character.race ].name }}</span>
            <span>{{ inclinations[ character.inclination ].name_abr }}</span>
            <span>{{ character.xpSpend }} XP</span>
        </h3>

        <ul class="page-resume__character">
            <li v-for="item in table">
                <h4 v-if="item.title">{{ item.title }}</h4>

                <div class="skill" v-else @click="e => showSkillDescription( item.skill, e.target )"
                     :class="{'is-active': showedSkill !== false && showedSkill.name === item.skill.name}">
                    <img class="skill__image" :src="'/img/' + item.skill.image" :alt="item.skill.name">
                    <img class="skill__image skill__image--hover" :src="'/img/' + item.skill.image" :alt="item.skill.name">
                    <span class="skill__name">{{ item.label }}</span>
                    <span class="skill__xp">{{ item.xp }} XP</span> <span v-if="item.count" class="skill__count">x {{ item.count }}</span>
                </div>
            </li>
        </ul>

        <div class="btn-wrapper">
            <r-button @click="$router.push( { name: 'edit', params: { token } } )">
                <span>{{ 'resume.edit' | __ }}</span>
            </r-button>

            <div class="btn-wrapper__link">
                {{ 'resume.or' | __ }} <a href="" @click.prevent="showExportModal">{{ 'resume.export' | __ }}</a>
            </div>
        </div>

        <r-modal :show="showedSkill !== false" @close="closeModal">
            <div class="modal__skill" v-if="!showedSkill.rank">
                <h3>{{ showedSkill.name }}</h3>

                <span class="modal__xp" v-if="showedSkill.xp !== undefined">
                    <span v-for="(level, index) in showedSkill.xp" :key="index">{{ level }}</span> XP
                </span>

                <div v-html="showedSkill.description"></div>
            </div>

            <div class="modal__spell" v-else>
                <h3>{{ showedSkill.name }}</h3>

                <span class="modal__xp">{{ 'character.panels.skills.rank' | __ }} {{ showedSkill.rank }}</span>

                <dl>
                    <dt v-if="showedSkill.description">{{ 'character.panels.skills.description' | __ }} :</dt>
                    <dd v-if="showedSkill.description" v-html="showedSkill.description"></dd>

                    <dt v-if="showedSkill.target">{{ 'character.panels.skills.target' | __ }} :</dt>
                    <dd v-if="showedSkill.target" v-html="showedSkill.target"></dd>

                    <dt v-if="showedSkill.duration">{{ 'character.panels.skills.duration' | __ }} :</dt>
                    <dd v-if="showedSkill.duration" v-html="showedSkill.duration"></dd>

                    <dt v-if="showedSkill.injunction">{{ 'character.panels.skills.injunction' | __ }} :</dt>
                    <dd v-if="showedSkill.injunction" v-html="showedSkill.injunction"></dd>
                </dl>
            </div>
        </r-modal>

        <r-modal :show="exportModal" @close="closeModal">
            <div class="modal__export">
                <h3>{{ 'resume.export-title' | __ }}</h3>

                <r-input :value="computeTokenUrl" type="text" name="token" readonly @click="copyToClipboard">{{ 'resume.url' | __ }}</r-input>

                <div class="modal__clipped" :class="{'show': clipped }" v-html="$options.filters.__( 'resume.clipped' )"></div>

                <div class="modal__advice">{{ 'resume.advice' | __ }}</div>
            </div>
        </r-modal>
    </div>
</template>

<script>
import {decodeBase64, encodeBase64} from "../../lib/helpers/base64";
import RButton from "../components/RButton";
import RInput from "../components/RInput";
import RModal from "../components/RModal";

export default {
    name: "page-resume",

    components: {
        RButton,
        RInput,
        RModal,
    },

    computed: {
        computeTokenUrl()
        {
            return window.__app.baseUrl + '#/character/' + this.token;
        }
    },

    data()
    {
        return {
            token: '',

            races: {},
            inclinations: {},
            spells: {},

            character: {
                name: '',
                race: '',
                inclination: '',
                skills: {},
                spells: {},
                xpSpend: 0,
            },

            table: [],

            clipped: false,

            showedSkill: false,
            exportModal: false,
        }
    },
    methods: {
        encode() {
            return encodeBase64( this.character );
        },

        decode(hash) {
            return decodeBase64(hash);
        },

        closeModal()
        {
            this.showedSkill = false;
            this.exportModal = false;
        },

        showSkillDescription(skill)
        {
            this.showedSkill = skill;
        },

        showExportModal()
        {
            this.exportModal = true;
        },

        copyToClipboard(event)
        {
            const input = event.target;

            input.select();
            input.setSelectionRange(0, input.value.length);
            this.clipped = true;

            setTimeout( () => this.clipped = false, 5000 );

            document.execCommand('copy')
        }
    },
    created()
    {
        this.token = this.$route.params.token;
        this.character = this.decode( this.token );

        this.races = window.__app.races;
        this.inclinations = window.__app.inclinations;
        this.spells = window.__app.spells;

        const skills_by_inclinations = {};
        const skills_map = {};

        for ( let [ key, xp_index ] of Object.entries( this.character.skills ) ) {
            const [ inclination, skill_name ] = key.split('_');

            if ( skills_by_inclinations[ inclination ] === undefined  ) {
                skills_by_inclinations[ inclination ] = [];
            }

            const skill = this.inclinations[ inclination ].skills[ skill_name ];

            skills_by_inclinations[ inclination ].push( skill_name );
            skills_map[ skill_name ] = skill.xp[ xp_index ];
        }

        const skillsNameByRace = Object.keys( this.races[ this.character.race ].can );

        if ( skillsNameByRace.length > 0 ) {
            skillsNameByRace.forEach( skill_name => {
                loop: for ( let [ inclination_name, inclination ] of Object.entries( this.inclinations ) ) {
                    for ( let [ key, skill ] of Object.entries( inclination.skills ) ) {
                        if ( key === skill_name && skills_map[ skill_name ] === undefined ) {
                            if ( skills_by_inclinations[ inclination_name ] === undefined  ) {
                                skills_by_inclinations[ inclination_name ] = [];
                            }

                            skills_by_inclinations[ inclination_name ].push( skill_name );
                            skills_map[ skill_name ] = 0;

                            continue loop;
                        }
                    }
                }
            } );
        }

        const table = [];

        Object.entries( skills_by_inclinations ).forEach( ( [ inclination_name, skills ] ) => {
            table.push( {
                title: this.inclinations[ inclination_name ].name_long,
            } );

            skills.forEach( skill_name => {
                const xp = skills_map[ skill_name ];

                const skill = this.inclinations[ inclination_name ].skills[ skill_name ];

                table.push( {
                    skill,
                    name: skill_name,
                    label: skill.name,
                    xp,
                } );
            } );
        } );

        if ( Object.keys( this.character.spells ).length > 0 ) {
            let spells = {};

            Object.values( this.spells ).forEach( rank_spells => {
                rank_spells.forEach( spell => {
                    spells[ spell.id ] = spell;
                } );
            } );

            table.push( {
                title: 'Sorts',
            } );

            Object.entries( this.character.spells ).forEach( ( [ spell_name, count ] ) => {
                const spell = spells[ spell_name ];

                if ( count ) {
                    table.push( {
                        skill: spell,
                        name: spell_name,
                        label: spell.name,
                        xp: spell.rank,
                        count,
                    } );
                }
            } );
        }

        this.table = table;
    }
}
</script>

<style lang="scss">
    .page-resume {
        overflow: hidden;
        margin: auto;
        padding: 100px 20px 100px;

        @include min-md {
            padding: 0;
            margin: 0;
        }

        &__meta {
            color: white;
            text-align: center;
            font-size: 0;
            margin-bottom: 20px;

            span {
                font-size: 22px;

                & + span {
                    padding-left: 5px;

                    &:before {
                        content: '-';
                        display: inline-block;
                        padding-right: 10px;
                        padding-left: 10px;
                    }
                }
            }
        }

        &__character {
            max-width: 940px;
            width: 100%;
            margin: auto;
            display: flex;
            flex-flow: column wrap;

            @include min-md {
                height: 32rem;
                max-height: 32rem;
            }

            h4 {
                color: #ffd073;
                text-align: left;
                font-size: 22px;
                margin-bottom: 20px;
            }

            .skill {
                cursor: help;
                font-size: 20px;
                margin-bottom: 15px;

                &:hover, &.is-active {
                    .skill__name {
                        color: #ffd073;
                    }

                    .skill__image {
                        &--hover {
                            opacity: 1;
                        }
                    }
                }

                &__image {
                    width: 25px;
                    margin-right: 5px;
                    top: 5px;

                    &--hover {
                        position: absolute;
                        top: 5px;
                        left: 0;
                        opacity: 0;
                        transition: opacity .2s ease-in-out;
                        filter: invert(4%) sepia(49%) saturate(4121%) hue-rotate(308deg) brightness(107%) contrast(102%);
                    }
                }

                &__name {
                    color: white;
                    transition: color .2s ease-in-out;
                }

                &__xp {
                    color: #808080;

                    &:before {
                        content: '-';
                        display: inline-block;
                        padding-right: 2px;
                    }
                }

                &__count {
                    font-size: 16px;
                    color: #808080;
                    top: -6px;
                }
            }
        }

        .resume {
            color: white;
            line-height: 36px;
            font-size: 18px;
            margin: auto;
            height: calc(100vh - 400px);
            overflow: auto;
            padding: 0 40px;
            max-width: 940px;
            width: 100%;
        }

        .btn-wrapper {
            &__link {
                margin-top: 20px;
                color: white;
                font-size: 18px;

                a {
                    color: #808080;
                    text-decoration: none;
                    transition: color .3s ease-in-out;

                    &:hover {
                        color: white;
                    }
                }
            }
        }

        .r-modal {
            h3 {
                font-weight: bold;
                font-size: 26px;
                color: #ffd073;
                text-align: center;
                font-family: 'Della Respira', serif;

                @include min-md {
                    font-size: 20px;
                }
            }

            .modal__xp {
                position: absolute;
                right: 10px;
                top: 5px;
                color: #808080;

                span + span {
                    &:before {
                        content: '/';
                        color: #808080;
                    }
                }
            }

            dl {
                dt {
                    color: #ffd073;
                    float: left;
                    width: 120px;
                }

                dd {
                    margin-left: 130px;
                    margin-bottom: 10px;
                }
            }

            .modal__clipped {
                font-size: 14px;
                color: #A6A6A6;
                text-align: right;
                opacity: 0;
                transition: opacity .3s ease-in;
                pointer-events: none;

                &.show {
                    pointer-events: auto;
                    opacity: 1;
                }
            }

            .modal__advice {
                font-size: 18px;
                color: white;
            }
        }
    }
</style>