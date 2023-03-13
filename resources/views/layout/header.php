<?php

use App\Classes\Layout;
use App\Classes\Posts;
use App\Classes\StaticContent;

require '../vendor/autoload.php';
include('../config/constants.php');
include(CONFIG_PATH . 'config.php');
include('../lang/lang-' . LANG . '.php');

?>
<!DOCTYPE html>
<html lang="<?= LANG ?>">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?= StaticContent::getHeader(); ?>
  <title><?= SITE_NAME; ?> </title>
</head>

<body>
  <header>
    <?php if (isset($_SESSION['user_id'])) { ?>
      <div class="profile_header" style="background-color:#212121; height:50px;">
        <ul style="display:flex; color:aliceblue; list-style-type: none; padding-top:10px;">
          <li style="margin-inline: 10px;"><a href="<?= $router->generate('post-add'); ?>">Ajouter un article</a></li>
          <li style="margin-inline: 10px;"><a href="<?= $router->generate('user-add'); ?>">Ajouter un utilisateur</a></li>
          <li style="margin-inline: 10px;"><a href="<?= $router->generate('settings'); ?>">Paramètres</a></li>
          <li style="margin-inline: 10px;"><a href="<?= $router->generate('post-add'); ?>">Voir mon profil</a></li>
        </ul>
      </div>
    <?php } ?>
    <div class="bg-light">
      <nav class="navbar navbar-expand-lg mx-5">
        <div class="container-fluid">
          <?php Layout::getBrandLogo(); ?>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item" style="margin-left: 40px;"><a class="nav-link" aria-label="menuitem" href="<?= $router->generate('home'); ?>"><?= $lang['home']; ?></a></li>
              <li class="nav-item"><a class="nav-link" href="<?= $router->generate('charts'); ?>"><?= $lang['charts']; ?></a></li>
              <li class="nav-item"><a class="nav-link" href="<?= $router->generate('schedule'); ?>"><?= $lang['schedule']; ?></a></li>
              <li class="nav-item"><a class="nav-link" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" href="#"><?= $lang['magazine']; ?></a></li>
            </ul>
            <ul>
              <a href="#" class="nav-link text-light mt-2 btn btn-dark p-2"><?= $lang['listenPopup'] ?>
                <i class=" m-0 bi bi-box-arrow-up-right"></i></a>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <div class="collapse px-5 pt-5 pb-5 border-top border-bottom border-3 bg-light" id="collapseExample">
    <div class="menu-content">
      <div class="hstack gap-3">
        <?= Posts::DisplayMegaNews(3); ?>
      </div>
    </div>
  </div>