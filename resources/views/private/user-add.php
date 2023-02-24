<?php if (isset($_SESSION['user_id'])) { ?>
<!-- Plugins CSS Styles Sheets -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <section>
  
<div class="container justify-content-center align-items-center h-100">
   <div class="row">
<div class="col-lg-8 admin-post-content">
<h1>Ajouter un user</h1>
<hr>
<form action="user-send.php" method="post" enctype="multipart/form-data">
<div class="mb-3">
<label for="username">Nom d'utilisateur</label>
<input type="text" name="username" id="username" class="form-control">
</div>
<div class="mb-3">
<label for="email">Courriel :</label>
  <input type="email" name="email" id="email" class="form-control">
</div>  
<div class="mb-3">
  <label for="password">Mot de passe</label>
  <input type="password" name="password" id="password" class="form-control">
</div>
<div class="mb-3">
<label for="job_title">Poste au sein du projet:</label>
  <input type="text" name="job_title" id="job_title" class="form-control">
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
