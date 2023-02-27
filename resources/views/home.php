<?php
use App\Posts;
use App\radioDJFunctions;
?>
<main>
 <div class="container">
  <div class="row gx-5">

<!-- left side -->  
<div class="col-lg-6">
    <div class="row mt-2"><h3 class="text-uppercase"><?= $lang['news']; ?></h3></div>
    <div class="row mt-2"><?= Posts::displayNews(4); ?></h3></div>
    <div class="row mt-2"><h3 class="text-uppercase"><?= $lang['lastplay']; ?></h3></div>
    <div class="row mt-2"><?= radioDJFunctions::displayLastPlayedSong(); ?></h3></div>
    <div class="row mt-2"><h3 class="text-uppercase"><?= $lang['countdown']; ?></h3></div>
    <div class="row mt-2"><?= radioDJFunctions::displayMostPlayed(5); ?></h3></div>
  </div>
  
<!-- Right side -->
  <div class="col-lg-6">
    <div class="row mt-2"><h3 class="text-uppercase"><?= $lang['requests']; ?></h3></div>
    <div class="row mt-2"><?= radioDJFunctions::displayRequests(); ?></div>
    <div class="row mt-2"><h3 class="text-uppercase"><?= $lang['events']; ?></h3></div>
    <div class="row mt-2"><?= radioDJFunctions::displayEvents(2); ?></div>
    <div class="row mt-2"><h3 class="text-uppercase"><?= $lang['shows']; ?></h3></div>
    <div class="row mt-2"><?= radioDJFunctions::displayLiveShows(10); ?></div>
  </div>
  </div>
 </div> 
</main>