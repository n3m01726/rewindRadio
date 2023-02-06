<?php
namespace RewindRadio;
class ManagePosts {
// Function to handle the upload of post's featured image
public static function imageUpload($featured_image, $target_dir) {
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($featured_image, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
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
        if ($imageFileType != ['jpg','png','jpeg','gif']
    ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $featured_image)) {
                echo "The file " . basename((string)$_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}

// Function to handle the update of a post
public static function handlePostUpdate($id) {
    try {
        // Connection to the database
        $db = new Database;
        $db_conx_rdj = $db->connect();
    } catch (\PDOException $e) {
        echo "Error connecting to the database: " . $e->getMessage();
        exit;
    }

    // Data processing form
    $title = htmlspecialchars((string)$_POST['title']);
    $content = $_POST['content'];
    $slug = strtolower(str_replace(' ', '-', $title));
    $date_posted = date("Y-m-d");
    $featured_image = $_FILES["fileToUpload"]["name"];

    // SQL insert query
    $query = "UPDATE " . PREFIX . "_posts SET title = :title, content = :content, slug = :slug, date_posted = :date_posted, featured_image = :featured_image WHERE id=$id";
    $stmt = $db_conx_rdj->prepare($query);
    $stmt->bindParam(':title', $title);
$stmt->bindParam(':content', $content);
$stmt->bindParam(':slug', $slug);
$stmt->bindParam(':date_posted', $date_posted);
$stmt->bindParam(':featured_image', $featured_image);

if ($stmt->execute()) {
  return true;
} else {
  return false;
}

    if ($stmt->execute()) {
  return true;
} else {
  return false;
} } }