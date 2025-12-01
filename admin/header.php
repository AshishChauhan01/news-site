<?php include("../connection.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Website</title>
    <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <header>
        <div class="top-header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="logo">
                            <a href="post.php"><img class="logo" src="../assets/images/logo.jpg"></a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="logout">
                            Hello <b>Ashish</b> <a href="logout.php" class="admin-logout btn btn-sm btn-danger">logout&nbsp;<i class="fa-solid fa-key"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="admin-menubar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="admin-menu">
                            <li>
                                <a href="post.php">Post</a>
                            </li>
                            <li>
                                <a href="category.php">Category</a>
                            </li>
                            <li>
                                <a href="users.php">Users</a>
                            </li>
                            <li>
                                <a href="settings.php">Settings</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="blank-space"></div>