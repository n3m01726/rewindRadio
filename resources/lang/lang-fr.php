<?php
$lang["alertBetaSetup"] = "Prendre note que ce script est en version alpha. Veuillez consulter <a href='https://github.com/noordotda/rewindRadio'>la page Github</a> pour rester à jour.";

// Configuration & Setup
$lang["setupTitle"] = "Installation de rewindRadio ";
$lang["noInstallScript_tt_fr"] = "Installation non-terminée.";
$lang["noInstallScript_txt_fr"] = "Désolé, il semble que vous n'ayez pas completé le processus d'installation du script. Pour continuer, veuillez suivre les instructions d'installation disponibles en cliquant sur le bouton ci-bas. Si vous rencontrez des problèmes lors de l'installation ou l'utilisation du script, n'hésitez pas à visiter <a href='https://github.com/noordotda/rewindRadio'>la page Github</a> pour obtenir de l'aide.";

$lang["noInstallScript_tt_en"] = "Installation not completed";
$lang["noInstallScript_txt_en"] = "Sorry, it seems that you have not complete the installation process. To proceed, please follow the installation instructions available by cliking on the button below. If you experience any issues while installing or using the script, please don't hesitate to visit <a href='https://github.com/noordotda/rewindRadio'>the Github page</a>.";
$lang["startInstallation_fr"] = "Démarrer l'installation";
$lang["startInstallation_en"] = "Start Installation";

// Formulaire d'installation et de configuration
$lang['intro'] = "Veuillez ajouter les informations de votre base de données ci-dessous.";
$lang['labelHostname'] = "Nom d'hôte :";
$lang['helpHostname'] = "Veuillez écrire votre nom d'hôte mySQL. ";
$lang['labelUsername'] = "Nom d'utilisateur :";
$lang['helpUsername'] = "Veuillez écrire votre nom d'utilisateur mySQL. Ne pas utiliser l'utilisateur root. Créez un nouvel utilisateur pour le script.";
$lang['labelPassword'] = "Mot de passe :";
$lang['helpPassword'] = "Veuillez écrire votre mot de passe mySQL.";
$lang['labelDatabase'] = "Base de données pour le script :";
$lang['helpDatabase'] = "Veuillez écrire votre base de données mySQL.";
$lang['labelPrefix'] = "Préfixe de table :";
$lang['helpPrefix'] = "<p>Un underscore '_' sera ajouté à la fin de votre préfixe, par exemple, prefix_tablename, pour retrouver les tables plus facilement en cas de bug. </p><p> Ajouter <code>nomdelabasededonnees.</code> à votre préfixe si vous ne compter pas utliser la même base de données pour le script et RadioDJ.</p>";
$lang['labelFakeData'] = "Ajouter des données fictives";
$lang['helpFakeData'] = "Veuillez cocher cette case si vous souhaitez ajouter des données fictives.";
$lang['labelDeteleFakeData'] = "Supprimer les données fictives";
$lang['helpDeleteFakeData'] = "Veuillez cocher cette case si vous souhaitez supprimer les données fictives.";
$lang['btnSubmitSetup'] = 'Installer le plugin';


$lang['labelSite_name'] = "Nom de votre site web";
$lang['helpSite_name'] = "Veuillez écrire le nom de votre site web.";
$lang['labelUser_name'] = "Nom d'utilisateur :";
$lang['helpUser_name'] = "Veuillez écrire votre nom d'utilisateur. Il vous servira pour vous connecter à la section privée du site web.";
$lang['labelPass_word'] = "Mot de passe :";
$lang['helpPass_word'] = "Veuillez écrire votre mot de passe. Il vous servira pour vous connecter à la section privée du site web.";
$lang['userEmailMessage'] = "Veuillez écrire votre courriel ici. Il servira à changer votre mot de passe et activer votre compte.";
// Error or maintenance
$lang["404error"] = "<lostCode>Je suis perdu. erreur 404.</lostCode>";

$lang['sqlERROR'] = 'Ce site est en maintenance, nous serons de retour sous peu. si ce message persiste, 
vous pouvez nous rejoindre via les plateformes sociales habituelles, ou sur Discord.';

// days of the week
$lang['monday'] = 'Lundi';
$lang['tuesday'] = 'Mardi';
$lang['wednesday'] = 'Mercredi';
$lang['thursday'] = 'Jeudi';
$lang['friday'] = 'Vendredi';
$lang['saturday'] = 'Samedi';
$lang['sunday'] = 'Dimanche';
$lang['all'] = "Tous les";
$lang["timezone"] = "EST";

