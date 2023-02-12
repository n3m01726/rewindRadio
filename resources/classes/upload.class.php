<?php
require('../vendor/autoload.php');
use Intervention\Image\ImageManagerStatic as Image;
use League\Glide\Server;
use SebastianBergmann\CodeCoverage\Report\Xml\Source;

class ImageUpload {
    const ALLOWED_FORMATS = ['jpg', 'jpeg', 'png', 'gif'];
    const MAX_FILE_SIZE = 8_000_000; // 8 MB

    public static function upload($file, $username, $type) {
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo((string) $file['name'], PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            throw new Exception("File is not an image.");
        }

        // Check if file format is allowed
        if (!in_array($imageFileType, self::ALLOWED_FORMATS)) {
            throw new Exception("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        }

        // Check file size
        if ($file["size"] > self::MAX_FILE_SIZE) {
            throw new Exception("Sorry, your file is too large.");
        }

        // Generate unique file name
        $fileName = uniqid() . '.' . $imageFileType;

        // Determine the target directory
        if ($type == 'profile') {
            $targetDir = 'uploads/profile/' . $username . '/';
        } elseif ($type == 'post') {
            $targetDir = 'uploads/posts/' . $username . '/';
        } else {
            throw new Exception("Invalid image type");
        }

        // Upload the original file
        if (!move_uploaded_file($file["tmp_name"], $targetDir . $fileName)) {
            throw new Exception("Sorry, there was an error uploading your file.");
        }

        // Resize the image with Glide
        $imagesize = [
            [100, 100, 'gallery'],
            [25, 25, 'avatar'],
        ];
        foreach ($imagesize as $size) {
            $server = League\Glide\ServerFactory::create([
                'source' => 'path/to/source/folder',
                'cache' => 'path/to/cache/folder',
            ]);
    // You could manually pass in the image path and manipulations options
            $server->getImageResponse('users/1.jpg', ['w' => 300, 'h' => 400]);
            $server->getImageResponse($path, $_GET);
        }

        return [
            'file_name' => $fileName,
            'file_path' => $targetDir . $fileName,
            'created_at' => date('Y-m-d H:i:s'),
        ];
    }
}
