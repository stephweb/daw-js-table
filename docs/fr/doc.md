# DAW JS Table

DAW JS Table est une librairie Open Source JS et CSS pour générer des tableaux dynamiques en Ajax.

*Générez facilement des tableaux dynamiques en Ajax !*




### Documentation complète :
https://www.devandweb.fr/packages/daw-js-table






## * Sommaire *

* Introduction
* Guide des sources
* Un exemple de résultat en image
* Contribuer






## Introduction

Cette librairie Open Source est une simple librairie en JavaScript et CSS qui permet de générer des tableaux dynamiques en Ajax avec une pagination, un par page, un order by, un moteur de recherche interne.






## Guide des sources du dossier "example"

* assets
    * css.css : Le CSS de "DAW JS Table".
    * jquery-1.12.4.min.js : jQuery qui est dépendant au JS de "DAW JS Table".
    * js.js : Le JavaScript de "DAW JS Table".
* Controllers
    * ExampleController.php : Exemples de comment utiliser un Controller avec "DAW JS Table"(exemple de logique...).
* images
    * Toutes les images : Images du Table qui sont dépendante au fichier assets/css.css.
* Models
    * Element.php : Exemple d'un Model qui hérite de l'ORM Elequent.
* views (Exemples de vues, comment les utiliser, et quels class et id CSS mettre...)
    * index.php : Exemple de vue - Est la vue des listages.
    * tableList.php : Exemple de vue à enregistrer dans une variable en PHP avec un buffer, qui sera envoyé à la vue index.php en Ajax.






## Un exemple de résultat en image

![DAW JS Table example](https://www.devandweb.fr/medias/upload/package/daw-js-table-example.png)






### Exemple avec Laravel 5

[Exemple avec Laravel 5](https://github.com/stephweb/daw-js-table-with-laravel5-framework)






## Contribuer

### Bugs et vulnérabilités de sécurité

Si vous découvrez un bug ou une faille de sécurité au sein de DAW JS Table, merci d'envoyez message à Steph.
Tout les bugs et failles de sécurité seront traitées rapidement.




### Licence

DAW JS Table est une librarie Open Source sous la licence MIT.