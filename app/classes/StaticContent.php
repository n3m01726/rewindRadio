<?php

namespace App\Classes;

class StaticContent
{
  public static function getHeader()
  {
    StaticContent::getMeta();
    StaticContent::getIcons();
    StaticContent::getStylesheet();
  }

  public static function getMeta()
  {
    echo '
        <!-- Metas SEO -->
        <meta name="description" content="' . SITE_DESCRIPTION . '">
        <meta name="author" content="' . SITE_NAME . '">
        <meta name="apple-mobile-web-app-title" content="' . SITE_NAME . '">
        <meta name="application-name" content="' . SITE_NAME . '">
        <meta name="robots" content="index, follow">
        <meta name="description" content="' . SITE_DESCRIPTION . '">';
  }

  public static function getIcons()
  {
    echo '
        <!-- icons -->
        <link rel="apple-touch-icon"         href="/lib/icons/icon_iphone.png" sizes="180x180">
        <link rel="icon" type="image/png"    href="/lib/icons/icon_48.png" sizes="48x48">
        <link rel="icon" type="image/png"    href="/lib/icons/icon_32.png" sizes="32x32">
        <link rel="icon" type="image/png"    href="/lib/icons/icon_16.png" sizes="16x16">
        <link rel="shortcut icon"            href="/lib/icons/favicon.ico" />
        <link rel="icon" type="image/x-icon" href="/lib/icons/favicon.ico" />
        <link rel="icon" type="image/png"    href="/lib/icons/icon_16.png" />';
  }
  public static function getStyleSheet()
  {
    echo '
      <!-- CSS Styles Sheets -->
      <link href="/lib/css/bootstrap/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="/lib/fonts/bootstrap-icons.css">
      <link rel="stylesheet" href="/lib/css/plyr/plyr.css" />
      <link href="/lib/css/style.css" rel="stylesheet"/> 
      ';
  }
  public static function getScriptFiles()
  {
    echo '
      <script src="' . LIBRARY_PATH . '/css-js/bootstrap/popper.min.js"></script>
      <script src="/lib/css/bootstrap/bootstrap.min.js"></script>
      <script src="/lib/css/plyr/plyr.js"></script>
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

  public static function noScriptInstalled()
  {
    $lang = [];
    include('setup/lang-setup.php');
    echo '
  <body class="bg-dark">
  <div class="text-center mt-5">
  <img src="images/logo.png" width="150px" height="150px" alt="your awesome logo">
  </div>
  <div class="card mx-auto mt-3 text-dark" style="width: 30rem;">
  <div class="card-header"><h4>' . $lang["setupTitle"] . '</h4></div>
  <div class="card-body">
  <h5>' . $lang["noInstallScript_tt_fr"] . '</h5>
  <p>' . $lang["noInstallScript_txt_fr"] . '</p>

  <a class="btn btn-dark" href="/setup/index.php?language=fr" class="card-link">' . $lang["startInstallation_fr"] . '</a>
  <hr>
  <h5>' . $lang["noInstallScript_tt_en"] . '</h5>
  <p>' . $lang["noInstallScript_txt_en"] . '</p>
  <a class="btn btn-dark" href="/setup/index.php?language=en" class="card-link">' . $lang["startInstallation_en"] . '</a>
  
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

} 
*/
