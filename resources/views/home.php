<?php

use App\Classes\Posts as Posts;
use App\Classes\Songs as Songs;

?>

<main class="pb-4 mt-4">
  <div class="container widget">
    <div class="row">
      <div class="col-lg gx-5">
        <div class="row mt-2">
          <h3 class="p-3"><?= $lang['news']; ?></h3>
        </div>
        <?= Posts::displayNews(4) ?>
        <div class="row mt-2">
          <h3 class="p-3"><?= $lang['lastplay']; ?></h3>
        </div>
        <?= Songs::displayLastPlayedSong() ?>
        <div class="row mt-2">
          <h3 class="p-3"><?= $lang['countdown']; ?></h3>
        </div>
        <?= Songs::displayCountdown(4) ?>
      </div>
      <div class="col-lg-6">
        <div class="row mt-2">
          <h3 class="p-3"><?= $lang['requests']; ?></h3>
        </div>
        <?= Songs::displayTopRequests() ?>
        <div class="row mt-2">
          <h3 class="p-3"><?= $lang['shows']; ?></h3>
        </div>
        <?= Songs::displayShows(10) ?>
        <div class="row mt-2">
          <h3 class="p-3"><?= $lang['events']; ?></h3>
        </div>
        <?= Songs::displayEvents(50); ?>
      </div>
    </div>
  </div>
</main>