<?php
use RewindRadio\DBConnect;
use RewindRadio\Text;
class Posts {
public static function listNews() {

include('../src/lang/lang-fr.php');
    $db = new DbConnect();
    $db_conx_rdj = $db->connect();
    
    $query = "SELECT ". PREFIX. "_posts.id, ". PREFIX ."_posts.featured_image,". PREFIX ."_posts.posted_by, ". PREFIX ."_posts.date_posted, ". PREFIX ."_posts.title, ". PREFIX ."_posts.content, ". PREFIX ."_users.username, ". PREFIX ."_users.nice_nickname,". PREFIX ."_categories.name as category_name, ". PREFIX ."_tags.name as tag_name,
    DATE_FORMAT(DATE(date_posted), '%d/%m/%Y') AS clean_date
    FROM ". PREFIX ."_posts
    LEFT JOIN ".PREFIX."_users ON ".PREFIX."_posts.posted_by = ".PREFIX."_users.id 
    LEFT JOIN ".PREFIX."_categories ON ".PREFIX."_posts.category_id = ".PREFIX."_categories.id 
    LEFT JOIN ".PREFIX."_tags ON ".PREFIX."_posts.tag_id = ".PREFIX."_tags.id
    ORDER BY ".PREFIX."_posts.date_posted DESC"; 
    $result = $db_conx_rdj->query($query);
    if ($result->rowCount() > 0) {
    while ($row = $result->fetch()) { ?>

<!-- Display the articles --> 
        <tr>
            <td>
                <a href="/public/posts.php?id=<?= $row['id']; ?>"><?= $row['title']; ?></a>
            </td>
            <td>
                <?= $lang['posted_by']; ?><a href="../../../public/profile.php?id=<?= $row['posted_by']; ?>"><?php if(isset( $row['nice_nickname'])) {echo  $row['nice_nickname'];} else {echo $row['username'];} ?></a>
            </td>
            <td><?= $row['clean_date']; ?> </td>
            <td><?= $row['category_name']; ?> </td>
            <td><?= $row['tag_name']; ?> </td>
            <td>46</td>
            <td><span class="mx-3"><i class="bi bi-pencil-square mx-1"></i> <a href="post-edit.php?id=<?= $row['id']; ?>">Edit</a></span>
            <span class="mx-3"><i class="bi bi-trash3 mx-1"></i>
            <a href="post-delete.php?id=<?= $row['id']; ?>">Delete</a></span></td>
        </tr>



<?php

    }
}
} }
