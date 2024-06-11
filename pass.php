<?php

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

// $data = "Shihab";
// $name = "shihab";

// $en = encrypt($data, $name);
// $de = decrypt($en, $name);

// echo $en . "<br>";
// echo $de;