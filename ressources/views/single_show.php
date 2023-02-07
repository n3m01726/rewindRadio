<?php
use RewindRadio\Text;
use RewindRadio\Date;
?>
<section>
  <?php
  $id = $_GET['id'];
  $db = new RewindRadio\Database();
  $db_conx_rdj = $db->connect();
  $reponse = $db_conx_rdj->query("SELECT " . PREFIX . "_subcategory_info.*, subcategory.* 
FROM " . PREFIX . "_subcategory_info 
LEFT JOIN subcategory ON subcategory.ID = " . PREFIX . "_subcategory_info.subcategory_id 
WHERE subcategory_id = " . $id . " LIMIT 1");
  while ($donnees = $reponse->fetch()) {
  ?>
    <div class="px-4 py-5 mb-4 text-center" style="background-image: url('../uploads/shows/<?= $donnees['image']; ?>'); background-size:cover; background-repeat:no-repeat;">
      <h1 class="display-5 fw-bold text-white"><?php echo $donnees['name']; ?></h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4 p-2" style="background-color: #fff;"><?php echo $donnees['description']; ?></p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
          <button type="button" class="btn btn-primary btn-lg px-4 gap-3"><?php echo $lang['Support_this_show']; ?></button>
          <button type="button" class="btn btn-outline-secondary btn-lg px-4">Rejoindre le serveur Discord</button>
        </div>
      </div>
    </div>
  <?php }
  $reponse->closeCursor(); ?>
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h3 class="widgetTitle"><?= $lang['last_episodes']; ?></h3>
<?php
$reponse = $db_conx_rdj->query("SELECT songs.title, songs.artist, songs.associated_artists, songs.path, " . PREFIX . "_subcategory_info.image
FROM songs
LEFT JOIN " . PREFIX . "_subcategory_info ON " . PREFIX . "_subcategory_info.subcategory_id = songs.id_subcat
WHERE id_subcat = " . $id . " ORDER BY title DESC LIMIT 20;");
        if ($reponse->rowCount() > 0) {
          while ($donnees = $reponse->fetch()) {
            $accents = ["&", "è"];
            $lettre = ["&amp", "e"];
            $showArtist = str_replace($accents, $lettre, (string) $donnees['artist']);
            $showTrack = str_replace($accents, $lettre, (string) $donnees['title']);

            // N'oubliez pas d'uploader vos fichiers mp3 sur votre serveur web!  
            $path = $donnees['path'];
            $getStreamURL = str_replace(LOCAL_PODCASTS_FOLDER, REMOTE_PODCASTS_FOLDER, (string) $path);
        ?>
            <div class="card mb-3" style="max-width: 100%">
              <div class="row g-0">
                <div class="col-md-3">
                  <img src="../uploads/shows/<?php echo $donnees['image']; ?>" class="img-fluid rounded-start" alt="..." width="200" height="200">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title"><?php Text::cutText($showTrack, 30); ?></h5>
                    <p class="card-text">
                      <?php if (!empty($donnees['associated_artists'])) {
                        echo "Invité.e.s: " . $donnees['associated_artists'] . "";
                      } else {
                        echo "Pas d'invité.e.s pour cette épisode";
                      } ?></p>
                    <audio class="js-player">
                      <source src="<?= $getStreamURL; ?>" />
                    </audio>
                  </div>
                </div>
              </div>
            </div>
        <?php
          }
          $reponse->closeCursor(); // Termine le traitement de la requête
        } else {
          echo "Pas d'épisodes pour cette émission.";
        }
        ?>
      </div>
      <div class="col-lg-4">
        <h4 class="widgetTitle"><?= $lang['show_infos']; ?></h4>
        <?php
        $reponse = $db_conx_rdj->query("SELECT " . PREFIX . "_subcategory_info.*, subcategory.* 
FROM " . PREFIX . "_subcategory_info 
LEFT JOIN subcategory ON subcategory.ID = " . PREFIX . "_subcategory_info.subcategory_id 
WHERE subcategory_id = " . $id . " LIMIT 1");
        while ($donnees = $reponse->fetch()) { ?>
          <?php
          // Get the day from the database
          $day = $donnees['scheduleDay'];
          $timestamp = strtotime("next $day");
          $timestamp = strtotime('+1 week', $timestamp);
          $next_day = date('Y-m-d', $timestamp);
          if (!empty($donnees['scheduleDay'])) {
            echo $lang['next_episode'] . " : " . $next_day . "<br>" . $lang['Hosted_by'] . " : " .
              $donnees['curator'] . "<br>" . $lang['all'] . " " . Date::convertDate($donnees['scheduleDay'], 'l', 'french', false, false) . "s, " . $donnees['scheduleTime'] .
              " " . $lang["timezone"];
          } else {
            echo $lang["No_longer_online"];
          } ?>
          <hr>
        <?php }
        $reponse->closeCursor(); ?>
         <div class="widget p-3">
          <?php if (!empty(ADS_CODE) && ADMIN_MODE) { ?>
            <div class='bd-callout bd-callout-info' style='background-color:#fff;'>
              Vous avez un Google Ads ou un compte publicitaire? Ajoutez-le ici! Allez dans la section ads block du fichier init.php pour ajouter votre code HTML
            <?php } else {
            echo ADS_CODE;
          } ?>
            </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
</section>
