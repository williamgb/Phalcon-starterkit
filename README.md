Phalcon-starterkit
==================

Phalcon is a wonderful C-based framework. It works fast and is really flexible, but its flexibility become a default as there is no fixed default structure when you start your project.

The Phalcon StarterKit was developed to let people start their project with a ready-to-use structure which doesn't need further configuration.

Requirements
=========

- Only phalconPHP framework loaded <3

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

Structure Details
=========

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
  
  > Phalcon ira chercher dans les différents paths donnés si la classe existe.

Features
=========

- Landing page de départ
  
  Une page simple d'exemple permettant d'accompagner le développeur dans ses premiers pas avec le framework.

- Erreur 404
- Friendly Phalcon tools
- Base structure
- Htaccess base
- Système d'environnement (chargement automatique du module débug de phalcon quand on est en développement)
- Principaux services lancés (config, url, database, view, router, dispatcher (execution des différentes actions), volt)
- Système magique de config, autoload de fichiers de config
- Système de détection du base URI
