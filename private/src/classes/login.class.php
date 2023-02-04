<?php
/*include("src/config.php");

// Fonction de connexion
function login($username, $password) {
  // Si le nom d'utilisateur et le mot de passe sont "admin", la connexion est réussie
  if ($username === 'admin' && $password === 'admin') {
    // Enregistrez l'identifiant de l'utilisateur dans la session et renvoyez vrai
    session_start();
    $_SESSION['user_id'] = 1;
    return true;
  } else {
    // Échec de la connexion
    return false;
  }
}

// Fonction de déconnexion
function logout() {
  // Démarrez la session et supprimez l'identifiant de l'utilisateur de la session
  session_start();
  unset($_SESSION['user_id']);
}
*/
session_start();
include('src/classes/common.class.php');
function login($username, $password, $db_conx_rdj) {

    // Vérifiez les informations de connexion de l'utilisateur
    $query = "SELECT * FROM ".PREFIX."_users WHERE username = :username AND password = :password";
    $statement = $db_conx_rdj->prepare($query);
    $statement->execute(array(':username' => $username, ':password' => $password));
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    // Si les informations de connexion sont valides
    if ($row) {
        // Enregistrez l'identifiant de l'utilisateur dans la session
        echo'Connexion réussie! <a href="/private/dashboard.php">Aller au tableau de bord.</a>';
        $_SESSION['user_id'] = $row['id'];
        return true;

    } else {
        // Échec de la connexion, renvoyez un message d'erreur
        echo'Échec de la connexion.<a href="/private/">Retourner à la page de connexion</a> ';
        return false;
        
    }
}

function logout() {
    // Supprimez l'identifiant de l'utilisateur de la session
    unset($_SESSION['user_id']);
}
