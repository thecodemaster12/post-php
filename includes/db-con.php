<?php

$dbServer = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'post';

try {
    $conn = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbName);
    // echo 'You are connected ..!!!';
} catch (Exception $e) {
    echo "<strong>Failed to Connect:</strong> " . $e->getMessage();
}