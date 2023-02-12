<?php
require_once 'ImageUpload.php';

$username = $user['username'];
$type = 'profile'; // or 'post'

if (!empty($_FILES)) {
    try {
        $result = ImageUpload::upload($_FILES['image'], $username, $type);
        echo '<div class="alert alert-success" role="alert">File uploaded successfully!</div>';
    } catch (Exception $e) {
        echo '<div class="alert alert-danger" role="alert">' . $e->getMessage() . '</div>';
    }
}