<?php
session_start();
include('includes/config.php');
if (!isset($_SESSION['Email'])) {
    // If the user is not logged in, redirect to the login page
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
</head>
<body class="top-navbar-fixed">
    <div class="main-wrapper">
        <?php include('includes/topbar-mentors.php'); ?>
        <div class="content-wrapper">
            <div class="content-container">
                <?php include('includes/leftbar-mentors.php'); ?>
                <div class="main-page">
                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-sm-6">
                                <h2 class="title">Dashboard</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>