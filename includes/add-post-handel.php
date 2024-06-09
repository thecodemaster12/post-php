<?php
session_start();
include 'helper-func.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $postTitle = htmlspecialchars($_POST['postTitle']);
    $projectName = htmlspecialchars($_POST['projectName']);
    $postDetails = htmlspecialchars($_POST['postDetails']);
    $postOrg = htmlspecialchars($_POST['postOrg']);
    // $files = $_FILES['files'];

    // highlight_string(var_export($_FILES['files'], true));


    


    if (empty($postTitle) || empty($postDetails) || empty($postOrg)) {
        $_SESSION['add-post-error'] = "Please fill all the inputs";
        header("Location: ../add-post.php");
        exit();
    }

    addPost($postTitle, $projectName, $postDetails, $postOrg, $conn);


    if ($_FILES['files']['name'][0] !== "") {
        $postId = getPostId($postTitle,$postOrg,$conn);
        uploadFiles($_FILES['files'],$postTitle, $postId ,$conn);
    }


    $_SESSION['add-post-success'] = "Post Added";
    header("Location: ../add-post.php");
    exit();
}
else
    header("Location: ../add-post.php");