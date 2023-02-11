<?php

// checking if the user got to the page by clicking the login button
if (isset($_POST['login-submit'])) {
    // insert the database connection
        require 'db.php';

        // retrieving the info a user tried to signin with
        $userEmail = $_POST['mailuid'];
        $userPwd = $_POST['pwd'];

    // Checking if the user tried to login with some of the fields empty
        if (empty($userEmail) || empty($userPwd)) {
            header("Location: ../index.php?error=emptyfields");
            exit();
        } 
        else {
            // checking if the user tried to login with some info that already exits in the database
            $sql = "SELECT * FROM users WHERE userName=? OR userEmail=?;";
            $stmt = mysqli_stmt_init($conn); // initiating a prepared statement

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../index.php?error=sqlerror");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "ss", $userEmail, $userEmail);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                // fetching the data if we any results from the database
                if ($rows = mysqli_fetch_assoc($result)) {
                    $pwdCheck = password_verify($userPwd, $row['userpwd']);

                    // if the user entered a wrong password
                    if ($pwdCheck == false) {
                        header("Location: ../index.php?error=wrongpassword");
                        exit();
                    }
                    else if ($pwdCheck == true) {
                        // creating sessins to keep info about the user
                        session_start();
                        $_SESSION['userId'] = $row['usersID'];
                        $_SESSION['userName'] = $row['userName'];
                        header("Location: ../index.php?login=success");
                        exit();
                    }
                    else {
                        header("Location: ../index.php?error=wrongpassword");
                        exit(); 
                    }
                }
                else {
                    header("Location: ../index.php?error=nouser");
                    exit();
                }
            }

        }

}
else {
    header("Location: ../index.php");
    exit();
}