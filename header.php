<?php include('connection.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Website</title>
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php
    $get_cat = "SELECT id, category_name, posts FROM categories WHERE posts > 0";
    $get_all_cat = mysqli_query($conn, $get_cat);
    ?>
    <header>
        <div class="top-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="logo">
                            <a href="#"> <img src="assets/images/logo.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="login-btn text-end">
                            <a href="admin/login.php" class="btn btn-sm btn-success">Login <i class="fa-solid fa-right-to-bracket"></i></a>
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
                            <li><a href=''>Home</a></li>
                            <?php
                            if ((mysqli_num_rows($get_all_cat) > 0)):
                                while ($cat = mysqli_fetch_assoc($get_all_cat)):
                            ?>
                                    <li><a href=''><?= $cat['category_name']; ?></a></li>
                            <?php
                                endwhile;
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="blank-space"></div>