# IPSSI - ASI 20.2 - OOP

**Justine Hilzheber**

## Sujet de contrôle

Le contrôle comporte deux parties, une pratique et une théorique.

Le projet comporte les dépendances nécessaires à la réalisation du projet, incluant un fichier `composer.json`.

La date de rendu est fixée au 12/17/2018 12:00 Europe/Paris.

La partie pratique consiste à réaliser un puissance 4 (connect four) multijoueur (les joueurs sont répartis dans les deux équipes).

### Dépendances

Pour simplifier la réalisation du projet, la référence à `zendframework/zend-servicemanager` est déjà explicitée dans le `composer.json`.

`zendframework/zend-servicemanager` est une librairie fournissant une implémentation pour un container d'injection de dépendance compatible PSR-11.

Du code est fourni dans `support` et déjà auto chargé. Un début de jeu puissance4 est fourni, vous devez le compléter avec les classes nécessaires pour représenter les pions, le terrain de jeu (grille). Vous ne pouvez pas changer le code dans le dossier support, vous devrez donc profiter de l'interface `Game` et de l'injection de dépendance fournie pour proposer votre propre implémentation du jeu dans `src`.

### Exécution / Résultat

Le résultat de l'exécution du code à l'aide du client CLI de PHP (`php index.php connect4`) doit résulter dans la trace d'execution suivante :

> Initialisation du jeu avec {{ nombre de participants}} participants.  
> Initialisation de la grille en 7 colonnes et 6 lignes.  
> Exclusion d'un participant si nombre impair.  
> Choix aléatoire des équipes (rouge et jaune).  
> Choix aléatoire de l'identifiant du premier participant.  
> Joueur 3 (rouge) joue dans la case 1,1.  
> Joueur 1 (jaune) joue dans la case 2,1.  
> Partie terminée, rouge gagne.  
 
Bien entendu la partie déroulement du jeu peu changer (aléatoire). Les coordonnées sont exprimées dans le référentiel suivant :

| 6,1 | 6,2 | 6,3 | 6,4 | 6,5 | 6,6 | 6,7 |
|-----|-----|-----|-----|-----|-----|-----|
| 5,1 | 5,2 | 5,3 | 5,4 | 5,5 | 5,6 | 5,7 |
| 4,1 | 4,2 | 4,3 | 4,4 | 4,5 | 4,6 | 4,7 |
| 3,1 | 3,2 | 3,3 | 3,4 | 3,5 | 3,6 | 3,7 |
| 2,1 | 2,2 | 2,3 | 2,4 | 2,5 | 2,6 | 2,7 |
| 1,1 | 1,2 | 1,3 | 1,4 | 1,5 | 1,6 | 1,7 |

La première équipe arrivant à 4 pions en ligne, colonne ou diagonale à gagné.

### Environnement

Pour exécuter le projet, il faudra lancer le fichier `index.php` en ligne de commande.

Des instructions pour l'exécution doivent être fournies dans le fichier `doc/install.md`, et la mise en place de l'environnement doit se faire en 1 ou 2 commandes maximum.

Un `Dockerfile` voir un `docker-compose.yaml` peuvent être fournis, en quel cas l'exécution pourra être faite à l'aide de ces outils. Dans tout autre cas, `php` en version `7.2.12-cli` sera utilisée.

### Notation

#### Pratique

* 1 point pour l'auto chargement des classes à l'aide de Composer.
* 1 point pour le respect des recommandations PSR-2, testé avec php-cs-fixer (avec les règles PSR-2 uniquement).
* 1 point pour le respect de la trace de sortie.
* 3 points pour les entités (joueur, équipe, pions rouges et jaunes, grille, partie, tour de jeu, etc)
* 1 point pour l'ajout d'interfaces quand nécessaire.
* 1 point pour l'ajout de final quand nécessaire.
* 1 point pour l'utilisation d'un héritage au bon endroit.
* 1 point pour ne pas avoir de méthode de plus de 9 lignes.
* 1 point pour l'utilisation intensive du container d'injection de dépendance, des interfaces et de l'inversion de dépendance.
* 4 point pour le fonctionnement global.

#### Théorie

* 1 point pour donner les noms de fichiers et les lignes de ces fichiers dans lesquelles un mécanisme d'inversion de dépendance est à l'oeuvre.



* 2 points pour un diagramme de classe incluant les classes et interfaces que vous avez créé ainsi que celles dont vous dépendez


Pour les tables et champs : cf Ressources/Env/Gamers.sql

# Class et Interfaces avec leurs héritages : #

----------- PLAYER -----------

class Player : Entity/Player

