<?php
if (isset($_SESSION['user_id'])) {
  // Afficher le contenu de la page ?>
<!-- Plugins CSS Styles Sheets -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<?php } else {
  // Renvoyer un message d'erreur
  echo "Vous devez être connecté pour accéder à cette page.";
} ?>