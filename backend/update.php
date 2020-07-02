<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
} else {
    require "../backend/mysqliConnect.php";
}

$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$address = $_POST['address'];
$gsm = $_POST['phone_number'];
$file = $_FILES['file'];

$fileName = $_FILES['file']['name'];
$fileTempName = $_FILES['file']['tmp_name'];
$fileDestination = "D:/xampp/htdocs/images/".$fileName;
move_uploaded_file($fileTempName,$fileDestination);

if(isset($_SESSION['user_row'])){
    $updateQuery = "UPDATE usercredentials 
                    SET `ppicture` = 'images/$fileName', 
                        `firstName` = '$firstName', 
                        `lastName` = '$lastName', 
                        `address` = '$address', 
                        `phoneNumber` = '$gsm'
                    WHERE `u_index` = " . $_SESSION['user_id'];
    $dbc -> query($updateQuery);
    header("Location: ../landingPage.php");

} else {
    $query = "INSERT INTO `usercredentials` (`u_index`, `ppicture`, `firstName`, `lastName`, `address`, `phoneNumber`) 
              VALUES ('" . $_SESSION['user_id'] . "', 'images/$fileName', '$firstName', '$lastName', '$address', '$gsm')";

    $dbc -> query($query);
    header("Location: ../landingPage.php?success2");
}