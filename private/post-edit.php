<?php

use RewindRadio\DBConnect;

include('layout/header.php'); 

$id = $_GET['id'];
$db = new DBConnect;
$db_conx_rdj = $db->connect();

$query = "SELECT ". PREFIX. "_posts.id, ". PREFIX ."_posts.featured_image,". PREFIX ."_posts.posted_by, ". PREFIX ."_posts.date_posted, ". PREFIX ."_posts.title, ". PREFIX ."_posts.content, ". PREFIX ."_users.username, ". PREFIX ."_users.nice_nickname,". PREFIX ."_categories.name as category_name, ". PREFIX ."_tags.name as tag_name,
DATE_FORMAT(DATE(date_posted), '%d/%m/%Y') AS clean_date
FROM ". PREFIX ."_posts
LEFT JOIN ".PREFIX."_users ON ".PREFIX."_posts.posted_by = ".PREFIX."_users.id 
LEFT JOIN ".PREFIX."_categories ON ".PREFIX."_posts.category_id = ".PREFIX."_categories.id 
LEFT JOIN ".PREFIX."_tags ON ".PREFIX."_posts.tag_id = ".PREFIX."_tags.id WHERE ". PREFIX. "_posts.id=$id
LIMIT 1"; 
$result = $db_conx_rdj->query($query);
if ($result->rowCount() > 0) {
while ($row = $result->fetch()) { ?>

  <!-- Plugins CSS Styles Sheets -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <section>
  
<div class="container justify-content-center align-items-center h-100">
   <div class="row">
<div class="col-lg-8 admin-post-content">
<h1>Éditer un article</h1>
<hr>
<form action="src/post-send-edit.php?id=<?= $row['id']; ?>" method="post" enctype="multipart/form-data">
<div class="mb-3">
<label for="title">Titre :</label><br>
  <input type="text" name="title" id="title" class="form-control" value="<?= $row['title']; ?>">
</div>

<div class="mb-3">
Sélectionnez un fichier à télécharger:
<input type="file" name="fileToUpload"  class="form-control" id="fileToUpload">
</div>
<div class="p-3 mt-3 mb-3" style="background-color: #eaeaea;">
<label for="is_featured">Mettre ce contenu en avant :</label><br>

</div>
<div class="mb-3">
<label for="content" style="margin-top: 20px;">Contenu de l'article:</label><br>
<textarea name="content" id="content" class="form-control" cols='10' rows="15"><?= $row['content']; ?></textarea>
<div class="form-text">Pour voir la liste des shortcodes, <a href="#" data-bs-toggle="modal" data-bs-target="#shortCodeModal">c'est ici </a></div>
</div>


<button class="btn btn-dark" type="submit" value="Envoyer" name="submit">Envoyer</button>
</form>
</div>
</div>
</div>
</section>
<?php } 
} ?>
<!-- // about -->
<?php include('layout/footer.php'); ?>