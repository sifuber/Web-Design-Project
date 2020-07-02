<?php

require "../backend/mysqliConnect.php";

$approved = $_POST['selected'];
$rejected = $_POST['rejected'];

foreach ($approved as $user) {

    $user = explode("+", $user);
    $query = "INSERT INTO `logincredentials` (`userName`,`password`,`mail`) VALUES ('$user[1]','$user[2]','$user[3]')";
    $dbc->query($query);
    $query = "DELETE FROM `pendingregister` WHERE `pendingregister`.`userName` = '$user[1]'";
    $dbc->query($query);
};

foreach ($rejected as $user) {
    $user = explode("+", $user);
    $query = "DELETE FROM `pendingregister` WHERE `pendingregister`.`userName` = '$user[1]'";
    $dbc->query($query);
}

header("Location: ../adminPage.php");
