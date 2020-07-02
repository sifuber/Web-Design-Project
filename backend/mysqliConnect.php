<?php
    $user = 'berke';
    $password = 'aaqq1234';
    $db_host = 'localhost';
    $db_name = 'project';

    $dbc = mysqli_connect($db_host,$user,$password,$db_name);

    if ($dbc->connect_errno) {
        echo "Failed to connect to MySQL: " . $dbc->connect_error;
    exit();
    }