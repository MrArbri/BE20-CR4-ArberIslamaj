<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once './components/db_connect.php';

$sql = "SELECT `id`, `publisher_name`, `publisher_address` FROM `media_library`";
$result = mysqli_query($conn, $sql);
$rows = "";

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $rows .= "
            <tr>
                <td class='text-capitalize'>$row[publisher_name]</td>
                <td class='text-capitalize'>$row[publisher_address]</td>
                <td><a href='details.php?mediaID=$row[id]' class='btn btn-primary'>Details</a></td>
                <td><a href='update.php?mediaID=$row[id]' class='btn btn-warning'>Edit</a></td>
                <td><a href='delete.php?mediaID=$row[id]' class='btn btn-danger'>Delete</a></td>
            </tr>";
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

    <div class="container bg-secondary text-center mt-5 mb-5 pt-3 pb-1 shadow">
        <table class='table table-success table-striped table-hover'>
            <thead>
                <tr>
                    <th scope='col'>Publisher</th>
                    <th scope='col'>Publisher address</th>
                    <th scope='col'>Details</th>
                    <th scope='col'>Edit</th>
                    <th scope='col'>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?= $rows; ?>
            </tbody>
        </table>
    </div>

    <?php require_once './components/footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>