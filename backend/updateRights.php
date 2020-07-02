<?php
require "../backend/mysqliConnect.php";

$selected = $_POST['selected2'];

foreach ($selected as $user) {

    $user = explode("+",$user);
    if($user[4] == 1){
        $query = "UPDATE `logincredentials` SET `admin_rights` = '0' WHERE `logincredentials`.`user_index` = $user[0]";
        $dbc -> query($query);
    } else {
        $query = "UPDATE `logincredentials` SET `admin_rights` = '1' WHERE `logincredentials`.`user_index` = $user[0]";
        $dbc -> query($query);
    }

}

header("Location: ../adminPage.php?$user[0]");