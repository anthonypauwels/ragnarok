<?php
    return [
        'farmer' => [
            'name' => 'Agriculteur',
            'description' => 'Les personnages dotés de cette compétence peuvent récolter des matières premières
“céréale” et des matières précieuses “orge brassicole”.',
            'image' => 'icons/farmer.svg',
        ],

        'alphabetization' => [
            'name' => 'Alphabétisation',
            'description' => 'Les personnes ayant cette compétence peuvent lire et écrire dans les langues utilisées dans les terres connues. 
 Il existe par ailleurs des formes d’écritures nécessitant des recherches avant de pouvoir être traduites.',
            'image' => 'icons/book-cover.svg',
        ],

        'alchemy' => [
            'name' => 'Alchimie',
            'description' => 'Cette compétence permet au personnage de fabriquer des potions alchimiques
(consommables) ayant des effets surprenants et conservables d’année en année. Les créations alchimiques nécessitent un 
laboratoire TI avec des ustensiles comme des mortiers, des balances, des cornues, des refroidisseurs, etc. afin de pouvoir simuler la
préparation des potions. Chaque potion nécessite 4 sabliers durant lesquels la préparation doit être
simulée et un certain nombre de ressources.',
            'image' => 'icons/cauldron.svg',
        ],

        'apothecary' => [
            'name' => 'Apothicaire',
            'description' => 'Cette compétence permet au personnage de fabriquer des drogues et des poisons. Les créations
d’apothicaire nécessitent un laboratoire TI avec des ustensiles comme des mortiers, des balances, des cornues, des refroidisseurs, 
etc. afin de pouvoir simuler la préparation des drogues et potions.Chaque drogue ou poison nécessite 2 sabliers de préparation et 
un certain nombre de ressources.',
            'image' => 'icons/apothecary.svg',
        ],

        'archery' => [
            'name' => 'Archerie',
            'description' => 'La compétence « archerie » permet d’utiliser un arc à flèche de 25 livres de tension maximum et 
oblige à utiliser les flèches standardisées fournies par l’organisation. L’archer peut posséder maximum 10 flèches dans son carquois.
Cette compétence est soumise à une augmentation du tarif d’inscription de 10€ pour la location des flèches. Il est possible de trouver des
endroits où acheter des flèches en TI pour remplir son carquois si on n’en ramasse pas suffisamment. Les flèches font des dégâts « through » 
sauf sur les armures lourdes qui superposent mailles et plates. Remarque : il sera obligatoire de réussir un test d’archerie sur site avant de recevoir ses flèches.',
            'image' => 'icons/archer.svg',
        ],

        'two-handed-weapons' => [
            'name' => 'Arme à deux mains',
            'description' => 'Les personnages dotés de cette compétence peuvent manier des armes comprises entre 110 et 150 centimètres de long au maximum. 
Une arme à deux mains doit obligatoirement être maniée à deux mains simultanément et est indispensable pour pouvoir utiliser les compétences comme brise-crâne (crush) et 
perce-ligne (strike down).',
            'image' => 'icons/two-handed-sword.svg',
        ],

        'one-handed-weapon' => [
            'name' => 'Arme à une main',
            'description' => 'Les personnages dotés de cette compétence peuvent manier des armes de 110 centimètres de long au maximum 
(sauf fléaux de maximum 130 cm).',
            'image' => 'icons/gladius.svg',
        ],

        'short-weapon' => [
            'name' => 'Arme courte',
            'description' => 'Les personnages dotés de cette compétence peuvent manier des armes de 60 centimètres de long au maximum.',
            'image' => 'icons/plain-dagger.svg',
        ],

        'polearm' => [
            'name' => 'Arme d’hast',
            'description' => 'Les personnages dotés de cette compétence peuvent manier des armes comprises
entre 150 et 250 centimètres de long au maximum. Une arme d’hast doit obligatoirement être maniée
à deux mains simultanément. Une arme d’hast ne permet PAS d’utiliser les compétences comme
brise-crâne (crush) et perce-ligne (strike down).',
            'image' => 'icons/halberd.svg',
        ],

        'throwing-weapon' => [
            'name' => 'Arme de jet',
            'description' => 'Les personnages dotés de cette compétence savent comment utiliser les couteaux de
jet, les shurikens, les haches de jet, les javelines, cailloux, bouteilles, etc. ',
            'image' => 'icons/thrown-daggers.svg',
        ],

        'shooting-weapon' => [
            'name' => 'Arme de tir',
            'description' => 'Les personnages dotés de cette compétence savent comment utiliser des arbalètes
(dispensées des règles de cartouchière), des pistolets (nerf) ou des arquebuses (nerf). La
compétence « arme de tir » permet d’utiliser les armes de type « nerf » pour autant qu’elles soient
lookées. Les armes de type nerf autorisées sont celles qui n’ont ni chargeur, ni bande
d’approvisionnement et qui ne peuvent recevoir qu’une seule cartouche à la fois dans le canon. ',
            'image' => 'icons/blunderbuss.svg',
        ],

        'light-armor' => [
            'name' => 'Armure légère',
            'description' => 'Permet le port d’armure de cuir rigide (le cuir souple ne confère aucune
protection) ou d’un gambison qui donne un 1 point de protection.',
            'image' => 'icons/leather-vest.svg',
        ],

        'intermediate-armor' => [
            'name' => 'Armure intermédiaire',
            'description' => 'Permet le port d’armure de cuir rigide cloutée ou renforcée de métal et
de cotte de mailles qui donne 2 points de protection.',
            'image' => 'icons/leather-armor.svg',
        ],

        'heavy-armor' => [
            'name' => 'Armure lourde',
            'description' => 'Permet le port d’armure de plate, d’écailles métalliques, de carapaces qui
donne 3 points de protection. Empêche l’utilisation de la compétence natation.',
            'image' => 'icons/shoulder-armor.svg',
        ],

        'armourer' => [
            'name' => 'Armurier',
            'description' => 'Les personnages dotés de cette compétence savent réparer les armures abîmées. Pour ce
faire, l’armurier a besoin de matériel TI comme du fil et des aiguilles, des rivets, un marteau et une
enclume, etc. L’armurier doit simuler la réparation de l’armure à raison d’un sablier par point
d’armure manquant. En dehors du temps passé, aucune ressource n’est nécessaire pour réparer une armure.',
            'image' => 'icons/anvil-impact.svg',
        ],

        'gunner' => [
            'name' => 'Artilleur',
            'description' => 'Les personnages dotés de cette compétence ont été formés au maniement des engins de
siège et des machines de guerre les plus divers. Ils savent comment utiliser ces engins.',
            'image' => 'icons/cannon.svg',
        ],

        'artisan' => [
            'name' => 'Artisan',
            'description' => 'Les personnages dotés de cette compétence peuvent produire des chefs d’oeuvre (sculpture,
peinture, couture, joaillerie, etc.).',
            'image' => 'icons/crafting.svg',
        ],

        'martial-arts' => [
            'name' => 'Arts martiaux',
            'description' => 'Les personnages dotés de cette compétence ont appris à se battre à main nue. Chaque niveau de la
compétence Arts martiaux donne un bonus de +1 en point de bagarre (voir 2.8 La bagarre). Le niveau
3 de la compétence Arts martiaux permet en plus d’infliger une blessure grave à un des 4 membres
de son adversaire même en cas de défaite (le personnage l’annonce durant l’empoignade juste après son score de bagarre).',
            'image' => 'icons/high-kick.svg',
        ],

        'assassinat' => [
            'name' => 'Assassinat',
            'description' => 'Les personnages maîtrisant cette compétence peuvent assassiner un autre personnage x fois par
évènement (x = niveau).<br/><br/>
Pour assassiner quelqu’un, il faut lui donner deux coups consécutifs d’une arme courte (max 60 cm)
dans le torse. Ce n’est qu’au deuxième coup que l’assassin prononce l’annonce «Dead», la victime
devient immédiatement un esprit sans laisser de cadavre. Si l’assassin ne parvient pas à donner son
deuxième coup à sa victime, l’assassinat est manqué et l’assassin ne peut plus retenter son forfait.<br/><br/>
Certaines créatures spéciales ne sont pas assassinables.',
            'image' => 'icons/blade-bite.svg',
        ],

        'knockout' => [
            'name' => 'Assommement',
            'description' => 'Les personnages dotés de cette compétence sont capables de rendre un personnage inconscient en
lui assénant, par derrière (de dos), un PETIT coup sur le sommet du crâne avec une arme courte.
L’annonce «PAF» doit être audible pour la cible. Le port d’un CASQUE empêche l’assommement.
La cible est assommée durant 2 sabliers (6 minutes). Un personnage ne peut assommer plus d’une
personne par sablier.',
            'image' => 'icons/knockout.svg',
        ],

        'bard' => [
            'name' => 'Barde',
            'description' => 'Les personnages dotés de cette compétence sont capables de faire des représentations qui
permettent à une partie de leur auditoire de retrouver de l’entrain.<br/><br/>
Lorsque minimum 2 bardes jouent ensemble une représentation (musicale, théâtrale, déclamation,
performance, etc.) par tranche de 5 sabliers (15 min.), ils permettent de faire gagner 1 main d’oeuvre
à un personnage de leur auditoire (choisi au hasard par un Gardien). Pour chaque barde
supplémentaire qui participe à la représentation, 1 main d’oeuvre supplémentaire est générée pour l’auditoire au terme de celle-ci.',
            'image' => 'icons/harp.svg',
        ],

        'shield' => [
            'name' => 'Bouclier',
            'description' => 'Les personnages dotés de cette compétence ont été formés au maniement de tous types de boucliers.',
            'image' => 'icons/attached-shield.svg',
        ],

        'brewer' => [
            'name' => 'Brasseur',
            'description' => 'Les personnages dotés de cette connaissance savent comment fabriquer des breuvages alcoolisés.
Ces boissons n’ont pas l’obligation d’être réellement alcoolisées. On peut ainsi créer un chocolat chaud qui aura les effets 
time-in d’une boisson alcoolisée. Lorsqu’un joueur boit une de ces boissons, il reçoit un certain nombre de points d’éthylisme 
en fonction du type de breuvage qu’il ingurgite. Chaque brassin nécessite 4 sabliers de simulation de préparation.',
            'image' => 'icons/beer-stein.svg',
        ],

        'skull-crusher' => [
            'name' => 'Brise-crâne',
            'description' => 'Les personnages dotés de ce talent savent canaliser leur force dans des coups dévastateurs ; ils
peuvent, x fois par jour (x = niveau) (entre deux levers de soleil), annoncer «CRUSH» lors d’une
frappe. Cette capacité ne s’utilise qu’avec une arme à deux mains (entre 110cm et 150 cm, pas une arme d’hast).',
            'image' => 'icons/skull-crack.svg',
        ],

        'lumberjack' => [
            'name' => 'Bucheron',
            'description' => 'Les personnages dotés de cette compétence peuvent récolter des matières premières “bois” et des matières 
précieuses “bois précieux”.',
            'image' => 'icons/axe-in-stump.svg',
        ],

        'helmet' => [
            'name' => 'Casque',
            'description' => 'Afin de pousser les participants à se protéger la tête, tout personnage peut porter un casque sans
posséder la compétence “armure”. Ce casque offre, comme une armure, de 1 à 3 points d’armure
en fonction du type de casque à la localisation tête (qui ne peut être délibérément visée). De plus, le
port d’un casque immunise contre l’assommement (annonce «paf»).',
            'image' => 'icons/viking-helmet.svg',
        ],

        'ship-captain' => [
            'name' => 'Capitaine de navire',
            'description' => 'Un capitaine de navire peut participer à la manoeuvre d’un navire et le diriger. Lorsqu’il participe à la manoeuvre, il ne peut pas utiliser de bouclier.',
            'image' => 'icons/ship-wheel.svg',
        ],

        'pirate-captain' => [
            'name' => 'Capitaine pirate',
            'description' => 'Un capitaine pirate peut participer à la manoeuvre d’un navire et le diriger Batailles
navales). Lorsqu’il participe à la manoeuvre, il ne peut pas utiliser de bouclier.<br/><br/>
De plus, un capitaine pirate ne compte pas dans le nombre maximum de personnes embarquées sur le navire.',
            'image' => 'icons/pirate-captain.svg',
        ],

        'carrier' => [
            'name' => 'Carrier',
            'description' => 'Les personnages dotés de cette compétence peuvent récolter des matières premières “roche” et des
matières précieuses “gemme”.',
            'image' => 'icons/stone-block.svg',
        ],

        'shipwright' => [
            'name' => 'Charpentier de marine',
            'description' => 'Les personnages dotés de cette compétence savent réparer les points de structure perdus par les
navires endommagés lors d’un combat naval. Chaque charpentier de marine peut faire récupérer 1
point de structure par sablier passé à réparer le navire en dépensant 3 matières premières “bois”
par point. La réparation est possible en étant à bord du bateau.<br/><br/>
Les charpentiers de marine sont capables de saboter les navires.<br/><br/>
Un charpentier de marine compte comme un marin pour la manoeuvre d’un navire.<br/><br/>
Les charpentiers de marine peuvent améliorer les navires.<br/><br/>
Toutes les améliorations d’un charpentier de marine nécessitent 10 sabliers de simulation de
fabrication.<br/><br/>
Toutes les améliorations d’un charpentier de marine sont valables 3 ans (l’année en cours +2).',
            'image' => 'icons/ship-bow.svg',
        ],

        'hunter' => [
            'name' => 'Chasseur',
            'description' => 'Les personnages dotés de cette compétence peuvent récolter des matières premières “gibier” et des
matières précieuses “fourrure” sur les animaux morts.',
            'image' => 'icons/hunting-horn.svg',
        ],

        'surgeon' => [
            'name' => 'Chirurgien',
            'description' => 'Les personnages dotés de cette connaissance sont capables de soigner les blessures graves subies
par un autre personnage (ils ne peuvent pas se soigner eux-mêmes). Le chirurgien doit simuler
durant 1 sablier les soins lourds qu’il prodigue à son patient à l’aide de compresses
ensanglantées, de fil et d’aiguille, de scalpels, etc. Lorsque le sablier est écoulé, la localisation
soignée récupère 1 PV (elle passe de 0 à 1). Un chirurgien ne peut pas soigner au-delà du premier PV.',
            'image' => 'icons/scalpel.svg',
        ],

        'holy-blow' => [
            'name' => 'Coup sacré',
            'description' => 'Les personnages dotés de ce talent sont particulièrement pieux et peuvent recevoir une aide divine
lorsqu’ils combattent s’ils se conforment aux conditions suivantes :<br/><br/>
- Chaque coup sacré est précédée d’une annonce "au nom de [nom du dieu] !"<br/>
- le personnage doit assister à une messe ou participer à une cérémonie dédiée au(x) dieu(x)
concerné(s) au moins une fois par évènement.<br/><br/>
Si le personnage se conforme à ces conditions, et uniquement dans ce cas-là, il peut, x fois par jour
(x = niveau) (entre deux levers de soleil), faire une frappe avec l’annonce “HOLY”. Ces frappes
affectent la quasi-totalité des créatures de Ragnarok.',
            'image' => 'icons/spiral-thrust.svg',
        ],

        'cut-throat' => [
            'name' => 'Coupe-jarret',
            'description' => 'Les personnages dotés de cette compétence sont capables de trouver la faille dans les meilleures
armures. Les coupe-jarrets peuvent, x fois par jour (x = niveau) (entre deux levers de soleil),
annoncer «THROUGH» lorsqu’ils frappent leur victime dans le dos avec une arme courte de 60 cm au maximum.',
            'image' => 'icons/curvy-knife.svg',
        ],

        'lock-picking' => [
            'name' => 'Crochetage',
            'description' => 'Les personnages dotés de cette compétence sont capables de forcer les cadenas afin d’ouvrir les
serrures. Pour ce faire, ils doivent simuler à l’aide d’outils, de rossignol, etc. durant 1 sablier l’ouverture du
cadenas en question. Au terme du sablier, le crocheteur peut retirer une seule carte cadenas de la
serrure sur laquelle il travaille. Plusieurs cartes cadenas peuvent être apposées sur la même serrure
pour symboliser sa difficulté. Le cadenas n’est pas détruit par le crochetage.',
            'image' => 'icons/lockpicks.svg',
        ],

        'gatherer' => [
            'name' => 'Cueilleur',
            'description' => 'Les personnages dotés de cette compétence peuvent récolter des matières premières “végétal” et
des matières précieuses “plante rare”.',
            'image' => 'icons/sickle.svg',
        ],

        'cooking' => [
            'name' => 'Cuisine',
            'description' => 'Les personnages dotés de cette compétence sont capables de préparer d’excellents plats. Un repas
servi par un cuisinier ne peut pas être empoisonné. Le repas doit être copieux, et consommé chez le cuisinier.',
            'image' => 'icons/camp-cooking-pot.svg',
        ],

        'duelist' => [
            'name' => 'Duelliste',
            'description' => 'Les personnages dotés de ce talent sont capables de trouver la faille des meilleures armures. Ils
peuvent, x fois par jour (x = niveau) (entre deux levers de soleil), annoncer «TROUGH» lors d’une
frappe. Cette capacité ne s’utilise qu’avec une arme à une main (type épée de max 110 cm).',
            'image' => 'icons/sabers-choc.svg',
        ],

        'garbage-collector' => [
            'name' => 'Éboueur',
            'description' => 'Les personnages dotés de cette compétence peuvent échanger un sac de détritus (time-out) contre 1
matière première au hasard (time-in) en se rendant à l’Étendard du Grand Bazar qui se charge de les
faire évacuer à «la décharge» (container poubelle). Les détritus doivent être convoyés de façon timein par exemple en brouette en bois, dans un sac en toile de jute, etc. Le sac ou autre doit pouvoir
contenir un sac poubelle de 80 litres.',
            'image' => 'icons/trash-can.svg',
        ],

        'scout' => [
            'name' => 'Éclaireur',
            'description' => 'Les personnages dotés de cette compétence peuvent pénétrer sur le champ de bataille et dans la
zone scénario avant les autres personnages. Les éclaireurs disposent de 5 sabliers pour repérer les
lieux avant que tout un chacun soit autorisé à monter sur le champ de bataille. Ils peuvent ainsi
informer la caravane pour laquelle ils travaillent de l’emplacement des objectifs à prendre, des forces en présence, etc.',
            'image' => 'icons/run.svg',
        ],

        'enchanter' => [
            'name' => 'Enchanteur',
            'description' => 'Les personnages possédant la compétence "Enchanteur" sont capables de canaliser l’essence
magique dans des objets divers et variés. Leurs études de la magie leur permettent d’intégrer des
sortilèges dans un objet de “bonne facture” afin que tout un chacun puisse les déclencher.',
            'image' => 'icons/fairy-wand.svg',
        ],

        'stamina' => [
            'name' => 'Endurance',
            'description' => 'Les personnages dotés de cette compétence sont plus résistants que la moyenne: ils possèdent 1 point de vie 
supplémentaire à chaque localisation (jusqu’à un maximum de 3PV par localisation).',
            'image' => 'icons/strong.svg',
        ],

        'increased-stamina' => [
            'name' => 'Endurance accrue',
            'description' => 'Les personnages dotés de cette compétence ont entraîné leur corps grâce à d’intenses efforts
physiques : ils possèdent 1 point de vie supplémentaire à chaque localisation (jusqu’à un maximum
de 3PV par localisation).<br/><br/>
Endurance et endurance accrue peuvent être prises indépendamment l’une de l’autre. Chacune de
ces compétences permet d’avoir + 1 PV/loc, il n’y a donc que si on possède les deux compétences
que le personnage possède + 2 PV/loc.',
            'image' => 'icons/muscle-up.svg',
        ],

        'restraint' => [
            'name' => 'Entrave',
            'description' => 'Les personnages dotés de cette compétence sont capables de ligoter ou d’entraver un personnage
pour une durée maximale d’une heure. Cette entrave doit pouvoir être ôtée (en time-out) par la
victime, elle ne peut pas représenter un risque pour le joueur.',
            'image' => 'icons/knot.svg',
        ],

        'esotericist' => [
            'name' => 'Ésotériste',
            'description' => 'Les personnages dotés de la compétence "Esotériste" savent déchiffrer et libérer la magie des
parchemins sur lesquels sont inscrits de puissants rituels (à trouver en jeu). Les ésotéristes gagnent également la compétence “Alphabétisation”.',
            'image' => 'icons/tied-scroll.svg',
        ],

        'blacksmith' => [
            'name' => 'Forgeron',
            'description' => 'Les personnages dotés de cette connaissance savent comment fabriquer des armes et des armes de
qualité. Ils doivent néanmoins être en possession d’une forge timein pour pouvoir œuvrer (marteau, enclume, tenailles, etc.).<br/><br/>
Toutes les fabrications d’un forgeron nécessitent 5 sabliers de simulation de production. La
création/réparation d’une arme normale ne nécessite pas de ressources particulières.<br/><br/>
Toutes les fabrications d’un forgeron sont valables 3 ans (l’année en cours +2).',
            'image' => 'icons/blacksmith.svg',
        ],

        'gallant' => [
            'name' => 'Galant',
            'description' => 'Les personnages dotés de ce talent savent utiliser leurs charmes et attributs lors des galanteries.',
            'image' => 'icons/lips.svg',
        ],

        'gleaner' => [
            'name' => 'Glaneur',
            'description' => 'Les personnages dotés de cette compétence peuvent récolter des matières premières “fruit” et des
matières précieuses “fruit exotique”.',
            'image' => 'icons/basket.svg',
        ],

        'gourmet' => [
            'name' => 'Gourmet',
            'description' => 'Les gourmets sont des chefs-coqs, l’élite des cuisiniers. Ils ont appris à choisir leurs aliments avec
soin et à préparer de savoureux repas. Les repas des gourmets permettent de rendre 1 point de vie à
chaque localisation (blessure légère uniquement). Le plat doit être copieux et consommé chez le
gourmet pour bénéficier de cet effet.',
            'image' => 'icons/cook.svg',
        ],

        'gri-gri' => [
            'name' => 'Gri-gri',
            'description' => 'Cette compétence permet de recharger un fétiche vide à l’aide de son gri-gri.<br/>
Le gri-gri du tisseur se recharge chaque jour d’autant de charges que son niveau de compétence
(maximum 3). Pour recharger un fétiche, il faut consommer autant de charges que le niveau du sort lié au fétiche.<br/><br/>
Exemple : un personnage avec la compétence gri-gri au niveau 3 pourra :<br/><br/>
- soit recharger 3 fois un fétiche de niveau 1,<br/>
- soit 1 fois un fétiche de niveau 1 et 1 fois un fétiche de niveau 2,<br/>
- soit 1 fois un fétiche de niveau 3<br/><br/>
Les charges non utilisées sont perdues le lendemain.
Il ne sera jamais possible de recharger un fétiche de niveau 4.<br/>
Le gri-gri doit être représenté par un objet.<br/><br/>
Recharger un fétiche nécessite de se concentrer durant 1 sablier en mettant en contact le gri-gri et le
fétiche à recharger. Un personnage ne peut recharger que ses propres fétiches.',
            'image' => 'icons/primitive-necklace.svg',
        ],

        'herbalist' => [
            'name' => 'Herboriste',
            'description' => 'Cette compétence permet au personnage de fabriquer des décoctions d’herboristerie
(consommables) conservables d’année en année. Chaque décoction nécessite 3 sabliers de préparation et un certain 
nombre de ressources. Les herboristes ont besoin d’ustensiles comme des mortiers, des pilons, des balances, des pots, 
des chaudrons, etc. afin de pouvoir simuler la préparation des décoctions.',
            'image' => 'icons/test-tube-rack.svg',
        ],

        'infiltration' => [
            'name' => 'Infiltration',
            'description' => 'Les personnages dotés de cette compétence ont appris à se faufiler dans les places fortes les mieux
gardées. Les joueurs peuvent emprunter les « portes dérobées » d’un campement. Ces portes ne
peuvent pas être gardées ni piégées car il s’agit ici de simuler une multitude de moyens d’infiltration.',
            'image' => 'icons/hooded-figure.svg',
        ],

        'nurse' => [
            'name' => 'Infirmier',
            'description' => 'Les personnages maîtrisant ce savoir savent comment soigner les blessures légères. Après 1 sablier
durant lequel ils simulent le nettoyage et le bandage d’une plaie, la localisation soignée récupère 1
point de vie. La compétence d’infirmier ne soigne pas du coma.',
            'image' => 'icons/nurse-male.svg',
        ],

        'engineer' => [
            'name' => 'Ingénieur',
            'description' => 'Les personnages dotés de cette connaissance savent comment tracer des plans et fabriquer ou
améliorer des mécanismes. Un ingénieur a besoin d’outils time-in
comme des marteaux, des pinces, des clefs à molette, etc.<br/><br/>
Un ingénieur peut également saboter/réparer les engins de siège (mais ne sait pas faire feu avec).<br/><br/>
Toutes les fabrications d’un ingénieur nécessitent 10 sabliers de simulation de production.<br/><br/>
Toutes les fabrications d’un ingénieur sont valables 3 ans (l’année en cours +2).',
            'image' => 'icons/tinker.svg',
        ],

        'summoner' => [
            'name' => 'Invocateur',
            'description' => 'Les personnages possédant cette compétence sont des tisseurs : ils peuvent apprendre et jeter des
sorts. De plus, ils ont les connaissances nécessaires pour invoquer des
créatures. Chaque invocateur peut être lié par des pactes avec maximum 3 asservis.',
            'image' => 'icons/magic-gate.svg',
        ],

        'liquorist' => [
            'name' => 'Liquoriste',
            'description' => 'Les personnages disposant cette compétence savent ajouter un ou plusieurs effets à une boisson
alcoolisée qui confère 3 points d’éthylisme minimum. Les effets ajoutés durent une heure après la consommation d’un verre de la boisson en question.',
            'image' => 'icons/booze.svg',
        ],

        'sailor' => [
            'name' => 'Marin',
            'description' => 'Les personnages dotés de cette compétence peuvent participer à la manoeuvre d’un navire. Lorsqu’il 
participe à la manoeuvre, il ne peut pas être équipé d’un bouclier. ',
            'image' => 'icons/anchor.svg',
        ],

        'doctor' => [
            'name' => 'Médecin',
            'description' => 'Un personnage doté de la compétence médecin peut diagnostiquer les maladies (bourses vertes) et
fabriquer des remèdes afin de les soigner. Les médecins doivent porter des gants et un masque afin d’éviter d’être contaminés par 
leur patient. Un médecin sait également préparer les remèdes pour soigner les maladies. Chaque remède nécessite 3 sabliers de préparation et des ressources.',
            'image' => 'icons/doctor-face.svg',
        ],

        'miner' => [
            'name' => 'Mineur',
            'description' => 'Les personnages dotés de cette compétence peuvent récolter des matières premières “minerai” et
des matières précieuses “minerai d’argent” ou “minerai aurifère”.',
            'image' => 'icons/miner.svg',
        ],

        'mystique' => [
            'name' => 'Mystique',
            'description' => 'Les personnages dotés de cette connaissance ont appris à voir et à communiquer avec les esprits. Ils
peuvent poser des questions à un esprit (celui-ci continue à errer pendant maximum 1 heure). L’esprit
doit répondre la vérité mais seulement sans parler, il doit garder en permanence ses mains sur sa bouche.',
            'image' => 'icons/dream-catcher.svg',
        ],

        'swimming' => [
            'name' => 'Natation',
            'description' => 'Les personnages dotés de cette compétence ont appris à nager : ils peuvent se déplacer accroupis
(en canard) lorsqu’ils sont dans l’eau.<br/><br/>
Lors d’un combat naval, ils ne sont pas noyés automatiquement s’ils tombent à l’eau : ils doivent
rester accroupis sur place.<br/><br/>
Un personnage qui nage reste sensible à toutes les formes d’attaques.<br/><br/>
Un personnage vêtu d’une armure lourde coule et meurt instantanément (il devient un esprit)<br/><br/>
Un personnage équipé d’un bouclier ou d’une arme autre qu’une arme courte la perd instantanément.',
            'image' => 'icons/pool-dive.svg',
        ],

        'fisherman' => [
            'name' => 'Pêcheur',
            'description' => 'Les personnages dotés de cette compétence peuvent récolter des matières premières “poisson” et
des matières précieuses “graisse de mammifère marin”.<br/><br/>
Un pêcheur peut participer à la manoeuvre sur un navire.',
            'image' => 'icons/lucky-fisherman.svg',
        ],

        'strike-down' => [
            'name' => 'Perce-ligne',
            'description' => 'Les personnages dotés de ce talent savent canaliser leur force dans des coups dévastateurs. Ils
peuvent, x fois par jour (x = niveau) (entre deux levers de soleil), annoncer «STRIKE DOWN» lors
d’une frappe. Cette capacité ne s’utilise qu’avec une arme à deux mains de 110 cm à 150 cm. (pas une arme d’hast).',
            'image' => 'icons/blade-fall.svg',
        ],

        'pirate' => [
            'name' => 'Pirate',
            'description' => 'Les personnages dotés de cette compétence peuvent participer à la manoeuvre d’un navire. Lorsqu’il
participe à la manoeuvre, il ne peut pas utiliser de bouclier.<br/><br/>
Un pirate ne compte pas dans le nombre maximum de personnes embarquées sur le navire.',
            'image' => 'icons/pirate-hat.svg',
        ],

        'scuba-diving' => [
            'name' => 'Plongée sous-marine',
            'description' => 'Permet au possesseur de la compétence de pouvoir nager sous l’eau en eaux profondes ou peu
profondes. Le personnage doit alors se mettre à plat ventre et se déplacer en rampant. Un
personnage en plongée sous-marine ne peut plus être touché par les armes de corps à corps, les
arcs ou les armes de tir (il reste sensible aux armes de siège). Il ne peut pas être ciblé par un sort
lancé depuis la surface. Remarque : cette compétence ne permet pas de survivre à la destruction
d’un bateau.',
            'image' => 'icons/drowning.svg',
        ],

        'bonesetters' => [
            'name' => 'Rebouteux',
            'description' => 'Les personnages dotés de cette compétence sont capables de poser des bandages pour arrêter les
saignements et les hémorragies des personnages gravement blessés et dans le coma. Tant qu’un
rebouteux oeuvre sur un patient dans le coma, les 5 sabliers qui rapprochent le patient de la mort sont suspendus.',
            'image' => 'icons/bandage-roll.svg',
        ],

        'sapper' => [
            'name' => 'Sapeur',
            'description' => 'Les personnages dotés de cette compétence peuvent saboter les fortifications, les engins de siège et
les navires. En pratique un sapeur peut faire un noeud dans la corde de sabotage par sablier de
simulation et défaire un noeud qui retient les planches des brèches.',
            'image' => 'icons/dynamite.svg',
        ],

        'sufferint' => [
            'name' => 'Souffreteux',
            'description' => 'Les personnages dotés de cette compétence sont capables de susciter des maux et des maladies
chez leurs victimes.',
            'image' => 'icons/person-in-bed.svg',
        ],

        'taillandier' => [
            'name' => 'Taillandier',
            'description' => 'Les personnages dotés de cette compétence savent fabriquer des outils permettant de récolter plus
rapidement des matières premières et précieuses.<br/><br/>
Toutes les fabrications d’un taillandier nécessitent 5 sabliers de simulation de production.<br/><br/>
Toutes les fabrications d’un taillandier sont valables 3 ans (l’année en cours +2).',
            'image' => 'icons/claw-hammer.svg',
        ],

        'weaver' => [
            'name' => 'Tisseur',
            'description' => 'Les personnages dotés de cette compétence peuvent dépenser des points d’expérience afin de
pouvoir lancer des sortilèges choisis parmi la liste des sorts. Le tisseur
doit se fabriquer un fétiche pour chaque sort qu’il maîtrise. Chaque sort peut être lancé une fois par
jour (entre deux levers de soleil).<br/><br/>
En outre, un tisseur peut extraire des Pierres de Vie d’une Source de Vie (1 PdV par sablier) et les
utiliser afin de lancer des sorts. Ils peuvent également utiliser des
Monolithes de Vie s’ils en rencontrent.',
            'image' => 'icons/magic-palm.svg',
        ],

        'tormentor' => [
            'name' => 'Tourmenteur',
            'description' => 'Les personnages dotés de cette compétence ont appris à infliger la douleur et marquer les chairs afin
d’obtenir des réponses à leurs questions. Lorsqu’un tourmenteur torture un personnage entravé,
celui-ci lui inflige une séquelle physique permanente (cicatrice, brûlure, blessure, etc.) à une
localisation au choix du tourmenteur pour chaque séance de 5 sabliers de torture. Le prisonnier doit
répondre par la vérité à trois questions ou acquérir une nouvelle séquelle physique permanente. On
ne peut acquérir plus de 2 séquelles lors d’une séance de torture.<br/><br/>
Un personnage ne peut subir qu’une séance de torture par heure. Une séquelle physique permanente
doit être matérialisée par le participant (maquillage, prothèse, attelle, etc.). Lorsqu’une localisation
reçoit 3 séquelles physiques permanentes, la localisation perd définitivement 1 PV.<br/><br/>
NB : Avant de commencer de jouer une scène de torture, le joueur tourmenteur doit expliquer
brièvement au joueur victime ce qu’il va se passer et obtenir son consentement. Il s’agit d’un
échange court TO portant sur un accord des limites acceptables. Le tourmenteur veillera aussi
à zapper les joueurs mineurs si nécessaire.',
            'image' => 'icons/slavery-whip.svg',
        ],

        'thievery' => [
            'name' => 'Vol',
            'description' => 'Les personnages dotés de cette compétence savent trouver les objets les mieux dissimulés. A la fin
d’une fouille d’une durée d’un sablier, les personnages dotés de la compétence « vol » peuvent prendre le contenu de 
la bourse « possessions cachées » d’un personnage en plus de son équipement spécial et de ses possessions.',
            'image' => 'icons/robber.svg',
        ],
    ];
