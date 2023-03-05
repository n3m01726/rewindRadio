<?php
use App\ManagePosts;
if (isset($_SESSION['user_id'])) {
  // Afficher le contenu de la page ?>
<!-- Plugins CSS Styles Sheets -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
      <table class="table table-striped">
    <thead>
        <tr>
            <td>Type</td>
            <td>Date de publication</td>
            <td>Titre</td>
            <td>Auteur.trice</td>
            <td>Catégories</td>
            <td>Étiquettes</td>
            <td>Actions possibles</td>
        </tr>
    </thead>
    <tbody>
<?php
ManagePosts::listNews();
?>

</tbody>
</table>
 


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <?php } else {
  // Renvoyer un message d'erreur
  echo "Vous devez être connecté pour accéder à cette page.";
} ?>