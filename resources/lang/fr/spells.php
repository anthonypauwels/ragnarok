<?php
    return [
        'enchanted-weapon' => [
            'name' => 'Arme enchantée',
            'target' => 'une arme touchée par le tisseur',
            'injunction' => '« enchanted » lorsqu’on frappe avec l’arme',
            'duration' => '1 heure',
            'description' => 'chaque frappe avec l’arme annonce « enchanted ».',
            'image' => 'icons/magic-axe.svg',
        ],

        'kindness' => [
            'name' => 'Bienveillance',
            'target' => 'un personnage visible et à moins de 10 mètres',
            'injunction' => '« friend »',
            'duration' => '1 heure ou jusqu’à ce que le tisseur commette un acte hostile envers la cible',
            'description' => 'La cible considère le tisseur comme un ami, ce qui ne l’empêche pas de garder son libre arbitre. Ne marche pas sur les animaux.',
            'image' => 'icons/heart-inside.svg',
        ],

        'squall' => [
            'name' => 'Bourrasque',
            'target' => 'le gardien responsable du déplacement naval',
            'description' => 'Le tisseur peut déterminer le sens du vent.',
            'image' => 'icons/wind-slap.svg',
        ],

        'celerity' => [
            'name' => 'Célérité',
            'target' => 'le tisseur',
            'injunction' => 'instantané',
            'description' => 'le tisseur peut se joindre à un groupe se rendant à un champ de récolte ou une zone scénar sans payer de Main d’Oeuvre.',
            'image' => 'icons/wind-hole.svg',
        ],

        'voice-extinction' => [
            'name' => 'Extinction vocale',
            'target' => 'un personnage visible et à moins de 10 mètres',
            'injunction' => '« mute »',
            'duration' => '1 sablier',
            'description' => 'la cible est incapable de parler pendant la durée du sort (cela empêche les tisseurs de jeter leurs sorts).',
            'image' => 'icons/silenced.svg',
        ],

        'poison-immunity' => [
            'name' => 'Immunité aux poisons',
            'target' => 'un personnage touché par le tisseur',
            'injunction' => '« resist » si l’on absorbe du poison ou si l’on se fait frapper par une arme empoisonnée (annonce “toxic”)',
            'duration' => '1 heure',
            'description' => 'La cible est soignée d’un empoisonnement (comme si elle avait pris un antidote) et immunisée aux poisons.',
            'image' => 'icons/heart-bottle.svg',
        ],

        'clumsiness' => [
            'name' => 'Maladresse',
            'target' => 'une personne à moins de 10 mètres',
            'injunction' => '« disarm »',
            'duration' => 'instantanée',
            'description' => 'La cible lâche ce qu’il a dans ses deux mains.',
            'image' => 'icons/drop-weapon.svg',
        ],

        'talk-with-the-dead' => [
            'name' => 'Parler avec les morts',
            'target' => 'un agonisant (0 PV) ou un mort depuis moins d’une heure, touché par le tisseur',
            'duration' => '1 sablier',
            'description' => 'la cible répond la vérité aux questions du tisseur UNIQUEMENT par OUI ou NON.',
            'image' => 'icons/half-dead.svg',
        ],

        'magic-healing' => [
            'name' => 'Soin magique',
            'target' => 'le patient touché par le tisseur',
            'duration' => 'instantanée',
            'description' => 'le guérisseur soigne 1 PV à une localisation (qu’il s’agisse d’une blessure légère ou grave) OU son action compte comme un remède commun pour le traitement d’une maladie.',
            'image' => 'icons/healing.svg',
        ],

        'amnesia' => [
            'name' => 'Amnésie',
            'target' => 'un personnage en vue à moins de 10 mètres',
            'injunction' => '« amnesia »',
            'duration' => 'jusqu’au levé ou couché de soleil',
            'description' => 'La cible ne se souvient plus de ce qui s’est passé lors du dernier quart d’heure. La cible recouvre ces souvenirs effacés au prochain levé ou couché de soleil.',
            'image' => 'icons/coma.svg',
        ],

        'animated-dead' => [
            'name' => 'Animation d’un corps',
            'target' => 'un cadavre au contact',
            'injunction' => '« animate dead »',
            'duration' => '1 heure',
            'description' => 'la cible se relève sous forme de zombie et sert le nécromant pour la durée du sort. Il garde ses capacités
de combat (y compris sa base de points de vie), mais ne peut pas utiliser la magie et ne peut pas courir. Il est impossible de réanimer deux fois le même
cadavre. Après l’heure d’effet du sortilège ou si ses points de vie retombent à 0, le personnage tombe à nouveau à l’agonie.',
            'image' => 'icons/half-body-crawling.svg',
        ],

        'repulsion-aura' => [
            'name' => 'Aura de répulsion',
            'target' => 'le tisseur',
            'injunction' => '« resist » lorsqu’il reçoit un projectile',
            'duration' => '1 heure',
            'description' => 'le tisseur est immunisé aux projectiles (n’immunise pas contre les projectiles magiques ni les machines de guerre).',
            'image' => 'icons/aura.svg',
        ],

        'blindness' => [
            'name' => 'Aveuglement',
            'target' => 'un personnage visible et à moins de dix mètres',
            'injunction' => '« blind »',
            'duration' => '1 sablier',
            'description' => 'la cible ferme les yeux pour la durée du sort.',
            'image' => 'icons/sight-disabled.svg',
        ],

        'magic-shield' => [
            'name' => 'Bouclier magique',
            'target' => 'le tisseur',
            'duration' => 'jusqu’au premier sort reçu par la cible. Annonce “résist” quand le sort est bloqué',
            'description' => 'le tisseur est immunisé au premier sort dont il est la cible, même si celui-ci est bénéfique.',
            'image' => 'icons/magic-shield.svg',
        ],

        'bohemian-dance' => [
            'name' => 'Danse la bohème',
            'target' => 'un personnage visible et à moins de 10 mètres',
            'injunction' => '« dance »',
            'duration' => '1 sablier',
            'description' => 'la cible danse.',
            'image' => 'icons/zigzag-tune.svg',
        ],

        'tangle' => [
            'name' => 'Enchevêtrement',
            'target' => 'un personnage visible et à moins de 10 mètres',
            'injunction' => '« glue »',
            'duration' => '1 sablier',
            'description' => 'la cible est incapable de décoller ses pieds pendant la durée du sort.',
            'image' => 'icons/root-tip.svg',
        ],

        'fear' => [
            'name' => 'Frayeur',
            'target' => 'un personnage visible et à moins de 10 mètres',
            'injunction' => '« fear »',
            'duration' => '1 sablier',
            'description' => 'la cible fuit le plus loin possible du tisseur, celle-ci ne peut en aucun cas revenir à moins de 10 mètres du jeteur de sort durant la durée du sort.',
            'image' => 'icons/terror.svg',
        ],

        'repair' => [
            'name' => 'Réparation',
            'target' => 'un objet touché par le tisseur',
            'duration' => 'instantanée',
            'description' => 'l’objet touché est immédiatement réparé. S’il s’agit d’une armure, celle-ci recouvre tous ses points de protection. Ce sort ne fonctionne que sur des objets transportables, donc pas sur les portes, les coques de navire ou autres...',
            'image' => 'icons/lightning-spanner.svg',
        ],

        'sleep' => [
            'name' => 'Sommeil',
            'target' => 'un personnage visible et à moins de 10 mètres',
            'injunction' => '« sleep »',
            'duration' => '1 sablier',
            'description' => 'la cible s’endort instantanément et n’est réveillée qu’au bout d’un sablier ou si elle subit des dégâts.',
            'image' => 'icons/night-sleep.svg',
        ],

        'berserk' => [
            'name' => 'Berserk',
            'target' => 'une personne ( sans armure) tatouée sur le front par le tisseur',
            'duration' => '1 heure',
            'description' => ' la cible tatouée par le sort voit ses points de vie multipliés par 2, celle-ci attaque ses ennemis les plus proches et ne peut plus fuir le combat
même si elle y est obligée par un autre sort. Un même personnage ne peut être la cible de plus d’un tatouage à la fois. Cependant ce sort peut être lancé plusieurs fois sur une même personne.',
            'image' => 'icons/enrage.svg',
        ],

        'dispel-magic' => [
            'name' => 'Dissipation magique',
            'target' => 'une cible (personnage ou objet) visible et à moins de 10 mètres',
            'injunction' => '« dispel »',
            'duration' => 'instantanée',
            'description' => 'tous les sorts et effets de potions qui affectent la cible ou son équipement sont automatiquement dissipés.',
            'image' => 'icons/rolling-energy.svg',
        ],

        'strength-of-the-nature' => [
            'name' => 'Force de la nature',
            'target' => 'le tisseur',
            'duration' => '1 heure',
            'description' => 'le tisseur gagne 2 points de vie supplémentaires par localisation (on ne peut dépasser 3 PV par localisation quels que soient les effets
cumulés). De plus, s’il se bat avec une arme à deux mains (pas une arme d’hast), il peut annoncer un « crush » et un « strike down ».',
            'image' => 'icons/evil-tree.svg',
        ],

        'frost' => [
            'name' => 'Givre',
            'target' => 'un personnage touché par le projectile magique (bleu) du tisseur',
            'injunction' => '« paralyze »',
            'duration' => '1 sablier',
            'description' => 'la cible est paralysée pour la durée du sort.',
            'image' => 'icons/ice-spell-cast.svg',
        ],

        'laceration' => [
            'name' => 'Lacérations',
            'target' => 'un personnage touché par le projectile magique (rouge)',
            'injunction' => '« blast »',
            'duration' => 'instantané',
            'description' => 'la cible subit 1 point de dégât à chacune de ses localisations (les armures peuvent donc encaisser ces dégâts).',
            'image' => 'icons/fire-spell-cast.svg',
        ],

        'animal-bond' => [
            'name' => 'Lien Animal',
            'target' => 'un « animal » à moins de 10 mètres',
            'injunction' => '« friend »',
            'duration' => '3 sabliers',
            'description' => 'l’animal ou l’homme-bête ciblé devient ami avec le lanceur de sort. (ce sort fonctionne beaucoup mieux sur les animaux non humanoïde), certains animaux sont insensibles à ce sort.',
            'image' => 'icons/paw-print.svg',
        ],

        'painting-of-the-bear' => [
            'name' => 'Peinture de l’ours',
            'target' => 'un personnage touché par le tisseur',
            'duration' => 'jusqu’à la fin du jour ou jusqu’à ce que le tatouage s’efface',
            'description' => 'le tisseur couvre une partie non armurée du corps de la cible avec des peintures de guerre. Les localisations peintes gagnent 1 point de vie
 supplémentaire. On ne peut dépasser trois points de vie par localisation quels que soient les effets cumulés.',
            'image' => 'icons/ceremonial-mask.svg',
        ],

        'protection-pentacle' => [
            'name' => 'Pentacle de protection',
            'target' => 'le tisseur',
            'injunction' => '« resist » si le tisseur est la cible d’un sort adverse',
            'duration' => '1 heure maximum, si le tisseur quitte son pentacle, le sort se dissipe automatiquement',
            'description' => 'le tisseur trace un pentacle de 2 mètres de diamètre maximum, il lance le sort et devient immunisé à tous les sorts adverses tant qu’il reste dans son pentacle.',
            'image' => 'icons/pentacle.svg',
        ],

        'treason' => [
            'name' => 'Trahison',
            'target' => 'un personnage visible et à moins de 10 mètres',
            'injunction' => '« treason »',
            'duration' => '1 sablier',
            'description' => 'la cible se retourne contre les ennemis du tisseur.',
            'image' => 'icons/cloak-dagger.svg',
        ],

        'awakening-from-dead' => [
            'name' => 'Réveil des morts',
            'target' => 'un cadavre touché par le nécromancien',
            'injunction' => '« animate dead »',
            'duration' => '1 heure',
            'description' => 'ne peut être lancé qu’avec des Pierres de Vie ! le nécromancien peut transformer tous les cadavre qu’il touche en zombie, ceux-ci suivent ses directives pendant 1 heure. Les zombies gardent les capacités physiques qu’ils avaient de leur vivant (y compris les
points de vie de base) mais ne peuvent pas courir ou utiliser la magie. Il est impossible de réanimer deux fois le même cadavre. Après l’heure d’effet du
sortilège ou si ses points de vie retombent à 0, le personnage tomba à nouveau raide mort ( il redevient esprit).',
            'image' => 'icons/shambling-zombie.svg',
        ],

        'gift-of-life' => [
            'name' => 'Don de vie',
            'target' => 'un personnage mort depuis moins d’une heure',
            'duration' => 'permanent',
            'description' => 'une personne CONSENTANTE accepte de donner sa vie (= se faire éradiquer) pour en relever une autre. Celle-ci ne peut être la cible de ce
sort qu’une seule fois de toute son existence. Ne fonctionne pas avec un esprit, un corps réanimé, un zombie ou une personne contrainte de quelque manière que ce soit.',
            'image' => 'icons/life-in-the-balance.svg',
        ],

        'mass-berserk' => [
            'name' => 'Mass « berserk »',
            'target' => 'jusqu’à 5 personnages sans armure touchés par le tisseur',
            'duration' => '1 heure',
            'description' => 'ne peut être lancé qu’avec des Pierres de Vie !<br/> Les cibles tatouées du sort voient leurs points de vie multipliés par 2, celles-ci attaquent
leurs ennemis les plus proches et ne peuvent plus fuir le combat même si elle y est obligée par un autre sort. Un même personnage ne peut pas être la cible
de plus d’un sort berserk par jour.<br/>
N.B.: Ce sort ne peut être utilisé en bagarre, les personnages sous l’effet du sort ont une envie irrépressible de tuer leurs ennemis, ils feront tout pour y
parvenir. Par conséquent les règles de combat prennent le pas sur les règles de bagarre lorsqu’un personnage est touché par l’effet.',
            'image' => 'icons/dark-squad.svg',
        ],

        'mass-strike-down' => [
            'name' => 'Mass « strike down »',
            'target' => 'tous les personnages devant le tisseur et à moins de 10 mètres',
            'injunction' => '« mass Strike down »',
            'duration' => 'instantanée',
            'description' => 'ne peut être lancé qu’avec des Pierres de Vie !<br/> La cible est repoussée de 3 pas et doit s’asseoir les fesses contre le sol avant de pouvoir
se relever (même si l’attaque est parée par un bouclier ou une arme). Attention au risque de piétinement.',
            'image' => 'icons/falling.svg',
        ],

        'mass-dance' => [
            'name' => 'Mass « dance »',
            'target' => 'tous les personnages devant le tisseur et à moins de 10 mètres',
            'injunction' => '« mass dance »',
            'duration' => '1 sablier',
            'description' => 'ne peut être lancé qu’avec des Pierres de Vie !<br/> Les cibles dansent.',
            'image' => 'icons/love-song.svg',
        ],

        'mass-fear' => [
            'name' => 'Mass « fear »',
            'target' => 'tous les personnages devant le tisseur et à moins de 10 mètres',
            'injunction' => '« mass fear »',
            'duration' => '1 sablier',
            'description' => 'ne peut être lancé qu’avec des Pierres de Vie !<br/> Les cibles fuient le plus loin possible du tisseur, celles-ci ne peuvent en aucun cas revenir à moins
de dix mètres du jeteur de sort durant la durée du sort.',
            'image' => 'icons/screaming.svg',
        ],

        'mass-glue' => [
            'name' => 'Mass « glue »',
            'target' => 'tous les personnages devant le tisseur et à moins de 10 mètres',
            'injunction' => '« mass glue »',
            'duration' => '1 sablier',
            'description' => 'ne peut être lancé qu’avec des Pierres de Vie !<br/> Les cibles sont incapables de bouger leurs pieds pendant la durée du sort.',
            'image' => 'icons/sticky-boot.svg',
        ],

        'mass-mute' => [
            'name' => 'Mass « mute »',
            'target' => 'tous les personnages devant le tisseur et à moins de 10 mètres',
            'injunction' => '« mass mute »',
            'duration' => '1 sablier',
            'description' => 'ne peut être lancé qu’avec des Pierres de Vie !<br/> Les cibles sont incapables de parler pour la durée du sort.',
            'image' => 'icons/mute.svg',
        ],

        'pentacle-of-power' => [
            'name' => 'Pentacle de pouvoir',
            'target' => 'le tisseur',
            'duration' => '1 heure ou jusqu’à ce que le tisseur quitte son pentacle ou qu’il subisse des dégâts, auquel cas le sort se dissipe',
            'description' => 'le tisseur trace un pentacle de 2 mètres de diamètre maximum dans lequel il doit se mettre dedans et il lance son sort. Dès ce moment, le
tisseur peut prendre des points de vie à toute personne se trouvant dans son pentacle (lui-même, un prisonnier ou un volontaire). Il convertit 2 points de vie
en 1 pierre de vie « virtuelle ». Il peut convertir ainsi plusieurs fois des points de vie en pierres de vie virtuelles positives. Les pierres de vie ainsi gagnées
doivent toutes être utilisées simultanément pour lancer un sort. Cette conversion doit donc se faire avant chaque nouveau lancer de sort.<br/>
Un même personnage ne peut donner des points de vie qu’une seule fois dans un pentacle de pouvoir donné.<br/>Il faut dissiper un pentacle avant de pouvoir en lancer un nouveau.',
            'image' => 'icons/pentagram-rose.svg',
        ],

        'regenerate' => [
            'name' => 'Régénération',
            'target' => 'le patient touché par le tisseur',
            'duration' => 'instantanée',
            'description' => 'le guérisseur soigne instantanément son patient (rend tous les points de vie à toutes les localisations que les blessures soient légères ou graves). Ne fonctionne pas sur les maladies.',
            'image' => 'icons/regeneration.svg',
        ],
    ];
