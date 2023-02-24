# RewindRadio - Interface web pour RadioDJ
Ce script est conçu pour gérer le site web de votre station de radio en ligne. Il offre les fonctionnalités suivantes :

* Afficher les dernières chansons jouées
* Faire un décompte des chansons les plus jouées
* Système de news/blog intégré pour tenir les auditeurs informés
* Afficher les évènements de la station pour permettre aux auditeurs de s'y inscrire
* Page horaire pour montrer les heures de diffusion
* Affichage des émissions enregistrées/podcasts pour une écoute en différé.
* Ce script offre une interface simple et efficace pour gérer les différents aspects de votre station de radio en ligne. 

- PHP v8.1.16
- MySQL 8.0.26 (looking for switching on MariaDB)
- RadioDJ 2.0.3.9

## Dépendances :
 - Glide 
 - Bootstrap 5.3-alpha1 
 - Bootstrap Icons
 - Plyr.io 3.7.3

 ## Règles de codage
Les règles de codage sont grandement inspirées du modèle d'AngularJS. 
* Toutes les fonctionnalités ou corrections de bugs **doivent être testées** par une ou plusieurs spécifications (tests unitaires).

## <a name="commit_rules"></a> Règles des commits
```
<type>(<portée>) : <sommaire>
```
Les champs `<type>` et `<sommaire>` sont obligatoires, le champ `(<portée>)` est facultatif.

##### Type

Doit être l'un des suivants :

* **build** : modifications qui affectent le système de construction ou les dépendances externes (exemples de portée : gulp, broccoli, npm)
* **ci** : Modifications de nos fichiers et scripts de configuration
* **docs** : la documentation change uniquement
* **feat** : Une nouvelle fonctionnalité
* **fix** : une correction de bogue
* **perf** : un changement de code qui améliore les performances
* **refactor** : un changement de code qui ne corrige pas de bogue ni n'ajoute de fonctionnalité
* **test** : ajout de tests manquants ou correction de tests existants

##### Portée
La portée doit être le nom de la section affectée. Voici la liste des champs d'application pris en charge :

* **core**
* **home-widget\widgetname => lastsongs, countdown, requests, events, shows**
* **profile**
* **schedule**
* **charts**
* **blogsys**
* **team**
* **videos**
