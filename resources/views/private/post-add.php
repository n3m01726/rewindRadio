<?php
if (isset($_SESSION['user_id'])) {
  // Afficher le contenu de la page 
?>
<!-- Plugins CSS Styles Sheets -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link href="../public/css/style.css" rel="stylesheet"/> 
  <section>
  
<div class="container justify-content-center align-items-center h-100">
   <div class="row">
<div class="col-lg-8 admin-post-content">
<h1>Ajouter un article</h1>
<hr>
<form action="/post-send" method="post" enctype="multipart/form-data">
<div class="mb-3">
<label for="title">Titre :</label><br>
  <input type="text" name="title" id="title" class="form-control">
</div>

<div class="mb-3">
Sélectionnez une image à télécharger pour la couverture de votre billet:
<input type="file" name="fileToUpload"  class="form-control" id="fileToUpload">
</div>
<div class="p-3 mt-3 mb-3" style="background-color: #eaeaea;">
<label for="is_featured">Mettre ce contenu en avant :</label><br>
  <select name="is_featured" id="is_featured" class="form-control">
    <option value="1">Mettre ce contenu en avant</option>
    <option value="0">Ne pas mettre ce contenu en avant</option>
  </select>
</div>
<div class="mb-3">

<label for="content" style="margin-top: 20px;">Contenu de l'article:</label><br>
<!-- Button trigger modal -->
<button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#imageModal">
<i class="bi bi-card-image me-3"></i><small>ajouter une image</small>
</button>
<!-- Button trigger modal -->
<button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#galleryModal">
<i class="bi bi-images me-3"></i><small>ajouter une gallerie d'images</small>
</button>

<button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#uploadModal">
<i class="bi bi-images me-3"></i><small>Téléverser des images</small>
</button>

<textarea name="content" id="content" class="form-control" cols='10' rows="15" ></textarea>
<div class="form-text">Pour voir la liste des shortcodes, <a href="#" data-bs-toggle="modal" data-bs-target="#shortCodeModal">c'est ici </a> </div>
</div>
<div class="p-3 mt-3 mb-3" style="background-color: #eaeaea;">
<label for="post_type">Afficher ce contenu comme :</label><br>
  <select name="post_type" id="post_type" class="form-control">
    <option value="1">Un article</option>
    <option value="2">Une page</option>
  </select>
</div>
<button class="btn btn-dark" type="submit" value="Envoyer" name="submit">Envoyer</button>
</form>
</div>
</div>
</div>
</section>
<?php } else {
  // Renvoyer un message d'erreur
  echo "Vous devez être connecté pour accéder à cette page.";
} ?>
