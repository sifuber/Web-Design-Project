<?php
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: ../index.php");
        exit();
    } else {
        require "../backend/mysqliConnect.php";
    }

    $request = $dbc -> query("SELECT `hourly_rate` FROM `salary`");
    $hourlyRate = $request -> fetch_assoc();

    $currentTime = $_SESSION['start_time'] + 3600;
    $workTime = $currentTime - $_SESSION['start_time'];
    $hourlyRate = $hourlyRate['hourly_rate'];
    $earnings = ($workTime/3600) * $hourlyRate;

    $query = "INSERT INTO `workhourslog` 
             (`input_index`, `user_index`, `start_time`, `stop_time`, `current_interval`, `earnings`) 
             VALUES 
             (NULL, '" . $_SESSION['user_id'] . "', '" . $_SESSION['start_time'] . "', '$currentTime', '" . date('Ymd') . "', '$earnings')";

    $dbc -> query($query);

    $_SESSION['loginTime'] = time();
    header("Location: ../landingPage.php?$hourlyRate");