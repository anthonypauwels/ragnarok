<template>
    <div class="panel panel-skills">
        <div class="container">
            <div class="inclinations-list">
                <button v-for="(inclination, key) in inclinations" class="item" @click.prevent="selectInclination( key )"
                        :class="{'is-active': currentInclination === key }"
                        >
                    <span>{{ inclination.name }}</span>
                </button>
                <button class="item" :class="{'is-disabled': character.skills[ 'occult_weaver' ] === undefined && character.skills[ 'occult_invocator' ] === undefined, 'is-active': currentInclination === 'spells'}"
                        @click.prevent="selectInclination('spells')" v-if="character.inclination === 'occult'">
                    <span>{{ 'character.panels.skills.spells' | __ }}</span>
                </button>

                <span class="item item--right character-xp">{{ character.xpSpend }} XP</span>

                <span class="item item--right character-race" v-if="races[ character.race ] !== undefined">{{ races[ character.race ].name }}</span>
            </div>

            <div class="skills" v-show="currentInclination !== 'spells'">
                <TransitionGroup name="fade-fast">
                    <ul v-for="(name, key) in inclinations" v-if="key === currentInclination" :key="key">
                        <li v-for="( skill, name ) in inclinations[ key ].skills" :key="name" v-if="canSeeSkill( skill )">
                            <span class="skill__name" @click="showSkillDescription( skill )" :class="{'is-active': showedSkill !== false && showedSkill.name === skill.name}">
                                {{ skill.name }}

                                <span class="skill__xp">
                                    <span v-for="(level, index) in skill.xp" :key="index"
                                          :class="{'has-learned-it': character.skills[ skill.inclination + '_' + name ] !== undefined && character.skills[ skill.inclination + '_' + name ] === index || raceCanLearnIt( skill ) }"
                                    >{{ level }}</span> <strong :class="{'has-learned-it': character.skills[ skill.inclination + '_' + name ] !== undefined || raceCanLearnIt( skill ) }">XP</strong>
                                </span>
                            </span>

                            <div class="skill__checkbox">
                                <div class="checkbox race-can" v-if="raceCanLearnIt( skill )">
                                    <span data-c="race can learn it"></span>
                                </div>

                                <div class="checkbox race-cannot"
                                     v-if="raceCannotLearnIt( skill ) || skill.specialized && key !== character.inclination && !raceCanLearnIt( skill )">
                                    <span data-c="race can not learn it"></span>
                                </div>

                                <div class="checkbox" @click="learnSkill( skill, character.skills[ skill.inclination + '_' + name ] + 1 )"  @contextmenu.prevent="learnSkill( skill, character.skills[ skill.inclination + '_' + name ] - 1 )"
                                     v-if="character.skills[ skill.inclination + '_' + name ] !== undefined"
                                     :class="{'is-checked': character.skills[ skill.inclination + '_' + name ] === skill.xp.length - 1 }">
                                    <span data-c="already learned">{{ character.skills[ skill.inclination + '_' + name ] + 1 }}</span>
                                </div>

                                <div class="checkbox" @click="learnSkill( skill, 0 )" @contextmenu.prevent=""
                                     v-if="!( raceCannotLearnIt( skill ) || skill.specialized && key !== character.inclination && !raceCanLearnIt( skill ) ) &&
                                     character.skills[ skill.inclination + '_' + name ] === undefined && !( raceCanLearnIt( skill ) || raceCannotLearnIt( skill ) )">
                                    <span data-c="not already learned"></span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </TransitionGroup>
            </div>

            <div class="spells" v-show="currentInclination === 'spells'">
                <div class="spells__rank" v-for="(spells, rank) in spells" :key="rank">
                    <h3 class="spells__rank__title">{{ 'character.panels.skills.rank' | __ }} {{ rank }}</h3>

                    <ul>
                        <li v-for="spell in spells">
                            <span class="spell__name" @click="showSkillDescription( spell )" :class="{'is-active': showedSkill !== false && showedSkill.name === spell.name}">{{ spell.name }}</span>

                            <div class="counter">
                                <button class="counter__minus" @click.prevent="decrementSpell( spell )"><span>&lt;</span></button>
                                <div class="counter__number" :class="{'is-active': character.spells[ spell.id ] !== undefined && character.spells[ spell.id ] > 0 }">{{ character.spells[ spell.id ] === undefined || character.spells[ spell.id ] === 0 ? 0 : character.spells[ spell.id ] }}</div>
                                <button class="counter__plus" @click.prevent="incrementSpell( spell )"><span>&gt;</span></button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="reset-skills-link" @click.prevent="reset">{{ 'character.panels.skills.reset' | __ }}</div>

            <transition name="fade-fast">
                <div class="unavailable-skills-toggle" :class="{'is-showed': showUnavailableSkills}" v-if="currentInclination !== 'spells'">
                    <span class="unavailable-skills-toggle__link" @click.prevent="toggleUnavailableSkills">{{ 'character.panels.skills.toggle' | __ }}</span>
                </div>
            </transition>
        </div>

        <transition name="fade-fast">
            <div class="modal" v-if="showedSkill !== false" @click.self="closeModal">
                <div class="modal__description">
                    <div class="modal__description__content" v-if="!showedSkill.rank">
                        <button class="modal__close" @click="closeModal">&times;</button>

                        <h3>{{ showedSkill.name }}</h3>

                        <span class="skill__xp" v-if="showedSkill.xp !== undefined">
                            <span v-for="(level, index) in showedSkill.xp" :key="index">{{ level }}</span> XP
                        </span>

                        <div v-html="showedSkill.description"></div>
                    </div>

                    <div class="modal__description__content" v-else>
                        <button class="modal__close" @click="closeModal">&times;</button>

                        <h3>{{ showedSkill.name }}</h3>

                        <span class="skill__xp">
                            {{ 'character.panels.skills.rank' | __ }} {{ showedSkill.rank }}
                        </span>

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
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
export default {
    name: "panel-skills",

    props: {
        character: {
            type: Object,
            required: true,
        }
    },

    data: () => {
        return {
            showUnavailableSkills: false,
            showedSkill: false,
            inclinations: {},
            spells: {},
            races: {},
            currentInclination: 'weapons',
        }
    },

    methods: {
        selectInclination(name)
        {
            this.currentInclination = name;
        },

        hasMaxSkillsForOthersInclinations()
        {
            let counter = 0;

            for ( let [ key, xp_index ] of Object.entries( this.character.skills ) ) {
                const [ inclination, skill_name ] = key.split('_');

                const skill = this.inclinations[ inclination ].skills[ skill_name ];

                if ( skill.inclination !== this.character.inclination ) {
                    for ( let i = 0; i <= xp_index; i++ ) {
                        counter++;
                    }
                }
            }

            return counter >= 2;
        },

        canSeeSkill(skill)
        {
            return this.showUnavailableSkills || this.raceCanLearnIt( skill ) ||
                !this.raceCannotLearnIt( skill ) && !skill.specialized ||
                this.character.skills[ skill.inclination + '_' + skill.id ] !== undefined ||
                !this.raceCannotLearnIt( skill ) && skill.specialized && this.character.inclination === skill.inclination;
        },

        learnSkill(skill, level)
        {
            if ( level === -1 || skill.xp.length <= level ) {
                this.$delete( this.character.skills, skill.inclination + '_' + skill.id );

                if ( skill.inclination + '_' + skill.id === 'occult_weaver' || skill.inclination + '_' + skill.id === 'occult_invocator' ) {
                    this.character.spells = {};
                }
            } else if ( skill.inclination !== this.character.inclination && !this.hasMaxSkillsForOthersInclinations() || skill.inclination === this.character.inclination ) {
                this.$set( this.character.skills, skill.inclination + '_' + skill.id, level );
            }

            this.$app.get('events').emit('character:skills', this.character.skills );
        },

        raceCanLearnIt(skill)
        {
            return Object.keys( this.races[ this.character.race ].can ).includes( skill.id );
        },

        raceCannotLearnIt(skill)
        {
            return Object.keys( this.races[ this.character.race ].cannot ).includes( skill.id );
        },

        closeModal()
        {
            this.showedSkill = false;
        },

        showSkillDescription(skill)
        {
            this.showedSkill = skill;
        },

        toggleUnavailableSkills()
        {
            this.showUnavailableSkills = !this.showUnavailableSkills;
        },

        reset()
        {
            if ( this.currentInclination !== 'spells' ) {
                this.character.skills = {};
                this.$app.get('events').emit('character:skills', this.character.skills );
            }

            this.character.spells = {};
            this.$app.get('events').emit('character:spells', this.character.spells );
        },

        incrementSpell( spell )
        {
            if ( this.character.spells[ spell.id ] === undefined ) {
                this.character.spells[ spell.id ] = 0;
            }

            if ( this.character.spells[ spell.id ] < 3 ) {
                this.character.spells[ spell.id ]++;
            }

            this.$set( this.character, 'spells', Object.assign({}, this.character.spells ) );

            this.$app.get('events').emit('character:spells', this.character.spells );
        },

        decrementSpell(spell)
        {
            if ( this.character.spells[ spell.id ] === undefined ) {
                return;
            }

            if ( this.character.spells[ spell.id ] > 0 ) {
                this.character.spells[ spell.id ]--;
            }

            this.$set( this.character, 'spells', Object.assign({}, this.character.spells ) );

            this.$app.get('events').emit('character:spells');

            this.$app.get('events').emit('character:spells', this.character.spells );
        }
    },

    created() {
        this.inclinations = window.__app.inclinations;
        this.spells = window.__app.spells;
        this.races = window.__app.races;
        this.currentInclination = this.character.inclination;
    },
}
</script>

