Phalcon-starterkit
==================

Phalcon is a wonderful C-based framework. It works fast and is really flexible, but its flexibility become a default as there is no fixed default structure when you start your project.

The Phalcon StarterKit was developed to let people start their project with a ready-to-use structure which doesn't need further configuration.

Structure
=========

app
  | cache (dossier comportant les fichiers de cache)
    | volt (dossier où sont stockés les fichiers compilés de volt)
    
  | config (dossier comportant toutes les configurations de l'application)
    | config.php (config a propos l'application, de la database)
    | di.php (tout les services loadés view/config/url/database/etc.)
    | loader.php (tout les répertoires comportant les classes a charger quand elle ne sont pas trouvées)
    | routes.php (les routes de l'application)
    
  | controllers (Les controllers de l'application)
    | ControllerBase.php (Tout les controllers sont étendus de cette classe afin de ne pas se répéter lors du dev)
    | ErrorsController.php (S'occupe d'afficher l'erreur 404)
    | HelloController (Landing page)
    
  | libraries (Les différentes classes développées par le développeur)
  
  | models (Dossier où sont stockés les différents modèles)
  
  | views (Dossier où sont stockés les views)
    | errors (Dossier où sont stockés les views d'erreurs
      | show404.volt (La vue de l'erreur 404)
    | hello (Dossier où est stocké la vue de la landing page)
      | index.volt (La vue de la landing page)
    | layouts (Les layouts des controllers)
    index.volt (Main layout de l'application)
    
  | public 
  
    | assets (Dossier comportant les assets)
      | css (Dossier où se trouve les différentes css)
      | img (Dossier où se trouve les différentes images)
      | js (Dossier où se trouve les différentes scripts javascript)
      | libs (Dossier où se trouve les librairies assets, ex. bootstrap, etc.)
      
    | uploads (Dossier comportant les différents uploads)
  
  
Features
=========

- Landing page de départ
- Erreur 404
- Friendly Phalcon tools
- Base structure
- Htaccess base
- Système d'environnement (chargement automatique du module débug de phalcon quand on est en développement)
- Principaux services lancés (config, url, database, view, router, dispatcher (execution des différentes actions), volt)
- Système magique de config, autoload de fichiers de config
- Système de détection du base URI
