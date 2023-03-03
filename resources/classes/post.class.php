<?php

namespace App;

use App\Database;
use App\shortcodes;
use App\Text;

class Posts {
  public static function displayNews($limitNews) {
    global $router;
    include('../lang/lang-' . LANG . '.php');
    $db = new Database;
    $db_conx_rdj = $db->connect();
    $query = "SELECT " . PREFIX . "_posts.id, " . PREFIX . "_posts.featured_image," . PREFIX . "_posts.posted_by, " . PREFIX . "_posts.date_posted, " . PREFIX . "_posts.title, " . PREFIX . "_posts.content, " . PREFIX . "_users.username, " . PREFIX . "_users.nice_nickname," . PREFIX . "_categories.name as category_name, " . PREFIX . "_tags.name as tag_name,
    DATE_FORMAT(" . PREFIX . "_posts.date_posted, '%d/%m/%Y') AS clean_date FROM " . PREFIX . "_posts
    LEFT JOIN " . PREFIX . "_users ON " . PREFIX . "_posts.posted_by = " . PREFIX . "_users.id 
    LEFT JOIN " . PREFIX . "_categories ON " . PREFIX . "_posts.category_id = " . PREFIX . "_categories.id 
    LEFT JOIN " . PREFIX . "_tags ON " . PREFIX . "_posts.tag_id = " . PREFIX . "_tags.id WHERE post_type = 1 AND is_featured = 0 ORDER BY " . PREFIX . "_posts.date_posted DESC LIMIT $limitNews
";
    $result = $db_conx_rdj->query($query);
    if ($result->rowCount() > 0) {
      while ($row = $result->fetch()) {
?>
        <!-- Display the articles -->
        <div class="row p-2 article">
          <div class="col-lg-2">
            <a href="post.php?id=<?= $row['id']; ?>">
              <img src="uploads/posts/<?= $row['featured_image']; ?>" alt="<?= $row['title']; ?>" class="img-thumbnail"></a>
          </div>
          <div class="col-lg">
          <a href="post.php?id=<?= $row['id']; ?>" class="title text-uppercase fw-bold">
              <?= $row['clean_date']; ?> -
              <?= Text::cutText($row['title'], 80) ?></a>

            <div class='artist'><?= Text::cutText(shortcodes::removeShortcodes($row['content']), 100); ?></div>
            <div class="meta">
              <?= $lang['posted_by']; ?><a href="profile.php?id=<?= $row['posted_by']; ?>">
                <?php if (isset($row['nice_nickname'])) {
                  echo $row['nice_nickname'];
                } else {
                  echo $row['username'];
                } ?></a>
            </div>
          </div>
        </div>
      <?php }
    } else {
      echo '<div id="widget" style="padding: 20px;">
<div class="bd-callout bd-callout-info">
 <p>Pas d\'articles.</p>
</div>
</div>';
    }
  }
  public static function displayMegaNews($limitNews) {
    include('../lang/lang-' . LANG . '.php');
    global $router;
    $db = new Database();
    $db_conx_rdj = $db->connect();

    $query = "SELECT " . PREFIX . "_posts.id, " . PREFIX . "_posts.featured_image," . PREFIX . "_posts.posted_by, " . PREFIX . "_posts.date_posted, " . PREFIX . "_posts.title, " . PREFIX . "_posts.content, " . PREFIX . "_users.username, " . PREFIX . "_users.nice_nickname," . PREFIX . "_categories.name as category_name, " . PREFIX . "_tags.name as tag_name,
    DATE_FORMAT(DATE(date_posted), '%d/%m/%Y') AS clean_date FROM " . PREFIX . "_posts
    LEFT JOIN " . PREFIX . "_users ON " . PREFIX . "_posts.posted_by = " . PREFIX . "_users.id 
    LEFT JOIN " . PREFIX . "_categories ON " . PREFIX . "_posts.category_id = " . PREFIX . "_categories.id 
    LEFT JOIN " . PREFIX . "_tags ON " . PREFIX . "_posts.tag_id = " . PREFIX . "_tags.id WHERE post_type = 1 AND is_featured = 0 ORDER BY " . PREFIX . "_posts.date_posted DESC LIMIT $limitNews";
    $result = $db_conx_rdj->query($query);
    if ($result->rowCount() > 0) {
      while ($row = $result->fetch()) { 
        $id = $row['id'];
        $posted_by = $row['posted_by'];?>
        <!-- Display the articles -->
        <div class="card" style="width: 25rem;">
        <a href="post.php?id=<?= $row['id']; ?>">
            <img src="uploads/posts/<?= $row['featured_image']; ?>" alt="<?= $row['title']; ?>" class="card-img-top" height="200"></a>
          <div class="card-body">
            <h5 class="card-title"><a href="post.php?id=<?= $row['id']; ?>">
                  <?= Text::cutText($row['title'], 80) ?></a></span></h5>
            <p class="card-text"><?= Text::cutText(shortcodes::removeShortcodes($row['content']), 80); ?></p>
          </div>
          <div class="card-footer">
            <?= $lang['posted_by']; ?><a href="profile.php?id=<?= $row['posted_by']; ?>">
              <?php if (isset($row['nice_nickname'])) {
                echo $row['nice_nickname'];
              } else {
                echo $row['username'];
              } ?></a>
          </div>
        </div>

      <?php }
    } else {
      echo '<div id="widget" style="padding: 20px;">
      <div class="bd-callout bd-callout-info">
      <p>Pas d\'articles.</p>
      </div>
      </div>';
    }
  }
}
