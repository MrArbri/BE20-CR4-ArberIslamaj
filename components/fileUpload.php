<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function fileUpload($picture)
{
    if (!empty($picture["tmp_name"])) { // checking if a file has been selected, using !empty instead of checking $picture["error"]
        $imageType = exif_imagetype($picture["tmp_name"]); // checking if you selected an image, using exif_imagetype instead of getimagesize
        if ($imageType === false) {
            $message = "Not an image";
            $pictureName = "default_image.jpg"; // use a default image name
        } else {
            $ext = strtolower(pathinfo($picture["name"], PATHINFO_EXTENSION));
            $pictureName = bin2hex(random_bytes(8)) . "." . $ext; // changing the name of the picture to random string and numbers
            $destination = "assets/{$pictureName}"; // where the file will be saved
            move_uploaded_file($picture["tmp_name"], $destination); // moving the file to the pictures folder
            $message = "Ok";
        }
    } else {
        $message = "No picture chosen";
        $pictureName = "default_image.jpg"; // use a default image name
    }

    return [$pictureName, $message]; // returning an array with two values, the name of the picture and the message
}
