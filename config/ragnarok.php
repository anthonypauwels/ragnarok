<?php
    return [
        'races' => [
            'human' => [
                'can' => [],
                'cannot' => [],
            ],

            'bondspirit' => [
                'can' => [],
                'cannot' => [],
            ],

            'elf' => [
                'can' => [
                    'weaver', 'archery'
                ],
                'cannot' => [
                    'increased-stamina', 'line-punch'
                ],
            ],

            'faerie' => [
                'can' => [],
                'cannot' => [
                    'increased-stamina', 'gallant'
                ],
            ],

            'hobbit' => [
                'can' => [
                    'gourmet', 'lock-picking'
                ],
                'cannot' => [
                    'heavy-armor', 'two-handed-weapons'
                ],
            ],

            'beastman' => [
                'can' => [
                   'stamina', 'one-handed-weapon', 'two-handed-weapons'
                ],
                'cannot' => [
                    'farmer', 'duelist'
                ],
            ],

            'undead' => [
                'can' => [],
                'cannot' => [],
            ],

            'dwarf' => [
                'can' => [
                    'intermediate-armor', 'brewer'
                ],
                'cannot' => [
                    'gallant', 'swimming'
                ],
            ],

            'greenskin' => [
                'can' => [
                    'increased-stamina', 'restraint'
                ],
                'cannot' => [
                    'surgeon', 'fisherman'
                ],
            ],
        ],

        'inclinations' => [
            'weapons' => [
                'alphabetization' => [
                    'xp' => [3],
                    'specialized' => false,
                ],
                'archery' => [
                    'xp' => [3],
                    'specialized' => false,
                ],
                'two-handed-weapons' => [
                    'xp' => [3],
                    'specialized' => false,
                ],
                'one-handed-weapon' => [
                    'xp' => [1],
                    'specialized' => false,
                ],
                'short-weapon' => [
                    'xp' => [0],
                    'specialized' => false,
                ],
                'polearm' => [
                    'xp' => [3],
                    'specialized' => false,
                ],
                'throwing-weapon' => [
                    'xp' => [1],
                    'specialized' => false,
                ],
                'shooting-weapon' => [
                    'xp' => [3],
                    'specialized' => false,
                ],
                'light-armor' => [
                    'xp' => [2],
                    'specialized' => false,
                ],
                'helmet' => [
                    'xp' => [0],
                    'specialized' => false,
                ],
                'intermediate-armor' => [
                    'xp' => [3],
                    'specialized' => false,
                ],
                'martial-arts' => [
                    'xp' => [1],
                    'specialized' => false,
                ],
                'shield' => [
                    'xp' => [2],
                    'specialized' => false,
                ],
                'lumberjack' => [
                    'xp' => [2],
                    'specialized' => false,
                ],
                'ship-captain' => [
                    'xp' => [4],
                    'specialized' => false,
                ],
                'carrier' => [
                    'xp' => [2],
                    'specialized' => false,
                ],
                'stamina' => [
                    'xp' => [4],
                    'specialized' => false,
                ],
                'gallant' => [
                    'xp' => [1,2,3],
                    'specialized' => false,
                ],
                'sailor' => [
                    'xp' => [1],
                    'specialized' => false,
                ],
                'swimming' => [
                    'xp' => [1],
                    'specialized' => false,
                ],
                'heavy-armor' => [
                    'xp' => [4],
                    'specialized' => true,
                ],
                'skull-crusher' => [
                    'xp' => [4,8,12],
                    'specialized' => true,
                ],
                'holy-blow' => [
                    'xp' => [6,12,18],
                    'specialized' => true,
                ],
                'duelist' => [
                    'xp' => [4,8,12],
                    'specialized' => true,
                ],
                'increased-stamina' => [
                    'xp' => [5],
                    'specialized' => true,
                ],
                'line-punch' => [
                    'xp' => [4,8,12],
                    'specialized' => true,
                ],
            ],

            'craft' => [
                'alphabetization' => [
                    'xp' => [2],
                    'specialized' => false,
                ],
                'farmer' => [
                    'xp' => [2],
                    'specialized' => false,
                ],
                'one-handed-weapon' => [
                    'xp' => [1],
                    'specialized' => false,
                ],
                'short-weapon' => [
                    'xp' => [0],
                    'specialized' => false,
                ],
                'light-armor' => [
                    'xp' => [2],
                    'specialized' => false,
                ],
                'helmet' => [
                    'xp' => [0],
                    'specialized' => false,
                ],
                'gunner' => [
                    'xp' => [2],
                    'specialized' => false,
                ],
                'artisan' => [
                    'xp' => [2],
                    'specialized' => false,
                ],
                'martial-arts' => [
                    'xp' => [1,3,4],
                    'specialized' => false,
                ],
                'bard' => [
                    'xp' => [4],
                    'specialized' => false,
                ],
                'brewer' => [
                    'xp' => [2],
                    'specialized' => false,
                ],
                'cooking' => [
                    'xp' => [1],
                    'specialized' => false,
                ],
                'gallant' => [
                    'xp' => [1,2,3],
                    'specialized' => false,
                ],
                'nurse' => [
                    'xp' => [3],
                    'specialized' => false,
                ],
                'sailor' => [
                    'xp' => [1],
                    'specialized' => false,
                ],
                'swimming' => [
                    'xp' => [1],
                    'specialized' => false,
                ],
                'fisherman' => [
                    'xp' => [2],
                    'specialized' => false,
                ],
                'bonesetters' => [
                    'xp' => [2],
                    'specialized' => false,
                ],
                'armourer' => [
                    'xp' => [4],
                    'specialized' => true,
                ],
                'shipwright' => [
                    'xp' => [4],
                    'specialized' => true,
                ],
                'surgeon' => [
                    'xp' => [4],
                    'specialized' => true,
                ],
                'blacksmith' => [
                    'xp' => [4],
                    'specialized' => true,
                ],
                'gourmet' => [
                    'xp' => [3],
                    'specialized' => true,
                ],
                'engineer' => [
                    'xp' => [4],
                    'specialized' => true,
                ],
                'liquorist' => [
                    'xp' => [4],
                    'specialized' => true,
                ],
                'doctor' => [
                    'xp' => [4],
                    'specialized' => true,
                ],
                'taillandier' => [
                    'xp' => [4],
                    'specialized' => true,
                ],
            ],

            'occult' => [
                'alphabetization' => [
                    'xp' => [1],
                    'specialized' => false,
                ],
                'apothecary' => [
                    'xp' => [4],
                    'specialized' => false,
                ],
                'two-handed-weapons' => [
                    'xp' => [3],
                    'specialized' => false,
                ],
                'one-handed-weapon' => [
                    'xp' => [1],
                    'specialized' => false,
                ],
                'short-weapon' => [
                    'xp' => [0],
                    'specialized' => false,
                ],
                'light-armor' => [
                    'xp' => [2],
                    'specialized' => false,
                ],
                'helmet' => [
                    'xp' => [0],
                    'specialized' => false,
                ],
                'gatherer' => [
                    'xp' => [2],
                    'specialized' => false,
                ],
                'gallant' => [
                    'xp' => [1,2,3],
                    'specialized' => false,
                ],
                'gleaner' => [
                    'xp' => [2],
                    'specialized' => false,
                ],
                'herbalist' => [
                    'xp' => [3],
                    'specialized' => false,
                ],
                'sailor' => [
                    'xp' => [1],
                    'specialized' => false,
                ],
                'mystique' => [
                    'xp' => [3],
                    'specialized' => false,
                ],
                'swimming' => [
                    'xp' => [1],
                    'specialized' => false,
                ],
                'sufferint' => [
                    'xp' => [4],
                    'specialized' => false,
                ],
                'alchemy' => [
                    'xp' => [5],
                    'specialized' => true,
                ],
                'enchanter' => [
                    'xp' => [4],
                    'specialized' => true,
                ],
                'gri-gri' => [
                    'xp' => [1,2,3],
                    'specialized' => true,
                ],
                'esotericist' => [
                    'xp' => [3],
                    'specialized' => true,
                ],
                'summoner' => [
                    'xp' => [6],
                    'specialized' => true,
                ],
                'weaver' => [
                    'xp' => [4],
                    'specialized' => true,
                ],
            ],

            'shadow' => [
                'alphabetization' => [
                    'xp' => [3],
                    'specialized' => false,
                ],
                'archery' => [
                    'xp' => [3],
                    'specialized' => false,
                ],
                'one-handed-weapon' => [
                    'xp' => [1],
                    'specialized' => false,
                ],
                'short-weapon' => [
                    'xp' => [0],
                    'specialized' => false,
                ],
                'throwing-weapon' => [
                    'xp' => [1],
                    'specialized' => false,
                ],
                'shooting-weapon' => [
                    'xp' => [3],
                    'specialized' => false,
                ],
                'light-armor' => [
                    'xp' => [2],
                    'specialized' => false,
                ],
                'helmet' => [
                    'xp' => [0],
                    'specialized' => false,
                ],
                'intermediate-armor' => [
                    'xp' => [3],
                    'specialized' => false,
                ],
                'knockout' => [
                    'xp' => [3],
                    'specialized' => false,
                ],
                'hunter' => [
                    'xp' => [2],
                    'specialized' => false,
                ],
                'garbage-collector' => [
                    'xp' => [2],
                    'specialized' => false,
                ],
                'scout' => [
                    'xp' => [3],
                    'specialized' => false,
                ],
                'stamina' => [
                    'xp' => [4],
                    'specialized' => false,
                ],
                'restraint' => [
                    'xp' => [2],
                    'specialized' => false,
                ],
                'gallant' => [
                    'xp' => [1,2,3],
                    'specialized' => false,
                ],
                'infiltration' => [
                    'xp' => [2],
                    'specialized' => false,
                ],
                'miner' => [
                    'xp' => [2],
                    'specialized' => false,
                ],
                'swimming' => [
                    'xp' => [1],
                    'specialized' => false,
                ],
                'sapper' => [
                    'xp' => [2],
                    'specialized' => false,
                ],
                'assassinat' => [
                    'xp' => [8],
                    'specialized' => true,
                ],
                'pirate-captain' => [
                    'xp' => [4],
                    'specialized' => true,
                ],
                'cut-throat' => [
                    'xp' => [3,6,9],
                    'specialized' => true,
                ],
                'lock-picking' => [
                    'xp' => [4],
                    'specialized' => true,
                ],
                'pirate' => [
                    'xp' => [2],
                    'specialized' => true,
                ],
                'tormentor' => [
                    'xp' => [3],
                    'specialized' => true,
                ],
                'thievery' => [
                    'xp' => [2],
                    'specialized' => true,
                ],
            ]
        ],

        'spells' => [
            1 => [
                'enchanted-weapon',
                'kindness',
                'squall',
                'celerity',
                'voice-extinction',
                'poison-immunity',
                'clumsiness',
                'talk-with-the-dead',
                'magic-healing',
            ],

            2 => [
                'amnesia',
                'animated-dead',
                'repulsion-aura',
                'blindness',
                'magic-shield',
                'bohemian-dance',
                'tangle',
                'fear',
                'repair',
                'sleep',
            ],

            3 => [
                'berserk',
                'dispel-magic',
                'strength-of-the-nature',
                'frost',
                'laceration',
                'animal-bond',
                'painting-of-the-bear',
                'protection-pentacle',
                'treason',
            ],

            4 => [
                'awakening-from-dead',
                'gift-of-life',
                'mass-berserk',
                'mass-strike-down',
                'mass-dance',
                'mass-fear',
                'mass-glue',
                'mass-mute',
                'pentacle-of-power',
                'regenerate',
            ]
        ]
    ];