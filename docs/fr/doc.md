# DAW JS Table - Documentation Française

DAW JS Table est une librairie Open Source JS et CSS pour générer des tableaux dynamiques en Ajax.

*Générerez facilement des tableaux dynamiques en Ajax !*




### Dépendances

* jQuery >= 1.12






## * Sommaire *

* Introduction
* Guide des sources du dossier "example"
* Un exemple de résultat en image
* Contribuer






## Introduction

Cette librairie Open Source est une simple bibliothèque JavaScript et CSS qui permet de générer des tableaux dynamiques en Ajax avec une pagination, un par page et un moteur de recherche interne.






## Guide des sources du dossier "example"

* assets
    * css.css : The "DAW JS Table" CSS.
    * jquery-1.12.4.min.js : JQuery qui est une dépendance JS de "DAW JS Table".
    * js.js : The "DAW JS Table" JavaScript.
* Controllers
    * ExampleController.php : Exemple d'utilisation d'un contrôleur avec "DAW JS Table" (exemple de logique...).
* images
    * L'image : Images qui est une dépendance du fichier assets/css.css.
* Models
    * Element.php : Exemple d'un modèle qui hérite d'un ORM Eloquent.
* views (Des exemples de vues, comment les utiliser, et quelles class et id CSS...)
    * index.php : View example - Est la vue du listage.
    * tableList.php : Exemple d'une vue à enregistrer dans une variable en PHP avec un buffer, qui sera envoyée à la vue index.php en Ajax.






## Un exemple de résultat en image

![DAW JS Table example](https://www.devandweb.fr/medias/images/packages/daw-js-table-example.png)






### Exemple avec Laravel 5

[Exemple avec Laravel 5](https://github.com/stephweb/daw-js-table-with-laravel5-framework)






## Contribuer

### Bugs et vulnérabilités de sécurité

Si vous découvrez un bug ou une faille de sécurité au sein de DAW JS Table, merci d'envoyez message à Steph. Tout les bugs et failles de sécurité seront traitées rapidement.




### License

DAW JS Table est une librarie Open Source sous la licence MIT.
