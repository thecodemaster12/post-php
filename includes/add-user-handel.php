<?php
session_start();
include 'helper-func.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $userName = htmlspecialchars($_POST['userName']);
    $userEmail = htmlspecialchars($_POST['userEmail']);
    $userPass = htmlspecialchars($_POST['userPass']);
    $userConfPass = htmlspecialchars($_POST['userConfPass']);
    $userOrg = htmlspecialchars($_POST['userOrg']);
    
    if (isUserEmpty($userName, $userEmail, $userPass, $userConfPass, $userOrg)) {
        $_SESSION['add-user-error'] = "Please fill all the inputs";
        header("Location: ../add-user.php");
        exit();
    }

    if (isEmailTaken($userEmail, $conn)) {
        $_SESSION['add-user-error'] = "User Already Exist";
        header("Location: ../add-user.php");
        exit();
    }

    if (isPassMismatched($userPass, $userConfPass)) {
        $_SESSION['add-user-error'] = "Password didn't matched";
        header("Location: ../add-user.php");
        exit();
    }

    $userPass = password_hash($userConfPass, PASSWORD_DEFAULT);

    addUser($userName, $userEmail, $userPass, $userOrg , $conn);
    $_SESSION['add-user-success'] = "User Added";
    header("Location: ../add-user.php");
    exit();
}
else
    header("Location: ../add-user.php");