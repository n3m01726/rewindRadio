<?php

use RewindRadio\Database;

include('../../app/config/config.php');
include('../../ressources/classes/database.class.php');


$target_dir = "../public/uploads/";
$featured_image = $target_dir . basename((string) $_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($featured_image,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }

  // Check if file already exists
  if (file_exists($featured_image)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 8_000_000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $featured_image)) {
      echo "The file ". basename( (string) $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}


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
$avatar = $_FILES["fileToUpload"]["name"];
$first_name = htmlspecialchars((string) $_POST['first_name']);
$last_name = htmlspecialchars((string) $_POST['last_name']);
$nice_nickname = htmlspecialchars((string) $_POST['nice_nickname']);
$email = htmlspecialchars((string) $_POST['email']);
$bio = htmlspecialchars((string) $_POST['bio']);
$job_title = htmlspecialchars((string) $_POST['job_title']);
$sm_facebook = htmlspecialchars((string) $_POST['sm_facebook']);
$sm_instagram = htmlspecialchars((string) $_POST['sm_instagram']);
$sm_twitter = htmlspecialchars((string) $_POST['sm_twitter']);
$sm_twitch = htmlspecialchars((string) $_POST['sm_twitch']);
$sm_tiktok = htmlspecialchars((string) $_POST['sm_tiktok']);
$sm_snapchat = htmlspecialchars((string) $_POST['sm_snapchat']);
$sm_discord = htmlspecialchars((string) $_POST['sm_discord']);


// Requête SQL d'insertion
$query = "INSERT INTO ".PREFIX."_users (
  username,
  password,
  avatar,
  first_name,
  last_name,
  nice_nickname,
  email,
  bio,
  job_title,
  sm_facebook,
  sm_instagram,
  sm_twitter,
  sm_twitch,
  sm_tiktok,
  sm_snapchat,
  sm_discord,
  fav_quote) VALUES (
  :username,
  :password,
  :avatar,
  :first_name,
  :last_name,
  :nice_nickname,
  :email,
  :bio,
  :job_title,
  :sm_facebook,
  :sm_instagram,
  :sm_twitter,
  :sm_twitch,
  :sm_tiktok,
  :sm_snapchat,
  :sm_discord,
  :fav_quote)";

$stmt = $db_conx_rdj->prepare($query);
$stmt->bindParam(':username',$username);
$stmt->bindParam(':password',$password);
$stmt->bindParam(':avatar',$avatar);
$stmt->bindParam(':first_name',$first_name);
$stmt->bindParam(':last_name',$last_name);
$stmt->bindParam(':nice_nickname',$nice_nickname);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':bio',$bio);
$stmt->bindParam(':job_title',$job_title);
$stmt->bindParam(':sm_facebook',$sm_facebook);
$stmt->bindParam(':sm_instagram',$sm_instagram);
$stmt->bindParam(':sm_twitter',$sm_twitter);
$stmt->bindParam(':sm_twitch',$sm_twitch);
$stmt->bindParam(':sm_tiktok',$sm_tiktok);
$stmt->bindParam(':sm_snapchat',$sm_snapchat);
$stmt->bindParam(':sm_discord',$sm_discord);
$stmt->bindParam(':fav_quote',$fav_quote);
$result = $stmt->execute();

// Message de confirmation ou d'erreur
if ($result) {
  echo "Le formulaire a été envoyé avec succès !";
} else {
  echo "Erreur lors de l'envoi du formulaire : " . $stmt->errorInfo()[2];
}

