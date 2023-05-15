<?php
    return [
        'farmer' => [
            'name' => 'Farmer',
            'description' => 'Characters with this skill can harvest raw materials “cereal” and precious materials “malting barley”.',
            'image' => 'icons/farmer.svg',
        ],

        'alphabetization' => [
            'name' => 'Alphabetization',
            'description' => 'People with this skill can read and write in the languages used in the known lands. There are also forms of writing 
that require research before they can be translated.',
            'image' => 'icons/book-cover.svg',
        ],

        'alchemy' => [
            'name' => 'Alchemy',
            'description' => 'This skill allows the character to craft alchemical potions (consumables) with surprising effects 
that can be kept year after year. Alchemical creations require a TI lab with utensils like mortars, scales, retorts, coolers, etc. 
in order to be able to simulate the brewing potions. Each potion requires 4 hourglass turns during which the preparation must be simulated and a number of resources.',
            'image' => 'icons/cauldron.svg',
        ],

        'apothecary' => [
            'name' => 'Apothecary',
            'description' => 'This skill allows the character to craft drugs and poisons. The creations apothecary require an TI lab with 
utensils such as mortars, scales, retorts, chillers, etc in order to be able to simulate the preparation of drugs and potions. Each drug or 
poison requires 2 hourglass turns of preparation and a number of resources.',
            'image' => 'icons/apothecary.svg',
        ],

        'archery' => [
            'name' => 'Archery',
            'description' => 'The “archery” skill allows you to use a bow with a maximum tension of 25 pounds and
requires the use of standardized arrows provided by the organization. The archer can have a maximum of 10 arrows in his quiver.
This skill is subject to an increase in the registration fee of €10 for the rental of arrows. It is possible to find
places to buy TI arrows to refill your quiver if you don’t collect enough. Arrows do "through" damage
except on heavy armor which overlaps mesh and flat. Note: it will be mandatory to pass an archery test on site before receiving your arrows.',
            'image' => 'icons/archer.svg',
        ],

        'two-handed-weapons' => [
            'name' => 'Two handed weapons',
            'description' => 'Characters with this skill can wield weapons between 110 and 150 centimeters in length at most.
A two-handed weapon must be wielded with both hands simultaneously and is essential to be able to use skills such as skull-crusher (crush) and
strike-down.',
            'image' => 'icons/two-handed-sword.svg',
        ],

        'one-handed-weapon' => [
            'name' => 'One handed weapons',
            'description' => 'Characters with this skill can wield weapons up to 110 centimeters long (except flails of maximum 130 cm).',
            'image' => 'icons/gladius.svg',
        ],

        'short-weapon' => [
            'name' => 'Short weapon',
            'description' => 'Characters with this skill can wield weapons up to 60 centimeters long.',
            'image' => 'icons/plain-dagger.svg',
        ],

        'polearm' => [
            'name' => 'Polearm',
            'description' => 'Characters with this skill can wield weapons included
between 150 and 250 centimeters long at most. A polearm must be wielded
with both hands simultaneously. A polearm does NOT allow the use of skills such as
skull-breaker (crush) and strike-down.',
            'image' => 'icons/halberd.svg',
        ],

        'throwing-weapon' => [
            'name' => 'Throwing weapon',
            'description' => 'Characters with this skill know how to use the knives of
jet, shurikens, throwing axes, javelins, pebbles, bottles, etc.',
            'image' => 'icons/thrown-daggers.svg',
        ],

        'shooting-weapon' => [
            'name' => 'Shooting weapon',
            'description' => 'Characters with this skill know how to use crossbows
(exempt from bandolier rules), pistols (nerf) or arquebuses (nerf). There
skill "shooting weapon" allows the use of "nerf" type weapons as long as they are
looked. Permitted nerf type weapons are those that have no magazine or tape
of supply and which can only receive one cartridge at a time in the barrel.',
            'image' => 'icons/blunderbuss.svg',
        ],

        'light-armor' => [
            'name' => 'Light armor',
            'description' => 'Allows the wearing of hard leather armor (soft leather does not grant any
protection) or a gambeson which gives 1 point of protection.',
            'image' => 'icons/leather-vest.svg',
        ],

        'intermediate-armor' => [
            'name' => 'Intermediate armor',
            'description' => 'Allows the wearing of rigid leather armor studded or reinforced with metal and
of chain mail which gives 2 points of protection.',
            'image' => 'icons/leather-armor.svg',
        ],

        'heavy-armor' => [
            'name' => 'Heavy armor',
            'description' => 'Allows the wearing of plate armour, metallic scales, shells that
gives 3 points of protection. Prevents the use of the swim skill.',
            'image' => 'icons/shoulder-armor.svg',
        ],

        'armourer' => [
            'name' => 'Armourer',
            'description' => 'Characters with this skill know how to repair damaged armor. For this
to do, the gunsmith needs TI equipment such as needles and thread, rivets, a hammer and a
anvil, etc. The armourer must simulate the repair of the armor at the rate of one hourglass per point
of armor missing. Other than time spent, no resources are needed to repair armor.',
            'image' => 'icons/anvil-impact.svg',
        ],

        'gunner' => [
            'name' => 'Gunner',
            'description' => 'Characters with this skill have been trained in the handling of
headquarters and the most diverse war machines. They know how to use these gears.',
            'image' => 'icons/cannon.svg',
        ],

        'artisan' => [
            'name' => 'Artisan',
            'description' => 'Characters with this skill can produce masterpieces (sculpture,
painting, sewing, jewelry, etc.).',
            'image' => 'icons/crafting.svg',
        ],

        'martial-arts' => [
            'name' => 'Martial arts',
            'description' => 'Characters with this skill have learned to fight with their bare hands. Each level of the
Martial Arts skill gives a +1 brawl point bonus (see 2.8 Brawling). Level
3 of the Martial Arts skill also allows you to inflict a serious injury on one of the 4 limbs
of his opponent even in the event of defeat (the character announces it during the tussle just after his fight score).',
            'image' => 'icons/high-kick.svg',
        ],

        'assassinat' => [
            'name' => 'Assassinat',
            'description' => 'Characters with this skill can assassinate another character x times per event (x = level).<br/><br/>
To assassinate someone, you have to give them two consecutive blows with a short weapon (max 60 cm)
in the torso. It is not until the second blow that the assassin pronounces the announcement "Dead", the victim
immediately becomes a spirit without leaving a corpse. If the assassin fails to give his
second blow to his victim, the assassination is aborted and the assassin can no longer attempt his crime.<br/><br/>
Some special creatures are not assassinable.',
            'image' => 'icons/blade-bite.svg',
        ],

        'knockout' => [
            'name' => 'Knockout',
            'description' => 'Characters with this skill are able to render a character unconscious by
hitting him, from behind (from behind), a SMALL blow on the top of the skull with a short weapon.
The “PAF” announcement must be audible to the target. Wearing a HELMET prevents knocking out.
The target is stunned for 2 hourglass turns (6 minutes). A character cannot stun more than one
person per hourglass.',
            'image' => 'icons/knockout.svg',
        ],

        'bard' => [
            'name' => 'Bard',
            'description' => 'Characters with this skill are able to make representations that
allow part of their audience to regain their enthusiasm.<br/><br/>
When at least 2 bards play a performance together (musical, theatrical, declamation,
performance, etc.) per 5 hourglass turns (15 min.), they save 1 manpower
to a character from their audience (randomly chosen by a Guardian). For every bard
who participates in the performance, 1 additional workforce is generated for the audience at the end of the performance.',
            'image' => 'icons/harp.svg',
        ],

        'shield' => [
            'name' => 'Shield',
            'description' => 'Characters with this skill have been trained to use all types of shields.',
            'image' => 'icons/attached-shield.svg',
        ],

        'brewer' => [
            'name' => 'Brewer',
            'description' => 'Characters with this knowledge know how to make alcoholic beverages.
These drinks do not have to be really alcoholic. We can thus create a hot chocolate which will have the effects
time-in of an alcoholic drink. When a player drinks one of these drinks, he receives a certain number of alcoholism points
depending on the type of drink he is drinking. Each brew requires 4 hourglass turns for preparation simulation.',
            'image' => 'icons/beer-stein.svg',
        ],

        'skull-crusher' => [
            'name' => 'Skull-crusher',
            'description' => 'Characters with this talent know how to channel their strength into devastating blows; they
may, x times per day (x = level) (between two sunrises), announce “CRUSH” during a
struck. This ability can only be used with a two-handed weapon (between 110cm and 150cm, not a polearm).',
            'image' => 'icons/skull-crack.svg',
        ],

        'lumberjack' => [
            'name' => 'Lumberjack',
            'description' => 'Characters with this skill can harvest “wood” raw materials and materials
precious “precious woods”.',
            'image' => 'icons/axe-in-stump.svg',
        ],

        'helmet' => [
            'name' => 'Helmet',
            'description' => 'In order to encourage participants to protect their heads, any character can wear a helmet without
possess the “armor” skill. This helmet offers, like armor, from 1 to 3 points of armor
depending on the type of helmet at the head location (which cannot be deliberately aimed). Moreover, the
Wearing a helmet immune to knockdown (“paf” announcement).',
            'image' => 'icons/viking-helmet.svg',
        ],

        'ship-captain' => [
            'name' => 'Ship captain',
            'description' => 'A ship’s captain can participate in the maneuver of a ship and direct it. When participating in the maneuver, he cannot use a shield.',
            'image' => 'icons/ship-wheel.svg',
        ],

        'pirate-captain' => [
            'name' => 'Pirate captain',
            'description' => 'A pirate captain can participate in the maneuver of a ship and lead it Battles
naval). While participating in the maneuver, he cannot use a shield.<br/><br/>
In addition, a pirate captain does not count towards the maximum number of people on board the ship.',
            'image' => 'icons/pirate-captain.svg',
        ],

        'carrier' => [
            'name' => 'Carrier',
            'description' => 'Characters with this skill can harvest “rock” raw materials and
precious “gem” materials.',
            'image' => 'icons/stone-block.svg',
        ],

        'shipwright' => [
            'name' => 'Shipwright',
            'description' => 'Characters with this skill know how to repair hit points lost by
ships damaged in naval combat. Each shipwright can recover 1
hit point per hourglass spent repairing the ship by spending 3 “wood” raw materials
per dot. Repair is possible while on board the boat.<br/><br/>
Shipwrights are capable of sabotaging ships.<br/><br/>
A shipwright counts as a sailor for maneuvering a ship.<br/><br/>
Shipwrights can upgrade ships.<br/><br/>
All shipwright upgrades require 10 simulation hourglass turns of
manufacture.<br/><br/>
All shipwright upgrades are valid for 3 years (current year +2).',
            'image' => 'icons/ship-bow.svg',
        ],

        'hunter' => [
            'name' => 'Hunter',
            'description' => 'Characters with this skill can harvest “game” raw materials and
valuable “fur” materials on dead animals.',
            'image' => 'icons/hunting-horn.svg',
        ],

        'surgeon' => [
            'name' => 'Surgeon',
            'description' => 'Characters with this knowledge are able to heal serious wounds suffered
by another character (they cannot heal themselves). The surgeon must simulate
during 1 hourglass turn the heavy care he provides to his patient using compresses
blood, needle and thread, scalpels, etc. When the hourglass is up, the location
healed recovers 1 HP (it goes from 0 to 1). A surgeon cannot heal beyond the first HP.',
            'image' => 'icons/scalpel.svg',
        ],

        'holy-blow' => [
            'name' => 'Holy blow',
            'description' => 'Characters with this talent are particularly pious and can receive divine aid
when fighting if they meet the following conditions:<br/><br/>
- Each sacred blow is preceded by an announcement "in the name of [name of the god]!"<br/>
- the character must attend a mass or participate in a ceremony dedicated to the god(s)
concerned at least once per event.<br/><br/>
If the character complies with these conditions, and only in this case, he can, x times per day
(x = level) (between two sunrises), strike with the announcement “HOLY”. These strikes
affect almost all creatures in Ragnarok.',
            'image' => 'icons/spiral-thrust.svg',
        ],

        'cut-throat' => [
            'name' => 'Cut-throat',
            'description' => 'Characters with this skill are able to find the flaw in the best
armors. The hamstrings can, x times a day (x = level) (between two sunrises),
call out “THROUGH” when hitting their victim in the back with a short weapon no longer than 60 cm.',
            'image' => 'icons/curvy-knife.svg',
        ],

        'lock-picking' => [
            'name' => 'Lock-picking',
            'description' => 'Characters with this skill are able to break through padlocks in order to open doors.
locks. To do this, they must simulate using tools, nightingales, etc. during 1 hourglass turn the opening of the
padlock in question. At the end of the hourglass, the pickpeater can remove a single padlock card from the
lock he is working on. Several padlock cards can be affixed to the same lock
to symbolize his difficulty. The padlock is not destroyed by picking.',
            'image' => 'icons/lockpicks.svg',
        ],

        'gatherer' => [
            'name' => 'Gatherer',
            'description' => 'Characters with this skill can harvest “vegetable” raw materials and
“rare plant” precious materials.',
            'image' => 'icons/sickle.svg',
        ],

        'cooking' => [
            'name' => 'Cooking',
            'description' => 'Characters with this skill are capable of preparing excellent dishes. A meal
served by a cook cannot be poisoned. The meal must be plentiful, and eaten at the cook’s.',
            'image' => 'icons/camp-cooking-pot.svg',
        ],

        'duelist' => [
            'name' => 'Duelist',
            'description' => 'Characters with this talent are able to find flaws in the best armor. They
may, x times per day (x = level) (between two sunrises), announce “TROUGH” during a
struck. This ability can only be used with a one-handed weapon (sword type of max 110 cm).',
            'image' => 'icons/sabers-choc.svg',
        ],

        'garbage-collector' => [
            'name' => 'Garbage collector',
            'description' => 'Characters with this skill can exchange a bag of trash (time-out) for 1
raw material at random (time-in) by going to the Standard of the Grand Bazaar which is responsible for
have them evacuated to “the landfill” (garbage container). Rubbish must be transported in a timely manner, for example in a wooden wheelbarrow, in a hessian bag, etc. The bag or other must be able to
contain an 80 liter garbage bag.',
            'image' => 'icons/trash-can.svg',
        ],

        'scout' => [
            'name' => 'Scout',
            'description' => 'Characters with this skill can enter the battlefield and the
scenario area before the other characters. The scouts have 5 hourglass turns to spot the
places before anyone is allowed onto the battlefield. They can thus
inform the caravan they are working for of the location of the objectives to be taken, the forces present, etc.',
            'image' => 'icons/run.svg',
        ],

        'enchanter' => [
            'name' => 'Enchanter',
            'description' => 'Characters with the "Enchanter" skill are able to channel the essence
magic in various and varied objects. Their studies of magic allow them to integrate
spells in an object of "good quality" so that everyone can trigger them.',
            'image' => 'icons/fairy-wand.svg',
        ],

        'stamina' => [
            'name' => 'Stamina',
            'description' => 'Characters with this skill are more resistant than average: they have 1 life point
bonus at each location (up to a maximum of 3VP per location).',
            'image' => 'icons/strong.svg',
        ],

        'increased-stamina' => [
            'name' => 'Increased stamina',
            'description' => 'Characters with this skill have trained their bodies through intense effort
physical: they have 1 additional life point at each location (up to a maximum
of 3PV per location).<br/><br/>
Endurance and Increased Endurance can be taken independently of each other. Each of
these skills allow you to have + 1 PV/loc, so there is only if you have both skills
that the character has +2 HP/loc.',
            'image' => 'icons/muscle-up.svg',
        ],

        'restraint' => [
            'name' => 'Restraint',
            'description' => 'Characters with this skill are able to bind or hobble a character
for a maximum of one hour. This obstacle must be able to be removed (in time-out) by the
victim, it cannot represent a risk for the player.',
            'image' => 'icons/knot.svg',
        ],

        'esotericist' => [
            'name' => 'Esotericist',
            'description' => 'Characters with the "Esotericist" skill know how to decipher and release the magic of
scrolls inscribed with powerful rituals (found in game). Esotericists also gain the “Alphabetization” skill.',
            'image' => 'icons/tied-scroll.svg',
        ],

        'blacksmith' => [
            'name' => 'Blacksmith',
            'description' => 'LCharacters with this knowledge know how to craft weapons and weaponry.
quality. However, they must be in possession of a timein forge to be able to work (hammer, anvil, pincers, etc.).<br/><br/>
All of a blacksmith’s crafting requires 5 production simulation hourglass turns. There
creating/repairing a normal weapon does not require special resources.<br/><br/>
All the fabrications of a blacksmith are valid for 3 years (the current year +2).',
            'image' => 'icons/blacksmith.svg',
        ],

        'gallant' => [
            'name' => 'Gallant',
            'description' => 'Characters with this talent know how to use their charms and attributes during gallantries.',
            'image' => 'icons/lips.svg',
        ],

        'gleaner' => [
            'name' => 'Gleaner',
            'description' => 'Characters with this skill can harvest “fruit” raw materials and
precious “exotic fruit” materials.',
            'image' => 'icons/basket.svg',
        ],

        'gourmet' => [
            'name' => 'Gourmet',
            'description' => 'Gourmets are chefs, the elite of cooks. They learned to choose their food with
care and prepare tasty meals. The meals of the gourmets make it possible to restore 1 point of life to
each location (slight injury only). The dish must be hearty and eaten at the
gourmet to benefit from this effect.',
            'image' => 'icons/cook.svg',
        ],

        'gri-gri' => [
            'name' => 'Gri-gri',
            'description' => 'This skill allows you to recharge an empty fetish using its gri-gri.<br/>
The weaver’s gri-gri recharges daily with as many charges as his skill level
(max 3). To recharge a fetish, you must consume as many charges as the level of the spell linked to the fetish.<br/><br/>
Example: a character with the gri-gri skill at level 3 will be able to:<br/><br/>
- either recharge a level 1 fetish 3 times,<br/>
- either 1 time a level 1 fetish and 1 time a level 2 fetish,<br/>
- either a level 3 fetish once<br/><br/>
Unused charges are lost the next day.
It will never be possible to recharge a level 4 fetish.<br/>
The gri-gri must be represented by an object.<br/><br/>
Recharging a fetish requires concentrating for 1 hourglass turn by putting the gri-gri and the
fetish to recharge. A character can only recharge their own fetishes.',
            'image' => 'icons/primitive-necklace.svg',
        ],

        'herbalist' => [
            'name' => 'Herbalist',
            'description' => 'This skill allows the character to craft herbal concoctions
(consumables) that can be kept from year to year. Each decoction requires 3 hourglass turns of preparation and a certain
number of resources. Herbalists need utensils like mortars, pestles, scales, pots,
cauldrons, etc. in order to be able to simulate the preparation of the decoctions.',
            'image' => 'icons/test-tube-rack.svg',
        ],

        'infiltration' => [
            'name' => 'Infiltration',
            'description' => 'Characters with this skill have learned to sneak into strongholds best
guarded. Players can use the “backdoors” of an encampment. These doors
cannot be kept or trapped because it is a question here of simulating a multitude of means of infiltration.',
            'image' => 'icons/hooded-figure.svg',
        ],

        'nurse' => [
            'name' => 'Nurse',
            'description' => 'Characters with this knowledge know how to heal minor wounds. After 1 hourglass turn
during which they simulate cleaning and bandaging a wound, healed location recovers 1
life point. The medic skill does not cure coma.',
            'image' => 'icons/nurse-male.svg',
        ],

        'engineer' => [
            'name' => 'Engineer',
            'description' => 'Characters with this knowledge know how to plan and craft or
improve mechanisms. An engineer needs time-in tools
such as hammers, pliers, adjustable wrenches, etc.<br/><br/>
An engineer can also sabotage/repair siege engines (but cannot fire them).<br/><br/>
All Engineer crafts require 10 hourglass turns production simulation.<br/><br/>
All the craftsmanship of an engineer is valid for 3 years (the current year +2).',
            'image' => 'icons/tinker.svg',
        ],

        'summoner' => [
            'name' => 'Summoner',
            'description' => 'Characters with this skill are weavers: they can learn and throw
spells. In addition, they have the knowledge to summon
creatures. Each summoner can be bound by pacts with a maximum of 3 minions.',
            'image' => 'icons/magic-gate.svg',
        ],

        'liquorist' => [
            'name' => 'Liquorist',
            'description' => 'Characters with this skill know how to add one or more effects to a drink
alcoholic which confers 3 points of alcoholism minimum. The added effects last for an hour after consuming a glass of the drink in question.',
            'image' => 'icons/booze.svg',
        ],

        'sailor' => [
            'name' => 'Sailor',
            'description' => 'Characters with this skill can take part in maneuvering a ship. When he
participates in the maneuver, it cannot be equipped with a shield.',
            'image' => 'icons/anchor.svg',
        ],

        'doctor' => [
            'name' => 'Doctor',
            'description' => 'A character with the doctor skill can diagnose illnesses (green pouches) and
make remedies to cure them. Doctors must wear gloves and a mask to avoid being contaminated by
their patient. A doctor also knows how to prepare remedies to cure illnesses. Each remedy requires 3 hourglass turns of preparation and resources.',
            'image' => 'icons/doctor-face.svg',
        ],

        'miner' => [
            'name' => 'Miner',
            'description' => 'Characters with this skill can harvest “ore” raw materials and precious materials “silver ore” or “gold ore”.',
            'image' => 'icons/miner.svg',
        ],

        'mystique' => [
            'name' => 'Mystique',
            'description' => 'Characters with this knowledge have learned to see and communicate with spirits. They
can ask a spirit questions (it continues to wander for a maximum of 1 hour). The mind
must answer the truth but only without speaking, he must keep his hands over his mouth at all times.',
            'image' => 'icons/dream-catcher.svg',
        ],

        'swimming' => [
            'name' => 'Swimming',
            'description' => 'Characters with this skill have learned to swim: they can move around crouching (duck) when in water.<br/><br/>
During a naval combat, they are not automatically drowned if they fall into the water: they must crouch in place.<br/><br/>
A swimming character remains susceptible to all forms of attack.<br/><br/>A character wearing heavy armor sinks and dies instantly (becomes a spirit)<br/><br/>
A character equipped with a shield or a weapon other than a short weapon loses it instantly.',
            'image' => 'icons/pool-dive.svg',
        ],

        'fisherman' => [
            'name' => 'Fisherman',
            'description' => 'Characters with this skill can harvest “fish” raw materials and precious materials “marine mammal fat”.<br/><br/>
A fisherman can participate in the maneuver on a ship.',
            'image' => 'icons/lucky-fisherman.svg',
        ],

        'strike-down' => [
            'name' => 'Strike-down',
            'description' => 'Characters with this talent know how to channel their strength into devastating blows. They
may, x times per day (x = level) (between two sunrises), announce “STRIKE DOWN” when with a strike. This ability can only 
be used with a 110cm to 150cm two-handed weapon. (not a polearm).',
            'image' => 'icons/blade-fall.svg',
        ],

        'pirate' => [
            'name' => 'Pirate',
            'description' => 'Characters with this skill can take part in maneuvering a ship. When he participates in the maneuver, 
he cannot use a shield.<br/><br/>A pirate does not count towards the maximum number of people on board the ship.',
            'image' => 'icons/pirate-hat.svg',
        ],

        'scuba-diving' => [
            'name' => 'Scuba diving',
            'description' => 'Allows the possessor of the skill to be able to swim underwater in deep or shallow water.
deep. The character must then lie face down and move around by crawling. A underwater character can no longer be hit by melee weapons,
bows or ranged weapons (he remains susceptible to siege weapons). It cannot be targeted by a spell launched from the surface.
N.B.: This skill does not allow you to survive from the destruction of a boat.',
            'image' => 'icons/drowning.svg',
        ],

        'bonesetters' => [
            'name' => 'Bone setters',
            'description' => 'Characters with this skill are able to apply bandages to stop the
bleeding and hemorrhaging of severely injured and comatose characters. As long as one
bonesetter works on a patient in a coma, the 5 hourglass turns which bring the patient closer to death are suspended.',
            'image' => 'icons/bandage-roll.svg',
        ],

        'sapper' => [
            'name' => 'Saper',
            'description' => 'Characters with this skill can sabotage fortifications, siege engines, and
the boats. In practice, a sapper can tie a knot in the sabotage rope per hourglass turn of
simulation and undo a knot that holds the planks of the gaps.',
            'image' => 'icons/dynamite.svg',
        ],

        'sufferint' => [
            'name' => 'Sufferint',
            'description' => 'Characters with this skill are capable of inducing ailments and diseases in their victims.',
            'image' => 'icons/person-in-bed.svg',
        ],

        'taillandier' => [
            'name' => 'Taillandier',
            'description' => 'Characters with this skill know how to craft tools to harvest more
raw and valuable materials quickly.<br/><br/>All crafts by a toolmaker require 5 production simulation hourglass turns.<br/><br/>
All the productions of a toolmaker are valid for 3 years (the current year +2).',
            'image' => 'icons/claw-hammer.svg',
        ],

        'weaver' => [
            'name' => 'Weaver',
            'description' => 'LCharacters with this skill can spend experience points in order to
be able to cast spells chosen from the list of spells. The weaver must craft a fetish for each spell he masters. Each spell can be cast once per
day (between two sunrises).<br/><br/>In addition, a weaver can extract Life Stones from a Life Source (1 HP per hourglass turn) and
use to cast spells. They can also use Monoliths of Life if they encounter any.',
            'image' => 'icons/magic-palm.svg',
        ],

        'tormentor' => [
            'name' => 'Tormentor',
            'description' => 'Characters with this skill have learned to inflict pain and mark flesh to get their questions answered. 
When a tormentor tortures a restrained character, this inflicts permanent physical damage on him (scar, burn, injury, etc.) at a
location of the tormentor’s choice for each session of 5 hourglass turns of torture. The prisoner must answer the truth to 
three questions or acquire a new permanent physical sequel. We cannot acquire more than 2 sequels during a torture session.<br/><br/>
A character can only undergo one torture session per hour. Permanent physical damage must be materialized by the participant 
(make-up, prosthesis, splint, etc.). When a location receives 3 permanent physical damage, the location permanently loses 1 HP.<br/><br/>
N.B.: Before starting to play a scene of torture, the tormenting player must briefly explain the victim player what will happen and obtain their consent. This is a
short exchange TO on an agreement of acceptable limits. The tormentor will also watch to zap underage players if necessary.',
            'image' => 'icons/slavery-whip.svg',
        ],

        'thievery' => [
            'name' => 'Thievery',
            'description' => 'Characters with this skill know how to find the best concealed objects. At the end
of a search lasting an hourglass, characters with the skill "theft" can take the contents of
a character’s "hidden possessions" purse in addition to their special equipment and possessions.',
            'image' => 'icons/robber.svg',
        ],
    ];
