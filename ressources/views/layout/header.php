<?php

use RewindRadio\Database;
use RewindRadio\Posts;
use RewindRadio\User;

include(RESSOURCES_PATH.'lang/lang-' . LANG . '.php'); 
include(CONFIG_PATH.'functions.php');
include(CONFIG_PATH.'config.php');
?>
<!DOCTYPE html>
<html lang="<?= LANG ?>">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php StaticContent::get_header();
  include('../app/routes/router.php');  ?>
  <title><?= SITE_NAME; ?> <?= $router->generate('home');?> </title>
</head>
<body>
<header>
<nav class="py-2">
    <div class="container d-flex flex-wrap">
      <ul class="nav me-auto">
        <li class="nav-item"><span class="nav-link px-2" aria-current="page">Télécharger l’appli rewindRadio : </span></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 active" aria-current="page"><i class="bi bi-windows"></i></a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 active" aria-current="page"><i class="bi bi-google-play"></i></a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 active" aria-current="page"><i class="bi bi-apple"></i></a></li>
      </ul>
      <ul class="nav">
        <li class="nav-item"><a href="#" class="nav-link px-2"><i class='bi bi-facebook'></i></a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2"><i class='bi bi-twitter'></i></a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2"><i class='bi bi-instagram'></i></a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2"><i class='bi bi-youtube'></i></a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-light btn btn-dark mx-3"><?= $lang['listenPopup'] ?> 
          <i class=" m-0 bi bi-box-arrow-up-right"></i></a></li>
<!--
          <li>
            <select id="theme-select" class="form-select ms-3">
            <option selected>Activez le mode sombre</option>
            <option value="light">Clair</option>
            <option value="dark">Sombre</option>
            <option value="auto">Auto</option>
          </select>
          </li>
-->
      </ul>
    </div>
  </nav>
<div class="bg-light">
    <nav class="navbar navbar-expand-lg mx-5">
      <div class="container-fluid">
        <?php RewindRadio\Layout::getBrandLogo(); ?>
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
<?= User::getAvatar(); ?>

        </div>
      </div>
    </nav>
    </div>
  </header>

<div class="collapse px-5 pt-5 pb-5 border-top border-bottom border-3 bg-light" id="collapseExample">
  <div class="menu-content">
  <div class="hstack gap-3">
<?= Posts::DisplayMegaNews(3);?>
</div>
  </div>
</div>
