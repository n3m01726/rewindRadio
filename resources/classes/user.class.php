<?php
namespace Resources\classes;
use Resources\classes\Database;
Class User {

 public static function getAlbumsByUserId($user_id) {
    $db = new Database;
    $db_conx_rdj = $db->connect();
    $query = "SELECT id, album_title FROM znoor_albums WHERE user_id = :user_id ORDER BY id ASC;";
    
    $stmt = $db_conx_rdj->prepare($query);
    $stmt->execute(array(":user_id" => $user_id));
    return $stmt->fetchAll();
}

public static function getPhotosByAlbumId($album_id) {
    $db = new Database;
    $db_conx_rdj = $db->connect();
    $query = "SELECT * FROM znoor_albums
    JOIN znoor_media ON znoor_albums.id = znoor_media.album_id
    WHERE znoor_albums.id = :album_id";
    $stmt = $db_conx_rdj->prepare($query);
    $stmt->execute(array(":album_id" => $album_id));
    return $stmt->fetchAll();
}

public static function getAvatar() {
    if (isset($_SESSION['user_id'])) {
      // Retrieve user information from the database
      $db = new Database;
      $db_conx_rdj = $db->connect();
      $query = "SELECT * FROM ".PREFIX."_users WHERE id = :id";
      $statement = $db_conx_rdj->prepare($query);
      $statement->execute([':id' => $_SESSION['user_id']]);
      $user = $statement->fetch(\PDO::FETCH_ASSOC);
      echo '
      <div class="dropdown dropstart">
      <div class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="uploads/profile/'.$user['avatar'].'" alt="'.$user['username'].'" class="avatar rounded-circle mx-3" width="32" height="32">
      </div>

    <ul class="dropdown-menu text-small">
      <li><a class="dropdown-item" href="./private/post-list.php">Liste des articles</a></li>
      <li><a class="dropdown-item" href="./private/post-add.php">Ajouter un article</a></li>
      <li><a class="dropdown-item" href="./add-draft.php">Ajouter une proposition d\'article</a></li>
      <li><a class="dropdown-item" href="./view-drafts.php">Voir mes propositions d\'article</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="./user-add.php">Ajouter un user</a></li>
      <li><a class="dropdown-item" href="./user-list.php">Voir les utilisateurs</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="./profile.php">Voir mon profil</a></li>
      <li><a class="dropdown-item" href="./settings.php">Paramètres</a></li>
      <li><a class="dropdown-item" href="./logout.php">Se déconnecter</a></li>
    </ul>
  </div>';
    }
  }
  }