<style lang="scss">
    .panel-skills {
        .container {
            max-width: 940px;
            width: 100%;
            margin: auto;

            .inclinations-list {
                border-bottom: 1px solid #66583C;

                button.item {
                    margin-right: 12px;
                    cursor: pointer;
                    padding: 10px 15px;
                    background-color: transparent;
                    opacity: 1;
                    color: white;
                    text-transform: uppercase;
                    transition: border .3s ease-in, color .3s ease-in, opacity .3s ease-in;
                    border: 0;

                    &:before {
                        content: '';
                        height: 1px;
                        width: calc(50% - 3.49px);
                        position: absolute;
                        bottom: -1px;
                        left: 0;
                        background-image: linear-gradient(to right, #66583c, transparent);
                        transition: background-color .3s ease-in;
                    }

                    &:after {
                        content: '';
                        height: 1px;
                        width: calc(50% - 3.49px);
                        position: absolute;
                        bottom: -1px;
                        right: 0;
                        background-image: linear-gradient(to left, #66583c, transparent);
                        transition: background-color .3s ease-in;
                    }

                    span {
                        &:before {
                            content: '';
                            height: 6px;
                            width: 6px;
                            position: absolute;
                            bottom: -13px;
                            left: 50%;
                            transform: translateX(-50%) rotate(45deg);
                            border-left: 1px solid #66583c;
                            border-top: 1px solid #66583c;
                            transition: border-left-color .3s ease-in, border-top-color .3s ease-in;
                        }

                        &:after {
                            content: '';
                            height: 1px;
                            width: 6px;
                            position: absolute;
                            bottom: -12px;
                            left: 50%;
                            transform: translateX(-50%) translateY(-50%);
                            background-color: #3c3c3c;
                        }
                    }

                    &:hover {
                        color: white;
                    }

                    &.is-active {
                        color: #ffd073;

                        &:before {
                            background-color: #ffd073;
                        }

                        &:after {
                            background-color: #ffd073;
                        }

                        span {
                            &:before {
                                border-left: 1px solid #ffd073;
                                border-top: 1px solid #ffd073;
                            }
                        }
                    }

                    &.is-disabled {
                        pointer-events: none;
                        cursor: default;
                        color: #666666;
                    }
                }

                .character-xp {
                    font-size: 22px;
                    color: #ffd073;
                }

                .character-race {
                    font-size: 22px;
                    color: #ffd073;
                    display: inline-block;
                    padding-right: 10px;

                    &:after {
                        content: '-';
                        display: inline-block;
                        padding-left: 10px;
                    }
                }

                .item.item--right {
                    float: right;
                }

                button:last-of-type, &.item:last-child {
                    margin-right: 0;
                }
            }

            .skills {
                color: white;
                width: 100%;
                height: 27.33rem;
                overflow-y: scroll;
                overflow-x: hidden;
                padding: 20px 14px 20px 20px;
                border: 1px solid #66583C;
                border-top-color: transparent;

                ul {
                    display: flex;
                    flex-flow: row wrap;

                    li {
                        width: calc(100% / 3);
                        padding: 10px;
                    }
                }

                .skill__name {
                    color: white;
                    transition: all .2s ease-in-out;
                    cursor: help;

                    .skill__xp {
                        color: #808080;
                        display: inline-block;
                        padding-left: 2px;

                        strong {
                            font-weight: normal;
                        }

                        &:before {
                            content: '-';
                            display: inline-block;
                            padding-right: 2px;
                        }

                        span + span {
                            &:before {
                                content: '/';
                                color: #808080;
                                display: inline-block;
                                padding: 0 2px;
                            }
                        }

                        .has-learned-it {
                            color: #ffd073;
                        }
                    }

                    &.is-active {
                        color: #ffd073;
                    }
                }

                .skill__checkbox {
                    float: right;
                    margin-left: 4px;
                }
            }

            .spells {
                color: white;
                width: 100%;
                height: 27.33rem;
                overflow-y: scroll;
                overflow-x: hidden;
                padding: 20px 14px 20px 20px;
                border: 1px solid #66583C;
                border-top-color: transparent;

                .spells__rank {
                    &:not(:last-child) {
                        margin-bottom: 20px;
                    }

                    &__title {
                        font-weight: normal;
                        color: #ffd073;
                        padding-left: 10px;
                        margin: 0;
                    }

                    ul {
                        display: flex;
                        flex-flow: row wrap;

                        li {
                            .spell__name {
                                font-size: 16px;
                                transition: all .2s ease-in-out;
                                cursor: help;

                                strong {
                                    font-weight: normal;
                                    color: #ffd073;
                                }

                                &.is-active {
                                    color: #ffd073;
                                }
                            }

                            width: calc(50% - 20px);
                            padding: 10px;

                            &:nth-child(odd) {
                                margin-right: 20px;
                            }

                            &:nth-child(even) {
                                margin-left: 20px;
                            }
                        }
                    }
                }
            }
        }

        .modal {
            position: absolute;
            width: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;

            &__close {
                position: absolute;
                top: 12px;
                left: 10px;
                color: #808080;
                font-size: 26px;
                background-color: transparent;
                border: 0;
                cursor: pointer;
                z-index: 10;
            }

            &__description {
                background-color: rgba(0, 0, 0, 0.9);
                color: white;
                padding: 20px;
                position: absolute;
                width: 55%;
                top: 60%;
                left: 50%;
                transform: translate(-50%, -65%);

                &__content {
                    padding: 10px;
                    line-height: 35px;
                    font-size: 20px;

                    h3 {
                        font-weight: bold;
                        font-size: 26px;
                        color: #ffd073;
                        text-align: center;
                        font-family: 'Della Respira', serif;
                    }

                    .skill__xp {
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

                    &:before {
                        content: '';
                        position: fixed;
                        top: 10px;
                        left: 10px;
                        right: 10px;
                        bottom: 10px;
                        pointer-events: none;
                        border: 1px solid #66583c;
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
                }
            }
        }

        .reset-skills-link {
            margin-top: 10px;
            float: right;
            color: #808080;
            display: inline-block;
            text-decoration: none;
            transition: color .3s ease-in-out;
            background: none;
            border: none;
            cursor: pointer;

            &:hover {
                color: white;
            }
        }

        .unavailable-skills-toggle {
            margin-top: 10px;
            display: inline-block;

            &__link {
                color: #808080;
                display: inline-block;
                margin-right: 20px;
                text-decoration: none;
                transition: color .3s ease-in-out;
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
                    transition: width .3s ease-in-out, background-color .3s ease-in-out;
                }

                &:hover {
                    color: white;

                    &:after {
                        background-color: black;
                    }
                }
            }

            &.is-showed {
                .unavailable-skills-toggle__link:after {
                    width: 100%;
                }
            }
        }

        .checkbox {
            padding: 2px;
            width: 24px;
            height: 24px;
            display: inline-block;
            border: 1px solid #808080;
            transition: border .2s ease-in-out;

            span {
                display: block;
                background-color: rgba(0, 0, 0, 0.5);
                width: 18px;
                height: 18px;
                transform: translate3d(0, 0, 0);
                transition: all .2s ease-in-out;
                color: #ffd073;
                text-align: center;
                line-height: 18px;
                font-size: 14px;
                user-select: none;

                &:before {
                    content: 'X';
                    position: absolute;
                    width: 18px;
                    height: 18px;
                    color: #ffd073;
                    font-family: 'Della Respira', serif;
                    font-weight: normal;
                    font-size: 12px;
                    text-align: center;
                    line-height: 20px;
                    left: 0;
                    opacity: 0;
                    transform: translate3d(0, 0, 0);
                    transition: all .2s ease-in-out;
                }
            }

            &.is-checked {
                border: 1px solid #ffd073;

                span {
                    background-color: black;
                    transform: translate3d(0, 0, 0);
                }
            }

            &.race-can {
                border: 1px solid #ffd073;
                background-color: black;

                span {
                    &:before {
                        content: '+';
                        font-size: 20px;
                        opacity: 1;
                    }
                }
            }

            &.race-cannot {
                span {
                    &:before {
                        content: '‒';
                        color: white;
                        font-size: 18px;
                        opacity: 1;
                        font-weight: bold;
                        line-height: 15px;
                    }
                }
            }

            &:not(.race-can):not(.race-cannot) {
                cursor: pointer;

                &:hover {
                    border: 1px solid white;
                }
            }
        }

        .counter {
            height: 24px;
            display: inline-block;
            float: right;
            margin-left: 4px;

            button {
                background: transparent;
                cursor: pointer;
                display: inline-block;
                width: 24px;
                height: 26px;
                text-align: center;
                vertical-align: top;
                border: 1px solid #808080;
                padding: 2px;
                transition: all .2s ease-in-out;

                span {
                    background-color: rgba(0, 0, 0, 0.5);
                    width: 18px;
                    height: 20px;
                    text-align: center;
                    vertical-align: top;
                    display: inline-block;
                    color: white;
                    line-height: 20px;
                }

                &:hover {
                    border: 1px solid white;
                }
            }

            &__number {
                font-weight: normal;
                color: white;
                display: inline-block;
                width: 24px;
                height: 24px;
                text-align: center;
                vertical-align: top;

                &.is-active {
                    color: #ffd073;
                }
            }
        }
    }
</style>