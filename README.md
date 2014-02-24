Phalcon-starterkit
==================

Phalcon is a wonderful C-based framework. It works fast and is really flexible, but its flexibility become a default as there is no fixed default structure when you start your project.

The Phalcon StarterKit was developed to let people start their project with a ready-to-use structure which doesn't need further configuration.

Requirements
=========

- Only phalconPHP framework loaded <3


Features
=========

- Landing page de départ
  
  Une page simple d'exemple permettant d'accompagner le développeur dans ses premiers pas avec le framework.

- Erreur 404

  Le starterKit embarque un système 404 pré-configuré via l'execution d'une action dans un controlleur
  
- Friendly Phalcon tools
	
  Le starterKit est compatible à 100% avec le phalconTools

- Base structure for MVC application
  
  Le starterKit utilise le pattern MVC

- Htaccess base
  
  Le starterKit comporte deux htaccess afin de rendre les urls plus propres

- Système d'environnement (chargement automatique du module débug de phalcon quand on est en développement)

  Le starterKit propose un petit système d'environnement (development/testing/production) via la constante ENVIRONMENT, lorsque vous êtes en développement, le starterKit charge automatiquement le module de debug de Phalcon
  
- Principaux services lancés 
  Le starterKit embarque différents services essentielles pour faire tourner votre application MVC tels que : config, url, database, view, router, dispatcher, volt

- Système magique de config, autoload de fichiers de config
  Vous pouvez créez vos propres fichiers de config dans le dossier app/config, si vous ajoutez le nom du fichier dans app/config/config.php dans le array autoload/configs, le starterKit le chargera automatiquement
	
- Système de détection du base URI
  Si vous n'avez pas remplis le baseUri dans app/config/config.php, le starterKit le devenira automatiquement

Structure
=========

```
app
  | cache
    | volt 
  | config
    | config.php 
    | di.php 
    | loader.php
    | routes.php
  | controllers
    | ControllerBase.php 
    | ErrorsController.php
    | HelloController.php
  | libraries 
  | models
  | views
    | errors 
      | show404.volt
    | hello
      | index.volt 
    | layouts
      |index.volt
  | public 
    | assets 
      | css 
      | img 
      | js
      | libs
    | uploads
  
```

# Structure Details


## App/cache

  >Ce dossier comporte les différents fichiers de cache générés par PhalconPHP

__app/cache/volt__

  > Le système de template Volt compilera les différentes vues dans ce dossier avec l'extension .volt-compiled
  
## App/config

  > Ce dossier comporte tout les fichiers de configurations de votre application 

__app/config/config.php__

  > Configuration de la base de donnée, de votre application (paths controllers/models/libraries/etc.), autoload (fonctionnalitée du starterkit qui est décrite plus bas)
  
__app/config/di.php__

  > Chargement des différents services de votre application tels que la vue, la base de données, le routing, à vrai dire les composants essentielles de votre application MVC. A noter, tout ce que vous enregistrez dans l'injecteur de dépendances est accessible ensuite dans vos différents controlleurs via ```$this->le_nom_de_votre_service->methode() ````

__app/config/loader.php__

  > Le fichier permet de configurer le loader de Phalcon (NameSpaces, etc.), par défaut le starterKit enregistre 3 paths par défaut (le dossier des controlleurs, des modèles et des librairies). 
  
  > Lorsque vous tentez d'initialiser une classe dans un controlleur par exemple : 
  
  ```php
  <?php

class DrugController extends ControllerBase
{

    public function newAction()
    {
    	// Init class
    	$drug = new Drug();
    }
}


  ```
  
  > Phalcon ira chercher dans les différents paths donnés si la classe Drug avec le nom de fichier Drug.php existe.
  
__app/config/routes.php__

  > Ce fichier vous permet d'ajouter de nouvelles routes pour votre application.
  
  > Exemple : 
  
  ```php
  
  <?php
  
  // Add new route
  $router->add('/i/love/drugs', 'drugs::new');
  
  ```
  
  > L'exemple ci-dessus permet de dire à Phalcon que lorsqu'un utilisateur navigue sur http://www.exemple.com/i/love/drugs, il doit exécuter le controlleur Drugs et l'action new.
  
## app/controllers

__app/controllers/ControllerBase.php

  > Le controlleur maître, tout les autres controlleurs sont généralement étendus de celui ci. Il vous permet d'ajouter des méthodes ou autres traitements qui seront accessibles dans les autres controlleurs.
  
  > Exemple : 
  
  ```php
  
<?php

// File : app/controllers/ControllerBase.php

class ControllerBase extends Controller
{
	// Init protected var
	protected $_favoriteDrug = '';

	public function initialize()
	{
		// We will fill favorite drug
		$this->_favoriteDrug = 'Acid';
	}

}



  ```
  
  
  ```php
<?php

class DrugsController extends ControllerBase
{

    public function favoriteAction()
    {
    	var_dump($this->_favoriteDrug);
    	die();
    }
}


  ```
  
  > L'exécution de la méthode favoriteAction de DrugsController affichera "Acid"

__app/controllers/ErrorsController.php__

  > De base ce controlleur ne possède qu'une seule méthode 404Action qui permet d'afficher une erreur404, ce controlleur est intimement lié au service dispatcher dans le fichier app/config/di.php, en effet le dispatcher exécute ce controlleur et l'action 404 quand il n'arrive pas a exécuter un controlleur et/ou une action demandée.
  
  
__app/controllers/HelloController.php__

  > Le controlleur qui est exécuté par défaut dans le système de routing (app/config/routes.php), il affiche tout simplement la landing page permettant de guider le nouveau développeur.
  
## App/libraries

  > Lorsque vous créez une nouvelle librairie pour votre application (Ex. une classe qui s'occupe d'envoyer des emails), vous pouvez la stocker dans ce dossier, elle sera automatiquement reconnu par Phalcon grâce à la configuration de base du starterKit.
  
## App/models

  > Ce dossier stocke tout les modèles de votre application, un modèle est une classe qui s'occupe d'intéragir avec votre base de données ou tout simplement d'une logique métier. Le starterKit est entièrement compatible avec le phalconTools, ainsi lors de la création automatique d'un modèle, celui-ci sera stocké directement ici.
  
## App/views

  > Ce dossier comporte toutes les vues de votre application. L'arboresence est importante, en effet le starterKit utilise le système automatique de rendu de Phalcon.
  
  > Exemple : Si vous executez le controlleur Hello et son action Index, Phalcon en déduira qu'il faut charger la vue views/hello/index.volt
  
  > Remarque : L'exemple est vulgarisé, en effet Phalcon prends en compte aussi les différents layouts de votre application, pour plus d'informations n'hésitez par à vous rendre ici : http://docs.phalconphp.com/en/latest/reference/views.html#hierarchical-rendering
  
__app/views/errors/show_404.volt__

  > La vue qui affiche l'erreur 404
  
__app/views/hello/index.volt__

  > La vue de la landing page
  
__app/views/layouts__

  > Le dossier comportant tout les layouts
  
__app/views/index.volt__

  > Le layout principal
  
## Public

   > Le dossier comporte les différents fichiers publics
   
## Public/assets
	
   > Le dossier comporte les différents assets de votre application (js/img/libs/css/etc.)
   
## Public/uploads
   
   > Le dossier comporte les différents uploads que votre application pourrait générer
   
## Public/.htaccess

   > Permet d'embelir vos URLs
   
## Public/bootstrap.php

   > S'occupe de lancer le starterKit
   
## Public/index.php

   > S'occupe de définir l'environnement de votre application et enclence bootstrap.php
  
  


