<?php
use App\shortcodes;
use App\Text;
?>
<div class='row border-bottom border-3 bg-light p-2'>
          <div class='col-lg-2'>
            <a href='post.php?id=" . $row['id']."'>
              <img src='uploads/posts/<?= $article->featured_image ?>' alt='<?= $article->title ?>' class='img-thumbnail'></a>
          </div>
          
          <div class='col-lg'>
          <a href='post.php?id=<?= $article->posted_by; ?> class='title text-uppercase fw-bold'>
          <?= $article->title ?></a> <div class='post__content'><?= Text::cutText(shortcodes::removeShortcodes($article->content), 140); ?></div>
            <div class='post__meta'> <?= $lang['posted_by'] ?> <a href='profile.php?id=<?= $row['posted_by'] ?>'><?= ($article->nice_nickname ?? $article->username);?></a>
            </div>
          </div>
        </div>
