<!DOCTYPE html>
<html lang="en">
<head>
    <title>Realestate Bootstrap Theme </title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- bootstrap stylesheet -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" />
    <!-- bootstrap stylesheet -->

    <!-- Owl stylesheet -->
    <link rel="stylesheet" href="assets/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/owl-carousel/owl.theme.css">
    <!-- Owl stylesheet -->

    <!-- slitslider -->
    <link rel="stylesheet" type="text/css" href="assets/slitslider/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/slitslider/css/custom.css" />
    <!-- slitslider -->

    <!-- main stylesheet -->
    <link rel="stylesheet" href="assets/css/style.css"/>
    <!-- main stylesheet -->
</head>

<body>
    <!-- Header Starts -->
    <div class="navbar-wrapper">

        <div class="navbar-inverse" role="navigation">
            <div class="container">
                <div class="navbar-header">


                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>


                <!-- Nav Starts -->
                <div class="navbar-collapse  collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="agents.php">Agents</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
                <!-- #Nav Ends -->

            </div>
        </div>

    </div>
    <!-- #Header Starts -->





    <div class="container">

        <!-- Header Starts -->
        <div class="header">
            <a href="index.php"><img src="images/logo.png" alt="Realestate"></a>

            <ul class="pull-right">
                <li><a href="buysalerent.php">All Buldings</a></li>
                <?php
                $cats = getAllFrom('*', 'categouries', null, null, 'name', 'ASC', null);
                foreach ($cats as $cat): ?>
                <li><a href="buysalerent.php?cat_id=<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <!-- #Header Starts -->
    </div>
