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

function getUserList($userId, $conn) {
    if ($userId == null) {
        $sql = "SELECT * FROM users WHERE user_active = 1";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    else {
        $sql = "SELECT * FROM users WHERE user_id = $userId";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
}

function getUserId($userEmail, $conn) {
    $sql = "SELECT * FROM users WHERE user_email = '$userEmail'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['user_id'];
}

function getPostList($orgId, $conn) {
    if ($orgId == null) {
        $sql = "SELECT * FROM posts  WHERE post_status = 1 ORDER BY created_at DESC";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    else {
        $sql = "SELECT *, DATE_FORMAT(created_at, '%d-%M-%Y %h:%i %p') AS post_date FROM posts WHERE post_by = $orgId ORDER BY post_date DESC";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
}

function getPost($postId, $conn) {
    $sql = "SELECT *, DATE_FORMAT(created_at, '%d-%M-%Y %h:%i %p') AS post_date FROM posts WHERE post_id = $postId ORDER BY created_at DESC";
    $result = mysqli_query($conn, $sql);
    return $result;
}


function getFiles($postId, $conn) {
    $sql = "SELECT * FROM post_files WHERE post_id = $postId";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getUserFiles($postId, $conn) {
    $sql = "SELECT * FROM post_files WHERE post_id = $postId AND privacy = 0";
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
        if (decrypt($row['user_pass'], $userEmail) == $userPass){
            return false;
        }
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

function addHiddenFileToDB($fileName, $postId, $conn) {
    $sql = "INSERT INTO post_files (post_files_names, post_id, privacy) VALUE ('$fileName', $postId, 1)";
    mysqli_query($conn, $sql);
}

function uploadHiddenFiles($files, $postTitle, $postId, $conn) {
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
        addHiddenFileToDB($new_file_name, $postId, $conn);

        // Move the uploaded file to the specified directory with the new file name
        move_uploaded_file($file_tmp, $path.$new_file_name);
    }
}

function deletePost($id, $conn) {
    $sql = "UPDATE posts SET post_status=0 WHERE post_id = $id";
    $result = mysqli_query($conn, $sql);
}


function updateUser($userId, $userName, $userEmail, $userOrg, $userPass, $conn) {
    $sql = "UPDATE users SET user_name='$userName', user_email='$userEmail', user_org=$userOrg, user_pass='$userPass' WHERE user_id = $userId";
    $result = mysqli_query($conn, $sql);
}

function updatePost($postId, $postTitle, $projectName, $postDetails, $postOrg, $conn) {
    $sql = "UPDATE posts SET post_title='$postTitle',project_name='$projectName',post_details='$postDetails',post_by=$postOrg WHERE post_id=$postId";
    $result = mysqli_query($conn, $sql);
}


function getTrashList($conn) {
    $sql = "SELECT * FROM posts WHERE post_status = 0";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function truncatePostContent($content, $length = 200, $ellipsis = '...') {
    // Trim the content to the specified length
    $truncatedContent = mb_substr($content, 0, $length);

    // Add ellipsis if the content was truncated
    if (mb_strlen($content) > $length) {
        $truncatedContent .= $ellipsis;
    }

    return $truncatedContent;
}


function updateOrg($orgId, $orgName, $orgAddress, $conn) {
    $sql = "UPDATE organizations SET org_name='$orgName',org_address='$orgAddress' WHERE org_id = $orgId";
    $result = mysqli_query($conn, $sql);
}

function restorePost($postId, $conn) {
    $sql = "UPDATE posts SET post_status=1 WHERE post_id = $postId";
    $result = mysqli_query($conn, $sql);
}


function deleteUser($userId, $conn) {
    $sql = "DELETE FROM users WHERE user_id = $userId";
    $result = mysqli_query($conn, $sql);
}

function deletePostFileByID($postFileId, $conn) {
    $sql = "DELETE FROM post_files WHERE post_files_id = $postFileId";
    mysqli_query($conn, $sql);
}

function deleteAllPostForEver($conn) {
    $sql = "SELECT post_id FROM posts WHERE post_status = 0";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        deletePostFileLocation($row['post_id'],$conn);
        deletePostForEver($row['post_id'],$conn);
    }
    mysqli_free_result($result);
}


function deletePostFileLocation($postId, $conn) {
    $sql = "SELECT * FROM post_files WHERE post_id = $postId";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        unlink(dirname(__FILE__) . "/../uploads/" . $row['post_files_names']);
        deletePostFileByID($row['post_files_id'], $conn);
    }
}

function deletePostForEver($postId, $conn) {
    $sql = "DELETE FROM posts WHERE post_id = $postId";
    mysqli_query($conn, $sql);
}

function deleteOrg($orgId, $conn) {
    $result = getPostList($orgId, $conn);

    while ($row = mysqli_fetch_assoc($result)) {
        deletePostFileLocation($row['post_id'], $conn);
        deletePostForEver($row['post_id'], $conn);
        // echo $row['post_id'];
    }

    $sql = "DELETE FROM organizations WHERE org_id = $orgId";
    mysqli_query($conn, $sql);
}


function encrypt($data, $name) {
    $method = "AES-256-CBC";
    $key = $name;
    $options = 0;
    $iv = '1234567891011129';
    $encryptedData = openssl_encrypt($data, $method, $key, $options,$iv);
    return $encryptedData;
}

function decrypt($encryptData, $name) {
    $method = "AES-256-CBC";
    $key = $name;
    $options = 0;
    $iv = '1234567891011129';
    $decryptedData = openssl_decrypt($encryptData, $method, $key, $options,$iv);
    return $decryptedData;
}