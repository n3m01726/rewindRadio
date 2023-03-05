<?php

use App\Database;


$target_dir = "../../public/uploads/";
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
$title = htmlspecialchars((string) $_POST['title']);
$content = $_POST['content'];
$slug = strtolower(str_replace(' ','-',$title));
$date_posted = date("Y-m-d");
$featured_image = $_FILES["fileToUpload"]["name"];
$is_featured = $_POST['is_featured']; 
// Requête SQL d'insertion
$query = "INSERT INTO ".PREFIX."_posts (title, content, slug, date_posted, featured_image, is_featured) VALUES (:title, :content, :slug, :date_posted, :featured_image,:is_featured)";

$stmt = $db_conx_rdj->prepare($query);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':content', $content);
$stmt->bindParam(':slug', $slug);
$stmt->bindParam(':date_posted', $date_posted);
$stmt->bindParam(':featured_image', $featured_image);
$stmt->bindParam(':is_featured', $is_featured);

$result = $stmt->execute();

// Message de confirmation ou d'erreur
if ($result) {
  echo "Le formulaire a été envoyé avec succès !";
} else {
  echo "Erreur lors de l'envoi du formulaire : " . $stmt->errorInfo()[2];
}

