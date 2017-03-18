<!DOCTYPE html>
<html>
<head>
    <title>
        <?php
        if (isset($pageTitle)) {
            echo $pageTitle;
        }else {
            echo 'Taskeen';
        }
        ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="layouts/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="layouts/css/font-awesome.min.css" rel="stylesheet">
    <link href="layouts/css/select2.min.css" rel="stylesheet">
    <!-- sweet alert Must Keep The Js On The Top TO Load The Functions -->
    <link href="layouts/css/sweetalert.css" rel="stylesheet">
    <script src="layouts/js/sweetalert.min.js"></script>

    <link href="layouts/css/reset.css" rel="stylesheet">

    <link href="layouts/css/card.css" rel="stylesheet">

    <link href="layouts/css/styles.css" rel="stylesheet">

    <link href="layouts/css/AdminLTE.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
