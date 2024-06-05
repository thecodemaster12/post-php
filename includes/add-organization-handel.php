<?php
session_start();
include 'helper-func.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {

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
else
    header("Location: ../add-organization.php");