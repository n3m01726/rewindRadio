<?php
include("layout/header.php");

use RewindRadio\Database;
if (isset($_SESSION['user_id'])) {
    // L'utilisateur est connecté
    // Récupérez les informations de l'utilisateur à partir de la base de données
    $db = new Database;
    $db_conx_rdj = $db->connect();
    $query = "SELECT * FROM ".PREFIX."_users WHERE id = :id";
    $statement = $db_conx_rdj->prepare($query);
    $statement->execute([':id' => $_SESSION['user_id']]);
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

<?php
} else {
    // L'utilisateur n'est pas connecté, renvoyez-le à la page de connexion
    header('Location: login.php');
}
?>
</div>
      </div>
    </div>
  </nav>

  <?php include("views/post-add.php"); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
