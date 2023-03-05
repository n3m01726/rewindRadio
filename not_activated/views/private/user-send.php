<?php

use App\Database;

try {
  // Connexion à la base de données
$db = new Database;
$db_conx_rdj = $db->connect();
} catch (PDOException $e) {
  echo "Erreur lors de la connexion à la base de données : " . $e->getMessage();
  exit;
}

// Traitement des données du formulaire
$username= htmlspecialchars((string) $_POST['username']);
$password= htmlspecialchars((string) $_POST['password']);
$email = htmlspecialchars((string) $_POST['email']);

// Requête SQL d'insertion
$query = "INSERT INTO ".PREFIX."_users (username,password,email) VALUES (:username,:password,:email)";

$stmt = $db_conx_rdj->prepare($query);
$stmt->bindParam(':username',$username);
$stmt->bindParam(':password',$password);
$stmt->bindParam(':email',$email);

$result = $stmt->execute();

// Message de confirmation ou d'erreur
if ($result) {
  echo "Le formulaire a été envoyé avec succès !";
} else {
  echo "Erreur lors de l'envoi du formulaire : " . $stmt->errorInfo()[2];
}

