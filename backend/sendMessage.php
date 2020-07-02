<?php

require "mysqliConnect.php";
session_start();

$to_user_id = $_POST['dropdown'];
$result = $dbc -> query("SELECT `u_index` FROM `usercredentials` WHERE `firstName` = '$to_user_id'");
$user_id = $result -> fetch_assoc();

$message = $_POST['messageBox'];

$query = "INSERT INTO `messages` (`message_from`, `message_to`, `message`) VALUES ($_SESSION[user_id], $user_id[u_index], '$message')";
$dbc -> query($query);

header("Location: ../landingPage.php?$user_id[u_index]?$message?" . $_SESSION['user_id']);