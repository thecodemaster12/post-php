<?php
session_start();
include 'helper-func.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $postTitle = htmlspecialchars($_POST['postTitle']);
    $projectName = htmlspecialchars($_POST['projectName']);
    $postDetails = htmlspecialchars($_POST['postDetails']);
    $postOrg = htmlspecialchars($_POST['postOrg']);
    
    if (empty($postTitle) || empty($postDetails) || empty($postOrg)) {
        $_SESSION['add-post-error'] = "Please fill all the inputs";
        header("Location: ../add-post.php");
        exit();
    }


    addPost($postTitle, $projectName, $postDetails, $postOrg, $conn);
    $_SESSION['add-post-success'] = "User Added";
    header("Location: ../add-post.php");
    exit();
}
else
    header("Location: ../add-post.php");