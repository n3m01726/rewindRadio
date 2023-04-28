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
  <label for="password">Mot de passe </label>
  <input type="password" name="password" id="password" class="form-control">
</div>
<div class="mb-3">
  <label for="avatar">Avatar / Image de profil</label>
  <input type="file" name="fileToUpload"  class="form-control" id="fileToUpload" class="form-control">
</div>
<div class="mb-3">
  <label for="first_name">Prénom</label>
  <input type="text" name="first_name" id="first_name" class="form-control">
</div>
<div class="mb-3">
  <label for="last_name">Nom de famille</label>
  <input type="text" name="last_name" id="last_name" class="form-control">
</div>
<div class="mb-3">
<label for="nice_nickname">Nickname :</label>
  <input type="text" name="nice_nickname" id="nice_nickname" class="form-control">
</div>

<div class="mb-3">
  <label for="bio">Bio</label>
  <input type="text" name="bio" id="bio" class="form-control">
</div>
<div class="mb-3">
<label for="job_title">Poste au sein du projet:</label>
  <input type="text" name="job_title" id="job_title" class="form-control">
</div>
<div class="mb-3">
<label for="sm_instagram">Nom d'utilisateur facebook :</label>
  <input type="text" name="sm_facebook" id="sm_facebook" class="form-control">
</div>
<div class="mb-3">
<label for="sm_instagram">Nom d'utilisateur @instagram :</label>
  <input type="text" name="sm_instagram" id="sm_instagram" class="form-control">
</div>
<div class="mb-3">
<label for="sm_tiktok">Nom d'utilisateur @twitter :</label>
  <input type="text" name="sm_twitter" id="sm_twitter" class="form-control">
</div>
<div class="mb-3">
  <label for="sm_linkedin">Linkedin</label>
  <input type="text" name="sm_linkedin" id="linkedin" class="form-control">
</div>
<div class="mb-3">
  <label for="sm_twitch">Twitch</label>
  <input type="text" name="sm_twitch" id="sm_twitch" class="form-control">
</div>
<div class="mb-3">
<label for="sm_tiktok">Nom d'utilisateur @tiktok :</label>
  <input type="text" name="sm_tiktok" id="sm_tiktok" class="form-control">
</div>
<div class="mb-3">
  <label for="sm_snapchat">Snapchat</label>
  <input type="text" name="sm_snapchat" id="sm_snapchat" class="form-control">
</div>
<div class="mb-3">
  <label for="sm_discord">Discord</label>
  <input type="text" name="sm_discord" id="sm_discord" class="form-control">
</div>
<button class="btn btn-dark" type="submit" value="Envoyer" name="submit">Envoyer</button>
</form>
</div>
</div>
</div>
</section>
<?php include('layout/footer.php'); ?>
