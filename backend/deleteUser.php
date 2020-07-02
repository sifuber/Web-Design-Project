<?php

require "../backend/mysqliConnect.php";

$selected = $_POST['selected'];

foreach ($selected as $user) {

    $user = explode("+", $user);

    $query = "DELETE FROM `logincredentials` WHERE `logincredentials`.`user_index` = $user[0]";
    $dbc -> query($query);
};

header("Location: ../adminPage.php?$user[0]");
