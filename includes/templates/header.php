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

    <!-- sweetalert -->
    <link rel="stylesheet" type="text/css" href="assets/css/sweetalert.css" />
    <script src="assets/js/sweetalert.min.js"></script>
    <!-- sweetalert -->

    <!-- select2 stylesheet-->
    <link rel="stylesheet" href="assets/css/select2.min.css"/>
    <!-- select2 stylesheet -->


    <!-- card stylesheet -->
    <link rel="stylesheet" href="assets/css/reset.css"/>
    <link rel="stylesheet" href="assets/css/card.css"/>
    <!-- card stylesheet -->

    <!-- profile stylesheet -->
    <link rel="stylesheet" href="assets/css/AdminLTE.min.css"/>
    <!-- profile stylesheet -->

    <!-- main stylesheet -->
    <link rel="stylesheet" href="assets/css/styles.css"/>
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <?php session_start();?>
                        <?php if (isset($_SESSION['user_mail'])): ?>
                           <li><a href="buldings.php">Add Free Bullding</a></li>
                           <li><a href="profile.php">profile</a></li>
                           <li><a href="logout.php">logout</a></li>
                        <?php else: ?>
                         <?php
                           /*Login Function*/
                           require_once 'login.php';
                           /*Login Function*/
                         ?>
                           <li><a href="#" data-target="#loginpop" data-toggle="modal">Login</a></li>

                        <?php endif; ?>
                    </ul>
                </div>
                <!-- #Nav Ends -->

            </div>
        </div>

    </div>
    <!-- #Header Starts -->

    <div class="container">

        <div class="row">
            <div class="col-md-4">
              <img src="images/logo.png" alt="" class="img-rounded" style="margin-top: 9px;">
            </div>
            <div class="col-md-8">
                <!-- Header Starts -->
                <nav class="navbar navbar-default" style="margin-top: 20px;">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                             <a class="navbar-brand" href="buysalerent.php">All Buldings</a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <?php
                                $cats = getAllFrom('*', 'categouries', null, null, 'name', 'ASC', null);
                                foreach ($cats as $cat): ?>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $cat['name'] ?> <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li role="separator" class="divider"></li>
                                            <li><a href="buysalerent.php?cat_id=<?php echo $cat['id'] ?>">View</a></li>
                                            <li role="separator" class="divider"></li>
                                            <?php
                                                  $subcats = getAllFrom('*', 'sub_categouries', 'WHERE categoury_id = ' . $cat['id'], null, 'id', 'ASC', null);
                                                  foreach ($subcats as $subcat): ?>
                                                      <li><a href="buysalerent.php?cat_id=<?php echo $cat['id'] ?>&sub_cat_id=<?php echo $subcat['id'] ?>"><?php echo $subcat['name']; ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
                <!-- #Header Starts -->
            </div>
        </div>

    </div>
