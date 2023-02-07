<?php
// Checking to find out if the user got to the sign up page by clicking the sign up
if (isset($_POST['signup-submit'])) {
// Connection to the database
    require 'db.php';

    // fetch the info when the user signs in using the form
    $userName = $_POST['uid'];
    $userEmail = $_POST['mail'];
    $userPassword = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    // inserting some error handlers to check input data

    // Checking if the user submitted with some empty fields
    if (empty($userName) || empty($userEmail) || empty($userPassword) || empty($passwordRepeat)) {
        header("Location: ../signup.php?error=emptyFields&uid=".$userName. "&email". $userEmail); //sending back the user with some info
        exit();
    }
    // if the user entered an invalid userName and email
    else if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $userName)) {
        header("Location: ../signup.php?error=invalidEmail&uid");
        exit();
    }
    // checking if the user entered a valid email
    else if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidEmail&uid=".$userName);
        exit();
    }
    // checking if the user entered a valid UserName with valid characters
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $userName)) {
        header("Location: ../signup.php?error=invaliduid&Email=".$userEmail);
        exit();
    }
    // checking if the two passwords do not match each other
    else if ($userPassword !== $passwordRepeat) {
        header("Location: ../signup.php?error=passwordcheck&uid=". $userName. "&email". $userEmail);
        exit();
    } 
    // checking to finf out if the user tried to signup with a userName that alredy exits
    else {
        // go into the database and check if the username already exits
        $sql = "SELECT userName FROM users WHERE userName=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlError");
            exit(); 
        }
        else if () {
            mysqli_stmt_bind_param($stmt, "s")
        }
    }
}