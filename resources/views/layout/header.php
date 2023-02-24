<?php
require_once('../config/config.php');
require_once('../config/constants.php');
require_once('../config/functions.php');

use App\Layout;
use App\StaticContent;
use App\User;
use App\Posts;
 ?>
<!DOCTYPE html>
<html lang="<?= LANG ?>">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <?= StaticContent::getHeader(); ?>
  <title>Ça c'est un super titre de site web / Change moi ÇAAAAAAA!</title>
</head>
<body>
<header>
<nav class="py-2">
    <div class="d-flex flex-wrap">
      <ul class="nav me-auto mx-5 my-auto">
   
        <li class="nav-item"><div class="badge text-bg-info p-2">
          Info importante sur le site web, ou autre chose d'intéressant</div></li>

      </ul>
      <ul class="nav me-5">
      <?php


$socialLinks = [
    ['twitter', TWITTER],
    ['instagram', INSTAGRAM],
    ['discord', DISCORD_INVITE],
    ['github', GITHUB],
    ['trello', TRELLO]
];

foreach ($socialLinks as $link) {
 echo Layout::socialIcons($link[0], $link[1]);
}
?>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-light btn btn-dark mx-3"><?= $lang['listenPopup'];?>
        <i class=" m-0 bi bi-box-arrow-up-right"></i></a></li>
</ul>
    </div>
  </nav>
<div class="bg-light">
    <nav class="navbar navbar-expand-lg mx-5">
      <div class="container-fluid">
       
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <?= Layout::getBrandLogo();?>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
  <li class="nav-item" style="margin-left: 40px;"><a class="nav-link" aria-label="menuitem" href="/"><?= $lang['home']; ?></a></li>
  <li class="nav-item"><a class="nav-link" href="charts.php"><?= $lang['charts']; ?></a></li>
  <li class="nav-item"><a class="nav-link" href="schedule.php"><?= $lang['schedule']; ?></a></li>
  <li class="nav-item"><a class="nav-link" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" href="#"><?= $lang['magazine']; ?></a></li>
</ul>
<?= User::getAvatar();?> 
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
