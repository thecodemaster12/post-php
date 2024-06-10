<?php
session_start();
include 'helper-func.php';

if (isset($_SERVER['REQUEST_METHOD']) == "POST") {
    // Update Organization
    if (!empty($_POST['updateOrgId'])) {
        $orgId = $_POST['updateOrgId'];
        $orgName = $_POST['orgName'];
        $orgAddress = $_POST['orgAddress'];

        updateOrg($orgId, $orgName, $orgAddress, $conn);
        header("Location: ../organization-list.php");
    }
    // Update User
    if (!empty($_POST['updateUserId'])) {
        $userId = $_POST['updateUserId'];
        $userName = htmlspecialchars($_POST['userName']);
        $userEmail = htmlspecialchars($_POST['userEmail']);
        $userPass = htmlspecialchars($_POST['userPass']);
        $userConfPass = htmlspecialchars($_POST['userConfPass']);
        $userOrg = htmlspecialchars($_POST['userOrg']);

    if (isUserEmpty($userName, $userEmail, $userPass, $userConfPass, $userOrg)) {
        $_SESSION['update-error'] = "Please fill all the inputs";
        header("Location: ../update-post.php?userId=$userId");
        exit();
    }

    // if (isPassMismatched($userPass, $userConfPass)) {
    //     $_SESSION['update-error'] = "Password didn't matched";
    //     header("Location: ../update-post.php?userId=$userId");
    //     exit();
    // }

    // $userPass = password_hash($userConfPass, PASSWORD_DEFAULT);

    updateUser($userId,$userName, $userEmail, $userOrg , $conn);
    header("Location: ../user-list.php");
    exit();

    }
    // Update Post
    if (!empty($_POST['updatePostId'])) {
        # code...
    }
}