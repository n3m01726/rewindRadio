<?php

use App\Posts as AppPosts;
use App\radioDJFunctions as AppRadioDJFunctions;
use RewindRadio\radioDJFunctions;
  use RewindRadio\Posts; 
?>

<main class="pb-4 mt-4">
  <div class="container widget">
    <div class="row">
      <div class="col-lg-6 gx-5">
        <div class="row mt-2"><h3 class="p-3"><?= $lang['news']; ?></h3></div>
        <?= AppPosts::displayNews(4)?>
        <div class="row mt-2"><h3 class="p-3"><?= $lang['lastplay']; ?></h3></div>
        <?= AppRadioDJFunctions::displayLastPlayedSong()?>
        <div class="row mt-2"><h3 class="p-3"><?= $lang['countdown']; ?></h3></div>
        <?= AppRadioDJFunctions::displayCountdown(4)?>
      </div>
      <div class="col-lg-6">
      <div class="row mt-2"><h3 class="p-3"><?= $lang['requests']; ?></h3></div>
      <?= AppRadioDJFunctions::displayTopRequests() ?>
      <div class="row mt-2"><h3 class="p-3"><?= $lang['shows']; ?></h3></div>
      <?= AppRadioDJFunctions::displayShows(10)?>
      <div class="row mt-2"><h3 class="p-3"><?= $lang['events']; ?></h3></div>
      <?= AppRadioDJFunctions::displayEvents(2)?>
      </div>
    </div>
  </div>
</main>