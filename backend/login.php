<?php

if (isset($_POST['login-submit'])) {

    require '../backend/mysqliConnect.php';

    $userId = $_POST['id'];
    $password = $_POST['pwd'];

    $query = "SELECT * FROM logincredentials WHERE userName=?;";
    $stmt = mysqli_stmt_init($dbc);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("Location: ../index.php?error=dberror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, 's', $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            if ($password != $row['password']) {
                header("Location: ../index.php?error=wrongpwd");
                exit();
            } else if ($password == $row['password']) {
                session_start();

                $_SESSION['loginTime'] = time();
                $_SESSION['admin_rights'] = $row['admin_rights'];
                $_SESSION['user_id'] = $row['user_index'];

                header("Location: ../landingPage.php");
                exit();
            } else {
                header("Location: ../index.php?error=wrongpwd");
                exit();
            }
        } else {
            header("Location: ../index.php?error=nosuchuser");
            exit();
        }
    }
} else {
    header("Location: ../index.php?error=noentry");
    exit();
};
