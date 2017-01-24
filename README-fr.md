# DAW JS Table

Générez facilement des tableaux dynamiques en Ajax !

### Documentation complète :
https://www.devandweb.fr/packages/daw-js-table






## * Sommaire *

* Introduction
* Guide des sources
* Un exemple de résultat en image
* Contribuer






## Introduction

Package DAW JS Table est une simple librairie en JS et CSS qui permet de générer des tableaux dynamiques en Ajax avec une pagination, un par page, un order by, un moteur de recherche interne.






## Guide des sources

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
    * index.php : Exemple de vue est la vue des listing.
    * tableList.php : Exemple de vue à enregistrer dans une variable en PHP avec un buffer, qui sera envoyé à la vue index.php en Ajax.






## Un exemple de résultat en image

![DAW JS Table example](https://www.devandweb.fr/medias/upload/package/daw-js-table-example.png)






## Contribuer

### Bugs et vulnérabilités de sécurité

Si vous découvrez un bug ou une faille de sécurité au sein de DAW JS Table, s'il vous plaît envoyer message à Steph. Merci.
Toutes les bugs et failles de sécurité seront traitées rapidement.




### Licence

DAW JS Table est une librarie Open Source sous la licence MIT.