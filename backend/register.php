<?php

if (isset($_POST['register-submit'])) {

    require '../backend/mysqliConnect.php';

    $userName = $_POST['user-name'];
    $mail = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordR = $_POST['pwd-repeat'];

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $userName)) {
        header("Location: ../index.php?error=invalidusername&invalidmail");
        exit();
    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../index.php?error=invalidmail&user-name=" . $userName);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $userName)) {
        header("Location: ../index.php?error=invalidusername&mail=" . $mail);
        exit();
    } elseif ($password !== $passwordR) {
        header("Location: ../index.php?error=pwdmismatch&mail=" . $mail . "&user-name=" . $userName);
        exit();
    } else {

        $query = "SELECT `userName` FROM `logincredentials` WHERE `userName` = '$userName' UNION SELECT `userName` FROM `pendingregister` WHERE `userName` = '$userName';";
        $stmt = mysqli_stmt_init($dbc);

        if (!mysqli_stmt_prepare($stmt, $query)) {
            header("Location: ../index.php?error=alreadyexists");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, 's', $userName);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if ($resultCheck > 0) {
                header("Location: ../index.php?error=nametaken&mail=" . $mail);
                exit();
            } else {

                $query = "INSERT INTO pendingregister (userName, password, mail) VALUES (?, ?, ?);";
                $stmt = mysqli_stmt_init($dbc);

                if (!mysqli_stmt_prepare($stmt, $query)) {
                    header("Location: ../index.php?error=sqlerror1");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, 'sss', $userName, $password, $mail);
                    mysqli_stmt_execute($stmt);

                    session_start();
                    #$_SESSION['loginTime'] = time();

                    #$result = $dbc -> query("SELECT `user_index` FROM logincredentials WHERE `userName` = '$userName'");
                    #$result = $result -> fetch_array();
                    #$_SESSION['user_id'] = $result[0];

                    header("Location: ../index.php?register=success");
                    exit();
                }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

} else {
    header("Location: ../index.php?error=noentry");
    exit();
};
