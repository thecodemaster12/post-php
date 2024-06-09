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
        $sql = "SELECT * FROM posts WHERE post_status = 1";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    else {
        $sql = "SELECT *, DATE_FORMAT(created_at, '%d-%M-%Y') AS post_date FROM posts WHERE post_by = $orgId";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
}

function getPost($postId, $conn) {
    $sql = "SELECT *, DATE_FORMAT(created_at, '%d-%M-%Y') AS post_date FROM posts WHERE post_id = $postId";
    $result = mysqli_query($conn, $sql);
    return $result;
}


function getFiles($postId, $conn) {
    $sql = "SELECT * FROM post_files WHERE post_id = $postId";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getPostId($postTitle,$postOrg,$conn) {
    $sql = "SELECT post_id FROM posts WHERE post_title = '$postTitle' AND post_by = $postOrg";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['post_id'];
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

function addFileToDB($fileName, $postId, $conn) {
    $sql = "INSERT INTO post_files (post_files_names, post_id) VALUE ('$fileName', $postId)";
    mysqli_query($conn, $sql);
}

function uploadFiles($files, $postTitle, $postId, $conn) {
    $path = "../uploads/";

    // mkdir($path, 0777, true);

        // highlight_string(var_export($files, true));

        // echo $files['name'][0];

    foreach($files['tmp_name'] as $key => $tmp_name){
        $file_name = $files['name'][$key];
        $file_size = $files['size'][$key];
        $file_tmp = $files['tmp_name'][$key];
        $file_type = $files['type'][$key];

        
        $new_file_name = $postTitle.'_'.uniqid().'_'.$file_name;
        addFileToDB($new_file_name, $postId, $conn);

        // Move the uploaded file to the specified directory with the new file name
        move_uploaded_file($file_tmp, $path.$new_file_name);
    }
}

function deletePost($id, $conn) {
    $sql = "UPDATE posts SET post_status=0 WHERE post_id = $id";
    $result = mysqli_query($conn, $sql);
}


function getTrashList($conn) {
    $sql = "SELECT * FROM posts WHERE post_status = 0";
    $result = mysqli_query($conn, $sql);
    return $result;
}