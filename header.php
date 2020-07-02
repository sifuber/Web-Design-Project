<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
} else {
    require "./backend/mysqliConnect.php";

    $result = $dbc->query("SELECT * FROM usercredentials WHERE u_index = " . $_SESSION['user_id']);
    if ($result) {
        $userRow = $result->fetch_array();
        $_SESSION['user_row'] = $userRow;
    } else {
        $userRow = null;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generic Company</title>
    <link rel="icon" href="images/logo4.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>

<body>

    <header>

        <div id="navbar">
            <a id="hamburger" onclick="openNav()">
                <div class="text">&#9776;</div>
            </a>
            <a class="item" href="landingPage.php">
                <div class="text">Home Page</div>
            </a>
            <?php
            if (isset($_SESSION['admin_rights']) and $_SESSION['admin_rights'] == 1) {
                echo ('<a class="item" href="adminPage.php"><div class="text">Admin Page</div></a>');
            }
            ?>
            <img id="logo" src="images/logo2.png" alt="">
            <a id="logout" href="./backend/logout.php" type="submit">
                <div class="text">Log Out</div>
            </a>
        </div>

        <div id="sidebar">
            <a id="close" onclick="closeNav()">&times;</a>
            <img id="avatar" src="<?php echo ($_SESSION['user_row']['1']); ?>" alt="">
            <a href="#" id="updateLink">Update Profile</a>
            <?php
            if ($_SESSION['admin_rights'] == 0) {
                echo ('<a class="test" href="calculation.php">Calculate Salary</a>');
            }else 
            echo ('<a class="test" href="ratePage.php">Change Hourly Rate</a>');
            ?>
            <a href="about.php" class="test">About</a>
        </div>

    </header>

    <main>