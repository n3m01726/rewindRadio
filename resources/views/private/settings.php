<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<div style="margin-left: 60px;">
<form action="src/update.php" method="post" id="update-form">
    <input type="text" name="id" value="1">
    <label for="first_name">Prénom</label><br>
    <input type="text" name="first_name" id="first_name"><br>
    <label for="last_name">Nom de famille</label><br>
    <input type="text" name="last_name" id="last_name"><br>
    <label for="nice_nickname">Nickname de préférence</label><br>
    <input type="text" name="nice_nickname" id="nice_nickname"><br>
    <label for="job_title">Poste au sein du projet</label><br>
    <input type="text" name="job_title" id="job_title"><br>
    <label for="fav_quote">Citation favorite</label><br>
    <input type="text" name="fav_quote" id="fav_quote"><br>
    <label for="bio">Bio</label><br>
    <textarea name="bio" id="bio"></textarea>
    <hr>
    <label for="email">Email</label><br>
    <input type="email" name="email" id="email"><br>
    <label for="password">Password</label><br>
    <input type="password" name="password" id="password"><br>
    <span class="form-text">* Laisser vide si vous ne voulez pas le changer *</span><br>
    <input type="submit" class="btn btn-dark" value="Soumettre">
</form>
</div>
<!-- Inclusion de la bibliothèque jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
  $("#submit-button").click(function(e) {
    e.preventDefault(); // Empêche le formulaire de soumettre la page

    // Récupère les données du formulaire
    var formData = $("#update-form").serialize();

    // Envoie une requête Ajax POST au fichier update.php
    $.ajax({
      type: 'POST',
      url: 'update.php',
      data: formData,
      success: function(response) {
        // Affiche une alerte avec la réponse du serveur
        alert(response);
      }
    });
  });
</script>
