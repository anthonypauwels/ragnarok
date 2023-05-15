<?php
    return [
        'enchanted-weapon' => [
            'name' => 'Enchanted weapon',
            'target' => 'a weapon hit by the weaver',
            'injunction' => '« enchanted » when hitting with the weapon',
            'duration' => '1 hour',
            'description' => 'each strike with the weapon announces « enchanted ».',
            'image' => 'icons/magic-axe.svg',
        ],

        'kindness' => [
            'name' => 'Kindness',
            'target' => 'a character visible and less than 10 meters away',
            'injunction' => '« friend »',
            'duration' => '1 hour ou until the weaver commits a hostile act towards the target',
            'description' => 'The target regards the weaver as a friend, which does not prevent him from keeping his free will. Do not walk on animals.',
            'image' => 'icons/heart-inside.svg',
        ],

        'squall' => [
            'name' => 'Squall',
            'target' => 'the guardian responsible for naval movement',
            'description' => 'The weaver can determine the direction of the wind.',
            'image' => 'icons/wind-slap.svg',
        ],

        'celerity' => [
            'name' => 'Celerity',
            'target' => 'the weaver',
            'description' => 'the weaver can join a group going to a harvest field or a scenario area without paying Labor.',
            'image' => 'icons/wind-hole.svg',
        ],

        'voice-extinction' => [
            'name' => 'Voice extinction',
            'target' => 'a character visible and less than 10 meters away',
            'injunction' => '« mute »',
            'duration' => '1 hourglass turn',
            'description' => 'the target is unable to speak for the duration of the spell (this prevents weavers from casting their spells).',
            'image' => 'icons/silenced.svg',
        ],

        'poison-immunity' => [
            'name' => 'Poison immunity',
            'target' => 'a character touched by the weaver',
            'injunction' => '« resist » if one absorbs poison or if one is struck by a poisoned weapon (announces “toxic”)',
            'duration' => '1 hour',
            'description' => 'The target is cured of poison (as if taking an antidote) and immune to poisons.',
            'image' => 'icons/heart-bottle.svg',
        ],

        'clumsiness' => [
            'name' => 'Clumsiness',
            'target' => 'a person within 10 meters',
            'injunction' => '« disarm »',
            'description' => 'The target drops whatever it has in both hands.',
            'image' => 'icons/drop-weapon.svg',
        ],

        'talk-with-the-dead' => [
            'name' => 'Talk with the dead',
            'target' => 'a dying person (0 HP) or a dead person for less than an hour, touched by the weaver',
            'duration' => '1 hourglass turn',
            'description' => 'the target answers the truth to the questions of the weaver ONLY with YES or NO.',
            'image' => 'icons/half-dead.svg',
        ],

        'magic-healing' => [
            'name' => 'Magic healing',
            'target' => 'the patient touched by the weaver',
            'description' => 'the healer heals 1 HP at a location (whether it is a light or serious wound) OR his action counts as a common remedy for the treatment of a disease.',
            'image' => 'icons/healing.svg',
        ],

        'amnesia' => [
            'name' => 'Amnesia',
            'target' => 'a character in sight within 10 meters',
            'injunction' => '« amnesia »',
            'duration' => 'until sunrise or sunset',
            'description' => 'The target no longer remembers what happened during the last quarter of an hour. The target recovers these erased memories at the next sunrise or sunset.',
            'image' => 'icons/coma.svg',
        ],

        'animated-dead' => [
            'name' => 'Animated dead',
            'target' => 'a corpse in contact',
            'injunction' => '« animate dead »',
            'duration' => '1 hour',
            'description' => 'the target rises as a zombie and serves the necromancer for the spell’s duration. He keeps his abilities
(including it’s hit point base), but cannot use magic and cannot run. It is impossible to revive the same person twice.
corpse. After the hour of effect of the spell or if it’s hit points fall to 0, the character falls again in agony.',
            'image' => 'icons/half-body-crawling.svg',
        ],

        'repulsion-aura' => [
            'name' => 'Repulsion aura',
            'target' => 'the weaver',
            'injunction' => '« resist » when he receives a projectile',
            'duration' => '1 hour',
            'description' => 'the weaver is immune to projectiles (not immune to magic projectiles or war machines).',
            'image' => 'icons/aura.svg',
        ],

        'blindness' => [
            'name' => 'Blindness',
            'target' => 'a character in sight within 10 meters',
            'injunction' => '« blind »',
            'duration' => '1 hourglass turn',
            'description' => 'the target closes it’s eyes for the duration of the spell.',
            'image' => 'icons/sight-disabled.svg',
        ],

        'magic-shield' => [
            'name' => 'Magic shield',
            'target' => 'the weaver',
            'duration' => 'until the first spell received by the target. Announces “resist” when the spell is blocked',
            'description' => 'the weaver is immune to the first spell targeted, even if it is beneficial.',
            'image' => 'icons/magic-shield.svg',
        ],

        'bohemian-dance' => [
            'name' => 'Bohemian dance',
            'target' => 'a character visible and less than 10 meters away',
            'injunction' => '« dance »',
            'duration' => '1 hourglass turn',
            'description' => 'the target dances.',
            'image' => 'icons/zigzag-tune.svg',
        ],

        'tangle' => [
            'name' => 'Tangle',
            'target' => 'a character visible and less than 10 meters away',
            'injunction' => '« glue »',
            'duration' => '1 hourglass turn',
            'description' => 'the target is unable to lift it’s feet for the duration of the spell.',
            'image' => 'icons/root-tip.svg',
        ],

        'fear' => [
            'name' => 'Fear',
            'target' => 'a character visible and less than 10 meters away',
            'injunction' => '« fear »',
            'duration' => '1 hourglass turn',
            'description' => 'the target flees as far as possible from the weaver, it cannot in any case return within 10 meters 
of the spellcaster during the duration of the spell.',
            'image' => 'icons/terror.svg',
        ],

        'repair' => [
            'name' => 'Repar',
            'target' => 'an object touched by the weaver',
            'description' => 'the affected object is immediately repaired. If it is armor, it covers all it’s points of protection. 
This spell only works on transportable objects, so not on doors, ship hulls or other...',
            'image' => 'icons/lightning-spanner.svg',
        ],

        'sleep' => [
            'name' => 'Sleep',
            'target' => 'a character visible and less than 10 meters away',
            'injunction' => '« sleep »',
            'duration' => '1 hourglass turn',
            'description' => 'the target falls asleep instantly and is not awakened until the end of an hourglass or if it takes damage.',
            'image' => 'icons/night-sleep.svg',
        ],

        'berserk' => [
            'name' => 'Berserk',
            'target' => 'a person (without armour) tattooed on the forehead by the weaver',
            'duration' => '1 hour',
            'description' => 'the target tattooed by the spell sees it’s life points multiplied by 2, it attacks it’s closest enemies and can no longer flee the fight
even if forced to do so by another spell. The same character cannot be the target of more than one tattoo at a time. However, this spell can be cast several times on the same person.',
            'image' => 'icons/enrage.svg',
        ],

        'dispel-magic' => [
            'name' => 'Dispel magic',
            'target' => 'a target (character or object) visible and less than 10 meters away',
            'injunction' => '« dispel »',
            'description' => 'all spells and potion effects that affect the target or it’s equipment are automatically dispelled.',
            'image' => 'icons/rolling-energy.svg',
        ],

        'strength-of-the-nature' => [
            'name' => 'Strength of the nature',
            'target' => 'the weaver',
            'duration' => '1 hour',
            'description' => 'the weaver gains 2 additional life points per location (you cannot exceed 3 HP per location regardless of the effects
cumulative). Additionally, if he fights with a two-handed weapon (not a polearm), he can announce a “crush” and a “strike down”.',
            'image' => 'icons/evil-tree.svg',
        ],

        'frost' => [
            'name' => 'Frost',
            'target' => 'a character hit by the weaver’s (blue) magic projectile',
            'injunction' => '« paralyze »',
            'duration' => '1 hourglass turn',
            'description' => 'the target is paralyzed for the duration of the spell.',
            'image' => 'icons/ice-spell-cast.svg',
        ],

        'laceration' => [
            'name' => 'Laceration',
            'target' => 'a character hit by the magic projectile (red)',
            'injunction' => '« blast »',
            'description' => 'the target suffers 1 point of damage at each of it’s locations (the armor can therefore absorb this damage).',
            'image' => 'icons/fire-spell-cast.svg',
        ],

        'animal-bond' => [
            'name' => 'Animal bond',
            'target' => 'an “animal” within 10 meters',
            'injunction' => '« friend »',
            'duration' => '3 hourglass turns',
            'description' => 'the targeted animal or beastman becomes friends with the caster. (this spell works much better on non-humanoid animals), 
some animals are immune to this spell.',
            'image' => 'icons/paw-print.svg',
        ],

        'painting-of-the-bear' => [
            'name' => 'Painting of the bear',
            'target' => 'a character touched by the weaver',
            'duration' => 'until the end of the day or until the tattoo fades',
            'description' => 'the weaver covers an unarmoured part of the target’s body with warpaint. Painted locations gain 1 life point
  additional. You cannot exceed three hit points per location, regardless of the cumulative effects.',
            'image' => 'icons/ceremonial-mask.svg',
        ],

        'protection-pentacle' => [
            'name' => 'Protection pentacle',
            'target' => 'the weaver',
            'injunction' => '« resist » if the weaver is the target of an opposing spell',
            'duration' => 'maximum 1 hour, if the weaver leaves his pentacle, the spell automatically dissipates',
            'description' => 'the weaver draws a pentacle with a maximum diameter of 2 meters, he casts the spell and becomes 
immune to all enemy spells as long as he remains in his pentacle.',
            'image' => 'icons/pentacle.svg',
        ],

        'treason' => [
            'name' => 'Treason',
            'target' => 'a character visible and less than 10 meters away',
            'injunction' => '« treason »',
            'duration' => '1 hourglass turn',
            'description' => 'the target turns against the weaver’s enemies.',
            'image' => 'icons/cloak-dagger.svg',
        ],

        'awakening-from-dead' => [
            'name' => 'Awakening from dead',
            'target' => 'a corpse touched by the necromancer',
            'injunction' => '« animate dead »',
            'duration' => '1 hour',
            'description' => 'can only be cast with Life Stones !<br/>The necromancer can transform all the corpses he touches into zombies, 
which follow his directives for 1 hour. Zombies keep the physical abilities they had when they were alive (including base hit points) 
but cannot run or use magic. It is impossible to revive the same corpse twice. After the effective time of spell or if his life points drop to 0, 
the character again falls dead (he becomes a spirit again).',
            'image' => 'icons/shambling-zombie.svg',
        ],

        'gift-of-life' => [
            'name' => 'Gift of life',
            'target' => 'a character dead for less than an hour',
            'duration' => 'permanent',
            'description' => 'a CONSENTING person agrees to give his life (= to be eradicated) to raise another. This cannot be 
the target of this comes out only once in it’s entire existence. Does not work with a spirit, reanimated body, zombie, or person constrained in any way.',
            'image' => 'icons/life-in-the-balance.svg',
        ],

        'mass-berserk' => [
            'name' => 'Mass « berserk »',
            'target' => 'up to 5 unarmored characters hit by the weaver',
            'duration' => '1 hour',
            'description' => 'can only be cast with Life Stones !<br/>Targets tattooed with the spell see their life points multiplied by 2, 
they attack their closest enemies and can no longer flee the fight even if they are forced to do so by another spell. The same character cannot be 
the target of more than one berserk spell per day.<br/>N.B.: This spell cannot be used in a fight, the characters under the effect of the spell have 
an irrepressible desire to kill their enemies, they will do everything to achieve this. Therefore, combat rules take precedence over brawl rules when 
a character is hit by the effect.',
            'image' => 'icons/dark-squad.svg',
        ],

        'mass-strike-down' => [
            'name' => 'Mass « strike down »',
            'target' => 'all characters in front of the weaver and within 10 meters',
            'injunction' => '« mass Strike down »',
            'description' => 'can only be cast with Life Stones !<br/>La cible est repoussée de 3 pas et doit s’asseoir 
les fesses contre le sol avant de pouvoir se relever (même si l’attaque est parée par un bouclier ou une arme). Attention au risque de piétinement.',
            'image' => 'icons/falling.svg',
        ],

        'mass-dance' => [
            'name' => 'Mass « dance »',
            'target' => 'all characters in front of the weaver and within 10 meters',
            'injunction' => '« mass dance »',
            'duration' => '1 hourglass turn',
            'description' => 'can only be cast with Life Stones !<br/>The targets dance.',
            'image' => 'icons/love-song.svg',
        ],

        'mass-fear' => [
            'name' => 'Mass « fear »',
            'target' => 'all characters in front of the weaver and within 10 meters',
            'injunction' => '« mass fear »',
            'duration' => '1 hourglass turn',
            'description' => 'can only be cast with Life Stones !<br/>The targets flee as far as possible from the weaver, 
they can never come back within ten meters of the spellcaster for the duration of the spell.',
            'image' => 'icons/screaming.svg',
        ],

        'mass-glue' => [
            'name' => 'Mass « glue »',
            'target' => 'all characters in front of the weaver and within 10 meters',
            'injunction' => '« mass glue »',
            'duration' => '1 hourglass turn',
            'description' => 'can only be cast with Life Stones !<br/>Targets are unable to move their feet for the duration of the spell.',
            'image' => 'icons/sticky-boot.svg',
        ],

        'mass-mute' => [
            'name' => 'Mass « mute »',
            'target' => 'all characters in front of the weaver and within 10 meters',
            'injunction' => '« mass mute »',
            'duration' => '1 hourglass turn',
            'description' => 'can only be cast with Life Stones !<br/>Targets are unable to speak for the duration of the spell.',
            'image' => 'icons/mute.svg',
        ],

        'pentacle-of-power' => [
            'name' => 'Pentacle of power',
            'target' => 'the weaver',
            'duration' => '1 hour or until the weaver leaves it’s pentacle or takes damage, in which case the spell wears off',
            'description' => 'the weaver draws a pentacle with a maximum diameter of 2 meters in which he must put himself inside and he casts his spell. 
From this moment, the weaver can take life points from anyone in his pentacle (himself, a prisoner or a volunteer). It converts 2 life points 
into 1 “virtual” life stone. He can thus convert life points several times into positive virtual life stones. The stones of life thus gained
must all be used simultaneously to cast a spell. This conversion must therefore be done before each new spell cast.<br/>
The same character can only give life points once in a given power pentacle.<br/>You must dispel a Pentacle before you can cast a new one.',
            'image' => 'icons/pentagram-rose.svg',
        ],

        'regenerate' => [
            'name' => 'Regenerate',
            'target' => 'the patient touched by the weaver',
            'description' => 'the healer instantly heals his patient (restores all hit points at all locations whether the wounds are light or serious). Does not work on diseases.',
            'image' => 'icons/regeneration.svg',
        ],
    ];
