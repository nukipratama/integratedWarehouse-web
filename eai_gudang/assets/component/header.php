<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
    header("Location:./index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="./assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Automatic Warehouse
    </title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="./assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <link href="./assets/vendor/select2/select2.min.css" rel="stylesheet" />
    <script src="./assets/js/core/jquery.min.js"></script>

</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="./assets/img/sidebar-1.jpg">
            <div class="logo">
                <a href="./" class="simple-text logo-normal">
                    Automatic Warehouse
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="./page_AddOutlet.php">
                            <i class="material-icons">home</i>
                            <p>Add Outlet</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./page_AddUser.php">
                            <i class="material-icons">person</i>
                            <p href="user.html">Add User</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./page_AddItem.php">
                            <i class="material-icons">store</i>
                            <p href="user.html">Add Item</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./page_productList.php">
                            <i class="material-icons">content_paste</i>
                            <p>Product List</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./page_requestList.php">
                            <i class="material-icons">library_books</i>
                            <p>Request List</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg bg-primary navbar-absolute sticky-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="#pablo">Dashboard</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">

                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?= $_SESSION['loginName'] . "(" . $_SESSION['loginRole'] . ")" ?><i class="material-icons">person</i>
                                    <p class="d-lg-none d-md-block">
                                        Account
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <a class="dropdown-item" href="#">Settings</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="./script/logout.php">Log out</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->