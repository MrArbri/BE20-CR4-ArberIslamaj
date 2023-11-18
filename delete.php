<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once './components/db_connect.php';

if (isset($_GET["mediaID"]) && !empty($_GET["mediaID"])) {
    $id = $_GET["mediaID"];

    // Fetch data before deletion for further processing
    $sql = "SELECT * FROM `media_library` WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // Delete from media_library table
    $sql = "DELETE FROM `media_library` WHERE id = $id";
    mysqli_query($conn, $sql);

    if ($row["picture"] !== "default_image.jpg") {
        // Delete the associated picture file if it's not the default one
        unlink("assets/{$row['picture']}");
    }

    // Delete from media_library table again (optional, depending on your needs)
    // $sql = "DELETE FROM `media_library` WHERE `id` = $id";
    // mysqli_query($conn, $sql);

    mysqli_close($conn);
    header("Location: index.php");
} else {
    mysqli_close($conn);
    header("Location: ./index.php");
}