- depend des class Uuid, Pseudo, Team, Statute : Templates/ValueObject/Player
- implemente l'interface Participant : Support\Entity\Participant
        -> interface Participant (App\Entity) extends Participant (Support\Entity\Participant)

class Team : Templates/ValueObject/Player

- implemente l'interface Boolean : Service.php

class Statute : Templates/ValueObject/Player

- implemente l'interface Boolean : Service.php

class Uuid : 

-  implemente l'interface Identifier

class Peudo : 

-  implemente l'interface Pseudo


interface Player : src\Repository\Players

- extends les interfaces FindAll, Finder : src\Repository

----------- PAWN -----------

class Pawn : Entity/Pawn

- depend de la class Name : Templates/ValueObject

class Name : Templates/ValueObject

- implemente l'interface Boolean : Service.php

class Color : src\Entity\Pawn

- implemente la class Name : Templates/ValueObject

interfaces pour Pawn:

    interface intval : src\Entity\Pawn

    interface Name : src\Entity\Pawn 

    interface Pawn : src\Entity\Pawn
    
        - extends Name, Position : src\Entity\Pawn
      
    interface Position : src\Entity\Pawn
    
        -  extends PositionX, PositionY, intval : src\Entity\Pawn
        
    interface PositionX : src\Entity\Pawn
    
    interface PositionY : src\Entity\Pawn
    
class StatutePosition : src\Repository\Position

----------- GAME -----------

class Game : App\DependencyInjection\Factory

- implemente l'interface FactoryInterface : Zend\ServiceManager\Factory\FactoryInterface

class GameInterface : src\Action

class Moving : src/Action

- implemente l'interface Move : src\Repository\Move

class Party : src\Entity\Game

----------- CONFIG & CONNEXION -----------

class InDatabase : src\Repository

class Container : config\Container

- implemente les interface ConnectFourGame, PseudoRandomValue : config/

class Container : App

- implemente l'interface ContainerInterface

class DbConnection : src\Persistence

- extends PDO : PDO

----------- OTHER -----------

interface Game

interface Boolean

class Application : App


* 2 points pour un court argumentaire sur le thème "héritage vs composition", avantage et inconvénient de chaque (un travail de recherche court est donc à effectuer, "Composition over inheritance" en anglais). Le texte fourni doit faire 500 mots.

En développement php POO, il est possible de réutiliser des morceaux de code déjà écrit, ou d'en créer de nouveaux à utiliser plus tard et pour différentes utilisations.

Ici, tout est objet, nous créons donc des objets que nous pourrons réutiliser sans impacter ces derniers.

Pour ce faire, on appellera ceux qui nous interressent au moment venu. Deux façons de faire sont possibles : par héritage ou en passant par la composition.

L'HERITAGE :

Ici, on va hériter de la classe appelée, mais aussi de ses fonctionnalités. Cette approche va appliqué le principe de substitution de Liskov : respect de l'identité avec une existence de type "is-a" entre les deux classes.
La classe qui hérite devra donc être concernée par toutes les méthodes de la classe applée car elle va en hériter. Elle auront le même comportement.

Un de problemes majeurs de cette methode est le fait que la classe "fille" a acces aux poprietes non privees de la classe "mere" et peut donc affecter cette derniere.

LA COMPOSITION :

Ici, l'invariant de la classe "mere" est protegé et non abordable par la classe "fille", seules les informations publiques sont publiques. On composera notre classe selon les methodes ou modules qui sont a notre diposition. On parlera de relation de type "has-a".

Elle sera utilisée quand la relation de type "is-a" n'est pas totale. Sinon, on utilisera l'heritage.

De plus, en utilisant la composition, on pourra réutiliser du code pour une classe finale.

En utilisant la methode composition, on peut réutiliser le code de nombreuses class car elles sont déclarées comme une simple variable membre, mais avec Héritage, on ne paut réutiliser le code que d’une seule class car en PHP ou dans quelque d’autre langage de programmation, on ne peut hériter que d’une seule class.

CONCLUSION :

En choisissant la bonne methode, on evitera des erreurs, des remparts inutiles ou des "portes ouvertes" sur des class "mere".
La plupart du temps, on préfèrera la methode de composition sauf quand dans des cas precis d'heritage pur.

La composition permettra de simplifier les relations entres les objets et le code sera moins interdependant et plus facilement reutilisable.

### Tolérances

Bien que le code fourni soit en anglais, le code produit lors de votre contrôle peut être écrit en français.

L'environnement docker est facultatif.

Une tolérance de 20% en plus ou moins est appliquée sur le nombre de mots de la dernière question théorique.
#   t e s t 
 
 # ipssi-d20.2-oop-master
# ipssi-d20.2-oop-master
