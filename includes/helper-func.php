<?php
include 'db-con.php';

function isUserEmpty($userName, $userEmail, $userPass, $userConfPass, $userOrg) {
    if ((empty($userName) || empty($userEmail) || empty($userPass) || empty($userConfPass) || empty($userOrg)))
        return true;
    else
        return false;
}

function isEmailTaken($userEmail, $conn) {
    $sql = "SELECT * FROM users WHERE user_email = '$userEmail'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0){
        mysqli_free_result($result);
        return true;
    } 
    else{
        mysqli_free_result($result);
        return false;
    }
}

function isOrgTaken($orgName, $conn) {
    $sql = "SELECT * FROM organizations WHERE org_name = '$orgName'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0){
        mysqli_free_result($result);
        return true;
    } 
    else{
        mysqli_free_result($result);
        return false;
    }
}

function isPassMismatched($userPass, $userConfPass) {
    if ($userPass !== $userConfPass) 
        return true;
    else
        return false;
}

function makePassHash($userConfPass) {
    return password_hash($userConfPass, PASSWORD_DEFAULT);
}

function addUser($userName, $userEmail, $userPass, $userOrg, $conn) {
    $sql = "INSERT INTO users (user_name, user_email, user_pass, user_org) VALUES ('$userName','$userEmail','$userPass','$userOrg')";
    mysqli_query($conn, $sql);
}

function addOrg($orgName,$orgAddress, $conn) {
    $sql = "INSERT INTO organizations (org_name, org_address) VALUE ('$orgName', '$orgAddress')";
    mysqli_query($conn, $sql);
}

function addPost($postTitle,$projectName, $postDetails, $postOrg, $conn) {
    $sql = "INSERT INTO posts ( post_title, project_name, post_details, post_by) VALUES ('$postTitle', '$projectName', '$postDetails', '$postOrg')";
    mysqli_query($conn, $sql);
}

function getOrgList($orgId, $conn) {
    if ($orgId == null) {
        $sql = "SELECT * FROM organizations";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    else {
        $sql = "SELECT org_name FROM organizations WHERE org_id = $orgId";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['org_name'];
    }
}

function getUserList($conn) {
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getUserId($userEmail, $conn) {
    $sql = "SELECT * FROM users WHERE user_email = '$userEmail'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['user_id'];
}

function getPostList($orgId, $conn) {
    if ($orgId == null) {
        $sql = "SELECT * FROM posts";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    else {
        $sql = "SELECT *, DATE_FORMAT(created_at, '%d-%M-%Y') AS post_date FROM posts WHERE post_by = $orgId";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
}

function isNotAdmin($adminEmail, $adminPass, $conn) {
    $sql = "SELECT * FROM admins";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row['admin_email'] == $adminEmail && $row['admin_pass'] == $adminPass)
        return false;
    else
        return true;
}


function isNotUser($userEmail, $userPass, $conn) {
    $sql = "SELECT * FROM users WHERE user_email = '$userEmail'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {        
        $row = mysqli_fetch_assoc($result);
        if (password_verify($userPass, $row['user_pass']))
            return false;
        else
            return true;
    }
    else {
        return true;
    }

}