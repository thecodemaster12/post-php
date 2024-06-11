<?php
session_start();
include 'helper-func.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Add Post
    if (isset($_POST['postTitle'])) {
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
    
    
        if ($_FILES['files']['name'][0] !== "") {
            $postId = getPostId($postTitle,$postOrg,$conn);
            uploadFiles($_FILES['files'],$postTitle, $postId ,$conn);
        }
    
        $_SESSION['add-post-success'] = "Post Added";
        header("Location: ../add-post.php");
        exit();
    }

    // Add User
    if (isset($_POST['userName'])) {        
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

    // Add Organization
    if (isset($_POST['orgName'])) {        
        $orgName = htmlspecialchars($_POST['orgName']);
        $orgAddress = htmlspecialchars($_POST['orgAddress']);
        $orgName = ucfirst(strtolower($orgName));
        if (empty($orgName) || empty($orgAddress)) {
            $_SESSION['add-org-error'] = "Organization name or address missing";
            header("Location: ../add-organization.php");
            exit();
        }
    
        if (isOrgTaken($orgName, $conn)) {
            $_SESSION['add-org-error'] = "Organization Already Exist";
            header("Location: ../add-organization.php");
            exit();
        }
    
        addOrg($orgName,$orgAddress, $conn);
        $_SESSION['add-org-success'] = "Organization Added";
        header("Location: ../add-organization.php");
        exit();
    }


}
// else
//     header("Location: ../dashboard.php");