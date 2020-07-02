<?php

require "../backend/mysqliConnect.php";


$newRate = $_POST['hourly-rate'];
$updateQuery = "UPDATE `salary` SET `hourly_rate` = $newRate WHERE `salary`.`salary_index` = 1";
$dbc -> query($updateQuery);

header("Location: ../ratePage.php");

