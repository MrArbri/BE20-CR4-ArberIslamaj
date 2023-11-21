<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once './components/db_connect.php';

$sql = "SELECT * FROM `media_library`";
$result = mysqli_query($conn, $sql);
$rows = "";

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $imagePath = "./assets/" . $row['picture'];

        // Check if the image file exists
        if (file_exists($imagePath)) {
            $imageTag = "<img src='$imagePath' class='img-thumbnail c-img-thumbnail' style='width: 15rem;' alt='Media img'>";
        } else {
            $imageTag = "<p class='text-danger'>Image not found</p>";
        }

        $availabilityBadge = ($row["availability"] == "available")
            ? "<span class='text-success' style='font-size: 50px;'>&#8226;</span>"
            : "<span class='text-danger' style='font-size: 50px;'>&#8226;</span>";

        $rows .= "
            <tbody>
                <tr>
                    <th>$imageTag</th>
                    <td class='text-capitalize'>$row[title]</td>
                    <td class='text-uppercase'>$row[type]</td>
                    <td class='text-capitalize'>$row[author_first_name] $row[author_last_name]</td>
                    <td class='text-capitalize'>
                    <a href='./publisher.php?publisher_name=$row[publisher_name]'>
                    $row[publisher_name]</a></td>
                    <td>$availabilityBadge</td>
                    <td><a href='details.php?mediaID=$row[id]' class='btn btn-primary'>Details</a></td>
                    <td><a href='update.php?mediaID=$row[id]' class='btn btn-warning'>Edit</a></td>
                    <td><a href='delete.php?mediaID=$row[id]' class='btn btn-danger'>Delete</a></td>
                </tr>
            </tbody>";
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer">

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
                    <th scope='col'>Image</th>
                    <th scope='col'>Title</th>
                    <th scope='col'>Type</th>
                    <th scope='col'>Author</th>
                    <th scope='col'>Publisher</th>
                    <th scope='col'>Availability</th>
                    <th scope='col'>Details</th>
                    <th scope='col'>Edit</th>
                    <th scope='col'>Delete</th>
                </tr>
            </thead>
            <?= $rows; ?>
        </table>
    </div>

    <?php require_once './components/footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>