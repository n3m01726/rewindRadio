<!-- Plugins CSS Styles Sheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<?php
include("../app/config/config.php");
include('../ressources/classes/database.class.php');
include('../ressources/classes/news.class.php');

use RewindRadio\Database;
use RewindRadio\Posts;


    // L'utilisateur est connecté
    // Récupérez les informations de l'utilisateur à partir de la base de données

    $db = new Database;
    $db_conx_rdj = $db->connect();
    $query = "SELECT * FROM ".PREFIX."_users WHERE id = :id";
    $statement = $db_conx_rdj->prepare($query);
    $statement->execute([':id' => 1]);
    $user = $statement->fetch(PDO::FETCH_ASSOC); ?>
<nav class="navbar navbar-dark bg-dark" aria-label="Dark offcanvas navbar">
    <div class="container-fluid">
      
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarDark" aria-controls="offcanvasNavbarDark">
        <span class="navbar-toggler-icon"></span>
      </button><?php
      echo '<div class="text-end">
      <img src="../public/uploads/' . $user['avatar'] . '" alt="{username}" class="avatar rounded-circle mx-3" width="36" height="36">';
    echo '<a class="ms-1 mt-2" href="#">Bienvenue, ' . $user['username'] . '</a></div>'; ?>
    </div>
    </div></nav>
    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasNavbarDark" aria-labelledby="offcanvasNavbarDarkLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarDarkLabel">Articles</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
    <!-- Affichez un menu de navigation pour les utilisateurs connectés -->
    <nav><ul style="list-style-type: none;">
    <li class="mb-1"><h2><a style="text-decoration:none;" href="dashboard.php">Tableau de bord</a></h2></li>
    <li class="mb-1"><h2><a style="text-decoration:none;"  href="post-add.php">Ajouter un article</a></h2></li>
    <li class="mb-1"><h2><a style="text-decoration:none;"  href="post-list.php">Liste des articles</a></h2></li>
    <li class="mb-1"><h2><a style="text-decoration:none;"  href="user-add.php">Ajouter un utilisateur</a></h2></li></ul>
    </nav>
        </div></div>    
    <section>
<table class="table table-striped">
    <thead>
        <tr>
            <td>Title</td>
            <td>Author</td>
            <td>Date Posted</td>
            <td>Categories</td>
            <td>Tags</td>
            <td>Likes #</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
<?php
Posts::listNews();
?>

</tbody>
</table></section>
</div>
      </div>
    </div>
  </nav>
 


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
