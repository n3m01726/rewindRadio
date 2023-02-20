<?php
define('ADMIN_MODE','1'); // défini comme 1 pour indiquer que le site est en mode administrateur.

define('SITE_URL','http://rewind.radio'); // l'url du site, défini comme rewind.radio.
define('ALL_MAIL','hello [at] rewind [point] radio'); //: l'adresse email de contact du site, définie comme hello [at] rewind [point] radio. Elle est définie de cette façon pour éviter un tant soit peu les robots.
define('SITE_SLOG', 'this is an awesome internet radio'); // le slogan du site, défini comme this is an awesome internet radio.
define('SITE_DESCRIPTION','This is a cool radio.'); // la description du site, définie comme This is a cool RadioDJ script..
define('SPACER','|'); // le caractère utilisé pour séparer les mots du titre du site, défini comme |.

define('LOGO_URL',''); // l'URL du logo du site, définie comme chemin/vers/logo.png.

define('RADIO_URL', 'https://webradio.shoutcast.ca/8010/stream/;'); // URL radio ex. https://yourstream.radio.ca/8787/stream

// Social Medias
// define('FACEBOOK','');
define('TWITTER','https://twitter.com/noordotda');
define('INSTAGRAM','https://instagram.com/noordotda');
define('GITHUB','https://github.com/noordotda');
define('TRELLO','https://trello.com/b/3hM69hil/rewindradio');
define('TIKTOK','https://www.tiktok.com/@www.radiobeats.ca');


define('RESTSERVER_URL','http://127.0.0.1');  // l'URL du serveur REST, définie comme 127.0.0.1.
define('RESTSERVER_PORT','8080'); // le port utilisé par le serveur REST, défini comme 8080.
define('RESTSERVER_PASSWRD','khth30n3!!@'); // le mot de passe utilisé pour se connecter au serveur REST, défini comme '' (vide).

define('REQUESTS_SECTION','1'); // définie comme 1 si le site affiche une section "dédicaces"
define('PODCASTS_SECTION','1'); // définie comme 1 si le site affiche une section "podcasts"

define('LOCAL_PODCASTS_FOLDER','G:\\Github\\rewindRadio'); // le dossier local des fichiers de podcasts, défini comme W:\Github\rewindRadio\public\audio. Il correspond au dossier avec le quel vous avez importer vos émissions dans RadioDJ.
define('REMOTE_PODCASTS_FOLDER','http://rewind.radio/'); //  le dossier en ligne des fichiers de podcasts, défini comme " . SITEURL . "/public/audio/. C'est le dossier dans lequel vos fichiers seront accessibles en ligne.

define('PLAYINFO','4'); // le nombre maximum de chansons à afficher dans l'historique de lecture, défini comme 4.
define('STREAM_CAT','5'); // l'ID de la catégorie de diffusion en ligne utilisée par le site, défini comme 5.

// define('ADS_CODE','1'); //le code HTML des publicités à afficher
define('ADS_WARNING',"Vous avez un Google Ads ou un compte publicitaire? Ajoutez-le ici! Allez dans la section ads block du fichier constants.php pour ajouter votre code HTML");

define('ORS_NUMBER',''); // le numéro de licence de diffusion en ligne, défini comme '' (vide).
define('SOCAN_URL',''); // // Lien vers le logo SOCAN.

define('LASTFM_APIKEY','acfdea4cdcb5e0ff11b0d7c2dfd1d3dc'); //  la clé d'API de Lastfm, définie comme une chaine de 32 caratères ex. "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX".
define('DISCORD_INVITE','https://discord.gg/fJ76jFQh');

define('FB_OG_TYPE',''); //  le type de contenu associé à l'application, défini comme website.
define('FB_APPID',''); //  l'ID de l'application Facebook
define('FACEBOOK_ID',''); // l'ID de la page Facebook associée à l'application

// Les liens ici ne sont la qu'à titre indicatif. 
define('F3_LINK1_TXT','La Grosse Radio');
define('F3_LINK1_LINK','https://www.lagrosseradio.com');
define('F3_LINK2_TXT','Digitally Imported');
define('F3_LINK2_LINK','https://di.fm');
define('F3_LINK3_TXT','Fréquence 3');
define('F3_LINK3_LINK','https://f3.fr');
define('F3_LINK4_TXT','Zen Radio');
define('F3_LINK4_LINK','https://www.zenradio.com');

// don't touch anything from here!
define('VIEW_PATH', '../resources/views/');
define('RESOURCES_PATH', '../resources/');
define('CONFIG_PATH', '../config/');
define('UPLOAD_PATH', '/public/uploads/');