// Cookies messages
$lang['lnk_cookies_msg_txt'] = "En naviguant sur notre site, vous acceptez l'utilisation de cookies. Nous utilisons uniquement des cookies pour avoir des statistiques de visites!";

// Header Navigation
$lang['home'] = 'accueil';
$lang['magazine'] = 'magazine';
$lang['charts'] = 'décomptes';
$lang['schedule'] = 'horaire';
$lang['radioShows'] = 'émissions';
$lang['videos'] = 'vidéos';
$lang['listenPopup'] = 'Ouvrir la radio';

// si user n'est pas connecté
$lang['signIn'] = 'Se connecter';

// si user est connecté
$lang['newArticle'] = 'Nouvel article';
$lang['myArticle'] = 'Mes articles';
$lang['myEvents'] = 'Mes événements';
$lang['myShows'] = 'Mes émissions';
$lang['mySchedule'] = 'Mon horaire';
$lang['settings'] = 'Paramètres';
$lang['viewProfile'] = 'Profil';
$lang['signOut'] = 'Se déconnecter';

// Section des nouvelles
$lang['news'] = "Nouvelles";
$lang['posted_by'] = "Posté par : "; 

//Historique des musiques
$lang['lastplay'] = 'Joué récemment';
$lang['noSongs'] = "Aucune chanson à afficher.";

// Décoompte des musiques les plus jouées - Le nombre de musiques à afficher est renseigné dans src/constants.php
$lang['countdown'] = "Décompte RewindRadio";

// Dédicaces
$lang['requests'] = "Demandes";
$lang['noRequestMessage'] = "Aucune demande pour le moment.";
$lang['btnMakeRequests'] = 'Faire une demande';
$lang['showRequestList'] = 'Voir la liste de demandes';

// Émissions en direct - La catégorie utilisée est Radio Shows dans la radioDJ, chacunes des sous-catégories représente une émissions 
$lang['shows'] = 'Émissions en direct';
$lang['btn_subscPodcast'] = "Abonnement RSS";
$lang['btn_moreInfoPodcast'] = "Sur demande";

// Les évenements sur RadioDJ - La catégorie des évènements est renseignée dans le fichier src/constants.php
$lang['events'] = 'Evenements';
$lang['addToCalendar'] = 'Me le rappeler'; // function in progress
// Ce qui joue présentement
$lang['nowplaying'] = "En train de jouer:";
$lang['onAirShow'] = 'En direct maintenant:';
$lang['NoPlayedSongs'] = "Pas de chansons jouées.";

// Liens Footer

// Footer 01
$lang['mobileApp'] = "Applications mobile";
$lang['lnk_download_simpleRadio'] = "<p>Téléchargez l'application SimpleRadio pour écouter rewindRadio.</p>";
$lang['lnk_req_simpleRadio'] = "<p>Nécessite iOS 9.0 ou version ultérieure ou Android 4.1 ou version ultérieure.</p>";

// Footer menu 02
$lang['lnk_helpfaq_txt'] = 'Aide et FAQ';
$lang['lnk_listenOptions_txt'] = "Comment écouter rewindRadio";
$lang['merch'] = "Merch / Goodies";
$lang['team'] = "Équipe";
$lang['privacyPolicy'] = "Politique de confidentialité";
$lang['volunteering'] = "Bénévolat";
$lang['lnk_join_txt'] = "Rejoindre rewindRadio";
$lang['lnk_blog_txt'] = "Blog";
$lang['about'] = "À propos de rewindRadio";

// Footer 03
$lang['tt_footer_03'] = 'Nos Radios';

// Copyright informations
$lang['lnk_credits_txt'] = "Crédits";


// Shows.php
$lang['Support_this_show'] = "Soutenir cette émission";
$lang['Contact_the_DJ_via_Discord'] = "Rejoignez le DJ sur Discord";
$lang['last_episodes'] = "Derniers épisodes";
$lang["show_infos"] = "Infos sur cette émission";
$lang['next_episode'] = 'Prochain épisode';
$lang['Hosted_by'] = 'Présenté par';
$lang['All'] = 'Tous';
$lang["No_longer_online"] = "Cette émission n'est plus en ligne.";

// modals.php

