<?php
include 'includes/db-con.php';
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

$data = "W2FBGR5aRLYrECO77r8h1g==";
$name = "air@air.com";

$en = encrypt($data, $name);
$de = decrypt($data, $name);
echo $de;

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// echo $row['user_pass'];
// echo $en;