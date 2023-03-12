<?php

use App\Classes\Songs;
?>
<section>
  <div class="posts-img" style="background-image: url('uploads/posts/pexels-pixabay-164425.jpg'); padding-top:15%;">
    <h3 class="text-center post-title"><b>Horaire <?= SITE_NAME; ?></b></h3>
  </div>
  <div>
    <div class="container content">
      <div class="row">
        <div class="col-10 mx-auto" style="padding:20px;">
          <div class="post-content" style="padding: 20px; min-height:500px;">
            <div class="container">

              <div class="row">
                <div class="idance">
                  <div class="schedule content-block">
                    <div class="container">
                      <div class="timetable">
                        <nav>
                          <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link" id="nav-<?php echo $lang['monday']; ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?php echo $lang['monday']; ?>" type="button" role="tab" aria-controls="nav-<?php echo $lang['monday']; ?>" aria-selected="true"><?php echo $lang['monday']; ?></a>
                            <a class="nav-link" id="nav-<?php echo $lang['tuesday']; ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?php echo $lang['tuesday']; ?>" type="button" role="tab" aria-controls="nav-<?php echo $lang['tuesday']; ?>" aria-selected="true"><?php echo $lang['tuesday']; ?></a>
                            <a class="nav-link" id="nav-<?php echo $lang['wednesday']; ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?php echo $lang['wednesday']; ?>" type="button" role="tab" aria-controls="nav-<?php echo $lang['wednesday']; ?>" aria-selected="true"><?php echo $lang['wednesday']; ?></a>
                            <a class="nav-link" id="nav-<?php echo $lang['thursday']; ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?php echo $lang['thursday']; ?>" type="button" role="tab" aria-controls="nav-<?php echo $lang['thursday']; ?>" aria-selected="true"><?php echo $lang['thursday']; ?></a>
                            <a class="nav-link" id="nav-<?php echo $lang['friday']; ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?php echo $lang['friday']; ?>" type="button" role="tab" aria-controls="nav-<?php echo $lang['friday']; ?>-" aria-selected="true"><?php echo $lang['friday']; ?></a>
                            <a class="nav-link" id="nav-<?php echo $lang['saturday']; ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?php echo $lang['saturday']; ?>" type="button" role="tab" aria-controls="nav-<?php echo $lang['saturday']; ?>-" aria-selected="true"><?php echo $lang['saturday']; ?></a>
                            <a class="nav-link" id="nav-<?php echo $lang['sunday']; ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?php echo $lang['sunday']; ?>" type="button" role="tab" aria-controls="nav-<?php echo $lang['sunday']; ?>-" aria-selected="true"><?php echo $lang['sunday']; ?></a>
                          </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                          <div class="tab-pane fade" id="nav-<?php echo $lang['monday']; ?>" role="tabpanel" aria-labelledby="nav-<?php echo $lang['monday']; ?>-tab" tabindex="0">
                            <?= Songs::getSchedule('&1', 1); ?>
                          </div>
                          <div class="tab-pane fade" id="nav-<?php echo $lang['tuesday']; ?>" role="tabpanel" aria-labelledby="nav-<?php echo $lang['tuesday']; ?>-tab" tabindex="0">
                            <?= Songs::getSchedule('&2', 1); ?>
                          </div>
                          <div class="tab-pane fade" id="nav-<?php echo $lang['wednesday']; ?>" role="tabpanel" aria-labelledby="nav-<?php echo $lang['wednesday']; ?>-tab" tabindex="0">
                            <?= Songs::getSchedule('&3', 1); ?>
                          </div>
                          <div class="tab-pane fade" id="nav-<?php echo $lang['thursday']; ?>" role="tabpanel" aria-labelledby="nav-<?php echo $lang['thursday']; ?>-tab" tabindex="0">
                            <?= Songs::getSchedule('&4', 1); ?>
                          </div>
                          <div class="tab-pane fade" id="nav-<?php echo $lang['friday']; ?>" role="tabpanel" aria-labelledby="nav-<?php echo $lang['friday']; ?>-tab" tabindex="0">
                            <?= Songs::getSchedule('&5', 1); ?>
                          </div>
                          <div class="tab-pane fade" id="nav-<?php echo $lang['saturday']; ?>" role="tabpanel" aria-labelledby="nav-<?php echo $lang['saturday']; ?>-tab" tabindex="0">
                            <?= Songs::getSchedule('&6', 1); ?>
                          </div>
                          <div class="tab-pane fade" id="nav-<?php echo $lang['sunday']; ?>" role="tabpanel" aria-labelledby="nav-<?php echo $lang['sunday']; ?>-tab" tabindex="0">
                            <?= Songs::getSchedule('&0', 1); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>