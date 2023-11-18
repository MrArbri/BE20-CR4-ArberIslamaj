<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once './components/db_connect.php';
require_once './components/fileUpload.php';

if (isset($_POST["create"])) {
    $title = $_POST["title"];
    $picture = fileUpload($_FILES["picture"]);
    $ISBN = $_POST["ISBN"];
    $description = $_POST["description"];
    $type = $_POST["type"];
    $authorFirstName = $_POST["author_first_name"];
    $authorLastName = $_POST["author_last_name"];
    $publisherName = $_POST["publisher_name"];
    $publisherAddress = $_POST["publisher_address"];
    $publishDate = $_POST["publish_date"];
    $availability = $_POST["availability"];

    $sql = "INSERT INTO `media_library`(`title`, `picture`, `ISBN`, `description`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`, `availability`) VALUES ('$title', '$picture[0]', '$ISBN', '$description', '$type', '$authorFirstName', '$authorLastName', '$publisherName', '$publisherAddress', '$publishDate', '$availability')";

    if (mysqli_query($conn, $sql)) {
        echo "<div class='alert alert-success' role='alert'>
                    New media added successfully!
                </div>";
        header("refresh: 3; url= index.php");
    } else {
        echo "<div class='alert alert-danger' role='alert'>
            Something went wrong, please try again!
        </div>";
    }
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<style>
    body {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    footer {
        margin-top: auto;
    }
</style>

<body>

    <?php require_once './components/navbar.php' ?>

    <div class="container w-50 shadow mt-5 mb-5 p-3">
        <fieldset class="">
            <h2>Add Media</h2>

            <form action="" method="POST" enctype="multipart/form-data">

                <table class="table table-success table-striped table-hover">
                    <tbody>
                        <tr>
                            <th>
                                Title*
                            </th>
                            <td>
                                <input type="text" name="title" class="form-control" placeholder="Please enter the media title" required>
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Image
                            </th>
                            <td>
                                <input type="file" name="picture" class="form-control" placeholder="Please enter an image URL">
                            </td>
                        </tr>

                        <tr>
                            <th>
                                ISBN*
                            </th>
                            <td>
                                <input type="text" name="ISBN" class="form-control" placeholder="Please enter the ISBN code" required>
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Description*
                            </th>
                            <td>
                                <textarea type="text" name="description" class="form-control" placeholder="Please enter the description"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Type*
                            </th>
                            <td>
                                <select type="select" name="type" class="form-select" aria-label="Default select example" placeholder="Please enter the title" required>
                                    <option value="" selected>Please select the media type</option>
                                    <option value="book">Book</option>
                                    <option value="cd">CD</option>
                                    <option value="dvd">DVD</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Author name*
                            </th>
                            <td>
                                <input class="form-control" type="text" name="author_first_name" placeholder="Please enter the first name" required>
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Author surname*
                            </th>
                            <td>
                                <input class="form-control" type="text" name="author_last_name" placeholder="Please enter the last name" required>
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Publisher name*
                            </th>
                            <td>
                                <input class="form-control" type="text" name="publisher_name" placeholder="Please enter the publisher name" required>
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Publisher address
                            </th>
                            <td>
                                <input class="form-control" type="text" name="publisher_address" placeholder="Please enter the publisher address">

                            </td>
                        </tr>

                        <tr>
                            <th>
                                Date published*
                            </th>
                            <td>
                                <input class="form-control" type="text" name="publish_date" placeholder="Please enter the date i. e. 2023-11-17">

                            </td>
                        </tr>

                        <tr>
                            <th>
                                Availability*
                            </th>
                            <td>
                                <input class="form-check-input" name="availability" value="available" type="radio" required checked>
                                <label class="form-check-label" for="availableRadio">Available</label>

                                <input class="form-check-input" name="availability" value="unavailable" type="radio" required>
                                <label class="form-check-label" for="unavailableRadio">Unavailable</label>
                            </td>
                        </tr>

                    </tbody>
                </table>

                <input type="submit" value="Create" name="create" class="btn btn-primary">

            </form>
        </fieldset>
    </div>

    <?php require_once './components/footer.php' ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>