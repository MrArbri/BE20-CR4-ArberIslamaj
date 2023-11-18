<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once './components/db_connect.php';

$sql = "SELECT * FROM `media_library` WHERE id = $_GET[mediaID]";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$rows = "<tbody>
                <tr>
                    <img src='./assets/$row[picture]' 
                    class='img-thumbnail c-img-thumbnail' 
                    alt='Media img'>
                </tr>
                <tr>
                    <th scope='col'>Type</th>
                    <td class='text-capitalize'>$row[type]</td>
                </tr>
                <tr>
                    <th scope='col'>Availability</th>
                    <td class='text-capitalize'>$row[availability]</td>
                </tr>
                <tr>
                    <th scope='col'>Title</th>
                    <td class='text-capitalize'>$row[title]</td>
                </tr>
                <tr>
                    <th scope='col'>Description</th>
                    <td class='text-capitalize'>$row[description]</td>
                </tr>
                <tr>
                    <th scope='col'>Author</th>
                    <td class='text-capitalize'>$row[author_first_name] $row[author_last_name]</td>
                </tr>
                <tr>
                    <th scope='col'>ISBN</th>
                    <td class='text-capitalize'>$row[ISBN]</td>
                </tr>
                <tr>
                    <th scope='col'>Publisher</th>
                    <td class='text-capitalize'>$row[publisher_name]</td>
                </tr>
                <tr>
                    <th scope='col'>Publisher address</th>
                    <td class='text-capitalize'>$row[publisher_address]</td>
                </tr>
         </tbody>";

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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

</head>

<body>

    <?php require_once './components/navbar.php' ?>

    <div class="container w-75 bg-secondary text-center mt-5 mb-5 pt-3 pb-1 shadow">
        <table class='table table-success table-striped table-hover'>
            <?= $rows; ?>
        </table>

        <?=
        "   <div>
                <a href='update.php?mediaID=$row[id]' class='btn btn-warning'>Edit</a>
                <a href='delete.php?mediaID=$row[id]' class='btn btn-danger'>Delete</a>
            </div>
        ";
        ?>

    </div>

    <?php require_once './components/footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>