// About us Modal
$lang['aboutUsTxt'] = "rewindRadio est un projet de radio internet fictif pour la démo de plugin RadioDJ noordaStudios. Récupère les informations directement de votre base de données RadioDJ. Les dernières chansons jouées, les plus jouées ainsi que les événements ajoutés dans une catégorie spécifique.";

// Listen Options Modal
$lang['listenOptions'] = "Options d'écoute";
$lang['apps'] = "Applications";
$lang['description'] = "Notre site fonctionne parfaitement sur votre navigateur de bureau, iPhone, iPad et Android. Mais, si vous souhaitez vraiment utiliser une application pour écouter notre radio, vous pouvez essayer :";
 
// Tune In
$lang['modal_tt_tunein'] = "";
$lang['modal_txt_tunein_web'] = "";
$lang['modal_url_tunein_web'] = "";
$lang['modal_txt_tunein_iphone'] = "";
$lang['modal_url_tunein_iphone'] = "";
$lang['modal_txt_tunein_android'] = "";
$lang['modal_url_tunein_android'] = "";

// Smart Homes Vocal Assistants
$lang['modal_tt_smart'] = "";
$lang['modal_description_smart'] = "";
$lang['modal_smart_alexa_txt'] = "";
$lang['modal_smart_alexa'] = "";
$lang['modal_smart_siri_txt'] = ""; 
$lang['modal_smart_siri'] = "";
$lang['modal_smart_google'] = "";
$lang['modal_smart_google_txt'] = "";

// Others Formats Modal
$lang['listenLinks'] = "Liens d'écoute";
$lang['otherFormats'] = "Autres formats";
$lang['formatTxt'] = "Fichiers pour iTunes, Winamp et autres applications ! Ouvrez le fichier dans l'application de votre choix ou faites glisser le lien sur l'icône. Nous proposons les trois formats les plus courants, vous trouverez probablement ce que vous cherchez !";
$lang['m3UTxt'] = "M3U Playlist Format →";
$lang['m3ULink'] = "path/to/the/file.m3u";
$lang['plsTxt'] = "PLS Playlist Format →";
$lang['plsLink'] = "path/to/the/file.pls";
$lang['xspfTxt'] = "XSPF Playlist Format →";
$lang['xspfLink'] = "path/to/the/file.xspf";

// Contact Modal
$lang['contact'] = "Nous contacter";
$lang['contactTxt']= "Vous pouvez nous contacter à tout moment via hello [at] rewind [point] radio ou sur les différentes plateformes sociales.";


$lang['lnk_tunein_txt'] = "TuneIn";
$lang['lnk_tunein_description'] = "La plus grande plateforme de streaming audio et de musique au monde, avec plus de 100 000 stations de radio.";
$lang['lnk_vtuner_txt'] = "vTuner";
$lang['lnk_vtuner_description'] = "Une plateforme qui vous permet d'accéder facilement aux stations de radio en ligne du monde entier.";
$lang['lnk_radionomy_txt'] = "Radionomy";
$lang['lnk_radionomy_description'] = "Une plateforme qui vous permet de créer et d'écouter des stations de radio personnalisées.";
$lang['lnk_simpleRadio_txt'] = "SimpleRadio";
$lang['lnk_simpleRadio_description'] = "Une application mobile qui vous permet d'écouter des stations de radio en ligne du monde entier.";
$lang['lnk_windowsMediaPlayer_txt'] = "Windows Media Player";
$lang['lnk_windowsMediaPlayer_description'] = "Le lecteur multimédia par défaut pour les systèmes d'exploitation Windows, qui vous permet également d'écouter des stations de radio en ligne.";
$lang['lnk_itunes_txt'] = "iTunes";
$lang['lnk_itunes_description'] = "Un lecteur multimédia et un logiciel de bibliothèque pour Mac et PC, qui vous permet également d'écouter des stations de radio en ligne.";
$lang['lnk_quicktimePlayer_txt'] = "QuickTime Player";
$lang['lnk_quicktimePlayer_description'] = "Un lecteur multimédia pour Mac et Windows, qui vous permet également d'écouter des stations de radio en ligne.";
$lang['lnk_realPlayer_txt'] = "RealPlayer";
$lang['lnk_realPlayer_description'] = "Un lecteur multimédia pour Windows et Mac, qui vous permet également d'écouter des stations de radio en ligne.";
$lang['lnk_winamp_txt'] = "Winamp";
$lang['lnk_winamp_description'] = "Un lecteur multimédia pour Windows, qui vous permet également d'écouter des stations de radio en ligne.";