<?php

namespace RewindRadio;

use RewindRadio\Database;
use \PDOException;

class Posts {
    public static function displayNews($limitNews) {
        include(RESSOURCES_PATH . 'lang/lang-' . LANG . '.php');
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
?>

                <!-- Display the articles -->
                <div class="row border-bottom border-3 bg-light p-2">
                    <div class="col-2 mx-3">
                    <a href="posts.php?id=<?=$row['id'];?>">
                        <img src="uploads/posts/<?= $row['featured_image']; ?>" alt="<?= $row['title']; ?>" class="rounded-4 img-cover" width="105" height="105"></a></div>
                    <div class="col-9">
                        
                            <a href="posts.php?id=<?=$row['id'];?>" class="title text-uppercase fw-bold">
                                <?= $row['clean_date']; ?> -
                                <?= Text::cutText($row['title'], 80) ?></a>
                        
                        <div class='artist'><?= Text::cutText(shortcodes::remove_shortcodes($row['content']), 100); ?></div>
                        <div class="meta">
                            <?= $lang['posted_by']; ?><a href="profile.php?id=<?=$row['posted_by'];?>">
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
    public static function displayMegaNews($limitNews)
    {

        include(RESSOURCES_PATH . 'lang/lang-' . LANG . '.php');
        $db = new Database();
        $db_conx_rdj = $db->connect();

        $query = "SELECT " . PREFIX . "_posts.id, " . PREFIX . "_posts.featured_image," . PREFIX . "_posts.posted_by, " . PREFIX . "_posts.date_posted, " . PREFIX . "_posts.title, " . PREFIX . "_posts.content, " . PREFIX . "_users.username, " . PREFIX . "_users.nice_nickname," . PREFIX . "_categories.name as category_name, " . PREFIX . "_tags.name as tag_name,
DATE_FORMAT(DATE(date_posted), '%d/%m/%Y') AS clean_date FROM " . PREFIX . "_posts
LEFT JOIN " . PREFIX . "_users ON " . PREFIX . "_posts.posted_by = " . PREFIX . "_users.id 
LEFT JOIN " . PREFIX . "_categories ON " . PREFIX . "_posts.category_id = " . PREFIX . "_categories.id 
LEFT JOIN " . PREFIX . "_tags ON " . PREFIX . "_posts.tag_id = " . PREFIX . "_tags.id WHERE post_type = 1 AND is_featured = 0 ORDER BY " . PREFIX . "_posts.date_posted DESC LIMIT $limitNews";
        $result = $db_conx_rdj->query($query);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) { ?>

                <!-- Display the articles -->
                <div class="card" style="width: 25rem;">
                    <img src="uploads/posts/<?= $row['featured_image']; ?>" class="card-img-top" alt="<?= $row['title']; ?>" height="200">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['clean_date']; ?> - <a href="#"><?= Text::cutText($row['title'], 80) ?></a></span></h5>
                        <p class="card-text"><?= Text::cutText(shortcodes::remove_shortcodes($row['content']), 80); ?></p>
                    </div>
                    <div class="card-footer">
                        <?= $lang['posted_by']; ?><a href="#">
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
    public static function createBlogCarousel()
    {

        // database connection 
        $connect = new Database();
        $conn = $connect->connect();
        try {
            // query to select the latest 3 blog posts
            $query = "SELECT zp.*, zc.name as 'category', zt.name as 'tag' FROM " . PREFIX . "_posts zp
LEFT JOIN " . PREFIX . "_categories zc ON zc.id = zp.category_id
LEFT JOIN " . PREFIX . "_tags zt ON zt.id = zp.tag_id WHERE is_featured = 1
ORDER BY zp.date_posted DESC LIMIT 3";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
            // check if there's any post
            if ((is_countable($result) ? count($result) : 0) > 0) {
                // create the carousel structure
                echo '<div id="blogCarousel" class="carousel slide" data-bs-ride="carousel">';
                echo '<div class="carousel-indicators">';
                for ($i = 0; $i < (is_countable($result) ? count($result) : 0); $i++) {
                    echo '<button data-bs-target="#blogCarousel" data-bs-slide-to="' . $i . '" class="' . ($i == 0 ? 'active' : '') . '" aria-current="' . ($i == 0 ? 'true' : '') . '" aria-label="Slide ' . $i . '"></button>';
                }
                echo '</div>';
                echo '<div class="carousel-inner">';
                $i = 0;
                foreach ($result as $row) {
                    echo '<div class="carousel-item ' . ($i == 0 ? 'active' : '') . '">';
                    echo '<img src="uploads/' . $row['featured_image'] . '" alt="" class="d-block w-100" height="400px" alt="...">';
                    echo '<div class="carousel-caption d-none d-md-block" style="color:#000; background-color:#eaeaea;">';
                    echo '<a href="posts.php?id=' . $row['id'] . '"><h2 class="widgetTitle">' . $row['title'] . '</h2></a>';
                    echo '<p>' . Text::cutText($row['content'], 140) . '</p>';
                    echo '</div>';
                    echo '</div>';
                    $i++;
                }
                echo '</div>';
                echo '<a class="carousel-control-prev" href="#blogCarousel" role="button" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                      </a>';
                echo '<a class="carousel-control-next" href="#blogCarousel" role="button" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                      </a>';
                echo '</div>';
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public static function listNews()
    {

        include('../ressources/lang/lang-fr.php');
        $db = new Database;
        $db_conx_rdj = $db->connect();
        $query = "SELECT " . PREFIX . "_posts.id, " . PREFIX . "_posts.featured_image," . PREFIX . "_posts.posted_by, " . PREFIX . "_posts.date_posted, " . PREFIX . "_posts.title, " . PREFIX . "_posts.content, " . PREFIX . "_users.username, " . PREFIX . "_users.nice_nickname," . PREFIX . "_categories.name as category_name, " . PREFIX . "_tags.name as tag_name,
DATE_FORMAT(DATE(date_posted), '%d/%m/%Y') AS clean_date
FROM " . PREFIX . "_posts
LEFT JOIN " . PREFIX . "_users ON " . PREFIX . "_posts.posted_by = " . PREFIX . "_users.id 
LEFT JOIN " . PREFIX . "_categories ON " . PREFIX . "_posts.category_id = " . PREFIX . "_categories.id 
LEFT JOIN " . PREFIX . "_tags ON " . PREFIX . "_posts.tag_id = " . PREFIX . "_tags.id
ORDER BY " . PREFIX . "_posts.date_posted DESC";
        $result = $db_conx_rdj->query($query);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) { ?>

                <!-- Display the articles -->
                <tr>
                    <td>
                        <a href="/public/posts.php?id=<?= $row['id']; ?>"><?= $row['title']; ?></a>
                    </td>
                    <td>
                        <?= $lang['posted_by']; ?><a href="../../../public/profile.php?id=<?= $row['posted_by']; ?>">
                            <?php if (isset($row['nice_nickname'])) {
                                echo $row['nice_nickname'];
                            } else {
                                echo $row['username'];
                            } ?></a>
                    </td>
                    <td><?= $row['clean_date']; ?> </td>
                    <td><?= $row['category_name']; ?> </td>
                    <td><?= $row['tag_name']; ?> </td>
                    <td>46</td>
                    <td><span class="mx-3"><i class="bi bi-pencil-square mx-1"></i> <a href="post-edit.php?id=<?= $row['id']; ?>">Edit</a></span>
                        <span class="mx-3"><i class="bi bi-trash3 mx-1"></i>
                            <a href="post-delete.php?id=<?= $row['id']; ?>">Delete</a></span>
                    </td>
                </tr>
<?php
            }
        }
    }
}
