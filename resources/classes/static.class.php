<?php
namespace App;

class StaticContent 
{
    public static function getHeader() 
    {
      StaticContent::getMeta(); 
      StaticContent::getIcons();
      StaticContent::getStyleSheet();   
    }
    
    public static function getMeta() 
    {
        echo '
        <!-- Metas SEO -->
        <meta name="description" content="'.SITE_DESCRIPTION.'">
        <meta name="author" content="'.SITE_NAME.'">
        <meta name="apple-mobile-web-app-title" content="'.SITE_NAME.'">
        <meta name="application-name" content="'.SITE_NAME.'">
        <meta name="robots" content="index, follow">
        <meta name="description" content="'.SITE_DESCRIPTION.'">';
    }
    
    public static function getIcons() 
    {
        echo '
        <!-- icons -->
        <link rel="apple-touch-icon"         href="icons/icon_iphone.png" sizes="180x180">
        <link rel="icon" type="image/png"    href="icons/icon_48.png" sizes="48x48">
        <link rel="icon" type="image/png"    href="icons/icon_32.png" sizes="32x32">
        <link rel="icon" type="image/png"    href="icons/icon_16.png" sizes="16x16">
        <link rel="shortcut icon"            href="icons/favicon.ico" />
        <link rel="icon" type="image/x-icon" href="icons/favicon.ico" />
        <link rel="icon" type="image/png"    href="icons/icon_16.png" />'; 
    }
    public static function getStyleSheet() {
      echo '
      <!-- Plugins CSS Styles Sheets -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
      <link rel="stylesheet" href="https://cdn.plyr.io/3.7.2/plyr.css" />
      <link href="css/style.css" rel="stylesheet"/> 
      ';
}
public static function getScriptFiles() {
  echo '
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
      <script src="https://cdn.plyr.io/3.7.3/plyr.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script>
      document.addEventListener("DOMContentLoaded", () => {
          const controls = ["play", "mute", "volume", "airplay", "settings"];
          const players = Array.from(document.querySelectorAll(".js-player")).map(
            (p) => new Plyr(p)
          );
        });
        
        // Get all the plyr players on the page
        const players = Array.from(document.querySelectorAll(".js-player")).map(p => new Plyr(p));
        
        // Loop through the players and add an event listener for the `playing` event
        players.forEach(player => {
          player.on("playing", event => {
            // When the player starts playing, loop through all the other players and pause them
            players.forEach(otherPlayer => {
              if (otherPlayer !== player) {
                otherPlayer.stop();
              }
            });
          });
        });
      </script>';
}

public static function noScriptInstalled() {  
  $lang = [];
  include('../lang/lang-fr.php');
  echo'
  <body class="bg-dark">
  <div class="text-center mt-5">
  <img src="images/logo.png" width="150px" height="150px" alt="your awesome logo">
  </div>
  <div class="card mx-auto mt-3 text-dark" style="width: 30rem;">
  <div class="card-header"><h4>'.$lang["setupTitle"].'</h4></div>
  <div class="card-body">
  <h5>'. $lang["noInstallScript_tt_fr"] .'</h5>
  <p>'. $lang["noInstallScript_txt_fr"] .'</p>

  <a class="btn btn-dark" href="../setup/index.php?language=fr" class="card-link">'.$lang["startInstallation_fr"].'</a>
  <hr>
  <h5>'.$lang["noInstallScript_tt_en"].'</h5>
  <p>'.$lang["noInstallScript_txt_en"].'</p>
  <a class="btn btn-dark" href="../setup/index.php?language=en" class="card-link">'.$lang["startInstallation_en"].'</a>
  
  </div>
</div></div></body>';
}

}

/*
    public static function get_facebook_og() {
        echo '
        <!-- Facebook Open Graph SEO -->
        <meta property="og:locale" content="fr-CA" />
        <meta property="og:type" content="'.FB_OG_TYPE.'" />
        <meta property="og:title" content="'. SITE_URL . SPACER . SITE_SLOG . '" />
        <meta property="og:description" content="'.SITE_DESCRIPTION.'" />
        <meta property="og:url" content="'.\SITE_URL.'" />
        <meta property="og:site_name" content="'.SITE_NAME.'" />
        <meta property="fb:app_id" content="'.FB_APPID.'" />
        <meta property="og:image" content="public/social/fb-link-default.jpg" />
        <meta property="fb:profile_id" content="'.FACEBOOK_ID.'">
        <meta property="og:image:secure_url" content="public/social/fb-link-default.jpg" />';
}

    public static function get_twitter_og() {
        echo '
        <!-- Twitter SEO -->
        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="'.SITE_NAME . SPACER . SITE_SLOG.'" />
        <meta name="twitter:description" content="'.SITE_DESCRIPTION.'">
        <meta property="twitter:image" content="public/social/fb-link-default.jpg">
        <meta name="twitter:site" content="'. SITE_URL.'">';
}

 
} */