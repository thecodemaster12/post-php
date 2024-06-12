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
    $_SESSION['update-success'] = "Updated";
    header("Location: ../update-post.php?orgId=". $orgId);
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

    if (isPassMismatched($userPass, $userConfPass)) {
        $_SESSION['update-error'] = "Password didn't matched";
        header("Location: ../update-post.php?userId=$userId");
        exit();
    }

    // $userPass = password_hash($userConfPass, PASSWORD_DEFAULT);
    $userPass = encrypt($userConfPass, $userEmail);

    updateUser($userId,$userName, $userEmail, $userOrg, $userPass , $conn);
    $_SESSION['update-success'] = "User Updated";
    header("Location: ../update-post.php?userId=".$userId);
    exit();
    
}

// Update Post
if (!empty($_POST['updatePostId'])) {
        $postId = $_POST['updatePostId'];
        $postTitle = htmlspecialchars($_POST['postTitle']);
        $projectName = htmlspecialchars($_POST['projectName']);
        $postDetails = htmlspecialchars($_POST['postDetails']);
        $postOrg = htmlspecialchars($_POST['postOrg']);

        updatePost($postId, $postTitle, $projectName, $postDetails, $postOrg, $conn);
        
        if (!empty($_FILES['files']['name'][0])) {
            $postId = getPostId($postTitle,$postOrg,$conn);
            uploadFiles($_FILES['files'],$postTitle, $postId ,$conn);
        }
        
        header("Location: ../update-post.php?postId=".$postId);
        $_SESSION['update-success'] = "Post Updated";
        exit();
}

// Update User Profile
if (!empty($_POST['updateUserProfileId'])) {
    $userId = $_POST['updateUserProfileId'];
    $userName = htmlspecialchars($_POST['userName']);
    $userEmail = htmlspecialchars($_POST['userEmail']);
    $userPass = htmlspecialchars($_POST['userPass']);
    $userConfPass = htmlspecialchars($_POST['userConfPass']);
    $userOrg = htmlspecialchars($_POST['userOrg']);
    // echo $userPass;

    if (isUserEmpty($userName, $userEmail, $userPass, $userConfPass, $userOrg)) {
        $_SESSION['update-error'] = "Please fill all the inputs";
        header("Location: ../user-profile.php?userId=$userId");
        exit();
    }

    if (isPassMismatched($userPass, $userConfPass)) {
        $_SESSION['update-error'] = "Password didn't matched";
        header("Location: ../user-profile.php?userId=$userId");
        exit();
    }

    // $userPass = password_hash($userConfPass, PASSWORD_DEFAULT);
    $userPass = encrypt($userConfPass, $userEmail);

    updateUser($userId,$userName, $userEmail, $userOrg, $userPass , $conn);
    $_SESSION['update-success'] = "Profile Updated";
    header("Location: ../user-profile.php?userId=".$userId);
    exit();

}


}