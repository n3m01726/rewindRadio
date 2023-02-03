<?php
namespace RewindRadio;
class Team {
public static function displayTeam() {
    $db = new Database();
    $db_conx_rdj = $db->connect();
    
    $query = "SELECT * FROM ".PREFIX."_users";
    $result = $db_conx_rdj->query($query);
    while ($row = $result->fetch()) { ?>
 
     <!-- Team item-->
      <div class="col-xl-3 col-sm-6 mb-5">
        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="uploads/profile/<?= $row['avatar']; ?>" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
          <h5 class="mb-0"><?= $row['nice_nickname']; ?></h5><span class="small text-uppercase text-muted"><?= $row['job_title']; ?></span>
          <ul class="social mb-0 list-inline mt-3">
            <li class="list-inline-item"><a href="https://www.facebook.com/<?= $row['sm_facebook']; ?>" class="social-link"><i class="bi bi-facebook"></i></i></a></li>
            <li class="list-inline-item"><a href="https://www.twitter.com/<?= $row['sm_twitter']; ?>" class="social-link"><i class="bi bi-twitter"></i></a></li>
            <li class="list-inline-item"><a href="https://instagram.com/<?= $row['sm_instagram']; ?>" class="social-link"><i class="bi bi-instagram"></i></a></li>
            <li class="list-inline-item"><a href="https://linkedin.com/<?= $row['sm_instagram']; ?>" class="social-link"><i class="bi bi-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
      <!-- End-->

<?php
        }
    } }